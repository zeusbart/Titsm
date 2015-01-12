<?php session_start();
if(!$_SESSION){
        echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
    }
     $IDUsuarios=$_SESSION['IDUsuarios'];
     
            include_once '../Variables_Conexion.php';
            $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
            
            $Agregar_Log_Persona;//variable que se usaa para query insertar persona
        
            
            $Tipo=$_POST["Tipo"];
            $hiddenidPersona=$_POST["hiddenidPersona"];
            $Nombre=$_POST["Nombre"];
            $Appat=$_POST["Appat"];
            $Apmat=$_POST["Apmat"];    
            $Telefono=$_POST["Telefono"];
            $Compania=$_POST["Compania"];
            $Persona_Obs=$_POST["Persona_Obs"];
            $Razon=$_POST["Razon"];
            $IDPersona;
            
              //Comprobamos persona
              if($hiddenidPersona == null){//Cuando la Persona no existe en la bd se agrega  
                $Agregar_Persona=$Conexion -> query("insert into personas set Nombre='$Nombre',Appat='$Appat',Apmat='$Apmat',Telefono='$Telefono',Compania='$Compania'");
                $IDPersona=  mysql_insert_id();
                if($Agregar_Persona == 1){//comprobamos que se guardo el registro
                        echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Nueva Persona registrada!
                    </div>
                     </div>
                </div> ";
                       
              }else{
                      echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al insertar los datos de persona!</strong>
                </div>
                </div>
                </div>";
              }//fin else comprobacion registro Persona
                }//Fin hidden Persona
                 if($hiddenidPersona == NULL){
                        //registramos los datos del log sin placa ni dscripcion de vehiculo y el id otorgado por el incremental de la bd personas
                        $Agregar_Log_Persona=$Conexion ->query("insert into logespersonal set IDUsuarios='$IDUsuarios', IDPersona='$IDPersona', Tipo='$Tipo', Razon='$Razon',Observaciones='$Persona_Obs' ");
                    
                    }else{//cuando la persona ya esta registrada en la bd solo obtengo el $hiddenidPersona
                         $Agregar_Log_Persona=$Conexion ->query("insert into logespersonal set IDUsuarios='$IDUsuarios', IDPersona='$hiddenidPersona', Tipo='$Tipo', Razon='$Razon',Observaciones='$Persona_Obs' ");
                    }

                    if($Agregar_Log_Persona == 1){//comprobamos que se guardo el registro
                        echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Los datos se guardaron con exito!
                    </div>
                     </div>
                </div> ";
                       
              }else{
                      echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al insertar los datos $IDPersona!</strong>
                </div>
                </div>
                </div>";
              }//fin else comprobacion registro Persona
            
?>