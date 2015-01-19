<script>
    $(document).ready(function (){
        
    $("#EnviarDatos").click(function (){
        var DatosForm = $('#Form_Persona').serialize();
//           alert(DatosForm);
           
       $("#Form_Persona").ajaxForm(
            {
                url:"Query_Guarda_Persona.php",
                type:"POST",
                data: DatosForm,        
                target:"#resultado",
                success: 
                        function() { 
                    LimpiarCamposPersona();             
                         } 
                
            });//Fin ajax
        
        });//fin EnviarDatos.click
        
    });//fin document.ready
    function LimpiarCamposPersona(){
        $("#hiddenidPersona").val("");
        $("#inputNombre").val("");
        $("#inputAppat").val("");
        $("#inputApmat").val("");
        $("#inputTelefono").val("");
        $("#inputCompania").val("");
        $("#Persona_Obs").val("");
        $("#inputRazon").val("");
        
        
        
        //habilitamos los campos
        $("#inputNombre").prop('disabled',false);
        $("#inputAppat").prop('disabled',false);
        $("#inputApmat").prop('disabled',false);
        $("#inputTelefono").prop('disabled',false);
        $("#inputCompania").prop('disabled',false);
    
    }
 function CargarBusquedaPersona(IDPersona)
     {
         var Persona="IDPersona="+IDPersona;
        
         $.ajax({
             url:"Query_Busqueda_Persona.php",
             data:Persona,
             type:"POST",
             dataType:"json",
             success:
                     function (respuesta)
             {
                     $('#ModalPersona').modal('hide');
                     $('#hiddenidPersona').val(respuesta.IDPersona);
                     $("#inputNombre").val(respuesta.Nombre);
                     $("#inputAppat").val(respuesta.Appat);
                     $("#inputApmat").val(respuesta.Apmat);
                     $("#inputTelefono").val(respuesta.Telefono);
                     $("#inputCompania").val(respuesta.Compania);
                     $("#inputNombre").prop('disabled',true);
                     $("#inputAppat").prop('disabled',true);
                     $("#inputApmat").prop('disabled',true);
                     $("#inputTelefono").prop('disabled',true);
                     $("#inputCompania").prop('disabled',true);
                    
             }
                     
         });
     }
</script>

<form role="form" name="Form_Persona" id="Form_Persona">
	<legend>Acceso Personal</legend>

	<div class="form-group">
		<div class="row">
			<div class="col-sm-3 col-md-4 col-lg-2">
                            <label>Tipo:</label>
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
		<br>
		<div class="row">
			<div class="col-sm-3 col-md-2 col-lg-2">
                            <label>Nombre:</label>
			</div>
			<div class="col-sm-5 col-md-3 col-lg-3">
                             <input name="hiddenidPersona" id="hiddenidPersona" class="form-control" value="" type="hidden">
				<input type="text" name="Nombre" id="inputNombre" class="form-control" value="" required="required">
			</div>
			<div class="col-sm-5 col-md-1 col-lg-1">
				<button type="button" class="btn btn-primary" onclick="CambiarContenido('#body_tabla_Persona','Tabla_Busqueda_Persona.php')" data-toggle="modal" data-target="#ModalPersona">
                                    Buscar
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </button>
			</div>
			<div class="col-sm-5 col-md-1 col-lg-1">
				<button id="inputLimpiarPersona" onclick="LimpiarCamposPersona()" type="button" class="btn btn-default">Limpiar</button>
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
                            <textarea class="form-control" id="Persona_Obs" rows="5" name="Persona_Obs"></textarea>
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
				<button type="submit" id="EnviarDatos" class="btn btn-primary btn-lg">Registrar Entrada/Salida</button>
			</div>
		</div>
                  <div id="resultado"></div>
	</div>




</form>

 <!-- Modal Persona -->
    <div class="modal fade" id="ModalPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Buscar Persona</h4>
          </div>
          <div class="modal-body" id="body_tabla_Persona">
                <!--contenido que se carga de la la tabla vehiculo php-->
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>