<script>
    $(document).ready(function () {

        $.ajax({
            url: "msg/Query_Leer_msg.php",
            data: {"Mensaje":Mensaje,"E_S_msg":E_S_msg},
            type: "POST",
            dataType: "json",
            success:
                    function (respuesta)
                    {
                        
                        $("#inputRemitente").val(respuesta.Remitente);
                        $("#inputAsunto").val(respuesta.Asunto);
                        $("#inputAsunto").val(respuesta.Asunto);
                        $("#inputMensaje").val(respuesta.Mensaje);
                        if(E_S_msg=="1"){
                            $("#destino_msg").html("<label>De:</label>");
                            
                        }else if(E_S_msg=="2"){
                            $("#destino_msg").html("<label>Para:</label>");
                        }
                        
                    }
        });

    });
</script>
<div class="row">
    <div class="col-sm-12 col-md-1 col-lg-1 " id="destino_msg">
        
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">

        <input type="text" name="Remitente" id="inputRemitente" class="form-control" readonly>
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
        <textarea id="inputMensaje" class="form-control" rows="20" name="Mensaje" readonly></textarea>
    </div>

</div>