<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SMK Indonesia</title>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <div class="auth-header">
                <h1>Create an Account!</h1>
                <p>Pilih jenis akun yang ingin didaftarkan</p>
            </div>

            <div class="role-selection">
                <a href="register_siswa.php" class="role-card">
                    <i class="fas fa-user-graduate"></i>
                    <h3>Siswa</h3>
                    <p>Daftar sebagai siswa</p>
                </a>

                <a href="register_guru.php" class="role-card">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>Guru</h3>
                    <p>Daftar sebagai guru</p>
                </a>
            </div>

            <div class="auth-footer">
                <a href="login.php">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</body>
</html>