<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT COUNT(*) AS jumlah_produk FROM detail WHERE id_produk = $id";
    $result = $conn->query($query);


    if ($result) {
        $row = $result->fetch_assoc();
        $jumlah = $row['jumlah_produk'];

        if ($jumlah > 0) {
            echo "<script>alert('Produk ini tidak dapat dihapus karena sudah digunakan dalam table detail')</script>";
            echo "<script>window.location='../table_produk.php'</script>";
        }
    }

    $query_delete = "DELETE FROM supplier WHERE id_suplier = $id";
    $result_delete = $conn->query($query_delete);

    if ($result_delete) {
        echo "<script>alert('Penghapusan data berhasil')</script>";
        echo "<script>window.location='../table_produk.php'</script>";
    } else {
        echo "<script>alert('Penghapusan data gagal')</script>";
        echo "<script>window.location='../table_produk.php'</script>";
    }
}

$conn->close();
?>