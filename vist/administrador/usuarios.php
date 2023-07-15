<?php   
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();


$usua = $con -> prepare ("SELECT * FROM usuario INNER JOIN rol INNER JOIN estado INNER JOIN genero WHERE usuario.id_rol=rol.id_rol AND usuario.id_estado=estado.id_estado AND usuario.id_genero=genero.id_genero ORDER BY rol.id_rol ASC");
$usua -> execute();
$asigna = $usua -> fetchAll(PDO::FETCH_ASSOC);
?>
<?php
// PAGINACION

$por_pagina = 5;
if(isset($_GET['pagina'])){
$pagina = $_GET['pagina'];
}
else
{
$pagina = 1;
}
$empieza = ($pagina - 1) * $por_pagina;
$sql1 = $con->prepare("SELECT * FROM usuario
ORDER BY documento LIMIT $empieza, $por_pagina");
$sql1->execute();
$resultado1 = $sql1->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
$sql = $con->prepare("SELECT COUNT(*) FROM usuario  ORDER BY documento");
$sql->execute();
$resul = $sql->fetchColumn();
$total_paginas = ceil($resul / $por_pagina);
if ($total_paginas == 0) {
    echo "<center>" . 'Lista Vacia' . "</center>";
} else

    echo "<center><a href='usuarios.php?pagina=1'>" . "<i class='fa fa-arrow-left'></i>" . "</a>";
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
                            <th>rol</th>
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
                            <td> <?=$usua["rol"]?>  </td>
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

                            <td >
                                <form method="GET" action="elim_usu.php">
                                    <input type="hidden" name="documento" value="<?=$usua["documento"]?>">
                                    <button class="b1" type="submit" name="acti">Eliminar</button>
                                    
                                </form>
                            </td>

                            <td >
                                <form method="GET" action="actu_usu.php">
                                    <input type="hidden" name="documento" value="<?=$usua["documento"]?>">
                                    <button class="b1" type="submit" name="inacti">Actualizar</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    <br>
                    <br>



                    </table>



                    <div class="text-center" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2" role="group" aria-label="First group" aling>
                            <?php
                            for ($i = 1; $i <= $total_paginas; $i++) {
                                echo "<a class='btn btn-primary'  href='usuarios.php?pagina=" . $i . "'> " . $i . " </a>";
                            }
                            echo "<a href='usuarios.php?pagina=$total_paginas'>" . "<i class='fa fa-arrow-right'></i>"
                                . "</a></center>";
                            ?>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    
</body>
</html>