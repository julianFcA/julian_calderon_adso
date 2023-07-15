<?php
    session_start();
    require_once("../../db/conexion.php");
    $db = new database();
    $consu = $db->conectar();

    $docu_ad= $_SESSION['document'];


    $sql = $consu -> prepare ("SELECT * from usuario WHERE documento=usuario.documento AND id_rol=3");
    $sql -> execute();
    $fila = $sql -> fetch();
    
    $conser = $consu -> prepare ("SELECT * from tp_servicio");
    $conser -> execute();
    $servicis = $conser -> fetch();


?>
<?php 
date_default_timezone_set('America/Bogota');
$fecha_actual = date('Y-m-d');
?>

<?php


    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $dcoach=$_POST["adco"];
        $dusuer = $_POST['user'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $servicio = $_POST['servi'];


      
         if ($dcoach=="" || $dusuer=="" || $fecha_inicio=="" || $servicio=="")
        {
            echo '<script> alert (" EXISTEN DATOS VACIOS");</script>';
            echo '<script> windows.location= "venderser.php"</script>';
        }

        else
        {
            $insertsql = $consu -> prepare("INSERT INTO vender_servicio (coach,usuario,fecha,servicio) VALUES ('$dcoach','$dusuer','$fecha_inicio', '$servicio')");
            $filaa1 = $insertsql -> execute();
            echo '<script>alert ("Servicio vendido");</script>';
            echo '<script>windows.location="venderser.php"</script>';
        }

    }

?>




<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Suscripcion de usuario | Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
            </div>
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <p class="text-center" style="padding-top: 15px;">Menu</p>
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="index.php">&nbsp;&nbsp; Inicio</a></li>
                    <li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Registro de usuarios</div>
                        <ul class="list-unstyled">
                            <li><a href="registro.php">&nbsp;&nbsp; Nuevo cliente</a></li>
                            <li><a href="registroadco.php">&nbsp;&nbsp; Nuevo coach</a></li>
                            <li><a href="usuarios.php">&nbsp;&nbsp; Lista de usuarios</a></li>
                            <li><a href="dato_fi.php">&nbsp;&nbsp; Datos fisicos</a></li>

                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Suscripciones</div>
                        <ul class="list-unstyled">
                            <li><a href="suscripmembre.php">&nbsp;&nbsp; Nueva suscripcion</a></li>
                            <li><a href="misuscripciones.php">&nbsp;&nbsp; Usuarios suscritos</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Servicios</div>
                        <ul class="list-unstyled">
                            <li><a href="compras.php">&nbsp;&nbsp; Nuevo servicio</a></li>
                            <li><a href="listaser.php">&nbsp;&nbsp; Mis servisios</a></li>
                            <li><a href="venderser.php">&nbsp;&nbsp; Vender servicio</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Compras</div>
                        <ul class="list-unstyled">
                            <li><a href="compras.php">&nbsp;&nbsp; Nueva compra</a></li>
                            <li><a href="miscompras.php">&nbsp;&nbsp; Mis compras</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Ventas</div>
                        <ul class="list-unstyled">
                            <li><a href="ventas.php">&nbsp;&nbsp; Nueva venta</a></li>
                            <li><a href="misventas.php">&nbsp;&nbsp; Mis ventas</a></li>
                        </ul>
                    </li>
                    <li><a href="inventario.php">&nbsp;&nbsp; Inventario</a></li>
                    <li><a href="reporte.php">&nbsp;&nbsp; Reportes</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers"> 
        <div class="container">
            <br>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li><a href="servicios.php">Nuevo servicio</a></li>
                        <li><a href="listaser.php">Mis servicios</a></li>
                        <li class="active">Vender servicio</li>
                    </ol>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Vender servicio </div>
                    <form method="POST" name="formreg"  id="signup-form" class="signup-form" autocomplete="off">
                        <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="hidden" name="adco"  value="<?php echo $docu_ad ?>"> 
                            </div>
                            <div class="group-material">
                            <select class="form-control" style="background-color:#dac403" name="user" >
                                <option value="" >SELECCIONE USUARIO</option>
                                    <?php
                                    do{
                                    ?>
                                    <option value="<?php echo($fila['documento'])?>"><?php echo($fila['nombres'])?></option>                            
                                <?php
                                }while($fila=$sql-> fetch());
                                ?>
                            </select>
                            </div>
                            <div class="group-material">
                            <select class="form-control" style="background-color:#dac403" style="-color:white"   name="servi" >
                                <option value="" >SELECCIONE SERVICIO</option>
                                    <?php
                                    do{
                                    ?>
                                    <option value="<?php echo($servicis['id_servicio'])?>"><?php echo($servicis['tipo_servicio'])?></option>                            
                                <?php
                                }while($servicis=$conser-> fetch());
                                ?>
                            </select>
                            </div>

                            <div class="group-material">
                                <samp>Fecha inicial</samp>
                                <input type="date"  class="material-control tooltips-general" readonly id="fecha_inicio" name="fecha_inicio" value="<?php echo $fecha_actual; ?>">                     
                            </div>

                            <p class="text-center">
                                <input  type="submit" value="Vender" class="btn btn-info" style="margin-right: 20px;" >
                                <input  type="hidden" name="MM_insert" value="formreg">
                            </p> 
                        </div>
                        </div>
                    </form> 
            </div>
        </div>
    </div>
</body>
</html>