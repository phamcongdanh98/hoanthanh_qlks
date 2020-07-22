@extends('nguoidung.layouts.master')

@section('content')
<section>
  <div class="container" style="padding-top: 20px;">
    <div class="success">
      <div class="icon-box">
        <i class="fas fa-check-circle"></i>
      </div>
      <div class="success-title">
        <h4>Đặt Phòng Thành Công!</h4>
      </div>
      <div class="success-body">
        <p class="text-center">Cảm ơn đã đặt phòng</p>
        <p class="text-center">Chúng tôi sẽ liên hệ với quý khách qua số điện thoại hoặc Email</p>
      </div>
      <div class="success-button">
        <a href="{{route('trangchu')}}"><button class="button-submit"><i class="fas fa-check-circle"></i>&nbsp Tiếp Tục</button></a>
      </div>
    </div>
  </div>
</section>
<style type="text/css">
  .success{
    text-align: center;
    padding-top: 50px;
    padding-bottom: 150px;
    font-family: 'Varela Round', sans-serif;
  }

  .success .icon-box{
    color: #82ce34;
    font-size: 100px;
  }

  .success-title h4{
    text-align: center;
      font-size: 26px;
      margin: 0px 0 15px;
      line-height: 1.42857143;
      color: #82ce34;
  }

  .success-body p{
    font-size: 18px;
    margin-bottom: 10px;
  }

  .success-button{
    margin-top: 60px;
  }

  .button-submit{
    width: 350px;
    padding: 8px 0;
    border: none;
    border-radius: 50px;
    background-color: #82ce34;    
    font-size: 15px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    cursor: pointer;
  }

  .button-submit:hover{
    background: blue;
  }

</style>
@endsection


@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">CẢM ƠN QUÝ KHÁCH</span>
              <h1 class="mb-4">Đặt Phòng Thành Công</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection