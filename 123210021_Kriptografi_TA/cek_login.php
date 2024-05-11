<?php 
    session_start();
    include 'koneksi.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $login = mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");
    $cek = mysqli_num_rows($login);
    
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);
        
        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $username;

            if ($data['level'] == "admin") {
                $_SESSION['level'] = "admin";
                header("location:index_admin.php");
            } else if ($data['level'] == "") {
                $_SESSION['level'] = "";
                header("location:index_user.php");
            } else {
                header("location:login.php?message=failed");
            }   
        } else {
            header("location:login.php?message=failed");
        }
    } else {
        header("location:login.php?message=failed");
    }
?>
