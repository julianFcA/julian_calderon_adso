<?php
    require_once("db/conexion.php");
    $db = new database();
    $gimm= $db->conectar();
    session_start();

    $faxs = $gimm -> prepare ("SELECT * from precio_suscripcion");
    $faxs -> execute();
    $foxs = $faxs -> fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/gym.jpg">
    <title>Z🔥NA ES 8/67 </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">
    

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">
<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.php">Z🔥NA ES 8/67 </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll" >Hogar</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a href="#class" class="nav-link smoothScroll">Clases</a>
                    </li>

                    <li class="nav-item">
                        <a href="#schedule" class="nav-link smoothScroll">Horarios</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Contactos</a>
                    </li>

                    <li class="nav-item">
                        <a href="login.php" class="nav-link smoothscroll">Iniciar sesion</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

            <div class="bg-overlay"></div>

            <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-md-10 mx-auto col-12">
                            <div class="hero-text mt-5 text-center">

                                    <h6 data-aos="fade-up" data-aos-delay="300">No Hay Atajos Para Alcanzar Tus Metas, Solo Trabajo Duro y Perseverancia</h6>

                                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">MEJORA TU CUERPO EN Z🔥NA ES 8/67</h1>

                            </div>
                        </div>

                    </div>
            </div>
    </section>


    <section class="feature" id="feature">
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">Suscripciones y Membresias</h2>

                    <h6 class="mb-4 text-white" data-aos="fade-up">Paga el mes por tan solo ($<?php echo $foxs['valor']?>)</h6>

                    <p data-aos="fade-up" data-aos-delay="200">Tambien Conoce Los Paquetes de Nuestro Gimnasio<a rel="nofollow" href="" target="_parent"> Paquetes </a> Alli Podra Mirar y Asi Decidir Cual Paquete se Adecua a Su Bolsillo y Tiempo</p>

                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                    <div class="about-working-hours">
                        <div>

                            <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Horario de Trabajo</h2>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Lunes A Jueves</strong>

                                <p data-aos="fade-up" data-aos-delay="800">6:00 AM - 10:00 AM <br> 4:00 PM - 7:00 PM</p>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Viernes</strong>

                                <p data-aos="fade-up" data-aos-delay="800">6:00 AM - 10:00 AM 

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Sàbado</strong>

                                <p data-aos="fade-up" data-aos-delay="800">7:00 AM - 10:00 AM <br>
                                UNICA CLASE 5:00 PM 

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Domingo</strong>

                                <p data-aos="fade-up" data-aos-delay="800">9:00 AM - 10:00 AM</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section class="about section" id="about">
            <div class="container">
                    <div class="row">

                            <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hola. Somos ZONA ES 8/67</h2>

                                <p data-aos="fade-up" data-aos-delay="400"> Somos Una Comunidad Saludable de Acondicinamiento Fisico, Enfocados En El Objetivo de Nuestros Clientes Dando Asi Resultados Contundentes</p>

                            </div>

                            <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                                <div class="team-thumb">
                                    <img src="images/zona1.png" class="img-fluid" alt="Trainer">

                                </div>
                            </div>

                            <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                                <div class="team-thumb">
                                    <img src="images/zona.png" class="img-fluid" alt="Trainer">
                                </div>
                            </div>

                    </div>
            </div>
    </section>


    <!-- CLASS -->
    <section class="class section" id="class">
            <div class="container">
                    <div class="row">

                            <div class="col-lg-12 col-12 text-center mb-5">
                                <h6 data-aos="fade-up">Consigue Un Cuerpo Perfecto</h6>

                                <h2 data-aos="fade-up" data-aos-delay="200">Nuestras Clases</h2>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                                <div class="class-thumb">
                                    <img src="images/class/jumping.jpg" class="img-fluid" alt="Class">

                                    <div class="class-info">
                                        <h3 class="mb-1">Jumping</h3>

                                        <span><strong>Coach</strong> - Nombre</span>

                                        <span class="class-price">$ </span>

                                        <p class="mt-3">Sistema de Entrenamiento de Salto </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                                <div class="class-thumb">
                                    <img src="images/class/zumba.jpg" class="img-fluid" alt="Class">

                                    <div class="class-info">
                                        <h3 class="mb-1">Zumba </h3>

                                        <span><strong>Coach</strong> - Nombre</span>

                                        <span class="class-price">$</span>

                                        <p class="mt-3">Se Basa en el Baile Combinado con Ejercicios Aeróbicos</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                                <div class="class-thumb">
                                <img src="images/class/crossfit.jpg" class="img-fluid" alt="Class">

                                    <div class="class-info">
                                        <h3 class="mb-1">Crossfit</h3>

                                        <span><strong>Coach</strong> - Nombre</span>

                                        <span class="class-price">$ </span>

                                        <p class="mt-3">Sistema de Entrenamiento de Fuerza y Acondicionamiento </p>
                                    </div>
                                </div>
                            </div>

                    </div>
            </div>
    </section>


    <!-- SCHEDULE -->
    <section class="schedule section" id="schedule">
            <div class="container">
                    <div class="row">

                            <div class="col-lg-12 col-12 text-center">
                                <h2 class="text-white" data-aos="fade-up" data-aos-delay="200">HORARIO DE  ATENCION</h2>
                            </div>

                            <div class="col-lg-12 py-5 col-md-12 col-12">
                                <table class="table table-bordered table-responsive schedule-table" data-aos="fade-up" data-aos-delay="300">

                                    <thead class="thead-light">
                                        <th><i class="fa fa-calendar"></i></th>
                                        <th>LUNES</th>
                                        <th>MARTES</th>
                                        <th>MIERCOLES</th>
                                        <th>JUEVES</th>
                                        <th>VIERNES</th>
                                        <th>SABADO</th>
                                        <th>DOMINGO</th>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><small></small></td>
                                            <td>
                                                <span>6:00 am - 10:00 am</span>
                                            </td>
                                            <td>
                                                <span>6:00 am - 10:00am</span>
                                            </td>
                                            <td>
                                                <span>6:00 am - 10:00 am</span>
                                            </td>
                                            <td>
                                                <span>6:00 am - 10:00 am</span>
                                            </td>
                                            <td>
                                                <span>6:00 am - 10:00 am</span>
                                            </td>
                                            <td>
                                                <span>7:00 am - 10:00 am</span>
                                            </td>
                                            <td>
                                                <span>9:00 am - 10:00 am</span>
                                            </td>

                                            

                                        </tr>

                                        <tr>
                                            <td><small></small></td>
                                            <td>
                                                <span>4:00 pm - 7:00 pm</span>
                                            </td>
                                            <td>
                                                <span>4:00 pm - 7:00 pm</span>
                                            </td>
                                            <td>
                                                <span>4:00 pm - 7:00 pm</span>
                                            </td>
                                            <td>
                                                <span>4:00 pm - 7:00 pm</span>
                                            </td>
                                            <td>
                                                <span></span>
                                            </td>
                                            <td>
                                                <span>5:00 pm clase unica </span>
                                            </td>
                                            <td>
                                                <span></span>
                                            </td>


                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                    </div>
            </div>
    </section>


    <!-- CONTACT -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="row">

                    <div class="ml-auto col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Comunicate con nosotros a traves de:</h2>
                        <div><a href="https://api.whatsapp.com/send?phone=3132744003" target="_blank"><img src="./images/whatsapp.png" alt="">
                        <a href="https://www.instagram.com/zona.es867/?igshid=YmMyMTA2M2Y%3D" target="_blank"><img src="./images/instagram.png" alt=""></a></div>
                        

                    </div>

                    <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                        <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Donde<span> nos ubicamos</span></h2>

                        <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i>Av. Guabinal Con Calle 67. Ibaguè - Tolima. Colombia</p>
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
                        <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                        <iframe src="https://maps.google.com/maps?q=Av.+Guabinal,+Calle.+67,+Ibague+-+Tolima,+Colombia&t=&z=13&ie=UTF8&iwloc=&output=embed" width="1920" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                    
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                    <div class="ml-auto col-lg-4 col-md-5">
                        <p class="copyright-text">Copyright &copy; ZONA ES 8/67
                        
                    </div>

                    <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                        <p class="mr-4">
                            <i class="fa fa-envelope-o mr-1"></i>
                            <a href="#">@gmail.com</a>
                        </p>

                        <p><i class="fa fa-phone mr-1"></i> Numero de Contacto </p>
                        <br>
                        <br>
                        <br>
                           
                       
        </div>
                    </div>
                    
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <!-- <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
        <div class="modal-header">

            <h2 class="modal-title" id="membershipFormLabel">Membership Form</h2>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form class="membership-form webform" role="form">
                <input type="text" class="form-control" name="cf-name" placeholder="John Doe">

                <input type="email" class="form-control" name="cf-email" placeholder="Johndoe@gmail.com">

                <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

                <textarea class="form-control" rows="3" name="cf-message" placeholder="Additional Message"></textarea>

                <button type="submit" class="form-control" id="submit-button" name="submit">Submit Button</button>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="signup-agree">
                    <label class="custom-control-label text-small text-muted" for="signup-agree">I agree to the <a href="#">Terms &amp;Conditions</a>
                    </label>
                </div>
                
            </form>
        </div>

        <div class="modal-footer"></div>
        
    </div>
    </div> -->

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>