@extends('admin.layouts.master')

@section('title')
	Đổi mật khẩu
@endsection

@section('content')
<div class="data">
        <div class="data-title">
            <h4>Đổi mật khẩu</h4>
        </div>
        <div class="data-form">
            @if(session('thongbao'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{session('thongbao')}}
            </div>
            @endif
            @if(session('status'))
            <div class="alert alert-danger">
                <strong>Danger!</strong> {{session('status')}}
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
            <form action="{{route('changePassword')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id">Id:</label>
                    <input type="text" value="{{Auth::user()->id}}" disabled="true" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="{{Auth::user()->email}}" disabled="true" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sdt">Nhập mật khẩu cũ:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sdt">Nhập mật khẩu mới:</label>
                    <input type="password" name="newpass" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sdt">Nhập lại mật khẩu mới:</label>
                    <input type="password" name="newpass2" class="form-control">
                </div>
                <div class="submit">
                    <button type="submit" class="btn btn-success" style="width: 100%">Lưu</button>
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