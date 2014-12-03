<?php
    include_once './conexion.php';
    $bd =new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost);
    
//    $usuario= $bd ->get_results("select * from usuarios");
//  foreach ($usuario as $datos){
//        echo $datos -> Usuario;
//    }
   $actualizacion= $bd->query("UPDATE usuarios SET Contrasena='2222' WHERE Usuario='bb'");
    
//    $bd->query("insert into usuarios values ('asdsf','jghf','4','jkhv','khg','htdf')");
   if($actualizacion>0){
       echo 'Datos modificados con exito';
   }else{
      echo 'No se pudo modificar los datos';
   }
       
?>
