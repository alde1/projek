<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF edit
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
//$pdf->Image('img/logo.png', 5, 5);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);

// mencetak string 
$pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NIM',1,0);
$pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
$pdf->Cell(27,6,'NO HP',1,0);
$pdf->Cell(27,6,'TANGGAL LHR',1,1);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$mahasiswa = mysqli_query($connect, "select * from mahasiswa");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(20,6,$row['nim'],1,0);
    $pdf->Cell(85,6,$row['nama_lengkap'],1,0);
    $pdf->Cell(27,6,$row['no_hp'],1,0);
    $pdf->Cell(27,6,$row['tanggal_lahir'],1,1); 
}

// membuat halaman baru
$pdf->AddPage();
$pdf->Image('img/logo.png', 70, 20, 70);
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);

// mencetak string 
$pdf->Cell(190,7,'POLITEKNIK CALTEX RIAU',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR MATAKULIAH TEKNIK INFORMATIKA',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,20,'',0,10);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'Mata Kuliah',1,0);
$pdf->Cell(85,6,'Kode',1,0);
$pdf->Cell(27,6,'Dosen',1,0);
$pdf->Cell(27,6,'Jam (sks)',1,1);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$mahasiswa = mysqli_query($connect, "select * from matkul");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(25,6,$row['Nama_Matkul'],1,0);
    $pdf->Cell(85,6,$row['Kode_Matkul'],1,0);
    $pdf->Cell(27,6,$row['Dosen_Matkul'],1,0);
    $pdf->Cell(27,6,$row['Jam(sks)'],1,1); 
}
$pdf->SetFont('Arial','B',11);
$pdf->Cell(300,20,'PekanBaru, 02 Juli 2018',0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(300,30,'Alde Thio Fadly',0,1,'C');

$pdf->Output();
?>
