<?php
session_start();
require_once '../auth/check_login.php';
include '../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru - SMK Indonesia</title>
    <link rel="stylesheet" href="../css/guru.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-graduation-cap"></i>
            <div class="brand-text">
                <h3>SMK Indonesia</h3>
                <span>Portal Guru</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-title">CORE</div>
            <a href="../index.php" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <div class="nav-title">INTERFACE</div>
            <?php if (!isset($_SESSION['logged_in'])): ?>
            <a href="../auth/login.php" class="nav-item">
                <i class="fas fa-sign-in-alt"></i>
                <span>Login</span>
            </a>
            <?php else: ?>
            <a href="../auth/logout.php" class="nav-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
            <?php endif; ?>
            
            <a href="../about.php" class="nav-item">
                <i class="fas fa-info-circle"></i>
                <span>Tentang Sekolah</span>
            </a>

            <div class="nav-title">PORTALS</div>
            <a href="../siswa/index.php" class="nav-item">
                <i class="fas fa-user-graduate"></i>
                <span>Portal Siswa</span>
            </a>
            <a href="index.php" class="nav-item active">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Portal Guru</span>
            </a>
            <a href="../mapel/index.php" class="nav-item">
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
                    <span class="user-name"><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest'; ?></span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </header>

        <main class="content">
            <div class="page-header">
                <div>
                    <h1>Tambah Data Guru</h1>
                    <p class="subtitle">Form untuk menambahkan data guru baru</p>
                </div>
                <a href="index.php" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>

            <div class="form-card">
                <form action="proces/simpan.php" method="POST" enctype="multipart/form-data">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nip">
                                <i class="fas fa-id-card"></i>
                                NIP
                            </label>
                            <input type="text" id="nip" name="nip" placeholder="Masukkan NIP" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_guru">
                                <i class="fas fa-user"></i>
                                Nama Lengkap
                            </label>
                            <input type="text" id="nama_guru" name="nama_guru" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="form-group full-width">
                            <label for="alamat">
                                <i class="fas fa-map-marker-alt"></i>
                                Alamat
                            </label>
                            <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">
                                <i class="fas fa-venus-mars"></i>
                                Jenis Kelamin
                            </label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">
                                <i class="fas fa-calendar"></i>
                                Tanggal Lahir
                            </label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>

                        <div class="form-group full-width">
                            <label for="gambar">
                                <i class="fas fa-camera"></i>
                                Foto Profil
                            </label>
                            <input type="file" id="gambar" name="gambar" accept="image/*">
                            <small>Format: JPG, PNG, GIF (Max: 2MB)</small>
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