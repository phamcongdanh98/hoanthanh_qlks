@extends('nguoidung.layouts.master')

@section('content')
<!-- Danh sách phòng -->
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Danh sách phòng</h2>
          </div>
        </div>
        <div class="row">
          @foreach($phong as $p)
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

    <!-- Giới Thiệu -->
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
            <p><a href="{{$gioithieu->linkvideo}}" class="popup-vimeo text-uppercase">Xem Video <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Dịch Vụ hiện có -->

    <!-- Khám phá hình ảnh -->
   @include('nguoidung.layouts.hinhanh')
    
    <div class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>TIN TỨC</h2>
          </div>
        </div>

        <!-- Bài viết -->
        <div class="nonloop-block-15 owl-carousel">
          
          @foreach($baiviet1 as $bv)
            <div class="media-with-text p-md-4">
              <div class="img-border-sm mb-4">
                <a href="{{route('viewbaiviet',['tieude'=>$bv->tenkhongdau.'-'.$bv->id])}}">
                  <img src="anhbaiviet/{{$bv->hinh}}" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="{{route('viewbaiviet',['tieude'=>$bv->tenkhongdau.'-'.$bv->id])}}">{{$bv->tieude}}</a></h2>
              <span class="mb-4 d-block post-date">Ngày đăng: {{date('d-m-yy G:i',strtotime($bv->created_at)+7*60*60)}}</span>
              <p class="mb-4">{{$bv->tomtat}}</p>
            </div>         
          @endforeach
        </div>

      </div>
    </div>

    <!-- Phản hồi khách hàng -->
    <div class="site-section block-14 bg-light">

      <div class="container">
        
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Phản hồi khách hàng</h2>
          </div>
        </div>

        <div class="nonloop-block-14 owl-carousel">
          
          <div class="p-4">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="trangchu_asset/images/person_1.jpg" alt="Image" class="img-fluid rounded">
              </div>
              <div>
                <h2 class="h5">Quách Ngọc Hân</h2>
                <blockquote>&ldquo;Gia đình chúng tôi rất hài lòng về cung cách phục vụ của nhân viên khách sạn tận tình hướng dẫn chúng tôi nơi có các món ăn ngon cho đến nhân viên phòng ăn, phòng lễ tân. Xin cảm ơn rất...&rdquo;</blockquote>
              </div>
            </div>
          </div>
          <div class="p-4">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="trangchu_asset/images/person_3.jpg" alt="Image" class="img-fluid rounded">
              </div>
              <div>
                <h2 class="h5">Nguyễn Văn Cường</h2>
                <blockquote>&ldquo;Chúng tôi thường xuyên ghé thăm Park City, và từng nhiều lần lưu trú tại OneNight , chúng tôi rất hài lòng khi chúng tôi quay trở lại vào tháng 8 vừa rồi!&rdquo;</blockquote>
              </div>
            </div>
          </div>
          <div class="p-4">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="trangchu_asset/images/person_2.jpg" alt="Image" class="img-fluid rounded">
              </div>
              <div>
                <h2 class="h5">Đông Nhi</h2>
                <blockquote>&ldquo;Tôi Rất hài long về dịch vụ và thái độ phục vụ của nhân viên. Tôi sẽ quay lại khách sạn một thời gian sớm nhất!&rdquo;</blockquote>
              </div>
            </div>
          </div>
          <div class="p-4">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="trangchu_asset/images/person_4.jpg" alt="Image" class="img-fluid rounded">
              </div>
              <div>
                <h2 class="h5">Bích Phương</h2>
                <blockquote>&ldquo;Khách sạn OneNight là khách sạn tuyệt với nhất trong những khách sạn tôi đã tới. Nhân viên phục vụ vô cùng lịch sự và chuyên nghiệp.!&rdquo;</blockquote>
              </div>
            </div>
          </div>

        </div>

      </div>
      
    </div>
    <style type="text/css">
      .nonloop-block-15 .img-fluid{
        height: 205px;
      }
      .hotel-room .img-fluid{
        height: 233px;
      }
      .block-13 .owl-nav, .block-14 .owl-nav, .block-15 .owl-nav{
        z-index: -1;
      }
    </style>
@include('nguoidung.layouts.footer-info')
@endsection

@section('slide')

<div class="slide-one-item home-slider owl-carousel">
      @foreach($slide as $sl)
      <div class="site-blocks-cover overlay" style="background-image: url(anhslide/{{$sl->hinh}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              
              <h1 class="mb-2">{{$sl->tieude}}</h1>
              <h2 class="caption">{{$sl->chuthich}}</h2>
            </div>
          </div>
        </div>
      </div>  
      @endforeach
    </div>
@endsection