<script>
        var bandera=false;
    function borrar(i) {
         bandera=true;
           $("table#myTable tr#"+i).remove();          
        }
        $(document).ready(function(){
         CambiarContenido('#contenido_msn','msn/Entrada_msn.php')
         
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

                        <li><a href="#" onclick="CambiarContenido('#contenido_msn', 'msn/Escribir_msn.php')" href="#">Nuevo</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="CambiarContenido('#contenido', 'Consulta_Usuarios.php')">Responder</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="CambiarContenido('#contenido', 'Consulta_Usuarios.php')">Eliminar</a></li>
                    </ul>
                </li>
                <li><a href="#" onclick="CambiarContenido('#contenido_msn','msn/Entrada_msn.php')">Bandeja de entrada</a></li>
                <li><a href="#">Enviados</a></li>

            </ul>
        </div>
    </div>


    <div class="col-md-9">
        <div id="result"> </div>
        <div id="contenido_msn"> </div>
    </div>
</div>

