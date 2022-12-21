<?php

session_start();
include 'config.php';
if (!isset($_SESSION['nama'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <link rel="shortcut icon" href="./assets/image/logo2.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <title>Kementrian Kelautan dan Perikanan</title>
</head>

<body class="overflow-x-hidden">
    <?php
    include("navbar.php");
    ?>

    <section class="bg-gray-50 dark:bg-blue-300 text-gray-900 dark:text-white min-h-screen">
        <article class="w-screen space-y-2">
            <h1 class="font-bold text-2xl text-center">Berkas</h1>
            <div class="flex justify-center items-center h-96">
                <div id="kartu" class="flex flex-col rounded-md border-2 border-gray-200 dark:border-gray-700 shadow-md p-2 ">
                    <div>
                        <h1 class="text-center text-2xl font-semibold">KARTU PESERTA UJIAN CPNS
                    </div>
                    <div>
                        <div class="flex items-center font-medium text-lg">
                            <?php
                            $sql = "SELECT * FROM user JOIN berkas ON user.id = berkas.user_id where user_id = '{$_SESSION['id']}' ";
                            $query = mysqli_query($db, $sql);

                            if ($data = mysqli_fetch_array($query)) {
                                echo "<div class='w-1/2 space-y-1'>
                        <p>Instansi : Kementrian Kelautan dan Perikanan</p>
                        <p>Lokasi : Jl. Ahmad Yani No.152 B, Gayungan, Kec. Gayungan, Kota SBY, Jawa Timur 60235 </p>
                        <p>NIK : $data[nik]</p>
                        <p>Nomor peserta : $data[no_peserta]</p>
                        <p>Nama : $data[nama]</p>
                        <p>Jenis Kelamin : $data[kelamin]</p>
                        <p>Tempat/tanggal lahir :$data[ttl]</p>
                        <p>Pendidikan : $data[asal]</p>
                        <p>Formasi jabatan : $data[jabatan]</p>
                        <p>Lokasi tes :$data[lokasi]</p>
                    </div>";
                            } else {
                                echo "
                        <button class='m-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800' type='button' data-modal-toggle='popup-modal'>
                          Isi berkas
                        </button>
                        
                        <div id='popup-modal' tabindex='-1' class='fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full>
                            <div class='relative w-full h-full max-w-md md:h-auto'>
                                <div class='relative bg-white rounded-lg shadow dark:bg-gray-700'>
                                    <button type='button' class='absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white' data-modal-toggle='popup-modal'>
                                        <svg aria-hidden='true' class='w-5 h-5' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z' clip-rule='evenodd'></path></svg>
                                        <span class='sr-only'>Close modal</span>
                                    </button>
                                    <div class='p-6 text-center'>
                                        <svg aria-hidden='true' class='mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'></path></svg>
                                        <h3 class='mb-5 text-lg font-normal text-gray-500 dark:text-gray-400'>Pastikan data anda sudah disiapkan</h3>
                                        <button data-modal-toggle='popup-modal' type='button' class='text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2'>
                                            <a href='berkas.php' class='block ' >Daftar</a>
                                        </button>
                                        <button data-modal-toggle='popup-modal' type='button' class='text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600'>No, cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                            } ?>

                            <div class="w-1/3 flex items-center mr-4 p-2 bg-gray-50 dark:bg-blue-300">
                                <?php
                                $sql = "SELECT * FROM user JOIN berkas ON user.id = berkas.user_id where user_id = '{$_SESSION['id']}' ";
                                $query = mysqli_query($db, $sql);

                                if ($data = mysqli_fetch_array($query)) {
                                    echo "<img src='image/" . $data['foto'] . "' width='400' class='p-2 border border-gray-200 dark:border-gray-700 shadow-md rounded-md'>";
                                } ?>
                            </div>
                        </div>
                    </div>

        </article>

        <article class="mt-10">
            <div>
                <h1 class="font-bold text-2xl text-center ">Pengumuman</h1>
            </div>
            <div class="flex justify-center items-center">
                <?php
                $sql = "SELECT * FROM user JOIN berkas ON user.id = berkas.user_id where user_id = '{$_SESSION['id']}' ";
                $query = mysqli_query($db, $sql);

                if ($data = mysqli_fetch_array($query)) {
                    if ($data['lolos'] == "lolos") {
                        echo "
                            <div class='flex flex-col space-y-2 justify-center items-center'>
                                <p class='font-bold text-green-500 text-xl animate-pulse'>Anda lolos</p>
                                <a id='download'>
                                <button class='text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2'>Cetak</button></a>
                            </div>";
                    } else {
                        echo "
                            <div>
                                <p class='font-bold text-xl animate-pulse'>Berkas dalam tahap verifikasi</p>
                            </div>";
                    }
                }

                ?>
            </div>
        </article>

    </section>

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script type="text/javascript">
        function autoClick() {
            $("#download").click();
        }

        $(document).ready(function() {
            var element = $("#kartu");

            $("#download").on('click', function() {

                html2canvas(element, {
                    onrendered: function(canvas) {
                        var imageData = canvas.toDataURL("image/jpg");
                        var newData = imageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
                        $("#download").attr("download", "image.jpg").attr("href", newData);
                    }
                });

            });
        });
    </script>
</body>

</html>