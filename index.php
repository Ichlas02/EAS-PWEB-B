<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['nama'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        if ($row['role'] == "admin") {
            header("Location: admin.php");
        } else
            header("Location: dashboard.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>
<html>
<head>
<title>Kementrian Kelautan dan Perikanan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link rel="shortcut icon" href="./assets/image/logo2.ico" type="image/x-icon">
</head>
<body>
	<?php
    include("navbar.php");
    ?>
	<nav class="p-3 border-gray-200 bg-gray-50 dark:bg-blue-300 dark:border-gray-700">
        <div class="container flex flex-wrap flex-col md:flex-row items-center justify-evenly mx-auto">
            <a href="#" class="flex items-center">
                <img src="./assets/image/logo2.png" style="transform:scale(1.4)" class="mr-3 h-10" alt="logo" />
                <span class="ml-4 self-center text-xl font-semibold whitespace-nowrap dark:text-white"><?php echo "<h1 class='text-gray-900 dark:text-black'>Selamat Datang " . $_SESSION['nama'] . "!" . "</h1>"; ?></span>
            </a>
            <div>
    <article class="flex justify-center items-center h-screen bg-gray-50 dark:bg-blue-300">
        <form method="POST" class="">
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Your email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@gmail.com" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Your password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="your password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
            <p class="text-gray-500 font-medium">Belum punya akun? <a href="register.php">Register</a></p>
        </form>
    </article>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script>
        // tailwind.config.js
        module.exports = {
            darkMode: 'class',
            // ...
        }
    </script>
	</table>
</body>
</html>
