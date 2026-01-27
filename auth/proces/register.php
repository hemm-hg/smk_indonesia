<?php
session_start();
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        header('location: register_' . $role . '.php?error=password_mismatch');
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($role == 'siswa') {
        $nis = mysqli_real_escape_string($koneksi, trim($_POST['nis']));
        $nama_siswa = mysqli_real_escape_string($koneksi, trim($_POST['nama_siswa']));
        $alamat = mysqli_real_escape_string($koneksi, trim($_POST['alamat']));
        $jenis_kelamin = $_POST['jenis_kelamin'];

        if (empty($nis) || empty($nama_siswa) || empty($alamat) || empty($jenis_kelamin)) {
            header('location: register_siswa.php?error=empty');
            exit;
        }

        $check_nis = "SELECT * FROM siswa WHERE nis = '$nis'";
        $result_check = mysqli_query($koneksi, $check_nis);
        if (mysqli_num_rows($result_check) > 0) {
            header('location: register_siswa.php?error=nis_exists');
            exit;
        }

        mysqli_begin_transaction($koneksi);

        try {
            $query_user = "INSERT INTO users (username, password, role, status) VALUES ('$nis', '$hashed_password', 'siswa', 'active')";
            mysqli_query($koneksi, $query_user);

            $query_siswa = "INSERT INTO siswa (nis, nama_siswa, alamat, jenis_kelamin) VALUES ('$nis', '$nama_siswa', '$alamat', '$jenis_kelamin')";
            mysqli_query($koneksi, $query_siswa);

            mysqli_commit($koneksi);

            header('location: login.php?success=registered');
            exit;
        } catch (Exception $e) {
            mysqli_rollback($koneksi);
            header('location: register_siswa.php?error=failed');
            exit;
        }

    } elseif ($role == 'guru') {
        $nip = mysqli_real_escape_string($koneksi, trim($_POST['nip']));
        $nama_guru = mysqli_real_escape_string($koneksi, trim($_POST['nama_guru']));
        $alamat = mysqli_real_escape_string($koneksi, trim($_POST['alamat']));
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        if (empty($nip) || empty($nama_guru) || empty($alamat) || empty($jenis_kelamin) || empty($tanggal_lahir)) {
            header('location: register_guru.php?error=empty');
            exit;
        }

        $check_nip = "SELECT * FROM guru WHERE nip = '$nip'";
        $result_check = mysqli_query($koneksi, $check_nip);
        if (mysqli_num_rows($result_check) > 0) {
            header('location: register_guru.php?error=nip_exists');
            exit;
        }

        mysqli_begin_transaction($koneksi);

        try {
            $query_user = "INSERT INTO users (username, password, role, status) VALUES ('$nip', '$hashed_password', 'guru', 'active')";
            mysqli_query($koneksi, $query_user);

            $query_guru = "INSERT INTO guru (nip, nama_guru, alamat, jenis_kelamin, tanggal_lahir) VALUES ('$nip', '$nama_guru', '$alamat', '$jenis_kelamin', '$tanggal_lahir')";
            mysqli_query($koneksi, $query_guru);

            mysqli_commit($koneksi);

            header('Location: login.php?success=registered');
            exit;
        } catch (Exception $e) {
            mysqli_rollback($koneksi);
            header('Location: register_guru.php?error=failed');
            exit;
        }
    }
} else {
    header('location: register.php');
    exit;
}