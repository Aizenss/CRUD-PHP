<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include('produk/koneksi.php');

$sql = "SELECT * FROM produkk INNER JOIN kategori ON produkk.id_kategori=kategori.id_kategori";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/05aea6e721.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="fixed top-0 right-0 left-0 bg-blue-800 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="beranda.php" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Order List</span>
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-800 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-blue-800">
                    <li>
                        <a href="beranda.php" class="block py-2 text-white rounded bg-transparent" aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="table_kategori.php" class="block py-2 text-white rounded bg-transparent" aria-current="page">Kategori</a>
                    </li>
                    <li>
                        <a href="table_produk.php" class="block py-2 text-blue-300 rounded bg-transparent" aria-current="page">Produk</a>
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
                        <a href="index.php" class="block py-2 text-red-500 rounded bg-transparent" aria-current="page">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="px-6 mt-20">

        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-3 ms-2" type="button">
            Tambah Produk
        </button>

        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-xl shadow">
                    <div class="flex bg-blue-800 items-start justify-between p-4 border-b rounded-lg">
                        <h3 class="text-xl font-semibold text-white">
                            Tambah Produk
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <form action="produk/tambah.php" method="post">
                            <div class="mb-3">
                                <label class="block mb-2 text-md font-medium text-black">Nama Produk</label>
                                <input type="text" name="nama" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Nama" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label class="block mb-2 text-md font-medium text-black">Harga</label>
                                <input type="number" name="harga" min="0" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Harga" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label class="block mb-2 text-sm font-medium text-black">Kategori</label>
                                <select name="kategori" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option selected>Pilih Kategori</option>
                                    <?php
                                    $ssql = "SELECT * FROM kategori";
                                    $isi = $conn->query($ssql);
                                    foreach ($isi as $data) {
                                        echo '<option value="' . $data['id_kategori'] . '">' . $data['nama'] . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="mb-3">
                                <button type="submit" name="simpan" class="text-white bg-blue-800 hover:bg-blue-900 font-medium rounded-lg text-sm w-full px-5 py-2.5">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-blue-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($result as $data) {
                    ?>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                <?= $no ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $data['nama_p']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?="Rp". number_format($data['harga'], 0, ',', '.'); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $data['nama'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <button data-modal-target="modal<?= $no ?>" data-modal-show="modal<?= $no ?>" class="text-blue-600 text-sm font-medium mr-3 type=" button">
                                    Edit
                                </button>
                                <div id="modal<?= $no ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <div class="relative bg-white rounded-xl shadow">
                                            <div class="flex bg-blue-800 items-start justify-between p-4 border-b rounded-lg">
                                                <h3 class="text-xl font-semibold text-white">
                                                    Edit Pesanan
                                                </h3>
                                            </div>
                                            <div class="p-6 space-y-6">
                                                <form action="produk/update.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $data['id_produk'] ?>">
                                                    <div class="mb-3">
                                                        <label class="block mb-2 text-md font-medium text-black">Nama Produk</label>
                                                        <input type="text" name="nama" value="<?= $data['nama_p'] ?>" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Nama" autocomplete="off" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="block mb-2 text-md font-medium text-black">Harga</label>
                                                        <input type="number" name="harga" min="0" value="<?= $data['harga'] ?>" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Harga" autocomplete="off" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kt" class="block mb-2 text-sm font-medium text-black">Kategori</label>
                                                        <?php
                                                        $value_from_database = $data['id_kategori'];
                                                        ?>
                                                        <select name="kategori" id="kt" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                            <option selected>Pilih Supplier</option>
                                                            <?php
                                                            $ssql = "SELECT * FROM kategori";
                                                            $isi = $conn->query($ssql);
                                                            while ($kategori = $isi->fetch_assoc()) {
                                                                $selected = ($kategori['id_kategori'] == $value_from_database) ? 'selected' : '';
                                                                echo '<option value="' . $kategori['id_kategori'] . '" ' . $selected . '>' . $kategori['nama'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit" name="simpan" class="text-white bg-blue-800 hover:bg-blue-900 font-medium rounded-lg text-sm w-full px-5 py-2.5">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="produk/delete.php?id=<?= $data['id_produk'] ?>" class="font-medium text-red-600" onclick="return confirm('Apakah kamu yakin?')">Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>