<?php
include '../config/koneksi.php';
$nip = $_GET['nip'];
$data = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='$nip'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Guru</title>
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
            <h1>Edit Data Guru</h1>
            <p>Sebuah sistem informasi untuk mengelola data guru di SMK Indonesia.</p>
        </div>

        <div class="content">
            <form action="proces/ubah.php" method="POST">
                <input type="hidden" name="nip" value="<?php echo $row['nip']; ?>">
                
                <label for="nama_guru">Nama Guru :</label><br>
                <input type="text" id="nama_guru" name="nama_guru" value="<?php echo $row['nama_guru']; ?>"><br><br>
                
                <label for="alamat">Alamat :</label><br>
                <textarea name="alamat" id="alamat"><?php echo $row['alamat']; ?></textarea><br><br>
                
                <label for="jenis_kelamin">Jenis Kelamin :</label><br>
                <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>>

                <label for="laki-laki">Laki-laki</label>
                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>
                <label for="perempuan">Perempuan</label><br><br>

                <label for="tanggal_lahir">Tanggal Lahir :</label><br>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>"><br><br>

                <input type="submit" value="Ubah">

            </form>
        </div>
         <footer>
            &copy; By SMK Indonesia 2026
        </footer>
    </div>
</body>
</html>