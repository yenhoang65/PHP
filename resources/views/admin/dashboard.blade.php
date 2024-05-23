@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
        <a href="{{route('admin.order.index')}}">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Đơn hàng hôm nay</h4>
                    </div>
                    <div class="card-body">
                      {{$todaysOrder}}
                    </div>
                  </div>
                </div>

            </a>
        </div>



        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('admin.pending-orders')}}">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Đơn chờ xử lý hôm nay</h4>
                    </div>
                    <div class="card-body">
                      {{$todaysOrder}}
                    </div>
                  </div>
                </a>
            </div>

        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('admin.order.index')}}">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Tổng số đơn hàng</h4>
                    </div>
                    <div class="card-body">
                      {{$totalOrders}}
                    </div>
                  </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('admin.pending-orders')}}">
                  <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Tổng số đơn đặt hàng đang chờ xử lý</h4>
                    </div>
                    <div class="card-body">
                      {{$totalPendingOrders}}
                    </div>
                  </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('admin.canceled-orders')}}">
                  <div class="card-icon bg-danger">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Tổng số đơn hàng đã hủy</h4>
                    </div>
                    <div class="card-body">
                      {{$totalCanceledOrders}}
                    </div>
                  </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('admin.delivered-orders')}}">
                  <div class="card-icon bg-danger">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Tổng số đơn hàng đã hoàn thành</h4>
                    </div>
                    <div class="card-body">
                      {{$totalCompleteOrders}}
                    </div>
                  </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-money-bill-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Thu nhập hôm nay</h4>
                        </div>
                        <div class="card-body">
                            {{ number_format($todaysEarnings) }} {{$settings->currency_icon}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-money-bill-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4> Thu nhập tháng này</h4>
                        </div>
                        <div class="card-body">
                            {{ number_format($monthEarnings) }}{{$settings->currency_icon}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-money-bill-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Thu nhập năm nay</h4>
                        </div>
                        <div class="card-body">
                            {{ number_format($yearEarnings) }}{{$settings->currency_icon}}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.reviews.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Reviews</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalReview }}
                        </div>
                    </div>
                </div>
            </a>
        </div> --}}


        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.brand.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-copyright"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tổng số thương hiệu</h4>

                        </div>
                        <div class="card-body">
                            {{ $totalBrands }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.category.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4> Tổng số danh mục</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalCategories }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
           <a href="{{route('admin.blog.index')}}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tổng số tin tức</h4>
                    </div>
                    <div class="card-body">
                        {{$totalBlogs}}
                    </div>
                </div>
            </div>
        </a>
        </div>


      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>News</h4>
            </div>
            <div class="card-body">
              42
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Reports</h4>
            </div>
            <div class="card-body">
              1,201
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Online Users</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
