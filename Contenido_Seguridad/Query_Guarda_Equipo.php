<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
$IDUsuarios_session= $_SESSION['SesionIDUsuarios'];
$Nombre_session = $_SESSION['SesionNombre'];
$Appat_session = $_SESSION['SesionAppat'];
$Apmat_session=$_SESSION['SesionApmat'];
$Tipo_Usuario_session = $_SESSION['SesionTipo_Usuario'];
if ($Tipo_Usuario_session != 2) {
    session_destroy();
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}


include_once '../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
$Tipo = $_POST["Tipo"];
$hiddenidPersona = $_POST["hiddenidPersona"];
$Nombre = $_POST["Nombre"];
$Appat = $_POST["Appat"];
$Apmat = $_POST["Apmat"];
$Telefono = $_POST["Telefono"];
$Compania = $_POST["Compania"];
$RazonPersona == $_POST["RazonPersona"];
$Persona_Obs = $_POST["Persona_Obs"];

$checkEquipos = $_POST["checkEquipos"];
$IdentEquipo = $_POST["IdentEquipo"];
$DescripcionEquipo = $_POST["DescripcionEquipo"];
$Cantidad = $_POST["Cantidad"];
$Unidad = $_POST["Unidad"];
$RazonEquipo = $_POST["RazonEquipo"];

$check = $_POST["check"];
$hiddenPlaca = $_POST["hiddenPlaca"];
$Placa = $_POST["Placa"];
$Marca = $_POST["Marca"];
$Modelo = $_POST["Modelo"];
$Color = $_POST["Color"];
$Vehiculo_Obs = $_POST["Vehiculo_Obs"];
$IDPersona = null;
$ID_material = null;


if ($checkEquipos == "on") {
    $Agregar_Materiales = $Conexion->query("insert into materiales set Identificador='$IdentEquipo', Descripcion='$DescripcionEquipo',Cantidad='$Cantidad',Unidad='$Unidad'");
    $ID_material = mysql_insert_id();

    if ($Agregar_Materiales == 1) {//comprobamos que se guardo el registro MATERIALES
        echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-3 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Equipo(s) registrado(s) con exito!
                    </div>
                     </div>
                </div> ";
    } else {
        echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-3 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al registrar el/los equipo!</strong>
                </div>
                </div>
                </div>";
    }//fin else comprobacion registro material   
}
if ($check == "on") {
    if ($hiddenPlaca == null) {//Cuando la placa no existe en la bd se agrega  
        $Agregar_Vehiculo = $Conexion->query("insert into vehiculos set Placa='$Placa',Marca='$Marca',Modelo='$Modelo',Color='$Color'");

        if ($Agregar_Vehiculo == 1) {//comprobamos que se guardo el registro
            echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-3 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Nuevo Vehiculo registrado!
                    </div>
                     </div>
                </div> ";
        } else {
            echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-3 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al insertar los datos de vehiculo!</strong>
                </div>
                </div>
                </div>";
        }//fin else comprobacion registro vehiculo
    }//Fin hidden placa
}

//Comprobamos persona
if ($hiddenidPersona == null) {//Cuando la Persona no existe en la bd se agrega  
    $Agregar_Persona = $Conexion->query("insert into personas set Nombre='$Nombre',Appat='$Appat',Apmat='$Apmat',Telefono='$Telefono',Compania='$Compania'");
    $IDPersona = mysql_insert_id();
    if ($Agregar_Persona == 1) {//comprobamos que se guardo el registro
        echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-3 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Nueva Persona registrada!
                    </div>
                     </div>
                </div> ";
    } else {
        echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-3 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al insertar los datos de persona!</strong>
                </div>
                </div>
                </div>";
    }//fin else comprobacion registro Persona
}//Fin hidden Persona







