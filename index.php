<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SMK Indonesia</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-graduation-cap"></i>
            <div class="brand-text">
                <h3>SMK Indonesia</h3>
                <span>Dashboard</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-title">CORE</div>
            <a href="index.php" class="nav-item active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <div class="nav-title">INTERFACE</div>
            <a href="auth/login.php" class="nav-item">
                <i class="fas fa-sign-in-alt"></i>
                <span>Login</span>
            </a>
            <a href="auth/logout.php" class="nav-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
            <a href="about.php" class="nav-item">
                <i class="fas fa-info-circle"></i>
                <span>Tentang Sekolah</span>
            </a>

            <div class="nav-title">PORTALS</div>
            <a href="siswa/index.php" class="nav-item">
                <i class="fas fa-user-graduate"></i>
                <span>Portal Siswa</span>
            </a>
            <a href="guru/index.php" class="nav-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Portal Guru</span>
            </a>
            <a href="mata_pelajaran/index.php" class="nav-item">
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
                <h1>Dashboard</h1>
            </div>

            <div class="stats-grid">
                <div class="stat-card blue">
                    <div class="stat-content">
                        <div class="stat-info">
                            <span class="stat-label">TOTAL SISWA</span>
                            <h2 class="stat-value">245</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card green">
                    <div class="stat-content">
                        <div class="stat-info">
                            <span class="stat-label">TOTAL GURU</span>
                            <h2 class="stat-value">42</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card teal">
                    <div class="stat-content">
                        <div class="stat-info">
                            <span class="stat-label">MATA PELAJARAN</span>
                            <h2 class="stat-value">18</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card yellow">
                    <div class="stat-content">
                        <div class="stat-info">
                            <span class="stat-label">JUMLAH KELAS</span>
                            <h2 class="stat-value">12</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-card">
                    <div class="card-header">
                        <h3><i class="fas fa-info-circle"></i> Selamat Datang</h3>
                    </div>
                    <div class="card-body">
                        <p>Selamat datang di Sistem Informasi SMK Indonesia. Sistem ini dirancang untuk memudahkan pengelolaan data siswa, guru, dan mata pelajaran.</p>
                        <p>Silakan pilih menu di sidebar untuk mengakses fitur yang tersedia.</p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="card-header">
                        <h3><i class="fas fa-bullhorn"></i> Pengumuman</h3>
                    </div>
                    <div class="card-body">
                        <ul class="announcement-list">
                            <li>
                                <i class="fas fa-circle"></i>
                                <span>Pendaftaran siswa baru tahun ajaran 2024/2025 telah dibuka</span>
                            </li>
                            <li>
                                <i class="fas fa-circle"></i>
                                <span>Jadwal UTS akan dilaksanakan tanggal 15-20 Maret 2024</span>
                            </li>
                            <li>
                                <i class="fas fa-circle"></i>
                                <span>Rapat koordinasi guru setiap hari Senin pukul 13.00</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="quick-access">
                <h3>Akses Cepat</h3>
                <div class="quick-links">
                    <a href="siswa/index.php" class="quick-link blue">
                        <i class="fas fa-user-graduate"></i>
                        <span>Data Siswa</span>
                    </a>
                    <a href="guru/index.php" class="quick-link green">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Data Guru</span>
                    </a>
                    <a href="mapel/index.php" class="quick-link teal">
                        <i class="fas fa-book"></i>
                        <span>Mata Pelajaran</span>
                    </a>
                    <a href="auth/login.php" class="quick-link yellow">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function(e) {
                document.querySelectorAll('.nav-item').forEach(el => el.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

</body>
</html>