<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
// $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78);
$pdf->Cell(190,7,'Institut Teknonologi Sepuluh Nopember',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Daftar Mahasiswa Teknik Informatika ITS',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'Foto',1,0); 
$pdf->Cell(28,6,'NIK',1,0);
$pdf->Cell(50,6,'Nama Mahasiswa',1,0);
$pdf->Cell(20,6,'Gender',1,0);
$pdf->Cell(40,6,'Alamat',1,0);
$pdf->Cell(32,6,'Nomor Telepon',1,0);
$pdf->Cell(10,6,'',0,1);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$sql = $pdo->prepare("SELECT * FROM siswa");
$sql->execute(); // Eksekusi querynya
while($data = $sql->fetch()){
    
    // $pdf->Cell(16, 6, $data["id"], 1, 0, "C");
    $pdf->Cell(20, 20, $pdf->Image("foto/".$data['foto'], $pdf->GetX(), $pdf->GetY(), 20, 20), 1, 0);
    $pdf->Cell(28, 20, $data["nis"], 1, 0);
    $pdf->Cell(50, 20, $data["nama"], 1, 0);
    $pdf->Cell(20, 20, $data["jenis_kelamin"], 1, 0);
    $pdf->Cell(40, 20, $data["email"],  1,  0,);
    $pdf->Cell(32, 20, $data["telp"],  1,  0,);
    $pdf->Cell(10,20,'',0,1);
}

$pdf->Output();
?>