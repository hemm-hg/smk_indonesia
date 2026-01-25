<?php
include '../config/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM guru");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru</title>
    <link rel="stylesheet" href="../css/guru.css">
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
            <h1>Tambah Data Guru</h1>
            <p>Form untuk menambahkan data guru baru ke dalam sistem.</p>
        </div>
        <div class="content">
            <div class="edit-siswa">
                <form action="proces/simpan.php" method="POST">
                    <label for="nip">NIP :</label><br>
                    <input type="text" id="nip" name="nip"><br><br>

                    <label for="nama_guru">Nama Guru :</label><br>
                    <input type="text" id="nama_guru" name="nama_guru"><br><br>
                    
                    <label for="alamat">Alamat :</label><br>
                    <textarea name="alamat" id="alamat"></textarea><br><br>
                    
                    <label for="jenis_kelamin">Jenis Kelamin :</label><br>
                    <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki">
                    <label for="laki-laki">Laki-laki</label>
                    <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
                    <label for="perempuan">Perempuan</label><br><br>

                    <label for="tanggal_lahir">Tanggal Lahir :</label><br>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"><br><br>
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

