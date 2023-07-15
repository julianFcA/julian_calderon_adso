<?php 
require_once ("../../db/conexion.php"); 
$db = new Database();
$con = $db ->conectar();
session_start();
?>

<?php 
$sql = $con -> prepare ("SELECT * FROM usuario, rol WHERE documento = '" .$_SESSION['document']. "' AND usuario.id_rol = rol.id_rol");
$sql -> execute();
$usua = $sql -> fetch();

?>




<?php 
if (isset($_POST['btncerrar']))
{
    session_destroy();
    header('location:../../index.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Pagina principal | Coach</title>
	<!-- core CSS -->
    <link href="../../css/bootstrap.mix.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet"> 
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../../images/logo.png"> 
</head> 

<body id="home">

    <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img src="../../images/logo.png" alt="logo"></a>
                </div>

                <div class="navbar-header">
                    <h1>Z&#128293;NA ES 8/67</h1>
                    <h1>Bienvenido <?php echo $usua['rol']?> <?php echo $usua['nombres']?></h1>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li ><form  method="POST"><input type="submit"  class="btn btn-info" style="margin-top: 4rem;" value="Cerrar sesion" name="btncerrar"></form></li>                       
                    </ul>
                </div>
                
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->


	<section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title wow fadeInDown white">Mis servicios</h2>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-flag-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Registrar usuario</h4>
                                <a href="registro.php"><img src="../../images/1.png" alt=""></a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-heart-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Usuarios registrados</h4>
                                <a href="usuarios.php"><img src="../../images/registrados.png" alt=""></a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-send-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Suscipciones</h4>
                                <a href="suscripcion.php"><img src="../../images/suscripcion.png" alt=""></a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-retweet"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Compras</h4>
                                <a href="compras.php"><img src="../../images/compra.png" alt=""></a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-paper-plane-o"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Ventas</h4>
                                <a href="ventas.php"><img src="../../images/venta.png" alt=""></a>
                            </div>
                            
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-bullseye"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Inventario</h4>
                                <a href="inventario.php"><img src="../../images/inventario.png" alt=""></a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                    
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->



</body>
</html>