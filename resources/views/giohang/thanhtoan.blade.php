<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
<!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Giỏ hàng</title>  
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
    .inner-column{
        font-family: 'Arial', sans-serif;
    }
	div.nen2 {
	padding: 70px 0px;
	background: #ffffff url(online/images/nen2.jpg) no-repeat bottom center;
    background-size: cover;
    font-family: 'Rubik', sans-serif;
			}
	div.nen3 {
	padding: 70px 0px;
	background: #ffffff url(online/images/nen3.jpg) no-repeat bottom center;
    background-size: cover;
    font-family: 'Rubik', sans-serif;
			}
	</style>
<!-- head -->
</head>

<body>
<!-- Start header -->
	@include('layout.header')
<!-- End header -->



@if(session('cartt'))
<!-- Main content -->
	<div class="nen2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="inner-column">
<!-- /.box-header -->
            <div class="box-body">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
			<h3>Phụ phí= 33%*(100.000VNĐ-giá trị đơn hàng)</h3>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style=" width:200px; text-align: center">Tên</th>
                  <th style=" text-align: center">Hình ảnh</th>
                  <th style=" text-align: center">Số lượng</th>
                  <th style=" text-align: center">Xóa</th>
                  <th style=" text-align: center">Đơn giá (nghìn VNĐ)</th>
                  <th style=" text-align: center">Tổng (nghìn VNĐ)</th>
                </tr>
                
                </thead>              
                <tbody>
                <form action="giohangonline" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <?php $total = 0; $subtotal = 0?>
                
            @if(session('cartt'))
            @foreach(session('cartt') as $id => $details)
			 <?php 
				 $phuphi= 0;
				 if($details['khuyenmai']==0){
					$subtotal += $details['price'] * $details['quantity'];
				 }
				 else{
					$subtotal += $details['khuyenmai'] * $details['quantity'];
				 }								 
				 if($subtotal<100){
				 
					$phuphi += 0.33* (100 - $subtotal);
					$total = $subtotal + $phuphi;
				   }
				   else{
					   $phuphi=0;
					   $total = $subtotal + $phuphi;
				   }
				 ?>   

                <tr style=" text-align: center">
                    <td><h2>{{ $details['name'] }}</h2></td>
                    <td><img src="online/images/{{ $details['image'] }}" height="100px"> </td>
					<td class="cart_quantity" data-id="{{ $id }}" style=" width:100px; text-align: center">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>                        
                    <td class="actions" style=" text-align: center" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
				    <td>
					@if ( $details['khuyenmai']  ==0)
						{{ number_format($details['price']) }}.000VNĐ
						@else
						<del>{{number_format ($details['price']) }}.000VNĐ</del>
						{{ number_format($details['khuyenmai']) }}.000VNĐ
						@endif
						</td>
                    <td>
					@if ($details['khuyenmai']==0)
					{{ number_format($details['price'] * $details['quantity'] ) }}.000VNĐ
					@else
					{{ number_format($details['khuyenmai'] * $details['quantity']) }}.000VNĐ
					@endif
					</td>					
                 </tr>
                 @endforeach
        @endif               
                </tbody>               
                </tfoot>
              </table>
              <div class="span4 pull-right">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
				<tr>
				<th>Tạm tính </th>
                  <th>{{ number_format($subtotal) }}.000VNĐ</th>
				</tr>
				<tr>
				<th>Phụ phí </th>
                  <th>{{ number_format($phuphi) }}.000VNĐ</th>
				</tr>
                <tr>				  
				  <th>Tổng tiền </th>
                  <th>{{ number_format($total) }}.000VNĐ</th>
                </tr>
                </thead>
                </tfoot>
              </table>
			</div>
			<div>
        <h1>Thông tin của Quý Khách</h1>
      </div>
      @if(Auth::check())
      <div class="form-group">
        <label>Họ và tên</label>
        <input type="text" name="ten" class="form-control" placeholder="Họ và tên" value="{{Auth::user()->name}}"
          required />
      </div>
      <label>Giới tính</label><br>
      <label class="ra">Nam
        <input type="radio" @if(Auth::user()->gioitinh ==1)checked @endif name="gioitinh" value="1">
        <span class="checkmark"></span>
      </label>
      <label class="ra">Nữ
        <input type="radio" @if(Auth::user()->gioitinh ==0)checked @endif name="gioitinh" value="0">
        <span class="checkmark"></span>
      </label>
      <div class="form-group">
        <label>SĐT</label>
        <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại" value="{{Auth::user()->SDT}}"
          required />
      </div>
      <div class="form-group">
        <label>Địa chỉ</label>
        <input type="text" name="diachi" class="form-control" placeholder="Địa chỉ" value="{{Auth::user()->DiaChi}}"
          required />
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}"
          required />
      </div>
      <div class="form-group">
        <label>Ghi chú</label>
        <textarea type="text" class="form-control" id="note" name="note"
          placeholder="(Không hành, nhiều rau, nhiều nước chấm)" value=""></textarea>
      </div>

      <input type="submit" name="submit" value="Đặt hàng" class="btn btn-primary" />
      </form>

      @endif

<!--Main  -->
@else
	<!-- Start All Pages -->
	<div class="nen1">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
                    <h1>Giỏ hàng của Quý khách trống</h1>
                    <h3>Vui lòng truy cập <a href= "menu"><u>Thực đơn</u></a> để mua hàng!</h3>
				</div>
			</div>
		</div>
	<!-- End All Pages -->

@endif

@include('layout.reviews')
	

	
<!-- Start Footer -->
	@include('layout.footer')
<!-- End Footer -->
<!--Script  -->
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
<!-- Script -->
<script type="text/javascript">
 	$(".cart_quantity").click(function (e) {
		e.preventDefault();

		var ele = $(this);

		$.ajax({
			url: '{{ url('capnhatgiohangonline') }}',
			method: "patch",
			data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
			success: function (response) {
				window.location.reload();
			}
		});
	});

	$(".remove-from-cart").click(function (e) {
		e.preventDefault();

		var ele = $(this);

		if(confirm("Quý khách muốn xóa món ăn này?")) {
			$.ajax({
				url: '{{ url('xoagiohangonline') }}',
				method: "DELETE",
				data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
				success: function (response) {
					window.location.reload();
				}
			});
		}
	});
</script>
</body>
</html>