<?php
include_once ("config.php");

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id");
if($query===true){
    header ("location:home.php");
}
?>