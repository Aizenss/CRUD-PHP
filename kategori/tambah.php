<?php
include('koneksi.php');

if (isset($_POST ['simpan'])) {
    $nama = $_POST["nama"];

    $query = "INSERT INTO kategori (nama) VALUES ('$nama')";
    $sql   = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Penambahan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_kategori.php";</script>';
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>