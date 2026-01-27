<?php
session_start(); 
include '../../config/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        header('location: login.php?error=empty');
        exit;
    }

    $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 0) {
        header('location: login.php?error=notfound');
        exit;
    }

    $user = mysqli_fetch_assoc($result);

    if ($user['status'] != 'active') {
        header('location: login.php?error=inactive');
        exit;
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'siswa') {
            $query_siswa = "SELECT nama_siswa FROM siswa WHERE nis = '{$user['username']}'";
            $result_siswa = mysqli_query($koneksi, $query_siswa);
            if (mysqli_num_rows($result_siswa) > 0) {
                $siswa = mysqli_fetch_assoc($result_siswa);
                $_SESSION['nama'] = $siswa['nama_siswa'];
            }
        } elseif ($user['role'] == 'guru') {
            $query_guru = "SELECT nama_guru FROM guru WHERE nip = '{$user['username']}'";
            $result_guru = mysqli_query($koneksi, $query_guru);
            if (mysqli_num_rows($result_guru) > 0) {
                $guru = mysqli_fetch_assoc($result_guru);
                $_SESSION['nama'] = $guru['nama_guru'];
            }
        } else {
            $_SESSION['nama'] = 'Administrator';
        }

        if ($user['role'] == 'admin') {
            header('location: ../index.php');
        } else {
            header('location: ../' . $user['role'] . '/index.php');
        }
        exit;
    } else {
        header('location: login.php?error=invalid');
        exit;
    }
} else {
    header('location: login.php');
    exit;
}
?>