<form action="{{route('suabaiviet')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="sua-id" value="{{$baiviet->id}}">
    <div class="form-group">
        <label>Loại bài viết</label>
        <select class="form-control" name="loaibaiviet">
            @foreach($loaibaiviet as $lbv)
            @if($lbv->id == $baiviet->idLoaiBaiViet)
            <option value="{{$lbv->id}}" selected>{{$lbv->tenloai}}</option>
            @else
            <option value="{{$lbv->id}}">{{$lbv->tenloai}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Tiêu đề</label>
        <input type="text" name="tieude" class="form-control" id="sua-tieude" value="{{$baiviet->tieude}}">
    </div>
    <div class="form-group">
        <label for="name">Tóm tắt</label>
        <textarea name="tomtat" class="form-control" id="sua-tomtat" rows="6">{{$baiviet->tomtat}}</textarea>
    </div>
    <div class="form-group"> 
            <label for="name">Nội dung</label>                         
            <textarea name="noidung" id="cke" class="form-control" rows="6">{{$baiviet->noidung}}</textarea>
    </div>
    <div class="form-group">
        <label>Hình ảnh</label>
        <input type="file" name="hinh" class="form-control" id="sua-hinhanh" value="{{$baiviet->hinh}}" onchange="showanh(event)" ><br/>
        <p><img name="hinh" width="400px" height="250px" src="anhbaiviet/{{$baiviet->hinh}}" id="hinhsua"></p>
    </div>
    <button type="submit" class="btn btn-success" style="width: 120px;">Sửa</button>
</form>
<script>    CKEDITOR.replace( 'cke' );</script>
