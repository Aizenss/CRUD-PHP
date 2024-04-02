<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    $query = "UPDATE supplier SET nama_sp='$nama', alamat='$alamat', email='$email' WHERE id_suplier = $id";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo '<script>alert("Pengeditan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_supplier.php";</script>';
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
