<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="area" width="400" height="190"></canvas>
<script>
const areax = document.getElementById('area').getContext('2d');
const area = new Chart(areax, {
    type: 'line',
    data: {
        labels: [@foreach($bieudovung as $hh)
        '{{date('d/m',strtotime($hh->date))}}',
            @endforeach],
        datasets: [{
            label: '',
            data: [@foreach($bieudovung as $hh) 
                {{$hh->DT}},
                @endforeach],
            backgroundColor: ['#3c8dbc'],
            borderWidth: 1,
            fill: true,
            tension: 0.3,
        }]
    },
    options: {
        plugins: {
            filler: {
                propagate: false,
            },
            title: {
                display: true,
                text: 'Doanh thu 2 tuần gần đây'
            }
        },
        pointBackgroundColor: '#fff',
        radius: 10,
        interaction: {
            intersect: false,
        }
    },
});
</script>