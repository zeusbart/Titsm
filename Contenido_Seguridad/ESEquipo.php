<script>  
     var Estado_Vehiculos=0;// a la hora de guardar 
    //1 no hay registros encontrados o se limpian los campos con el boton se rellena manu8almente o el check esta marcado se guardara los campos originales
    //2Cuando el registro es encontrado en la busqueda y asignado; solo guardara su hiddenPlaca y inputVehiculo_Obs
    //0 cuando no esta marcado el check lo que indica que esos campos no se guardan
        var Estado_Persona=1;//1 cuando no se encontro el registro
        //2 cuando el registro se ayo en la bd
   
    $(document).ready(function() {
          $("#inputBuscar").hide();
          $("#inputLimpiar").hide();
           $("#check").click(function() {
        if ($("#check").is(':checked')) {
          //Activado 
          $('#collapseOne').collapse('show');
          $("#hiddenPlaca").val("");
          $("#inputPlaca").prop('required', true);
          $("#inputMarca").prop('required', true);
          $("#inputModelo").prop('required', true);
          $("#inputColor").prop('required', true);
//          $("#inputBuscar").prop('disabled', false);
            $("#inputBuscar").show();
            $("#inputLimpiar").show();
        } else {
          //check No activado
          $('#collapseOne').collapse('hide');
          //se limpian los valores
          $("#hiddenPlaca").val("");
          $("#inputPlaca").val("");
          $("#inputMarca").val("");
          $("#inputModelo").val("");
          $("#inputColor").val("");
          $("#inputVehiculo_Obs").val("");
          //Sehace requeridos los campos para ser llenados
          $("#inputPlaca").prop('required', false);
          $("#inputMarca").prop('required', false);
          $("#inputModelo").prop('required', false);
          $("#inputColor").prop('required', false);  
//            habilitamos los campos
           $("#inputPlaca").prop('disabled',false);
           $("#inputMarca").prop('disabled',false);
           $("#inputModelo").prop('disabled',false);
           $("#inputColor").prop('disabled',false);

          $("#inputBuscar").hide();
          $("#inputLimpiar").hide()
        }
      });
     
    $("#EnviarDatos").click(function (){
        var queryString = $('#Form_Equipos').serialize();
           alert(queryString);
           
       $("#Form_Equipos").ajaxForm(
            {
                url:"Query_Guarda_Equipo.php",
                type:"POST",
                data: queryString,        
                target:"#resultado",
                resetForm: true,
                success:    function() { 
//                $("#check").prop('checked',true);  
                  // $('#collapseOne').collapse('hide');
                } 
                
            });
        
        });

    });
 
//          function submit (){
//       var datos= $("#Form_Equipos").serialize()+"&Estado_Vehiculos="+Estado_Vehiculos;
//      alert(datos);
//            $.ajax({
//                url:"Query_Guarda_Equipo.php",
//                type: 'POST',
//                data: datos,
//                success: function(textStatus) {
//                        alert(textStatus);
//                                }
//            });
        
//     }
  
    function LimpiarCamposVehiculos(){
          $("#hiddenPlaca").val("");
          $("#inputPlaca").val("");
          $("#inputMarca").val("");
          $("#inputModelo").val("");
          $("#inputColor").val("");
          $("#inputVehiculo_Obs").val("");
          
          //         habilitamos los campos
           $("#inputPlaca").prop('disabled',false);
           $("#inputMarca").prop('disabled',false);
           $("#inputModelo").prop('disabled',false);
           $("#inputColor").prop('disabled',false);
    }
    
    function LimpiarCamposPersona(){
        $("#hiddenidPersona").val("");
        $("#inputNombre").val("");
        $("#inputAppat").val("");
        $("#inputApmat").val("");
        $("#inputTelefono").val("");
        $("#inputCompania").val("");
        $("#inputPersona_Obs").val("");
        
        
    }
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
                      $("#hiddenPlaca").val(respuesta.Placa);
                     $("#inputMarca").val(respuesta.Marca);
                    $("#inputModelo").val(respuesta.Modelo);
                     $("#inputColor").val(respuesta.Color);
        //         Desabilitamos los campos
                      $("#inputPlaca").prop('disabled',true);
                      $("#inputMarca").prop('disabled',true);
                     $("#inputModelo").prop('disabled',true);
                     $("#inputColor").prop('disabled',true);
             }
                     
         })
     }
  </script>
  <form  role="form"  name="Form_Equipos" id="Form_Equipos"><!--action="Query_Guarda_Equipo.php"--> <!--method="POST"--> 
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
                            <input type="number" name="Cantidad" placeholder="Solo numeros" min="0" id="inputCantidad" class="form-control" required>
			</div>
		</div>
		<br>
		<div class="row">
			<div class=" col-sm-1 col-md-1 col-lg-1">
				<label>Unidad:</label>
			</div>
			<div class=" col-sm-5 col-md-5 col-lg-5">
				<input type="text" name="Unidad" id="inputUnidad" class="form-control" value="" placeholder="Caja,kilo,pieza, etc..." required="required" >
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
                                <button id="inputLimpiarPersona" onclick="LimpiarCamposPersona()" type="button" class="btn btn-default">Limpiar</button>
                        </div>
                            <div class="panel-body">
							   <!-- Panel content-->
							   <div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<label for="">Nombre:</label>
			</div>
			<div class="col-sm-5 col-md-8 col-lg-8">
                                <input name="hiddenidPersona" id="hiddenidPersona" class="form-control" value="" type="hidden">
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
                        <textarea id="inputPersona_Obs" class="form-control" rows="2" name="Persona_Obs"></textarea>
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
              <button id="inputLimpiar" onclick="LimpiarCamposVehiculos()" type="button" class="btn btn-default">Limpiar</button> 
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
                  <input type="hidden" name="hiddenPlaca" id="hiddenPlaca" class="form-control" value="">
                  <input type="text" name="Placa" id="inputPlaca" class="form-control" value="">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3">
                <label for="">Marca:</label>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="Marca" id="inputMarca" class="form-control" value="">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3">
                <label for="">Modelo:</label>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="Modelo" id="inputModelo" class="form-control" value="" >
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3">
                <label for="">Color:</label>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <input type="text" name="Color" id="inputColor" class="form-control" value="">
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



        <button type="submit" id="EnviarDatos" class="btn btn-primary btn-lg">Registrar Entrada/Salida</button>
         <div id="resultado"></div>
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
