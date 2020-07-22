 <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">HÌNH ẢNH KHÁCH SẠN</h2>
          </div>
        </div>
        <div class="row no-gutters">
          @foreach($anhkhachsan as $aks)
          <div class="col-md-6 col-lg-3">
            <a href="anhkhachsan/{{$aks->hinh}}" class="image-popup img-opacity"><img src="anhkhachsan/{{$aks->hinh}}" alt="Image" class="img-fluid"></a>
          </div>
          @endforeach
        </div>
      </div>
    </div>