@extends('nguoidung.layouts.master')

@section('content')
<div class="site-section ">
    <div class="container">
      <div class="row" style="margin: 0px;">
        <div class="col-md-12 boder">
          <h4>{{$baiviet->tieude}}</h4>
          <span class="time-up">Ngày đăng: {{date('d-m-yy G:i',strtotime($baiviet->created_at)+7*60*60)}}</span>
          <p class="time-up"><i class="fas fa-eye"></i> Lượt xem: {{$baiviet->luotxem}}</p>
          <div class="news-content">
            {!!$baiviet->noidung!!}
          </div>
          <div class="news">
            <h3><i class="far fa-newspaper"></i>&nbsp Tin Liên Quan</h3>
            <table class="table" style="margin-top: 30px;">
              <tbody>
                @foreach($baivietkhac as $bvk)
                <tr>
                  <td>
                    <a href="{{route('viewbaiviet',['tieude'=>$bvk->tenkhongdau.'-'.$bvk->id])}}"><h5><i class="fas fa-caret-right"></i> {{$bvk->tieude}}</h5></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<style type="text/css">
  .boder{
    margin: 40px 0px;
    border: 1px solid #ddd;
    padding-top: 30px;
    padding-bottom: 30px; 
  }

  .boder h4{
    font-size: 30px;
    font-weight: bold;
  }

  .news-content{
    margin-top: 30px;
    margin-bottom: 30px;
  }

  .border{
    margin: 40px 0px;
    border: 1px solid #ddd;
  }

  .news-content img{
    max-width: 100%;
  }
  .boder h4{
    text-align: center;
  }
  .news h3 {
    font-size: 18px;
    padding-bottom: 5px;
    border-bottom: 2px solid #ef5222;
}
  .news table tbody tr td h5 {
      font-size: 14px;
      color: #17a2b8;
  }
</style>
@endsection

@section('slide')
    <div class="site-blocks-cover overlay" style="background-image: url(trangchu_asset/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Suites Hotel &amp; Resort</span>
              <h1 class="mb-4">Tin Tức Sự Kiện </h1>
            </div>
          </div>
        </div>
      </div>  
@endsection