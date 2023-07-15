<?php
session_start();
    require_once("../../db/conexion.php");
    include("../../controller/validarsesion.php");
    $db = new database();
    $con = $db->conectar();

    $servi =$_GET['servicio'];
    echo $servi;


?>

<?php
    //consulta de tablas para ejecucion y recibe el boton del formulario por $_GET
   $consulta_tipo = $con->prepare("SELECT * FROM tp_servicio where id_servicio=$servi ");
   $consulta_tipo -> execute ();
   $columnas = $consulta_tipo -> fetch();

?>
<?php

    if((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $servicio= $_POST['servicio'];
        $precio = $_POST['precio'];
     

        //condicional para que determine que hacer cuando ingrese datos 
        if ( $servicio==""|| $precio=="" ){
            echo '<script> alert (" EXISTEN DATOS VACIOS");</script>';
            echo '<script> windows.location= "actu_ser.php"</script>';

        }
        
        else{
            //actualizacion para registros    
            $actu_update = $con -> prepare("UPDATE tp_servicio SET tipo_servicio = '$servicio', costo_servicio = '$precio' WHERE id_servicio = '$servi'");
            $actu_update -> execute();
            $actu = $actu_update ->fetch() ;
            echo '<script>alert ("Actualizacion Exitosa");</script>';
            echo '<script>windows.location=("./listaser.php")</script>';
    
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
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Actualizacion de servicios </div>
                <form method="post" name="formreg" autocomplete="off">
                        <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                    <input type="text"  name="servicio" class="material-control tooltips-general" value="<?php echo $columnas['tipo_servicio']?>"pattern="[a,b,c,d,f,g,h,i,j,k,l,m,n,ñ,o,p,q,r,s,t,u,v,w,x,y,z]{1,2,3,4,5,6,7,8,9,10}" > </th>
                                    <label>Servicio</label>
                            </div>
                            <div class="group-material">
                                <input type="number"  name="precio" class="material-control tooltips-general"  value="<?php echo $columnas['costo_servicio']?>"pattern="[a,b,c,d,f,g,h,i,j,k,l,m,n,ñ,o,p,q,r,s,t,u,v,w,x,y,z]{1,2,3,4,5,6,7,8,9,10}" > </th>
                                <label>Precio</label>
                            </div>

                            <p class="text-center">
                                <input class="btn btn-info" style="margin-right: 20px;" type="submit" name="validar" value="Actualizar">
                                <input type="hidden" name="MM_insert" value="formreg">
                            </p>
  
                                    
                                    
                    </form>      

            </div>
        </div>
    </div>
</body>
</html>