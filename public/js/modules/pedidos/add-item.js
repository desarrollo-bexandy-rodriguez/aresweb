/**
 * Created by brodriguez on 28/11/16.
 */

$(document).ready(function() {

    $("[name=\"seleccion\"]").on('change',null, function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $entrada = $(this);
        var valor = $entrada.val();
        var $cantidad = $("[name=\"cantidad\"]");
        var $precio = $("[name=\"precio\"]");
        //alert (valor);
        if (valor == 'cantidad'){
            $cantidad.attr("readonly",false);
            $cantidad.attr("disabled",false);
            $cantidad.attr("value","");
            $precio.attr("readonly",true);
            $precio.attr("disabled",true);
            $precio.attr("value","");
            $cantidad.focus();
        }
        if (valor == 'precio'){
            $cantidad.attr("readonly",true);
            $cantidad.attr("disabled",true);
            $cantidad.attr("value","");
            $precio.attr("readonly",false);
            $precio.attr("disabled",false);
            $precio.attr("value","");
            $precio.focus();

        }

        return false;
    });
});