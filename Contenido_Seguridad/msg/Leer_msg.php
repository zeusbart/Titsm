<script>
// $(document).ready(function() {
//         $.ajax({
//            url: "msg/Elimina_msg.php",
//            data: Fila_Mensaje,
//            type: "POST",
//            dataType: "json",
//            success:
//                    function()
//                    {
////                      alert(Fila_Mensaje);
//                        $("table#myTable tr#" + i).remove();
//                        alert(Fila_tabla);
//                        if (Fila_tabla <= 2) {
//                            CambiarContenido('#contenido_msg', 'msg/Entrada_msg.php');
//                        }
//                    }
//        });
//     
//    });
</script>
<div class="row">
    <div class="col-sm-12 col-md-1 col-lg-1">
        <label>De:</label>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <input type="hidden" name="idmensaje" id="inputidmensaje" class="form-control" value="1">
        <input type="text" name="Para" id="inputPara" class="form-control" value="Bartolo Capetillo Sanchez" readonly>
    </div>

</div>
<br>
<div class="row">
    <div class="col-sm-12 col-md-1 col-lg-1">
        <label>Asunto:</label>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <input type="text" name="Asunto" id="inputAsunto" class="form-control" readonly>
    </div>

</div>
<br>
<div class="row">
    <!--	<div class="col-sm-12 col-md-2 col-lg-2">
                    <label>Mensaje:</label>
            </div>-->
    <div class="col-sm-12 col-md-12 col-lg-12">
        <textarea id="Mensaje" class="form-control" rows="20" name="Mensaje" readonly></textarea>
    </div>

</div>