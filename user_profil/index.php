<?php
session_start();
if( !isset($_SESSION["id"]) ) header("Location: ..");

require '../config.php';

$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
if($hasil = mysqli_fetch_assoc($query)){
    $nama = $hasil['nama'];
    $email = $hasil['email'];
    $jenis_kelamin = $hasil['jenis_kelamin'];
    $no_telepon = $hasil['no_telepon'];
    $alamat = $hasil['alamat'];
    $username = $hasil['username'];
    $password = $hasil['password'];
    $gambar = $hasil['gambar'];


if (isset($_POST['gantiGambar'])) {
    $namaFile = $_FILES['gambar']['name'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    

    // insert nama gamabr
    $sintaks = "UPDATE user SET gambar = '$namaFile' WHERE id = '$id'";
    $query = mysqli_query($conn, $sintaks);
    if ($query) {
        // fungsi upload gambar
        $pindahGambar = move_uploaded_file($tmpName, 'images/' . $namaFile);
        if ($pindahGambar) {
            echo "<script>
                        alert('gambar berhasil diganti');
                        window.location = '../user_profil?$username';
                    </script>";
        } else {
            echo "<script>
                        alert('gambar gagal diedit');
                    </script>";
        }
    }
}
if (isset($_POST['Edit'])) {
    $Nama = $_POST['Nama'];
    $Email = $_POST['Email'];
    $Jenis_Kelamin = $_POST['jenis_kelamin'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];

    $sintaks = "UPDATE user SET
                    nama = '$Nama',
                    email = '$Email',
                    jenis_kelamin = '$Jenis_Kelamin',
                    no_telepon = '$no_telepon',
                    alamat = '$alamat'
                    WHERE id = '$id'";

    $query = mysqli_query($conn, $sintaks);
        if($query){
            echo "<script>
                        alert('data berhasil diedit');
                        window.location = '../user_profil?$username';
                    </script>";
          } else {
              echo mysqli_error($conn);
          }
}
if(isset($_POST['Ganti'])){
    $passwordlama = $_POST['passwordlama'];
    $passwordbaru = $_POST['passwordbaru'];

    $password_lama = $password;
    if ($password_lama == $passwordlama) {
        $sintaks = "UPDATE user SET password = '$passwordbaru' WHERE id = '$id'";
        $query = mysqli_query($conn, $sintaks);
        if($query){
            echo "<script>
                        alert('password berhasil diganti');
                        window.location = '../user_profil?$username';
                    </script>";
          } else {
              echo "<script>
                        alert('data gagal diedit');
                    </script>";
          }
    } else {
            echo "<script>
                alert('password lama tidak sesuai');
                window.location = '../user_profil?$username';
              </script>";
    }

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
    <style type="text/css">
        .profil{
            background-color: #f8f9fa;
            border: 1px solid black;
            padding: 3px;
        }
        .gambar{
            background-color: #fd7e14;
            text-align: center;
            padding-bottom: 10px;
        }
        .logout{
            background-color: rgb(234, 234, 234);
            padding: 5px 10px;
            border: 1px solid black;
            border-radius: 10px;
            color: black;
            transition: .5s;
        }
        a.logout:hover{
            background-color: rgb(243, 243, 243);
            color: gray;
            transition: .5s;
        }
        .label{
            float: left;
        }
        .input{
            float: left;
            margin-left: 20px;
            background-color: #ffc107;
        }
        .clear{
            clear: both;
        }
    </style>
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
                        <li>
                            <a class="profil nav-link" style="margin-left: 30px; margin-top: 3px;">
                                <?= $username;?>
                            </a>
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
                <div class="col-lg-3 gambar">
                    <form method="post" enctype="multipart/form-data">
                        <br><img src="images/<?=$gambar;?>" width="200" style="
                            padding: 5px;
                            background-color: white;
                            border-radius: 50%;
                            border: 1px solid black;
                        "></br>
                        <br>
                        <label style="margin-bottom: 5px;" for="gambar">Ganti Foto Profil</label>
                        <input style="margin-bottom: 10px;" type="file" id="gambar" name="gambar">
                        <p style="margin-bottom: 10px;"><button type="submit" name="gantiGambar">Ganti Gambar</button></p>
                        <a href="logout.php" class="logout">logout</a>
                    </form>
                </div>
                <div class="col-lg-4 my-lg-0 my-3">
                    <div class="agileits-banner-info4">
                        <h3>C</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <br><h3><i>Info Profil Anda</i><button type="button" data-toggle="modal" aria-pressed="false" data-target="#exampleModal" style="margin-left: 20px; cursor: pointer;">
                        <i>Edit Profil</i>
                    </button></h3><br>
                    <div  style="border-radius: 50px; border: 1px solid black; padding: 20px;">
                        <div class="py-4 pl-3 d-inline font-italic text-dark about-right-text"><br>
                            <div class="label">
                                <label for="nama">Nama</label><br>
                                <label for="email">Email</label><br>
                                <label for="username">Username</label><br>
                                <label for="jenis_kelamin">Jenis_Kelamin</label><br>
                                <label for="no_telepon">No. Telepon</label><br>
                                <label for="alamat">Alamat</label><br>
                            </div>
                            <div class="input">
                                <input type="text" name="nama" id="nama" value="<?=$nama?>" disabled><br>
                                <input type="text" name="email" id="email" value="<?=$email?>" disabled><br>
                                <input type="text" name="username" id="username" value="<?=$username?>" disabled><br>
                                <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?=$jenis_kelamin?>" disabled><br>
                                <input type="text" name="no_telepon" id="no_telepon" value="<?=$no_telepon?>" disabled><br>
                                <input type="textarea" name="alamat" id="alamat" value="<?=$alamat?>" disabled><br>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <h5 class="abt-right">CAAS USER</h5>
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
                                <a href="../user_login">
                                    CAAS</a>
                            </h2>
                        </div>
                        <ul class="footer-social-agile">
                            <li>
                                <a>
                                    <i class="fab fa-twitter"></i>
                                    <span class="app-con">Follow us on twitter
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $nama; ?>" name="Nama" id="nama" required="">
                        </div>
                        <div class="form-group">
                            <label for="Email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" value="<?= $email; ?>" name="Email" id="Email" required="">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
                            <SELECT class="form-control" name="jenis_kelamin">
                                <option value="Laki - Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </SELECT>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon" class="col-form-label">No. Telepon</label>
                            <input type="number" class="form-control" value="<?= $no_telepon; ?>" name="no_telepon" id="no_telepon">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" value="<?= $alamat; ?>" name="alamat" id="alamat">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control serv_bottom text-white" value="Edit" name="Edit">
                        </div>
                        <p class="text-center text-secondary">Ingin mengganti password?
                            <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-dark font-weight-bold">
                                Klik Disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Ganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password Lama</label>
                            <input type="password" class="form-control" name="passwordlama" id="password" required="">
                        </div>
                        <div class="form-group">
                            <label for="password1" class="col-form-label">Password Baru</label>
                            <input type="password" class="form-control" name="passwordbaru" id="password1" required="">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="col-form-label">Konfirmasi Password baru</label>
                            <input type="password" class="form-control" name="ConfirmPassword" id="password2" required="">
                        </div>
                        <div class="sub-w3l">
                            <div class="sub-agile">
                                <input type="checkbox" id="brand2" value="" required>
                                <label for="brand2" class="mb-3">
                                    <span></span>I Accept to the Terms & Conditions</label>
                            </div>
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control serv_bottom text-white" value="Ganti" name="Ganti">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //footer -->
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
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
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