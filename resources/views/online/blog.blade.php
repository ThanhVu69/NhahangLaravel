<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Tin tức</title>  
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
					<h1>TIN TỨC GIA AN</h1>
				</div>
			</div>
		</div>
    </div>
	
	<!-- Start blog -->
	<div class="nen3">
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Trang tin tức Gia An</h2>
						<p>Cập nhật tin tức khuyến mãi và vệ sinh an toàn thực phẩm</p>
					</div>
				</div>
			</div>
			
			<div class="row">
			@foreach($tintuc as $tt)
				<div class="col-lg-4 col-md-6 col-12">				
					<div class="blog-box-inner">					
						<div class="blog-img-box" style="width:290px; height:350px; background-size: cover;">
							<img class="img-fluid" src="online/images/{{$tt->hinh}}" alt="">
						</div>					
						<div class="blog-detail">
							<h4>{{$tt->tieude}}</h4>
							<ul>
								<li><span>{{$tt->updated_at}}</span></li>
							</ul>
							<p>{!! $tt->tomtat !!}</p>	
							<a href="blogdetail/{{$tt->id}}">Xem chi tiết <i class="fa fa-chevron-right"></i></a>					
						</div>						
					</div>					
				</div>
				@endforeach
			</div>
			
		</div>
	</div></div>
	<!-- End blog -->
	
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
	<script src="online/js/form-validator.min.js"></script>
    <script src="online/js/contact-form-script.js"></script>
    <script src="online/js/custom.js"></script>
</body>
</html>