@extends('admin.layouts.master')

@section('title')
    Danh sách đặt phòng
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Danh sách đặt phòng</h5>
    </div>
    <div style="padding-top: 20px;margin-left: 8px" class="col-md-3">
        <form action="{{route('danhsachdp')}}" method="GET">
            <div class="form-group">
                <select onchange="this.form.submit()" name="sort" class="form-control">
                    <option value="-1" @if(isset($sort) and $sort==0)selected @endif>Tất Cả</option>
                    <option value="0" @if(isset($sort) and $sort==0)selected @endif>Đã Tiếp Nhận</option>
                    <option value="1" @if(isset($sort) and $sort==1)selected @endif>Đã Đặt</option>
                    <option value="2" @if(isset($sort) and $sort==2)selected @endif>Đã Hủy</option>
                </select>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Loại phòng</th>
                        <th>Thanh toán</th>
                        <th>Tình trạng</th>
                        <th>Ngày đặt</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datphong as $dp)
                    <tr>
                        <td>{{$dp->id}}</td>
                        <td>{{$dp->khachhang->ten}}</td>
                        <td>{{$dp->phong->tenphong}}</td>
                        <td>
                            @if($dp->check == 2  )
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" data-id="{{$dp->id}}" id="{{$dp->id}}" name="{{$dp->id}}" @if($dp->thanhtoan == 1) checked @endif disabled>
                                    <label class="custom-control-label" for="{{$dp->id}}"></label>
                                </div>
                            @else
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" data-id="{{$dp->id}}" id="{{$dp->id}}" name="{{$dp->id}}" @if($dp->thanhtoan == 1) checked @endif>
                                <label class="custom-control-label" for="{{$dp->id}}"></label>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($dp->check==0)
                            <span class="badge badge-primary">{{"Đã tiếp nhận"}}</span>
                            @endif
                            @if($dp->check==1)
                            <span class="badge badge-success">{{"Đã đặt"}}</span>
                            @endif
                            @if($dp->check==2)
                            <span class="badge badge-danger">{{"Đã hủy"}}</span>
                            @endif
                        </td>
                        <td> {{date('d-m-yy G:i',strtotime($dp->created_at)+7*60*60)}}</td>
                        <td><a href="{{route('chitietdp',['id'=>$dp->id])}}" class="badge badge-info">Chi Tiết</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style type="text/css">
    .card-body th{
        text-align: center;
    }
    .card-body td{
        text-align: center;
    }
    
    .alert-danger {
        margin-left: 20px;
        margin-top: 12px;
        margin-right: 20px;
    }
    .alert-success{
        margin-left: 20px;
        margin-top: 12px;
        margin-right: 20px;
    }
    
    .alert {
        margin-bottom: 0;
    }
    .modal-dialog {
    max-width: 800px;
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
</script>
@endsection
