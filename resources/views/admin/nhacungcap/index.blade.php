@extends('admin.layouts.master')

@section('content')

<section class="section">
      <div class="section-header">
        <h1>Nhà Cung Cấp</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Nhà Cung Cấp</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.nhacungcap.create')}}" class="btn btn-primary">+ Create new</a>
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
