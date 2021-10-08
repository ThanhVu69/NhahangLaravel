<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Thực đơn</title>  
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
	<!-- Start All Pages -->
	
	@if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
				@endif
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>THỰC ĐƠN</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->	
	<!-- Start Menu -->
	<div class="nen2">
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					
				</div>
			</div>
			
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Đồ ăn</a>
						<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Đồ uống</a>
						<!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Sản phẩm đóng gói</a> -->
						<!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dinner</a> -->
					</div>
				</div>
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
							@foreach($monan as $ma)
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
									<a href="chitietsanpham/{{$ma->id}}">
										<img src="online/images/{{$ma->image}}" class="img-fluid" alt="Image">
									</a>	
										<div class="why-text">
										<h4>Đồ ăn</h4>
											<p>{{$ma->Ten}}</p>
											@if($ma->khuyenmai==0)
											<h4>{{$ma->dongia}}.000VNĐ</h4>
											@else
											<h4><del>{{$ma->dongia}}.000VNĐ</del> {{$ma->khuyenmai}}.000VNĐ</h4>
											@endif
											<div class="single-item-caption">
											<a class="add-to-cart pull-left" id="changeitem" onclick="AddCart({{$ma->id}})"
													href="javascript:"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ
													hàng</a><br>
											<a class="beta-btn primary" href="chitietsanpham/{{$ma->id}}">Xem chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							</div>
							
						</div>
						<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
							<div class="row">
							@foreach($monuong as $mu)
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="online/images/{{$mu->image}}" class="img-fluid" alt="Image">
										<div class="why-text">
										<h4>Đồ uống</h4>
											<p>{{$mu->Ten}}</p>
											@if($mu->khuyenmai==0)
											<h4>{{$mu->dongia}}.000VNĐ</h4>
											@else
											<h4><del>{{$mu->dongia}}.000VNĐ</del> {{$mu->khuyenmai}}.000VNĐ</h4>
											@endif
											<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{!!url('themgiohangonline',[$mu->id])!!}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a><br>
											<a class="beta-btn primary" href="chitietsanpham/{{$mu->id}}">Xem chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>										
											</div>
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
			
		</div>
	</div></div>
	
	<!-- End Menu -->
	
	
	<!-- Start Customer Reviews -->
	@include('layout.reviews')
	<!-- End Customer Reviews -->
	
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