<?php
            include_once '../Variables_Conexion.php';
	    $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
        $Conexion2 = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
	        $Nombre=$_POST[Nombre];
            $Appat=$_POST[Appat];
            $Apmat=$_POST[Apmat];
            $Pass=  md5($_POST[Pass]);
            $Tipo=$_POST[Tipo];
            $Agregar_Usuario=$Conexion ->query("Insert into usuarios set Contrasena='$Pass',Tipo='$Tipo',Nombre='$Nombre',Appat='$Appat',Apmat='$Apmat'");
          //  $ID            $Conexion ->get_row("Select IDUsuarios from usuarios ORDER BY IDUsuarios DESC");
           $ImprimirID = mysql_insert_id();

            if($Agregar_Usuario==1){
              echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Nuevo usuario registrado! <br> ID de usuario=<strong> $ImprimirID</strong>
                    </div>
                     </div>
                </div> ";

            }else{
                echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al insertar los datos!</strong>
                </div>
                </div>
                </div>";
           }




 ?>