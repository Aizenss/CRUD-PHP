<?php
include('koneksi.php');

if (isset($_POST ['simpan'])) {
    $ts = $_POST["transaksi"];
    $prdk = $_POST["produk"];
    $jumlah = $_POST["jumlah"];

    $query = "INSERT INTO detail (id_transaksi, id_produk, jumlah) VALUES ('$ts', '$prdk', '$jumlah')";
    $sql   = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Penambahan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_detail.php";</script>';
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>