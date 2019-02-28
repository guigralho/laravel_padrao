num = 100;
function get_data(){
    var dados = [];
    for (var i = 11; i >= 0; i--) {

        a = num/11;
        dados.push(Math.round(a*i));
    }

    return dados;
}
var config = {
    type: 'line',

    data: {
     labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul","Ago", "Set", "Out", "Nov", "Dez"],
     datasets: [ {
         label: "Tempo ideal",
         fill: false,
         backgroundColor: "#6d5cae",
         borderColor: "#6d5cae",
         borderDash: [5, 5],
         data: get_data()
     },{
         label: "Progresso",
         fill: false,
         backgroundColor: "#48b0f7",
         borderColor: "#48b0f7",
         data: [
         	100, 98, 86, 70, 60, 59, 50, 30, 29, 20, 10, 0
         ],
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
                 labelString: 'Entrega'
             },
             ticks:{
             	min: 0,
             	max: 120
             }
             	
         }]
     },
         legend: {
             display: true,
             labels: {
                 fontColor: '#666'
             }
         }
    }
};

window.onload = function() {
    var ctx = $("#grafico_teste");
    window.myLine = new Chart(ctx, config);
};