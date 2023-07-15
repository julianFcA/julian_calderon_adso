<?php
//Archivo que permite validar la sesion

if(!isset($_SESSION['document']) || !isset($_SESSION['contrase']))
{
    header("location:../../index.php");
    exit;
}
?>