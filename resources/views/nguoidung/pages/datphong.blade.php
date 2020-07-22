@extends('nguoidung.layouts.master')

@section('content')
 <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Xác nhận thông tin</h2>
          </div>
          <table class="table" style="width: 60%; margin: 0 auto;">
          <tbody>
            <tr>
              <td><p><font color="#000000"><strong>Họ và tên:</strong><span>&nbsp {{$checkout->ten}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Email:</strong><span>&nbsp {{$checkout->email}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Số điện thoại:</strong><span>&nbsp {{$checkout->sdt}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Số CMND:</strong><span>&nbsp {{$checkout->cmnd}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Loại Phòng:</strong><span>&nbsp {{$checkout->tenloai}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Tên phòng</strong><span>&nbsp {{$checkout->tenphong}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Số lượng:</strong><span>&nbsp {{$checkout->soluongphong}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Tầng:</strong><span>&nbsp {{$checkout->sotang}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Đơn Giá:</strong><span>&nbsp {{$checkout->giaphong}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Ngày Nhận Phòng:</strong><span>&nbsp {{date('d-m-yy',strtotime($checkout->ngaynhanphong))}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Ngày Trả Phòng:</strong><span>&nbsp {{date('d-m-yy',strtotime($checkout->ngaytraphong))}}</span></p></td>
            </tr>
            <tr>
              <td><p><font color="#000000"><strong>Tổng Giá:</strong><span>&nbsp {{$tonggia * $checkout->soluongphong}} VND</span></p></td>
            </tr>
            <tr>
              <td>
                <div class="form-datve" >
                  <form id="form-datve" action="{{route('success')}}" method="post" >
                    @csrf
                    <button type="submit" class="button-submit" style="margin: 0 auto;">Đặt phòng</button>
                  </form>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>

<style type="text/css">
    .button-submit{
    width: 150px;
    padding: 8px 0;
    border: none;
    border-radius: 50px;
    background-color: #00b8ff;    
    font-size: 15px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    cursor: pointer;
    float: right;
  }
  .button-submit:hover{
    background: #fa1907ed;
  }
</style>
@endsection

@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/anh2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Suites Hotel &amp; Resort</span>
              <h1 class="mb-4">Xác Nhận Thông Tin</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection

@section('script')

@endsection