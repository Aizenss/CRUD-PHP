<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

include('koneksi.php');

if (isset($_GET['id'])) {
    $id_kategori = $_GET['id'];

    $query_produk = "SELECT COUNT(*) AS jumlah_produk FROM produkk WHERE id_kategori = $id_kategori";
    $result_produk = $conn->query($query_produk);


    if ($result_produk) {
        $row_produk = $result_produk->fetch_assoc();
        $jumlah_produk = $row_produk['jumlah_produk'];

        if ($jumlah_produk > 0) {
            echo "<script>alert('Kategori ini tidak dapat dihapus karena sudah digunakan dalam produk')</script>";
            echo "<script>window.location='../table_kategori.php'</script>";
        }
    }

    $query_delete = "DELETE FROM kategori WHERE id_kategori = $id_kategori";
    $result_delete = $conn->query($query_delete);

    if ($result_delete) {
        echo "<script>alert('Penghapusan data berhasil')</script>";
        echo "<script>window.location='../table_kategori.php'</script>";
    } else {
        echo "<script>alert('Penghapusan data gagal')</script>";
        echo "<script>window.location='../table_kategori.php'</script>";
    }
}

$conn->close();
?>