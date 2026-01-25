<?php
include '../../config/koneksi.php';
$nis = $_GET['nis'];
$query = mysqli_query($koneksi, "DELETE FROM siswa WHERE nis='$nis'");
if (!$query) {
    echo " Data Invalid: " . mysqli_error($koneksi);
    exit;
}
header("Location: ../index.php");
mysqli_close($koneksi);
?>