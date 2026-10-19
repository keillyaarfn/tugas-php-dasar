<?php
require 'fungsi.php';
 
// Halaman ini hanya boleh diakses lewat pengiriman form (POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form_pesan.php');
    exit;
}

$nama  = trim($_POST['nama']  ?? '');
$kelas = trim($_POST['kelas'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

// Validasi: semua kolom wajib diisi
if ($nama === '' || $kelas === '' || $pesan === '') {
    header('Location: form_pesan.php?error=' . urlencode('Semua kolom wajib diisi.'));
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Berhasil Dikirim</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card sempit">
    <h1>Pesan Berhasil Dikirim</h1>
    <p>Terima kasih, <strong><?= e($nama) ?></strong>!</p>

    <div class="baris"><strong>Nama:</strong> <?= e($nama) ?></div>
    <div class="baris"><strong>Kelas:</strong> <?= e($kelas) ?></div>
    <div class="baris"><strong>Pesan / Kesan:</strong> <?= nl2br(e($pesan)) ?></div>

    <div class="aksi">
        <a class="btn" href="index.php">Kembali ke Data Mahasiswa</a>
    </div>
</div>
</body>
</html>
