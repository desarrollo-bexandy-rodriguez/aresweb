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
        pos = pos.replace("ingreso-producto-lote-collection[collection][","");
        pos = pos.replace("][cantidad]","");
        var nombre = "ingreso-producto-lote-collection[collection]["+pos+"][actualizado]";
        var $actualizar = $("[name=\'"+nombre+"\']");
        $actualizar.attr("value","actualizado");
        //alert ("Precio: "+categoria+" BsF. Posicion:"+pos);
        return false;
    });

    $("#categoria").on('change', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $select = $(this);
        var categoria = $select.val();
        var marca = $("#marca").val();
        //alert ("Categoria: "+categoria+" Marca: "+marca);

        $.post("ingreso-productos/filtro", {
                categoria: categoria,
                marca: marca
            },
            function(data){
                if(data.response == true) {
                    // alert("Estoy en JSON");
                    $("#productos > fieldset > fieldset").remove();
                    //$("#productos").append("<fieldset><legend>Productos Disponibles</legend></fieldset>");
                    for ( i=0;i<data.productos.length;i++) {
                        $("#productos > fieldset > legend").after("<fieldset><input type=\"text\" name=\"ingreso-producto-lote-collection[collection]["+i+"][nombmarca]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombmarca+"\"><input type=\"text\" name=\"ingreso-producto-lote-collection[collection]["+i+"][nombcategoria]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombcategoria+"\"><input type=\"hidden\" name=\"ingreso-producto-lote-collection[collection]["+i+"][id]\" value=\""+data.productos[i].id+"\"><input type=\"hidden\" name=\"ingreso-producto-lote-collection[collection]["+i+"][actualizado]\" class=\"taghidden\" value=\""+data.productos[i].actualizado+"\"><input type=\"text\" name=\"ingreso-producto-lote-collection[collection]["+i+"][nombre]\" size=\"45\" maxlength=\"100\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombre+"\"><label><span>Cantidad</span><input type=\"text\" class=\"cantidad\" size=\"20\" name=\"ingreso-producto-lote-collection[collection]["+i+"][cantidad]\" value=\"\"></label><input type=\"text\" value=\""+data.productos[i].nombunidmedalmacen+"\" disabled=\"disabled\" readonly=\"readonly\" maxlength=\"10\" size=\"10\" name=\"ingreso-producto-lote-collection[collection]["+i+"][nombunidmedalmacen]\"></fieldset>");
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

        $.post("ingreso-productos/filtro", {
                categoria: categoria,
                marca: marca
            },
            function(data){
                if(data.response == true) {
                    // alert("Estoy en JSON");
                    $("#productos > fieldset > fieldset").remove();
                    //$("#productos").append("<fieldset><legend>Productos Disponibles</legend></fieldset>");
                    for ( i=0;i<data.productos.length;i++) {
                        $("#productos > fieldset > legend").after("<fieldset><input type=\"text\" name=\"ingreso-producto-lote-collection[collection]["+i+"][nombmarca]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombmarca+"\"><input type=\"text\" name=\"ingreso-producto-lote-collection[collection]["+i+"][nombcategoria]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombcategoria+"\"><input type=\"hidden\" name=\"ingreso-producto-lote-collection[collection]["+i+"][id]\" value=\""+data.productos[i].id+"\"><input type=\"hidden\" name=\"ingreso-producto-lote-collection[collection]["+i+"][actualizado]\" class=\"taghidden\" value=\""+data.productos[i].actualizado+"\"><input type=\"text\" name=\"ingreso-producto-lote-collection[collection]["+i+"][nombre]\" size=\"45\" maxlength=\"100\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombre+"\"><label><span>Cantidad</span><input type=\"text\" class=\"cantidad\" size=\"20\"  name=\"ingreso-producto-lote-collection[collection]["+i+"][cantidad]\" value=\"\"></label><input type=\"text\" value=\""+data.productos[i].nombunidmedalmacen+"\" disabled=\"disabled\" readonly=\"readonly\" maxlength=\"10\" size=\"10\" name=\"ingreso-producto-lote-collection[collection]["+i+"][nombunidmedalmacen]\"></fieldset>");
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
