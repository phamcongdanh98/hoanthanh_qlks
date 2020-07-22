@extends('admin.layouts.master')

@section('title')
    Danh sach
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Danh sách user</h5>
    </div>
    <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Thêm User</button>
    </div>
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

    <div class="modal fade" id="myModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm quản lý</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('themuser')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Nhập Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Nhập lại Password</label>
                            <input type="password" name="passwordAgain" class="form-control">
                        </div>
                        <div class="form-group">
                                <label>Quyền tài khoản</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" checked="" type="radio">Nhân viên
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" type="radio">Quản lý
                                </label>
                            </div>
                        <button type="submit" class="btn btn-success" style="width: 120px;">Thêm</button>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="suaModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chỉnh sửa thông tin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suauser')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="sua-id">
                        <div class="form-group">
                            <label for="name">UserName </label>
                            <input type="text" name="name" class="form-control" id="sua-ten">
                        </div>
                        <div class="form-group">
                            <label for="name">Email </label>
                            <input type="text" name="email" class="form-control" id="sua-email" disabled="true">
                        </div>
                         <div class="form-group">
                                <label>Quyền tài khoản</label>
                                <label class="radio-inline">
                                    <input name="quyen1" value="0" id="nhanvien" type="radio">Nhân viên
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen1" value="1" id="quanly" type="radio">Quản lý
                                </label>
                            </div>
                        <button type="submit" class="btn btn-success" style="width: 120px;">Sửa</button>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Chức vụ</th>
                        <th>Tình Trạng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>
                            @if($u->quyen==1)
                            <span class="badge badge-danger">{{"Quản lý"}}</span> 
                            @else
                            <span class="badge badge-primary">{{"Nhân viên"}}</span>
                            @endif
                        </td>
                        <td>
                            @if(Cache::has('user-is-online-' . $u->id))
                            <span class="text-success">Online</span>
                            @else
                            <span class="text-danger">Offline</span>
                            @endif

                        </td>
                        <td>
                            <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$u->id}}" data-ten="{{$u->name}}" data-email="{{$u->email}}" data-quyen="{{$u->quyen}}" data-password="{{$u->password}}"><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$u->id}}"><i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<style type="text/css">
    .card-body th {
        text-align: center;
    }
    
    .card-body td {
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
    .radio-inline{
        padding-left: 10px;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".sua").click(function(){
            id = $(this).data('id');
            ten = $(this).data('ten');
            email = $(this).data('email');
            quyen = $(this).data('quyen');
            $('#sua-id').val(id);
            $('#sua-ten').val(ten);
            $('#sua-email').val(email);
            if(quyen == 1){
                $('#quanly').attr("checked","true");
              }else{
                $('#nhanvien').attr("checked","true");  
              }
        })
    })
    
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoauser')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            })
        }
    })
</script>
@endsection