<html>
<head>
	<title>CRUD Download PDF</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1 style="text-align:center; padding:20px;">Data Siswa</h1>
	<div style="text-align:center;">
	<a href="form_simpan.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
	<a href="proses-unduh-pdf.php"><button type="button" class="btn btn-primary">Download PDF</button></a>
	</div><br><br>
	<table border="1" width="100%">
	<tr>
		<th>Foto</th>
		<th>NIS</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Kota Kelahiran</th>
		<th>Tanggal Lahir</th>
		<th>Email</th>
		<th>Telepon</th>
		<th>Foto KTP</th>
		<th>File Berkas</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";

	// Buat query untuk menampilkan semua data siswa
	$sql = $pdo->prepare("SELECT * FROM siswa");
	$sql->execute(); // Eksekusi querynya

	while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		echo <<<SISWA
			<tr>
				<td><img src="foto/{$data['foto']}" width="90" height="120"></td>
				<td>{$data['nis']}</td>
				<td>{$data['nama']}</td>
				<td>{$data['jenis_kelamin']}</td>
				<td>{$data['kotakelahiran']}</td>
				<td>{$data['tgl']}</td>
				<td>{$data['email']}</td>
				<td>{$data['telp']}</td>
				<td><img src="fotoktp/{$data['fotoktp']}" width="160" height="90"></td>
				<td><a href="berkas/{$data['berkas']}">Download berkas</a></td>
				<td><a href="form_ubah.php?id={$data['id']}">Ubah</a></td>
				<td><a href="proses_hapus.php?id={$data['id']}">Hapus</a></td>
			</tr>
		SISWA;
		// echo "<tr>";
		// echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
		// echo "<td>".$data['nis']."</td>";
		// echo "<td>".$data['nama']."</td>";
		// echo "<td>".$data['jenis_kelamin']."</td>";
		// echo "<td>".$data['telp']."</td>";
		// echo "<td><a href='form_ubah.php?id=".$data['id']."'>Ubah</a></td>";
		// echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
		// echo "<td><img src='images/".$data['fotoktp']."' width='100' height='100'></td>";
		// echo "</tr>";
	}
	?>
	</table>
</body>
</html>
