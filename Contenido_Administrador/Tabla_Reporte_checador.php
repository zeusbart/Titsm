<script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#Tabla_Reporte_checador').DataTable({
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
            <table id="Tabla_Reporte_checador" class="table table-bordered table-striped table-hover"  width="100%">
              <thead>
                <tr class='info'>
             
                  <th>Tipo</th>
                  <th>fecha</th>
                  <th>hora</th>                  
                  <th>Persona de acceso</th>  
                  
                
                </tr>
              </thead>
              <tbody id="Tabla_Persona">            
<?php
$Fecha_inicio=$_POST["Fecha_inicio"]." "."00:00:00";
$Fecha_Final=$_POST["Fecha_Final"]." "."23:59:59";
$personal=$_POST["Personal"];

	//Consulta Usuario
        include_once '../Variables_Conexion.php';
         $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre2, $bdhost,$encoding);
//         $Consulta=$_POST[Consulta];
         $Query= $Conexion -> get_results("SELECT userinfo.NAME,date_format(checkinout.CHECKTIME,'%h:%i:%s %p') AS HORA,date_format(checkinout.CHECKTIME,'%d/%m/%Y') AS Fecha,
checkinout.CHECKTYPE as Tipo FROM checkinout join userinfo on checkinout.USERID=userinfo.USERID where checkinout.USERID='$personal' and CHECKTIME>='$Fecha_inicio' and CHECKTIME<='$Fecha_Final'");
         if ($Query!=0) {
         	foreach ($Query as $datos) {
                   $NAME=$datos -> NAME ; 
                    $Fecha=$datos -> Fecha ;
                     $HORA =$datos -> HORA;
                     $Tipo=$datos -> Tipo ;
                  
                           
                    
                ?>
                  
                <tr>
              <td><?php                      
                    switch($Tipo){
                        case "I":
                            $impTipo="Entrada";
                            break;
                        case "O":  
                            $impTipo="Salida";
                            break;
                       
                    }
                     
                    echo "$impTipo";
                    ?></td>
                    <td><?php echo "$Fecha";  ?></td>                                                       
                    <td><?php echo "$HORA";  ?></td>
                    <td><?php echo "$NAME";?></td>
                   
                    </tr>
         	<?php }
         }else{
                echo "problemas en la consulta";
         }?>
 </tbody>
            </table>
  </div>