@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Contact</h1>
        <div class="section-header-breadcrumb">
          {{-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div> --}}
          {{-- <div class="breadcrumb-item"><a href="#">Components</a></div> --}}
          <div class="breadcrumb-item">Contact</div>
        </div>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Contact</h4>
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
