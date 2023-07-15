<?php 
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();
?>

<?php

$sql = $con -> prepare ("SELECT * from rol WHERE id_rol >= 3");
$sql -> execute();
$fila = $sql -> fetch();
?>
<?php
    $sql1 = $con -> prepare ("SELECT * from estado WHERE id_estado >= 2");
    $sql1 -> execute();
    $filax = $sql1 -> fetch();  
?>

<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $documento = $_POST['doc'];
        $nombre = $_POST['first_name'];
        $apellido = $_POST['last_name'];
        $edad= $_POST['dad'];
        $estatu= $_POST['estat'];

        $naci = $_POST['fecha_na'];
        $tel = $_POST['telf'];
        $corre= $_POST['corr'];

        $rol = $_POST['rof'];
        $genero= $_POST['genero'];
        $estad= $_POST['estado'];

        $validar = $con -> prepare ("SELECT * FROM usuario WHERE documento='$documento'");
        $validar -> execute();
        $fila1 = $validar -> fetch();


        if ($fila1){
            echo '<script> alert ("DOCUMENTO O USUARIO YA EXISTEN // CAMBIELOS//");</script>';
            echo '<script> windows.location= "registro.php"</script>';

        }

        else if ($documento=="" || $nombre=="" || $apellido=="" || $edad=="" || $naci=="" || $tel=="" || $corre=="" || $rol=="" || $genero=="" || $estad=="")
        {
            echo '<script> alert (" EXISTEN DATOS VACIOS");</script>';
            echo '<script> windows.location= "registro.php"</script>';
        }

        else
        {
            $insertsql = $con -> prepare("INSERT INTO usuario (documento,nombres,apellidos,edad,estatura,fecha_naci,telefono,correo,id_rol,id_genero,id_estado) VALUES ('$documento','$nombre', '$apellido', '$edad','$estatu','$naci','$tel','$corre','$rol','$genero','$estad')");
            $filaa1 = $insertsql -> execute();
            echo '<script>alert ("Datos registrados exitosamente");</script>';
            echo '<script>windows.location="registro.php"</script>';
        }

    }

?>


<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro | Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">  
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
        <div class="container">
            <br>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li class="active">Registro de usuario</li>
                        <li><a href="fisico.php">Datos fisicos</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar nuevo usuario</div>
                <form method="POST" name="formreg"  id="signup-form" class="signup-form" autocomplete="off">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="number" name="doc" class="material-control tooltips-general" minlength="6" maxlength="10" placeholder="Ingrese numero de documento" oninput="maxlengthNumber(this);">
                                <label>Documento</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="first_name" maxlength="6" class="material-control tooltips-general" placeholder="Ingresar nombres" onkeypress="return soloLetras(event)">
                                <label>Nombres</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="last_name"  maxlength="7" class="material-control tooltips-general" placeholder="Ingresar apellidos" onkeypress="return soloLetras(event)">
                                <label>Apellidos</label>
                            </div>
                            <div class="group-material">
                                <input type="number" name="dad" class="material-control tooltips-general" maxlength="2" placeholder="Ingresar edad" oninput="maxlengthNumber(this);">
                                <label>Edad</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="estat" maxlength="4" class="material-control tooltips-general" placeholder="Ingresar estatura" oninput="maxlengthNumber(this);">
                                <label>Estatura</label>
                            </div>
                            <div class="group-material">
                                <input type="date" name="fecha_na" id="fecha" class="material-control tooltips-general">
                                <label>Fecha de nacimiento</label>
                            </div>
                            <div class="group-material">
                                <input type="number" name="telf" maxlength="10" class="material-control tooltips-general" placeholder="Ingresar numero telefonico" oninput="maxlengthNumber(this);">
                                <label>Telefono</label>
                            </div>
                            <div class="group-material">
                                <input type="email" name="corr" id="correo" class="material-control tooltips-general" placeholder="Ingresar correo">
                                <label>Correo</label>
                            </div>
                            <div class="">
                                </select class="genero">
                                <label for="1">Masculino<input type="radio" name="genero" id="" value="1"></label>
                                <label for="2">Femenino<input type="radio" name="genero" id="" value="2"></label>
                                </select> 
                            </div>
                            <input type="hidden" name="rof"  value="<?php echo $fila['id_rol'] ?>"> 

                            <input type="hidden" name="estado"  value="<?php echo $filax['id_estado'] ?>">   
            
                            <p class="text-center">
                                <input type="submit" name="validar" " value="Guardar" class="btn btn-info" style="margin-right: 20px;">
                                <input type="hidden" name="MM_insert" value="formreg">


                                
                            </p> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
var validarCorreo = document.getElementById('correo');{
    var expReg= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    if(esValido==true){
        alert('El correo electronico es valido')
    }
    else{
        alert('El correo electronico NO es valido')
    }
    
}
        // FUNCION DE JAVASCRIPT PARA VALIDAR LOS AÑOS DE RANGO PARA LA FECHA DE NACIMIENTO

var fechaInput = document.getElementById('fecha');

// Calcular las fechas mínima y máxima permitidas
var fechaMaxima = new Date();
fechaMaxima.setFullYear(fechaMaxima.getFullYear() - 17); // Restar un año
var fechaMinima = new Date();
fechaMinima.setFullYear(fechaMinima.getFullYear() - 60); // Restar 120 años

// Formatear las fechas mínima y máxima en formato de fecha adecuado (YYYY-MM-DD)
var fechaMaximaFormateada = fechaMaxima.toISOString().split('T')[0];
var fechaMinimaFormateada = fechaMinima.toISOString().split('T')[0];

// Establecer los atributos min y max del campo de entrada de fecha
fechaInput.setAttribute('min', fechaMinimaFormateada);
fechaInput.setAttribute('max', fechaMaximaFormateada);


function soloLetras(e) {
    key = e.keyCode || e.which;

    teclado = String.fromCharCode(key).toString();

    letrasspace = "ABCDEFGHIJKLMÑOPQRSTUVWXYZqwertyuiopasdfghjklñzxcvbnm ";

    especiales = "8-37-38-46-164-46";

    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            alert("Debe ingresar solo letras y espacios en el campo asignado");
            break;
        }
    }

    if (letrasspace.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
        alert("Debe ingresar solo letras y espacios en el campo asignado");
    }
}
        // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS -->

function multipletext(e) {
    key = e.keyCode || e.which;

    teclado = String.fromCharCode(key).toLowerCase();

    letras = "qwertyuiopasdfghjklñzxcvbnm";

    especiales = "8-37-38-46-164-46";

    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            alert("Debe ingresar solo letras y espacios en el campo");
            break;
        }
    }

    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
        alert("Debe ingresar solo letras y espacios en el campo");
    }
}

function maxlengthNumber(obj) {

if (obj.value.length > obj.maxLength) {
    obj.value = obj.value.slice(0, obj.maxLength);
    alert("Debe ingresar solo el numeros de digitos requeridos");
}
}



    </script>

</body>
</html>

