<?php
    require_once("config.php");
    $nama = $_POST["nama"];
    $NIM = $_POST["NIM"];
    $prodi = $_POST["prodi"];
    $gender = $_POST["jk"];
    $alamat = $_POST["alamat"];
    $user = $_POST["username"];
    $pass = md5($_POST["password"]);

    $query = "INSERT INTO mahasiswa (nim, nama, prodi, jk, username, password, alamat) VALUES ('$NIM', '$nama', '$prodi', '$gender', '$user', '$pass', '$alamat')";

    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Berhasil Menambahkan Data!"), window.location="table-datatable.php"</script>';
    } else {
    echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
?> 