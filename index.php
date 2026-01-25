<?php
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboaard SMK Indonesia</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="navbar-menu">
                <a href="siswa/index.php">Siswa</a>
                <a href="guru/index.php">Guru</a>
            </div>
        </div>
        <div class="title">
            <h1>Selamat Datang di Dashboard SMK Indonesia</h1>
            <p>Sebuah sistem informasi untuk mengelola data siswa dan guru di SMK Indonesia.</p>
            <p>Sekolah yang berkomitmen terhadap kualitas pendidikan dan pengembangan karakter siswa.</p>
        </div>
        <div class="profile">
            <div class="profile-image">
                <img src="assets/img/smk-indonesia.png" alt="smk indonesia">
            </div>
            <div class="descrption">
                <h2>Profil Sekolah Kami</h2>
                <p>Kami adalah sebuah Sekolah berkejuruan yang berfokus pada pengembangan keterampilan teknis dan profesional siswa.</p>
                <p>Visi kami adalah menjadi lembaga pendidikan terkemuka yang menghasilkan lulusan berkualitas tinggi dan siap menghadapi tantangan dunia kerja.</p>
                <p>Misi kami meliputi penyediaan kurikulum yang relevan, pengembangan keterampilan praktis, dan pembentukan karakter siswa yang unggul.</p>
            </div>
        </div>
        <div class="card-container">
            <div class="card-siswa">
                <h3>Data Siswa</h3>
                <p>Kelola informasi lengkap tentang siswa, termasuk data pribadi, prestasi akademik, dan absensi.</p>
                <a href="siswa/index.php">Lihat Data Siswa</a>
            </div>
            <div class="card-guru">
                <h3>Data Guru</h3>
                <p>Kelola informasi lengkap tentang guru, termasuk data pribadi, riwayat mengajar, dan prestasi profesional.</p>
                <a href="guru/index.php">Lihat Data Guru</a>
            </div>
        </div>
        <footer>
            <p>&copy; By SMK Indonesia 2026</p>
        </footer>
    </div>
</body>
</html>