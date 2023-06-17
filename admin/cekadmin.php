<?php
session_start();

// Cek apakah sudah login atau belum
if(isset($_SESSION['username'])){
    header("location:home.php");
}

// Koneksi ke database
include("config.php");

// Proses login
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['username'] = $username;
        echo '<script>alert("Selamat anda berhasil Login!"), window.location="home.php"</script>';
    } 
    else {
        // $message = "Username atau Password salah";
        echo '<script>alert("Username dan atau password tidak terdaftar.!"), window.location="index.php"</script>';
    }
}
?>