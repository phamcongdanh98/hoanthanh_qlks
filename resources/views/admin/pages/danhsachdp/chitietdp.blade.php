@extends('admin.layouts.master')

@section('title')
    Danh sách đặt phòng
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-top">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                            src="{{asset('img/user.png')}}"
                            alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$khachhang->ten}}</h3>

                        <p class="text-muted text-center">{{$khachhang->email}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Điện Thoại:</b> <a class="float-right">{{$khachhang->sdt}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Chung minh nhan dan:</b> <a class="float-right">{{$khachhang->cmnd}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ngày Đặt:</b> <a class="float-right">{{date('l d-m-yy h:i',strtotime($datphong->created_at)+7*60*60)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Thanh Toán:</b> <a class="float-right">
                                    @if($datphong->check == 2)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" data-id="{{$datphong->id}}" id="customCheck" name="example1" @if($datphong->thanhtoan == 0) checked @endif disabled>
                                        <label class="custom-control-label" for="customCheck"></label>
                                    </div>
                                    @else
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" data-id="{{$datphong->id}}" id="customCheck" name="example1" @if($datphong->thanhtoan == 1) checked @endif>
                                        <label class="custom-control-label" for="customCheck"></label>
                                    </div>
                                    @endif
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Tình Trạng:</b> 
                                @switch($datphong->check)
                                    @case (0)
                                    <a class="float-right text-primary" id="text-status">Đã tiếp nhận</a>
                                    @break
                                    @case (1)
                                    <a class="float-right text-primary" id="text-status">Đã đặt</a>
                                    @break
                                    @case (2)
                                    <a class="float-right text-success" id="text-status">Đã Hủy</a>
                                    @break
                                @endswitch
                            </li>
                            <li class="list-group-item">
                                <b>Tiếp nhận:</b> <a class="float-right">
                                   <div class="custom-control custom-switch">
                                     <input type="checkbox" data-toggle="toggle" id="changestatus" data-onstyle="primary" data-id="{{$datphong->id}}" @if($datphong->check == 0) checked @endif @if($datphong->check == 2) disabled @endif>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        @if($datphong->check == 0 || $datphong->check == 1)
                        <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-danger"><b>Hủy Đặt phòng</b></a>
                        <div class="modal fade" id="modal-danger">
                            <div class="modal-dialog">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hủy Đặt phòng</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có chắc chắn muốn hủy đặt phòng ?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Đóng</button>
                                        <form action="{{route('admin_cancel_ticket')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$datphong->id}}">
                                            <button type="submit" class="btn btn-outline-light">Hủy đặt phòng</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-top" style="height: 97.5%;">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin Phòng</h3>
                    </div>
                    <div class="card-body box-profile" style="padding-top: 80px;">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Tên phòng</b> <a class="float-right">{{$phong->tenphong}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Đơn giá</b> <a class="float-right">{{$phong->giaphong}} VND/ ngày</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ngày nhận phòng</b> <a class="float-right">{{$datphong->ngaynhanphong}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ngày ngày trả phòng</b> <a class="float-right">{{$datphong->ngaytraphong}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Số lương phòng đặt</b> <a class="float-right">{{$datphong->soluongphong}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Số lượng khách</b> <a class="float-right">{{$datphong->soluongkhach}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tổng thanh toán</b> <a class="float-right">{{$datphong->tonggia}} VNĐ</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<style type="text/css">
    .toast{
        width: 350px !important;
    }
    .seat{
    height: 28px;
    width: 35px;
    color: #999;
    cursor: pointer;
    border: 1px solid #424242;
    border-radius: 3px;
    padding: 5px 10px;
    background: #2b2b2b;
    margin: 2px 4px 2px 2px;
    display: inline-block;
    font-weight: 700;
    font-size: 11px;
    text-align: center;

  }
  .card-top{
    border-top: 3px solid #0c45c6;
   }
</style>

@endsection



@section('script')
<script type="text/javascript">
    $('.custom-control-input').click(function(){
        var id = $(this).data('id');
        var thanhtoan =0;
        if($(this).prop('checked')){
            thanhtoan = 1;
        }
        else{
            thanhtoan = 0;    }
            $.ajax({
                url: '{{route('thanhtoan')}}',
                type: 'POST',
                data:{id:id,thanhtoan:thanhtoan,_token:"{{csrf_token()}}"},
                error:function(){
                    alert('không thể hoàn thành thao tác')
                }
            })
        })
    $('#changestatus').change(function() {
        id = $(this).data('id');
        status = 0;
        text = "";
        if($(this).prop('checked')){
            status = 0;
            text = "Đã Tiếp Nhận";
        }
        else{
            status = 1;
            text = "Đã Đặt";
        }
        $.ajax({
            url: '{{route('tiepnhan')}}',
            type: 'post',
            data: {id:id,status:status,_token:"{{csrf_token()}}"},
            success:function(){
                $("#text-status").text(text);
            },
            error:function(){
                alert('Không thể hoàn thành thao tác');
            }
        })
    });

</script> 
@endsection