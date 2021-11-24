<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tổng hợp hàng hóa ngày</title>
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
                </h1><br>
            </section>
            <!-- Main content -->
            <section class="content">
                <a href="{{url('tonghop')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Trở về</a><br><br>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Tổng hợp hàng hóa <b>nhập</b> từ
                                    {{date('d/m/Y',strtotime($ngay1))}} đến
                                    {{date('d/m/Y',strtotime($ngay2))}}
                                </h3><br><br>
                                <h3 class="box-title">Tổng tiền: {{number_format($tongnhap)}}.00VNĐ
                                </h3>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Tên món ăn</th>
                                            <th>Số lượng nhập</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($nhap as $dthh)
                                        <tr>
                                            <td>{{$dthh->Ten}}</td>
                                            <td>{{$dthh->SL}}</td>
                                            <td>{{$dthh->TT}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Tổng hợp hàng hóa <b>xuất</b> từ
                                    {{date('d/m/Y',strtotime($ngay1))}} đến
                                    {{date('d/m/Y',strtotime($ngay2))}}
                                </h3><br><br>
                                <h3 class="box-title">Tổng tiền: {{number_format($tongxuat)}}.00VNĐ
                                </h3>
                            </div>
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Tên món ăn</th>
                                            <th>Số lượng xuất</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($xuat as $dthh)
                                        <tr>
                                            <td>{{$dthh->Ten}}</td>
                                            <td>{{$dthh->SL}}</td>
                                            <td>{{$dthh->TT}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Tổng hợp hàng hóa <b>hủy</b> từ
                                    {{date('d/m/Y',strtotime($ngay1))}} đến
                                    {{date('d/m/Y',strtotime($ngay2))}}
                                </h3><br><br>
                                <h3 class="box-title">Tổng tiền: {{number_format($tonghuy)}}.00VNĐ
                                </h3>
                            </div>
                            <div class="box-body">
                                <table id="example3" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Tên món ăn</th>
                                            <th>Số lượng hủy</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($huy as $dthh)
                                        <tr>
                                            <td>{{$dthh->Ten}}</td>
                                            <td>{{$dthh->SL}}</td>
                                            <td>{{$dthh->TT}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">Tổng hợp hàng hóa <b>trả</b> từ
                                    {{date('d/m/Y',strtotime($ngay1))}} đến
                                    {{date('d/m/Y',strtotime($ngay2))}}
                                </h3><br><br>
                                <h3 class="box-title">Tổng tiền: {{number_format($tongtra)}}.00VNĐ
                                </h3>
                            </div>
                            <div class="box-body">
                                <table id="example4" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Tên món ăn</th>
                                            <th>Số lượng trả</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tra as $dthh)
                                        <tr>
                                            <td>{{$dthh->Ten}}</td>
                                            <td>{{$dthh->SL}}</td>
                                            <td>{{$dthh->TT}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
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