<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Món ăn</title>
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
      @if($xem_ac[0]->quyen==1)
      <a href="themmonan" class="btn btn-primary">Thêm món ăn</a><br>
      @endif
    </section>
    @if(session('thongbao'))
                <div class="alert alert-info">
                    {{session('thongbao')}}
                </div>
            @endif
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách món ăn</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr  role="row">
                  <th></th>
                  <th>Mã MA</th>
                  <th>Tên</th>
                  <th>Đơn giá</th>
                  <th>Giá khuyến mãi</th>
                  <th>Đơn vị tính</th>
                  <th>Mô tả</th>
                  <th>SP tiêu biểu</th>
                  <th>SP đóng gói</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                 @foreach($monan as $hh)
                 <tr>
				  <td><img src="online/images/{{$hh->image}}" width= "50px" height= "50px"></td>
                  <td style="width:5%;">{{$hh->ma}}</td>
                  <td style="width:20%;">{{$hh->Ten}}</td>
                  <td>{{$hh->dongia}}</td>
                  <td>{{$hh->khuyenmai}}</td>
                  <td>{{$hh->DVTinh}}</td>
                  <td style="width:50%;">{{$hh->mota}}</td>
                  @if ($hh->top==0)
                  <td>Không</td>
                  @else
                  <td>Có</td>
                  @endif
                @if ($hh->spdg==0)
                  <td>Không</td>
                  @else
                  <td>Có</td>
                  @endif
                  @if($xem_ac[0]->quyen==1)
                  <td><a href="xoamonan/{{$hh->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</a></td>
                 <td><a href="suamonan/{{$hh->id}}" onclick="return confirm('Bạn có chắc chắn muốn sửa?')" class="btn btn-info btn-sm">Sửa</a></td>
			      @endif
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
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>
