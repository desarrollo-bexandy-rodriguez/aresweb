/**
 * Created by brodriguez on 31/10/16.
 */
$(document).ready(function(){

    $('#categorias').on('click', 'a.category',function(event){
        event.preventDefault();
        event.stopImmediatePropagation();

        var $categoria = $(this);
        var cat_id = $(this).attr('id');
        cat_id = cat_id.replace("categoria-","");
        $.post("update", {
                id: cat_id
            },
            function(data) {
                if (data.response == true) {
                   // $("#datos").empty();
                    $("#productos").empty();
                    //$stickynote.before("<div class=\"sticky-note\"><textarea id=\"stickynote-"+data.new_note_id+"\"></textarea><a href=\"#\" id=\"remove-"+data.new_note_id+"\"class=\"delete-sticky\">X</a></div>");

                    for ( i=0;i<data.productos.length;i++) {
                       // producto = data.productos[i];
                       // for (llave in producto)
                       // {
                       //           $("#datos").append("<p>"+llave+" : "+producto[llave]+"</p>");
                       // }
                        $("#productos").append("<div class=\"col-sm-6 col-md-2\"><a href=\"/producto/edit/"+data.productos[i].id+"\" class=\"thumbnail\"><img src=\""+data.productos[i].imagen+"\" alt=\""+data.productos[i].nombre+"\"><div class=\"caption\"><h4 id=\"producto-"+data.productos[i].id+"\">"+data.productos[i].nombre+"</h4><p>Categoría: "+data.productos[i].nombcategoria+"</p><p>Precio: "+data.productos[i].preciounidad+" BsF por  "+data.productos[i].nombunidmedventas+"</p></div></a></div>");
                       // $("#productos").append("<div class=\"col-sm-6 col-md-2\"><div class=\"caption\">"+data.productos[i].nombre+"</div></a></div>");

                    }
                }
                else
                {
                    // print error message
                    alert('datos no recibidos ');
                }
            }, 'json');
    });


});