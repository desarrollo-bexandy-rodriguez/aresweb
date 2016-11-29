/**
 * Created by brodriguez on 22/11/16.
 */
$(document).ready(function() {

    $( "#vencimiento" ).datepicker();

    $("#categoria").on('change', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $select = $(this);
        var categoria = $select.val();
        $("#idcategoria").val(categoria);
    });

    $("#marca").on('change', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $select = $(this);
        var marca = $select.val();
        $("#idmarca").val(marca);
    });

    $("input[type=radio][name=mayor]").on('change', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $select = $(this);
        var mayor = $select.val();
        $("#unidadmedidaalmacen").val(mayor);
    });

    $("input[name='detal']:radio").on('change', function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        var $select = $(this);
        var detal = $select.val();
        $("#unidadmedidaventas").val(detal);
    });

    $("#fileupload").on('change', function(event){
        if (this.files && this.files[0]) {
            console.log("entre al  if");
            var filerdr = new FileReader();
            filerdr.onload = function(e) {
                $('#imageupload').attr('src', e.target.result);
            }
            filerdr.readAsDataURL(this.files[0]);
        } else {
            console.log("No entre al if");
            console.log(this);
        }
    });
});
