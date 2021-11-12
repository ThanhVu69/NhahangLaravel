<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang chủ</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="icon" type="ico" href="login1/images/icons/favicon.ico" />
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
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('trangquanly.header')
        @include('trangquanly.thanhmenu')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <small>Cửa hàng xxxxxx</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <p>Gọi món (ORDER)</p>
                                <h3>MENU</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clipboard"></i>
                            </div>
                            <a href="{{url('order')}}" class="small-box-footer">ORDER <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <p>Hàng tồn</p>
                                <h3>ĐẦU CA</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-archive"></i>
                            </div>
                            <a href="baocaohangtondc" class="small-box-footer">Nhập <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <p>Nhập </p>
                                <h3>Hàng hóa</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-cart-plus"></i>
                            </div>
                            <a href="nhaphangan" class="small-box-footer"> Nhập<i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <p>Xuất </p>
                                <h3>Hàng hóa</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-cart-arrow-down"></i>
                            </div>
                            <a href="xuathangan" class="small-box-footer">Xuất<i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="info-box bg-navy">
                    <span class="info-box-icon"><a href="baocaohangton"><i class="fa fa-edit"></i></a></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Báo cáo </span>
                        <span class="info-box-number">Hàng tồn cuối ca</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                        </div>
                        <span class="progress-description">
                    </div>
                </div>
                <div class="info-box bg-purple">
                    <span class="info-box-icon"><a href="baocaohanghuy"><i class="fa fa-trash"></i></a></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Báo cáo</span>
                        <span class="info-box-number">Hàng hủy</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                        </span>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 connectedSortable">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="row">
            <div class="col-md-4">
                <h4 class="box-title">Các hóa đơn giá trị cao nhất</h4>
                @foreach($hoadonban as $product)
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="product-info">
                                <a href="cthdban/{{$product->id}}" class="product-title">
                                    <h5>{{$product->ma}}{{$product->id}}</h5>
                                    <h4><span class="label label-warning pull-right">{{$product->ThanhTien}}.000đ</span>
                                    </h4>
                                </a>
                                <span class="product-description">
                                    {{$product->Ngay}}
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
                <div class="box-footer text-center">
                    <a href="hoadonban" class="uppercase">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
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
            categories: [@foreach($dtngay as $hh)
                '{{$hh->date}}',
                @endforeach
            ]
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
            data: [@foreach($dtngay as $hh) {
                    {
                        $hh - > DT
                    }
                },
                @endforeach
            ]
        }]
    });
    </script>
</body>

</html>