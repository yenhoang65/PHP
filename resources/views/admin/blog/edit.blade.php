@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>BLog</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Blog</div>
        </div>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit BLog</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('admin.blog.update', $blog->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Preview</label>
                        <br>
                        <img width="150px" src="{{asset($blog->image)}}" alt="">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{$blog->description}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">is_featured</label>
                        <select id="inputState" class="form-control" name="is_featured">
                            <option {{$blog->is_featured == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$blog->is_featured == 0 ? 'selected': ''}} value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option {{$blog->status == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$blog->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection
