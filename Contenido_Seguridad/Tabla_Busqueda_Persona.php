<script type="text/javascript" class="init">
    $(document).ready(function() {

        $('#TablaPersona').DataTable({
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
    <table id="TablaPersona" class="table table-bordered table-striped table-hover"  width="100%">
        <thead>
            <tr class='info'>
                <th>Seleccione</th>
                <th>Nombre</th>
                <th>Appat</th>
                <th>Apmat</th>
                <th>Telefono</th>
                <th>Compañia</th>
            </tr>
        </thead>

        <tbody id="Tabla_Persona">

            <?php
            //Consulta Usuario
            include_once '../Variables_Conexion.php';
            $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
//         $Consulta=$_POST[Consulta];

            $Query = $Conexion->get_results("select * from personas");

            if ($Query != 0) {
                foreach ($Query as $datos) {
                    $IDPersona = $datos->IDPersona;
                    $Nombre = $datos->Nombre;
                    $Appat = $datos->Appat;
                    $Apmat = $datos->Apmat;
                    $Telefono = $datos->Telefono;
                    $Compania = $datos->Compania;
                    ?>
                    <tr>
                        <td><center>
                    <button  type="button" class="btn btn-success btn-sm" onclick="CargarBusquedaPersona('<?php echo "$IDPersona"; ?>')">
                        Seleccionar
                        <span class="glyphicon glyphicon-share-alt"></span>
                    </button></center>
                </td>
                <td><?php echo "$Nombre"; ?></td>
                <td><?php echo "$Appat"; ?></td>
                <td><?php echo "$Apmat"; ?></td>
                <td><?php echo "$Telefono"; ?></td>
                <td><?php echo "$Compania"; ?></td>
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