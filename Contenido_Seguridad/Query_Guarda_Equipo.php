<?php
            include_once '../Variables_Conexion.php';
            $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
//	    $Conexion_Materiales = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
//            $Conexion_Vehiculos = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
//            $Conexion_Usuarios = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
//	    $Conexion_Log = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
            
            $Tipo=$_POST["Tipo"];
            $Descripcion=$_POST["Descripcion"];
            $Cantidad=$_POST["Cantidad"];
            $Unidad=$_POST["Unidad"];
            $Razon=$_POST["Razon"];
            
            $hiddenidPersona=$_POST["hiddenidPersona"];
            $Nombre=$_POST["Nombre"];
            $Appat=$_POST["Appat"];
            $Apmat=$_POST["Apmat"];    
            $Telefono=$_POST["Telefono"];
            $Compania=$_POST["Compania"];
            $Persona_Obs=$_POST["Persona_Obs"];
            
            $check=$_POST["check"];
            $hiddenPlaca=$_POST["hiddenPlaca"];
            $Placa=$_POST["Placa"];
            $Marca=$_POST["Marca"];
            $Modelo=$_POST["Modelo"];
            $Color=$_POST["Color"];
            $Vehiculo_Obs=$_POST["Vehiculo_Obs"];
           
            $IDPersona;
           
            
            //Comprobamos persona
            $Agregar_Materiales=$Conexion ->query("insert into materiales set Descripcion='$Descripcion',Cantidad='$Cantidad',Unidad='$Unidad'");
            $ID_material = mysql_insert_id(); 
            
                if($Agregar_Materiales == 1){//comprobamos que se guardo el registro MATERIALES
                        echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Datos registrados con exito!
                    </div>
                     </div>
                </div> ";
              }else{
                      echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al registrar los datos!</strong>
                </div>
                </div>
                </div>";
              }//fin else comprobacion registro material
            
            
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
             switch($check){  
                case "on"://si el check esta activo Continua con la operacion de registro
                if($hiddenPlaca == null){//Cuando la placa no existe en la bd se agrega  
                $Agregar_Vehiculo=$Conexion -> query("insert into vehiculos set Placa='$Placa',Marca='$Marca',Modelo='$Modelo',Color='$Color'");
              
                if($Agregar_Vehiculo == 1){//comprobamos que se guardo el registro
                        echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Nuevo Vehiculo registrado!
                    </div>
                     </div>
                </div> ";
              }else{
                      echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-4 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al insertar los datos de vehiculo!</strong>
                </div>
                </div>
                </div>";
              }//fin else comprobacion registro vehiculo
                }//Fin hidden placa
                switch ($hiddenidPersona){
                    case NULL:
                        switch ($hiddenPlaca){
                        case NULL:
                            // $hiddenidPersona =null $hiddenPlaca=null los datos de persona y vehiculo  no estan almacenado en la bd
                          $Agregar_Log_Materiales=$Conexion ->query("insert into logesmateriales set IDMateriales='$ID_material', Placa='$Placa',Vehiculo_Obs='$Vehiculo_Obs' ,IDPersona=$IDPersona, Tipo='$Tipo', Razon='$Razon',Personas_Obs='$Persona_Obs' ");
                            
                            break;
                        case !NULL:
                            // $hiddenidPersona =null $hiddenPlaca=dato los datos de persona no estan almacenado pero vehiculo si
                             $Agregar_Log_Materiales=$Conexion ->query("insert into logesmateriales set IDMateriales='$ID_material', Placa='$hiddenPlaca',Vehiculo_Obs='$Vehiculo_Obs' ,IDPersona=$IDPersona, Tipo='$Tipo', Razon='$Razon',Personas_Obs='$Persona_Obs' ");
                             break;
                        }
                        break;
                    case !NULL:
                        switch ($hiddenPlaca){
                        case NULL:
                            // $hiddenidPersona =dato $hiddenPlaca=null los datos de persona si estan almacenado en las tablas pero vehiculo no
                          $Agregar_Log_Materiales=$Conexion ->query("insert into logesmateriales set IDMateriales='$ID_material',Placa='$Placa',Vehiculo_Obs='$Vehiculo_Obs' ,IDPersona='$hiddenidPersona', Tipo='$Tipo', Razon='$Razon',Personas_Obs='$Persona_Obs' ");
                            break;
                        case !NULL:
                            // $hiddenidPersona =dato $hiddenPlaca=dato los datos de persona y vehiculo si estan en la bd
                             $Agregar_Log_Materiales=$Conexion ->query("insert into logesmateriales set IDMateriales='$ID_material',Placa='$hiddenPlaca',Vehiculo_Obs='$Vehiculo_Obs' ,IDPersona='$hiddenidPersona', Tipo='$Tipo', Razon='$Razon',Personas_Obs='$Persona_Obs' ");
                             break;
                        }
                        break;
                }
                
                
                break;
                case null://En caso que el check no este seleccionado
                    if($hiddenidPersona == NULL){
                        //registramos los datos del log sin placa ni dscripcion de vehiculo y el id otorgado por el incremental de la bd personas
                        $Agregar_Log_Materiales=$Conexion ->query("insert into logesmateriales set IDMateriales='$ID_material',IDPersona='$IDPersona', Tipo='$Tipo', Razon='$Razon',Personas_Obs='$Persona_Obs' ");
                    
                    }else{//cuando la persona ya esta registrada en la bd solo obtengo el $hiddenidPersona
                         $Agregar_Log_Materiales=$Conexion ->query("insert into logesmateriales set IDMateriales='$ID_material',IDPersona='$hiddenidPersona', Tipo='$Tipo', Razon='$Razon',Personas_Obs='$Persona_Obs' ");
                    }
                    //registramos los datos del log
                    break;
            }//Fin switch  
            
            
// $Agregar_Persona=$Conexion -> query("insert into personas set Nombre='$Nombre',Appat='$Appat',Appat='$Apmat',Telefono='$Telefono',Compania='$Compania");
//            $ID=$Conexion ->get_row("Select IDUsuarios from usuarios ORDER BY IDUsuarios DESC");
//           $ImprimirID =$ID -> IDUsuarios;



 ?>