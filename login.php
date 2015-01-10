<?php
  include_once 'Variables_Conexion.php';
            $Conexion = new ezSQL_mysql($bdusuario, $bdpass, $bdnombre, $bdhost,$encoding);
            if(!isset($_SESSION)){
                session_start();
            }
            $Username=$_POST["Username"];
            $Password=$_POST["Password"];
            $Comprobacion_Usuario= $Conexion ->get_row("select * from usuarios where IDUsuarios='$username' and Contrasena='$password'");
        
              if($Comprobacion_Usuario == 1){//Comprueba Si el usuario se encuentra en la bd si es 1 es si
                  $_SESSION['IDUsuarios']=$Comprobacion_Usuario -> IDUsuarios;
                  $_SESSION['Nombre']=$Comprobacion_Usuario -> Nombre;
                  $_SESSION['Appat']=$Comprobacion_Usuario -> Appat;
                  $_SESSION['Tipo_Usuario']=$Comprobacion_Usuario -> Tipo;
                  if($_SESSION['Tipo_Usuario']==1){
                    echo '   <script type="text/javascript">
                                window.location="Contenido_Administrador/Menu_Administrador.php";
                                    </script>';
                  }else if($_SESSION['Tipo_Usuario']==2){
                      echo '   <script type="text/javascript">
                                window.location="Contenido_Seguridad/Menu_Seguridad.php";
                                    </script>';
                  }
              }else{      
                  echo '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Acceso Denegado!</strong> </br> Pongase en contacto con recusos humanos
                        </div>';
              }
?>
