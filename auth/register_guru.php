<?php
include '../config/koneksi.php';
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Guru - SMK Indonesia</title>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box register-box">
            <div class="auth-header">
                <h1>Buat Akun Guru</h1>
                <p>Daftar sebagai Guru</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert error">
                    <?php
                    if ($_GET['error'] == 'empty') echo 'Harap isi semua field!';
                    elseif ($_GET['error'] == 'nip_exists') echo 'NIP sudah terdaftar!';
                    elseif ($_GET['error'] == 'password_mismatch') echo 'Password tidak cocok!';
                    elseif ($_GET['error'] == 'failed') echo 'Pendaftaran gagal! Coba lagi.';
                    ?>
                </div>
            <?php endif; ?>

            <form action="proces/register.php" method="POST" class="auth-form">
                <input type="hidden" name="role" value="guru">

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="nip" placeholder="NIP" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_guru" placeholder="Nama Lengkap" required>
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="alamat" placeholder="Alamat Lengkap" rows="3" required></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <select name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" placeholder="Repeat Password" required>
                    </div>
                </div>

                <button type="submit" class="btn-primary">Daftar Akun</button>

                <div class="divider">
                    <span>Atau</span>
                </div>

                <button type="button" class="btn-google" disabled>
                    <i class="fab fa-google"></i>
                    Register Dengan Google
                </button>

                <button type="button" class="btn-facebook" disabled>
                    <i class="fab fa-facebook-f"></i>
                    Register Dengan Facebook
                </button>
            </form>

            <div class="auth-footer">
                <a href="forgot_password.php">Lupa Password?</a>
                <a href="login.php">Sudah Punya Akun? Login!</a>
            </div>
        </div>
    </div>
</body>
</html>