<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/05aea6e721.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class=" fixed top-0 left-0 right-0 bg-blue-800 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="index.php" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Sinar Buku</span>
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-blue-800 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-blue-800 dark:border-gray-700">
                    <li>
                        <a href="index.php" class="block py-2 pl-3 text-white bg-blue-800 rounded" aria-current="page">Login</a>
                    </li>
                    <li>
                        <a href="signup.php" class="block py-2 pr-4 text-white bg-blue-800 rounded" aria-current="page">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main my-28 mx-20">
        <div class="grid grid-rows-1 grid-flow-col gap-4 ms-28">
            <div class="col-span-1 inline-block align-middle bg-white rounded overlow-hidden shadow-xl p-5 max-w-xl">
                <h1 class="mb-5 mt-6 font-medium text-center text-2xl">Login</h1>
                <form action="sistem_login/cek_login.php" method="post">
                    <div class="mb-6">
                        <label class="block mb-2 text-md font-medium text-black">Usernanme</label>
                        <input type="text" name="username" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan UserName" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="block mb-2 text-md font-medium text-black">Password</label>
                        <input type="password" name="password" class="bg-white border border-black text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Password" autocomplete="off" required>
                    </div>
                    <div class="mb-6">
                        <?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            if ($error == 'username') {
                                echo "<p class='text-red-600'>*Username salah.</p>";
                            } elseif ($error == 'pass') {
                                echo "<p class='text-red-600'>*Password salah.</p>";
                            }
                        }
                        ?>

                    </div>
                    <div class="mb-3">
                        <button type="submit" name="login" class="text-white bg-blue-800 hover:bg-blue-900 font-medium rounded-lg text-sm w-full px-5 py-2.5">Log In</button>
                    </div>
                    <div class="text-center">
                        <a href="signup.php" class="text-blue-800">Buat Akun</a>
                    </div>
                </form>
            </div>
            <div class="col-span-1">
                <img src="img/login.png" class="max-w-md mt-0 ms-20" alt="">
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>