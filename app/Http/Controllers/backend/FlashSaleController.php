<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FlashSaleItemDataTable $dataTable)
    {
        $flashSaleDate = FlashSale::first();
        $products = Product::where('status',1)->orderby('id','DESC')->get();
        return $dataTable->render('admin.flash-sale.index',compact('flashSaleDate','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'end_date' => ['required']
        ]);

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['end_date' => $request->end_date]
        );

        toastr('Updated Successfully!', 'success', 'Success');
        return redirect()->back();
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'product' => ['required','unique:flash_sale_items,product_id'],
            'show_at_home' => ['required'],
            'status' => ['required'],

        ],[
            'product.unique' => 'the product is already in flash sale'
        ]);



        $flashSaleDate = FlashSale::first();

        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = $flashSaleDate->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request -> status;
        $flashSaleItem->save();

        toastr('Product Added Successfully!', 'success', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($id);
        $flashSaleItem -> delete();
        return response(['status'=>'success','Deleted successfully!']);
    }

    public function changeShowAtHomeStatus(Request $request)
    {
        $flashSaleItem=FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->show_at_home = $request -> status == 'true' ? 1 : 0;
        $flashSaleItem -> save();

        return response(['message' => 'status has been updated!']);
    }

    public function changeStatus(Request $request)
    {
        $flashSaleItem=FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->status = $request -> status == 'true' ? 1 : 0;
        $flashSaleItem -> save();

        return response(['message' => 'status has been updated!']);
    }
}
