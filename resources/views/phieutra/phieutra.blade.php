<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Phiếu trả hàng</title>
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
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Danh sách phiếu trả hàng</h3><br>
                                <div class="col-xs-4">
                                    <form action="phieutrangay" method="get">
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
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Mã PH</th>
                                            <th>Ngày</th>
                                            <th>Người trả</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Tổng tiền</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($phieutra as $product)
                                        <tr">
                                            <td>{{$product->ma}}{{$product->id}}</td>
                                            <td>{{$product->Ngay}}</td>
                                            <td>{{$product->User->name}}</td>
                                            <td>{{$product->nhacungcap->ten}}</td>
                                            <td>{{$product->ThanhTien}}.000VNĐ</td>
                                            <td></i><a href="#" data-toggle="modal" class="btn btn-primary btn-sm"
                                                    data-target="#{{$product->id}}">Chi tiết</a>
                                            </td>
                                            <td><a href="ctptra/{{$product->id}}" class="btn btn-primary btn-sm">Sửa</a>
                                            </td>
                                            <td><a href="xoaphieutra/{{$product->id}}" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a></td>
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

    @foreach($phieutra as $hh)
    <div class="modal fade" id="{{$hh->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$hh->ma}}{{$hh->id}}</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr role="row">
                                <th>Tên</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Đơn vị tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ctptra as $gv)
                            @if($gv->id_phieutra == $hh->id)
                            <tr>
                                <td>{{$gv->Ten}}</td>
                                <td>{{$gv->SoLuong}}</td>
                                <td>{{$gv->Dongia}}</td>
                                <td>{{$gv->TongTien}}</td>
                                <td>{{$gv->DVTinh}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        </tfoot>
                    </table>
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
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    </script>
</body>

</html>