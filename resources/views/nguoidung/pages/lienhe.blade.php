@extends('nguoidung.layouts.master')

@section('content')

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
            @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err) {{$err}}
                <br> @endforeach
            </div>
            @endif @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
          
            
          
            <form action="{{route('themlienhe')}}" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="fullname" style="font-weight: 700!important;">Họ và tên</label>
                  <input type="text" name="ten" class="form-control" placeholder="Nhập họ và tên">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ Email">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Sô điện thoại</label>
                  <input type="text" name="sdt" class="form-control" placeholder="Nhập số điện thoại">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Lời nhắn</label> 
                  <textarea name="loinhan" cols="30" rows="5" class="form-control" placeholder="Lời nhằn của bạn với chúng tôi"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>

  
            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Thông Tin Liên Hệ</h3>
              <p class="mb-0" style="font-weight: 700!important;">Address</p>
              <p class="mb-4">{{$thongtin->diachi}}</p>

              <p class="mb-0 font-weight-bold">Số Điện Thoại</p>
              <p class="mb-4">{{$thongtin->sdt}}</p>

              <p class="mb-0 font-weight-bold">Địa Chỉ Email</p>
              <p class="mb-0">{{$thongtin->email}}</p>

            </div>
            
            
          </div>
        </div>
      </div>
    </div>

@endsection

@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">CHAT WITH US</span>
              <h1 class="mb-4">Liên Hệ</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection