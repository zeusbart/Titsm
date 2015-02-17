<script>
    var Mensaje;
    var E_S_msg;//1 si es entrada 2 si es salida
    var bandera = false;
    function borrar(i) {
        bandera = true;
        var Fila_Mensaje = "Fila_Mensaje=" + i;
        var Fila_tabla = myTable.rows.length;

        $.ajax({
            url: "msg/Elimina_msg.php",
            data: Fila_Mensaje,
            type: "POST",
            dataType: "json",
            success:
                    function()
                    {
//                      alert(Fila_Mensaje);
                        $("table#myTable tr#" + i).remove();
//                        alert(Fila_tabla);
                        if (Fila_tabla <= 2) {
                            CambiarContenido('#contenido_msg', 'msg/Entrada_msg.php');
                        }
                    }
        });
    }
    
    $(document).ready(function() {
        CambiarContenido('#contenido_msg', 'msg/Entrada_msg.php');
        
     
    });
</script>

<legend><b>Mensajes</b></legend>
<div class="row">

    <div class="col-md-3 ">
        <div class="menu-mensajeria">
            <ul class="nav nav-pills nav-stacked">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Acciones <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">

                        <li><a href="#" onclick="CambiarContenido('#contenido_msg', 'msg/Escribir_msg.php')" href="#">Nuevo</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="CambiarContenido('#contenido', 'Consulta_Usuarios.php')">Responder</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="CambiarContenido('#contenido', 'Consulta_Usuarios.php')">Eliminar</a></li>
                    </ul>
                </li>
                <li><a href="#" onclick="CambiarContenido('#contenido_msg', 'msg/Entrada_msg.php')">Bandeja de entrada</a></li>
                <li><a href="#" onclick="CambiarContenido('#contenido_msg', 'msg/Enviados_msg.php')">Enviados</a></li>

            </ul>
        </div>
    </div>


    <div class="col-md-9">

        <div id="contenido_msg"> </div>
    </div>
</div>

