<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Models\ProductVariant;
use App\Traits\imageUploadTraits;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use imageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brand = Brand::all();
        return view('admin.product.create', compact('categories','brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumb_image' => ['required','image', 'max:3000'],
            'name' => ['required','max:200'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'offer_price' => ['required'],
            'qty' => ['required'],
            'description' => ['required','max:1000'],
            'status' => ['required']
        ]);
        $imagePath = $this->uploadImage($request,'thumb_image', 'uploads');
        $product = new Product();
        //

        $product->thumb_image = $imagePath;
        $product->name= $request->name;
        $product->category_id= $request->category;
        $product->brand_id= $request->brand;
        $product->slug = Str::slug($request->name);
        $product->sku =$request->sku;
        $product->qty =$request->qty;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->offer_price= $request->offer_price;
        $product->offer_start_date= $request->offer_start_date;
        $product->offer_end_date= $request->offer_end_date;
        $product->product_type= $request->product_type;

        $product->status= $request->status;
        $product -> save();
        toastr('Create Successfully!','success');

        return redirect()->route('admin.products.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brand = Brand::all();
        return view('admin.product.edit', compact('product','categories','brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'thumb_image' => ['image', 'max:3000'],
            'name' => ['required','max:200'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'offer_price' => ['required'],
            'qty' => ['required'],
            'description' => ['required','max:1000'],
            'status' => ['required']
        ]);

        $product = Product::findOrFail($id);
        $imagePath = $this->updateImage($request,'thumb_image', 'uploads', $product->thumb_image);

        $product->thumb_image = empty(!$imagePath) ? $imagePath :  $product->thumb_image;
        $product->name= $request->name;
        $product->category_id= $request->category;
        $product->brand_id= $request->brand;
        $product->slug = Str::slug($request->name);
        $product->sku =$request->sku;
        $product->qty =$request->qty;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->offer_price= $request->offer_price;
        $product->offer_start_date= $request->offer_start_date;
        $product->offer_end_date= $request->offer_end_date;
        $product->product_type= $request->product_type;

        $product->status= $request->status;
        $product -> save();
        toastr('update Successfully!','success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        // xóa ảnh ở csdl
        $this->deleteImage($product->thumb_image);
        //
        $galleryImages = ProductImageGallery::where('product_id', $product->id)->get();
        foreach($galleryImages as $image){
            $this -> deleteImage($image->image);
            $image->delete();
        }
        // xóa sp variant
        $variants = ProductVariant::where('product_id', $product->id)->get();

        foreach($variants as $variant){
            $variant->productVariantItems()->delete();
            $variant->delete();
        }
        $product->delete();
        return response(['status' => 'success','message' => 'deleted successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $product=Product::findOrFail($request->id);
        $product->status = $request -> status == 'true' ? 1 : 0;
        $product -> save();

        return response(['message' => 'status has been updated!']);
    }
}
