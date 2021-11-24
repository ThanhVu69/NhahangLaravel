<div class="row">
    <div class="col-xs-12">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <canvas id="line" height=100></canvas>
        <script>
        const ct = document.getElementById('line').getContext('2d');
        const line = new Chart(ct, {
            type: 'bar',
            data: {
                datasets: [{
                        type: 'line',
                        label: 'Số lượng',
                        data: [@foreach($dthanghoa as $hh) 
                                {{$hh->SL}},
                                @endforeach],                            
                        backgroundColor: ['#00a65a'],
                        borderColor: ['#00a65a'],
                        yAxisID: 'y',
                        tension: 0.3,
                    },
                    {
                        type: 'bar',
                        label: 'Doanh thu',
                        data: [@foreach($dthanghoa as $hh) 
                                {{$hh->TT}},
                                @endforeach],
                        backgroundColor: ['#00c0ef'],
                        yAxisID: 'y1',
                        xAxisID: 'x1',
                    }
                ],
                labels: [@foreach($dthanghoa as $hh) 
                        '{{$hh->monan->Ten}}',
                                @endforeach]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        position: 'left',
                        grid: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    },
                    y1: {
                        beginAtZero: true,
                        position: 'right',
                        grid: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    },
                    x1: {
                        grid: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Doanh thu theo món ăn',
                    },
                },
                layout: {
                    padding: {
                        left: 50,
                        right: 50,
                        top: 20,
                        bottom: 50
                    }
                },
                barPercentage: 0.4
            },

        });
        </script>
    </div>
</div>