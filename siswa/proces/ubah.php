<?php
include '../../config/koneksi.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

   $update_query = mysqli_query($koneksi, "UPDATE siswa SET nama_siswa='$nama_siswa', alamat='$alamat', jenis_kelamin='$jenis_kelamin' WHERE nis='$nis'");
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