<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BLogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\imageUploadTraits;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use imageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index(BLogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:5000'],
            'title' => ['required', 'max:200' ],
            'description' => ['required','max:1000'],
            'is_featured' => ['required'],
            'status' => ['required']
        ]);

        $blog = new Blog();
        //
        $imagePath = $this->uploadImage($request,'image', 'uploads');

        $blog->image = $imagePath;

        $blog->title= $request->title;
        $blog->description= $request->description;
        $blog->is_featured = $request->is_featured;
        $blog->status = $request->status;
        $blog->save();

        toastr('Created Success!');

        return redirect()->route('admin.blog.index');
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
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:5000'],
            'title' => ['required', 'max:200' ],
            'description' => ['required','max:1000'],
            'is_featured' => ['required'],
            'status' => ['required']
        ]);

        $blog = Blog::findOrFail($id);
        //
        $imagePath = $this->updateImage($request,'image', 'uploads', $blog->image);

        $blog->image = empty(!$imagePath) ? $imagePath :  $blog->image;

        $blog->title= $request->title;
        $blog->description= $request->description;
        $blog->is_featured = $request->is_featured;
        $blog->status = $request->status;
        $blog->save();

        toastr('Update Success!');

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::FindOrFail($id);
        $this->deleteImage($blog->image);
        $blog ->delete();

        return response(['status'=>'success','message'=>'Deleted successfully!']);
    }
}
