
    <form action="#" method="POST" role="form">
    	<legend><b>Registro Usuario</b></legend>

    	<div class="form-group">
	<div class="row">
		<div class=" col-sm-3 col-md-offset-2 col-lg-2">
			<p>ID Usuario:</p>
		</div>
		<div class="col-sm-4 col-md-3 col-lg-3">
			<input type="text" name="usuario" id="inputUsuario"  class="form-control" value="" required="required" pattern="" title="">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
			<p>Contraseña:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="pass" id="inputPass" placeholder="Escriba su contraseña" class="form-control" value="" required="required" pattern="" title="">
		</div>
	</div>
<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
			<p>Nombre:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="Nombre" id="inputNombre" placeholder="Escriba su nombre" class="form-control" pattern="[A-Z][a-z]" title="Solo letras" required="required">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
			<p>Apellido Paterno:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="appat" id="inputAppat" placeholder="Escriba su primer Apellido" class="form-control" value="" required="required" pattern="[A-Z][a-z]" title="Solo letras">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-3 col-md-offset-2 col-lg-2">
		<p>Apellido Materno:</p>
		</div>
		<div class="col-sm-6 col-md-5 col-lg-5">
			<input type="text" name="apmat" id="inputApmat" placeholder="Escriba su segundo apellido" class="form-control" value="" required="required" pattern="" title="">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-offset-3 col-md-offset-4 col-lg-4">
			<button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Limpiar campos </button>
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar Datos</button>
		</div>

	</div>
    </div>


    </form>
