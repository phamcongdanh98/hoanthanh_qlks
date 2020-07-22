@extends('nguoidung.layouts.master')

@section('content')

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">DICH VỤ HIỆN CÓ</h2>
          </div>
        </div>
        <div class="row">
          @foreach($dichvu as $dv)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center p-4 item">
              <span class="display-3 mb-3 d-block text-primary"><img src="anhdichvu/{{$dv->hinh}}" alt="Image" class="img-fluid rounded"></span>
              <h2 class="h5">{{$dv->tendichvu}}</h2>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
<style type="text/css">
  .text-center .img-fluid{
    height: 200px;
    object-fit: cover;
  }
</style>
@endsection

@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">CHAT WITH US</span>
              <h1 class="mb-4">Get In Touch</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection