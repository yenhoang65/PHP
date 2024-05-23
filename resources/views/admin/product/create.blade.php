@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Product</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Product</div>
        </div>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Update Product</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="thumb_image">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" min="0" class="form-control" name="qty" value="{{old('qty')}}">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                    </div>
                    <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" class="form-control" name="offer_price" value="{{old('offer_price')}}">
                    </div>
                    <div class="form-group">
                        <label>Sku</label>
                        <input type="text" class="form-control" name="sku" value="{{old('sku')}}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer Start Date</label>
                                <input type="text" class="form-control datepicker"  name="offer_start_date" value="{{old('offer_start_date')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer End Date</label>
                                <input type="text" class="form-control datepicker" name="offer_end_date" value="{{old('offer_end_date')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                    </div>

                    <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control" name="category">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Brand</label>
                        <select id="inputState" class="form-control" name="brand">
                            <option value="">Select</option>
                            @foreach ($brand as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="inputState">Product type</label>
                        <select id="inputState" class="form-control" name="product_type">
                            <option value="">Select</option>
                            <option value="new_arrival">New Arrival</option>
                            <option value="featured_product">Featured</option>
                            <option value="top_product">Top Product</option>
                            <option value="best_product">Best Product</option>

                        </select>
                    </div>




                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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
