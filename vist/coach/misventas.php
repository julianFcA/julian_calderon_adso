<?php 
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();


$disp = $con -> prepare ("SELECT * FROM producto ORDER BY producto.id_prod ASC");
$disp -> execute();
$asigna = $disp -> fetchAll(PDO::FETCH_ASSOC);

?>



<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos | Coach</title>
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
        <div class="full-reset container-menu-movile custom-scroll-containers" style="background-color:black">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                Z&#128293;NA ES 8/67
            </div>
            <div class="full-reset" style="background-color:black; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="../../images/logo.png" alt="Biblioteca" class="img-responsive center-box" style="width:50%;">
                </figure>
            </div>
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i>
            </div>
            
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset" style="background-color:#dac403">
                <li> <a href="./index.php">Regresar</a>     
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Productos agregados <small>coach</small></h1>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li><a href="ventas.php">Nueva venta</a></li>
                      <li class="active">Listado de ventas</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Productos almacenados</div>
                <div class="contenedor">
        <table class="tablap">
            <tr class="tit">
                <th>Id producto</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Descripccion</th>
                <th>Cantidad</th>
                <th colspan="2">Accion</th>
            </tr>

        <?php
            foreach($asigna as $disp){

        ?> 
            <tr>
                <td> <?=$disp["id_prod"]?>  </td>
                <td> <?=$disp["prod"]?>  </td>
                <td> <?=$disp["precio"]?>  </td>
                <td> <?=$disp["descrip"]?>  </td>
                <td> <?=$disp["cant"]?>  </td>
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