<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập quản lý khách sạn</title>
  <base href="{{asset('')}}">
	<link rel="stylesheet" type="text/css" href="admin_asset/css/login.css">
	<link href="admin_asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="admin_asset/css/nunito.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="admin_asset/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="admin_asset/img/bg.svg">
		</div>
		<div class="login-content">
			<form action="admin/dangnhap" method="POST">
        @csrf
				<img src="admin_asset/img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
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
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" class="input" name="email" autofocus>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input"name="password">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Đăng Nhập">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="admin_asset/js/login.js"></script>
</body>
</html>