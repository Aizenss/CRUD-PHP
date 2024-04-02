<?php
include('koneksi.php');

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['pass'])) {
                $_SESSION['username'] = $username;
                header("Location: ../beranda.php");
                exit();
            } else {
                header("Location: ../index.php?error=pass");
            }
        } else {
            header("Location: ../index.php?error=username");
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>