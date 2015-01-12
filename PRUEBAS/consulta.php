<?php
	/* 
		Incluimos la conexión a la base de datos
		seleccionamos tabla con usuario y contraseña
		y todo lo normal que ya sabemos..
	 */
	include_once('../Variables_Conexion.php');

	$db = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost);
	/* Iniciamos session */
	session_start(); 
	/* creamos una funcion para somular el $_POST */
	function getPost(){
    	$request = file_get_contents('php://input');
    	return json_decode($request,true); 
	}
 
	/* 
		Declaramos las variables con los resultados que llegaron
		mediante request simulando el $_POST
	 */
	$getPost    = getPost();
	$usuario    = $getPost['usuario'];
	$contrasena = $getPost['contrasena'];
 
	/* Creamos el query para darle un select a la bd */
	$query 		= "SELECT usuario, contrasena 
			  	   FROM  usuario
			  	   WHERE usuario = '".$usuario."' AND contrasena = '".$contrasena."'";
 
    /* Ejecutamos el query  y obtenemos el resultado de este mismo*/
	$rs         = $db->get_row($query);
	$usuario    = $rs->usuario;
	$contrasena = $rs->contrasena;
 
	/* 
		checamos si $usuario y $contrasena existen si si existen creamos las
		sessiones correspondientes
	*/
	if (!empty($usuario) && !empty($contrasena) ){
		$_SESSION['usuario']    = $usuario;
		$_SESSION['contrasena'] = $contrasena;
	} else {
		echo "FALSE";
	}
 
?>