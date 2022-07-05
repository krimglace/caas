<?php
session_start();
require '../config.php';
if( !isset($_SESSION["id"]) ) header("Location: ..");

$username = $_SESSION['username'];
$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
if ($hasil = mysqli_fetch_assoc($query)) {
    $nama = $hasil['nama'];
    $username = $hasil['username'];
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CAAS Templates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <style type="text/css">
        .profil{
            background-color: #f8f9fa;
            border: 1px solid black;
            padding: 3px;
        }
    </style>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=EB+Garamond:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>
    <!-- banner -->
    <div class="banner" id="home">
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">
                <h1>
                    <a class="navbar-brand" href="../user_login">
                        CAAS
                    </a>
                </h1>
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto text-center">
                        <li class="nav-item active  mr-lg-3">
                            <a class="nav-link" href="../user_login">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown mr-lg-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Template
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cv.php">Templates CV</a>
                                <a class="dropdown-item" href="porto.php">Templates Portofolio</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="namecard.php">Templates Name Card</a>
                            </div>
                        </li>
                        <li class="nav-item  mr-lg-3">
                            <a class="nav-link" href="tentangkami.php">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="../user_profil?<?= $username;?>" class="profil nav-link">
                                <?= $username;?>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- //header -->
        <div class="container">
        </div>
        <!-- //container -->
    </div>
    <!-- //banner -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
        </ol>
    </nav>
    <!--/banner-section-->
    <!-- about -->
    <section class="wthree-row py-lg-5 py-sm-5 py-3 about-main">
        <div class="container py-lg-5">
            <div class="pt-lg-5 bg-pricemain row">
                <div class="col-lg-4">
                    <h3 class="agile-title text-uppercase">VISI MISI CAAS</h3>
                    <span class="w3-line"></span>
                    <h5 class="agile-title text-capitalize pt-4">Menjadikan CAAS unggul dalam bidang start up. </h5>
                </div>
                <div class="col-lg-4 my-lg-0 my-3">
                    <div class="agileits-banner-info4">
                        <h3>C</h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- <i class="fas fa-quote-left" aria-hidden="true"></i> -->
                    <hr>
                    <p class="py-4 pl-3 d-inline font-italic text-dark about-right-text">
                        <br>Memberikan layanan terbaik kepada pengguna.
                        <br> kualitas template yang terbaik bagi pengguna.
                        <br>Mengutamakan kepuasan pelanggan.
                    </p>
                    <h5 class="abt-right">CAAS</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- //about -->
    <!-- team -->
    <section class="wthree-row py-sm-5 py-3">
        <div class="container py-5">
            <h3 class="agile-title text-uppercase">team</h3>
            <span class="w3-line"></span>
            <div class="row pt-5">
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 p-0">
                    <div class="agileinfo-team-grid mx-2">
                        <img src="images/ara.jpeg" alt="">
                        <div class="captn">
                            <h4>Zahra Luthfiah</h4>
                            <p>Project Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6  p-0">
                    <div class="agileinfo-team-grid mx-2">
                        <img src="images/imam.jpeg" alt="">
                        <div class="captn">
                            <h4>Chaerul Imam</h4>
                            <p>UI Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 p-0 mt-md-0 mt-4">
                    <div class="agileinfo-team-grid mx-2">
                        <img src="images/ata.jpg" alt="">
                        <div class="captn">
                            <h4>Teresia Ratna Calista</h4>
                            <p>Front-end</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 p-0 mt-lg-0 mt-4">
                    <div class="agileinfo-team-grid mx-2">
                        <img src="images/Rafli.jpeg" alt="">
                        <div class="captn">
                            <h4>Muhammad Rafli</h4>
                            <p>Back-end</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //team -->
    <!--footer -->
    <footer class="footer-sec serv_bottom">
        <div class="container">
            <div class="inner-sec py-5">
                <div class="row">
                    <div class="col-lg-6 footer-left-info text-left">
                        <div class="logo">
                            <h2>
                                <a href="index.php">
                                    CAAS</a>
                            </h2>
                        </div>
                        <ul class="footer-social-agile">
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                    <span class="app-con">Follow us on twitter
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                    <span class="app-con">Follow us on facebook
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <p class="mt-4">CAAS is the world’s leading community for creatives to share, grow, and get hired.
                        </p>
                    </div>
                    <div class="col-lg-6 footer-right-info mt-lg-0 mt-5">
                        <h6>Contact Us</h6>
                        <h4>+62 1928 218 439
                        </h4>
                        <a href="mailto:estehangatku@gmail.com">caastemplate@gmail.com</a>
                        <address class="ad-info">
                            Jl. Setia Budi *123.
                            <br> Bandung. Jawa Barat.
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-info py-4">
            <div class="copyright text-center">
                <p>&copy; 2021 CAAS Templates </p>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- script for password match -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- script for password match -->
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>

</html>