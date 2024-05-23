@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Brand</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Components</a></div>
          <div class="breadcrumb-item">Brand</div>
        </div>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Brand</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.brand.create')}}" class="btn btn-primary">+ Create new</a>
                </div>
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
