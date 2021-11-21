<div class="row">
    <div class="col-xs-12">
        <div class="box box-danger">
            <div class="box-body">
                <canvas id="line" height=100></canvas>
                <script>
                const ct = document.getElementById('line').getContext('2d');
                const line = new Chart(ct, {
                    type: 'bar',
                    data: {
                        datasets: [{
                                type: 'line',
                                label: 'Đơn hàng',
                                data: [@foreach($dtngay as $hh) 
                                        {{$hh->HD}},
                                      @endforeach],                            
                                backgroundColor: ['#00a65a'],
                                borderColor: ['#00a65a'],
                                yAxisID: 'y',
                                tension: 0.3,
                            },
                            {
                                type: 'bar',
                                label: 'Doanh thu',
                                data: [@foreach($dtngay as $hh) 
                                        {{$hh->DT}},
                                      @endforeach],
                                backgroundColor: ['#00c0ef'],
                                yAxisID: 'y1',
                                xAxisID: 'x1',
                            }
                        ],
                        labels: [@foreach($dtngay as $hh) 
                                {{date('d',strtotime($hh->date))}},
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
                                text: 'Doanh thu và số đơn hàng',
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
                    },

                });
                </script>
            </div>
            @include('admin.part3')
        </div>
    </div>
</div>