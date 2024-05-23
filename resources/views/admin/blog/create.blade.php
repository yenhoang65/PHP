@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Blog</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Blog</div>
        </div>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Create Blog</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image Blog</label>
                        <input type="file" class="form-control" name="image" >
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                    </div>

                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputState">is_featured</label>
                        <select id="inputState" class="form-control" name="is_featured">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection
