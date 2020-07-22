@extends('admin.layouts.master')

@section('title')
	Danh sách bài viết
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Danh sách bài viết</h5>
    </div>
    <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Thêm bài viết</button>
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
                    <h4 class="modal-title">Thêm bài viết</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('thembaiviet')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Loại bài viết</label>
                            <select class="form-control" name="loaibaiviet">
                                @foreach($loaibaiviet as $lbv)
                                <option value="{{$lbv->id}}">{{$lbv->tenloai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Tóm tắt</label>
                            <textarea name="tomtat" class="form-control" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Nội dung</label>
                            <textarea name="noidung" class="form-control ckeditor" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinh" class="form-control" onchange="showanh1(event)"><br/>
                            <p><img name="hinh" width="400px" height="250px" src="anhicon/iconanh.png" id="hinhthem"></p>
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
                    <h4 class="modal-title">Sửa bài viết</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body" id="form-edit">
                    
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
                        <th>Hình bài viết</th>
                        <th>Tiêu đề</th>
                        <th>Loại bài viết</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($baiviet as $bv)
                    <tr>
                        <td>{{$bv->id}}</td>
                        <td><img width="100px" src="anhbaiviet/{{$bv->hinh}}" />
                        </td>
                        <td>{{$bv->tieude}}</td>
                        <td>{{$bv->loaibaiviet->tenloai}}</td>
                        <td>
                            <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$bv->id}}" data-tieude="{{$bv->tieude}}" data-tomtat="{{$bv->tomtat}}" data-noidung="{{$bv->noidung}}" data-hinh="{{$bv->hinh}}" data-idloaibaiviet="{{$bv->idLoaiBaiViet}}" ><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$bv->id}}"><i class="fas fa-trash-alt"></i>
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
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
<script type="text/javascript" src="{{asset('admin_asset/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sua").click(function(){
            id = $(this).data('id');  
            $.ajax({
                url:'{{route('ajaxBaiViet')}}',
                type:'get',
                data:{id:id},
                success:function(d){
                    $('#form-edit').html(d);
                },
                error:function(){
                    alert('Không thể hoàn thành thao tác này');
                }
            })
            hinh = $(this).data('hinh');
            duongdan="anhbaiviet/";
            $('#hinhsua').attr('src',duongdan+hinh);  
        });
    });
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoabaiviet')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            });
        };
    });
</script>

@endsection
