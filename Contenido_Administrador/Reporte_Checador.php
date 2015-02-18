<script type="text/javascript">
    // When the document is ready
    $(document).ready(function() {
        $.fn.datepicker.dates [ 'es' ] = {
            days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
            daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            today: "Hoy",
            clear: "Limpíar"
        };
        $('#InputFecha_inicio').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: "linked",
            clearBtn: true,
            language: "es",
            multidate: false,
            autoclose: true,
            todayHighlight: true
        });
        $('#InputFecha_Final').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: "linked",
            clearBtn: true,
            language: "es",
            multidate: false,
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

<form action="Tabla_Reporte_checador.php" id="FormReporteChecador" method="POST" role="form">
    <legend><b>Reporte Reloj checador</b></legend>

    <div class="form-group">

        <div class="row">
            <div class="col-sm-3 col-md-offset-4 col-lg-2">
                <label>Fecha de inicio:</label>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-2">
                <input type="text" name="Fecha_inicio" id="InputFecha_inicio"  class="form-control"  required="required">
            </div>



        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 col-md-offset-4 col-lg-2">
                <label>Fecha de Final:</label>
            </div>
            <div class=" col-sm-3 col-md-2 col-lg-2">
                <input type="text" name="Fecha_Final" id="InputFecha_Final"  class="form-control"  required="required">
            </div>



        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 col-md-offset-4 col-lg-2">
                <label>Personal:</label>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <select name="Personal" id="input" class="form-control">
                    <?php
                    include_once '../Variables_Conexion.php';
                    $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre2, $bdhost, $encoding);
                    $Query = $Conexion->get_results("select USERID,NAME from userinfo order by NAME");

                    foreach ($Query as $datos) {
                        $ID = $datos->USERID;
                        $Nombre = $datos->NAME;
                        echo "<option value=$ID>$Nombre</option>";
                    }
                    ?>
                </select>          
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-offset-3 col-md-offset-6 col-lg-5">

                <button type="submit" class="btn btn-primary">Consultar</button>
            </div>

        </div>
        <br>
        <div id="resultado">

        </div>
    </div>


</form>


<script type="text/javascript">
    $(document).ready(function() {
        $("#FormReporteChecador").ajaxForm({
            type: "POST",
            target: "#resultado",
            resetForm: true
        });
    });
</script>


