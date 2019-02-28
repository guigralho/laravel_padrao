num = 100;
function get_data(){
    var dados = [];
    for (var i = 0; i < 12; i++) {
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
         fill: true,
         backgroundColor: "#48b0f7",
         borderColor: "#48b0f7",
         data: [
         	0,1,2,3,4,5,6,7,8,9,20,100
         ],
     }, {
         label: "Tempo de Projeto",
         backgroundColor: "#10cfbd",
         borderColor: "#10cfbd",
         data: [
             100,100,100,100,100,100,100,100,100,100,100,100
         ],
         fill: false,
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
                 labelString: 'Total do esforço'
             },
             ticks:{
             	min: 0,
             	max: 120
             }
             	
         }]
     },
        layout: {
            padding: {
                 left: 50,
                 right: 0,
                 top: 20,
                 bottom: 0
             }
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