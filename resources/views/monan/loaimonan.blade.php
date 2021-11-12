<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Loại món ăn</title>
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
                <a href="themloaimonan" class="btn btn-primary">Thêm loại món ăn</a><br>
                @endif
            </section>
            @if(session('thongbao'))
            <div class="alert alert-info">
                {{session('thongbao')}}
            </div>
            @endif
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Danh sách loại món ăn</h3>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>Mã loại MA</th>
                                            <th>Tên</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($loaimonan as $hh)
                                        <tr>
                                            <td>{{$hh->ma}}</td>
                                            <td>{{$hh->ten}}</td>
                                            <td><a href="#" data-toggle="modal" data-target="#{{$hh->id}}">Chi tiết</a>
                                            </td>
                                            <td><a href="xoaloaimonan/{{$hh->id}}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    class="btn btn-danger btn-sm">Xóa</a></td>
                                            <td><a href="sualoaimonan/{{$hh->id}}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn sửa?')"
                                                    class="btn btn-info btn-sm">Sửa</a></td>
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

    @foreach($loaimonan as $hh)
    <div class="modal fade" id="{{$hh->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$hh->ten}}</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr role="row">
                                <th>Tên</th>
                                <th>Đơn giá</th>
                                <th>Khuyến mãi</th>
                                <th>Đơn vị tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monan as $gv)
                            @if($gv->id_loaimonan == $hh->id)
                            <tr>
                                <td>{{$gv->Ten}}</td>
                                <td>{{$gv->dongia}}</td>
                                <td>{{$gv->khuyenmai}}</td>
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