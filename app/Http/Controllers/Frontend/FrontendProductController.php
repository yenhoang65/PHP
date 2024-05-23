<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use GrahamCampbell\ResultType\Success;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{

    public function showProduct(string $slug)
    {
        // with(['category','productImageGalleries','variants','brand'])->
        // $product = Product::where('slug', $slug)->where('status',1)->first();
        // return view('frontend.pages.product-detail',compact('product'));

        $product = Product::with(['category', 'productImageGalleries', 'variants', 'brand'])->where('slug', $slug)
            ->where('status', 1)
            ->first();
            $reviews = ProductReview::where('product_id', $product->id)->where('status',1)->paginate(10);
        return view('frontend.pages.product-details', compact(
            'product',
            'reviews'
        ));
    }

    public function productsIndex(Request $request){

        if($request->has('category')){
            $category= Category::where('slug', $request->category)->first();
            $products = Product::where([
                'status'=>1,
                'category_id' => $category->id,
            ])

            ->when($request->has('range'), function($query) use ($request){
                $price = explode(';', $request->range);
                $from = $price[0];
                $to = $price[1];

                return $query->where('price', '>=', $from)->where('price', '<=', $to);
            })
            ->paginate(12);
        }elseif($request->has('search')){
            $products = Product::where(function($query) use ($request){
                $query->where('name','like','%'.$request->search.'%')
                ->orWhere('description','like','%'.$request->search.'%');
            })
            ->paginate(12);
        }

        elseif($request->has('brand')){
            $brand = Brand::where('slug', $request->brand)->firstOrFail();

            $products = Product::where([
                'brand_id' => $brand->id,
                'status'=>1
            ])
            ->when($request->has('range'), function($query) use ($request){
                $price = explode(';', $request->range);
                $from = $price[0];
                $to = $price[1];

                return $query->where('price', '>=', $from)->where('price', '<=', $to);
            })
            ->paginate(12);
        }else {
            $products = Product::where('status', 1)
            ->when($request->has('range'), function($query) use ($request){
                $price = explode(';', $request->range);
                $from = $price[0];
                $to = $price[1];

                return $query->where('price', '>=', $from)->where('price', '<=', $to);
            })
                ->orderBy('id', 'DESC')
                ->paginate(12);
        }
        $categories =Category::where(['status'=>1])->get();
        $brands =Brand::where(['status'=>1])->get();

        return view('frontend.pages.product',compact('products','categories','brands'));

    }

    public function changeListView(Request $request){
        Session::put('product_list_style',$request->style);
    }
}
