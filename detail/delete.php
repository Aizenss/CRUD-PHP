<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM detail WHERE id_detail = $id";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo '<script>alert("Penghapusan data berhasil.");</script>';
        echo '<script>window.location.href = "../table_detail.php";</script>';
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>