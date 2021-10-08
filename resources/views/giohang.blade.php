<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Giỏ hàng</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="image/png" href="login1/images/icons/cart.png" />
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
          Công ty CP Toàn Phong
          <small>Bánh cuốn Gia An</small>
        </h1><br>
        <i class="fa fa-cutlery"></i>
        <a href="homie">MENU</a></li><br>


      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Bánh cuốn nguyên chất từ gạo</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                @if(session('thongbao'))
                <div class="alert alert-success">
                  {{session('thongbao')}}
                </div>
                @endif

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style=" width:200px; text-align: center">Tên</th>
                      <th style=" text-align: center">Số lượng</th>
                      <th style=" text-align: center"></th>
                      <th style=" text-align: center">Đơn giá (nghìn VNĐ)</th>
                      <th style=" text-align: center">Tổng (nghìn VNĐ)</th>
                    </tr>

                  </thead>
                  <tbody>
                    <form action="giohang" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}" />
                      <?php $total = 0 ?>

                      @if(session('cart'))
                      @foreach(session('cart') as $id => $details)
                      <?php $total += $details['price'] * $details['quantity'] ?>

                      <tr style=" text-align: center">
                        <td>{{ $details['name'] }}</td>
                        <td class="cart_quantity" style=" width:100px; text-align: center">
                          <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                        </td>
                        <td class="actions" style=" text-align: center" data-th="">
                          <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i
                              class="fa fa-refresh"></i></button>
                          <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                              class="fa fa-trash-o"></i></button>
                        </td>
                        <td>{{ $details['price'] }}</td>
                        <td>{{ $details['price'] * $details['quantity'] }}</td>
                      </tr>
                      @endforeach
                      @endif
                  </tbody>
                  </tfoot>
                </table>
                <div class="span4 pull-right">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Tổng tiền (nghìn VNĐ)</th>
                        <th>{{ $total }}</th>
                      </tr>
                    </thead>
                    </tfoot>
                  </table>
                  <div class="form-group">
                    <label>Bàn số: </label><br>
                    <select class="form-control" name="SoBan">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>15</option>

                    </select>
                  </div>

                  <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />

                </div>
                </form>
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
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Cơ sở</b> Nguyễn Văn Lộc
      </div>
      <strong>Công ty CP Toàn Phong <a href="http://www.banhcuongiaan.com.vn/">Bánh cuốn Gia An</a>.</strong>
    </footer>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap  -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="bower_components/chart.js/Chart.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script type="text/javascript" src="{!!url('public/dist/js/myscript.js')!!}"></script>

  <!-- <script>
$('#myInput').keypress(function(event) {
        if (event.keyCode == 13) {
            alert('Entered');
        }
    });
                  $('.cart_quantity_input').on('input', function(){
                    var id = $(this).data('name');
                    $.ajax({
                    url : "muanhieuphan/"+id,
                    type : "get",
                    dataType:"text",
                    data : {
                         'sl': $(this).val()
                    },
                    success : function (){
                        location.reload();
                    }
                  });
                  });
                </script> -->
  <script type="text/javascript">

    $(".update-cart").click(function (e) {
      e.preventDefault();

      var ele = $(this);

      $.ajax({
        url: '{{ url('capnhatgiohang') }}',
        method: "patch",
        data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val() },
        success: function (response) {
          window.location.reload();
        }
      });
    });

    $(".remove-from-cart").click(function (e) {
      e.preventDefault();

      var ele = $(this);

      if (confirm("Are you sure")) {
        $.ajax({
          url: '{{ url('xoagiohang') }}',
          method: "DELETE",
          data: { _token: '{{ csrf_token() }}', id: ele.attr("data-id") },
          success: function (response) {
            window.location.reload();
          }
        });
      }
    });

  </script>
</body>

</html>