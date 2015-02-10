<script>
    $(document).ready(function (){
    $("#EnviarDatos").click(function (){
        var DatosForm = $('#Modificar_Usuario').serialize();
//          alert(DatosForm);
       $("#Modificar_Usuario").ajaxForm(
            {
                url:"Query_Modifica_Usuario.php",
                type:"POST",
                data: DatosForm,        
                target:"#resultado",
                success: 
                        function() { 
                         LimpiarCamposUsuario();             
                         }  
            });//Fin ajax 
        });//fin EnviarDatos.click
      });//fin document.ready
    function LimpiarCamposUsuario(){
        $("#inputhiddenIDUsuarios").val("");
        $("#inputIDUsuarios").val("");
        $("#inputNombre").val("");
        $("#inputAppat").val("");
        $("#inputApmat").val("");
        $("#inputPass").val("");
        $("#inputConfirmpass").val("");
    }
 function CargarBusquedaUsuario(IDUsuarios)
     {
         var Usuarios="IDUsuarios="+IDUsuarios;
//        alert(Usuarios);
         $.ajax({
             url:"Query_Busqueda_Usuarios.php",
             data:Usuarios,
             type:"POST",
             dataType:"json",
             success:
                     function (respuesta)
             {
        // alert(respuesta);
                     $('#ModalUsuario').modal('hide');
                      $('#inputhiddenIDUsuarios').val(respuesta.IDUsuarios);
                     $('#inputIDUsuarios').val(respuesta.IDUsuarios);
                     $("#inputNombre").val(respuesta.Nombre);
                     $("#inputAppat").val(respuesta.Appat);
                     $("#inputApmat").val(respuesta.Apmat);
                     $("#inputPass").val("");
                     $("#inputConfirmpass").val("");
                     
                     $("#Tipo").val(respuesta.Tipo);    
             }
                     
         });
     }

   
</script>
<form role="form" name="Modificar_Usuario" id="Modificar_Usuario">
    <legend><b>Modificar Usuario</b></legend>
<div class="form-group">
   <br>
   <div class="row">
        <div class="col-sm-3 col-md-offset-3 col-lg-2">
                <label>ID:</label>
        </div>
        <div class="col-sm-4 col-md-3 col-lg-2">
            <input type="hidden" name="hiddenIDUsuarios" id="inputhiddenIDUsuarios" class="form-control" >
                <input type="text" name="IDUsuarios" id="inputIDUsuarios" class="form-control"  disabled="true">
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
        	<button type="button" class="btn btn-primary btn-md" onclick="CambiarContenido('#body_tabla_Usuario','Tabla_Busqueda_Usuario.php')" data-toggle="modal" data-target="#ModalUsuario">Buscar</button>
        </div>
</div>
   <br>
<div class="row">
        <div class="col-sm-3 col-md-offset-3 col-lg-2">
                <label>Nombre:</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
                <input type="text" name="Nombre" id="inputNombre" placeholder="Escriba su nombre" class="form-control"  required="required">
        </div>
</div>
<br>
<div class="row">
        <div class="col-sm-3 col-md-offset-3 col-lg-2">
                <label>Apellido Paterno:</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
                <input type="text" name="Appat" id="inputAppat" placeholder="Escriba su primer Apellido" class="form-control" value="" required="required" >
        </div>
</div>
<br>
<div class="row">
        <div class="col-sm-3 col-md-offset-3 col-lg-2">
                 <label>Apellido Materno:</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
                <input type="text" name="Apmat" id="inputApmat" placeholder="Escriba su segundo apellido" class="form-control" value="" required="required" >
        </div>
</div>
<br>
<div class="row">
        <div class="col-sm-3 col-md-offset-3 col-lg-2">
                <label>Nueva Contraseña:</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <input type="password" name="Pass" id="inputPass" placeholder="Escriba su contraseña" class="form-control" value="" required="required" onchange="form.Confirmpass.pattern = this.value;">
        </div>
</div>
<br>
<div class="row">
        <div class="col-sm-3 col-md-offset-3 col-lg-2">
                <label>Confirmar Contraseña:</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <input type="password" name="Confirmpass" id="inputConfirmpass" placeholder="Repita su contraseña" class="form-control" value="" required="required" >
        </div>
</div>
<br>
<div class="row">
        <div class="col-sm-3 col-md-offset-3 col-lg-2">
                <label>Tipo Usuario:</label>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
                <select name="Tipo" id="Tipo" class="form-control">
                        <option value="1">Administrador</option>
                        <option value="2">Guardia</option>
                         <option value="3">Desabilitado</option>

                </select>
        </div>
</div>
<br>
<div id="resultado">
</div>
<div class="row">
        <div class="col-sm-offset-3 col-md-offset-4 col-lg-5">
                <button type="button" class="btn btn-warning" onclick="LimpiarCamposUsuario()"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Limpiar campos </button>
                <button type="submit" id="EnviarDatos" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar Datos</button>
        </div>
</div>
</div>
</form>




 <!-- Modal Persona -->
    <div class="modal fade" id="ModalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Buscar Persona</h4>
          </div>
          <div class="modal-body" id="body_tabla_Usuario">
                <!--contenido que se carga de la la tabla vehiculo php-->
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>