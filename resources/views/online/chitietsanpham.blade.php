<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Chi tiết sản phẩm</title>  
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
		background: #ffffff url({{asset('online/images/nen1.jpg')}}) no-repeat bottom center;
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
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="online/images/logo.jpg" width= "50px" height= "50px" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang chủ</a></li>
						<li class="nav-item"><a class="nav-link" href="{{asset('menu')}}">Thực đơn</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Giới thiệu </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="{{asset('gioithieuchung')}}">Giới thiệu chung</a>
								<a class="dropdown-item" href="{{asset('vanhoagiaan')}}">Văn hóa Gia An</a>
								<a class="dropdown-item" href="{{asset('lichsuhinhthanh')}}">Lịch sử hình thành</a>
								<a class="dropdown-item" href="{{asset('giatricotloi')}}">Giá trị cốt lõi</a>
								<a class="dropdown-item" href="{{asset('cacdanhhieu')}}">Các danh hiệu</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Sản phẩm đóng gói</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="{{asset('sanphamdonggoi')}}">Sản phẩm đóng gói Gia An</a>
								<a class="dropdown-item" href="{{asset('ruoctom')}}">Ruốc tôm Gia An</a>
								<a class="dropdown-item" href="{{asset('chatom')}}">Chả tôm Gia An</a>
								<a class="dropdown-item" href="{{asset('chamuc')}}">Chả mực Gia An</a>
								<a class="dropdown-item" href="{{asset('thitvien')}}">Thịt viên Gia An</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{asset('blog')}}">Tin tức</a></li>
						<li class="nav-item"><a class="nav-link" href="{{asset('cuahang')}}">Cửa hàng</a></li>
						@if(session('cartt'))
						<li class="nav-item"><a class="nav-link" href="{{asset('giohangonline')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng <i class="fa fa-circle" style="font-size:10px;color:red"></i></a></li>
						@else
						<li class="nav-item"><a class="nav-link" href="{{asset('giohangonline')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng </a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="nen4">
	<br>
	<br>	
	<div id="menu">
  <ul>
  @if(Auth::check())
  <li><a href="#"><span class="fa fa-user"></span> {{Auth::user()->name}}</a></li>
	<li><a href="{{asset('dangxuatuser')}}">Đăng xuất</a></li>
	<li><a href="{{asset('lienhe')}}">Liên hệ</a></li>
</ul>
  @else  
  <ul>
	<li><a href="{{asset('dangkyuser')}}">Đăng ký</a></li>
	<li><a href="{{asset('dangnhap')}}">Đăng nhập</a></li>
	<li><a href="{{asset('lienhe')}}">Liên hệ</a></li>
  </ul>
  @endif
</div></div>
	<!-- End header -->
	
<!-- Start Gallery -->
	@if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
				@endif
		<div clas="nen1">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-12">
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="side-blog-img">
							<a class="lightbox" href="{{asset('online/images')}}/{{$sanpham->image}}"width= "250px" height= "250px">
							<img style="width:300px; height:300px;" class="img-fluid" src="{{asset('online/images')}}/{{$sanpham->image}}"width= "250px" height= "250px" alt="Gallery Images">
							</a>							
							</div>
							<div class="inner-blog-detail details-page">
							<h2>{{$sanpham->Ten}}</h2>
							<span>Giá bán: </span>
							@if($sanpham->khuyenmai==0)
							<h4>{{$sanpham->dongia}}.000VNĐ</h4>
							@else
							<h4><del>{{$sanpham->dongia}}.000VNĐ</del> {{$sanpham->khuyenmai}}.000VNĐ</h4>
							@endif
							<h3>{{$sanpham->mota}}</h3>
							<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="{!!url('themgiohangonline',[$sanpham->id])!!}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a><br>
							<div class="clearfix"></div>
							</div>
						</div>						
					</div>
				</div>
			</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
					<div class="right-side-blog">
						<h3>Món ăn liên quan</h3>
						<div class="post-box-blog">
							@foreach($lienquan as $lq)
							<div class="recent-post-box">
								<div class="recent-box-blog">
									<div class="recent-img">
										<img style="width:100px; height:100px;" src="{{asset('online')}}/images/{{$lq->image}}" class="img-fluid" alt="Image">
									</div>
									<div class="recent-info">
									<p>{{$lq->Ten}}</p>
											@if($lq->khuyenmai==0)
											<h4>{{$lq->dongia}}.000VNĐ</h4>
											@else
											<h4><del>{{$lq->dongia}}.000VNĐ</del> {{$lq->khuyenmai}}.000VNĐ</h4>
											@endif
											<a class="add-to-cart pull-left" href="{!!url('themgiohangonline',[$lq->id])!!}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a><br>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div></div>
	<!-- End Gallery -->
	

<br>
	<!-- Start Footer -->
	@include('layout.footer')
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

<!-- ALL JS FILES -->
	<script src="{{asset('online/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('online/js/popper.min.js')}}"></script>
	<script src="{{asset('online/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
	<script src="{{asset('online/js/jquery.superslides.min.js')}}"></script>
	<script src="{{asset('online/js/images-loded.min.js')}}"></script>
	<script src="{{asset('online/js/isotope.min.js')}}"></script>
	<script src="{{asset('online/js/baguetteBox.min.js')}}"></script>
	<script src="{{asset('online/js/form-validator.min.js')}}"></script>
    <script src="{{asset('online/js/contact-form-script.js')}}"></script>
    <script src="{{asset('online/js/custom.js')}}"></script>
	<script>
		function AddCart(id) {
			$.ajax({
				url: 'themgiohangonline/'+ id,
				type: 'GET'
			}).done(function (response) {
				console.log(response);
				$("#changeitem").empty();
				$("#changeitem").html(response);
				alertify.success('Quý khách đã thêm sản phẩm thành công!');
			});
		}
	</script>
</body>
</html>