<?php
include('koneksi.php');

if (isset($_POST ['simpan'])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $email = $_POST["email"];

    $query = "INSERT INTO supplier (nama_sp, alamat, email) VALUES ('$nama', '$alamat', '$email')";
    $sql   = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Penambahan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_supplier.php";</script>';
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>