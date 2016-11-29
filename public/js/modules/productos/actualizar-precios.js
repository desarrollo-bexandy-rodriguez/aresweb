/**
 * Created by brodriguez on 04/11/16.
 */
$(document).ready(function() {

    $("div#productos").on('change',".precio", function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $entrada = $(this);
        var valor = $entrada.val();
        var pos = $entrada.attr("name");
        pos = pos.replace("product[collection][","");
        pos = pos.replace("][preciounidad]","");
        var nombre = "product[collection]["+pos+"][actualizado]";
        var $actualizado = $("[name=\'"+nombre+"\']");
        $actualizado.attr("value","actualizado");
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

        $.post("myform/categoria", {
                categoria: categoria,
                marca: marca
            },
            function(data){
                if(data.response == true) {
                    // alert("Estoy en JSON");
                    $("#productos > fieldset > fieldset").remove();
                    //$("#productos").append("<fieldset><legend>Productos Disponibles</legend></fieldset>");
                    for ( i=0;i<data.productos.length;i++) {
                        $("#productos > fieldset > legend").after("<fieldset><input type=\"text\" name=\"product[collection]["+i+"][nombcategoria]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombcategoria+"\"><input type=\"text\" name=\"product[collection]["+i+"][nombmarca]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombmarca+"\"><input type=\"hidden\" name=\"product[collection]["+i+"][id]\" value=\""+data.productos[i].id+"\"><input type=\"hidden\" name=\"product[collection]["+i+"][actualizado]\" class=\"taghidden\" value=\""+data.productos[i].actualizado+"\"><input type=\"text\" name=\"product[collection]["+i+"][nombre]\" size=\"60\" maxlength=\"100\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombre+"\"><label><span>Precio</span><input type=\"text\" class=\"precio\" name=\"product[collection]["+i+"][preciounidad]\" value=\""+data.productos[i].preciounidad+"\"></label></fieldset>");
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

        $.post("myform/categoria", {
                categoria: categoria,
                marca: marca
            },
            function(data){
                if(data.response == true) {
                    // alert("Estoy en JSON");
                    $("#productos > fieldset > fieldset").remove();
                    //$("#productos").append("<fieldset><legend>Productos Disponibles</legend></fieldset>");
                    for ( i=0;i<data.productos.length;i++) {
                        $("#productos > fieldset > legend").after("<fieldset><input type=\"text\" name=\"product[collection]["+i+"][nombcategoria]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombcategoria+"\"><input type=\"text\" name=\"product[collection]["+i+"][nombmarca]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombmarca+"\"><input type=\"hidden\" name=\"product[collection]["+i+"][id]\" value=\""+data.productos[i].id+"\"><input type=\"hidden\" name=\"product[collection]["+i+"][actualizado]\" class=\"taghidden\" value=\""+data.productos[i].actualizado+"\"><input type=\"text\" name=\"product[collection]["+i+"][nombre]\" size=\"60\" maxlength=\"100\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombre+"\"><label><span>Precio</span><input type=\"text\" class=\"precio\" name=\"product[collection]["+i+"][preciounidad]\" value=\""+data.productos[i].preciounidad+"\"></label></fieldset>");
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
