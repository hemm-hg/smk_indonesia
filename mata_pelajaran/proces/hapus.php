<?php
include '../../config/koneksi.php';
$kode_mapel = $_GET['kode_mapel'];
$query = mysqli_query($koneksi, "DELETE FROM mata_pelajaran WHERE kode_mapel='$kode_mapel'");
if (!$query) {
    echo " Data Invalid: " . mysqli_error($koneksi);
    exit;
}
header("Location: ../index.php");
mysqli_close($koneksi);
?>