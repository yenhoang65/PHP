<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductVariantItemDataTable $dataTable, $productId, $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        return $dataTable->render('admin.product.product-variant-item.index',compact('product','variant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $productId, string $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);

        return view('admin.product.product-variant-item.create',compact('variant','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'variant_id' => ['integer','required'],
            'name'=>['required','max:200'],
            'price'=>['required','integer'],
            'is_default'=>['required'],
            'status'=>['required']
        ]);
        $variantItem = new ProductVariantItem();
        $variantItem->product_variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('Created Successfully','success','success');
        return redirect()->route('admin.products-variant-item.index',
        ['productId'=>$request->product_id ,'variantId'=>$request->variant_id ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        return view('admin.product.product-variant-item.edit' ,compact('variantItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $variantItemId)
    {
        $request-> validate([
            'name'=>['required','max:200'],
            'price'=>['required','integer'],
            'is_default'=>['required'],
            'status'=>['required']
        ]);
        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('update Successfully','success','success');
        return redirect()->route('admin.products-variant-item.index',
        ['productId'=>$variantItem->productVariant->product_id ,'variantId'=> $variantItem->product_variant_id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);

        $variantItem -> delete();
        return response(['status' => 'success','message' => 'deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $variantItem=ProductVariantItem::findOrFail($request -> id);
        $variantItem->status = $request -> status == 'true' ? 1 : 0;
        $variantItem -> save();

        return response(['message' => 'status has been updated!']);
    }
}
