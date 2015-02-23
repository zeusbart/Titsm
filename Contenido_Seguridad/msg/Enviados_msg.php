<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../../index.php";
                </script>';
}
$IDUsuarios_session= $_SESSION['SesionIDUsuarios'];
$Nombre_session = $_SESSION['SesionNombre'];
$Appat_session = $_SESSION['SesionAppat'];
$Apmat_session=$_SESSION['SesionApmat'];
$Tipo_Usuario_session = $_SESSION['SesionTipo_Usuario'];
if ($Tipo_Usuario_session != 2) {
    session_destroy();
    echo '<script type="text/javascript">
                    window.location="../../index.php";
                </script>';
}
?>

<script>
    $(document).ready(function () {
        E_S_msg = "2";
        $("#myTable tr").click(
                function () {
                    if (bandera == false) {

                        CambiarContenido('#contenido_msg', 'msg/Leer_msg.php');
                        Mensaje = $(this).attr("id");
                    }
                });

        bandera = false;
    });
</script>

<table class="table table-hover" id="myTable" width="100%">
    <thead>
        <tr>
            <th width="30%">Enviado a..</th>         
            <th>Asunto</th>
            <th width="10%">Fecha</th>
        </tr>
    </thead>
    <tbody>

        <?php
        //Consulta Usuario
        include_once '../../Variables_Conexion.php';
        $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);

        $Query = $Conexion->get_results("SELECT IDMensajes,Receptor,Estado,Asunto,Fecha,usuarios.Nombre,usuarios.Appat,usuarios.Apmat  FROM mensajes join usuarios on Receptor=IDUsuarios WHERE Remitente=$IDUsuarios_session  ORDER BY Fecha DESC");
        if ($Query != 0) {
            foreach ($Query as $datos) {
                $IDMensajes = $datos->IDMensajes;
                $Receptor = $datos->Receptor;
                $Estado = $datos->Estado;
                $Asunto = $datos->Asunto;
                $Fecha = date_create($datos->Fecha);
                $Nombre_u = $datos->Nombre;
                $Appat_u = $datos->Appat;
                $Apmat_u = $datos->Apmat;
                ?>
                <tr id='<?php echo "$IDMensajes"; ?>'>

                    <td><b><?php echo $Nombre_u . " " . $Appat_u . " " . $Apmat_u; ?></b></td>



                    <td><?php echo "$Asunto"; ?></td>

                    <td><?php echo date_format($Fecha, 'd-m-y'); ?></td>

                </tr>


                <?php
            }
        } else {
            echo '<span class="label label-default">Bandeja de entrada vacia</span>';
        }
        ?>




        <!--
                <tr id="1">
                    <td><b>Bartolo Capetillo Velazquez</b></td>
                    <td> 
                        <a href="#">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a></td>
                    <td>Pedido</td>
                    <td><span class="label label-primary">Nuevo</span>
                    </td>
                    <td>10/07/2015</td>
                </tr>
                <tr>
                    <td>
                        <b>Luis marino Martinez</b>
                    </td>
                    <td>   
                        <a href="#" onclick="borrar('1')">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td>Problemas </td>
                    <td>
                        <span class="label label-success">Leido</span>
                    </td>
        
        
                    <td>10/07/2015</td>
                </tr>-->

    </tbody>
</table>