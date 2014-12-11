
<form action="Query_Registro_Usuario.php" method="POST" role="form">
    	<legend><b>Registro Usuario</b></legend>

    	<div class="form-group">
	<div class="row">
		<div class=" col-sm-3 col-md-offset-2 col-lg-2">
			<p>ID Usuario:</p>
		</div>
		<div class="col-sm-4 col-md-3 col-lg-3">
			<?php
                                include_once '../Variables_Conexion.php';
                                $Conexion=new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost);
                                $Consulta=$Conexion ->get_row("Select Usuario from usuarios ORDER BY usuarios.Usuario DESC");
                                $ID=$Consulta -> Usuario+1;
                                echo "<input type='text' name='usuario' id='inputUsuario'  class='form-control' value='$ID' disabled>";
			 ?>


		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
			<p>Nombre:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="Nombre" id="inputNombre" placeholder="Escriba su nombre" class="form-control"  required="required">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
			<p>Apellido Paterno:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="Appat" id="inputAppat" placeholder="Escriba su primer Apellido" class="form-control" value="" required="required" >
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
		<p>Apellido Materno:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="Apmat" id="inputApmat" placeholder="Escriba su segundo apellido" class="form-control" value="" required="required" >
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
			<p>Contraseña:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="Pass" id="inputPass" placeholder="Escriba su contraseña" class="form-control" value="" required="required" >
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
			<p>Confirmar Contraseña:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="Confirmpass" id="inputConfirmpass" placeholder="Repita su contraseña" class="form-control" value="" required="required" >
		</div>
	</div>
<br>
<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
			<p>Tipo Usuario:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<select name="Tipo" id="inputTipo" class="form-control" required="required">
				<option value="1">Administrador</option>
				<option value="2">Guardia</option>
				<option value="3">Mesa de ayuda</option>
			</select>
		</div>
</div>


<br>
	<div class="row">
		<div class="col-sm-offset-3 col-md-offset-4 col-lg-5">
			<button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Limpiar campos </button>
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar Datos</button>
		</div>

	</div>
    </div>


    </form>
