<?php
include '../../config/koneksi.php';
$nip = $_GET['nip'];
$query = mysqli_query($koneksi, "DELETE FROM guru WHERE nip='$nip'");
if (!$query) {
    echo " Data Invalid: " . mysqli_error($koneksi);
    exit;
}
header("Location: ../index.php");
mysqli_close($koneksi);
?>