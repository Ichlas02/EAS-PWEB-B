<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];

// Ambil Data yang Dikirim dari Form
$nis = $_POST['nik'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$tgl = $_POST['tgl'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kotakelahiran = $_POST['kotakelahiran'];

// Ambil data foto yang dipilih dari form
$berkas = $_FILES['berkas']['name'];
$tmpberkas = $_FILES['berkas']['tmp_name'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotoktp = $_FILES['fotoktp']['name'];
$tmpktp = $_FILES['fotoktp']['tmp_name'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(empty($foto) || empty($fotoktp) || empty($berkas)){ // Jika user tidak memilih file foto pada form
	// Lakukan proses update tanpa mengubah fotonya
	// Proses ubah data ke Database
	$sql = $pdo->prepare("UPDATE siswa SET nis=:nis, nama=:nama, jenis_kelamin=:jk, telp=:telp, email=:email, kotakelahiran=:kotakelahiran, tgl=:tgl WHERE id=:id");
	$sql->bindParam(':nis', $nis);
	$sql->bindParam(':nama', $nama);
	$sql->bindParam(':jk', $jenis_kelamin);
	$sql->bindParam(':telp', $telp);
	$sql->bindParam(':email', $email);
	$sql->bindParam(':kotakelahiran', $kotakelahiran);
	$sql->bindParam(':tgl', $tgl);
	$sql->bindParam(':id', $id);
	$execute = $sql->execute(); // Eksekusi / Jalankan query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: index.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user memilih foto / mengisi input file foto pada form
	// Lakukan proses update termasuk mengganti foto sebelumnya
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$berkasbaru = date('dmYHis').$berkas;
	$fotobaru = date('dmYHis').$foto;
	$fotoktpbaru = date('dmYHis').$fotoktp;

	// Set path folder tempat menyimpan fotonya
	$path = "foto/".$fotobaru;
	$pathktp = "fotoktp/".$fotoktpbaru;
	$pathberkas = "berkas/".$berkasbaru;

	// Proses upload
	if(move_uploaded_file($tmp, $path) && move_uploaded_file($tmpktp, $pathktp) && move_uploaded_file($tmpberkas, $pathberkas)){ // Cek apakah gambar berhasil diupload atau tidak
		// Query untuk menampilkan data siswa berdasarkan ID yang dikirim
		$sql = $pdo->prepare("SELECT foto FROM siswa WHERE id=:id");
		$sql->bindParam(':id', $id);
		$sql->execute(); // Eksekusi query insert
		$data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql

		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("foto/".$data['foto'])) // Jika foto ada
			unlink("foto/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images

		if(is_file("fotoktp/".$data['fotoktp']))
		unlink("fotoktp/".$data['fotoktp']);

		if(is_file("berkas/".$data['berkas']))
		unlink("berkas/".$data['berkas']);

		// Proses ubah data ke Database
		$sql = $pdo->prepare("UPDATE siswa SET nis=:nis, nama=:nama, jenis_kelamin=:jk, telp=:telp, email=:email, kotakelahiran=:kotakelahiran, tgl=:tgl, foto=:foto, fotoktp=:fotoktp, berkas=:berkas WHERE id=:id");
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
		$sql->bindParam(':id', $id);
		$execute = $sql->execute(); // Eksekusi / Jalankan query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: index.php"); // Redirect ke halaman index.php
		}else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}
?>
