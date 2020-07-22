@extends('admin.layouts.master')

@section('title')
    Liên hệ
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

                        <h3 class="profile-username text-center">{{$lienhe->ten}}</h3>

                        <p class="text-muted text-center">{{$lienhe->email}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Số điện thoại:</b> <a class="float-right">{{$lienhe->sdt}}</a>
                            </li>
                            
                            <li class="list-group-item">
                                <b>Ngày gửi:</b> <a class="float-right">{{date('l d-m-yy h:i',strtotime($lienhe->created_at)+7*60*60)}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tình Trạng:</b> 
                                @switch($lienhe->check)
                                    @case (0)
                                    <a class="float-right text-primary" id="text-status">Chưa Xem</a>
                                    @break
                                    @case (1)
                                    <a class="float-right text-primary" id="text-status">Đã Xem</a>
                                    @break
                                @endswitch
                            </li>
                            <li class="list-group-item">
                                <b>Tiếp nhận:</b> <a class="float-right">
                                   <div class="custom-control custom-switch">
                                     <input type="checkbox" data-toggle="toggle" id="changestatus" data-onstyle="primary" data-id="{{$lienhe->id}}" @if($lienhe->check == 1) checked  @endif>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-top" style="height: 97.5%;">
                    <div class="card-header">
                        <h3 class="card-title">Ý kiến khách hàng</h3>
                    </div>
                    <div class="card-body box-profile" style="padding-top: 80px;">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Ý kiến</b> <a class="float-right">{{$lienhe->loinhan}}</a>
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
    $('#changestatus').change(function() {
        id = $(this).data('id');
        status = 0;
        text = "";
        if($(this).prop('checked')){
            status = 0;
            text = "Chưa Xem";
        }
        else{
            status = 1;
            text = "Đã Xem";
        }
        $.ajax({
            url: '{{route('tiepnhanykien')}}',
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