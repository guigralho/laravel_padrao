

var config = {
    type: 'bar',

    data: {
     labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul","Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: 'Tarefas programadas',
                backgroundColor: "#CCC",
                borderColor: "#CCC",
                borderWidth: 1,
                data: [
                    10,
                    40,
                    30,
                    60,
                    90,
                    20,
                    10,
                    40,
                    30,
                    60,
                    90,
                    20,
                    0
                ]
            }, {
                label: 'Tarefas finalizadas',
                backgroundColor: "#10cfbd",
                borderColor: "#10cfbd",
                borderWidth: 1,
                data: [
                    5,
                    15,
                    5,
                    20,
                    70,
                    20,
                    5,
                    15,
                    5,
                    20,
                    70,
                    20,
                    0
                ]
            }]
    },
    options: {
     responsive: true,
     title:{
         display:false,
         text:'Chart.js Line Chart'
     },
     tooltips: {
         mode: 'index',
         intersect: false,
     },
     hover: {
         mode: 'nearest',
         intersect: true
     },
     scales: {
         xAxes: [{
             display: true,
             scaleLabel: {
                 display: true,
                 labelString: 'Tempo'
             }, 
         }],
         yAxes: [{
             display: true,
             scaleLabel: {
                 display: true,
                 labelString: 'Quantidade de tarefas'
             },
             ticks:{
                min:0,
                max:120
             }
                
         }]
     },
         legend: {
             display: true,
             labels: {
                 fontColor: '#666'
             },
             position : 'top'
         }
    }
};

window.onload = function() {
    var ctx = $("#grafico");
    window.myLine = new Chart(ctx, config);
};