@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Category</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Categories</h4>

              </div>
              <div class="card-body">
                <form method="POST" action="{{route('admin.category.update', $category->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon</label>
                        <div>
                            <button class="btn btn-primary" data-icon="{{$category->icon}}" data-selected-class="btn-danger"
                            data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option {{$category->status == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$category->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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

{{-- @push('scrips')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush --}}
