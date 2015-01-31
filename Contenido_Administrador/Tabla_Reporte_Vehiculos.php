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
                  <th>placa</th>  
                   <th>marca</th>
                  <th>modelo</th>
                  <th>color</th>                   
                  <th>observaciones</th>                  
                </tr>
              </thead>
              <tbody id="Tabla_vehiculos">            
<?php
$Fecha_inicio=$_POST["Fecha_inicio"]." "."00:00:00";
$Fecha_Final=$_POST["Fecha_Final"]." "."23:59:59";
	//Consulta Usuario
        include_once '../Variables_Conexion.php';
         $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
//         $Consulta=$_POST[Consulta];
         $Query= $Conexion -> get_results("SELECT 
                                            loges.tipo,
                                            DATE_FORMAT(loges.Hora_Fecha, '%d/%m/%Y' ) as fecha,
                                            DATE_FORMAT(loges.Hora_Fecha,'%h:%i:%s %p') as hora,
                                            loges.Placa,
                                            vehiculos.Marca,
                                            vehiculos.Modelo,
                                            vehiculos.Color,
                                            loges.Vehiculo_Obs
                                            from 
                                            loges join vehiculos on loges.Placa = vehiculos.Placa where Hora_Fecha>='$Fecha_inicio' and Hora_Fecha<='$Fecha_Final'");
         if ($Query!=0) {
         	foreach ($Query as $datos) {
                    $Tipo=$datos -> Tipo ; 
                    $fecha=$datos -> fecha ;
                    $hora =$datos -> hora;
                    $placa=$datos -> Placa ;
                    $Marca=$datos -> Marca;
                    $Modelo=$datos ->Modelo;
                    $Color=$datos -> Color;
                    $Vehiculo_Obs=$datos->Vehiculo_Obs;  
                ?>
                <tr>
              <td><?php                      
                    switch($Tipo){
                        case 0:
                            $impTipo="Entrada";
                            break;
                        case 1:  
                            $impTipo="Salida";
                            break;
                       
                    }
                    echo "$impTipo"; 
                    ?></td>
                    <td><?php echo "$fecha";  ?></td>                                                       
                    <td><?php echo "$hora";  ?></td>
                    <td><?php echo "$placa";  ?></td>
                    <td><?php echo "$Marca";  ?></td>
                    <td><?php echo "$Modelo";  ?></td>
                    <td><?php echo "$Color";  ?></td>
                    <td><?php echo "$Vehiculo_Obs";  ?></td>
                    </tr>
         	<?php }
         }else{
                echo "problemas en la consulta";
         }?>
 </tbody>
            </table>
  </div>