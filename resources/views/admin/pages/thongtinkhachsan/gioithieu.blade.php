@extends('admin.layouts.master')

@section('title')
	Giới thiệu
@endsection

@section('content')
<div class="data">
        <div class="data-title">
            <h4>Giới thiệu</h4>
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
            <form action="{{route('suagioithieu')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tomtat">Tóm tắt</label>
                            <input type="checkbox" id="changebox" >
                            <textarea name="tomtat" class="form-control check" rows="6" disabled="">{{$gioithieu->tomtat}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tomtat">Link video</label>
                            <input type="text" name="linkvideo" class="form-control check" value="{{$gioithieu->linkvideo}}" disabled="">
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
        $('#changebox').change(function(){
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