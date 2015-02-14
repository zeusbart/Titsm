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
                <th>Persona de acceso</th>  
                <th>Telefono</th>
                <th>Compania</th>
                <th>Razon</th>                   
                <th>Observacion Persona</th>                  
                <th>Usuario que lo registro</th>

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
            $Query = $Conexion->get_results("SELECT loges.Tipo,
                                            DATE_FORMAT(Hora_Fecha, '%d/%m/%Y' ) as fecha,
                                            DATE_FORMAT(Hora_Fecha,'%h:%i:%s %p') as hora,
                                            loges.RazonPersona,
                                            loges.Personas_Obs,
                                            usuarios.Nombre as Nombre_u,
                                            usuarios.Appat as Appat_u,
                                            usuarios.Apmat as Apmat_u,
                                            personas.Nombre as Nombre_p,
                                            personas.Appat as Appat_p,
                                            personas.Apmat as Apmat_p,
                                            personas.Telefono,
                                            personas.Compania 
                                            from loges join Usuarios on loges.IDUsuarios=usuarios.IDUsuarios join personas on loges.IDPersona=personas.                                             IDPersona where Hora_Fecha>='$Fecha_inicio' and Hora_Fecha<='$Fecha_Final'");
            if ($Query != 0) {
                foreach ($Query as $datos) {
                    $Tipo = $datos->Tipo;
                    $fecha = $datos->fecha;
                    $hora = $datos->hora;
                    $Nombre_p = $datos->Nombre_p;
                    $Appat_p = $datos->Appat_p;
                    $Apmat_p = $datos->Apmat_p;
                    $Observaciones = $datos->Personas_Obs;
                    $Razon = $datos->RazonPersona;
                    $Nombre_u = $datos->Nombre_u;
                    $Appat_u = $datos->Appat_u;
                    $Apmat_u = $datos->Apmat_u;
                    $Telefono = $datos->Telefono;
                    $Compania = $datos->Compania;
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
                        <td><?php echo $Nombre_p . " " . $Appat_p . " " . $Apmat_p; ?></td>
                        <td><?php echo "$Telefono"; ?></td>
                        <td><?php echo "$Compania"; ?></td>
                        <td><?php echo "$Razon"; ?></td>
                        <td><?php echo "$Observaciones"; ?></td>
                        <td><?php echo $Nombre_u . ' ' . $Appat_u . ' ' . $Apmat_u; ?></td>
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