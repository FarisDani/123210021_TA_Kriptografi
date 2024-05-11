<?php  
    session_start();
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp     = $_POST['telp'];
    $email    = $_POST['email'];
    $level    = "admin";

    // Hashing password menggunakan algoritma Blake2b
    $options = [
        'cost' => 12,
    ];
    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID, $options);

    $sql = "INSERT INTO user (username, password, telp, email, level) VALUES ('$username', '$hashedPassword', '$telp', '$email', '$level')";
    $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

    if ($query) {
        header("location:login.php?status=daftar_berhasil");
    } else {
        header("location:login.php?status=failed");
    }
?>
