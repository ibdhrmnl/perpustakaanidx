<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil";
// function say($pesan, $lokasi){
//   $a = "<script> window.alert('$pesan');
//         window.location = '$lokasi';
//         </script>";
//         return $a;
// }
?>