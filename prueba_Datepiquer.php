<!DOCTYPE html>
<html>
    <head>
        <title>bootstrap datepicker examples</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Bootstrap CSS and bootstrap datepicker CSS used for styling the demo pages-->

        <link rel="stylesheet" href="bootstrap_css/bootstrap.min.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
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
                $('#inputNombre').datepicker({
                    format: "yyyy-mm-dd",
                    todayBtn: "linked",
                    clearBtn: true,
                    language: "es",
                    multidate: false,
                    autoclose: true,
                    todayHighlight: true
                });
                $('#inputNombre2').datepicker({
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
    </head>
    <body>

        <div class="row">
            <div class="col-sm-3 col-md-offset-2 col-lg-2">
                <label>Fecha de inicio:</label>
            </div>
            <div class=" col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <input type="text" name="Nombre" id="inputNombre" placeholder="Escriba su nombre" class="form-control"  required="required">
            </div>



            <!--            
                        <div class="hero-unit">
                            <input type="text" placeholder="click to show datepicker"  id="inputNombre">
                        </div>-->
        </div>
        <!-- Load jQuery and bootstrap datepicker scripts -->

    </body>
</html>
