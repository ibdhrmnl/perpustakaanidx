<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan Ida</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/idx.png" type="image/x-icon">
</head>
<body>
<div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.png" alt="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
    
    
                        <li class='sidebar-title'>Main Menu</li>
    
    
    
                        <li class="sidebar-item  ">
    
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
    
                        <li class="sidebar-item active">
    
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
            
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Mahasiswa</h3>
                <div class="col-md-12">
                    <a href="inputmahasiswa.php" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Mahasiswa</a>
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Daftar Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <?php
            //memanggil file koneksi.php
            include "config.php";

            //membuat query untuk mengambil data dari tabel mahasiswa
            $sql = "SELECT * FROM mahasiswa";

            //mengeksekusi query
            $result = mysqli_query($conn, $sql);
        ?>
            <div class="card">
                <div class="card-header">
                    Simple Datatable
                </div>
                <div class="card-body">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['NIM']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['prodi']; ?></td>
                                        <td><?= $row['jk']; ?></td>
                                        <td><?= $row['alamat']; ?></td>
                                        <td>
                                            <?php echo
                                            "<div class='d-flex' style='padding-right:16px; text-align:center;'>
                                                <a href='updatemhs.php?id=".$row['id_mhs']."' class='btn btn-info btn-sm' style='margin-right:6px; '><i data-feather='edit'></i></a>
                                                <a href='deletemahasiswa.php?id=".$row['id_mhs']."' class='btn btn-danger btn-sm'><i data-feather='trash'></i></a>
                                            </div>"
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                                echo "</table>";
                                //menutup koneksi
                                mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </section>
</div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; PerpusIdx</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="assets/js/vendors.js"></script>

    <script src="assets/js/main.js"></script>
</body>
</html>
