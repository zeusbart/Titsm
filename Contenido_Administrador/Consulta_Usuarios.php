<form action="Query_Consulta_Usuario.php" id="FormConsulta" method="POST" role="form">
	<legend>Consulta de Usuario</legend>

	<div class="form-group">

	<div class="row">

			<div class=" col-sm-4 col-md-4 col-lg-4">
				<input type="text" name="Consulta" id="inputConsulta" class="form-control" value="" required="required">
			</div>
			<div class=" col-sm-4 col-md-4 col-lg-4">
				<button type="submit" class="btn btn-primary">Consultar</button>
			</div>

	</div>

</div>

</form>

	<div id="resultado"></div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#FormConsulta").ajaxForm({
            type:"POST",
			target:"#resultado",
            resetForm:true
		});
	});
</script>
