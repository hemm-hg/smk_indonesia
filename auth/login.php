<?php
include '../config/koneksi.php';
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if ($_SESSION['role'] == 'admin') {
        header('location: ../index.php');
    } else {
        header('location: ../' . $_SESSION['role'] . '/index.php');
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMK Indonesia</title>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <div class="auth-header">
                <h1>Selamat Datang</h1>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert error">
                    <?php
                    if ($_GET['error'] == 'invalid') echo 'Username atau password salah!';
                    elseif ($_GET['error'] == 'empty') echo 'Harap isi semua field!';
                    elseif ($_GET['error'] == 'notfound') echo 'Username tidak ditemukan!';
                    elseif ($_GET['error'] == 'inactive') echo 'Akun tidak aktif!';
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert success">
                    <?php 
                    if ($_GET['success'] == 'registered') echo 'Registrasi berhasil ! Silakan login.';
                    elseif ($_GET['success'] == 'logout') echo 'Anda telah logout.';
                    ?>
                </div>
            <?php endif; ?>

            <form action="proces/login.php" method="POST" class="auth-form">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Enter Email Address..." required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Ingat Saya</span>
                    </label>
                </div>

                <button type="submit" class="btn-primary">Login</button>

                <div class="divider">
                    <span>Atau</span>
                </div>

                <button type="button" class="btn-google" disabled>
                    <i class="fab fa-google"></i>
                    Login Dengan Google
                </button>

                <button type="button" class="btn-facebook" disabled>
                    <i class="fab fa-facebook-f"></i>
                    Login Dengan Facebook
                </button>
            </form>

            <div class="auth-footer">
                <a href="forgot_password.php">Lupa Password?</a>
                <a href="register.php">Buat Akun Baru</a>
            </div>
        </div>
    </div>
</body>
</html>