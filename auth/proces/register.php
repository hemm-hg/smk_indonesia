<?php
session_start();
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'] ?? '';
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    if ($password !== $confirm_password) {
        header('Location: ../register_' . $role . '.php?error=password_mismatch');
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($role == 'siswa') {
        $nis = trim($_POST['nis'] ?? '');
        $nama_siswa = trim($_POST['nama_siswa'] ?? '');
        $alamat = trim($_POST['alamat'] ?? '');
        $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';

        if (empty($nis) || empty($nama_siswa) || empty($alamat) || empty($jenis_kelamin)) {
            header('Location: ../register_siswa.php?error=empty');
            exit;
        }

        // cek exist
        $chk = mysqli_prepare($koneksi, "SELECT nis FROM siswa WHERE nis = ? LIMIT 1");
        mysqli_stmt_bind_param($chk, 's', $nis);
        mysqli_stmt_execute($chk);
        $res_chk = mysqli_stmt_get_result($chk);
        if ($res_chk && mysqli_num_rows($res_chk) > 0) {
            mysqli_stmt_close($chk);
            header('Location: ../register_siswa.php?error=nis_exists');
            exit;
        }
        mysqli_stmt_close($chk);

        mysqli_begin_transaction($koneksi);
        // insert user
        $ins_user = mysqli_prepare($koneksi, "INSERT INTO users (username, password, role, status, created_at) VALUES (?, ?, 'siswa', 'active', NOW())");
        mysqli_stmt_bind_param($ins_user, 'ss', $nis, $hashed_password);
        $ok1 = mysqli_stmt_execute($ins_user);
        mysqli_stmt_close($ins_user);

        // insert siswa
        $ins_siswa = mysqli_prepare($koneksi, "INSERT INTO siswa (nis, nama_siswa, alamat, jenis_kelamin) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($ins_siswa, 'ssss', $nis, $nama_siswa, $alamat, $jenis_kelamin);
        $ok2 = mysqli_stmt_execute($ins_siswa);
        mysqli_stmt_close($ins_siswa);

        if ($ok1 && $ok2) {
            mysqli_commit($koneksi);
            header('Location: ../login.php?success=registered');
            exit;
        } else {
            mysqli_rollback($koneksi);
            header('Location: ../register_siswa.php?error=failed');
            exit;
        }

    } elseif ($role == 'guru') {
        $nip = trim($_POST['nip'] ?? '');
        $nama_guru = trim($_POST['nama_guru'] ?? '');
        $alamat = trim($_POST['alamat'] ?? '');
        $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
        $tanggal_lahir = $_POST['tanggal_lahir'] ?? '';

        if (empty($nip) || empty($nama_guru) || empty($alamat) || empty($jenis_kelamin) || empty($tanggal_lahir)) {
            header('Location: ../register_guru.php?error=empty');
            exit;
        }

        // cek exist
        $chk = mysqli_prepare($koneksi, "SELECT nip FROM guru WHERE nip = ? LIMIT 1");
        mysqli_stmt_bind_param($chk, 's', $nip);
        mysqli_stmt_execute($chk);
        $res_chk = mysqli_stmt_get_result($chk);
        if ($res_chk && mysqli_num_rows($res_chk) > 0) {
            mysqli_stmt_close($chk);
            header('Location: ../register_guru.php?error=nip_exists');
            exit;
        }
        mysqli_stmt_close($chk);

        mysqli_begin_transaction($koneksi);
        $ins_user = mysqli_prepare($koneksi, "INSERT INTO users (username, password, role, status, created_at) VALUES (?, ?, 'guru', 'active', NOW())");
        mysqli_stmt_bind_param($ins_user, 'ss', $nip, $hashed_password);
        $ok1 = mysqli_stmt_execute($ins_user);
        mysqli_stmt_close($ins_user);

        $ins_guru = mysqli_prepare($koneksi, "INSERT INTO guru (nip, nama_guru, alamat, jenis_kelamin, tanggal_lahir) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($ins_guru, 'sssss', $nip, $nama_guru, $alamat, $jenis_kelamin, $tanggal_lahir);
        $ok2 = mysqli_stmt_execute($ins_guru);
        mysqli_stmt_close($ins_guru);

        if ($ok1 && $ok2) {
            mysqli_commit($koneksi);
            header('Location: ../login.php?success=registered');
            exit;
        } else {
            mysqli_rollback($koneksi);
            header('Location: ../register_guru.php?error=failed');
            exit;
        }
    } else {
        header('Location: ../register.php?error=role_invalid');
        exit;
    }
} else {
    header('Location: ../register.php');
    exit;
}
?>