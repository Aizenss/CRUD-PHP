<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $ts = $_POST["transaksi"];
    $prdk = $_POST["produk"];
    $jumlah = $_POST["jumlah"];

    $query = "UPDATE detail SET id_transaksi='$ts', id_produk='$prdk', jumlah='$jumlah' WHERE id_detail=$id";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo '<script>alert("Pengeditan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_detail.php";</script>';
        exit(); 
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
