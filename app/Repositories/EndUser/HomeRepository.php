<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\HomeRepositoryInterface;
use App\Models\About;
use App\Models\BannerSlider;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Coupon;
use App\Models\DailyOffer;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class HomeRepository implements HomeRepositoryInterface
{
    public function index(): View
    {
        $sliders = Slider::where('status', 1)->get();
        $why_choose_us = WhyChooseUs::where('status', 1)->get();
        $sectionTitles = $this->getSectionTitles();
        $sections = WhyChooseUs::where('status', 1)->get();
        $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();
        $dailyOffers = DailyOffer::with('product')->where('status', 1)->take(15)->get();
        $bannerSliders = BannerSlider::where('status', 1)->take(15)->get();
        $chefs = Chef::where(['status' => 1, 'show_at_home' => 1])->get();
        $testimonials = Testimonial::where(['status' => 1, 'show_at_home' => 1])->take(15)->get();
        $counter = Counter::first();
        $blogs = Blog::withCount(['comments' => function ($query) {
            $query->where('status', 1);
        }])->with(['blogCategory', 'user'])->where('status', 1)->latest()->take(6)->get();
        return view('EndUser.Home.index', compact(
            'sliders',
            'why_choose_us',
            'sectionTitles',
            'sections',
            'categories',
            'dailyOffers',
            'bannerSliders',
            'chefs',
            'testimonials',
            'counter',
            'blogs',
        ));
    }

    public function getSectionTitles(): Collection
    {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'daily_offer_top_title',
            'daily_offer_main_title',
            'daily_offer_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title',
        ];
        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }

    public function showProduct(string $slug): View
    {
        $product = Product::with(['images', 'sizes', 'options'])->where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)->take(8)->latest()->get();


        return view('EndUser.Pages.produc-view', compact('product', 'relatedProducts'));
    }
    public function loadProductModal($productId)
    {
        $product = Product::with(['sizes', 'options'])->findOrFail($productId);
        return view('EndUser.Pages.ajax-files.product-load-modal', compact('product'))->render();
        // render() => to ensure that we have html response
    }

    public function applyCoupon(Request $request)
    {
        if (Cart::content()->count() > 0) {
            $code = $request->code;
            $subtotal = $request->subtotal;
            $coupon = Coupon::where('code', $code)->first();
            if (!$coupon) {
                return response(['message' => 'Coupon is Invalid'], 422);
            }
            if ($coupon->quantity <= 0) {
                return response(['message' => 'All of this Coupon quantity redeemed'], 422);
            }
            if ($coupon->expire_date < now()) {
                return response(['message' => 'Coupon Expired'], 422);
            }
            if ($coupon->discount_type === 'percent') {
                $discount = number_format($subtotal * $coupon->discount / 100, 2);
            } elseif ($coupon->discount_type === 'amount') {
                $discount = number_format($coupon->discount, 2);
            }

            $finalTotal = $subtotal - $discount;

            session()->put('coupon', ['code' => $code, 'discount' => $discount]);

            return response(['status' => 'success', 'message' => 'Coupon Applied Successfully', 'discount' => $discount ?? 0, 'finalTotal' => $finalTotal, 'coupon_code' => $code]);
        } else {
            return response(['status' => 'error', 'message' => 'Please Add Any Product to Cart To Apply Coupon'], 422);
        }
    }

    public function removeCoupon()
    {
        try {
            session()->forget('coupon');
            return response([
                'status' => 'success',
                'message' => 'Coupon Removed!',
                'discount' => 0,
                'total' => cartTotal()
            ]);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function chef()
    {
        $chefs = Chef::where(['status' => 1, 'show_at_home' => 1])->paginate(8);
        return view('EndUser.pages.chef-view', compact('chefs'));
    }
    public function testimonials()
    {
        $testimonials = Testimonial::where(['status' => 1, 'show_at_home' => 1])->paginate(8);
        return view('EndUser.pages.testimonial-view', compact('testimonials'));
    }

    public function about()
    {
        $about = About::first();
        $sectionTitles = $this->getSectionTitles();
        $sections = WhyChooseUs::where('status', 1)->get();
        $chefs = Chef::where(['status' => 1, 'show_at_home' => 1])->get();
        $testimonials = Testimonial::where(['status' => 1, 'show_at_home' => 1])->take(15)->get();
        $counter = Counter::first();
        return view('EndUser.pages.about', compact(
            'about',
            'sectionTitles',
            'sections',
            'chefs',
            'testimonials',
            'counter',
        ));
    }
    public function contact()
    {
        $contact = Contact::first();
        return view('EndUser.Pages.contact',compact('contact'));
    }
    public function blogs(Request $request)
    {
        $blogs = Blog::withCount(['comments' => function ($query) {
            $query->where('status', 1);
        }])->with(['blogCategory', 'user'])->where('status', 1);

        if ($request->has('search') && $request->filled('search')) {
            $blogs->where(function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('content', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->has('category') && $request->filled('category')) {
            $blogs->whereHas('blogCategory', function ($query) use ($request) {
                $query->where('slug', 'LIKE', '%' . $request->category . '%');
            });
        }

        $blogs = $blogs->latest()->paginate(9);
        $categories = BlogCategory::where('status', 1)->get();
        return view('EndUser.pages.blog-view', compact('blogs', 'categories'));
    }
    public function blogDetails($slug)
    {
        $blog = Blog::with(['blogCategory', 'user'])->where('slug', $slug)->where('status', 1)->firstOrFail();
        $comments = $blog->comments()->where('status', 1)->orderBy('created_at', 'DESC')->paginate(15);
        $nextBlog = Blog::select('id', 'image', 'slug', 'title')->where('status', '1')
            ->where('id', '>', $blog->id)->orderBy('id', 'ASC')->first();
        $prevBlog = Blog::select('id', 'image', 'slug', 'title')->where('status', '1')
            ->where('id', '<', $blog->id)->orderBy('id', 'DESC')->first();
        $latestBlogs = Blog::select('id', 'image', 'slug', 'title', 'created_at')
            ->where('status', 1)->where('id', '!=', $blog->id)->latest()->take(5)->get();
        $categories = BlogCategory::withCount(['blogs' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->take(5)->get();
        return view('EndUser.pages.blog-details', compact(
            'blog',
            'nextBlog',
            'prevBlog',
            'latestBlogs',
            'categories',
            'comments',

        ));
    }
    public function blogCommentStore(Request $request, string $blogId)
    {
        $request->validate([
            'comment' => ['required', 'max:500']
        ]);

        Blog::findOrFail($blogId);
        BlogComment::create([
            'blog_id' => $blogId,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
        ]);

        toastr()->success('Comment Submitted Successfully, Wait for approval from admin');
        return redirect()->back();
    }
}
