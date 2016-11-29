/**
 * Created by brodriguez on 16/11/16.
 */
$(document).ready(function() {

    var $desde = $('#desde').val();
    var $hasta = $('#hasta').val();


    getAjaxData($desde,$hasta);

    $( "#desde" ).datepicker();

    $( "#hasta" ).datepicker({
        maxDate: 0,
        onSelect: function (date) {
            $hasta = date;
            getAjaxData($desde,$hasta);
        },
    });


    var options = {
        chart: {
            renderTo: 'contenedor',
            type: 'column',
        },
        title: {
            text: 'Pedidos Diarios Despachador',
            x: -20 //center
        },
        subtitle: {
            text: 'Rango : Desde el '+$desde+' Hasta el '+$hasta,
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Pedidos Atendidos'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        series: []
    };

    function getAjaxData($desde,$hasta) {
        $.getJSON("datos-pedidos-diarios-despachador", {desde: $desde, hasta: $hasta}, function (json) {
            if (json.response == true) {
                //alert("Entre al JSON Ultimo");
                options.xAxis.categories = json.datos['categorias']; //xAxis: {categories: []}
                options.series = json.datos['series'];
                console.log(options.series);
                chart = new Highcharts.Chart(options);
            } else {
                alert("response es false");
            }
        });
    }


    $('#contenedor').on('load', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
    });
});