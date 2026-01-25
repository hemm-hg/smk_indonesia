<?php
include '../config/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="../css/siswa.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="navbar-menu">
                <a href="../index.php">Home</a>
                <a href="index.php">Siswa</a>
                <a href="../guru/index.php">Guru</a>
            </div>
        </div>
        <div class="title">
            <h1>Tambah Data Siswa</h1>
            <p>Form untuk menambahkan data siswa baru ke dalam sistem.</p>
        </div>
        <div class="content">
            <div class="edit-siswa">
                <form action="proces/simpan.php" method="POST">
                    <label for="nis">NIS :</label><br>
                    <input type="text" id="nis" name="nis" required><br><br>
                    
                    <label for="nama_siswa">Nama Siswa :</label><br>
                    <input type="text" id="nama_siswa" name="nama_siswa" required><br><br>
                    
                    <label for="alamat">Alamat :</label><br>
                    <input type="text" id="alamat" name="alamat" required><br><br>
                    
                    <label for="jenis_kelamin">Jenis Kelamin :</label><br>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select><br><br>
                    <input type="submit" value="Simpan">
                </form>
            </div>
        </div>
         <footer>
            &copy; By SMK Indonesia 2026
        </footer>
    </div>
</body>
</html>

