<?php
include '../../config/koneksi.php';

$nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
$nama_guru = mysqli_real_escape_string($koneksi, $_POST['nama_guru']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);

$gambar_name = '';

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
    $file = $_FILES['gambar'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    $max_size = 2 * 1024 * 1024;
    
    if (in_array($file_ext, $allowed_ext) && $file_size <= $max_size) {
        $gambar_name = $nip . '_' . time() . '.' . $file_ext;
        $upload_path = '../../assets/uploads/image/' . $gambar_name;
        
        if (!is_dir('../../assets/uploads/image/')) {
            mkdir('../../assets/uploads/image/', 0755, true);
        }
        
        if (move_uploaded_file($file_tmp, $upload_path)) {
        } else {
            $gambar_name = '';
        }
    }
}

$query = "INSERT INTO guru (nip, nama_guru, alamat, jenis_kelamin, tanggal_lahir, gambar) 
          VALUES ('$nip', '$nama_guru', '$alamat', '$jenis_kelamin', '$tanggal_lahir', '$gambar_name')";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../index.php?success=added");
} else {
    header("Location: ../add.php?error=failed");
}
exit;
?>