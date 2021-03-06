<form action="Query_Cambiar_Contrasena.php" id="FormActualiza" method="POST" role="form">
    <legend><b>Cambiar Contraseña</b></legend>

    <div class="form-group">

        <div class="row">
            <div class="col-sm-offset-2 col-sm-3 col-md-offset-3 col-md-2 col-lg-2">
                <label>Contraseña Actual:</label>
            </div>
            <div class=" col-sm-4 col-md-3 col-lg-3">
                <input type="password" name="PassActual" id="inputPassActual" placeholder="Escriba su contraseña actual" class="form-control" value="" required="required" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class=" col-sm-offset-2 col-sm-3 col-md-offset-3 col-md-2 col-lg-2">
                <label>Nueva Contraseña:</label>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3">
                <input type="password" name="PassNueva" id="inputPassNueva" placeholder="Escriba su contraseña" class="form-control" value="" required="required" onchange="form.Confirmpass.pattern = this.value;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-offset-2 col-sm-3 col-md-offset-3 col-md-2 col-lg-2">
                <label>Confirmar Contraseña:</label>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3">
                <input type="password" name="Confirmpass" id="inputConfirmpass" placeholder="Repita su contraseña" class="form-control" value="" required="required" >
            </div>
        </div>
        <br>
        <div id="resultado">

        </div>
    </div>
    <div class="form-inline col-sm-offset-3 col-md-offset-4 col-md-4 col-lg-5">
        <div class="form-group">
            <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Limpiar campos </button>

        </div>
        <div class="form-group">


            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar Datos</button>
        </div>
    </div>
</form>


<script type="text/javascript">
    $(document).ready(function() {
        $("#FormActualiza").ajaxForm({
            type: "POST",
            target: "#resultado",
            resetForm: true
        });
    });
</script>
