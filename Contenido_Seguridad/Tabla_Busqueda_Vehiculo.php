<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable({
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
    <table id="example" class="table table-bordered table-striped table-hover"  width="100%">
        <thead>
            <tr class='info'>
                <th>Seleccione</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
            </tr>
        </thead>

        <tbody id="Tabla_vehiculo">

            <?php
            //Consulta Usuario
            include_once '../Variables_Conexion.php';
            $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);


            $Query = $Conexion->get_results("select * from vehiculos");

            if ($Query != 0) {
                foreach ($Query as $datos) {
                    $Placa = $datos->Placa;
                    $Marca = $datos->Marca;
                    $Modelo = $datos->Modelo;
                    $Color = $datos->Color;
                    ?>
                    <tr>
                        <td><center>
                    <button  type="button" class="btn btn-success btn-sm" onclick="CargarBusquedaVehiculo('<?php echo "$Placa"; ?>')">
                        Seleccionar
                        <span class="glyphicon glyphicon-share-alt"></span>
                    </button></center>
                </td>
                <td><?php echo "$Placa"; ?></td>
                <td><?php echo "$Marca"; ?></td>
                <td><?php echo "$Modelo"; ?></td>
                <td><?php echo "$Color"; ?></td>

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