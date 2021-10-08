<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doanh thu online</title>
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
                <h3 class="box-title">Doanh thu online ngày</h3>
                <div class="col-xs-4">
                  <form action="doanhthuonlinengay" method="get">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <h5 style=" text-align: center"><label>Ngày</label></h5>
                      <input id="date-order" type="date" name="Ngay" class="form-control datepk" placeholder=""
                        required />
                      <input type="submit" name="submit" value="Tra cứu" class="btn btn-primary" />
                    </div>
                </div>
                </form>
                <div align="center">
              <a href="exceldoanhthuonlinengay" class="btn btn-success">Xuất sang EXCEL</a>
              </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr role="row">
                      <th>Ngày</th>
                      <th>Doanh thu (nghìn VNĐ)</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dtmonan as $hh)
                    <tr>
                      <td>{{$hh->date}}</td>
                      <td>{{number_format($hh->DT)}}</td>
                    </tr>
                    @endforeach
              </div>

              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr role="row">
                      <th>Ngày</th>
                      <th>Doanh thu từ trà (nghìn VNĐ)</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tra as $tr)
                    <tr>
                      <td>{{$tr->date}}</td>
                      <td>{{number_format($tr->DT)}}</td>
                    </tr>
                    @endforeach
              </div>
              <div class="span4 pull-right">
                <table id="example2" class="table table-bordered table-hover">

              </div><br><br>
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Doanh thu tháng</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                          <tr role="row">
                            <th>Tháng</th>
                            <th>Doanh thu (nghìn VNĐ)</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dtthang as $h)
                          <tr>
                            <td>{{$h->date}}</td>
                            <td>{{number_format($h->DT)}}</td>
                          </tr>
                          @endforeach
                    </div>
                    <div class="span4 pull-right">
                      <table id="example2" class="table table-bordered table-hover">
                        <h3>Tổng Tiền (nghìn VNĐ): {{number_format($total)}}</h3>

                    </div>
                    <br><br>
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Doanh thu năm</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                <tr role="row">
                                  <th>Năm</th>
                                  <th>Doanh thu (nghìn VNĐ)</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($dtnam as $hhh)
                                <tr>
                                  <td>{{$hhh->date}}</td>
                                  <td>{{number_format($hhh->DT)}}</td>
                                </tr>
                                @endforeach
                          </div>
                          <div class="span4 pull-right">
                            <table id="example2" class="table table-bordered table-hover">
                              <h3>Tổng Tiền ( nghìn VNĐ): {{number_format($total)}}</h3>

                          </div>
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
    $('#example2').DataTable()
    $('#example3').DataTable({
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
