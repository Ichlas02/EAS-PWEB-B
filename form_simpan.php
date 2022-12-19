<html>
	<head>
		<title>Validasi Form dengan JQuery Validation - Achmatim.Net</title>
		<link rel="stylesheet" href="style.css">
		<!-- <style type="text/css">
		.labelfrm {
			display:block;
			font-size:small;
			margin-top:5px;
		} .error { font-size:small; color:red; }
		</style> -->
        <script type="text/javascript" src="jquery/jquery.min.js"></script>
        <script type="text/javascript" src="jquery/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#frm-mhs').validate({
                    rules: {
                        	nik: {
                            digits: true,
                            minlength: 16,
                            maxlength: 16,
                            },
							telp: {
                            digits: true,
                            minlength: 12,
                            maxlength: 14,
                            },
                            tgl: {
                            // indonesianDate: true,
							required: true,
                            },
                            email: {
                            email: true,
                            },
							berkas: {
							required: true,
							extension: "pdf"
							},
							jenis_kelamin: {
							required: true
							}
                    },
                    messages: {
                        	nik: {
                            required: "NIK harus diisi",
                            minlength: "NIK harus terdiri dari 16 digit",
                            maxlength: "NIK harus terdiri dari 16 digit",
                            },
                            nama: {
                            required: "Nama harus diisi",
                            },
							jenis_kelamin: {
                            required: "Jenis kelamin harus diisi",
                            },
							telp: {
                            required: "Nomor Handphone harus diisi",
                            minlength: "Nomor Handphone minimal harus terdiri dari 12 digit",
                            maxlength: "Nomor Handphone maksimal harus terdiri dari 14 digit",
                            },
                            kotakelahiran: {
                            required: "Kota kelahiran harus diisi",
                            },
                            tgl: {
                            required: "Tanggal lahir harus diisi",
                            },
                            email: {
                            required: "Alamat email harus diisi",
                            email: "Format alamat email tidak valid",
                            },
							foto: {
                            required: "Foto harus diisi",
                            },
							fotoktp: {
                            required: "Foto KTP harus diisi",
                            },
							berkas: {
							required: "Berkas wajib diisi",
							},
                    }
                });
            });
            // $.validator.addMethod(
            //     "indonesianDate",
            //     function (value, element) {
            //     return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
            //     },
            //     "Masukkan sesuai format DD/MM/YYYY"
            // );
            </script>
	</head>
	<body>
		<h1>Input Data Calon Peserta CPNS</h1>
		<div class="d-flex justify-content-center mt-4">
            <form action="proses_simpan.php" method="post" id="frm-mhs" enctype="multipart/form-data">
			<table cellpadding="8">
				<tr><td>
                <label for="nama" class="labelfrm">Username: </label>
                <input type="text" name="nama" id="nama" size="50" class="required" placeholder="Masukkan nama" />
				</td></tr>

				<tr><td>
				<label for="nik" class="labelfrm">NIK: </label>
                <input type="text" name="nik" id="nik" maxlength="16" class="required" size="50" placeholder="Masukkan NIK" />
				</td></tr>

				<tr><td>
				<label class="labelfrm">Jenis Kelamin: </label>
				<input type="radio" name="jenis_kelamin" id="laki" value="Laki-laki"><label for="laki">Laki-laki</label>
				<input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"><label for="perempuan">Perempuan</label>

				<tr><td>
                <label for="kotakelahiran" class="labelfrm">Kota Kelahiran: </label>
                <input name="kotakelahiran" id="kotakelahiran" cols="50" rows="4" class="required" placeholder="Masukkan Kota Kelahiran"></input>
				</td></tr>

				<tr><td>
                <label for="tgl" class="labelfrm">Tanggal Lahir: </label>
                <input type="date" name="tgl" id="tgl" maxlength="10" size="50" class="required"/>
				</td></tr>

				<tr><td>
                <label for="email" class="labelfrm">Email: </label>
                <input type="text" name="email" id="email" size="50" class="required" placeholder="email@gmail.com" />
				</td></tr>

				<tr><td>
				<label for="telp" class="labelfrm">Nomor Handphone: </label>
                <input type="text" name="telp" id="telp" maxlength="14" class="required" size="50" placeholder="Masukkan Nomor Handphone" />
				</td></tr>

				<tr><td>
				<label for="foto" class="labelfrm">Pas foto: </label>
				<input type="file" class="required" name="foto" id="foto" accept=".png,.jpg,.jpeg" />
				</td></tr>

				<tr><td>
				<label for="fotoktp" class="labelfrm">Foto KTP: </label>
				<input type="file" class="required" name="fotoktp" id="fotoktp" accept=".png,.jpg,.jpeg" />
				</td></tr>

				<tr><td>
				<label for="berkas" class="labelfrm">Upload Berkas: </label>
				<input type="file" class="required" name="berkas" id="berkas" accept=".pdf"/>
				</td></tr>

				</table>

                <div class="d-flex align-items-center justify-content-center">
				<input type="submit" value="Simpan">
				<a href="index.php"><input type="button" value="Batal"></a>
                </div>
            </form>
        </div>
	</body>
</html>




<!-- <html>
<head>
	<title>Aplikasi CRUD dengan PHP</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Tambah Data Siswa</h1>
	<form method="post" action="proses_simpan.php" enctype="multipart/form-data">
	<table cellpadding="8">
	<td>
		<td>NIS</td>
		<td><input type="text" name="nis"></td>
	</td>
	<td>
		<td>Nama</td>
		<td><input type="text" name="nama"></td>
	</td>
	<td>
		<td>Jenis Kelamin</td>
		<td>
		<input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
		<input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
		</td>
	</td>
	<td>
		<td>Telepon</td>
		<td><input type="text" name="telp"></td>
	</td>
	<td>
		<td>Alamat</td>
		<td><textarea name="alamat"></textarea></td>
	</td>
	<td>
		<td>Foto</td>
		<td><input type="file" name="foto"></td>
	</td>
	</table>
	
	<hr>
	<input type="submit" value="Simpan">
	<a href="index.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html> -->
