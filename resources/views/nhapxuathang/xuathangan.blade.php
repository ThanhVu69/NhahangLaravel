<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xuất hàng hóa</title>
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
        <!-- Tự thêm -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!--  -->
        @include('trangquanly.header')
        <!-- Left side column. contains the logo and sidebar -->
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
                                <h3 class="box-title">Xuất hàng hóa</h3>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="box-body">
                                        @if(session('thongbao'))
                                        <div class="alert alert-success">
                                            {{session('thongbao')}}
                                        </div>
                                        @endif
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Mã HH</th>
                                                    <th>Tên</th>
                                                    <th>Giá</th>
                                                    <th>Nhà cung cấp</th>
                                                    <th>Đơn vị tính</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $product)
                                                <tr>
                                                <td>{{$product->ma}}</td>
                                                    <td>{{$product->Ten}}</td>
                                                    <td>{{$product->gia}}</td>
                                                    <td>{{$product->nhacungcap->ten}}</td>
                                                    <td>{{$product->DVTinh}}</td>
                                                    <td><a href="{{ url('themxuathangan/'.$product->id) }}"
                                                            class="btn btn-primary">Thêm</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="box">
                                        <div class="box-body">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="  text-align: center">Tên</th>
                                                        <th style=" width:100px; text-align: center">Số lượng</th>
                                                        <th style=" text-align: center"></th>
                                                        <th style=" text-align: center">Đơn giá (nghìn VNĐ)</th>
                                                        <th style=" text-align: center">Thành tiền (nghìn VNĐ)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $total = 0 ?>
                                                @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                <?php $total += $details['price'] * $details['quantity'] ?>
                                                    <tr style=" text-align: center">
                                                        <td style=" text-align: center">{{ $details['name'] }}</td>

                                                        <td class="cart_quantity"
                                                            style=" width:100px; text-align: center">
                                                            <input type="number" value="{{ $details['quantity'] }}"
                                                                class="form-control quantity" />
                                                        </td>
                                                        <td class="actions" style=" text-align: center" data-th="">
                                                            <button class="btn btn-info btn-sm update-cart"
                                                                data-id="{{ $id }}"><i
                                                                    class="fa fa-refresh"></i></button>
                                                            <button class="btn btn-danger btn-sm remove-from-cart"
                                                                data-id="{{ $id }}"><i
                                                                    class="fa fa-trash-o"></i></button>
                                                        </td>
                                                        <td>{{ $details['price'] }}</td>
                                                        <td>{{ $details['price'] * $details['quantity'] }}</td>
                                                    @endforeach
                                                </tbody>
                                                </tfoot>
                                            </table>
                                            <div class="span4 pull-right">
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <form action="giohanganxuat" method="post">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                        </tfoot>
                                                    <th>Tổng tiền (nghìn VNĐ)</th>
                                                    <th>{{ $total }}</th>
                                                </table>
                                                <input type="submit" name="submit" value="Xuất hàng"
                                                    class="btn btn-primary" />
                                            </div>
                                            </form>
                                            @endif
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
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
    <script type="text/javascript">
 
 $(".update-cart").click(function (e) {
    e.preventDefault();
    var ele = $(this);
     $.ajax({
        url: '{{ url('update-cart') }}',
        method: "patch",
        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
        success: function (response) {
            window.location.reload();
        }
     });
 });
 $(".remove-from-cart").click(function (e) {
     e.preventDefault();
     var ele = $(this);
     if(confirm("Are you sure")) {
         $.ajax({
             url: '{{ url('remove-from-cart') }}',
             method: "DELETE",
             data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
             success: function (response) {
                 window.location.reload();
             }
         });
     }
 });
</script>
</body>

</html>