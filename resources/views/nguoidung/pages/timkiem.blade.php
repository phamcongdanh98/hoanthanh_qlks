@extends('nguoidung.layouts.master')

@section('content')

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
       <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Đặt Phòng</h2>
          </div>
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
          
            
          
            <form action="{{route('checkout')}}" method="POST" enctype="multipart/form-data" id="datphong_form">
                        @csrf
                        <input type="hidden" name="id" value="{{$phong->id}}">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name" class="labelcolor">Họ và tên: </label> <span class="error_form" id="loi_ten_thongbao" style="color: red;"></span>
                                <input type="text" name="ten" class="form-control" id="ten_form">
                            </div>
                        </div>
                        <div  class="form-group">                         
                            <div class="col-md-12">
                               <label for="name" class="labelcolor">Số điện thoại: </label> <span class="error_form" id="loi_sdt_thongbao"></span>
                                <input type="text" name="sdt" class="form-control" id="sdt_form">
                             </div>
                             
                        </div>
                        <div style="display: flex;" class="form-group">
                            <div class="col-md-6">
                                <label for="name" class="labelcolor">Email</label> <span style="color: red;" class="error_form" id="loi_email_thongbao"></span>
                                <input type="email" name="email" class="form-control" id="email_form">
                            </div>
                           <div class="col-md-6">
                                <label for="name" class="labelcolor">Số cmnd: </label> <span class="error_form" id="loi_cmnd_thongbao"></span>
                                <input type="text" name="cmnd" class="form-control" id="cmnd_form">
                            </div>
                        </div>
                         <div style="display: flex;" class="form-group">
                            <div class="col-md-6">
                                <label for="name" class="labelcolor">Số lượng phòng</label>
                                <input type="number" min="1" name="soluongphong" max="{{$chuadat}}" class="form-control" id="soluongphong" value="1">
                            </div>
                             <div class="col-md-6">
                                <label for="name" class="labelcolor">Số lượng khách</label>
                                <input type="text" name="soluongkhach" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div id="thuthoi">
                            </div>
                            <button type="submit" class="btn btn-success" style="width: 120px;">Tiếp tục</button>
                        </div>
                    </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Thông tin phòng</h3>
              <p class="mb-0 font-weight-bold" style="color: black">Loại phòng<p class="mb-4" style="color: red">{{$phong->tenphong}}</p></p>

              <p class="mb-0 font-weight-bold" style="color: black">Ngày nhận phòng</p>
              <p class="mb-4" style="color: red">{{$ngaynhan}}</p>

              <p class="mb-0 font-weight-bold" style="color: black">Ngày trả phòng</p>
              <p class="mb-0" style="color: red">{{$ngaytra}}</p>

              <p class="mb-0 font-weight-bold" style="color: black">Sớ lượng phòng trống</p>
              <p class="mb-4" style="color: red">{{$chuadat}}</p>

              <p class="mb-0 font-weight-bold" style="color: black">Giá Phòng</p>
              <p class="mb-0" style="color: red">{{$phong->giaphong}}/ ngày</p>

              <p class="mb-0 font-weight-bold" style="color: black">Tổng thanh toán</p>
              <p class="mb-0" id="tonggia" style="color: red">{{$tonggia}} VND</p>

            </div>
            
            
          </div>
        </div>
      </div>
    </div>

<style type="text/css">
  .labelcolor
  {
    color: black;
  }
</style>

@endsection

@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/anh2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Suites Hotel &amp; Resort</span>
              <h1 class="mb-4">Tìm Kiếm Phòng</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection

@section('script')
<script type="text/javascript">
  $('#soluongphong').change(function(){
    soluong = $(this).val();
    gia = {{$tonggia}};
    $('#tonggia').text(soluong*gia + ' VND');
  });
   $(function() {
         $("#loi_ten_thongbao").hide();
         $("#loi_cmnd_thongbao").hide();
         $("#loi_sdt_thongbao").hide();

         var loi_ten = false;
         var loi_cmnd = false;
         var loi_sdt = false;

         $("#ten_form").focusout(function(){
            check_ten();
         });
         $("#cmnd_form").focusout(function(){
            check_cmnd();
         });
         $("#sdt_form").focusout(function(){
            check_sdt();
         });

         $('#booking-btn').click(function(){
            $('#booking-form').slideToggle();
         });

         function check_ten() {
            var kitu_cam = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/;
            var kitu_dodai = $("#ten_form").val().length;
            var ten = $("#ten_form").val();
            if (kitu_dodai < 30 && kitu_cam.test(ten)==false && ten !== '') {
               $("#loi_ten_thongbao").hide();
            } else {
               $("#loi_ten_thongbao").html("Dữ liệu nhập sai định dạng tên hoặc quá dài");
               $("#loi_ten_thongbao").show();
               loi_ten = true;
            }
         }

         function check_sdt() {
            var kitu = /^[0-9]*$/;
            var kitu_dodai = $("#sdt_form").val().length;
            var sdt = $("#sdt_form").val();
            if (kitu_dodai ==10 && kitu.test(sdt) && sdt !== '') {
               $("#loi_sdt_thongbao").hide();
            } else {
               $("#loi_sdt_thongbao").html("Số điện thoại phải 10 số ");
               $("#loi_sdt_thongbao").show();
               loi_sdt = true;
            }
         }
          function check_cmnd() {
            var kitu = /^[0-9]*$/;
            var kitu_dodai = $("#cmnd_form").val().length;
            var cmnd = $("#cmnd_form").val();
            if (kitu_dodai ==9 && kitu.test(cmnd) && cmnd !== '') {
               $("#loi_cmnd_thongbao").hide();
            } else {
               $("#loi_cmnd_thongbao").html("Số cmnd phải là số và 9 số");
               $("#loi_cmnd_thongbao").show();
               loi_cmnd = true;
            }
         }

      });
</script>
@endsection