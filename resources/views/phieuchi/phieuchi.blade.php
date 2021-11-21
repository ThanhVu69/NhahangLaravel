<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Phiếu chi</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('trangquanly.header')
        @include('trangquanly.thanhmenu')

        <div class="content-wrapper">
            <section class="content-header">
                @if($xem_ac[0]->quyen==1)
                <a href="#" data-toggle="modal" class="btn btn-primary" data-target="#them">Thêm phiếu chi</a>
                @endif
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Danh sách phiếu chi</h3>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover"
                                    style="text-align: center">
                                    <thead>
                                        <tr role="row">
                                            <th>Mã</th>
                                            <th>Ngày</th>
                                            <th>Nhân viên</th>
                                            <th>Thành tiền</th>
                                            <th>Nội dung</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($phieuchi as $hh)
                                        <tr>
                                            <td>{{$hh->ma}}{{$hh->id}}</td>
                                            <td>{{date('d/m/Y',strtotime($hh->created_at))}}</td>
                                            <td>{{$hh->User->name}}</td>
                                            <td>{{$hh->ThanhTien}}.000VNĐ</td>
                                            <td>{{$hh->noidung}}</td>
                                            <td>
                                                <div class="col-xs-6">
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#{{$hh->id}}">Sửa</i></a>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="xoaphieuchi/{{$hh->id}}"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                        class="btn btn-danger btn-sm">Xóa</i></a>
                                                </div>
                                            </td>
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

    <!-- Thêm phiếu chi -->
    <div class="modal fade" id="them">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm phiếu thu</h5>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="table table-bordered table-hover">
                            <form action="themphieuchi" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="row" style="margin-bottom:40px">
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <label>Nội dung</label><br>
                                            <textarea class="form-control" name="noidung" rows="7"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Thành tiền</label>
                                            <input required type="number" name="ThanhTien" class="form-control" require />
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

    <!-- Sửa phiếu chi -->
    @foreach($phieuchi as $hh)
    <div class="modal fade" id="{{$hh->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa phiếu chi</h5>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="table table-bordered table-hover">
                            <form action="/suaphieuchi" method="POST" enctype="multipart/form-data">
                                <div class="row" style="margin-bottom:40px">
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <input type="hidden" name="id" class="form-control" value="{{$hh->id}}"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label><br>
                                            <textarea class="form-control" name="noidung" rows="7"
                                                value="{{$hh->noidung}}">{{$hh->noidung}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Thành tiền</label>
                                            <input required type="number" name="ThanhTien" class="form-control"
                                                value="{{$hh->ThanhTien}}">
                                        </div>
                                        <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
                                    </div>
                                </div>
                                {{csrf_field()}}
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