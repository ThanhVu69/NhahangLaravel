<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hóa đơn bán</title>
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
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Danh sách hóa đơn bán</h3><br>
                                <div class="col-xs-4">
                                    <form action="hdbanngay" method="get">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <!-- /.box-header -->
                        <div class="box box-info">
                            <div class="box-header">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Mã HĐ</th>
                                            <th>Ngày</th>
                                            <th>Tổng Tiền</th>
                                            <th>Bàn</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hoadonban as $product)
                                        <tr style=" text-align: center">
                                            <td><a href="#" class="label-success label"><i class="fa fa-check"></i></a>
                                                {{$product->ma}}{{$product->id}}</td>
                                            <td>{{date('d/m/Y',strtotime($product->Ngay))}}</td>
                                            <td>{{$product->ThanhTien}}.000VNĐ</td>
                                            <td>{{$product->soban}}</td>
                                            <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#{{$product->id}}1"><i class="fa fa-info"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <!-- /.box-header -->
                        <div class="box box-danger" style="min-height:620px">
                            <div class="box-header">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Mã HĐ</th>
                                            <th>Ngày</th>
                                            <th>Tổng Tiền</th>
                                            <th>Bàn</th>
                                            <th>Thanh toán</th>
                                            <th>Thêm</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hoadoncho as $product)
                                        <tr style=" text-align: center">
                                            <td>{{$product->ma}}{{$product->id}}</td>
                                            <td>{{date('d/m/Y',strtotime($product->Ngay))}}</td>
                                            <td>{{$product->ThanhTien}}.000VNĐ</td>
                                            <td>{{$product->soban}}</td>
                                            <td><a href="thanhtoanoff/{{$product->id}}"
                                                    class="btn btn-primary btn-sm"><i
                                                        class="fa fa-arrow-circle-right"></i></a></td>
                                            <td><a href="cthdban/{{$product->id}}" class="btn btn-warning btn-sm"><i
                                                        class="fa fa-plus-circle"></i></a></td>
                                            <td><a href="xoahdban/{{$product->id}}" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                                                        class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- Thanh toán -->
    @foreach($hoadonban as $product)
    <div class="modal fade" id="{{$product->id}}1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><b style="color:#008d4c">Đã thanh toán</b></h5>
                    <h5 class="modal-title"><b>Bàn số {{$product->soban}}</b></h5>
                    <h5 class="modal-title"><b>Nhân viên bán hàng: {{$product->User->name}}</b></h5>
                    <h5 class="modal-title"><b>Phương thức thanh toán: {{$product->phuongthucthanhtoan}}</b></h5>
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
                                    @if($gv->id_hoadonban == $product->id)
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
                                            {{$product->ThanhTien}}.000VNĐ</label>
                                    </div>
                                    <div class="form-group">
                                        <label><b style="color: #3c8dbc">Khuyến mãi:</b></label>
                                        @if($product->khuyenmai == 0)
                                        <b>{{$product->khuyenmaivnd}}.000VNĐ</b>
                                        @else
                                        <b>{{$product->khuyenmai}} %</b>
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
                                            {{$product->khachtra}}.000VNĐ</label>
                                    </div>
                                    <div class="form-group">
                                        <label><b style="color: #3c8dbc">Trả lại khách:</b>
                                            {{$product->tralai}}.000VNĐ</label>
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