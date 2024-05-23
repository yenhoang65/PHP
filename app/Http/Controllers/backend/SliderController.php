<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\imageUploadTraits;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    use imageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $daTable)
    {
        return $daTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['required', 'image', 'max:5000'],
            'title' => ['required', 'max:200' ],
            'btn_url' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required']
        ]);

        $slider = new Slider();
        //
        $imagePath = $this->uploadImage($request,'banner', 'uploads');

        $slider->banner = $imagePath;

        $slider->title= $request->title;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr('Created Success!');

        return redirect()->route('admin.slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:5000'],
            'title' => ['required', 'max:200' ],
            'btn_url' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required']
        ]);

        $slider = Slider::findOrFail($id);
        //
        $imagePath = $this->updateImage($request,'banner', 'uploads', $slider->banner);

        $slider->banner = empty(!$imagePath) ? $imagePath :  $slider->banner;

        $slider->title= $request->title;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr('Update Success!');

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::FindOrFail($id);
        $this->deleteImage($slider->banner);
        $slider ->delete();

        return response(['stats'=>'success','message'=>'Deleted successfully!']);
    }
}
