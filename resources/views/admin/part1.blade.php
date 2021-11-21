<!-- Nhập hàng, xuất hàng, Order, Báo cáo hàng hóa -->
<div class="row">
    <!-- Doanh thu tháng 11 -->
    <div class="col-lg-8 col-xs-8">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <p>Doanh thu tháng {{$month}}</p>
                    <h3>{{number_format($r1)}},000VNĐ</h3>
                    @if ($r > 0)
                    <h5 style="text-align:right"><i class="fa fa-arrow-up"></i> {{$r}} %</h5>
                    @elseif ($r < 0) <h5 style="text-align:right"><i class="fa fa-arrow-down"></i> {{$r}} %
                        </h5>
                        @elseif ($r == 0)
                        <h5 style="text-align:right;"></h5>
                        @endif
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
                <a href="{{url('doanhthu')}}" class="small-box-footer">Xem thêm &nbsp; <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Doanh thu hôm nay -->
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <p>Doanh thu hôm nay</p>
                    <h3>{{number_format($r0)}},000VNĐ</h3>
                    @if ($r4 > 0)
                    <h5 style="text-align:right;"><i class="fa fa-arrow-up"></i> {{$r4}} %</h5>
                    @elseif ($r4 < 0) <h5 style="text-align:right;"><i class="fa fa-arrow-down"></i>
                        {{$r4}} %</h5>
                        @elseif ($r4 == 0)
                        <h5 style="text-align:right;"></h5>
                        @endif
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <a href="doanhthu" class="small-box-footer">Xem thêm &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Hóa đơn đã thanh toán</span>
                    <span class="info-box-number">{{$hdban}}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-spinner"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Hóa đơn đang chờ</span>
                    <span class="info-box-number">{{$hddaban}}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-archive"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sản phẩm</span>
                    <span class="info-box-number">{{$soluongmonan}}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Nhà cung cấp</span>
                    <span class="info-box-number">{{$soluongncc}}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Donut chart -->
    <div class="col-lg-4 col-xs-4">
        <div class="box box-warning">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <canvas id="myChart"></canvas>
            <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [@foreach($donutchart as $hh)
                            '{{$hh->phuongthucthanhtoan}}',
                            @endforeach],
                    datasets: [{
                        label: '',
                        data: [@foreach($donutchart as $hh)         
                                {{$hh->DT}},
                               @endforeach],
                        backgroundColor: [
                            '#dd4b39',
                            '#00c0ef',
                            '#f39c12',
                        ],
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Phương thức thanh toán'
                        }
                    },
                    layout: {
                        padding: {
                            left: 50,
                            right: 50,
                            top: 5,
                            bottom: 70
                        }
                    }
                }
            });
            </script>
        </div>
    </div>
</div>