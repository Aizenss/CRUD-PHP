<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "tugas_1_revisi_1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("koneksi gagal: " . $conn->connect_error);
}
?>