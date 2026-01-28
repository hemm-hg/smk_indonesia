<?php
include '../../config/koneksi.php';
mysqli_query($koneksi, "INSERT INTO guru (nip, nama_guru, alamat, jenis_kelamin, tanggal_lahir, gambar) VALUES ('$_POST[nip]', '$_POST[nama_guru]', '$_POST[alamat]', '$_POST[jenis_kelamin]', '$_POST[tanggal_lahir]', '$_POST[gambar]')");
header("location: ../index.php");
?>