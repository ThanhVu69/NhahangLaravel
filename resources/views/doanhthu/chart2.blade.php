<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart1" width="400" height="400"></canvas>
<script>
const ctx = document.getElementById('myChart1').getContext('2d');
const myChart1 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [@foreach($bieudo as $hh)
            '{{$hh->monan->Ten}}',
            @endforeach
        ],
        datasets: [{
            label: [''],
            data: [@foreach($bieudo as $hh) 
                {{$hh->TT}},
                @endforeach
            ],
            backgroundColor: [
                '#f39c12',
                '#f39c12',
                '#f39c12',
                '#f39c12',
                '#f39c12',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Top món ăn doanh thu cao hôm nay'
            }
        },
    }
});
</script>