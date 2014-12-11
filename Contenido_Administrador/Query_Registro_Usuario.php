<?php
            include_once '../Variables_Conexion.php';
	    $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost);
	    $Nombre=$_POST[Nombre];
            $Appat=$_POST[Appat];
            $Apmat=$_POST[Apmat];
            $Pass=$_POST[Pass];
            $Tipo=$_POST[Tipo];
           echo $Tipo;
            echo $Appat;
            echo $Nombre;
            echo $Apmat;
            echo $Pass;
            $Agregar_Usuario=$Conexion ->query("Insert into usuarios set Contrasena='$Pass',Tipo='$Tipo',Nombre='$Nombre',Appat='$Appat',Apmat='$Apmat'");

            if($Agregar_Usuario==1){
                echo "Datos agregados con exito";
            }else{
                echo "Problemas al insertar los datos";
           }
 ?>