<?php 
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();

$docu_ad= $_SESSION['document'];
?>



<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $compradr=$_POST["comprador"];
        $id_producto = $_POST['id_pro'];
        $producto = $_POST['namepro'];
        $precio = $_POST['valor'];
        $descriccion= $_POST['descrip'];
        $cantidad= $_POST['cant'];

        $confir = $con -> prepare ("SELECT * FROM producto WHERE id_prod='$id_producto'");
        $confir -> execute();
        $fil = $confir -> fetch();


        if ($fil){
            echo '<script> alert ("El producto ya esta registrado");</script>';
            echo '<script> windows.location= "inventario.php"</script>';

        }

        else if ($compradr=="" ||$id_producto=="" || $producto=="" || $precio=="" || $descriccion=="" || $cantidad=="")
        {
            echo '<script> alert (" Existen campos vacios");</script>';
            echo '<script> windows.location= "inventario.php"</script>';
        }

        else
        {
            $insertsql = $con -> prepare("INSERT INTO producto (comprador,id_prod,prod,precio,descrip,cant) VALUES ('$compradr','$id_producto','$producto', '$precio', '$descriccion','$cantidad')");
            $filaa1 = $insertsql -> execute();
            echo '<script>alert ("Producto agregado con exito");</script>';
            echo '<script>windows.location="inventario.php"</script>';
        }

    }

?>


<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Compras | Coach</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../administrador/css/style.css">
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
                      <li class="active">Nueva compra</li>
                      <li><a href="miscompras.php">Mis compras</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar nueva compra</div>
                <form method="POST" name="formreg"  id="signup-form" class="signup-form" autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="hidden" name="comprador"  value="<?php echo $docu_ad ?>"> 
                            </div>
                            <div class="group-material">
                                <input type="number" name="id_pro" class="material-control tooltips-general">
                                <label>id del producto</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="namepro" class="material-control tooltips-general" placeholder="Nombre del producto">
                                <label>producto</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="valor" class="material-control tooltips-general" placeholder="Precio del producto">
                                <label>precio</label>
                            </div>
                            <div class="group-material">
                                <input type="texto" name="descrip" class="material-control tooltips-general" placeholder="Descripcion del producto">
                                <label>Descripcion</label>
                            </div>
                            <div class="group-material">
                                <input type="number" name="cant" class="material-control tooltips-general" placeholder="Cantidad a ingresar">
                                <label>cantidad</label>
                            </div>
                            <p class="text-center">
                                <input type="submit" name="validar"  value="Guardar" class="btn btn-info" style="margin-right: 20px;">
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