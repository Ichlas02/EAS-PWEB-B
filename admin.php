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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="./assets/image/logo2.ico" type="image/x-icon">
    <title>Berhasil Login</title>
</head>

<body class="min-h-screen bg-gray-50 dark:bg-gray-800">
<?php
    include("navbar.php");
    ?>
        <section>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            no
                        </th>
                        <th scope="col" class="py-3 px-6">
                            foto
                        </th>
                        <th scope="col" class="py-3 px-6">
                            nama
                        </th>
                        <th scope="col" class="py-3 px-6">
                            alamat
                        </th>
                        <th scope="col" class="py-3 px-6">
                            nomor hp
                        </th>
                        <th scope="col" class="py-3 px-6">
                            tempat tanggal lahir
                        </th>
                        <th scope="col" class="py-3 px-6">
                            asal
                        </th>
                        <th scope="col" class="py-3 px-6">
                            lokasi ujian
                        </th>
                        <th scope="col" class="py-3 px-6">
                            lolos
                        </th>
                        <th scope="col" class="py-3 px-6">
                            tindakan
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user JOIN berkas ON user.id = berkas.user_id ";
                    $query = mysqli_query($db, $sql);
                    while ($data = mysqli_fetch_array($query)) {
                        echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
                        echo "<th class='py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white'>" . $data['id'] . "</th>";
                        echo "<td class='py-4 px-6'><img src='image/". $data['foto'] . "' width='60'></td>";
                        echo "<td class='py-4 px-6'>".$data['nama']."</td>";
                        echo "<td class='py-4 px-6'>".$data['alamat']."</td>";
                        echo "<td class='py-4 px-6'>".$data['no_hp']."</td>";
                        echo "<td class='py-4 px-6'>".$data['ttl']."</td>";
                        echo "<td class='py-4 px-6'>".$data['asal']."</td>";
                        echo "<td class='py-4 px-6'>".$data['lokasi']."</td>";
                        echo "<td class='py-4 px-6'>".$data['lolos']."</td>";

                        echo "<td class='py-4 px-6'>";
                        echo "<a href='setujui.php?id=" . $data['user_id'] . "'>Setujui</a> | ";
                        echo "<a href='hapus.php?id=" . $data['user_id'] . "'>Hapus</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    ?>
        </section>

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>

</html>