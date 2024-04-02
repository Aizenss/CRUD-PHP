<?php
include('koneksi.php');
session_start();

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];
    
    $check_query = "SELECT * FROM user WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error_nama'] = "Nama pengguna sudah terdaftar.";
        header("Location: ../signup.php");
    } elseif ($password1 != $password2) {
        $_SESSION['error_pass'] = "Password tidak cocok. Pastikan kedua password sama.";
        header("Location: ../signup.php");
    } else {
        $password = password_hash($password1, PASSWORD_BCRYPT);

        $sql = "INSERT INTO user (username, pass) VALUES ('$username', '$password')";

        if ($conn->query($sql) === true) {
            header("Location: ../index.php");
        } else {
            echo "Terjadi kesalahan: " . $sql . "<br>" . $conn->error;
        }
    }

    mysqli_close($conn);
}
