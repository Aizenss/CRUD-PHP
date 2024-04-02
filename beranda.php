<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/05aea6e721.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="fixed top-0 right-0 left-0 bg-blue-800 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="beranda.php" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Order List</span>
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-800 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-blue-800">
                    <li>
                        <a href="beranda.php" class="block py-2 text-blue-300 rounded bg-transparent" aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="table_kategori.php" class="block py-2 text-white rounded bg-transparent" aria-current="page">Kategori</a>
                    </li>
                    <li>
                        <a href="table_produk.php" class="block py-2 text-white rounded bg-transparent" aria-current="page">Produk</a>
                    </li>
                    <li>
                        <a href="table_supplier.php" class="block py-2 text-white rounded bg-transparent" aria-current="page">Supplier</a>
                    </li>
                    <li>
                        <a href="table_transaksi.php" class="block py-2 text-white rounded bg-transparent" aria-current="page">Transkasi</a>
                    </li>
                    <li>
                        <a href="table_detail.php" class="block py-2 text-white rounded bg-transparent" aria-current="page">Detail</a>
                    </li>
                    <li>
                        <a href="sistem_login/logout.php" class="block py-2 text-red-500 rounded bg-transparent" aria-current="page">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="grid grid-flow-col gap-4 text-center mx-auto mt-36">
            <div class="col-span-2 ms-32">
                <h1 class="font-medium text-2xl mt-36">Selamat datang di Order List</h1>
                <p class="font-medium text-md mb-3">Berikut adalah hasil pekerjaan saya dari tugas yang telah diberikan.</p>
            </div>
            <div class="col-span-2">
                <img src="img/welcome.png" class="max-w-md" alt="welcome.png">
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>