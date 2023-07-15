<?php   
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();


$usua = $con -> prepare ("SELECT * FROM usuario INNER JOIN rol INNER JOIN estado INNER JOIN genero WHERE usuario.id_rol>=3 AND usuario.id_estado=estado.id_estado AND usuario.id_genero=genero.id_genero ORDER BY rol.id_rol ASC");
$usua -> execute();
$asigna = $usua -> fetchAll(PDO::FETCH_ASSOC);

?>

<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Usuarios registrados | Admin</title>
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
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Suscripciones</div>
                        <ul class="list-unstyled">
                            <li><a href="suscripciones.php">&nbsp;&nbsp; Nueva suscripcion</a></li>
                            <li><a href="suscripmem.php">&nbsp;&nbsp; Vender servicios</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Ventas</div>
                        <ul class="list-unstyled">
                            <li><a href="ventas.php">&nbsp;&nbsp; Nueva venta</a></li>
                            <li><a href="misventas.php">&nbsp;&nbsp; mis ventas</a></li>
                        </ul>
                    </li>
                </ul>
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
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Usuarios registrados</div>
                <div class="contenedor">
                    <table class="tablap">
                        <tr class="tit">
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Edad</th>
                            <th>Estatura</th>
                            <th>F_nacimiento</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>rol</th>
                            <th>Genero</th>
                            <th>estado</th>
                            <th colspan="2">Accion</th>
                        </tr>

                    <?php
                        foreach($asigna as $usua){

                    ?> 
                        <tr>
                            <td> <?=$usua["documento"]?>  </td>
                            <td> <?=$usua["nombres"]?>  </td>
                            <td> <?=$usua["apellidos"]?>  </td>
                            <td> <?=$usua["edad"]?>  </td>
                            <td> <?=$usua["estatura"]?>  </td>
                            <td> <?=$usua["fecha_naci"]?>  </td>
                            <td> <?=$usua["telefono"]?>  </td>
                            <td> <?=$usua["correo"]?>  </td>
                            <td> <?=$usua["rol"]?>  </td>
                            <td> <?=$usua["genero"]?>  </td>
                            <td> <?=$usua["estado"]?>  </td>
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