<?php
include '../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Pelajaran - SMK Indonesia</title>
    <link rel="stylesheet" href="../css/siswa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-graduation-cap"></i>
            <div class="brand-text">
                <h3>SMK Indonesia</h3>
                <span>Mata Pelajaran</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-title">CORE</div>
            <a href="../index.php" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <div class="nav-title">INTERFACE</div>
            <a href="../auth/login.php" class="nav-item">
                <i class="fas fa-sign-in-alt"></i>
                <span>Login</span>
            </a>
            <a href="../about.php" class="nav-item">
                <i class="fas fa-info-circle"></i>
                <span>Tentang Sekolah</span>
            </a>

            <div class="nav-title">PORTALS</div>
            <a href="../siswa/index.php" class="nav-item">
                <i class="fas fa-user-graduate"></i>
                <span>Portal Siswa</span>
            </a>
            <a href="../guru/index.php" class="nav-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Portal Guru</span>
            </a>
            <a href="index.php" class="nav-item active">
                <i class="fas fa-book"></i>
                <span>Mata Pelajaran</span>
            </a>
        </nav>
    </aside>

    <div class="main-wrapper">
        <header class="topbar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search for...">
            </div>

            <div class="topbar-right">
                <div class="notification">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </div>
                <div class="notification">
                    <i class="fas fa-envelope"></i>
                    <span class="badge">2</span>
                </div>
                <div class="user-info">
                    <span class="user-name">Guest User</span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </header>

        <main class="content">
            <div class="page-header">
                <div>
                    <h1>Tambah Mata Pelajaran</h1>
                    <p class="subtitle">Form untuk menambahkan mata pelajaran baru</p>
                </div>
                <a href="index.php" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>

            <div class="form-card">
                <form action="proces/simpan.php" method="POST">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="kode_mapel">
                                <i class="fas fa-barcode"></i>
                                Kode Mata Pelajaran
                            </label>
                            <input type="text" id="kode_mapel" name="kode_mapel" placeholder="Contoh: MTK001" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_mapel">
                                <i class="fas fa-book"></i>
                                Nama Mata Pelajaran
                            </label>
                            <input type="text" id="nama_mapel" name="nama_mapel" placeholder="Contoh: Matematika" required>
                        </div>

                        <div class="form-group">
                            <label for="jam">
                                <i class="fas fa-clock"></i>
                                Jam Pelajaran (JP)
                            </label>
                            <input type="number" id="jam" name="jam" placeholder="Contoh: 4" min="1" max="10" required>
                            <small>Jumlah jam pelajaran per minggu</small>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Data
                        </button>
                        <a href="index.php" class="btn-cancel">
                            <i class="fas fa-times"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>