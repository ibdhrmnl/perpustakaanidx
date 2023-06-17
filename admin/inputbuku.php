<?php
    session_start();
    include("config.php");
    // $id = $_GET['id'];

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
                            <a href="datakembali.php">Pengembalian Buku</a>
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
                <h4 class="card-title">Input Mahasiswa</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="prosesbuku.php" method="POST" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="col-md-4">
                            <label>Foto Buku</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="file" class="form-file-input" name="file" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">Choose file...</span>
                                    <span class="form-file-button">Browse</span>
                                </label>
                        </div>
                        <div class="col-md-4">
                            <label>No Buku</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="nobuk" placeholder="Nomor Buku" required>
                        </div>
                        <div class="col-md-4">
                            <label>Judul Buku</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="judul" placeholder="Judul Buku" required>
                        </div>
                        <div class="col-md-4">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="des" placeholder="Deskripsi" required>
                        </div>
                        <div class="col-md-4">
                            <label>Pengarang</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="pengarang" placeholder="Pengarang" required>
                        </div>
                        <div class="col-md-4">
                            <label>Penerbit</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" required>
                        </div>
                        <div class="col-md-4">
                            <label>Tahun Terbit</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="year"  class="form-control" name="tahun" placeholder="Tahun Terbit" required>
                        </div>
                        <div class="col-md-4">
                            <label>Jumlah Buku</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="year"  class="form-control" name="jmlh" placeholder="Jumlah Buku" required>
                        </div>
                        
                        <div class="col-sm-12 d-flex justify-content-end">
                            <input type="submit" name="bupload" class="btn btn-primary me-1 mb-1" value="Submit">
                        </div>
                        </div>
                    </div>
                    </form>
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