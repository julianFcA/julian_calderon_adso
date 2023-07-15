<?php 
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();


$disp = $con -> prepare ("SELECT * FROM tp_servicio ORDER BY tp_servicio.id_servicio ASC");
$disp -> execute();
$asigna = $disp -> fetchAll(PDO::FETCH_ASSOC);

?>



<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mis servicios | Admin</title>
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
    <link rel="stylesheet" href="../../css/listar.css">
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
        <br>
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                    <li><a href="servicios.php">Nuevo servicio</a></li>
                    <li class="active">Mis servicios</li>
                    <li><a href="venderser.php">Vender servicio</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Servicios registrados</div>
                <div class="contenedor">
        <table class="tablap">
            <tr class="tit">
                <th>Servicio</th>
                <th>Precio</th>
                <th colspan="2">Actualizar-Eliminar</th>
            </tr>

        <?php
            foreach($asigna as $disp){

        ?> 
            <tr>
                <td> <?=$disp["tipo_servicio"]?>  </td>
                <td> <?=$disp["costo_servicio"]?>  </td>
                <th>
                    <form method="GET" action="./elim_ser.php">
                        <input type="hidden" name="servicio" value="<?= $disp['id_servicio'] ?>">
                        <button class="b1" onclick="return confirm ('¿Desea eliminar el servicio seleccionado?')"; type="submit">Eliminar</button>
                    </form>
                </th>

                <td >
                    <form method="GET" action="./actu_ser.php">
                        <input type="hidden" name="servicio" value="<?= $disp['id_servicio'] ?>">
                        <button class="b1" onclick="return confirm ('¿Desea actualizar el servicio seleccionado?')"; type="submit">Actualizar</button>
                    </form>
                </td>
            </tr>
        <?php
            }
        ?>
        </table> 
    </div> 
            </div>
        </div>
    </div>
</body>
</html>