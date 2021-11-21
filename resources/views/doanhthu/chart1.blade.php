<script>
        Highcharts.chart('container', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Top 5 món ăn doanh thu cao nhất'
    },
    
    xAxis: [{
        categories: [@foreach($bieudo as $hh)         
                 '{{$hh->monan->Ten}}',
                @endforeach],
        crosshair: true }],
    yAxis: [{ // Primary yAxis
        labels: {
            format: '{value}',
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
        data: [@foreach($bieudo as $hh)         
                 {{$hh->SL}},
                @endforeach],
        tooltip: {
            valueSuffix: ' suất'
        }
    }, {
        name: 'Tổng tiền',
        type: 'spline',
        data: [@foreach($bieudo as $hh)         
                 {{$hh->TT}},
                @endforeach],
        tooltip: {
            valueSuffix: ' (nghìn VNĐ)'
        }
    }]
});
    </script>