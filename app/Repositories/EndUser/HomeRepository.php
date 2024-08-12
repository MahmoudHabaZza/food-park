<?php

namespace App\Repositories\EndUser;

use App\Http\Requests\ReservationStoreRequest;
use App\Interfaces\EndUser\HomeRepositoryInterface;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\BannerSlider;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\DailyOffer;
use App\Models\Reservation;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Mail;

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
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => ['required','max:50'],
            'email' => ['required','email','max:255'],
            'subject' => ['required','max:255'],
            'message' => ['required','max:1000']
        ]);

        Mail::send(new ContactMail($request->name, $request->email, $request->subject, $request->message));
        return response(['status' => 'success','message' => 'Message sent successfully']);
    }

    public function reservation(ReservationStoreRequest $request)
    {

        if(!Auth::check()){
            throw ValidationException::withMessages(['Please Login to Book A Table']);
        }

        Reservation::create([
            'reservation_id' => rand(1,99999),
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'date' => $request->date,
            'reservation_time_id' => $request->time,
            'persons' => $request->persons,
            'status' => 'pending'
        ]);

        return response(['status' => 'success','message' => 'Reservation Sent successfully']);
    }
    public function subscribeNewsLetter(Request $request)
    {
        $request->validate([
            'email' => ['required','email','max:255','unique:subscribers,email'],
        ],['email.unique' => 'This Email is Already Subscribed']);

        Subscriber::create(['email' => $request->email]);
        return response(['status' => 'success','message' => 'Subscribed successfully']);
    }
}
