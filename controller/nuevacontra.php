<?php
    require_once("../db/conexion.php");
    $db = new database();
    $conexion = $db->conectar();
    session_start();

    if((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1"))
    {
        $contra = $_POST['cont'];
        echo $contra;
        $clave1= password_hash('sha512',PASSWORD_DEFAULT,["cost"=>12]);


        if ($_POST['cont']=="" || $_POST['conta']=="")
            {
                    echo '<script>alert ("Datos vacios no ingreso la clave");</script>';
                    echo '<script>window.location="../recuperacion.html"</script>';
            }
        else
            {
                $documento = $_SESSION['documento'];
                $clave1= password_hash('sha512',PASSWORD_DEFAULT,["cost"=>12]);
                $contr= $_POST['conta'];
                echo $contr;

                $insertSQL=$conexion->prepare( "UPDATE usuario SET password = '$clave1' WHERE documento = '$documento'");
                $insertSQL->execute();
                    echo '<script>alert ("Cambio de clave exitosa");</script>';
                    echo '<script>window.location="../login.php"</script>';
            }
    }
?>

<?php
    if($_POST["inicio"]){

        $documento = $_POST["documento"];
        
        // sirve para imprimir lo que trae la variable echo $document; //
        $sql=$conexion->prepare("SELECT * FROM usuario WHERE documento = '$documento'");
        $sql->execute();
        $fila=$sql->fetch();

        if($fila){
            $_SESSION['documento']=$fila['documento'];
    ?>

        <html>
            <head>
                <link rel="stylesheet" href="../controller/css/Stylo.css">
                <meta charset="utf-8">
            </head>
            <body>
                <div class="login-box">
                    <!-- crea una caja imaginaria-->            
                    <!--insertamos una imagen -->
                    <form method="POST" name="form1" id="form1" autocomplete="off">
                        <!--creamos formulario -->
                        <label for="usuario">Nueva contraseña</label>
                        <input type="password" name="cont" id="cont" placeholder="Nueva clave">
                        <label for="usuario">Confirme contraseña</label>
                        <input type="password" name="conta" id="conta" placeholder="Confirme clave">
                        <input type="submit" name="inicio" id="inicio" value="cambiar">
                        <input type="hidden" name="MM_update" value="form1">
                        <a href="../login.php">Volver pagina principal</a>
                    </form>
                </div>
            </body>
        </html>
    <?php
    }
    else
    {
        echo '<script>alert ("El documento no existe en la base de datos");</script>';
        echo '<script>window.location="../vist/recuperancion.html"</script>';
    }
}

?>