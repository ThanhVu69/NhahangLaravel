<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Thêm món ăn</title>
<script src="them/js/lumino.glyphs.js"></script>
<script type="text/javascript" src="them/ckeditor/ckeditor.js"></script>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>
        /* Customize the label (the container) */
    .ra {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    /* Hide the browser's default radio button */
    .ra input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
    }

    /* Create a custom radio button */
    .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 15px;
    width: 15px;
    background-color: #eee;
    border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .ra:hover input ~ .checkmark {
    background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .ra input:checked ~ .checkmark {
    background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
    content: "";
    position: absolute;
    display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .ra input:checked ~ .checkmark:after {
    display: block;
    }

    /* Style the indicator (dot/circle) */
    .ra .checkmark:after {
    top: 5px;
    left: 5px;
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: white;
    }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('trangquanly.header')
@include('trangquanly.thanhmenu')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Công ty CP Toàn Phong
        <small>Bánh cuốn Gia An</small>
      </h1><br>
     
      <!-- <i class= "fa fa-cubes"></i>
      <a href="themmonan">Thêm món ăn</a></li><br> -->
    
    </section>
	 <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thêm món ăn</h3>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
		<div class="box-body">
			<div class="table table-bordered table-hover">
						<form action="themmonan" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/> 
                            <div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
                                    <div class="form-group" >
										<label>Ảnh món ăn</label>
										<input required id="image" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="them/img/new_seo-10-512.png">
                                    </div>
                                    <div class="form-group" >
										<label>Mã món ăn</label>
										<input required type="text" name="ma" class="form-control">
									</div>
									<div class="form-group" >
										<label>Tên món ăn</label>
										<input required type="text" name="Ten" class="form-control">
									</div>
									<div class="form-group" >
										<label>Đơn giá</label>
										<input required type="number" name="dongia" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá khuyến mãi</label>
										<input required type="number" name="khuyenmai" class="form-control">
                                    </div>
                                    <div class="form-group" >
										<label>Đơn vị tính</label>
										<input required type="text" name="DVTinh" class="form-control">
                                    </div>
                                    <div class="form-group" >
										<label>Mô tả</label>
										<textarea required name="mota"></textarea>
									</div>
									<div class="form-group" >
										<label>Sản phẩm đóng gói</label>
										<select required name="spdg" class="form-control">
											<option value="1">Có</option>
											<option value="0">Không</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm tiêu biểu</label><br>
                    <label class="ra">Có
                    <input type="radio" checked="checked" name="top" value="1">
                    <span class="checkmark"></span>
                    </label>
                    <label class="ra">Không
                    <input type="radio" name="top"  value="0">
                    <span class="checkmark"></span>
                    </label>
									</div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="monan" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
            </div>
            </div>
	</div>	<!--/.main-->
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Cơ sở</b> Nguyễn Văn Lộc
    </div>
    <strong>Công ty CP Toàn Phong <a href="http://www.banhcuongiaan.com.vn/">Bánh cuốn Gia An</a>.</strong> 
  </footer>
  

    <!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
	<script src="them/js/jquery-1.11.1.min.js"></script>
	<script src="them/js/bootstrap.min.js"></script>
	<script src="them/js/chart.min.js"></script>
	<script src="them/js/chart-data.js"></script>
	<script src="them/js/easypiechart.js"></script>
	<script src="them/js/easypiechart-data.js"></script>
	<script src="them/js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#image').click();
		    });
		});
	</script>	
</body>

</html>
