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
    <link rel="shortcut icon" href="{{asset('online/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('online/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('online/css/bootstrap.min.css')}}">    
	<!-- menu thêm -->
	<link rel="stylesheet" href="{{asset('online/css/menu.css')}}">  
	<!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('online/css/style.css')}}">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('online/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('online/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    div.nen1 {
        padding: 70px 0px;
		background: #ffffff url(/online/images/nen1.jpg) no-repeat bottom center;
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
	<!-- Start blog details -->
	<div class="nen2">
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
				<div class="col-xl-8 col-lg-8 col-12">
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="side-blog-img">
								<img class="img-fluid" src="{{asset('online')}}/images/{{$tintuc->hinh}}" alt="">							
							</div>
							<div class="inner-blog-detail details-page">
								<ul>
									<li><i class="zmdi zmdi-time"></i>Cập nhật : <span>{{$tintuc->updated_at}}</span></li>
								</ul>
								{!! $tintuc->noidung !!}
							</div>
						</div>						
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
					<div class="right-side-blog">
						<h3>Bài mới nhất</h3>
						<div class="post-box-blog">
							@foreach($moinhat as $mn)
							<div class="recent-post-box">
								<div class="recent-box-blog">
									<div class="recent-img">
										<img class="img-fluid" src="/online/images/{{$mn->hinh}}" alt="">
									</div>
									<div class="recent-info">
										<ul>
										<li><i class="zmdi zmdi-time"></i>Cập nhật : <span>{{$mn->updated_at}}</span></li>
										</ul>
										<h4>{!! $mn->tomtat !!}</h4>
										<a href="{{asset('blogdetail')}}/{{$mn->id}}">Xem thêm</a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
	<!-- End details -->
	
	
	<!-- Start Footer -->
	@include('layout.footer')
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
	
	<script src="{{asset('js/jquery.superslides.min.js')}}"></script>
	<script src="{{asset('js/images-loded.min.js')}}"></script>
	<script src="{{asset('js/isotope.min.js')}}"></script>
	<script src="{{asset('js/baguetteBox.min.js')}}"></script>
	<script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>