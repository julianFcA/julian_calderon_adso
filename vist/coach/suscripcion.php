<?php
    require_once("../../db/conexion.php");
    $db = new database();
    $consulta = $db->conectar();

    $faxs = $consulta -> prepare ("SELECT * from precio_suscripcion");
    $faxs -> execute();
    $foxs = $faxs -> fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Suscrpcion</title>
</head>
<body>
<div class="contenedor">
    <form class="tabla" method="POST" name="formreg" id="signup-form" action="suscripmembre.php">     
            <h2>MENSUALIDAD</h2>
            <img src="../../images/mensualidad.png" alt="">
            <h3>$<?php echo $foxs['valor']?></h3>
            
            <p>Paga ahora y obten la mensualidad </p>
            <input type="hidden" value="<?php echo $fila['id_servicio']?>" name="combo""></input>
            <input type="submit" value="Suscribete ahora" class="boton""></input> 
            <a href="index.php" class="boton">Volver</a>
        </form>
            
    </div>
</body>
</body>
</html>