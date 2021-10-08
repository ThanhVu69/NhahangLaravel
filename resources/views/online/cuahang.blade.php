<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Hệ thống cửa hàng</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="online/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="online/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="online/css/bootstrap.min.css">    
	<!-- menu thêm -->
	<link rel="stylesheet" href="online/css/menu.css">  
	<!-- Site CSS -->
    <link rel="stylesheet" href="online/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="online/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="online/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    div.nen1 {
        padding: 70px 0px;
		background: #ffffff url(online/images/nen1.jpg) no-repeat bottom center;
		background-size: cover;
    		 }
	div.nen2 {
	padding: 70px 0px;
	background: #ffffff url(online/images/nen2.jpg) no-repeat bottom center;
	background-size: cover;
			}
	div.nen3 {
	padding: 70px 0px;
	background: #ffffff url(online/images/nen3.jpg) no-repeat bottom center;
	background-size: cover;
			}
	</style>
</head>

<body>
	<!-- Start header -->
	@include('layout.header')
	<!-- End header -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>HỆ THỐNG CỬA HÀNG</h1>
				</div>
			</div>
		</div>
    </div>
    <!-- Start Menu -->
	
	<div class="nen2">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
                @foreach($cuahang as $ch)
                <h2>{{$ch->DiaChi}}</h2>
                @endforeach	
                </div>
                <div class="col-lg-6">
                @foreach($cuahang as $ch)
                <h2>{{$ch->SDT}}</h2>
                @endforeach	
				</div>
			</div>
		<div>
            Truy cập bản đồ: <a href="https://www.google.com/maps/@19.6281055,105.6060776,15z">Tại đây</a>
        </div>
			
		</div>

	<!-- End Menu -->
	@include('layout.reviews')
	
	
	<!-- Start Footer -->
	@include('layout.footer')
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

<!-- ALL JS FILES -->
	<script src="online/js/jquery-3.2.1.min.js"></script>
	<script src="online/js/popper.min.js"></script>
	<script src="online/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="online/js/jquery.superslides.min.js"></script>
	<script src="online/js/images-loded.min.js"></script>
	<script src="online/js/isotope.min.js"></script>
	<script src="online/js/baguetteBox.min.js"></script>
	<script src="online/js/jquery.mapify.js"></script>
	<script src="online/js/form-validator.min.js"></script>
    <script src="online/js/contact-form-script.js"></script>
	<script src="online/js/custom.js"></script>
	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
	
	
</body>
</html>