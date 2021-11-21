<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Báo cáo tổng hợp</title>
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h3 class="box-title">Báo cáo cuối ngày</h3>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">

                                <div class="col-xs-4">
                                    <form action="doanhthungay" method="get">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <div class="form-group">
                                            <h5 style=" text-align: center"><label>Ngày</label></h5>
                                            <input id="date-order" type="date" name="Ngay" class="form-control datepk"
                                                placeholder="" required />
                                            <input type="submit" name="submit" value="Tra cứu"
                                                class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                                <div align="center">
                                    <a href="exceldoanhthungay" class="btn btn-success">Xuất sang EXCEL</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="box">
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr role="row">
                                                    <th>Tên hàng hóa</th>
                                                    <th>Nhập</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($nhap as $hh)
                                                <tr>
                                                    <td>{{$hh->Ten}}</td>
                                                    <td>{{number_format($hh->SL)}}</td>
                                                </tr>
                                                @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="box">
                                    <div class="box-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr role="row">
                                                    <th>Tên hàng hóa</th>
                                                    <th>Xuất</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($xuat as $hh)
                                                <tr>
                                                    <td>{{$hh->Ten}}</td>
                                                    <td>{{number_format($hh->SL)}}</td>
                                                </tr>
                                                @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="box">
                                    <div class="box-body">
                                        <table id="example3" class="table table-bordered table-hover">
                                            <thead>
                                                <tr role="row">
                                                    <th>Tên hàng hóa</th>
                                                    <th>Hủy</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($huy as $hh)
                                                <tr>
                                                    <td>{{$hh->Ten}}</td>
                                                    <td>{{number_format($hh->SL)}}</td>
                                                </tr>
                                                @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="box">
                                    <div class="box-body">
                                        <table id="example4" class="table table-bordered table-hover">
                                            <thead>
                                                <tr role="row">
                                                    <th>Tên hàng hóa</th>
                                                    <th>Tồn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($ton as $hh)
                                                <tr>
                                                    <td>{{$hh->Ten}}</td>
                                                    <td>{{number_format($hh->SL)}}</td>
                                                </tr>
                                                @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
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


    <!-- Datatables -->
    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable()
        $('#example4').DataTable()
        $('#example3').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
    </script>
</body>

</html>