<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sửa món ăn</title>
  <script src="{{asset('them/js/lumino.glyphs.js')}}"></script>
  <script type="{{asset('text/javascript')}}" src="them/ckeditor/ckeditor.js"></script>
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
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Sửa hàng hóa</h3>
              </div>
              @if(session('thongbao'))
              <div class="alert alert-success">
                {{session('thongbao')}}
              </div>

              @endif
              <div class="box-body">
                <div class="table table-bordered table-hover">
        	    <form action="" method="post"> 
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                	<label>Mã HH</label>
                    <input type="text" name="ma" class="form-control" placeholder="Mã hàng hóa" value="{{$hanghoa->ma}}"/>
                </div>
                <div class="form-group">
                	<label>Tên hàng hóa</label>
                    <input type="text" name="Ten" class="form-control" placeholder="Tên hàng hóa" value="{{$hanghoa->Ten}}"/>
                </div>
                <div class="form-group">
                	<label>Đơn vị tính</label>
                    <input type="text" name="DVTinh" class="form-control" placeholder="Đơn vị tính" value="{{$hanghoa->DVTinh}}" />
                </div>
                

                <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
                        <a href="{{asset('hanghoa')}}" class="btn btn-danger">Hủy bỏ</a>
            </form>
            <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/.main-->
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
        <script src="{{asset('them/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('them/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('them/js/chart.min.js')}}"></script>
        <script src="{{asset('them/js/chart-data.js')}}"></script>
        <script src="{{asset('them/js/easypiechart.js')}}"></script>
        <script src="{{asset('them/js/easypiechart-data.js')}}"></script>
        <script src="{{asset('them/js/bootstrap-datepicker.js')}}"></script>
        
</body>
</html>




