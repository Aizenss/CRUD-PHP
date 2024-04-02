<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $query = "UPDATE kategori SET nama='$nama' WHERE id_kategori=$id";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo '<script>alert("Pengeditan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_kategori.php";</script>';
        exit(); 
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
