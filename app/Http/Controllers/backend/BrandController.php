<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Traits\imageUploadTraits;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use imageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:5000'],
            'name' => ['required', 'max:200' ],
            'slug' => ['required'],
            'is_featured' => ['required'],
            'status' => ['required']
        ]);

        $brand = new Brand();
        //
        $imagePath = $this->uploadImage($request,'logo', 'uploads');

        $brand->logo = $imagePath;

        $brand->name= $request->name;
        $brand->slug= $request->slug;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Created Success!');

        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:5000'],
            'name' => ['required', 'max:200' ],
            'is_featured' => ['required'],
            'status' => ['required']
        ]);

        $brand = Brand::findOrFail($id);
        //
        $imagePath = $this->updateImage($request,'logo', 'uploads', $brand->logo);

        $brand->logo = empty(!$imagePath) ? $imagePath :  $brand->logo;

        $brand->name= $request->name;
        $brand->slug= $request->slug;
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Update Success!');

        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::FindOrFail($id);
        $this->deleteImage($brand->logo);
        $brand ->delete();

        return response(['stats'=>'success','message'=>'Deleted successfully!']);
    }
}
