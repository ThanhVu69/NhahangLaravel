<!-- Start header -->
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
		div.nen4 {
			padding: 10px 0px;
			background: #ffffff url(online/images/nen3.jpg) no-repeat bottom center;
			background-size: cover;
		}
	</style>
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

<!-- <div id="menu">
   <ul>
      <li><a href="#" title="Home">Home</a></li>
      <li><a href="#" title="Blog">Blog</a></li>
      <li><a href="#" title="About">About</a></li>
      <li><a href="#" title="Register">Register</a></li>
      <li><a href="#" title="Contact">Contact</a></li>
   </ul>
</div> -->


<!-- End header -->