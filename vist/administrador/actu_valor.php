<?php
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();

?>

<?php
    if((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formreg"))
    {
        $valors=$_POST['valorsus'];

        $sql = $con -> prepare ("SELECT * from precio_suscripcion");
        $sql -> execute();
        $fila = $sql -> fetch();

        if($valors == "")
        {
                echo '<script>alert ("Campo vacio);</script>';
                echo '<script>window.location="actu_valor.php"</script>';            
        }

        else
        {
            $update= $con -> prepare( "UPDATE precio_suscripcion SET valor='$valors' WHERE id_valor=1");
            $update -> execute();
            $fila1 = $update -> fetch();
                echo '<script>alert ("Valor cambiado con exito");</script>';
                echo '<script>window.location="suscripcion.php"</script>';
        }
    }
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
        <form class="tabla" method="POST" name="formreg">
            <input type="number" name="valorsus" placeholder="Ingrese nuevo valor"> 


            <input type="submit" name="validar" " value="Guardar" class="boton">
            <input type="hidden" name="MM_insert" value="formreg">
            <a href="suscripcion.php" class="boton">Cancelar</a>
        </form>
    </div>
</body>
</body>
</html>