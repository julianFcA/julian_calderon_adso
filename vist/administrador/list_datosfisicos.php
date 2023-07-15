<?php  
session_start();
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();

$documento= $_GET['documento'];

$usua = $con -> prepare ("SELECT * FROM usuario INNER JOIN datos_fisicos WHERE usuario.documento ='$documento'");
$usua -> execute();
$asigna = $usua -> fetchAll(PDO::FETCH_ASSOC);

?>


<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Datos fisicos | Admin</title>
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


        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Datos fisico del usuario</div>
                <div class="contenedor">
                    <table class="tablap">
                        <tr class="tit">
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Peso</th>
                            <th>Grasa</th>
                            <th>N.muscular</th>
                            <th>tlla. hueso</th>
                            <th>Metabol</th>
                            <th>Proteina</th>
                            <th>Obesidad</th>
                            <th>Pecho</th>
                            <th>Cintura</th>
                            <th>Brazo</th>
                            <th>Espalda</th>
                            <th>Cadera</th>
                            <th>Pierna</th>
                            <th>Gemelos</th>
                            <th>BMI</th>

                        </tr>

                    <?php
                        foreach($asigna as $usua){

                    ?> 
                        <tr>
                            <td> <?=$usua["fecha_registro"]?>  </td>
                            <td> <?=$usua["nombres"]?>  </td>
                            <td> <?=$usua["peso"]?>  </td>
                            <td> <?=$usua["grasa"]?>  </td>
                            <td> <?=$usua["nivel_mus"]?>  </td>
                            <td> <?=$usua["talla_hueso"]?>  </td>
                            <td> <?=$usua["metabol"]?>  </td>
                            <td> <?=$usua["proteina"]?>  </td>
                            <td> <?=$usua["obesidad"]?>  </td>
                            <td> <?=$usua["pecho"]?>  </td>
                            <td> <?=$usua["cintura"]?>  </td>
                            <td> <?=$usua["brazo"]?>  </td>
                            <td> <?=$usua["espalda"]?>  </td>
                            <td> <?=$usua["cadera"]?>  </td>
                            <td> <?=$usua["pierna"]?>  </td>
                            <td> <?=$usua["gemelos"]?>  </td>
                            <td> <?=$usua["BMI"]?>  </td>
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