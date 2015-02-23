<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#Tabla_Usuario').DataTable({
            "searching": true, //desabilita la barra de busqueda
            "paging": true, //Desabilita la paginacion 
            "ordering": true, //desabilita el ordenado
            "lengthChange": true, //Muestra el total de resultados por pagina paginados
            "language": {
                "lengthMenu": "Muestra _MENU_ registros por página",
                "zeroRecords": "No se encontro registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrada desde _MAX_ total de registros)"
            }
        });
    });
</script> 

<div class="table-responsive">
    <table id="Tabla_Usuario" class="table table-bordered table-striped table-hover"  width="100%">
        <thead>
            <tr class='info'>
                <th>Seleccione</th>
                <th>IDUsuario</th>
                <th>Nombre</th>
                <th>Appat</th>
                <th>Apmat</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody id="Tabla_Persona">            
            <?php
           
            include_once '../Variables_Conexion.php';
            $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
            $Query = $Conexion->get_results("select * from usuarios");
            if ($Query != 0) {
                foreach ($Query as $datos) {
                    $IDUsuarios = $datos->IDUsuarios;
                    $Nombre = $datos->Nombre;
                    $Appat = $datos->Appat;
                    $Apmat = $datos->Apmat;
                    $Tipo = $datos->Tipo;
                    ?>
                    <tr>
                        <td><center>
                    <button  type="button" class="btn btn-success btn-sm" onclick="CargarBusquedaUsuario('<?php echo "$IDUsuarios"; ?>')">
                        Seleccionar
                        <span class="glyphicon glyphicon-share-alt"></span>
                    </button></center>
                </td>
                <td><?php echo "$IDUsuarios"; ?></td>                                                       
                <td><?php echo "$Nombre"; ?></td>
                <td><?php echo "$Appat"; ?></td>
                <td><?php echo "$Apmat"; ?></td>
                <td><?php
                    switch ($Tipo) {
                        case 1:
                            $impTipo = "Administrador";
                            break;
                        case 2:
                            $impTipo = "Seguridad";
                            break;
                        default :
                            $impTipo = "Desabilitado";
                    }
                    echo "$impTipo";
                    ?></td>
                </tr>
            <?php
            }
        } else {
            echo "problemas en la consulta";
        }
        ?>


        </tbody>
    </table>
</div>