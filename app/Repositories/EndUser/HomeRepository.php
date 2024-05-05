<?php

namespace App\Repositories\EndUser;

use App\Interfaces\EndUser\HomeRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
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
        return view('EndUser.Home.index', compact('sliders', 'why_choose_us', 'sectionTitles', 'sections', 'categories'));
    }

    public function getSectionTitles(): Collection
    {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title'
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
        return view('EndUser.Pages.ajax-files.product-load-modal')->render();
        // render() => to ensure that we have html response
    }
}
