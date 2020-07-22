@extends('nguoidung.layouts.master')

@section('content')
<div class="site-section ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                <h2 class="mb-5" style="text-transform: uppercase;">{{$phong1->tenphong}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs1-12 col-xs2-12 col-xs3-12 col-xs4-12">
                <div class="slide-one-item home-slider owl-carousel">
                    @foreach($anhphong as $ap)
                    <div class="site-blocks-cover overlay" style="background-image: url(anhphong2/{{$ap->anh}}); height:600px;" >
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row" style="padding: 35px 0px 0px;margin: 0;">       
        <p style="padding-left: 10px">{{$phong1->thongtin}}</p>
          <table style="display: inline-block; vertical-align: top;padding-left: 10px">
              <tbody>
                  <tr>
                      <td><b><font style="line-height: 18px;"><font style="font-size: 20px;" color="#000000">Thông tin phòng: &nbsp;</font></b></font>
                        <br>
                        <font color="#000000">Số lượng: </font></font></b><span style="line-height: 18px;"><font color="#000000">&nbsp;</font>{{$phong1->soluong}} phòng</span>
                        <br>
                        <font color="#000000">Diện tích: </font></font></b><span style="line-height: 18px;"><font color="#000000">&nbsp;</font>{{$phong1->dientich}} m2</span>
                        <br>
                        <font color="#000000">Tầng: </font></font></b><span style="line-height: 18px;"><font color="#000000">&nbsp;</font>{{$phong1->tang->sotang}}</span>
                      </td>
                  </tr>
              </tbody>
          </table>
            <div class="price">
                <img src="anhicon/icon_price.png"><span class="basicPrice">{{$phong1->giaphong}} VNĐ</span>
                <a class="inquiry pull-right" href="{{route('viewlienhe')}}">Liên hệ</a>
                <span class="pull-right sep-text">|</span>
                <a class="inquiry pull-right datphong"  id="booking-btn">Đặt phòng</a>
            </div>
        </div>
        <div class="site-section bg-light" id="booking-form" style="padding:48px 0; display: none;">
            <div class="container">
              <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                  <h2 class="mb-5" style="text-transform: uppercase;">Tìm kiếm phòng trống</h2>
                   <form action="{{route('timkiem')}}" method="get" id="datphong_form">
                        <input type="hidden" name="id" value="{{$phong1->id}}">
                        
                        <div class="form-group">
                          @if(count($errors)>0)
                          <div class="alert alert-danger">
                            @foreach($errors->all() as $err) {{$err}}
                            <br> @endforeach
                          </div>
                          @endif
                        <div style="display: flex;" class="form-group">
                            <div class="col-md-6">
                                <label for="name">Ngày nhận phòng</label>
                                <input type="date" name="ngaynhanphong" class="form-control">
                            </div>
                             <div class="col-md-6">
                                <label for="name">Ngày trả phòng</label>
                                <input type="date" name="ngaytraphong" class="form-control">
                            </div>
                        </div>
            
                          <div id="thuthoi">
                            
                            <button type="submit" class="btn btn-success" style="width: 120px;">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

    </div>
    </div>
</div>

<style type="text/css">
.site-blocks-cover.overlay:before {
    background: none;
}

#booking-btn:hover{
    color: black;
}

#booking-btn{
  color: #F23A2E;
  cursor: pointer;
}

div.price {
    color: #fff;
    float: left;
    font-family: didact_gothicregular;
    font-size: 15px;
    margin-top: 10px;
    width: 100%;
}
span.basicPrice {
    color: #802e58;
    float: left;
    font-size: 26px;
    font-weight: normal;
    margin-top: 2px;
}
div.price .inquiry.pull-right {
    font-weight: bold;
    margin-top: 14px;
}
div.price span.sep-text {
    color: #8da0cf;
    margin: 14px 8px 0;
}
span.sep-text {
    color: #987c61;
    margin: 0 8px;
    margin-top: -3px;
    font-weight: bold;
    font-size: 15px;
    float: right;
    position: relative;
}
.pull-right {
    float: right !important;
}
div.price a.book {
    font-weight: bold;
    margin-top: 13px;
    text-decoration: underline;
}
div.price a{
  font-size: 20px;
}
.modal-dialog {
    max-width: 1000px;
    }
.error_form
{
   top: 12px;
   color: rgb(216, 15, 15);
    font-size: 15px;
    font-family: Helvetica;
}
</style>
@endsection

@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/anh2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Suites Hotel &amp; Resort</span>
              <h1 class="mb-4">Phòng</h1>
            </div>
          </div>
        </div>
      </div>  
@endsection

@section('script')
<script type="text/javascript">
   $(document).ready(function(){
        $(".datphong").click(function(){
            id = $(this).data('id');
            giaphong = $(this).data('giaphong'); 
            $('#giaphong').val(giaphong);            
            $('#'+id).attr('selected',true);         
        });
        $("#changephong").change(function(){
          var idphong=$(this).val();
        });
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