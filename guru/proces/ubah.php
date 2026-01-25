<?php
include '../../config/koneksi.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

   $update_query = mysqli_query($koneksi, "UPDATE guru SET nama_guru='$nama_guru', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir' WHERE nip='$nip'");
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