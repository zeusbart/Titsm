<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $ . fn . datepicker . dates [ 'es' ]  =  { 
    days :  [ "Domingo" ,  "Lunes" ,  "Martes" ,  "Miercoles" ,  "Jueves" ,  "Viernes" ,  "Sabado" ,  "Domingo" ], 
    daysShort :  [ "Dom" ,  "Lun" ,  "Mar" ,  "Mie" ,  "Jue" ,  "Vie" ,  "Sab" ,  "Dom" ], 
    daysMin :  [ "Do" ,  "Lu" ,  "Ma" ,  "Mi" ,  "Ju" ,  "Vi" ,  "Sa" ,  "Do" ], 
    months :  [ "Enero" ,  "Febrero" ,  "Marzo" ,  "Abril" ,  "Mayo" ,  "Junio" ,  "Julio" ,  "Agosto" ,  "Septiembre" ,  "Octubre" ,  "Noviembre" ,  "Diciembre" ], 
    monthsShort :  [ "Ene" ,  "Feb" ,  "Mar" ,  "Abr" ,  "May" ,  "Jun" ,  "Jul" ,  "Ago" ,  "Sep" ,  "Oct" ,  "Nov" ,  "Dic" ], 
    today :  "Hoy" , 
    clear :  "Limpíar" 
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

        <form action="Tabla_Reporte_Personas.php" id="FormReportePersona" method="POST" role="form">
<legend><b>Registro Usuario</b></legend>

<div class="form-group">
   
 <div class="row">
        <div class="col-sm-3 col-md-offset-2 col-lg-2">
                <label>Fecha de inicio:</label>
        </div>
        <div class=" col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <input type="text" name="Fecha_inicio" id="InputFecha_inicio" placeholder="Escriba su nombre" class="form-control"  required="required">
        </div>

            

        </div>
    <br>
<div class="row">
        <div class="col-sm-3 col-md-offset-2 col-lg-2">
                <label>Fecha de Final:</label>
        </div>
        <div class=" col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <input type="text" name="Fecha_Final" id="InputFecha_Final" placeholder="Escriba su nombre" class="form-control"  required="required">
        </div>

            

        </div>
    <br>

<div class="row">
        <div class="col-sm-offset-3 col-md-offset-4 col-lg-5">
               
                <button type="submit" class="btn btn-primary">Consultar</button>
        </div>

</div>
    <br>
<div id="resultado">

</div>
</div>


</form>
        
        
        <script type="text/javascript">
	$(document).ready(function(){

		$("#FormReportePersona").ajaxForm({

            type:"POST",
			target:"#resultado",
            resetForm:true
		});
	});
</script>

        
        