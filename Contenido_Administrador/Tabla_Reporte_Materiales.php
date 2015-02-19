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

                <th>Tipo</th>
                <th>fecha</th>
                <th>hora</th>
                <th>Identificador Materiales</th>
                <th>Descripcion Materiales</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Persona de acceso</th>          
                <th>Razon Equipo</th>
                <th>Usuario que lo registro</th>

                <th>Vehiculo Trasporte</th>

            </tr>
        </thead>
        <tbody id="Tabla_Persona">            
            <?php
            $Fecha_inicio = $_POST["Fecha_inicio"] . " " . "00:00:00";
            $Fecha_Final = $_POST["Fecha_Final"] . " " . "23:59:59";
            //Consulta Usuario
            include_once '../Variables_Conexion.php';
            $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
//         $Consulta=$_POST[Consulta];
            $Query = $Conexion->get_results("SELECT loges.Tipo,DATE_FORMAT( Hora_Fecha, '%d/%m/%Y' ) as fecha,
date_format(Hora_Fecha,'%h:%i:%s %p') as hora,materiales.Identificador,materiales.Descripcion,materiales.Cantidad,materiales.Unidad, personas.Nombre as Nombre_p,personas.Appat as Appat_p
,personas.Apmat as Apmat_p,loges.RazonEquipo,usuarios.Nombre,usuarios.Appat,usuarios.Apmat,loges.Placa FROM loges join personas ON loges.IDPersona=personas.IDPersona join materiales on 
loges.IDMateriales=materiales.IDMateriales join usuarios on loges.IDUsuarios= usuarios.IDUsuarios 
 where Hora_Fecha>='$Fecha_inicio' and Hora_Fecha<='$Fecha_Final'
");
            if ($Query != 0) {
                foreach ($Query as $datos) {

                    $Tipo = $datos->Tipo;
                    $fecha = $datos->fecha;
                    $hora = $datos->hora;
                    $Identificador = $datos->Identificador;
                    $Descripcion = $datos->Descripcion;
                    $Cantidad = $datos->Cantidad;
                    $Unidad = $datos->Unidad;
                    $Nombre_p = $datos->Nombre_p;
                    $Appat_p = $datos->Appat_p;
                    $Apmat_p = $datos->Apmat_p;
                    $RazonEquipo = $datos->RazonEquipo;
                    $Nombre = $datos->Nombre;
                    $Appat = $datos->Appat;
                    $Apmat = $datos->Apmat;
                    $Placa = $datos->Placa;
                    ?>
                    <tr>
                        <td><?php
                            switch ($Tipo) {
                                case 0:
                                    $impTipo = "Entrada";
                                    break;
                                case 1:
                                    $impTipo = "Salida";
                                    break;
                            }
                            echo "$impTipo";
                            ?></td>
                        <td><?php echo "$fecha"; ?></td>                                                       
                        <td><?php echo "$hora"; ?></td>
                        <td><?php echo "$Identificador"; ?></td>
                        <td><?php echo "$Descripcion"; ?></td>
                        <td><?php echo "$Cantidad"; ?></td>
                        <td><?php echo "$Unidad"; ?></td>
                        <td><?php echo $Nombre_p . " " . $Appat_p . " " . $Apmat_p; ?></td>

                        <td><?php echo "$RazonEquipo"; ?></td>
                        <td><?php echo $Nombre . ' ' . $Appat . ' ' . $Apmat; ?></td>
                        <td><?php echo "$Placa"; ?></td>




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
<?php echo "<a href='Imp_Repo_Materiales.php?Fecha_inicio=$Fecha_inicio&Fecha_Final=$Fecha_Final'>Imprimir Reporte</a>"?>
