<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<!-- head -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>Bánh cuốn Gia An</title>
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
	<!-- button -->
	<link rel="stylesheet" href="online/css/button.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="online/css/style.css">
	<!-- Định dạng ảnh -->
	<link rel="stylesheet" href="online/css/thumb.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="online/css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="online/css/custom.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!--head  -->
	<style>
        #mainqc {
            position: fixed;
            right:0px;
            bottom: 0;
            width: 350px;
        }
        #tatqc, #moqc {
            width: 80%;
            padding: 10px;
            background: teal;
            text-align: right;
        }
        #moqc {
            display: none;
        }
        a {
            color:white;
            text-decoration: none;
        }
        a: hover{
            text-decoration: underline;
        }
    </style>
	<style>
		div.nen1 {
			padding: 20px 0px;
			background: #ffffff url(online/images/nen1.jpg) no-repeat bottom center;
			background-size: cover;
		}

		div.nen2 {
			padding: 20px 0px;
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

<!-- Start slides -->
	@if(session('thongbao'))
	<div class="alert alert-success">
		{{session('thongbao')}}
	</div>
	@endif
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="online/images/slide1-su-khac-biet-ve-banh-cuon.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong> SỰ KHÁC BIỆT VỀ <br> BÁNH CUỐN</strong></h1>
							<p class="m-b-40">Bí quyết gia truyền tạo ra hương vị bánh cuốn đặc biệt “nguyên chất từ
								gạo”, có đầy đủ độ dai, dẻo, bùi, ngậy, <br>
								ngọt gạo,thơm gạo mà không cửa hàng bánh cuốn nào khác có được.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="datban">Đặt bàn</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="online/images/slide2-an-toan-ve-sinh-thuc-pham.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>AN TOÀN <br> VỆ SINH THỰC PHẨM</strong></h1>
							<p class="m-b-40">Tất cả các sản phẩm của bánh cuốn Gia An <br>
								tuyệt đối không sử dụng hàn the, đường hóa học và các chất phụ gia độc hại.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="datban">Đặt bàn</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="online/images/slide3-thuc-chat-va-minh-bach.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>THỰC CHẤT <br> VÀ MINH BẠCH</strong></h1>
							<p class="m-b-40">Các sản phẩm của bánh cuốn Gia An được làm thực chất, không “làm hàng”.
								<br>
								Hương vị thơm ngon của sản phẩm có được từ nguyên liệu tươi ngon và bí quyết chế biến
								làm nổi bật các hương vị tự nhiên. </p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="datban">Đặt bàn</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
<!-- End slides -->

<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Giới thiệu chung </h1>
						<p>Bánh cuốn Gia An là chuỗi cửa hàng chuyên về bánh cuốn thành công nhất tại Hà Nội. Đón hàng
							ngàn lượt khách hàng mỗi ngày có lẽ đã đủ nói lên vị trí của bánh cuốn Gia An trong lòng
							thực khách Hà Thành. </p>
						<p>Từ cửa hàng đầu tiên tại phố Trần Huy Liệu khai trương vào tháng 10/2008 đến nay Bánh cuốn
							Gia An đã có 17 cửa hàng tại hầu hết các quận Hà Nội. Bánh cuốn Gia An vẫn đang tiếp tục mở
							thêm các cửa hàng tại Hà Nội và bắt đầu có kế hoạch mở rộng sang các thành phố khác.</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="datban">Đặt bàn</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="online/images/Gioithieuchung-Banh-cuon-gia-an.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
<!-- End About -->

<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						<i>Suốt thời gian qua bánh cuốn Gia An đã nỗ lực không ngừng vì niềm tin chất lượng mà khách
							hàng gửi gắm. Đó là niềm tin về sản phẩm ngon, sạch và tuyệt đối không dùng hàn the, đường
							hoá học, các chất bảo quản, các chất phụ gia độc hại.
						</i></p>
				</div>
			</div>
		</div>
	</div>
<!-- End QT -->

<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Sản phẩm tiêu biểu</h2>
					</div>
				</div>
			</div>
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
							role="tab" aria-controls="v-pills-home" aria-selected="true">Đồ ăn</a>
						<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
							role="tab" aria-controls="v-pills-profile" aria-selected="false">Đồ uống</a>
						<!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Sản phẩm đóng gói</a> -->
						<!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dinner</a> -->
					</div>
				</div>

				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
							aria-labelledby="v-pills-home-tab">
							<div class="row">
								@foreach($monan as $ma)
								<div class="col-lg-4 col-md-6 special-grid drinks">
									@if($ma->khuyenmai!=0)
									<div class="wrapper">
										<div class="ribbon-wrapper-green">
											<div class="ribbon-green">Sale</div>
										</div>
									</div>
									@else
									<div class="wrapper">
										<div class="ribbon-wrapper-green">
											<div class="ribbon-green">New</div>
										</div>
									</div>
									@endif
									<div class="gallery-single fix">
									
									<div class="thumb">
										<img src="online/images/{{$ma->image}}" class="img-fluid" alt="Image">
										</div>
										<div class="why-text">
											<h4>Đồ ăn</h4>
											<p>{{$ma->Ten}}</p>
											@if($ma->khuyenmai==0)
											<h4>{{$ma->dongia}}.000VNĐ</h4>
											@else
											<h4><del>{{$ma->dongia}}.000VNĐ</del> {{$ma->khuyenmai}}.000VNĐ</h4>
											@endif
											<div class="single-item-caption">
											@if(Auth::check())
											<a class="add-to-cart pull-left" id="changeitem" onclick="AddCart({{$ma->id}})"
													href="javascript:"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ
													hàng</a><br>
											@else  
													<a class="add-to-cart pull-left" 
													href="#" onclick="return confirm('Quý khách phải đăng nhập')"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ
													hàng</a><br>
											@endif
												<a class="beta-btn primary" href="chitietsanpham/{{$ma->id}}">Xem chi
													tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>

						</div>
						<div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
							aria-labelledby="v-pills-profile-tab">
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
											@if(Auth::check())
											<a class="add-to-cart pull-left" id="changeitem" onclick="AddCart({{$mu->id}})"
													href="javascript:"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ
													hàng</a><br>
											@else  
													<a class="add-to-cart pull-left" 
													href="#" onclick="return confirm('Quý khách phải đăng nhập')"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ
													hàng</a><br>
											@endif
												<a class="beta-btn primary" href="chitietsanpham/{{$mu->id}}">Xem chi
													tiết <i class="fa fa-chevron-right"></i></a>
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
	</div>
	<!-- End Menu -->

<!-- Sản phẩm đóng gói -->

	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Sản phẩm đóng gói</h2>
						<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p> -->
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="ruoctom" width="250px" height="250px">
							<img class="img-fluid" src="online/images/Ruoc tom 1.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="chatom">
							<img class="img-fluid" src="online/images/Cha tom gia an.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="chamuc">
							<img class="img-fluid" src="online/images/Cha muc 1.jpg" alt="Gallery Images">
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="thitvien">
							<img class="img-fluid" src="online/images/Thit vien.jpg" width="250px" height="250px"
								alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Sản phẩm đóng gói -->
<!-- Ẩn hiện quảng cáo -->
    <div id="mainqc">
        <div id="tatqc">
            <a href="#" onClick="hide()">Tắt</a>
        </div>
        <div id="picqc">
        <a href="datban">
            <img src="online/images/datbanonline.png" width= "250px" height= "150px">
        </a>
        </div>
        <div id="moqc">
            <a href="#" onClick="show()">Mở</a>
        </div>
    </div>


@include('layout.reviews')


<!-- Start Footer -->
	@include('layout.footer')
<!-- End Footer -->




	<a href="#" id="back-to-top" title="Lên đầu trang" style="display: none;"><i class="fa fa-paper-plane-o"
			aria-hidden="true"></i></a>

<!-- ALL JS FILES -->
	<script src="online/js/jquery-3.2.1.min.js"></script>
	<script src="online/js/popper.min.js"></script>
	<script src="online/js/bootstrap.min.js"></script>
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
<!-- ALL PLUGINS -->
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
 <script>
        function hide() {
            document.getElementById("tatqc").style.display="none";
            document.getElementById("picqc").style.display="none";
            document.getElementById("moqc").style.display="block";
        }
        function show() {
            document.getElementById("tatqc").style.display="block";
            document.getElementById("picqc").style.display="block";
            document.getElementById("moqc").style.display="none";
        }
    </script>

</body>

</html>