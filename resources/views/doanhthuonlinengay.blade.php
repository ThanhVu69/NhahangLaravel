<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doanh thu online ngày</title>
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
        <h1>
          Công ty CP Toàn Phong
          <small>Bánh cuốn Gia An</small>
        </h1><br>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="key" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
        <!-- /.search form -->

      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <i class="fa  fa-calendar-minus-o"></i>
                <a href="doanhthuonline">Trở về doanh thu online >></a><br><br>
                <h3 class="box-title">Tổng doanh thu (nghìn VNĐ): {{number_format($total)}}</h3>
                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr role="row">
                      <th>Tên món ăn</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền (nghìn VNĐ)</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dthanghoa as $dthh)
                    <tr>
                      <td>{{$dthh->monan->Ten}}</td>
                      <td>{{$dthh->SL}}</td>
                      <td>{{number_format($dthh->TT)}}</td>
                    </tr>
                    @endforeach
              </div>

              </tbody>

              </tfoot>

              </table>
              <br><br>


            </div>
            <!-- /.box-body -->
          </div>

          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
  </div>
  </div>
  </div>
  <!-- /.row -->
  </section>
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <figure class="highcharts-figure">
          <div id="container"></div>
        </figure>
        <!-- /.chart-responsive -->
      </div>
      <!-- /.col -->

    </div>
  </div>

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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<script>
Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Các món ăn bán trong ngày'
    },
    
    xAxis: [{
        categories: [@foreach($dthanghoa as $hh)         
                 '{{$hh->monan->Ten}}',
                @endforeach],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value} (nghìn VNĐ)',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Tổng Tiền',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
        title: {
            text: 'Số lượng',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} suất',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        name: 'Số lượng',
        type: 'column',
        yAxis: 1,
        data: [@foreach($dthanghoa as $hh)         
                 {{$hh->SL}},
                @endforeach],
        tooltip: {
            valueSuffix: ' suất'
        }

    }, {
        name: 'Tổng tiền',
        type: 'spline',
        data: [@foreach($dthanghoa as $hh)         
                 {{$hh->TT}},
                @endforeach],
        tooltip: {
            valueSuffix: ' (nghìn VNĐ)'
        }
    }]
});
</script>
</body>
</html>
