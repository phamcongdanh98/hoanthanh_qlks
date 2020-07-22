@extends('admin.layouts.master')

@section('title')
	Thống Kê
@endsection

@section('content')
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
          </div>
          <form action="{{route('thongke')}}" method="get">
            <div class="form-row">
              <div class="col-md-6">
                <label for="diachi">Từ ngày: </label>
                @if(!isset($datetu))
                <input type="date" name="datetu" class="form-control" value="{{$datetu}}">
                @else
                <input type="date" name="datetu" class="form-control" value="{{$datetu}}">
                @endif
              </div>
              <div class="col-md-6">
                <label for="diachi">Đến ngày: </label>
                @if(!isset($dateden))
                <input type="date" name="dateden" class="form-control" onchange="this.form.submit()" value="{{$dateden}}" >
                @else
                <input type="date" name="dateden" class="form-control" onchange="this.form.submit()" value="{{$dateden}}" >
                @endif
            </div>
            </div>
          </form>
          <!-- Content Row -->
          <div class="row" style="margin-top: 20px;">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Phòng đã đặt</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$phongdat}}/{{$tongsophong->soluong}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doanh thu</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$doanhthu->tonggia}} VND</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Bài viết</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$baiviet}}</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Liên hệ </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$lienhe}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('script')



@endsection