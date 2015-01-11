<?php session_start();
    if(!$_SESSION){
        echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
    }
     $IDUsuarios=$_SESSION['IDUsuarios'];
     $Nombre=$_SESSION['Nombre'];
     $Appat=$_SESSION['Appat'];
     $Tipo_Usuario=$_SESSION['Tipo_Usuario'];
      if($Tipo_Usuario != 1){
          session_destroy();
         echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
     }
	//Consulta Usuario
        include_once '../Variables_Conexion.php';
         $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
         $Usuario=$_POST['IDUsuarios'];
         
         $Query= $Conexion -> get_results("select * from usuarios where IDUsuarios='$Usuario' ");
          $Resultado=  array();
         if ($Query!=0) {
         	foreach ($Query as $datos) {
                        $IDUsuarios=$datos -> IDUsuarios;
         		$Nombre=$datos -> Nombre;
         		$Appat=$datos -> Appat;
         		$Apmat=$datos -> Apmat;
         	        $Tipo=$datos -> Tipo;
                        
                        $Resultado['IDUsuarios']=$IDUsuarios;
                        $Resultado['Nombre']=$Nombre;
                        $Resultado['Appat']=$Appat;
                        $Resultado['Apmat']=$Apmat;
                        $Resultado['Tipo']=$Tipo;
                        
                        echo json_encode($Resultado);
                 
         	}
         }
         else{
                echo 'problemas en la consulta';
         }

 ?>
 