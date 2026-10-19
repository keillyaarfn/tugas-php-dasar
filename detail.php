<?php
require 'fungsi.php';

// Ambil data dari URL (GET), beri nilai kosong jika tidak ada
$nim     = $_GET['nim']     ?? '';
$nama    = $_GET['nama']    ?? '';
$jurusan = $_GET['jurusan'] ?? '';
$email   = $_GET['email']   ?? ''; 
$nilai   = isset($_GET['nilai']) ? (int) $_GET['nilai'] : null;

$dataLengkap = ($nim !== '' && $nama !== '' && $nilai !== null);

if ($dataLengkap) {
    $grade  = hitungGrade($nilai);
    $status = tentukanStatus($nilai);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card sempit">
    <h1>Detail Mahasiswa</h1>

    <?php if ($dataLengkap): ?>
        <div class="baris"><strong>NIM:</strong> <?= e($nim) ?></div>
        <div class="baris"><strong>Nama:</strong> <?= e($nama) ?></div>
        <div class="baris"><strong>Jurusan:</strong> <?= e($jurusan) ?></div>
        <div class="baris"><strong>Email:</strong> <?= e($email) ?></div>
        <div class="baris"><strong>Nilai:</strong> <?= $nilai ?></div>
        <div class="baris"><strong>Grade:</strong> <?= $grade ?></div>
        <div class="baris"><strong>Status:</strong> <?= $status ?></div>
    <?php else: ?>
        <p class="error">Data mahasiswa tidak ditemukan.</p>
    <?php endif; ?>

    <div class="aksi">
        <a class="btn" href="index.php">Kembali</a>
    </div>
</div>
</body>
</html>
