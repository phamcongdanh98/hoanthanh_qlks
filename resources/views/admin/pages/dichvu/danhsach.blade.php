@extends('admin.layouts.master')

@section('title')
    Danh Sách Dịch Vụ
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Danh sách dịch vụ</h5>
    </div>
    <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Thêm Dịch Vụ</button>
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
    @if(session('loi'))
    <div class="alert alert-danger">
        {{session('loi')}}
    </div>
    @endif

    <div class="modal fade" id="myModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('themdichvu')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Tên dịch vụ</label>
                            <input type="text" name="tendichvu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinh" class="form-control" onchange="showanh1(event)"><br/>
                            <p><img name="hinh" width="400px" height="250px" src="anhicon/iconanh.png" id="hinhthem"></p>
                        </div>
                        <div class="form-group">
                                <label for="name">Tình Trạng</label>
                                <select name="tinhtrang" class="form-control">
                                    <option value="Hiển Thị">Hiển Thị</option>
                                    <option value="Không Hiển Thị">Không Hiển Thị</option>
                                </select>
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
                    <h4 class="modal-title">Sửa dịch vụ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suadichvu')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="sua-id">
                        <div class="form-group">
                            <label for="name">Tên dịch vụ</label>
                            <input type="text" name="tendichvu" class="form-control" id="sua-tendichvu">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinh" class="form-control" id="sua-hinhanh" onchange="showanh(event)"><br/>
                            <p><img name="hinh" width="400px" height="250px" src="anhicon/iconanh.png" id="hinhsua"></p>
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
                        <th>Tên dịch vụ</th>
                        <th>Hình dịch vụ</th>
                        <th>Hiển thị</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dichvu as $dv)
                    <tr>
                        <td>{{$dv->id}}</td>
                        <td>{{$dv->tendichvu}}</td>
                        <td><img width="100px" src="anhdichvu/{{$dv->hinh}}" style="width:100%;max-width:300px" /></td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" data-id="{{$dv->id}}" id="{{$dv->id}}" name="{{$dv->id}}" @if($dv->tinhtrang == 'Hiển Thị') checked @endif>
                                <label class="custom-control-label" for="{{$dv->id}}"></label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$dv->id}}" data-tendichvu="{{$dv->tendichvu}}" data-hinh="{{$dv->hinh}}"><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$dv->id}}"><i class="fas fa-trash-alt"></i>
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
    $(document).ready(function(){
        $(".sua").click(function(){
            id = $(this).data('id');
            tendichvu = $(this).data('tendichvu');
            hinh = $(this).data('hinh');
            tinhtrang = $(this).data('tinhtrang');
            duongdan="anhdichvu/";
            $('#sua-id').val(id);
            $('#sua-tendichvu').val(tendichvu);
            $('#sua-hinh').val(hinh);
            $('#hinhsua').attr('src',duongdan+hinh);
        })
    })
    $('.custom-control-input').click(function(){
        var id = $(this).data('id');
        var tinhtrang ="Hiển Thị";
        if($(this).prop('checked')){
            tinhtrang = "Hiển Thị";
        }
        else{
            tinhtrang = "Không Hiển Thị";
        }
        $.ajax({
            url: '{{route('tinhtrangdv')}}',
            type: 'POST',
            data:{id:id,tinhtrang:tinhtrang,_token:"{{csrf_token()}}"},
            error:function(){
                alert('không thể hoàn thành thao tác')
            }
        })
    })
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoadichvu')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            })
        }
    })
</script>
@endsection
