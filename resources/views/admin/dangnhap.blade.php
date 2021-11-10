<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng nhập</title>
<!-- Site Icons -->
<link rel="shortcut icon" href="online/images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="online/images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="online/css/bootstrap.min.css">
	<!-- menu thêm -->
	<link rel="stylesheet" href="online/css/menu.css">
	<!-- button -->
	<link rel="stylesheet" href="online/css/button.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="online/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="online/css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="online/css/custom.css">
<link rel="icon" type="image/png" href="login1/images/icons/lo.jpg"/>
<link href="login/css/bootstrap.min.css" rel="stylesheet">
<link href="login/css/datepicker3.css" rel="stylesheet">
<link href="login/css/styles.css" rel="stylesheet">
<style type="text/css">
        body{
            background-image: url(login/img/thiennhien.jpg);
        }
    </style>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
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
							<div class="alert alert-success">
								{{session('thongbao')}}
							</div>
						@endif

					<form role="form" action="{{url('dangnhap')}}" method="post">
					
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
						<h5>Nếu chưa có tài khoản xin vui lòng <a href="dangkyuser">đăng ký</a></h5>
						<button type="button" id="forgetPassword">Quên mật khẩu ?</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	


	<div class="modal fade" id="modalresetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<form >
			<div class="modal-content" style="min-width:100px">
            <div class="modal-header">
					<h4 class="modal-title">Lấy lại mật khẩu</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="col-xs-10 col-xs-offset-1 ">
			<div class="login-panel panel panel-default">
				<div class="form-group">
					<input type="email" id="remail" class="form-control" placeholder="Nhập email của bạn " name="remail" required>
					</div>
                    <div class="form-group">
					<input type="password" id="rnew_password" class="form-control" placeholder="Nhập mật khẩu mới" name="rnew_password" required>
					</div>
					<div class="form-group">
					<input type="password" id="cfrnew_password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="cfrnew_password" required>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					<button id="resetpass" type="submit" class="btn btn-primary">Lưu thay đổi</button>
				</div>
			</div>
			</div>
			</div>
		</form>
	</div>
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
		});
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});

		$('#forgetPassword').click(function(){
        $('#modalresetPassword').modal('show');
    });


	$(document).on("click", "#resetpass", function(arg){
        arg.preventDefault();
        var remail = $('#remail').val();
        var rnew_password = $('#rnew_password').val();
        console.log(remail);
        console.log(rnew_password);
		if($('#remail').val()==""){
            alert("Chú ý!","Bạn chưa nhập mật email","error");
        }
        if($('#rnew_password').val()==""){
            alert("Chú ý!","Bạn chưa nhập mật khẩu mới","error");
        }
        if($('#cfrnew_password').val()==""){
            alert("Chú ý!","Nhập lại mật khẩu mới","error");
        }
        if($('#rnew_password').val()!=$('#cfrnew_password').val()){
            alert("Chú ý!","Xác minh mật khẩu sai","error");
        }else{
			$.ajax({
                url: "{{ url('quenmatkhau')}}",
                data: {
					remail:remail,
					rnew_password:rnew_password},
                type: "GET",
                dataType: "JSON", 
                success: function(response){
                    if(response == "success"){
                        alert("Đã thay đổi mật khẩu");
                        $('#modalresetPassword').modal('hide');
                    }else if(response == "error_email"){
                        alert("Email của bạn nhập không đúng");
                    }
                    else{
                        alert("Lỗi rồi",);
                    }
                },
        });
		}
        
    });
	</script>	
</body>

</html>
