<form action="Query_Registro_Usuario.php" id="FormRegistro" method="POST" role="form">
    <legend><b>Registro Usuario</b></legend>

    <div class="form-group">

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
                <label>Contraseña:</label>
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
                <select name="Tipo"  class="form-control">
                    <option value="1">Administrador</option>
                    <option value="2">Guardia</option>
                    <!--                        <option value="3">Mesa de ayuda</option>-->
                </select>
            </div>
        </div>
        <br>
        <div id="resultado">

        </div>
        <div class="form-inline col-sm-offset-3 col-md-offset-4 col-md-4 col-lg-5">
            <div class="form-group">
                <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Limpiar campos </button>

            </div>
            <div class="form-group">


                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar Datos</button>

            </div>
        </div>
    </div>


</form>


<script type="text/javascript">
    $(document).ready(function() {

        $("#FormRegistro").ajaxForm({
            type: "POST",
            target: "#resultado",
            resetForm: true
        });
    });
</script>
