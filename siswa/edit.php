<?php
include '../config/koneksi.php';
$nis = $_GET['nis'];
$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa - SMK Indonesia</title>
    <link rel="stylesheet" href="../css/siswa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-graduation-cap"></i>
            <div class="brand-text">
                <h3>SMK Indonesia</h3>
                <span>Portal Siswa</span>
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
            <a href="index.php" class="nav-item active">
                <i class="fas fa-user-graduate"></i>
                <span>Portal Siswa</span>
            </a>
            <a href="../guru/index.php" class="nav-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Portal Guru</span>
            </a>
            <a href="../mata_pelajaran/index.php" class="nav-item">
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
                    <h1>Edit Data Siswa</h1>
                    <p class="subtitle">Form untuk mengubah data siswa</p>
                </div>
                <a href="index.php" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>

            <div class="form-card">
                <form action="proces/ubah.php" method="POST">
                    <input type="hidden" name="nis" value="<?php echo $row['nis']; ?>">
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nis_display">
                                <i class="fas fa-id-card"></i>
                                NIS
                            </label>
                            <input type="text" id="nis_display" value="<?php echo $row['nis']; ?>" disabled>
                            <small>NIS tidak dapat diubah</small>
                        </div>

                        <div class="form-group">
                            <label for="nama_siswa">
                                <i class="fas fa-user"></i>
                                Nama Lengkap
                            </label>
                            <input type="text" id="nama_siswa" name="nama_siswa" value="<?php echo $row['nama_siswa']; ?>" required>
                        </div>

                        <div class="form-group full-width">
                            <label for="alamat">
                                <i class="fas fa-map-marker-alt"></i>
                                Alamat
                            </label>
                            <textarea id="alamat" name="alamat" rows="3" required><?php echo $row['alamat']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">
                                <i class="fas fa-venus-mars"></i>
                                Jenis Kelamin
                            </label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-Laki" <?php if ($row['jenis_kelamin'] == 'Laki-Laki') echo 'selected'; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
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