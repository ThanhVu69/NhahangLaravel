<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MENU</title>
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
      
      <i class= "fa  fa-file-text-o"></i>
      @if(Session::has('cart'))
      <a href="giohang">Hóa đơn</a></li><br>
      @else
      <a href="giohangtrong">Hóa đơn</a></li><br>
      @endif
     
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">MENU</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Mã MĂ: activate to sort column descending" style="width: 80.2px;" aria-sort="ascending">Mã MĂ</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên: activate to sort column descending" style="width: 80.2px;" aria-sort="ascending">Tên</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Đơn vị tính: activate to sort column descending" style="width: 80.2px;" aria-sort="ascending">Đơn vị tính</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Đơn giá: activate to sort column descending" style="width: 80.2px;" aria-sort="ascending">Đơn giá</th>
                 

                </tr>
                </thead>
                
                <tbody>
                 @foreach($monan as $item)
          
                 <tr>
				         <td>{{$item->ma}}</td>
                 <td><a href="{!!url('themgiohang',[$item->id])!!}" class="btn btn-warning btn-block text-center" >{{$item->Ten}}</a></td>
				         <td>{{$item->DVTinh}}</td>
                 <td>{{$item->dongia}}</td>
        
               
			      </tr>
			      @endforeach
            
                </tbody>
                
                </tfoot>
              </table>
            
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Cơ sở</b> Nguyễn Văn Lộc
    </div>
    <strong>Công ty CP Toàn Phong <a href="http://www.banhcuongiaan.com.vn/">Bánh cuốn Gia An</a>.</strong> 
  </footer>
 
</div>
<!-- ./wrapper -->

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
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
