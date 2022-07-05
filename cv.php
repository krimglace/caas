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
    <title>CAAS</title>
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
    <div class="inner-banner" id="home">
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">
                <h1>
                <a class="navbar-brand" href="../web-caas">
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
                            <a class="nav-link" href="../web-caas">Home
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
    </div>
    <!-- //banner -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../web-caas">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Template CV</li>
        </ol>
    </nav>
    <!-- //banner-section-->
    <!-- services -->
    <section class="wthree-row  py-sm-5 pt-3 pb-5">
        <div class="container py-lg-5">
            <h3 class="agile-title text-uppercase">Template CV</h3>
            <span class="w3-line"></span>
            <div class="row py-lg-5 pt-3 d-flex justify-content-center">
                <div class="card col-lg-4 border-0 mt-lg-0 mt-3">
                    <img class="card-img-top" src="images/CV1.png" alt="Card image cap ">
                    <div class="card-body text-center">
                        <h5 class="card-title">CV #1</h5>
                        <a href="pemesanan.php" class="btn scroll">View More</a>
                    </div>
                </div>
                <div class="card col-lg-4 border-0 mt-lg-0 mt-5">
                    <img class="card-img-top" src="images/CV2.png" alt="Card image cap ">
                    <div class="card-body text-center">
                        <h5 class="card-title">CV #2</h5>
                        <a href="pemesanan.php" class="btn scroll">View More</a>
                    </div>
                </div>
                <div class="card col-lg-4  border-0 mt-lg-0 mt-5">
                    <img class="card-img-top" src="images/CV3.png" alt="Card image cap ">
                    <div class="card-body text-center">
                        <h5 class="card-title ">CV #3</h5>
                        <a href="pemesanan.php" class="btn scroll">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--footer -->
    <footer class="footer-sec serv_bottom">
        <div class="container">
            <div class="inner-sec py-5">
                <div class="row">
                    <div class="col-lg-6 footer-left-info text-left">
                        <div class="logo">
                            <h2>
                                <a href="../web-caas">
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
    <!-- // login -->
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
                            <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
                        </div>
                        <div class="sub-w3l">
                            <div class="sub-agile">
                                <input type="checkbox" id="brand2" value="">
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