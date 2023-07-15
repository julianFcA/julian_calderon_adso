<?php 
require_once ("../barcode/vendor/autoload.php"); 
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
    <title>Productos | Admin</title>
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
        <div class="full-reset container-menu-movile custom-scroll-containers" style="background-color:black">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                Z&#128293;NA ES 8/67
            </div>
            <div class="full-reset" style="background-color:black; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="../../images/lista-de-verificacion.png" alt="Biblioteca" class="img-responsive center-box" style="width:50%;">
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                    <li><a href="inventario.php">Nuevo producto</a></li>
                    <li class="active">Listado de productos</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Productos almacenados</div>
                    
                    <div class="contenedor">
                        <table class="tablap" >
                                <tr class="tit">
                                <th>Id producto</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Código de barras</th>
                                <th colspan="2">Acción</th>
                            </tr>
                            <?php
                            foreach($asigna as $disp){
                                // Generar el código de barras para el id del producto
                                $codigo_barras = ($disp["id_prod"]); // Función a implementar

                                // Mostrar el código de barras en la tabla
                            ?>
                            <tr>
                                <td> <?=$disp["id_prod"]?>  </td>
                                <td> <?=$disp["prod"]?>  </td>
                                <td> <?=$disp["precio"]?>  </td>
                                <td> <?=$disp["descrip"]?>  </td>
                                <td> <?=$disp["cant"]?>  </td>
                                <td style="background-color:white; padding-right:0%; padding-left:0%; size:0cm;"><?php $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                echo $generator->getBarcode($disp['id_prod'], $generator::TYPE_CODE_128); ?></td>
                                <td><form method="get" action="../elim.php">
                                <input type="hidden" name="prod" value="<?=$disp["id_prod"]?>">
                                <button class="" type="submit">Actualizar</button>
                                </form>  </td>
                                <td><form method="POST" action="eli_producto.php">
                                <input type="hidden" name="prod" value="<?=$disp["id_prod"]?>">
                                <button class="tbn tbn-danger" type="submit">Eliminar</button>
                                </form>  </td>
                                
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