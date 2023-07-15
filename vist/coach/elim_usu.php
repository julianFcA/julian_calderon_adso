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

    $elim_usu = $con-> prepare("DELETE FROM usuario WHERE documento ='".$_GET['documento']."'");
    $elim_usu -> execute();
    $eje_delete = $elim_usu -> fetch(PDO::FETCH_ASSOC);

    if($eje_delete == true){
        echo '<script>alert ("Se elimino este usuario");</script>';
        echo '<script>window.location="./usuarios.php"</script>';
    }

    else{
        echo '<script>alert ("Se elimino este usuario");</script>';
        echo '<script>window.location="./usuarios.php"</script>';
    }

?>