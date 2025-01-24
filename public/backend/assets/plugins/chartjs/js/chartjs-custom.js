$(function() {


    // chart1
    var ctx = document.getElementById('chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
            datasets: [{
                label: 'Google',
                data: [6, 20, 14, 12, 17, 8, 10],
                backgroundColor: [
                    '#008cff'
                ],
                lineTension: 0.4,
                borderColor: [
                    '#008cff'
                ],
                borderWidth: 3
            },
            {
                label: 'Facebook',
                data: [5, 30, 16, 23, 8, 14, 11],
                backgroundColor: [
                    '#fd3550'
                ],
                tension: 0.4,
                borderColor: [
                    '#fd3550'
                ],
                borderWidth: 3
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
				legend: {
					position:'bottom',
					display: true,
				}
			},
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
