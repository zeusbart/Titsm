<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
    include_once '../Variables_Conexion.php';
    $bd =new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost);
    $usuario= $bd ->get_results("select * from usuarios where Usuario='1'");
  foreach ($usuario as $datos){
      $valor=$datos -> Usuario;
      $valor2=$datos -> Nombre;

       echo "<input type='text' name='texto' id='inputTexto' class='form-control' value='$valor' required='required' title=''>";
       echo "<input type='text' name='texto' id='inputTexto' class='form-control' value='$valor2' required='required' title=''>";
    }
  // $actualizacion= $bd->query("UPDATE usuarios SET Contrasena='2222' WHERE Usuario='bb'");

//    $bd->query("insert into usuarios values ('asdsf','jghf','4','jkhv','khg','htdf')");
 //  if($actualizacion>0){
   //    echo 'Datos modificados con exito';
   //}else{
    //  echo 'No se pudo modificar los datos';
   //}

?>

</body>
</html>

