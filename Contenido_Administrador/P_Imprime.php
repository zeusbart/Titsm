<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		  include_once '../Variables_Conexion.php';
         $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
         $Consulta=$_POST[Consulta];
          $Query= $Conexion -> get_results("select * from usuarios WHERE IDUsuarios LIKE '$Consulta' OR Nombre LIKE '$Consulta' OR Appat LIKE '$Consulta' OR Apmat LIKE '$Consulta'");
	 ?>
</body>
</html>