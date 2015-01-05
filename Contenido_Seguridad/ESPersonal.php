<form action="" method="POST" role="form">
	<legend>Acceso Personal</legend>

	<div class="form-group">
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
			<label for="">Tipo:</label>
			</div>
<!--			<div class="col-sm-4 col-md-2 col-lg-2">
				<input type="text" name="Hora" id="inputHora" class="form-control" value="" required="required">
			</div>-->
			<div class="col-sm-5 col-md-5 col-lg-5">
				<div class="radio">
					<label class="checkbox-inline">
						<input type="radio" name="Tipo" id="inputTipo" value="0" checked="checked">
						Entrada
					</label>
					<label class="checkbox-inline">
						<input type="radio" name="Tipo" id="inputTipo" value="1">
						Salida
					</label>
				</div>

			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Nombre:</label>
			</div>
			<div class="col-sm-5 col-md-3 col-lg-3">
				<input type="text" name="Nombre" id="inputNombre" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Apellido Paterno:</label>
			</div>
			<div class="col-sm-5 col-md-3 col-lg-3">
				<input type="text" name="Appat" id="inputAppat" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label>Apellido Materno:</label>
			</div>
			<div class="col-sm-5 col-md-3 col-lg-3">
				<input type="text" name="Apmat" id="inputApmat" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Telefono:</label>
			</div>
			<div class="col-sm-5 col-md-3 col-lg-3">
				<input type="text" name="Telefono" id="inputTelefono" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Compañia:</label>
			</div>
			<div class="col-sm-5 col-md-3 col-lg-3">
				<input type="text" name="Compania" id="inputCompania" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Observaciones:</label>
			</div>
			<div class="col-sm-7 col-md-5 col-lg-4">
					<textarea class="form-control" rows="5" name="Observaciones"></textarea>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Razon:</label>
			</div>
			<div class="col-sm-7 col-md-5 col-lg-4">
				<input type="text" name="Razon" id="inputRazon" class="form-control" value="" required="required">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-5 col-md-5 col-lg-5">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>




</form>