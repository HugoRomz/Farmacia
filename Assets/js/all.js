$(document).ready(function () {
    $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
    });
});

const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        datasets: [{
            type: 'bar',
            label: 'Bar Dataset',
            data: [10, 20, 30, 40,25,11,22],
             backgroundColor: [
                'rgba(255, 99, 132,0.7 )',
                'rgba(54, 162, 235 ,0.7)',
                'rgba(255, 206, 86,0.7)',
                'rgba(75, 192, 192,0.7)',
                'rgba(153, 102, 255,0.7)',
                'rgba(255, 159, 64,0.7)',
                'rgba(255, 111, 64,0.7)'
            ],
            borderColor:[
                '#cce'
            ]
        }, {
            type: 'line',
            label: 'Line Dataset',
            data: [50, 50, 50, 50,33,44,55],
            backgroundColor: [
                'rgba(255, 99, 132 )',
                'rgba(54, 162, 235 )',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)',
                'rgba(255, 111, 64)'
            ]
        }],
        labels: ['1', '2', '3', '4','5','6','7']
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx2 = document.getElementById('myChart2');
const myChart2 = new Chart(ctx2, {
    legend:{display:false},
    type: 'line',
    data: {
        labels: ['medicina 1', 'medicina 2', 'medicina 3', 'medicina 4', 'medicina 5', 'medicina 6'],
        datasets: [{
            backgroundColor: 'rgba(255, 99, 132 )',
            borderColor: '#fff',
            data:[12,44,25,22,12,32]
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
