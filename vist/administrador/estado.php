<?php
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();


if(isset($_GET["acti"])){
    $cedula=$_GET['activo'];
    $sql = $con -> prepare("UPDATE usuario SET id_estado='1' WHERE documento='$cedula'");
    $sql -> execute();
    echo "<script>alert ('Estado actualizado a activo');</script>";
    echo "<script>window.location='usuarios.php';</script>";
}
else if(isset($_GET["inacti"])){
    $cedula=$_GET['inactivo'];
    $sql =$con -> prepare("UPDATE usuario SET id_estado=2 WHERE documento='$cedula'");
    $sql-> execute();
    echo "<script>alert ('Estado actualizado a inactivo');</script>";
    echo "<script>window.location='usuarios.php';</script>";

}
else{
    echo "<script>alert ('Error en el estado de usuario');</script>";
    echo "<script>window.location='listadousu.php';</script>";
}
?>