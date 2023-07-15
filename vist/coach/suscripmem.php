<?php
require_once("../../db/conexion.php");
    $db = new database();
    $consu = $db->conectar();


    $sql = $consu -> prepare ("SELECT * from usuario WHERE documento=usuario.documento AND id_rol=3");
    $sql -> execute();
    $fila = $sql -> fetch();

    $sqle = $consu -> prepare ("SELECT * from usuario WHERE documento=usuario.documento AND id_rol<=2");
    $sqle -> execute();
    $filea = $sqle -> fetch();

    $sqlq = $consu -> prepare ("SELECT * from tp_servicio WHERE id_servicio=tp_servicio.id_servicio");
    $sqlq -> execute();
    $filaa = $sqlq -> fetch();


    $sqli = $consu -> prepare ("SELECT * from rol WHERE id_rol >= 3");
    $sqli -> execute();
    $filx = $sqli -> fetch();
?>
<?php


    if ((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="formreg"))
    {
        $servi=$_POST["comb"];
        $documento = $_POST['doc'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        
        
        $validar = $consu -> prepare ("SELECT * FROM suscripcion WHERE documento='$documento'");
        $validar -> execute();
        $fila1 = $validar -> fetch();


        if ($fila1){
            echo '<script> alert ("DOCUMENTO O USUARIO YA TIENEN ESTA SUSCRIPCION ACTIVA // CAMBIELOS//");</script>';
            echo '<script> windows.location= "suscripcion.php"</script>';

        }

        else if ($documento=="" || $fecha_inicio=="" || $fecha_fin=="" || $servi=="" )
        {
            echo '<script> alert (" EXISTEN DATOS VACIOS");</script>';
            echo '<script> windows.location= "registro.php"</script>';
        }

        else
        {
            $insertsql = $consu -> prepare("INSERT INTO suscripcion (documento,fecha_inicio,fecha_fin,id_servicio) VALUES ('$documento','$fecha_inicio', '$fecha_fin','$servi')");
            $filaa1 = $insertsql -> execute();
            echo '<script>alert ("Datos registrados exitosamente");</script>';
            echo '<script>windows.location="registro.php"</script>';
        }

    }

?>




<!-- 

-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Suscripcion de usuario | Admin</title>
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
                    <img src="../../images/datos_fisi.png" alt="Biblioteca" class="img-responsive center-box" style="width:50%;">
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
              <h1 class="all-tittles">Suscripcion de usuario | Admin</small></h1>
            </div>
        </div>

       
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Suscripción Mensual</div>
                <form method="POST" name="formreg" autocomplete="off">
    <div class="group-material">
    <select class="form-control btn-primary" name="doc" >
        <option value="" >SELECCIONE QUIEN HACE EL REGISTRO</option>
            <?php
            do{
            ?>

            <option value="<?php echo($filae['documento'])?>"><?php echo($filea['nombres'])?></option>                            
        <?php
        }while($filea=$sqle-> fetch());
        ?>
    </select>
    </div>
    <div class="group-material">
    <select class="form-control btn-primary" name="doc" >
        <option value="" >SELECCIONE USUARIO</option>
            <?php
            do{
            ?>
            <option value="<?php echo($fila['documento'])?>"><?php echo($fila['nombres'])?></option>                            
        <?php
        }while($fila=$sql-> fetch());
        ?>
    </select>
    </div>
    <div class="group-material">
        <input type="date" id="fecha_inici" name="fecha_inicio" class="material-control tooltips-general"> 
        <label for="nombre">Fecha Inicio</label>                       
    </div>
        
    <div class="group-material">
        <input type="date" id="fecha_fin" name="fecha_fin" class="material-control tooltips-general" >
        <label for="date">Fecha Terminacion</label>
    </div>
    <div class="group-material">
    <select class="form-control btn-primary" name="comb" >
        <option value="" >Seleccione el servicio que le gustaria adquirir</option>

            <?php
            do{
            ?>

            <option value="<?php echo($filaa['id_servicio'])?>"><?php echo($filaa['tipo_servicio'])?></option>
                                    
        <?php
        }while($filaa=$sqlq-> fetch());
        ?>
    <input type="hidden" value="<?php echo $_POST['combo']?>" name="comb" >
    </select>
    </div>
    <p class="text-center">
        <input  type="submit" value="Suscribirse" class="btn btn-info" style="margin-right: 20px;" >
        <input  type="hidden" name="MM_insert" value="formreg">
    </p> 
    
    </form> 




                
            </div>
        </div>
    </div>
</body>
</html>