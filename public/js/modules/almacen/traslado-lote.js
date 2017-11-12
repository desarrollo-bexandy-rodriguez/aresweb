/**
 * Created by brodriguez on 04/11/16.
 */
$(document).ready(function() {

    $("div#productos").on('change',".cantidad", function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $entrada = $(this);
        var valor = $entrada.val();
        var pos = $entrada.attr("name");
        pos = pos.replace("traslado-lote-collection[collection][","");
        pos = pos.replace("][cantidad]","");
        var nombdisponible = "traslado-lote-collection[collection]["+pos+"][disponible]";
        var $campodisponible = $("[name=\'"+nombdisponible+"\']");
        var disponible = $campodisponible.val();
        if ( Number(disponible) < Number(valor) ){
            alert("La cantidad a Tralasdar ("+valor+") debe ser menor o igual a la cantidad Disponible ("+disponible+") para el Producto Seleccionado");
            $entrada.val("");
        } else{
            var nombre = "traslado-lote-collection[collection]["+pos+"][actualizado]";
            var $actualizar = $("[name=\'"+nombre+"\']");
            $actualizar.attr("value","actualizado");
        }
        return false;
    });

    $("#categoria").on('change', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $select = $(this);
        var categoria = $select.val();
        var marca = $("#marca").val();
        //alert ("Categoria: "+categoria+" Marca: "+marca);

        $.post("traslado-productos/filtro", {
                categoria: categoria,
                marca: marca
            },
            function(data){
                if(data.response == true) {
                    // alert("Estoy en JSON");
                    $("#productos > fieldset > fieldset").remove();
                    //$("#productos").append("<fieldset><legend>Productos Disponibles</legend></fieldset>");
                    for ( i=0;i<data.productos.length;i++) {
                        $("#productos > fieldset > legend").after(
                            "<fieldset>" +
                            "<input type=\"hidden\" value=\"\" name=\"traslado-lote-collection[collection]["+i+"][idalmacenmayor]\">" +
                            "<input type=\"hidden\" value=\"\" name=\"traslado-lote-collection[collection]["+i+"][idalmacendetal]\">" +
                            "<input type=\"text\" value=\""+data.productos[i].nombmarca+"\" disabled=\"disabled\" readonly=\"readonly\" size=\"20\" name=\"traslado-lote-collection[collection]["+i+"][nombmarca]\">" +
                            "<input type=\"text\" value=\""+data.productos[i].nombcategoria+"\" disabled=\"disabled\" readonly=\"readonly\" size=\"20\" name=\"traslado-lote-collection[collection]["+i+"][nombcategoria]\">" +
                            "<input type=\"hidden\" value=\""+data.productos[i].idproducto+"\" name=\"traslado-lote-collection[collection]["+i+"][idproducto]\">" +
                            "<input class=\"actualizado\" type=\"hidden\" value=\"\" name=\"traslado-lote-collection[collection]["+i+"][actualizado]\">" +
                            "<input type=\"text\" value=\""+data.productos[i].nombproducto+"\" disabled=\"disabled\" readonly=\"readonly\" maxlength=\"45\" size=\"45\" name=\"traslado-lote-collection[collection]["+i+"][nombproducto]\">" +
                            "<input class=\"disponible\" type=\"text\" value=\""+data.productos[i].disponible+"\" disabled=\"disabled\" readonly=\"readonly\" maxlength=\"10\" size=\"5\" name=\"traslado-lote-collection[collection]["+i+"][disponible]\">" +
                            "<label><span>Cantidad</span>" +
                            "<input class=\"cantidad\" type=\"text\" value=\"\" size=\"20\" name=\"traslado-lote-collection[collection]["+i+"][cantidad]\">" +
                            "</label>" +
                            "<input type=\"text\" value=\""+data.productos[i].unidmed+"\" disabled=\"disabled\" readonly=\"readonly\" maxlength=\"10\" size=\"4\" name=\"traslado-lote-collection[collection]["+i+"][unidmed]\">" +
                            "</fieldset>"
                        );
                    }
                }
                else{
                    // print error message
                    alert("Error en JSON");
                    console.log('could not remove ');
                }
            }, 'json');

        return false;
    });

    $("#marca").on('change', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $select = $(this);
        var marca = $select.val();
        var categoria = $("#categoria").val();
        // alert (valor);

        $.post("traslado-productos/filtro", {
                categoria: categoria,
                marca: marca
            },
            function(data){
                if(data.response == true) {
                    // alert("Estoy en JSON");
                    $("#productos > fieldset > fieldset").remove();
                    //$("#productos").append("<fieldset><legend>Productos Disponibles</legend></fieldset>");
                    for ( i=0;i<data.productos.length;i++) {
                        $("#productos > fieldset > legend").after(
                            "<fieldset>" +
                            "<input type=\"hidden\" value=\"\" name=\"traslado-lote-collection[collection]["+i+"][idalmacenmayor]\">" +
                            "<input type=\"hidden\" value=\"\" name=\"traslado-lote-collection[collection]["+i+"][idalmacendetal]\">" +
                            "<input type=\"text\" value=\""+data.productos[i].nombmarca+"\" disabled=\"disabled\" readonly=\"readonly\" size=\"20\" name=\"traslado-lote-collection[collection]["+i+"][nombmarca]\">" +
                            "<input type=\"text\" value=\""+data.productos[i].nombcategoria+"\" disabled=\"disabled\" readonly=\"readonly\" size=\"20\" name=\"traslado-lote-collection[collection]["+i+"][nombcategoria]\">" +
                            "<input type=\"hidden\" value=\""+data.productos[i].idproducto+"\" name=\"traslado-lote-collection[collection]["+i+"][idproducto]\">" +
                            "<input class=\"actualizado\" type=\"hidden\" value=\"\" name=\"traslado-lote-collection[collection]["+i+"][actualizado]\">" +
                            "<input type=\"text\" value=\""+data.productos[i].nombproducto+"\" disabled=\"disabled\" readonly=\"readonly\" maxlength=\"45\" size=\"45\" name=\"traslado-lote-collection[collection]["+i+"][nombproducto]\">" +
                            "<input class=\"disponible\" type=\"text\" value=\""+data.productos[i].disponible+"\" disabled=\"disabled\" readonly=\"readonly\" maxlength=\"10\" size=\"5\" name=\"traslado-lote-collection[collection]["+i+"][disponible]\">" +
                            "<label><span>Cantidad</span>" +
                            "<input class=\"cantidad\" type=\"text\" value=\"\" size=\"20\" name=\"traslado-lote-collection[collection]["+i+"][cantidad]\">" +
                            "</label>" +
                            "<input type=\"text\" value=\""+data.productos[i].unidmed+"\" disabled=\"disabled\" readonly=\"readonly\" maxlength=\"10\" size=\"4\" name=\"traslado-lote-collection[collection]["+i+"][unidmed]\">" +
                            "</fieldset>"
                        );
                                   }
                }
                else{
                    // print error message
                    alert("Error en JSON");
                    console.log('could not remove ');
                }
            }, 'json');

        return false;
    });

});