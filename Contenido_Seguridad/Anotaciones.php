<script>
    $(document).ready(function() {
        $("#myTable td").click(function() {

            var column_num = parseInt($(this).index()) + 1;
            var row_num = parseInt($(this).parent().index()) + 1;

            $("#result").html("Row_num =" + row_num + "  ,  Rolumn_num =" + column_num);
        });
    });
</script>
<div class="row">

    <div class="col-md-3 ">
        <div class="menu-mensajeria">
            <ul class="nav nav-pills nav-stacked">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Acciones <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">

                        <li><a href="#" onclick="CambiarContenido('#contenido', 'Registro_Usuarios.php')" href="#">Nuevo</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="CambiarContenido('#contenido', 'Consulta_Usuarios.php')">Responder</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="CambiarContenido('#contenido', 'Modificar_Usuario.php')">Eliminar</a></li>
                    </ul>
                </li>
                <li><a href="#">Bandeja de entrada</a></li>
                <li><a href="#">Enviados</a></li>
                
            </ul>
        </div>
    </div>
    
    
    <div class="col-md-9">
        <div id="result"> </div>
        <table class="table table-hover" id="myTable" width="100%">
            <thead>
                <tr>
                    <th width="30%">Remitente</th>
                    <th width="10%">Estado</th>
                    <th>Asunto</th>
                    <th width="10%">fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Bartolo Capetillo Velazquez</b></td>
                    <td><span class="label label-primary">Nuevo</span></td>
                    <td>sdfsdf</td>
                    <td>10/07/2015</td>
                </tr>
                <tr>
                    <td>sdf</td>
                    <td><span class="label label-success">Leido</span></td>
                    <td>sdf</td>
                    <td>sdf</td>
                </tr>
                
            </tbody>
        </table>

    </div>
</div>