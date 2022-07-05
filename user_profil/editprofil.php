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
    
if(isset($_POST['Ganti'])){
    $passwordlama = $_POST['passwordlama'];
    
    $passwordbaru = $_POST['passwordbaru'];

    $password_lama = $password;
    if ($password_lama == $passwordlama) {
        $sintaks = "UPDATE user SET password = '$passwordbaru' WHERE id = '$id'";
        $query = mysqli_query($conn, $sintaks);
        if($query){
                // echo "<script>
                //             alert('password berhasil diganti');
                //             window.location = '../user_profil?$username';
                //         </script>";
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