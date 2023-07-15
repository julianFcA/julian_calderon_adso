<?php 
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();
?>

<?php 
$conx = $con -> prepare ("SELECT * FROM usuario WHERE documento=usuario.documento AND id_rol>=3");
$conx -> execute();
$mix = $conx -> fetch();
?>

<?php 
date_default_timezone_set('America/Bogota');
$fecha_actual = date('Y-m-d');
?>






<?php
    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $fecha = $_POST['fecha_registro'];
        $documento = $_POST['docum'];
        $peso = $_POST['pes'];
        $gra = $_POST['gra'];
        $musculo= $_POST['mus'];
        $hueso= $_POST['hue'];
        $metabol= $_POST['met'];
        $prote = $_POST['pro'];
        $obesi = $_POST['obe'];
        $pecho= $_POST['pec'];
        $cintu= $_POST['cin'];
        $brazo = $_POST['bra'];
        $espal= $_POST['esp'];
        $cadera= $_POST['cad'];
        $pierna = $_POST['pier'];
        $gemelo= $_POST['gem'];
        $bmi= $_POST['bmi'];


        if ($fecha=="" || $documento=="" || $peso=="" || $gra=="" || $musculo=="" || $metabol=="" || $prote=="" || $obesi=="" || $pecho=="" || $cintu=="" || $brazo=="" || $espal==""|| $cadera=="" || $pierna=="" || $gemelo=="" || $bmi=="")
        {
            echo '<script> alert (" EXISTEN DATOS VACIOS");</script>';
            echo '<script> windows.location= "fisico.php"</script>';
        }

        else
        {
            $insertsql = $con -> prepare("INSERT INTO datos_fisicos (fecha_registro,documento,peso,grasa,nivel_mus,talla_hueso,metabol,proteina,obesidad,pecho,cintura,brazo,espalda,cadera,pierna,gemelos,BMI) VALUES ('$fecha','$documento','$peso','$gra','$musculo','$hueso','$metabol','$prote','$obesi','$pecho','$cintu','$brazo','$espal','$cadera','$pierna','$gemelo','$bmi')");
            $fila1 = $insertsql-> execute();
            echo '<script>alert ("Datos registrados exitosamente");</script>';
            echo '<script>windows.location="fisico.php"</script>';
        }

    }

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
                        <li><a href="registro.php">Registro de usuario</a></li>
                        <li class="active">Datos fisicos</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Datos fisicos del usuario</div>
                <form method="POST" name="formreg"  id="signup-form" class="signup-form" autocomplete="off">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <select class="form-control" style="background-color:#dac403" name="docum" >
                                    <option value="" >Seleccione usuario</option>

                                    <?php
                                    do{
                                    ?>

                                    <option value="<?php echo($mix['documento'])?>"><?php echo($mix['nombres'])?> <?php echo($mix['apellidos'])?></option>
                                    
                                    <?php
                                        }while($mix=$conx -> fetch());
                                    ?>
                        
                                </select>
                            </div>
                            <div class="group-material">
                                <samp>Fecha inicial</samp>
                                <input type="date"  class="material-control tooltips-general" readonly id="fecha_registro" name="fecha_registro" value="<?php echo $fecha_actual; ?>">                     
                            </div>
                            <div class="group-material">
                                <input type="float" name="pes" maxlength="4" class="material-control tooltips-general"  placeholder="Ingrese peso actual" oninput="maxlengthNumber(this);">
                                <label>peso</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="gra" maxlength="4"  class="material-control tooltips-general"  placeholder="Ingrese porcentaje de grasa" oninput="maxlengthNumber(this);">
                                <label>Grasa</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="mus"  maxlength="4" class="material-control tooltips-general"  placeholder="ingrese nivel muscular" oninput="maxlengthNumber(this);">
                                <label>Nivel muscular</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="hue" maxlength="4" class="material-control tooltips-general"  placeholder="ingrese talla de hueso" oninput="maxlengthNumber(this);">
                                <label>Talla de hueso</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="met" maxlength="4"  class="material-control tooltips-general"  placeholder="ingrese nivel de metabolismo" oninput="maxlengthNumber(this);">
                                <label>metabolismo</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="pro" maxlength="4" class="material-control tooltips-general"  placeholder="ingrese nivel de proteina" oninput="maxlengthNumber(this);">
                                <label>Proteina</label>
                            </div>
                            <div class="group-material">
                                <input type="text" name="obe"  maxlength="" class="material-control tooltips-general"  placeholder="ingrese porcentaje de obesidad" oninput="maxlengthNumber(this);">
                                <label>Obesidad</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="pec" maxlength="4" class="material-control tooltips-general"  placeholder="ingrese talla pecho" oninput="maxlengthNumber(this);">
                                <label>pecho</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="cin" maxlength="4" class="material-control tooltips-general"  placeholder="ingrese talla cintura" oninput="maxlengthNumber(this);">
                                <label>Cintura</label>
                            </div>

                            <div class="group-material">
                                <input type="float" name="bra" maxlength="4"  class="material-control tooltips-general"  placeholder="ingrese talla brazo" oninput="maxlengthNumber(this);">
                                <label>Brazo</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="esp" maxlength="4" class="material-control tooltips-general"  placeholder="ingrese talla espalda" oninput="maxlengthNumber(this);">
                                <label>Espalda</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="cad" maxlength="4" class="material-control tooltips-general"  placeholder="ingrese talla cadera" oninput="maxlengthNumber(this);">
                                <label>Cadera</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="pier" maxlength="" class="material-control tooltips-general"  placeholder="Ingrese porcentaje de pierna" oninput="maxlengthNumber(this);">
                                <label>Piernas</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="gem" maxlength="4" class="material-control tooltips-general"  placeholder="Ingrese porcentaje de gemelos" oninput="maxlengthNumber(this);">
                                <label>Gemelos</label>
                            </div>
                            <div class="group-material">
                                <input type="float" name="bmi" class="material-control tooltips-general"  placeholder=" B M I ">
                                <label>B.M.I</label>
                            </div>

  
                            
                            <p class="text-center">
                                <input type="submit" name="validar" value="Guardar" class="btn btn-info" style="margin-right: 20px;">
                                <input type="hidden" name="MM_insert" value="formreg"> 
                            </p> 
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    function maxlengthNumber(obj) {

if (obj.value.length > obj.maxLength) {
    obj.value = obj.value.slice(0, obj.maxLength);
    alert("Debe ingresar solo el numeros de digitos requeridos");
}
}


</script>
</html>