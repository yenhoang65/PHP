@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Brand</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Brand</div>
        </div>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Brand</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('admin.brand.update', $brand->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Preview</label>
                        <br>
                        <img width="150px" src="{{asset($brand->banner)}}" alt="">
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logo" >
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$brand->name}}">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$brand->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">is_featured</label>
                        <select id="inputState" class="form-control" name="is_featured">
                            <option {{$brand->is_featured == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$brand->is_featured == 0 ? 'selected': ''}} value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option {{$brand->status == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$brand->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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
