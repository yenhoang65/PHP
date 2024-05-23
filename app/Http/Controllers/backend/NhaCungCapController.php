<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\NhaCungCapDataTable;
use App\Http\Controllers\Controller;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NhaCungCapDataTable $dataTable)
    {
        return $dataTable->render('admin.nhacungcap.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nhacungcap.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'address' => ['required', 'max:200' ],
            'phone' => ['required','max:10'],
            'email' => ['required'],
            'status' => ['required']
        ]);

        $nhacungcap = new NhaCungCap();
        //
        $nhacungcap->name= $request->name;
        $nhacungcap->address= $request->address;
        $nhacungcap->phone = $request->phone;
        $nhacungcap->email = $request->email;
        $nhacungcap->status = $request->status;
        $nhacungcap->save();

        toastr('Created Success!');

        return redirect()->route('admin.nhacungcap.index');
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
        $nhacungcap = NhaCungCap::findOrFail($id);
        return view('admin.nhacungcap.edit',compact('nhacungcap'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
            'address' => ['required', 'max:200' ],
            'phone' => ['required','max:10'],
            'email' => ['required'],
            'status' => ['required']
        ]);

        $nhacungcap = NhaCungCap::findOrFail($id);
        //
        $nhacungcap->name= $request->name;
        $nhacungcap->address= $request->address;
        $nhacungcap->phone = $request->phone;
        $nhacungcap->email = $request->email;
        $nhacungcap->status = $request->status;
        $nhacungcap->save();

        toastr('Update Success!');

        return redirect()->route('admin.nhacungcap.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nhacungcap = NhaCungCap::FindOrFail($id);
        $nhacungcap ->delete();

        return response(['status'=>'success','Deleted successfully!']);
    }
}
