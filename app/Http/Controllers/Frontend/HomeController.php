<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('show_at_home',1)->where('status',1)->get();
        $sliders = Slider::where('status',1)->orderBy('serial','asc')->get();
        $brands = Brand::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->get();
        $typeBaseProduct = $this ->getTypeBaseProduct();
        $homepage_section_banner_one = Advertisement::where('key', 'homepage_section_banner_one')->first();
        $homepage_section_banner_one = json_decode($homepage_section_banner_one?->value);

        $homepage_section_banner_two = Advertisement::where('key', 'homepage_section_banner_two')->first();
        $homepage_section_banner_two = json_decode($homepage_section_banner_two?->value);

        return view('frontend.home.home',compact(
            'sliders',
            'flashSaleDate',
            'flashSaleItems',
            'brands',
            'blogs',
            'homepage_section_banner_one',
            'homepage_section_banner_two',
            'typeBaseProduct'
        ));
    }
    public function getTypeBaseProduct()
    {
        $typeBaseProducts = [];

        $typeBaseProducts['new_arrival'] = Product::where(['product_type' => 'new_arrival', 'status' => 1])
        ->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['featured_product'] = Product::where(['product_type' => 'featured_product','status' => 1])
        ->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['top_product'] = Product::where(['product_type' => 'top_product', 'status' => 1])
        ->orderBy('id', 'DESC')->take(8)->get();

        $typeBaseProducts['best_product'] = Product::where(['product_type' => 'best_product', 'status' => 1])
        ->orderBy('id', 'DESC')->take(8)->get();

        return $typeBaseProducts;
    }
}
