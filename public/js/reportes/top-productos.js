/**
 * Created by brodriguez on 15/11/16.
 */
$(function () {

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
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Top 20 Productos mas pedidos',
            x: -20 //center
        },
        subtitle: {
            text: 'Rango : Desde el '+$desde+' Hasta el '+$hasta,
            x: -20
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y} unid.</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} unid.',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [],
    };

    function getAjaxData($desde,$hasta) {
        $.getJSON("datos-top-productos", {desde: $desde, hasta: $hasta}, function (json) {
            if (json.response == true) {
                options.series[0] = json.datos;
                console.log(options.series);
                chart = new Highcharts.Chart(options);
            } else {
                alert("response es false");
            }
        });
    };

    $('#contenedor').on('load', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
    });

});