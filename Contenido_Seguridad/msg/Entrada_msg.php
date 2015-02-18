<?php
session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
$IDUsuarios = $_SESSION['IDUsuarios'];
$Nombre = $_SESSION['Nombre'];
$Appat = $_SESSION['Appat'];
$Apmat = $_SESSION['Apmat'];
$Tipo_Usuario = $_SESSION['Tipo_Usuario'];
if ($Tipo_Usuario != 2) {
    session_destroy();
    echo '<script type="text/javascript">
                    window.location="../index.php";
                </script>';
}
?>
<script>
    $(document).ready(function() {
        E_S_msg = "1";
        $("#myTable tr").click(
                function() {
                    if (bandera == false) {
                        CambiarContenido('#contenido_msg', 'msg/Leer_msg.php');
                        Mensaje = $(this).attr("id");
//                        alert(Mensaje);
                    }
                });
        bandera = false;
    });
</script>
<div class="table-responsive">
    <table class="table table-hover" name="myTable" id="myTable" width="100%">
        <thead>
            <tr>
                <th width="30%">Remitente</th>
                <th width="6%">Accion</th>
                <th>Asunto</th>
                <th width="7%">Estado</th>
                <th width="10%">Fecha</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include_once '../../Variables_Conexion.php';
            $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost, $encoding);

            $Query = $Conexion->get_results("SELECT IDMensajes,Remitente,Estado,Asunto,Fecha,usuarios.Nombre,usuarios.Appat,usuarios.Apmat  FROM mensajes join usuarios on Remitente=IDUsuarios WHERE Receptor=$IDUsuarios AND Estado <> 3 ORDER BY Fecha DESC");
            if ($Query != 0) {
                foreach ($Query as $datos) {
                    $IDMensajes = $datos->IDMensajes;
                    $Remitente = $datos->Remitente;
                    $Estado = $datos->Estado;
                    $Asunto = $datos->Asunto;
                    $Fecha = date_create($datos->Fecha);
                    $Nombre_u = $datos->Nombre;
                    $Appat_u = $datos->Appat;
                    $Apmat_u = $datos->Apmat;
                    ?>
                    <tr id='<?php echo "$IDMensajes"; ?>'>

                        <td><b><?php echo $Nombre_u . " " . $Appat_u . " " . $Apmat_u; ?></b></td>

                        <td>
                            <a href="#" onclick="borrar('<?php echo "$IDMensajes"; ?>')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>   
                        </td>

                        <td><?php echo "$Asunto"; ?></td>
                        <td><?php
                            switch ($Estado) {
                                case 1:
                                    $impTipo = '<span class="label label-primary">Nuevo</span>';
                                    break;
                                case 2:
                                    $impTipo = '<span class="label label-success">Leido</span>';
                                    break;
                            }
                            echo "$impTipo";
                            ?></td>
                        <td><?php echo date_format($Fecha, 'd-m-y'); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo '<span class="label label-default">Bandeja de entrada vacia</span>';
            }
            ?>
        </tbody>
    </table>
</div>