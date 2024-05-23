<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\imageUploadTraits;
use Illuminate\Http\Request;

class ProductImageGalleryController extends Controller
{
    use imageUploadTraits;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request ,ProductGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dataTable->render('admin.product.image-gallery.index',compact('product'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required','image','max:2048']
        ]);

        // image load
        $imagePaths = $this->uploadMultiImage($request, 'image','uploas');

        foreach($imagePaths as $path){
            $productImageGallery = new ProductImageGallery();
            $productImageGallery -> image = $path;
            $productImageGallery -> product_id = $request->product;
            $productImageGallery -> save();
        }
        toastr('Uploaded successfully!');

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $productImage = ProductImageGallery::findOrFail($id);
        $this->deleteImage($productImage->image);
        $productImage->delete();
        return response(['status'=>'success','message' => 'Deleted Successfully!']);
    }
}
