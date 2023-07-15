<?php 
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();
?>

<?php

$sql = $con -> prepare ("SELECT * from rol WHERE id_rol = 2");
$sql -> execute();
$fila = $sql -> fetch();
?>
<?php

    $sql1 = $con -> prepare ("SELECT * from estado WHERE id_estado >= 2");
    $sql1 -> execute();
    $filax = $sql1 -> fetch();
    
?>

<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $documento = $_POST['doc'];
        $nombre = $_POST['first_name'];
        $apellido = $_POST['last_name'];
        $tel = $_POST['telf'];
        $corre= $_POST['corr'];
        $clave= $_POST['contra'];
        $clave1= password_hash('sha512',PASSWORD_DEFAULT,["cost"=>12]);


        $rol = $_POST['rof'];
        $genero= $_POST['genero'];
        $estad= $_POST['estado'];

        $validar = $con -> prepare ("SELECT * FROM usuario WHERE documento='$documento'");
        $validar -> execute();
        $fila1 = $validar -> fetch();


        if ($fila1){
            echo '<script> alert ("DOCUMENTO O USUARIO YA EXISTEN // CAMBIELOS//");</script>';
            echo '<script> windows.location= "registro.php"</script>';

        }

        else if ($documento=="" || $nombre=="" || $apellido=="" || $tel=="" || $corre==""|| $clave==""  || $rol=="" || $genero=="" || $estad=="")
        {
            echo '<script> alert (" EXISTEN DATOS VACIOS");</script>';
            echo '<script> windows.location= "registro.php"</script>';
        }

        else
        {
            $insertsql = $con -> prepare("INSERT INTO usuario (documento,nombres,apellidos,telefono,correo,password,id_rol,id_genero,id_estado) VALUES ('$documento','$nombre', '$apellido','$tel','$corre','$clave1','$rol','$genero','$estad')");
            $filaa1 = $insertsql -> execute();
            echo '<script>alert ("Datos registrados exitosamente");</script>';
            echo '<script>windows.location="registro.php"</script>';
        }

    }

?>


<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro | Admin</title>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar nuevo coach</div>
                <form method="POST" name="formreg"  id="signup-form" class="signup-form" autocomplete="off">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="number" name="doc" class="material-control tooltips-general" placeholder="Ingrese numero de documento">
                                <label>Documento</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="first_name" class="material-control tooltips-general" placeholder="Ingresar nombres">
                                <label>Nombres</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="last_name" class="material-control tooltips-general" placeholder="Ingresar apellidos">
                                <label>Apellidos</label>
                            </div>
                            <div class="group-material">
                                <input type="number" name="telf" class="material-control tooltips-general" placeholder="Ingresar numero telefonico">
                                <label>Telefono</label>
                            </div>
                            <div class="group-material">
                                <input type="email" name="corr" class="material-control tooltips-general" placeholder="Ingresar correo">
                                <label>Correo</label>
                            </div>
                            <div class="group-material">
                                <input type="password" name="contra" class="material-control tooltips-general" placeholder="Ingresar contraseña">
                                <label>Contraseña</label>
                            </div>
                            <div class="">
                                </select class="genero">
                                <label for="1">Masculino<input type="radio" name="genero" id="" value="1"></label>
                                <label for="2">Femenino<input type="radio" name="genero" id="" value="2"></label>
                                </select> 
                            </div>
                            <input type="hidden" name="rof"  value="<?php echo $fila['id_rol'] ?>"> 

                            <input type="hidden" name="estado"  value="<?php echo $filax['id_estado'] ?>">   
                            
                            <p class="text-center">
                                <input type="submit" name="validar" " value="Guardar" class="btn btn-info" style="margin-right: 20px;">
                                <input type="hidden" name="MM_insert" value="formreg">


                                
                            </p> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

