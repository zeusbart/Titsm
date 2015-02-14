
<form  role="form"  name="Form_Equipos"  id="Form_Equipos">
    <div class="row">
        <div class=" col-sm-10 col-md-offset-3 col-md-6 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> <label>Datos de Persona</label>
                    <button type="button" class="btn btn-primary" onclick="CambiarContenido('#body_tabla_Persona', 'Tabla_Busqueda_Persona.php')" data-toggle="modal" data-target="#ModalPersona">
                        Buscar
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                    <button id="inputLimpiarPersona" onclick="LimpiarCamposPersona()" type="button" class="btn btn-default">Limpiar</button>
                </div>
                <div class="panel-body">
                    <!-- Panel content-->
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="">Nombre:</label>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <input name="hiddenidPersona" id="hiddenidPersona" class="form-control" value="" type="hidden">
                            <input type="text" name="Nombre" id="inputNombre" placeholder="Nombre completo..." class="form-control" value="" required="required">
                        </div>
                        <!--                        <div class="col-sm-4 col-md-2 col-lg-2">
                                                     <button type="button" class="btn btn-default">Buscar</button>
                                                </div>                                       -->
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="">Apellido Paterno:</label>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <input type="text" name="Appat" id="inputAppat" placeholder="Apellido paterno" class="form-control" value="" required="required">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label>Apellido Materno:</label>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <input type="text" name="Apmat" id="inputApmat" placeholder="Apellido materno" class="form-control" value="" required="required">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="">Telefono:</label>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <input type="tel" name="Telefono" id="inputTelefono"  class="form-control" value="" required="required">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="">Compañia:</label>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <input type="text" name="Compania" placeholder="Si no aplica poner -independiente-" id="inputCompania" class="form-control" value="" required="required">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="">Razon:</label>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <input type="text" name="RazonPersona" id="inputRazonPersona" placeholder="Razon de visita, si es salida solo poner s/r" class="form-control" value="" required="required">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="">Observaciones</label>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <textarea id="inputPersona_Obs" class="form-control" rows="5" name="Persona_Obs"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div id="resultado"></div>
</form>