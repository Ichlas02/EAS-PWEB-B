<?php

session_start();
include 'config.php';
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}
if (isset($_POST['submit'])) {

    $alamat = $_POST['alamat'];
    $kelamin = $_POST['kelamin'];
    $asal = $_POST['asal'];
    $hp = $_POST['hp'];
    $ttl = $_POST['ttl'];
    $lokasi = $_POST['lokasi'];
    $jabatan = $_POST['jabatan'];
    $no_peserta = time();
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis') . $foto;
    // Set path folder tempat menyimpan fotonya
    $path = "image/" . $fotobaru;
    if (move_uploaded_file($tmp, $path)) {
        $sql = "INSERT INTO `berkas` (`id`,`no_peserta`, `foto`, `no_hp`, `alamat`,`kelamin`, `ttl`, `asal`, `lokasi`,`jabatan`,`lolos`, `user_id`) VALUES (NULL,'$no_peserta', '$fotobaru', '$hp', '$alamat','$kelamin', '$ttl', '$asal', '$lokasi','$jabatan','belum','{$_SESSION['id']}' )";
        $result = mysqli_query($db, $sql);
        if ($result) {
            header('Location: dashboard.php');
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link rel="shortcut icon" href="./assets/image/logo2.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Kementrian Kelautan dan Perikanan</title>
</head>

<body>
<?php
    include("navbar.php");
    ?>
    <article class="min-h-screen bg-gray-50 dark:bg-blue-300">
        <div class=" flex items-center justify-center p-2">
            <form class="border shadow-md rounded-md p-2 mt-10" method="POST" enctype="multipart/form-data">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="alamat" id="alamat" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="alamat" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <select name="kelamin" id="kelamin" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                        <option value="" disabled>Pilih kelamin</option>
                        <option value="Laki-laki">laki-laki</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                    <label for="kelamin" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">kelamin</label>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="asal" id="asal" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="asal" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Asal Univ</label>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <select name="lokasi" id="lokasi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                        <option value="" disabled>Pilih lokasi</option>
                        <option value="surabaya">Surabaya</option>
                        <option value="jaksel">Jaksel</option>
                    </select>
                    <label for="lokasi" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Lokasi Ujian</label>
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <select name="jabatan" id="jabatan" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                        <option value="" disabled>Pilih Jabatan</option>
                        <option value="Analis Pasar Hasil Perikanan">Analis Pasar Hasil Perikanan</option>
                        <option value="Pengawas Perikanan">Pengawas Perikanan</option>
                        <option value="Juru Mudi">Juru Mudi</option>
                    </select>
                    <label for="jabatan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pilih jabatan</label>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="tel" name="hp" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor HP (+62)</label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="ttl" id="ttl" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tempat Tanggal Lahir</label>
                    </div>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="file" name="foto">
                </div>
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </article>

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>

</html>