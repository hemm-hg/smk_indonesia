<?php
include '../../config/koneksi.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $kode_mapel = $_POST['kode_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $jam = $_POST['jam'];
    $update_query = mysqli_query($koneksi, "UPDATE mata_pelajaran SET nama_mapel='$nama_mapel', jam='$jam' WHERE kode_mapel='$kode_mapel'");
    header("location: ../index.php");

    if(mysqli_query($koneksi, $update_query)){
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}else{
    echo "Akses tidak valid.";
}
mysqli_close($koneksi);
?>