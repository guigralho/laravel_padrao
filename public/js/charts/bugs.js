total = 237;
nbugs = 22;
var config = {
    type: 'pie',

    data: {
     datasets: [ {
         data:[
            nbugs,
            total - nbugs
         ],
         backgroundColor:[
            "#e41c1c",
            "#10cfbd"
         ]
     }],
     labels:[
        "Bugs",
        "Tarefas",
    ]
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
             display: false,
             scaleLabel: {
                 display: true,
                 labelString: 'Tempo'
             }, 
         }],
         yAxes: [{
             display: false,
             scaleLabel: {
                 display: true,
                 labelString: 'Entrega'
             }
                
         }]
     },
         legend: {
             display: true,
             labels: {
                 fontColor: '#666',
                 fontSize: 30
             },
             position : 'right',
             fullWidth : true
         }
    }
};

window.onload = function() {
    var ctx = $("#grafico");
    window.myLine = new Chart(ctx, config);
};