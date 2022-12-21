<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['nama'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($db, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user (`id`, `nik`, `nama`, `email`,`role`, `password`) VALUES  (null,'$nik','$nama','$email','user','$password')";
            $result = mysqli_query($db, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $nama = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                header('Location: index.php?status:berhasil');
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link rel="shortcut icon" href="./assets/image/logo2.ico" type="image/x-icon">
    <title>Register</title>
</head>
<body>
<?php
    include("navbar.php");
    ?>
    <div class="flex justify-center items-center h-screen bg-gray-50 dark:bg-blue-300 ">
        <form action="" method="POST" class="w-1/2">
            <p class="text-gray-900 dark:text-white text-3xl font-extrabold">Register</p>
            <div class="mb-6">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nama" value="<?php echo $nama; ?>" required>
            </div>

            <div class="mb-6">
                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                <input type="text" id="nik" name="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nik" value="<?php echo $nik; ?>" required>
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password </label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div class="mb-6">
                <label for="cpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                <input type="password" id="cpassword" name="cpassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Konfirmasi password" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>

            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
            <p class="login-register-text text-gray-900 dark:text-white">Sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>