<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nis = $_POST['nik'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$tgl = $_POST['tgl'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kotakelahiran = $_POST['kotakelahiran'];

$berkas = $_FILES['berkas']['name'];
$tmpberkas = $_FILES['berkas']['tmp_name'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotoktp = $_FILES['fotoktp']['name'];
$tmpktp = $_FILES['fotoktp']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$berkasbaru = date('dmYHis').$berkas;
$fotobaru = date('dmYHis').$foto;
$fotoktpbaru = date('dmYHis').$fotoktp;

// Set path folder tempat menyimpan fotonya
$path = "foto/".$fotobaru;
$pathktp = "fotoktp/".$fotoktpbaru;
$pathberkas = "berkas/".$berkasbaru;

if(!move_uploaded_file($tmp, $path) || !move_uploaded_file($tmpktp, $pathktp) || !move_uploaded_file($tmpberkas, $pathberkas)){
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	exit();
}
// Proses upload
// Cek apakah gambar berhasil diupload atau tidak
// Proses simpan ke Database
$sql = $pdo->prepare("INSERT INTO siswa(nis, nama, jenis_kelamin, telp, email, kotakelahiran, tgl, foto, fotoktp, berkas) VALUES(:nis,:nama,:jk,:telp, :email, :kotakelahiran, :tgl, :foto, :fotoktp, :berkas)");
$sql->bindParam(':nis', $nis);
$sql->bindParam(':nama', $nama);
$sql->bindParam(':jk', $jenis_kelamin);
$sql->bindParam(':telp', $telp);
$sql->bindParam(':email', $email);
$sql->bindParam(':kotakelahiran', $kotakelahiran);
$sql->bindParam(':tgl', $tgl);
$sql->bindParam(':foto', $fotobaru);
$sql->bindParam(':fotoktp', $fotoktpbaru);
$sql->bindParam(':berkas', $berkasbaru);
$sql->execute(); // Eksekusi query insert

if(!$sql){
	echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	exit();
}
// Redirect ke halaman index.php
header("location: index.php");
?>
