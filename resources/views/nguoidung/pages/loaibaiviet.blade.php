@extends('nguoidung.layouts.master')

@section('content')
    <div class="site-section">
      <div class="container">
        <div class="row">
          @foreach($baiviet as $bv)
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="{{route('viewbaiviet',['tieude'=>$bv->tenkhongdau.'-'.$bv->id])}}" >
                  <img src="anhbaiviet/{{$bv->hinh}}" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="{{route('viewbaiviet',['tieude'=>$bv->tenkhongdau.'-'.$bv->id])}}">{{$bv->tieude}}</a></h2>
              <span class="mb-3 d-block post-date">Ngày đăng: {{date('d-m-yy G:i',strtotime($bv->created_at)+7*60*60)}}</span>
              <p>{{$bv->tomtat}}</p>
            </div>
          </div>
          @endforeach
        </div>

        <div class="row mt-5">
          <div class="col-md-12 d-flex justify-content-center">
                {{$baiviet->links()}}
          </div>
        </div>

      </div>
    </div>

<style type="text/css">
      .media-with-text .img-fluid{
        height: 233px;
      }
    </style>
@endsection


@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/hero_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Suites Hotel &amp; Resort</span>
              <h1 class="mb-4">Tin Tức</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection