<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Báo cáo cuối ngày</title>
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

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- DataTables -->
    <link rel="stylesheet" href="datatables/paginate.css">
    <link rel="stylesheet" href="datatables/button_exports.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('trangquanly.header')
        @include('trangquanly.thanhmenu')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h3 class="box-title">Báo cáo cuối ngày</h3>
                <h4 class="box-title">Ngày {{date('d/m/y',strtotime($day))}}</h4>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="box box-danger">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                <h4><b>Báo cáo</b> xuất, nhập, tồn, hủy, trả hàng hóa</h4><br>
                                    <thead>
                                        <tr role="row">
                                            <th>Tên hàng hóa</th>
                                            <th>Nhập</th>
                                            <th>Xuất</th>
                                            <th>Hủy</th>
                                            <th>Trả</th>
                                            <th>Báo cáo tồn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($baocao as $hh)
                                        <tr style="text-align: center">
                                            <td>{{$hh->Ten}}</td>
                                            <td>{{$hh->Nhap}}</td>
                                            <td>{{$hh->Xuat}}</td>
                                            <td>{{$hh->Huy}}</td>
                                            <td>{{$hh->Tra}}</td>
                                            <td>{{$hh->TonTT}}</td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="box box-success">
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <h4><b>Doanh thu:</b> {{number_format($total)}}.000VNĐ</h4><br>
                                    <thead>
                                        <tr role="row">
                                            <th>Tên món ăn</th>
                                            <th>Doanh thu</th>
                                            <th>Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dthanghoa as $hh)
                                        <tr style="text-align: center">
                                            <td>{{$hh->monan->Ten}}</td>
                                            <td>{{$hh->TT}}.000VNĐ</td>
                                            <td>{{$hh->SL}}</td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-warning">
                            <div class="box-body">
                                <div class="row" style="text-align:center">
                                    <div class="col-xs-4">
                                        <h4><b>Doanh thu:</b> {{number_format($total)}}.000VNĐ</h4>
                                    </div>
                                    <div class="col-xs-4">
                                        <h4><b>Chi phí:</b> {{number_format($chiphi)}}.000VNĐ</h4>
                                    </div>
                                    <div class="col-xs-4">
                                        <h4><b>Lợi nhuận:</b> {{number_format($loinhuan)}}.000VNĐ</h4>
                                    </div>
                                </div><br>
                                @include('baocao.chartbaocao')
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
    $(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
    $(document).ready(function() {
    $('#example3').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</body>

</html>