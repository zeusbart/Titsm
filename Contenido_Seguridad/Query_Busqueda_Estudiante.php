
<?php
	//Consulta Usuario
        include_once '../Variables_Conexion.php';
         $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
         $Pla=$_POST['Placa'];
         
         $Query= $Conexion -> get_results("select * from vehiculos where Placa='$Pla' ");
          $Resultado=  array();
         if ($Query!=0) {
         	foreach ($Query as $datos) {
         		$Placa=$datos -> Placa;
         		$Marca=$datos -> Marca;
         		$Modelo=$datos -> Modelo;
         		$Color=$datos -> Color;
                        
                        $Resultado['Placa']=$Placa;
                        $Resultado['Marca']=$Marca;
                        $Resultado['Modelo']=$Modelo;
                        $Resultado['Color']=$Color;
                        
                        echo json_encode($Resultado);
                     
//         			echo "		<tr>
//                                                                <td><center>
//                                                                 <button onclick='CargarBusquedaVehiculo()' type='button' class='btn btn-success btn-sm'>
//                                                                 Seleccionar
//  <span class='glyphicon glyphicon-share-alt'></span>
//</button></center>
//                                                                        </td>
//								<td>$Placa</td>
//								<td>$Marca</td>
//								<td>$Modelo</td>
//								<td>$Color</td>
//								
//							</tr>";
         	}
         }
//         }else{
//                echo 'problemas en la consulta';
//         }

 ?>
 
