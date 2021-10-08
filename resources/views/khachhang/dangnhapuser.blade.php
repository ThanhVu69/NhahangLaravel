<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng nhập</title>
<link rel="icon" type="image/png" href="login1/images/icons/lo.jpg"/>
<link href="login/css/bootstrap.min.css" rel="stylesheet">
<link href="login/css/datepicker3.css" rel="stylesheet">
<link href="login/css/styles.css" rel="stylesheet">
<style>
    div.nen1 {
        padding: 70px 0px;
		background-image: url(login/img/thiennhien.jpg);
		background-size: cover;
    		 }
	div.nen2 {
	padding: 70px 0px;
	background: #ffffff url({{asset('online/images/nen2.jpg')}}) no-repeat bottom center;
	background-size: cover;
			}
	div.nen3 {
	padding: 70px 0px;
	background: #ffffff url(online/images/nen3.jpg) no-repeat bottom center;
	background-size: cover;
			}
	</style>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<div class="nen1">
	<div class="container">
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default">
  				<div class="container-fluid">
                	<ul class="nav navbar-nav">
                        <li><a href="index">Trang chủ</a></li>
                	</ul>
                </div>
            </nav>
        </div>
    </div>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Đăng nhập</div>
				<div class="panel-body">
							@if(count($errors) > 0)
						<div class="alert alert-danger">Lỗi rồi</div>
							@foreach($errors->all() as $err)
								{{$err}}<br>
							@endforeach
						</div> 
						@endif
						
						@if(session('thongbao'))
							<div class="alert alert-danger">
								{{session('thongbao')}}
							</div>
						@endif

					<form role="form" action="{{url('dangnhapuser')}}" method="post">
					
						<fieldset>
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>	
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<!-- <label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label> -->
							</div>
							{!! csrf_field() !!}
							<button type="submit" class="btn btn-default">Đăng nhập</button>
							<!-- <a class="btn btn-primary">Đăng nhập</a> -->
						</fieldset>
						<h5>Nếu chưa có tài khoản quý khách vui lòng <a href="dangkyuser">đăng ký</a></h5>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	</div>
		

	<script src="login/js/jquery-1.11.1.min.js"></script>
	<script src="login/js/bootstrap.min.js"></script>
	<script src="login/js/chart.min.js"></script>
	<script src="login/js/chart-data.js"></script>
	<script src="login/js/easypiechart.js"></script>
	<script src="login/js/easypiechart-data.js"></script>
	<script src="login/js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>