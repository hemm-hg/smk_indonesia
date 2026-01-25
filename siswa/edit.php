<?php
include '../config/koneksi.php';
$nis = $_GET['nis'];
$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
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
            <h1>Edit Data Siswa</h1>
            <p>Sebuah sistem informasi untuk mengelola data siswa di SMK Indonesia.</p>
        </div>

        <div class="content">
            <form action="proces/ubah.php" method="POST">
                <input type="hidden" name="nis" value="<?php echo $row['nis']; ?>">
                
                <label for="nama_siswa">Nama Siswa :</label><br>
                <input type="text" id="nama_siswa" name="nama_siswa" value="<?php echo $row['nama_siswa']; ?>"><br><br>
                
                <label for="alamat">Alamat :</label><br>
                <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>"><br><br>
                
                <label for="jenis_kelamin">Jenis Kelamin :</label><br>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select><br><br>
                
                <input type="submit" value="Ubah">

            </form>
        </div>
         <footer>
            &copy; By SMK Indonesia 2026
        </footer>
    </div>
</body>
</html>