@extends('admin.layouts.master')

@section('title')
	Thông tin
@endsection

@section('content')
<div class="data">
        <div class="data-title">
            <h4>Thông tin khách sạn</h4>
        </div>
        <div class="data-form">
            @if(session('thongbao'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{session('thongbao')}}
            </div>
            @endif  
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <strong>Danger!</strong>
                @foreach($errors->all() as $err)
                {{$err}}</br>
                @endforeach
            </div>
            @endif
            <form action="{{route('suathongtin')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="diachi">Địa chỉ: </label>
                            <input type="checkbox" id="changedc" >
                            <input type="text" name="diachi" class="form-control check" value="{{$thongtin->diachi}}" disabled="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sdt">Số điện thoại</label>
                            <input type="text" name="sdt" class="form-control check" value="{{$thongtin->sdt}}" disabled="">
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control check" value="{{$thongtin->email}}" disabled="">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 col-6">
                        <button type="submit" class="btn btn-success" style="width: 100%">Sửa</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#changedc').change(function(){
            if($(this).is(":checked"))
            {
                $(".check").removeAttr('disabled');
            }
            else
            {
                $(".check").attr('disabled','');
            }

        });
    });
</script>
@endsection