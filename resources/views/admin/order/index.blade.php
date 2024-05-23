@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Order</h1>
            <div class="section-header-breadcrumb">
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Order</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">+ Create new</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
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
