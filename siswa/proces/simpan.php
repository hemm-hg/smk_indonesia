<?php
include '../../config/koneksi.php';
mysqli_query($koneksi, "INSERT INTO siswa (nis, nama_siswa, alamat, jenis_kelamin) VALUES ('$_POST[nis]', '$_POST[nama_siswa]', '$_POST[alamat]', '$_POST[jenis_kelamin]')");
header("location: ../index.php");
?>