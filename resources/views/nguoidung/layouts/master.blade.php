<!DOCTYPE html>
<html lang="en">
  <head>
    <title>One Night&mdash; Hotel</title>
    <base href="{{asset('')}}" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="trangchu_asset/fonts/icomoon/style.css">

    <link rel="stylesheet" href="trangchu_asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="trangchu_asset/css/magnific-popup.css">
    <link rel="stylesheet" href="trangchu_asset/css/jquery-ui.css">
    <link rel="stylesheet" href="trangchu_asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="trangchu_asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="trangchu_asset/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="trangchu_asset/css/animate.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    
    
    <link rel="stylesheet" href="trangchu_asset/fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="trangchu_asset/css/aos.css">

    <link rel="stylesheet" href="trangchu_asset/css/style.css">
    
  </head>
  <body class="preloading">
    <div id="preload" class="preload-container text-center">
        <span class="fas fa-spinner preload-icon rotating"></span>
      </div>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    @include('nguoidung.layouts.menu')
  
    <!-- Slide -->
    
    @yield('slide')
    
    @yield('content')

    @include('nguoidung.layouts.footer')
  </div>
</div>

  <script src="trangchu_asset/js/jquery-3.3.1.min.js"></script>
  <script src="trangchu_asset/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="trangchu_asset/js/jquery-ui.js"></script>
  <script src="trangchu_asset/js/popper.min.js"></script>
  <script src="trangchu_asset/js/bootstrap.min.js"></script>
  <script src="trangchu_asset/js/owl.carousel.min.js"></script>
  <script src="trangchu_asset/js/jquery.stellar.min.js"></script>
  <script src="trangchu_asset/js/jquery.countdown.min.js"></script>
  <script src="trangchu_asset/js/jquery.magnific-popup.min.js"></script>
  <script src="trangchu_asset/js/bootstrap-datepicker.min.js"></script>
  <script src="trangchu_asset/js/aos.js"></script>
  <script src="trangchu_asset/js/mediaelement-and-player.min.js"></script>
  <script src="trangchu_asset/js/main.js"></script> 
  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
      $(window).on("load",function(){
          $('body').removeClass('preloading');
          $('#preload').fadeOut('fast');
      });
    </script>
    @yield('script')
</body>
<style type="text/css">
  .preloading {
    overflow: hidden;
}
.preload-container {
    width: 100%;
    height: 100%;
    background: #00b8ff;
    position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    z-index: 99999999999;
    display: block;
    padding-right: 17px;
    overflow-x: hidden;
    overflow-y: auto;
}
.preload-icon {
    font-size: 66px;
    color: #fff;
    margin-top: 20%;
}
@-webkit-keyframes {
  from {
    -webkit-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes rotating {
  from {
    -ms-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -ms-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.rotating {
  -webkit-animation: rotating 1.5s linear infinite;
  -moz-animation: rotating 1.5s linear infinite;
  -ms-animation: rotating 1.5s linear infinite;
  -o-animation: rotating 1.5s linear infinite;
  animation: rotating 1.5s linear infinite;
}
.site-footer {
    padding-bottom: 0;
}
</style>
</html>