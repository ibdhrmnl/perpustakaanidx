<?php
session_start();
include 'config.php';
$id = $_GET['id'];
$query = ("SELECT * FROM mahasiswa WHERE id_mhs='$id'");
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan Ida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/idx.png" type="image/x-icon">
</head>
<body>
<div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
    
    
                        <li class='sidebar-title'>Main Menu</li>
    
    
    
                        <li class="sidebar-item">
    
                            <a href="home.php" class='sidebar-link'>
                                <i data-feather="book" width="20"></i>
                                <span>Data Buku</span>
                            </a>
    
    
                        </li>
    
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="briefcase" width="20"></i> 
                        <span>Data Transaksi</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="datapinjam.php">Peminjaman Buku</a>
                        </li>
                        
                        <li>
                            <a href="datakkembali.php">Pengembalian Buku</a>
                        </li>
                        
                        
                    </ul>
                    
                </li>
    
                        <li class="sidebar-item ">
    
                            <a href="table-datatable.php" class='sidebar-link'>
                                <i data-feather="file" width="20"></i>
                                <span>Data Mahasiswa</span>
                            </a>
    
    
                        </li>
    
    
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
            </div>
            <div id="main">
                <nav class="navbar navbar-header navbar-expand navbar-light">
                    <a class="sidebar-toggler" href="#"><span
                            class="navbar-toggler-icon"></span></a>
                    <button class="btn navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex align-items-center navbar-light
                            ms-auto">
    
                            <li class="dropdown">
                                <a href="#" data-bs-toggle="dropdown"
                                    class="nav-link dropdown-toggle nav-link-lg
                                    nav-link-user">
                                    <div class="avatar me-1">
                                        <img src="assets/images/avatar/avatar.png"
                                            alt="" srcset="">
                                    </div>
                                    <div class="d-none d-md-block
                                        d-lg-inline-block">Hi, Admin</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="keluar.php"><i
                                            data-feather="log-out"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>




    <section id="multiple-column-form">
        <div class="row match-height container" style="margin-left:18%; margin-right:90%;">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">Input Mahasiswa</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="" method="POST">
                        <div class="form-body">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="row">
                            <div class="col-md-4">
                                <label>NIM</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="NIM" class="form-control" name="NIM" placeholder="NIM" value="<?php echo $row['NIM']; ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label>Nama Lengkap</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $row['nama']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Prodi</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="prodi" class="form-control" name="prodi" placeholder="Program Studi" value="<?php echo $row['prodi']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="jk" class="form-control" name="jk" placeholder="Jenis Kelamin" value="<?php echo $row['jk']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Username</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?php echo $row['username']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password" value="<?php echo $row['password']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label>Alamat</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $row['alamat']; ?>">
                            </div>
                            <div class="col-12 col-md-8 offset-md-4 form-group">
                                <div class='form-check'>
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox1" class='form-check-input' checked>
                                        <label for="checkbox1">Remember Me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Ubah Data</button>
                                <button type="submit" name="updatepass" class="btn btn-primary me-1 mb-1">Update Pass</button>
                                <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
                            </div>
                            </div>
                        </div>
                    </form>
                    
                <?php 
                    if(isset($_POST['submit'])){
                        $NIM = $_POST['NIM'];
                        $nama = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $prodi = $_POST['prodi'];
                        $jk = $_POST['jk'];
                    
                        $update = mysqli_query($conn, "UPDATE mahasiswa SET
                                        NIM = '".$NIM."',
                                        nama = '".$nama."',
                                        prodi = '".$prodi."',
                                        jk = '".$jk."',
                                        alamat = '".$alamat."'
                                        WHERE id_mhs = '".$id."' ");
                        if($update){
                            echo '<script>alert("your data has been changed successfully", window.location = "table-datatable.php")</script>';
                            // echo '<script>window.location = "table-datatable.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }
                    }

                    if(isset($_POST['updatepass'])){
                        $pass1 = $_POST['password'];
                        
                        if($pass1){
                            
                            $u_pass = mysqli_query($conn, "UPDATE mahasiswa SET Password = '".MD5($pass1)."' WHERE id_mhs = '".$id."' ");
                            if($u_pass){
                                echo '<script>alert("your password has been changed successfully", )</script>';
                            }else{
                                echo 'gagal' .mysqli_error($conn);
                            }
                        }               
                    }
                ?>
                </div>
                </div>
            </div>
            </div>
            
        </div>
    </section>

    
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>
</html>