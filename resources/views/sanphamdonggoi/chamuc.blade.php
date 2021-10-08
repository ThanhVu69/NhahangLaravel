<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Chả mực Gia An</title>  
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
	@if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>CHẢ MỰC GIA AN</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->	
	 <!-- Start About -->
	 <div class="nen1">
	<div class="container">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
							@foreach($chamuc as $ma)
								<div class="col-lg-6 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
									<a href="chitietsanpham/{{$ma->id}}">
										<img src="online/images/{{$ma->image}}" class="img-fluid" alt="Image">
									</a>	
										<div class="why-text">
										<h4>Sản phẩm đóng gói</h4>
											<p>{{$ma->Ten}}</p>
											@if($ma->khuyenmai==0)
											<h4>{{$ma->dongia}}.000VNĐ</h4>
											@else
											<h4><del>{{$ma->dongia}}.000VNĐ</del> {{$ma->khuyenmai}}.000VNĐ</h4>
											@endif
											<div class="single-item-caption">
											<a class="add-to-cart pull-left" 
													href="{!!url('themgiohangonline',[$ma->id])!!}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ
													hàng</a><br>
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
	<div class="nen2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="inner-column">
						<p><i>Slogan sản phẩm</i></p>
						<p>“Từ mực mai tươi sống”</p>
						<p><i>Đặc điểm sản phẩm</i></p>
						<p>Bánh cuốn Gia An làm chả mực theo cách mà người Hạ Long, Quảng Ninh làm. Tại Hạ Long, hàng ngày từ 3-4h sáng các tàu đánh bắt hải sản gần bờ cập bến, những con Mực Mai còn sống được lựa chọn để chuyển lên Hà Nội và được Bánh cuốn Gia An chế biến làm chả mực ngay trong ngày. Quan trọng hơn, chả mực Bánh cuốn Gia An hoàn toàn làm từ Mực Mai tươi sống mà không pha độn bất kỳ loại mực gì khác. Miếng chả mực Gia An có sắc vàng rộm tự nhiên, hương thơm sực nức ngay từ trên chảo rán, vị ngọt đậm đà giàu đạm biển và độ dẻo dai tươi ngon xen lẫn những miếng mực giã dối giòn sần sật rất thú vị. </p>
						<p><i>Nguyên vật liệu</i></p>
						<p>Mực mai tươi sống, thịt mỡ, gia vị.</p>
						<p>Không sử dụng: chất bảo quản, phụ gia, phẩm mầu, hương liệu.</p>
						<p><i>Sản xuất và giao hàng</i></p>
						<p>Chả mực Gia An được sản xuất và giao hàng tận nơi khi có đơn hàng. Sản phẩm được sản xuất và giao hàng trong cùng 1 ngày.</p>
						<p><i>Bảo quản</i></p>
						<p>Ngăn đá tủ lạnh. Chỉ rã đông số lượng vừa đủ ăn. Sau khi rã đông nên sử dụng ngay. Trường hợp sử dụng hết trong vòng 24h từ khi nhận hàng có thể bảo quản ngăn mát tủ lạnh. Sản phẩm cần được bảo quản ngay sau khi nhận hàng.</p>
						<p><i>Hạn sử dụng</i></p>
						<p>15 ngày từ ngày sản xuất</p>
						<p><i>Hướng dẫn sử dụng</i></p>
						<p>Rã đông tự nhiên 30 phút. Nên rán ngập dầu bằng xoong sâu lòng. Cho chả vào xoong khi dầu lăn tăn, không để dầu sôi quá già. Rán vừa lửa khoảng trên 1 phút đến khi chả nổi lên.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="nen3">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="inner-column">
					<p><i>Kết quả thử nghiệm sản phẩm</i></p>
					<div class="col-md-8">
							<img src="online/images/CHAMUCPAGE0.jpg" alt="" class="img-fluid" />
							<img src="online/images/CHAMUCPAGE1.png" alt="" class="img-fluid" />
							<img src="online/images/CHAMUCPAGE2.png" alt="" class="img-fluid" />
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- End About -->

	@include('layout.reviews')
	
	<!-- Start Footer -->
	@include('layout.header')
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