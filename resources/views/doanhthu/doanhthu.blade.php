<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Doanh thu</title>
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
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- DOANH THU NGÀY -->
                <div class="row">
                    <div class="col-xs-7">
                        <div class="box box-danger">
                            <div class="box-header">
                                <div class="col-xs-8">
                                    <!-- Lọc doanh thu theo ngày -->
                                    <form action="doanhthungay" method="get">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <h5 style=" text-align: center"><label>Từ ngày</label></h5>
                                                <input id="date-order" type="date" name="Ngay1"
                                                    class="form-control datepk" placeholder="" required />
                                            </div>
                                            <div class="col-xs-6">
                                                <h5 style=" text-align: center"><label>Đến ngày</label></h5>
                                                <input id="date-order" type="date" name="Ngay2"
                                                    class="form-control datepk" placeholder="" required />
                                            </div>
                                            <div class="col-xs-12">
                                                <input type="submit" name="submit" value="Tra cứu"
                                                    class="btn btn-primary" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div style="align=center">
                                    <a href="exceldoanhthungay" class="btn btn-success">Xuất sang EXCEL</a>
                                </div>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Ngày</th>
                                            <th>Doanh thu</th>
                                            <th>Số lượng hóa đơn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dtmonan as $hh)
                                        <tr>
                                            <td>{{date('d/m/Y',strtotime($hh->date))}}</td>
                                            <td>{{number_format($hh->DT)}}.000VNĐ</td>
                                            <td>{{number_format($hh->HD)}}</td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <div class="box box-warning">
                            <div class="box-body">
                                @include('doanhthu.chart2')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doanh thu tháng, năm -->
                @include('doanhthu.doanhthuthang')

            </section>
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
        <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable()
            $('#example3').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
            })
        })
        </script>
</body>

</html>