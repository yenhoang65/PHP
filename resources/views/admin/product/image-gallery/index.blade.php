@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Product Image Gallery</h1>
        <div class="section-header-breadcrumb">
        </div>
      </div>
      <div class="mb-3">
        <a href="{{route('admin.products.index')}}" class="btn btn-primary">Back</a>
      </div>

      <div class="section-body">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Product: {{$product->name}}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.products-image-gallery.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Image <code>(Nhiều hình ảnh hỗ trợ )</code> </label>
                            <input type="file" name="image[]" class="form-control" multiple>
                            <input type="hidden" name="product" value="{{$product->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
              </div>
            </div>
          </div>



        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Image</h4>

              </div>
              <div class="card-body">
                {{$dataTable->table()}}
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

@endsection

@push('scrips')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
