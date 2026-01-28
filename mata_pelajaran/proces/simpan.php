<?php
include '../../config/koneksi.php';
mysqli_query($koneksi, "INSERT INTO mata_pelajaran (kode_mapel, nama_mapel, jam) VALUES ('$_POST[kode_mapel]', '$_POST[nama_mapel]', '$_POST[jam]')");
header("location: ../index.php");
?>