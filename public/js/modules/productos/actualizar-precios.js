/**
 * Created by brodriguez on 04/11/16.
 */
$(document).ready(function() {
    $("#add").on('click', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        alert ("Estoy en Jquery");
        var currentCount = $('form > div > fieldset > fieldset').length;
        alert (currentCount);
        var template = $('form > div > fieldset > span').data('template');
        template = template.replace(/__index__/g, currentCount);

        $('form > div > fieldset').append(template);

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
                    $("#productos").empty();
                    $("#productos").append("<fieldset><legend>Productos Disponibles</legend></fieldset>");
                    for ( i=0;i<data.productos.length;i++) {
                        $("#productos > fieldset").append("<fieldset><input type=\"text\" name=\"product[collection]["+i+"][nombcategoria]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombcategoria+"\"><input type=\"text\" name=\"product[collection]["+i+"][nombmarca]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombmarca+"\"><input type=\"hidden\" name=\"product[collection]["+i+"][id]\" value=\""+data.productos[i].id+"\"><input type=\"text\" name=\"product[collection]["+i+"][nombre]\" size=\"60\" maxlength=\"100\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombre+"\"><label><span>Precio</span><input type=\"text\" name=\"product[collection]["+i+"][preciounidad]\" value=\""+data.productos[i].preciounidad+"\"></label></fieldset>");

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
                    $("#productos").empty();
                    $("#productos").append("<fieldset><legend>Productos Disponibles</legend></fieldset>");
                    for ( i=0;i<data.productos.length;i++) {
                        $("#productos > fieldset").append("<fieldset><input type=\"text\" name=\"product[collection]["+i+"][nombcategoria]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombcategoria+"\"><input type=\"text\" name=\"product[collection]["+i+"][nombmarca]\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombmarca+"\"><input type=\"hidden\" name=\"product[collection]["+i+"][id]\" value=\""+data.productos[i].id+"\"><input type=\"text\" name=\"product[collection]["+i+"][nombre]\" size=\"60\" maxlength=\"100\" readonly=\"readonly\" disabled=\"disabled\" value=\""+data.productos[i].nombre+"\"><label><span>Precio</span><input type=\"text\" name=\"product[collection]["+i+"][preciounidad]\" value=\""+data.productos[i].preciounidad+"\"></label></fieldset>");

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
