
<!--<script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#example').DataTable({
        "searching": true, //desabilita la barra de busqueda
        "paging": true, //Desabilita la paginacion 
        "ordering": true, //desabilita el ordenado
        "lengthChange": true //Muestra el total de resultados por pagina paginados

      });
    });
  </script>-->
<script>
      function CargarBusquedaVehiculo(Placa)
     {
         var Pla="Placa="+Placa;
         $.ajax({
             url:"Query_Busqueda_Estudiante.php",
             data:Pla,
             type:"POST",
             dataType:"json",
             success:
                     function (respuesta)
             {
        // alert(respuesta);
                    $('#myModal').modal('hide');
                      $("#inputPlaca").val(respuesta.Placa);
                     $("#inputMarca").val(respuesta.Marca);
                    $("#inputModelo").val(respuesta.Modelo);
                     $("#inputColor").val(respuesta.Color);
                    
             }
                     
         })
     } 
    $(document).ready(function() {
          $("#inputBuscar").hide();
      $("#check").click(function() {
        if ($("#check").is(':checked')) {
          //Activado 
          $('#collapseOne').collapse('show');
          $("#inputPlaca").prop('required', true);
          $("#inputMarca").prop('required', true);
          $("#inputModelo").prop('required', true);
          $("#inputColor").prop('required', true);
//          $("#inputBuscar").prop('disabled', false);
            $("#inputBuscar").show();
        } else {
          //check No activado
          $('#collapseOne').collapse('hide');
          //se limpian los valores
          $("#inputPlaca").val("");
          $("#inputMarca").val("");
          $("#inputModelo").val("");
          $("#inputColor").val("");
          $("#inputVehiculo_Obs").val("");
          
          
          //Se hace requeridos los campos para ser llenados
          $("#inputPlaca").prop('required', false);
          $("#inputMarca").prop('required', false);
          $("#inputModelo").prop('required', false);
          $("#inputColor").prop('required', false);
          
          //$("#inputBuscar").prop('disabled', true);
             $("#inputBuscar").hide();
        }
      });

    });
  </script>
<form action="#" method="POST" role="form">
	<legend>Acceso Equipos</legend>

	<div class="form-group">
		<div class="row">
			<div class="col-sm-1 col-md-1 col-lg-1">
			<label for="">Tipo:</label>
			</div>
<!--			<div class="col-sm-4 col-md-2 col-lg-2">
				<input type="text" name="Hora" id="inputHora" class="form-control" value="" required="required"="required"="required">
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

		<div class="row">
			<div class="col-sm-1 col-md-1 col-lg-1">
				<label>Descripcion:</label>
			</div>
			<div class=" col-sm-5 col-md-5 col-lg-5">
				<textarea class="form-control" rows="5" name="Descripcion" required></textarea>
			</div>
		</div>
		<br>
		<div class="row">
			<div class=" col-sm-1 col-md-1 col-lg-1">
				<label for="inputCantidad">Cantidad:</label>
			</div>
			<div class=" col-sm-5 col-md-5 col-lg-5">
						<input type="number" name="Cantidad" min="0" id="inputCantidad" class="form-control" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class=" col-sm-1 col-md-1 col-lg-1">
				<label>Unidad:</label>
			</div>
			<div class=" col-sm-5 col-md-5 col-lg-5">
				<input type="text" name="" id="input" class="form-control" value="" placeholder="Caja,kilo,pieza, etc..." required="required" >
			</div>
		</div>
		<br>
		<div class="row">
			<div class=" col-sm-1 col-md-1 col-lg-1">
				<label for="">Razon:</label>
			</div>
			<div class=" col-sm-5 col-md-5 col-lg-5">
				<input type="text" name="Razon" id="inputRazon" class="form-control" value="" required placeholder="Razon de visita">
			</div>
		</div>
		<br>
		<div class="row">
			<div class=" col-sm-6 col-md-6 col-lg-6">
					<div class="panel panel-default">
                        <div class="panel-heading">Datos de Persona
							<button type="button" class="btn btn-primary">Buscar</button>
                        </div>
                            <div class="panel-body">
							   <!-- Panel content-->
							   <div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<label for="">Nombre:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Nombre" id="inputNombre" class="form-control" value="" required="required">
			</div>
<!--                        <div class="col-sm-4 col-md-2 col-lg-2">
                             <button type="button" class="btn btn-default">Buscar</button>
                        </div>                                       -->
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<label for="">Apellido Paterno:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Appat" id="inputAppat" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<label>Apellido Materno:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Apmat" id="inputApmat" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<label for="">Telefono:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Telefono" id="inputTelefono" class="form-control" value="" required="required">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<label for="">Compañia:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
				<input type="text" name="Compania" id="inputCompania" class="form-control" value="" required="required">
			</div>
		</div>
                <br>
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="">Observaciones</label>
                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                            <textarea class="form-control" rows="2" name="Persona_Obs"></textarea>
                    </div>
                </div>
                <br>
                    </div>
					</div>
			</div>
			
		</div>
                <div class="row">
                    
                    <div class=" col-sm-6 col-md-6 col-lg-6">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
              
                    <div class="checkbox">
    <label>
      <input id="check" name="check" type="checkbox"> Datos de Vehiculo
    </label>
  </div>
              <button id="inputBuscar" onclick="CambiarContenido('#body_tabla_vehiculo','Tabla_Busqueda_Vehiculo.php')"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Buscar</button> 
                  </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <!-- Panel content-->
            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3">
                <label for="">Placa:</label>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="Placa" id="inputPlaca" class="form-control" value="">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3">
                <label for="">Marca:</label>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="Marca" id="inputMarca" class="form-control" value="" required="required">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3">
                <label for="">Modelo:</label>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="Modelo" id="inputModelo" class="form-control" value="" required="required">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3">
                <label for="">Color:</label>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="Color" id="inputColor" class="form-control" value="" required="required">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3">
                <label for="">Observaciones</label>
              </div>
              <div class=" col-sm-8 col-md-8 col-lg-8">
                <textarea class="form-control" id="inputVehiculo_Obs" rows="2" name="Vehiculo_Obs"></textarea>
              </div>
            </div>


          </div>
        </div>
      </div>


    </div>
			</div>
                </div>
	</div>



	<button type="submit" class="btn btn-primary">Submit</button>
</form>

 <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Buscar Vehiculo</h4>
          </div>
          <div class="modal-body" id="body_tabla_vehiculo">

          
<!--           <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped table-hover"  width="100%">
              <thead>
                <tr class='info'>
                  <th>Placa</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Color</th>
                </tr>
              </thead>

              <tbody id="Tabla_vehiculo">
              -->
<?php
//	//Consulta Usuario
//        include_once '../Variables_Conexion.php';
//         $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
//         $Consulta=$_POST[Consulta];
//
//         $Query= $Conexion -> get_results("select * from vehiculos");
//
//         if ($Query!=0) {
//         	foreach ($Query as $datos) {
//         		$Placa=$datos -> Placa;
//         		$Marca=$datos -> Marca;
//         		$Modelo=$datos -> Modelo;
//         		$Color=$datos -> Color;
//         			echo "		<tr>
//								<td>$Placa</td>
//								<td>$Marca</td>
//								<td>$Modelo</td>
//								<td>$Color</td>
//								
//							</tr>";
//         	}
//         }else{
//                echo 'problemas en la consulta';
//         }

 ?>
<!--              </tbody>
            </table>
  </div>-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
