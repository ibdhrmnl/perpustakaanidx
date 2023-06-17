<?php
include'config.php';
$id_mhs=$_POST['id_mhs'];
$id_pjm=$_GET['id'];
$pm=explode(".", $id_mhs);
$nim=$pm[0];
$nama=$pm[1];
// $nama=$_POST['nama'];
// $judul=$_POST['judul'];
$id_buku=$_POST['id_buku'];
$pb=explode(".", $id_buku);
$id=$pb[0];
$judul=$pb[1];
$tgl_pinjam=$_POST['tgl_pinjam'];
$dl = $_POST['deadline'];
$status_anggota="Sedang Meminjam";
$status_buku="Dipinjam";
$status_pjm="Belum Dikembalikan";




if(isset($_POST['simpan'])){
	mysqli_query($conn,
		"INSERT INTO peminjaman (id_peminjam, id_mhs, id_buku, NIM, tgl_pinjam, deadline, tgl_kembali, denda, statuspjm) 
		VALUES('', '$nim', '$id', '$nama', '$tgl_pinjam', '$dl', '','', '$status_pjm')"
	);
	mysqli_query($conn,
		"UPDATE mahasiswa
		SET statusmhs='$status_anggota'
		WHERE id_mhs='$nim'"
	);
	mysqli_query($conn,
		"UPDATE buku
		SET status='$status_buku'
		WHERE id_buku='$id'"
	);
	mysqli_query($conn,
		"UPDATE peminijaman
		SET statuspjm='$status_pjm'
		WHERE id_peminjam='$id_pjm'"
	);
	header("location:home.php");
}
?>