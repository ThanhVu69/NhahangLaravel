<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Sản phẩm đóng gói</title>  
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
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>SẢN PHẨM ĐÓNG GÓI</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->	

	   <!-- Start About -->
<div class="nen1">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="inner-column">
					<div class="col-md-12">
					        <img src="online/images/Baner facebook spdg.jpg" alt="" class="img-fluid" />
						</div>
						<br>
						<h1>Các thông tin chung về sản phẩm đóng gói Bánh cuốn Gia An: </h1>
						<p>- Các sản phẩm đóng gói: Ruốc tôm Gia An, Chả tôm Gia An, Chả mực Gia An, Thịt viên Gia An.</p>
						<p>- Giá cả: thấp hơn giá bán tại các cửa hàng Bánh cuốn Gia An khoảng 28%. Cụ thể:</p>
						@foreach($sanphamdonggoi as $spdg)
						<p>{{$spdg->Ten}} giá @if($spdg->khuyenmai==0)
											{{$spdg->dongia}}.000VNĐ
											@else
											<del>{{$spdg->dongia}}.000VNĐ</del> {{$spdg->khuyenmai}}.000VNĐ
											@endif</p>
						@endforeach
						<p>- Sản phẩm được sản xuất và giao hàng tận nơi khi có đơn hàng đặt trước qua số điện thoại 1900 6445. Các sản phẩm được sản xuất và giao hàng trong cùng 1 ngày.</p>
						<p>- Các sản phẩm không sử dụng: chất bảo quản, phụ gia, phẩm mầu, hương liệu. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

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