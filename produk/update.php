<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $kategori = $_POST["kategori"];

    $query = "UPDATE produkk SET nama_p='$nama', harga='$harga', id_kategori='$kategori' WHERE id_produk=$id";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo '<script>alert("Pengeditan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_produk.php";</script>';
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
