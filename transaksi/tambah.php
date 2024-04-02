<?php
include('koneksi.php');

if (isset($_POST ['simpan'])) {
    $tanggal = $_POST["tgl"];
    $sp = $_POST["sp"];

    $query = "INSERT INTO transaksi (tanggal, id_suplier) VALUES ('$tanggal', '$sp')";
    $sql   = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Penambahan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_transaksi.php";</script>';
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>