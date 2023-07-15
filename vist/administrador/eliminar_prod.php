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

    $elim_ven = $con-> prepare("DELETE FROM producto WHERE id_prod ='".$_GET['producto']."'");
    $elim_ven -> execute();
    $ejec_delete = $elim_ven ->fetch(PDO::FETCH_ASSOC);

    if($ejec_delete == true){
        echo '<script>alert ("Se elimino este producto");</script>';
        echo '<script>window.location="./listaprod.php"</script>';
    }

    else{
        echo '<script>alert ("Se elimino este producto");</script>';
        echo '<script>window.location="./listprod.php"</script>';
    }

?>