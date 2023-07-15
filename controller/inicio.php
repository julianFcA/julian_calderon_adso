<?php 
require_once ("../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();

if ($_POST["inicio"]){
    // inicia sesion para los usuarios

    $doc = $_POST["documento"];
    $clave = $_POST["clave"];
    // consultemos segun usuarios y clave
    $nexl = $con -> prepare ("SELECT * FROM usuario WHERE  documento ='$doc'");
    $nexl -> execute();
    $fila = $nexl -> fetch();
    if($fila&&password_verify($clave,$fila['password']));


    if ($fila)
    {
        //si el usuario y la clave son correctas creamos las sessiones

        $_SESSION['document'] = $fila['documento'];
        $_SESSION['contrase'] = $fila['password'];
        $_SESSION['tipo'] = $fila['id_rol'];
        $_SESSION['estado'] = $fila['id_estado'];

        //dependiendo del tipo de usuario lo redireccionamos

        ///si es un tipo de client
        if ($_SESSION['tipo'] == 1 ){
            header ("Location: ../vist/administrador/index.php");
            exit();
        }
    

        else if ($_SESSION['tipo'] == 2 ){
            header ("Location: ../vist/coach/index.php");
            exit(); 
        }


    }else {
            //si el usuario y la clave son incorrecto lo lleva a la pagina de inicio
            header ("Location: ../errorlog.html" );
            exit();
        }
    
}
?>





