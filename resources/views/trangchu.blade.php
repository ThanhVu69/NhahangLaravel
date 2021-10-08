<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trang chủ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="ico" href="login1/images/icons/favicon.ico"/>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('trangquanly.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('trangquanly.thanhmenu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Công ty CP Toàn Phong
        <small>Bánh cuốn Gia An</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>Gọi Món (ORDER)</p>
              <h3>MENU</h3>
            </div>
            <div class="icon">
              <i class="fa   fa-file-o"></i>
            </div>
            <a href="homie" class="small-box-footer">ORDER <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <p>Hàng tồn</p>
              <h3>ĐẦU CA</h3>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
            <a href="baocaohangtondc" class="small-box-footer">Nhập <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
            <p>Nhập </p>
              <h3>Hàng bán</h3>
            </div>
            <div class="icon">
              <i class="fa  fa-bell-o"></i>
            </div>
            <a href="nhaphangan" class="small-box-footer"> Nhập<i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <div class="small-box bg-red">
            <div class="inner">
            <p>Nhập</p>
              <h3> Hàng khô</h3>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="nhaphangkho" class="small-box-footer"> Nhập<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Xuất </p>
              <h3>Hàng bán</h3>
            </div>
            <div class="icon">
              <i class="fa  fa-paper-plane-o"></i>
            </div>
            <a href="xuathangan" class="small-box-footer">Xuất<i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <div class="small-box bg-lime">
            <div class="inner">
              <p>Xuất </p>
              <h3>Hàng khô</h3>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="xuathangkho" class="small-box-footer">Xuất<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>
         <!-- Info Boxes Style 2 -->
         <!-- <div class="info-box bg-blue">
            <span class="info-box-icon"><a href="baocaohangtondc"><i class="fa fa-check"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Kiểm tra </span>
              <span class="info-box-number">Hàng tồn đầu ca</span>

              <div class="progress">
              <div class="progress-bar" style="width: 25%"></div>
              </div>
              <span class="progress-description">
                 
            </div> </div> -->
         <div class="info-box bg-orange">
            <span class="info-box-icon"><a href="baocaohangton"><i class="ion ion-ios-pricetag-outline"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Báo cáo </span>
              <span class="info-box-number">Hàng tồn cuối ca</span>

              <div class="progress">
              <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                 
            </div> </div>
            <!-- /.info-box-content -->
             <!-- Info Boxes Style 2 -->
         <div class="info-box bg-green">
            <span class="info-box-icon"><a href="baocaohanghuy"><i class="fa fa-trash"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-text">Báo cáo</span>
              <span class="info-box-number">Hàng hủy</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                 
                  </span>
           
            <!-- /.info-box-content -->
        <!-- ./col -->
        </div>
        </div></div></div>

      <div class="row">
        <div class="col-lg-7 connectedSortable">
          <div class="box">
            <div class="box-header with-border">

              
            <!-- /.box-header -->
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
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        
                <!-- /.box-header -->
                
                 
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          
            
            <!-- /.box-body -->
            <!-- /.box-footer -->
            
          </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->

        
            <!-- /.info-box-content -->
          </div></div></div>
          <!-- /.info-box -->

          
          <div class="box box-primary">
            <div class="box-header with-border">


             
            </div>
             
                
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            
            <!-- /.footer -->
          </div>
          <!-- /.box -->

          <!-- PRODUCT LIST -->
          
            <!-- /.box-header -->
            <div class="row">
            <div class="col-md-4">
            <h4 class="box-title">Các hóa đơn giá trị cao nhất</h4>
            @foreach($hoadonban as $product)
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-info">
                    <a href="cthdban/{{$product->id}}" class="product-title"><h5>{{$product->ma}}{{$product->id}}</h5>
                      <h4><span class="label label-warning pull-right">{{$product->ThanhTien}}.000đ</span></h4></a>
                    <span class="product-description">
                    {{$product->Ngay}}
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>            
              </div>
              @endforeach
              <div class="box-footer text-center">
              <a href="hoadonban" class="uppercase">Xem thêm</a>
            </div>
              </div>
              <div class="col-md-8">
              <div class="box-header with-border">
              <h3 class="box-title">Đơn hàng online</h3>
              <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Khách hàng</th>
                    <th>Ngày</th>
                    <th>Phụ phí</th>
                    <th>Tổng tiền</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($bill as $hd)
                  <tr>
                    <td>{{$hd->ten}}</a></td>
                    <td>{{$hd->ngay}}</td>
                    <td>{{$hd->phuphi}}.000VNĐ</td>
                    <td>{{$hd->tongtien}}.000VNĐ</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
            
       </div>
       </div>

            </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
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

  @include('trangquanly.footer')

  

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Doanh thu theo ngày'
    },
    subtitle: {
        text: 'Nguyễn Văn Lộc'
    },
    xAxis: {
        categories:
               [ @foreach($dtngay as $hh)         
                 '{{$hh->date}}',
                 @endforeach]
    },
    yAxis: {
        title: {
            text: 'Doanh thu (nghìn VNĐ)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Doanh thu theo ngày',
        data: [ @foreach($dtngay as $hh)         
                 {{$hh->DT}},
                @endforeach]
    }]
});
</script>
</body>
</html>