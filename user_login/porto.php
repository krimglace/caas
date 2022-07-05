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
<html>

<head>
    <title>CAAS Templates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
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
    <!-- gallery smoothbox  -->
    <link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />
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
    <div class="inner-banner" id="home">
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
    </div>
    <!-- //banner -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Template Portofolio</li>
        </ol>
    </nav>
    <!--/banner-section-->
    <!-- gallery -->
    <div class="agileits-services py-md-5" id="gallery">
        <div class="container py-lg-5 pt-3 pb-5">
            <h3 class="agile-title text-uppercase">Template Portofolio</h3>
            <span class="w3-line"></span>
            <div class="row py-lg-5 pt-3 d-flex justify-content-center">
                <div class="card col-lg-4 border-0 mt-lg-0 mt-3">
                    <img class="card-img-top" src="images/CV10.png" alt="Card image cap ">
                    <div class="card-body text-center">
                        <h5 class="card-title">Portofolio #1</h5>
                        <a href="portofolio" class="btn">Order Now</a>
                    </div>
                </div>
                <div class="card col-lg-4 border-0 mt-lg-0 mt-5">
                    <img class="card-img-top" src="images/CV4.png" alt="Card image cap ">
                    <div class="card-body text-center">
                        <h5 class="card-title">Portofolio #2</h5>
                        <a href="portofolio" class="btn">Order Now</a>
                    </div>
                </div>
                <div class="card col-lg-4  border-0 mt-lg-0 mt-5">
                    <img class="card-img-top" src="images/CV7.png" alt="Card image cap ">
                    <div class="card-body text-center">
                        <h5 class="card-title ">Portofolio #3</h5>
                        <a href="portofolio" class="btn">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //gallery -->
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
    <!-- gallery smoothbox -->
    <script src="js/smoothbox.jquery2.js"></script>
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