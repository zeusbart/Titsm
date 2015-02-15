<?php
include_once '../../Variables_Conexion.php';
$Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);
?>
<div class="row">
    <div class="col-sm-12 col-md-1 col-lg-1">
        <label>Para:</label>
    </div>
    <div class="col-sm-12 col-md-5 col-lg-5">
        <select name="Para" id="inputPara" class="form-control">
            <?php
            $Query = $Conexion->get_results("select IDUsuarios,Nombre,Appat,Apmat,Tipo from usuarios where Tipo <> 3  order by Nombre");
            foreach ($Query as $datos) {
                
                $ID = $datos->IDUsuarios;
                $Nombre = $datos->Nombre;
                $Appat=$datos->Appat;
                $Apmat=$datos->Apmat;
                $Tipo = $datos->Tipo;
                if($Tipo==1){
                    $Tipo="Administrador";
                }else{
                    $Tipo="Guardia";
                }
                echo "<option value=$ID>$Tipo:$Nombre $Appat $Apmat</option>";
            }
            ?>
        </select>

    </div>

</div>
<br>
<div class="row">
    <div class="col-sm-12 col-md-1 col-lg-1">
        <label>Asunto:</label>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <input type="text" name="Asunto" id="inputAsunto" class="form-control" value="" required="required" pattern="" title="">
    </div>

</div>
<br>
<div class="row">
    <!--	<div class="col-sm-12 col-md-2 col-lg-2">
                    <label>Mensaje:</label>
            </div>-->
    <div class="col-sm-12 col-md-12 col-lg-12">
        <textarea id="Mensaje" class="form-control" rows="20" name="Mensaje"></textarea>
    </div>

</div>