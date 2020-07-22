@extends('admin.layouts.master')

@section('title')
	Danh sach
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Danh sách phòng</h5>
    </div>
    <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Thêm phòng</button>
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
                    <h4 class="modal-title">Thêm phòng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('themphong')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name">Tên phòng</label>
                                <input type="text" name="tenphong" class="form-control">
                            </div>
                        </div>
                        <div style="display: flex;" class="form-group">
                            <div class="col-md-6">
                                <label >Loại phong</label>
                                <select class="form-control" name="loaiphong">
                                    @foreach($loaiphong as $lp)
                                    <option value="{{$lp->id}}">{{$lp->tenloai}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label >Tầng</label>
                                <select  class="form-control" name="tang">
                                    @foreach($tang as $t)
                                    <option value="{{$t->id}}">{{$t->sotang}}</option>
                                    @endforeach
                                </select>
                             </div>
                        </div>
                        <div style="display: flex;" class="form-group">
                            <div class="col-md-6">
                                <label for="name">Số lượng</label>
                                <input type="text" name="soluong" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="name">Diện tích</label>
                                <input type="text" name="dientich" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name">Giá phòng</label>
                                <input type="text" name="giaphong" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name">Thông tin phòng</label>
                                <textarea name="thongtin" class="form-control" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="hinh" class="form-control" onchange="showanh1(event)"><br/>
                                <p><img name="hinh" width="400px" height="250px" src="anhicon/iconanh.png" id="hinhthem"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Ảnh phòng</label>
                                <input type="file" name="anh[]" class="form-control" multiple >
                            </div>
                        </div>
                         <div class="col-md-12">
                            <button type="submit" class="btn btn-success" style="width: 120px;">Thêm</button>
                        </div>
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
                    <h4 class="modal-title">Sửa phòng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suaphong')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="sua-id">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name">Tên phòng</label>
                                <input type="text" name="tenphong" class="form-control" id="sua-tenphong">
                            </div>
                        </div>
                        <div style="display: flex;" class="form-group">
                            <div class="col-md-6" id="lamthu">
                                <label >Loại phong</label>
                                <select  class="form-control" name="loaiphong">
                                    @foreach($loaiphong as $lp)
                                    <option id="{{$lp->id}}" value="{{$lp->id}}">{{$lp->tenloai}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label >Tầng</label>
                                <select  class="form-control" name="tang">
                                    @foreach($tang as $t)
                                    <option id="{{$t->id}}" value="{{$t->id}}">{{$t->sotang}}</option>
                                    @endforeach
                                </select>
                             </div>
                        </div>
                        <div style="display: flex;" class="form-group">
                            <div class="col-md-6">
                                <label for="name">Số lượng</label>
                                <input type="text" name="soluong" class="form-control" id="sua-soluong">
                            </div>
                            <div class="col-md-6">
                                <label for="name">Diện tích</label>
                                <input type="text" name="dientich" class="form-control" id="sua-dientich">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name">Giá phòng</label>
                                <input type="text" name="giaphong" class="form-control" id="sua-giaphong">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name">Thông tin phòng</label>
                                <textarea name="thongtin" class="form-control" rows="6" id="sua-thongtin"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="hinh" class="form-control" onchange="showanh(event)"><br/>
                                <p><img name="hinh" width="400px" height="250px" src="anhicon/iconanh.png" id="hinhsua"></p>
                            </div>
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
                        <th>Tên phòng</th>
                        <th>Hình đại diện</th>
                        <th>Số lượng phòng</th>
                        <th>Phòng còn trống</th>
                        <th>Diện tích</th>
                        <th>Giá phòng(VND)</th>
                        <th>Loại phòng</th>
                        <th>Tầng</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phong as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->tenphong}}</td>
                        <td><img width="150px" src="anhphong1/{{$p->anhdaidien}}" />
                        </td>
                        <td>{{$p->soluong}}</td>
                        <td>{{$p->sophongtrong}}</td>
                        <td>{{$p->dientich}}</td>
                        <td>{{$p->giaphong}}</td>
                        <td>{{$p->loaiphong->tenloai}}</td>
                        <td>{{$p->tang->sotang}}</td>
                        <td>
                            <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$p->id}}" data-tenphong="{{$p->tenphong}}" data-anhdaidien="{{$p->anhdaidien}}" data-soluong="{{$p->soluong}}" data-dientich="{{$p->dientich}}" data-giaphong="{{$p->giaphong}}" data-idloaiphong="{{$p->idLoaiPhong}}" data-idtang="{{$p->idTang}}" data-thongtin="{{$p->thongtin}}"><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$p->id}}"><i class="fas fa-trash-alt"></i>
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
    max-width: 1000px;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".sua").click(function(){
            id = $(this).data('id');
            tenphong = $(this).data('tenphong');
            anhdaidien = $(this).data('anhdaidien');
            soluong = $(this).data('soluong');
            dientich = $(this).data('dientich');
            giaphong = $(this).data('giaphong');
            idLoaiPhong = $(this).data('idloaiphong');
            idTang = $(this).data('idtang');
            thongtin = $(this).data('thongtin');
            duongdan="anhphong1/";              
            $('#sua-id').val(id);
            $('#sua-tenphong').val(tenphong);
            $('#sua-anhdaidien').val(anhdaidien);
            $('#sua-soluong').val(soluong);
            $('#sua-dientich').val(dientich);
            $('#sua-giaphong').val(giaphong);
            $('#sua-thongtin').val(thongtin);
            $('#hinhsua').attr('src',duongdan+anhdaidien);
            $('#'+idLoaiPhong).attr('selected',true);
            $('#'+idTang).attr('selected',true);         
        })
    })
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoaphong')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            })
        }
    })
</script>
@endsection