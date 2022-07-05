<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "db_caas";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
	die("koneksi gagal".mysqli_error());
} 
// else{
	// echo "koneksi berhasil";
// }


?>