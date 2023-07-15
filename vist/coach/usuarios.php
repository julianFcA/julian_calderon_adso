<?php   
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();
$docu_admin= $_SESSION['document'];


$usua = $con -> prepare ("SELECT * FROM usuario INNER JOIN estado INNER JOIN genero WHERE id_rol=3 AND usuario.id_estado=estado.id_estado AND usuario.id_genero=genero.id_genero  ");
$usua -> execute();
$asigna = $usua -> fetchAll();

?>

<?php
if ($_POST) 
{
	if($_POST["respaldo"])

        {
			require_once("respaldo.php");
            echo '<script>alert ("Se Realizo Descarga Exitosa");</script>';
            echo '<script>windows.location="usuarios.php"</script>';
		}
}

?>

<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Usuarios registrados | coach</title>
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
                    <li><a href="home.html">&nbsp;&nbsp; Inicio</a></li>
                    <li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Registro de usuarios</div>
                        <ul class="list-unstyled">
                            <li><a href="#">&nbsp;&nbsp; Nuevo cliente</a></li>
                            <li><a href="#">&nbsp;&nbsp; Nuevo coach</a></li>
                            <li><a href="#">&nbsp;&nbsp; Lista de usuarios</a></li>

                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Suscripciones</div>
                        <ul class="list-unstyled">
                            <li><a href="book.html">&nbsp;&nbsp; Nueva suscripcion</a></li>
                            <li><a href="catalog.html">&nbsp;&nbsp; Vender servicios</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Ventas</div>
                        <ul class="list-unstyled">
                            <li><a href="book.html">&nbsp;&nbsp; Nueva compra</a></li>
                            <li><a href="catalog.html">&nbsp;&nbsp; Vender servicios</a></li>
                        </ul>
                    </li>
                    <li><a href="report.html">&nbsp;&nbsp; Reportes y estadísticas</a></li>
                    <li><a href="advancesettings.html">&nbsp;&nbsp; Configuraciones avanzadas</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">

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
                            <th>Fecha nacimiento</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Genero</th>
                            <th>estado</th>
                            <th colspan="2">Accion</th>
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
                            <td> <?=$usua["genero"]?>  </td>
                            <td> <?=$usua["estado"]?>  </td>
                            <td >
                                <form method="GET" action="estado.php">
                                    <input type="hidden" name="activo" value="<?=$usua["documento"]?>">
                                    <button class="b1" type="submit" name="acti">Activar</button>
                                    
                                </form>
                            </td>

                            <td >
                                <form method="GET" action="estado.php">
                                    <input type="hidden" name="inactivo" value="<?=$usua["documento"]?>">
                                    <button class="b1" type="submit" name="inacti">Inactivar</button>
                                </form>
                            </td>

                            <th> 
                                    <form method="GET" action="./elim_usu.php">
                                        <input type="hidden" name="documento" value="<?= $usua['documento'] ?>">
                                        <button class="b1" onclick="return confirm ('¿Desea eliminar el registro seleccionado?')"; type="submit">Eliminar</button>
                                    </form>

                                </th>

                            <td >
                                <form method="GET" action="./actu_usu.php">
                                    <input type="hidden" name="documento" value="<?=$usua["documento"]?>">
                                    <button class="b1" onclick="return confirm ('¿Desea actualizar el registro seleccionado?')"; type="submit">Actualizar</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </table> 

                    <form action="enviar.php" method="post" enctype="multipart/form autocomplete="off">
                    
                        <p class="text-center" aling="text-center">
                        <button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Enviar</button> 
                    </p>

                    </form>
                
            </div>
        </div>
    </div>
</body>
</html>