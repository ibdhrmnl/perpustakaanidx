<?php
include_once ("config.php");

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mhs = $id");
if($query===true){
    header ("location:table-datatable.php");
}
?>