<script>
 
    $(document).ready(function() {
        $("#myTable td").click(
                    function() {
                          if(bandera==false){
//          var column_num = parseInt($(this).index()) + 1;
            var row_num = parseInt($(this).parent().index()) + 1;
            $("#result").html("Row_num =" + row_num);
            CambiarContenido('#contenido_msn','msn/Leer_msn.php');
            
      
        }});
                
                bandera=false;
    });
</script>

<table class="table table-hover" id="myTable" width="100%">
    <thead>
        <tr>
            <th width="30%">Remitente</th>
            <th width="6%">Accion</th>
            <th>Asunto</th>
            <th width="7%">Estado</th>

            <th width="10%">Fecha</th>
        </tr>
    </thead>
    <tbody>
        <tr id="1">
            <td><b>Bartolo Capetillo Velazquez</b></td>
            <td> 
                <a href="#">
                    <span class="glyphicon glyphicon-trash"></span>
                </a></td>
            <td>Pedido</td>
            <td><span class="label label-primary">Nuevo</span>
            </td>
            <td>10/07/2015</td>
        </tr>
        <tr>
            <td>
                <b>Luis marino Martinez</b>
            </td>
            <td>   
                <a href="#" onclick="borrar('1')">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
            <td>Problemas </td>
            <td>
                <span class="label label-success">Leido</span>
            </td>


            <td>10/07/2015</td>
        </tr>

    </tbody>
</table>