@extends('admin.layouts.master')

@section('title')
    Ý kiến khách hàng
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Danh sách ý kiến</h5>
    </div>
    <div class="col-md-3 col-6" style="margin-top: 20px;margin-left: 10px;">
        <form action="{{route('danhsachykien')}}" method="GET">
            <div class="form-group">
                <label for="sort" style="font-weight: 700;">Tình Trạng:</label>
                <select onchange="this.form.submit()" name="sort" class="form-control">
                    <option value="-1" @if(isset($sort) and $sort==0)selected @endif>Tất Cả</option>
                    <option value="0" @if(isset($sort) and $sort==0)selected @endif>Chưa Xem</option>
                    <option value="1" @if(isset($sort) and $sort==1)selected @endif>Đã xem</option>
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
                        <th>Tên liên hệ</th>
                        <th>Email</th>
                        <th>Tình trạng</th>
                        <th>Ngày gửi</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lienhe as $lh)
                    <tr>
                        <td>{{$lh->id}}</td>
                        <td>{{$lh->ten}}</td>
                        <td>{{$lh->email}}</td>
                        <td>
                            @if($lh->check==0)
                            <span class="badge badge-danger">{{"Chưa xem"}}</span>
                            @endif
                            @if($lh->check==1)
                            <span class="badge badge-success">{{"Đã xem"}}</span>
                            @endif
                        </td>
                        <td> {{date('d-m-yy G:i',strtotime($lh->created_at)+7*60*60)}}</td>
                        <td><a href="{{route('chitietykien',['id'=>$lh->id])}}" class="badge badge-info">Chi Tiết</a></td>
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
