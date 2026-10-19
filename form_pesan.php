<?php
require 'fungsi.php';

// Jika redirect dari hasil_pesan.php karena validasi gagal
$pesanError = $_GET['error'] ?? '';
?> 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pesan Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card sempit">
    <h1>Form Pesan Mahasiswa</h1>

    <?php if ($pesanError !== ''): ?>
        <p class="error"><?= e($pesanError) ?></p>
    <?php endif; ?>

    <form action="hasil_pesan.php" method="post">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required>

        <label for="kelas">Kelas</label>
        <input type="text" id="kelas" name="kelas" required>

        <label for="pesan">Pesan / Kesan</label>
        <textarea id="pesan" name="pesan" required></textarea>

        <div class="aksi">
            <button type="submit" class="btn">Kirim</button>
            <a class="btn abu" href="index.php">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>
