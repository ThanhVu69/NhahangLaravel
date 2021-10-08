<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Liên hệ</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="online/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="online/images/apple-touch-icon.png">
<!-- menu thêm -->
<link rel="stylesheet" href="online/css/menu.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="online/css/bootstrap.min.css">    
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
					<h1>LIÊN HỆ</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	<div class="map-full"></div>
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Thông tin liên hệ</h2>
						<p>Công ty CP Toàn Phong</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form action="lienhe" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" required data-error="Please enter your name">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<!-- <div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Địa chỉ email" id="email" class="form-control" name="name" required data-error="Please enter your email">
									<div class="help-block with-errors"></div>
								</div> 
							</div> -->
							<div class="col-md-12">
								<div class="form-group"> 
									<textarea class="form-control" id="message" name="message" placeholder="Lời nhắn" rows="4" data-error="Write your message" required></textarea>
									<div class="help-block with-errors"></div>
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" id="submit" type="submit">Gửi</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div> 
									<div class="clearfix"></div> 
								</div>
							</div>
						</div>            
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->
	
	<!-- Start Contact info -->
	@include('layout.reviews')
	<!-- End Contact info -->
	
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
	<script>
		$('.map-full').mapify({
			points: [
				{
					lat: 21.0152587,
					lng: 105.7990065,
					marker: true,
					title: '70 Trung Hòa',
					infoWindow: 'Công ty CP Toàn Phong'
				}
			]
		});	
	</script>
</body>
</html>