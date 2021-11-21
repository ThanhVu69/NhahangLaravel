<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hàng hóa</title>
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
                <a href="#" data-toggle="modal" class="btn btn-primary" data-target="#themhh">Thêm hàng hóa</a>
                @endif
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Danh mục hàng hóa</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Mã HH</th>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Đơn vị tính</th>
                                            <th>Ghi chú</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hanghoa as $hh)
                                        <tr>
                                            <td>{{$hh->ma}}{{$hh->id}}</td>
                                            <td>{{$hh->Ten}}</td>
                                            <td>{{$hh->gia}}</td>
                                            <td>{{$hh->nhacungcap->ten}}</td>
                                            <td>{{$hh->DVTinh}}</td>
                                            <td>{{$hh->ghichu}}</td>
                                            @if($xem_ac[0]->quyen==1)
                                            <td><a href="xoahanghoa/{{$hh->id}}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    class="btn btn-danger btn-sm">Xóa</a></td>
                                            <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#{{$hh->id}}">Sửa</a></td>
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

    <!-- Thêm hàng hóa -->
    <div class="modal fade" id="themhh">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm hàng hóa</h5>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="table table-bordered table-hover">
                            <form action="themhanghoa" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="row" style="margin-bottom:40px">
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <label>Tên hàng hoá</label>
                                            <input required type="text" name="Ten" class="form-control" require />
                                        </div>
                                        <div class="form-group">
                                            <label>Giá</label>
                                            <input required type="text" name="gia" class="form-control" require />
                                        </div>
                                        <div class="form-group">
                                            <label>Thuộc loại món ăn</label><br>
                                            <select class="form-control" name="id_nhacc" require>
                                                @foreach($nhacungcap as $ch)
                                                <option value="{{$ch->id}}">{{$ch->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Đơn vị tính</label>
                                            <input required type="text" name="DVTinh" class="form-control" require />
                                        </div>
                                        <div class="form-group">
                                            <label>Ghi chú</label><br>
                                            <textarea class="form-control" name="ghichu" rows="7"></textarea>
                                        </div>
                                        <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sửa hàng hóa -->
    @foreach($hanghoa as $hh)
    <div class="modal fade" id="{{$hh->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa hàng hóa</h5>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">
                            <div class="table table-bordered table-hover">
                                <form action="/suahanghoa" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                        <input type="hidden" name="id" class="form-control" value="{{$hh->id}}"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <label>Tên hàng hóa</label>
                                        <input type="text" name="Ten" class="form-control"
                                            value="{{$hh->Ten}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input type="text" name="gia" class="form-control"
                                            value="{{$hh->gia}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nhà cung cấp</label>
                                        <select class="form-control" name="id_nhacc">
                                            @foreach($nhacungcap as $ch)
                                            <option @if($hh -> id_nhacc == $ch->id)
                                                {{"selected"}}
                                                @endif
                                                value="{{$ch->id}}"> {{$ch->ten}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Đơn vị tính</label>
                                        <input type="text" name="DVTinh" class="form-control" placeholder="Đơn vị tính"
                                            value="{{$hh->DVTinh}}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi chú</label><br>
                                        <textarea class="form-control" name="ghichu" rows="7"
                                            value="{{$hh->ghichu}}">{{$hh->ghichu}}</textarea>
                                    </div>
                                    <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
                                </form>
                                <div class="clearfix"></div>
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