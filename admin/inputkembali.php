<?php
    session_start();
    include("config.php");

    $id = $_GET['id'];
    // $query = ("SELECT * FROM peminjaman WHERE id_peminjam='$id'");
    // $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($result);

    // $tgl_kembali=date('Y-m-d');
    
    

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
    
                <li class="sidebar-item  has-sub active">

                    <a href="#" class='sidebar-link '>
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
        <div class="row match-height container" >
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">Pengembalian Buku</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="" method="POST">
                    <div class="form-body">
                        <input type="hidden" name="id">
                        <!-- <input type="hidden" name="id_buku"> -->
                        <div class="row">
                        <div class="col-md-4">
                            <label >Mahasiswa</label>
                        </div>
                        <div class="col-md-8 form-group">
                            
                            <?php
                            $mhs = $conn->query("SELECT * from peminjaman, mahasiswa WHERE peminjaman.id_mhs = mahasiswa.id_mhs AND peminjaman.id_peminjam = '$id'") or die(mysqli_error($conn));
                            while ($r_mhs = mysqli_fetch_array($mhs)){?>
                                <input type="text" class='form-control' value="<?= $r_mhs['nama'] ?>" name="">
                           
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <label >Buku Yang Dipinjam</label>
                        </div>
                        <div class="col-md-8 form-group">
                            
                            <?php
                            $book = $conn->query("SELECT * from peminjaman, buku WHERE peminjaman.id_buku = buku.id_buku AND peminjaman.id_peminjam = '$id'") or die(mysqli_error($conn));
                            while ($r_bku = mysqli_fetch_array($book)){?>
                                <input type="text" class='form-control' value="<?= $r_bku['judulBuku'] ?>" name="">
                           
                            <?php
                            }
                            ?>
                        </div>
                        
                        <div class="col-md-4">
                            <label >Tanggal Deadline</label>
                        </div>
                        <div class="col-md-8 form-group">
                            
                            <?php
                            $pinjam = $conn->query("SELECT * from peminjaman WHERE peminjaman.id_peminjam = '$id'") or die(mysqli_error($conn));
                            while ($r_pjm = mysqli_fetch_array($pinjam)){?>
                                <input type="text" class='form-control' value="<?= $r_pjm['deadline'] ?>" name="">
                           
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <label>Pengembalian</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="date" id="prodi" class="form-control" name="tgl_kembali" placeholder="Program Studi" value="">
                        </div>
                        <div class="col-md-4">
                            <label>Jumlah Denda</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <?php
                            $pinjam = $conn->query("SELECT * from peminjaman WHERE peminjaman.id_peminjam = '$id'") or die(mysqli_error($conn));
                            while ($r_pjm = mysqli_fetch_array($pinjam)){?>
                                <input type="text" class='form-control' value="Rp. <?= $r_pjm['denda'] ?>" name="">
                           
                            <?php
                            }
                            ?><br> *Note: Jika Tanggal Deadline melebihi hari ini biaya Denda Rp.1000/hari
                        </div>
                        
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type='submit' name='kembali' class='btn btn-primary me-1 mb-1' onclick="confirm('Apakah Sudah membayar denda? jika sudah Silahkan tekan OK!')">Submit</button>                          
                        </div>
                        </div>
                    </div>
                    </form>
                    <?php
                    include "config.php";

                    if(isset($_POST['kembali'])){
                        $tgl_kembali= $_POST['tgl_kembali'];
                        $status_mhs= "Tidak Meminjam";
                        $status_buku= "Tersedia";
                        $status_pjm= "Dikembalikan";
                        // $id = $_GET['id'];
                        $pinjam = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjam= '$id'");
                        $r_pjm = mysqli_fetch_array($pinjam);
                        $id_mhs = $r_pjm['id_mhs'];
                        $id_pjm = $r_pjm['id_peminjam'];
                        $id_buku=$r_pjm['id_buku'];
                        mysqli_query($conn, "UPDATE peminjaman SET tgl_kembali='$tgl_kembali' WHERE id_peminjam='$id'");
                        mysqli_query($conn, "UPDATE mahasiswa SET statusmhs='$status_mhs' WHERE id_mhs='$id_mhs'");
                        mysqli_query($conn, "UPDATE buku SET status='$status_buku' WHERE id_buku='$id_buku'");
                        mysqli_query($conn, "UPDATE peminjaman SET statuspjm='$status_pjm' WHERE id_peminjam='$id_pjm'");
                        echo '<script>alert("your data has been changed successfully", window.location = "datapinjam.php")</script>';
                    }
                    else{
                        echo 'gagal' .mysqli_error($conn);
                    }
                    ?>
                </div>
                </div>
            </div>
            </div>
            
        </div>
        <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; PerpusIdx</p>
                    </div>
                </div>
            </footer>
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