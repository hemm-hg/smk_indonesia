<?php
include '../config/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM guru");
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $data = mysqli_query($koneksi, "SELECT * FROM guru WHERE nis LIKE '%" . $cari . "%' OR nama_guru LIKE '%" . $cari . "%'");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru - SMK Indonesia</title>
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
                    <h1>Data Guru</h1>
                    <p class="subtitle">Kelola data guru SMK Indonesia</p>
                </div>
                <a href="add.php" class="btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Guru
                </a>
            </div>

            <div class="table-card">
                <div class="card-header">
                    <div class="table-controls">
                        <div class="show-entries">
                            <label>Show</label>
                            <select id="entriesSelect">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span>entries</span>
                        </div>
                        <div class="table-search">
                            <form action="index.php" method="GET">
                                <label>Search:</label>
                                <input type="text" name="cari" placeholder="Cari NIP atau Nama..." value="<?php if (isset($_GET['cari'])) { echo $_GET['cari']; } ?>">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP <i class="fas fa-sort"></i></th>
                                <th>Nama Guru <i class="fas fa-sort"></i></th>
                                <th>Alamat <i class="fas fa-sort"></i></th>
                                <th>Jenis Kelamin <i class="fas fa-sort"></i></th>
                                <th>Tanggal Lahir <i class="fas fa-sort"></i></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                    <div class="action-buttons">
                                        <a href="edit.php?nip=<?php echo $row['nip']; ?>" class="btn-edit" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="proces/hapus.php?nip=<?php echo $row['nip']; ?>" class="btn-delete" title="Delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <div class="showing-info">
                        Showing 1 to <?php echo mysqli_num_rows($data); ?> entries
                    </div>
                    <div class="pagination">
                        <button class="page-btn" disabled>Previous</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">Next</button>
                    </div>
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