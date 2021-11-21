<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hóa đơn bán ngày</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="icon" type="image/png" href="login1/images/icons/cart.png" />
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- jvectormap -->
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

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
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-info">
                            <div class="box-header">
                                <a href="{{url('hoadonban')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Trở về hóa đơn
                                    bán</a><br><br>
                                <h3 class="box-title">Hóa đơn bán theo ngày</h3>
                                <p>Tìm thấy {{count($product)}} hóa đơn đã thanh toán</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="row">
                    <div class="col-xs-6">
                        <div class="box box-success">
                            <div class="box-body">
                                <table id="example2" style="text-align:center" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <th>Nhân viên</th>
                                            <th>Ngày</th>
                                            <th>Tổng Tiền</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product as $item)

                                        <tr>
                                            <td><a href="#" class="label-success label"><i class="fa fa-check"></i></a>
                                                {{$item->ma}}{{$item->id}}
                                            </td>
                                            <td>{{$item->User->name}}</a></td>
                                            <td>{{$item->Ngay}}</td>
                                            <td>{{number_format($item->ThanhTien)}}.000VNĐ</td>
                                            <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#{{$item->id}}"><i class="fa fa-info"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="box box-warning">
                            <div class="box-body">
                                <table id="example1" style="text-align:center" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <th>Ngày</th>
                                            <th>Tổng Tiền</th>
                                            <th>Thanh toán</th>
                                            <th>Thêm</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product1 as $item)

                                        <tr>
                                            <td><a href="#" class="label-warning label"><i
                                                        class="fa fa-spinner"></i></a> {{$item->ma}}{{$item->id}}</td>
                                            <td>{{$item->Ngay}}</td>
                                            <td>{{number_format($item->ThanhTien)}}.000VNĐ</td>
                                            <td><a href="thanhtoanoff/{{$item->id}}" class="btn btn-primary btn-sm"><i
                                                        class="fa fa-arrow-circle-right"></i></a></td>
                                            <td><a href="cthdban/{{$item->id}}" class="btn btn-warning btn-sm"><i
                                                        class="fa fa-plus-circle"></i></a></td>
                                            <td><a href="xoahdban/{{$item->id}}" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                                                        class="fa fa-trash"></i></a></td>
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
    <!-- Chi tiết -->
    @foreach($product as $item)
    <div class="modal fade" id="{{$item->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b style="color:#008d4c">Đã thanh toán hóa đơn
                            {{$item->ma}}{{$item->id}}</b></h5>
                    <h5 class="modal-title"><b>Bàn số {{$item->soban}}</b></h5>
                    <h5 class="modal-title"><b>Nhân viên bán hàng: {{$item->User->name}}</b></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style=" text-align: center">Tên món ăn</th>
                                        <th style=" text-align: center">Số lượng</th>
                                        <th style=" text-align: center">Đơn giá</th>
                                        <th style=" text-align: center">Thành tiền (nghìn VNĐ)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cthdban as $gv)
                                    @if($gv->id_hoadonban == $item->id)
                                    <tr style=" text-align: center">
                                        <td>{{$gv->monan->Ten}}</td>
                                        <td>{{$gv->SoLuong}}</td>
                                        <td>{{$gv->Dongia}}</td>
                                        <td>{{$gv->TongTien}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6" align="center">
                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label><b style="color: #3c8dbc">Tổng tiền:</b>
                                            {{$item->ThanhTien}}.000VNĐ</label>
                                    </div>
                                    <div class="form-group">
                                        <label><b style="color: #3c8dbc">Khuyến mãi:</b></label>
                                        @if($item->khuyenmai == 0)
                                        <b>{{$item->khuyenmaivnd}}.000VNĐ</b>
                                        @else
                                        <b>{{$item->khuyenmai}} %</b>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6" align="center">
                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label><b style="color: #3c8dbc">Khách trả:</b>
                                            {{$item->khachtra}}.000VNĐ</label>
                                    </div>
                                    <div class="form-group">
                                        <label><b style="color: #3c8dbc">Trả lại khách:</b>
                                            {{$item->tralai}}.000VNĐ</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>
    @endforeach


    <!-- jQuery 3 -->
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap  -->
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('bower_components/chart.js/Chart.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- DataTables -->
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example4').DataTable()
        $('#example2').DataTable({
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