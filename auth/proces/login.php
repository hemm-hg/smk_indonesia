<?php
session_start();
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username == '' || $password == '') {
    header('Location: ../login.php?error=empty');
    exit;
}

$stmt = mysqli_prepare($koneksi, "SELECT id, username, password, role, status FROM users WHERE username = ? LIMIT 1");
if (!$stmt) {
    error_log("LOGIN: prepare failed: " . mysqli_error($koneksi));
    header('Location: ../login.php?error=server');
    exit;
}
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$user) {
    error_log("LOGIN: user not found for username={$username}");
    header('Location: ../login.php?error=notfound');
    exit;
}

error_log("LOGIN: fetched user id={$user['id']} username={$user['username']} raw_role=[" . $user['role'] . "]");

if ($user['status'] !== 'active') {
    header('Location: ../login.php?error=inactive');
    exit;
}

if (!password_verify($password, $user['password'])) {
    error_log("LOGIN: password mismatch for username={$username}");
    header('Location: ../login.php?error=invalid');
    exit;
}

// normalize role
$role = strtolower(trim($user['role']));
error_log("LOGIN: normalized role={$role} for username={$username}");

// set session
session_regenerate_id(true);
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role'] = $role;

// fetch display name if needed
if ($role === 'siswa') {
    $stmt2 = mysqli_prepare($koneksi, "SELECT nama_siswa FROM siswa WHERE nis = ? LIMIT 1");
    if ($stmt2) {
        mysqli_stmt_bind_param($stmt2, 's', $user['username']);
        mysqli_stmt_execute($stmt2);
        $r2 = mysqli_stmt_get_result($stmt2);
        if ($r2 && mysqli_num_rows($r2) > 0) {
            $row = mysqli_fetch_assoc($r2);
            $_SESSION['nama'] = $row['nama_siswa'];
        }
        mysqli_stmt_close($stmt2);
    }
} elseif ($role === 'guru') {
    $stmt2 = mysqli_prepare($koneksi, "SELECT nama_guru FROM guru WHERE nip = ? LIMIT 1");
    if ($stmt2) {
        mysqli_stmt_bind_param($stmt2, 's', $user['username']);
        mysqli_stmt_execute($stmt2);
        $r2 = mysqli_stmt_get_result($stmt2);
        if ($r2 && mysqli_num_rows($r2) > 0) {
            $row = mysqli_fetch_assoc($r2);
            $_SESSION['nama'] = $row['nama_guru'];
        }
        mysqli_stmt_close($stmt2);
    }
} else {
    $_SESSION['nama'] = 'Administrator';
}

// redirect explicit
if ($role === 'admin') {
    header('Location: ../../index.php');
} elseif ($role === 'guru') {
    header('Location: ../../guru/index.php');
} elseif ($role === 'siswa') {
    header('Location: ../../siswa/index.php');
} else {
    // safety fallback
    error_log("LOGIN: unknown role '{$role}' for user id={$user['id']}");
    header('Location: ../login.php?error=invalid_role');
}
exit;
?>