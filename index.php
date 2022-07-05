<?php

session_start();
require 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' && password = '$password'");
    $hasil_query = mysqli_fetch_assoc($query);
    $aksi = mysqli_num_rows($query);
    if($aksi > 0){
              // kirim session
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $hasil_query['id'];
            echo "<script>
                        alert('Anda Login Sebagai Admin');
                    </script>";
            header("Location: user_login");
          } else {
              echo "<script>
                        alert('Maaf, Username atau Password anda salah');
                    </script>";
          }
}

if (isset($_POST['signup'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $gambar='UPI.jpg';

    $sintaks = "INSERT INTO user (id, username, email, password, nama, jenis_kelamin, no_telepon, alamat, gambar)
            VALUES ('', '$Username', '$Email', '$Password', '', '', '', '', '$gambar')";

    $query = mysqli_query($conn, $sintaks);

    if ($query) {
      echo "<script>
                    alert('Selamat... Akun anda telah terdaftar');
                </script>";
    } else {
      echo mysqli_error($conn);
    }
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
                    <a class="navbar-brand" href="">
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
                            <a class="nav-link" href="">Home
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
                            <button type="button" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">
                                Login
                            </button>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <!-- //header -->
        <div class="container">
            <!-- banner-text -->
            <div class="banner-text">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider3">
                        <li>
                            <div class="slider-info">
                                <h3>CAAS Template</h3>
                                <p>Chose from ove 100 CV templates. Explore items created by our company and choose or order your favorite templates.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
    <div class="about-w3sec py-sm-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 my-md-0 my-5">
                    <div class="abt-block">
                        <div class="serv_abs serv_bottom">
                            <img src="images/Testi1.PNG" class="img-fluid" alt="">
                        </div>
                        <h3>Kelvin</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mt-md-0 mt-5">
                    <div class="abt-block">
                        <div class="serv_abs serv_bottom">
                            <img src="images/Testi2.PNG" class="img-fluid" alt="">
                        </div>
                        <h3>Nurul</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mt-md-0 mt-5">
                    <div class="abt-block mt-md-0 mt-5">
                        <div class="serv_abs serv_bottom">
                            <img src="images/Testi3.PNG" class="img-fluid" alt="">
                        </div>
                        <h3>Angel</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer -->
    <footer class="footer-sec serv_bottom">
        <div class="container">
            <div class="inner-sec py-5">
                <div class="row">
                    <div class="col-lg-6 footer-left-info text-left">
                        <div class="logo">
                            <h2>
                                <a href="">
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


    <!-- login  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control" placeholder=" " name="Username" id="recipient-name" required="">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="Password" id="password" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control serv_bottom text-white" value="Login" name="login">
                        </div>
                        <div class="row sub-w3l my-3">
                            <div class="col sub-agile">
                                <input type="checkbox" id="brand1" value="">
                                <label for="brand1" class="text-secondary">
                                    <span></span>Remember me?</label>
                            </div>
                            <div class="col forgot-w3l text-right">
                                <a href="#" class="text-secondary">Forgot Password?</a>
                            </div>
                        </div>
                        <p class="text-center text-secondary">Don't have an account?
                            <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-dark font-weight-bold">
                                Register Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- // login
    <!-- register -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control" placeholder=" " name="Username" id="recipient-rname" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="Email" id="recipient-email" required="">
                        </div>
                        <div class="form-group">
                            <label for="password1" class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="Password" id="password1" required="">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder=" " name="ConfirmPassword" id="password2" required="">
                        </div>
                        <div class="sub-w3l">
                            <div class="sub-agile">
                                <input type="checkbox" id="brand2" value="" required>
                                <label for="brand2" class="mb-3">
                                    <span></span>I Accept to the Terms & Conditions</label>
                            </div>
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control serv_bottom text-white" value="Register" name="signup">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- // register -->

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
    <!-- contact validation js -->
    <script src="js/form-validation.js"></script>

    <!-- Responsiveslides -->
    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: false,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- // Responsiveslides -->
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