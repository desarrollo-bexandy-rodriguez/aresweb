/**
 * Created by brodriguez on 11/11/16.
 */
$(document).ready(function() {

    var $desde = $('#desde').val();
    var $hasta = $('#hasta').val();


    getAjaxData($desde,$hasta);

    $( "#desde" ).datepicker({
        maxDate: 0,
        onSelect: function (date) {
            $desde = date;
            getAjaxData($desde,$hasta);
        },
    });

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
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 0,
                depth: 100
            }
        },
        title: {
            text: 'Pedidos Totales Atendidos por Despachador',
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
            title: {
                text: 'Pedidos Atendidos'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>:<b>{point.y}</b> de total<br/>'
        },
        plotOptions: {
            column: {
                depth: 75
            },
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            //y: 370,
            floating: true,
            borderWidth: 1,
            shadow: true
        },
        series: []
    };

    function getAjaxData($desde,$hasta) {
        $.getJSON("traer", {desde: $desde, hasta: $hasta}, function (json) {
            if (json.response == true) {
                options.xAxis.categories = json.datos['categorias']; //xAxis: {categories: []}
                options.series[0] = json.datos['series'];
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

