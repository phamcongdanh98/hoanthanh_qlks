@extends('nguoidung.layouts.master')

@section('content')

     <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5" style="text-transform: uppercase;">{{$loaiphong1->tenloai}}</h2>
          </div>
        </div>
        <div class="row">
          @foreach($phong1 as $p)
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a href="{{route('viewphong',['id'=>$p->id])}}" class="d-block mb-0 thumbnail"><img src="anhphong1/{{$p->anhdaidien}}" alt="Image" class="img-fluid"></a>
              <div class="hotel-room-body">
                <h3 class="heading mb-0"><a href="{{route('viewphong',['id'=>$p->id])}}">{{$p->tenphong}}</a></h3>
                <strong class="price">{{$p->giaphong}}đ / một đêm</strong>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

@endsection


@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/hero_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Suites Hotel &amp; Resort</span>
              <h1 class="mb-4">Phòng Khách sạn</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection