@extends('nguoidung.layouts.master')

@section('content')
<div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0">
            
              <div class="img-border">
                <a href="{{$gioithieu->linkvideo}}" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                  <img src="trangchu_asset/images/img_2.jpg" alt="" class="img-fluid">
                </a>
              </div>

              <img src="trangchu_asset/images/img_1.jpg" alt="Image" class="img-fluid image-absolute">
            
          </div>
          <div class="col-md-5 ml-auto">          
            <div class="section-heading text-left">
              <h2 class="mb-5">Thông tin</h2>
            </div>
            <p class="mb-4">{{$gioithieu->tomtat}}</p>
            <p><a href="{{$gioithieu->linkvideo}}" class="popup-vimeo text-uppercase" >Xem Video<span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
    </div>



        </div>
      </div>
    </div>


    <div class="site-section bg-light border-top">
      @include('nguoidung.layouts.hinhanh')
    </div>

@endsection

@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Suites Hotel &amp; Resort</span>
              <h1 class="mb-4">Giới Thiệu</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection