<?php   
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../../images/gym.jpg">
</head>
</html>

<?php

    $elim_ser= $con-> prepare("DELETE FROM tp_servicio WHERE id_servicio ='".$_GET['servicio']."'");
    $elim_ser -> execute();
    $ej_delete = $elim_ser ->fetch(PDO::FETCH_ASSOC);

    if($ej_delete == true){
        echo '<script>alert ("Se elimino este servicio");</script>';
        echo '<script>window.location="./listaser.php"</script>';
    }

    else{
        echo '<script>alert ("Se elimino este servicio");</script>';
        echo '<script>window.location="./listaser.php"</script>';
    }

?>