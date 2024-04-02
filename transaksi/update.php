<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $tgl = $_POST["tgl"];
    $sp = $_POST["sp"];

    $query = "UPDATE transaksi SET tanggal='$tgl', id_suplier='$sp' WHERE id_transaksi=$id";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo '<script>alert("Pengeditan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_transaksi.php";</script>';
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
