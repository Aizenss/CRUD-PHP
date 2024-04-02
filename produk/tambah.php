<?php
include('koneksi.php');

if (isset($_POST ['simpan'])) {
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $kategori = $_POST["kategori"];

    $query = "INSERT INTO produkk (nama_p, harga, id_kategori) VALUES ('$nama', '$harga', '$kategori')";
    $sql   = mysqli_query($conn, $query);
    if ($sql) {
        echo '<script>alert("Penambahan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_produk.php";</script>';
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>