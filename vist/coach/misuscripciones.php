<?php 
session_start();  
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();

$docu_ad= $_SESSION['document'];




$consultar = $con -> prepare ("SELECT * FROM  usuario INNER JOIN suscripcion WHERE usuario.documento=suscripcion.docu_usuario AND docu_adco='$docu_ad'");
$consultar -> execute();
$missus = $consultar -> fetchAll();

?>


<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Usuarios suscritos | Coach</title>
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
                            <li><a href="usuarios.php">&nbsp;&nbsp; Lista de usuarios</a></li>

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
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Compras</div>
                        <ul class="list-unstyled">
                            <li><a href="compras.php">&nbsp;&nbsp; Nueva compra</a></li>
                            <li><a href="#">&nbsp;&nbsp; Mis compras</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Ventas</div>
                        <ul class="list-unstyled">
                            <li><a href="compras.php">&nbsp;&nbsp; Nueva venta</a></li>
                            <li><a href="listaprod">&nbsp;&nbsp; Mis ventas</a></li>
                        </ul>
                    </li>
                    <li><a href="#">&nbsp;&nbsp; Reportes</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">


        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Usuarios suscritos</div>
                <div class="contenedor">
                    <table class="tablap">
                        <tr class="tit">
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Fena inicio</th>
                            <th>fecha final</th>
                            <th> suscripcion</th>
                        </tr>

                    <?php
                        foreach($missus as $consultar){

                    ?> 
                        <tr>
                        <td> <?=$consultar["docu_usuario"]?>  </td>
                            <td> <?=$consultar["nombres"]?>  </td>
                            <td> <?=$consultar["apellidos"]?>  </td>
                            <td> <?=$consultar["fecha_inicio"]?>  </td>
                            <td> <?=$consultar["fecha_fin"]?>  </td>
                            <td >
                                <form method="GET" action="actu_usu.php">
                                    <input type="hidden" name="#" value="<?=$usua["documento"]?>">
                                    <button class="b1" type="submit" name="#">Renovar</button>
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
</body>
</html>