switch ($check) {
    case "on"://si el check esta activo Continua con la operacion de registro
        switch ($hiddenidPersona) {
            case NULL:
                switch ($hiddenPlaca) {
                    case NULL:
                        // $hiddenidPersona =null $hiddenPlaca=null los datos de persona y vehiculo  no estan almacenado en la bd
                        $Agregar_Log_Materiales = $Conexion->query("insert into loges set IDMateriales='$ID_material', Placa='$Placa', IDUsuarios='$IDUsuarios_session',IDPersona='$IDPersona',RazonPersona='$RazonPersona',Personas_Obs='$Persona_Obs', Tipo='$Tipo', RazonEquipo='$RazonEquipo',Vehiculo_Obs='$Vehiculo_Obs'");

                        break;
                    case!NULL:
                        // $hiddenidPersona =null $hiddenPlaca=dato los datos de persona no estan almacenado pero vehiculo si
                        $Agregar_Log_Materiales = $Conexion->query("insert into loges set IDMateriales='$ID_material', Placa='$hiddenPlaca',IDUsuarios='$IDUsuarios_session',IDPersona='$IDPersona',RazonPersona='$RazonPersona',Personas_Obs='$Persona_Obs', Tipo='$Tipo', RazonEquipo='$RazonEquipo',Vehiculo_Obs='$Vehiculo_Obs'");
                        break;
                }
                break;
            case!NULL:
                switch ($hiddenPlaca) {
                    case NULL:
                        // $hiddenidPersona =dato $hiddenPlaca=null los datos de persona si estan almacenado en las tablas pero vehiculo no
                        $Agregar_Log_Materiales = $Conexion->query("insert into loges set IDMateriales='$ID_material',Placa='$Placa',IDUsuarios='$IDUsuarios_session',IDPersona='$hiddenidPersona',RazonPersona='$RazonPersona',Personas_Obs='$Persona_Obs', Tipo='$Tipo', RazonEquipo='$RazonEquipo' ,Vehiculo_Obs='$Vehiculo_Obs' ");
                        break;
                    case!NULL:
                        // $hiddenidPersona =dato $hiddenPlaca=dato los datos de persona y vehiculo si estan en la bd
                        $Agregar_Log_Materiales = $Conexion->query("insert into loges set IDMateriales='$ID_material',Placa='$hiddenPlaca',IDUsuarios='$IDUsuarios_session',IDPersona='$hiddenidPersona',RazonPersona='$RazonPersona',Personas_Obs='$Persona_Obs', Tipo='$Tipo', RazonEquipo='$RazonEquipo' ,Vehiculo_Obs='$Vehiculo_Obs'");
                        break;
                }
                break;
        }


        break;
    case null://En caso que el check no este seleccionado
        if ($hiddenidPersona == NULL) {
            //registramos los datos del log sin placa ni dscripcion de vehiculo y el id otorgado por el incremental de la bd personas
            $Agregar_Log_Materiales = $Conexion->query("insert into loges set IDMateriales='$ID_material',IDUsuarios='$IDUsuarios_session',IDPersona='$IDPersona',RazonPersona='$RazonPersona', Tipo='$Tipo', RazonEquipo='$RazonEquipo',Personas_Obs='$Persona_Obs' ");
        } else {//cuando la persona ya esta registrada en la bd solo obtengo el $hiddenidPersona
            $Agregar_Log_Materiales = $Conexion->query("insert into loges set IDMateriales='$ID_material',IDUsuarios='$IDUsuarios_session',IDPersona='$hiddenidPersona',RazonPersona='$RazonPersona', Tipo='$Tipo', RazonEquipo='$RazonEquipo',Personas_Obs='$Persona_Obs' ");
        }
        break;
}//Fin switch  

if ($Agregar_Log_Materiales == 1) {//comprobamos que se guardo el registro
    echo "  <div class='row'>
                    <div class='col-sm-5 col-md-offset-3 col-lg-5'>
                        <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                     Registro almacenado con exito!
                    </div>
                     </div>
                </div> ";
} else {
    echo "<div class='row'>
                <div class='col-sm-5 col-md-offset-3 col-lg-5'>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Problemas al guardar el registro!</strong>
                </div>
                </div>
                </div>";
}//fin else comprobacion registro Persona
?>