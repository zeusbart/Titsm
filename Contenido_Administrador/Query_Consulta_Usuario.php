
<?php
	//Consulta Usuario
        include_once '../Variables_Conexion.php';
         $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
         $Consulta=$_POST[Consulta];

         $Query= $Conexion -> get_results("select * from usuarios WHERE IDUsuarios LIKE '$Consulta' OR Nombre LIKE '$Consulta' OR Appat LIKE '$Consulta' OR Apmat LIKE '$Consulta'");

         if ($Query!=0) {
         		         	echo "<div class='row'>
			<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
         	<div class='table-responsive'>
					<table class='table table-hover  table-bordered'>
						<thead>
							<tr  class='info'>
								<th>ID Usuario</th>
								<th>Tipo</th>
								<th>Nombre</th>
								<th>Apellido paterno</th>
								<th>Apellido Materno</th>
							</tr>
						</thead>
						<tbody>";
         	foreach ($Query as $datos) {
         		$Usuario=$datos -> IDUsuarios;
         		$Contrasena=$datos -> Contrasena;
         		$Tipo=$datos -> Tipo;
         		switch ($Tipo) {
         			case 1:
         				$Tipo="Administrador";
         				break;
         			case 2:
         				$Tipo="Guardia";
         				break;
     				case 3:
     					$Tipo="Mesa de ayuda";
     					break;
         		}
         		$Nombre=$datos -> Nombre;
         		$Appat=$datos -> Appat;
         		$Apmat=$datos -> Apmat;
         			echo "		<tr>
								<td>$Usuario</td>
								<td>$Tipo</td>
								<td>$Nombre</td>
								<td>$Appat</td>
								<td>$Apmat</td>
							</tr>";
         	}

         	echo "</tbody>
					</table>
				</div>
				</div>
				</div>"
				;
         }else{
         		 echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>No se encontro ningun dato!</strong>
                </div>
                </div>
                </div>";
         }

 ?>
