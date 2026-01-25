<?php
include '../config/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM guru");
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $data = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip LIKE '%" . $cari . "%' OR nama_guru LIKE '%" . $cari . "%'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru SMK Indonesia</title>
    <link rel="stylesheet" href="../css/siswa.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="navbar-menu">
                <a href="../index.php">Home</a>
                <a href="../siswa/index.php">Siswa</a>
            </div>
        </div>
        <div class="title">
            <h1>Data Guru SMK Indonesia</h1>
            <p>Sebuah sistem informasi untuk mengelola data Guru di SMK Indonesia.</p>
        </div>
        <div class="add-data">
            <a href="add.php">Tambah Data</a>
        </div>
        <div class="search-form">
            <form action="index.php">
                <input type="text" name="cari" placeholder="Cari guru berdasarkan NIP atau Nama" value="<?php if (isset($_GET['cari'])) { echo $_GET['cari']; } ?>">
                <input type="submit" value="Cari">
            </form>
        </div>
        <div class="content">
            <div class="data_guru">
                <table class="table_guru" border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nip']; ?></td>
                        <td><?php echo $row['nama_guru']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['jenis_kelamin']; ?></td>
                        <td><?php echo $row['tanggal_lahir']; ?></td>
                        <td>
                            <a href="edit.php?nip=<?php echo $row['nip']; ?>" class="link_edit">Edit</a>
                            <a href="proces/hapus.php?nip=<?php echo $row['nip']; ?>" class="link_delete">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }?>
                </table>
            </div>
        </div>
        <footer>
            &copy; By SMK Indonesia 2026
        </footer>
    </div>
</body>
</html>