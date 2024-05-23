@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Brand</div>
        </div>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Create Brand</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('admin.brand.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logo" >
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{old('slug')}}">
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
