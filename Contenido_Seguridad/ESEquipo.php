<form action="#" method="POST" role="form">
	<legend>Acceso Equipos</legend>

	<div class="form-group">
		<div class="row">
			<div class="col-sm-1 col-md-1 col-lg-1">
			<label for="">Hora:</label>
			</div>
			<div class="col-sm-4 col-md-2 col-lg-2">
				<input type="text" name="Hora" id="inputHora" class="form-control" value="" required="required">
			</div>
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

		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				<label>Descripcion:</label>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<textarea class="form-control" rows="5" name="Descripcion"></textarea>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				<label for="inputCantidad">Cantidad:</label>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<input type="number" name="Cantidad" id="inputCantidad" class="form-control" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				<label>Unidad:</label>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<input type="text" name="" id="input" class="form-control" value="" placeholder="Caja,kilo,pieza, etc..." required="required" >
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				<label for="">Razon:</label>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<input type="text" name="Razon" id="inputRazon" class="form-control" value="" required="required" placeholder="Razon de visita">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div class="panel panel-default">
						  <div class="panel-heading">Persona</div>
							  <div class="panel-body">
							   <!-- Panel content-->
							   <div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Nombre:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Nombre" id="inputNombre" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Apellido Paterno:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Appat" id="inputAppat" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label>Apellido Materno:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Apmat" id="inputApmat" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Telefono:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Telefono" id="inputTelefono" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
				<label for="">Compañia:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Compania" id="inputCompania" class="form-control" value="" required="required">
			</div>
		</div><br>
							  </div>
					</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="panel panel-default">
						  <div class="panel-heading">Vehiculo</div>
							  <div class="panel-body">
							   <!-- Panel content-->
							   <div class="row">
								   	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								   		<label for="">Placa:</label>
								   	</div>
								   	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								   		<input type="text" name="Placa" id="inputPlaca" class="form-control" value="" required="required" >
								   	</div>
							   </div>
							   <br>
							   <div class="row">
								   	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								   		<label for="">Marca:</label>
								   	</div>
							   		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							   			<input type="text" name="Marca" id="inputMarca" class="form-control" value="" required="required">
							   		</div>
							   </div>
							   <br>
							   <div class="row">
							   		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							   			<label for="">Modelo:</label>
							   		</div>
							   		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							   			<input type="text" name="Modelo" id="inputModelo" class="form-control" value="" required="required" >
							   		</div>
							   </div>
							   <br>
							   <div class="row">
							   		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							   			<label for="">Color:</label>
							   		</div>
							   		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							   			<input type="text" name="Color" id="inputColor" class="form-control" value="" required="required">
							   		</div>
							   </div>
							   <br>
							   <div class="row">
							   		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							   			<label for="">Observaciones</label>
							   		</div>
							   		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							   			<textarea class="form-control" rows="2" name="Observaciones_Vehiculo"></textarea>
							   		</div>
							   </div>

							  </div>
					</div>

			</div>
		</div>
	</div>



	<button type="submit" class="btn btn-primary">Submit</button>
</form>