<?php
require 'fungsi.php';

// Data mahasiswa disimpan dalam array asosiatif
$mahasiswa = [
    ['nim' => '25001', 'nama' => 'Jeno Lee',  'jurusan' => 'Pendidikan Sistem dan Teknologi Informasi', 'email' => 'jeno@upi.edu', 'nilai' => 88],
    ['nim' => '25002', 'nama' => 'Na Jaemin',  'jurusan' => 'Sistem Telekomunikasi',                     'email' => 'jaemin@upi.edu', 'nilai' => 76],
    ['nim' => '25003', 'nama' => 'Ning ning', 'jurusan' => 'Mekatronika dan Kecerdasan Buatan',         'email' => 'ningning@upi.edu', 'nilai' => 67],
    ['nim' => '25004', 'nama' => 'Giselle', 'jurusan' => 'Pendidikan Sistem dan Teknologi Informasi', 'email' => 'gisele@upi.edu', 'nilai' => 92],
    ['nim' => '25005', 'nama' => 'Jennie',   'jurusan' => 'Sistem Telekomunikasi',                     'email' => 'jennie@upi.edu', 'nilai' => 58],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
    <div class="header">
        <div>
            <h1>Daftar Mahasiswa</h1>
            <p class="sub">Mini Website PHP Dasar</p>
        </div>
        <a class="btn" href="form_pesan.php">Isi Form Pesan</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Nilai</th>
                <th>Grade</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($mahasiswa as $i => $m): ?>
            <?php
                $grade  = hitungGrade($m['nilai']);
                $status = tentukanStatus($m['nilai']);
                // Data dikirim lewat URL (metode GET) ke detail.php
                $query  = http_build_query([
                    'nim'     => $m['nim'],
                    'nama'    => $m['nama'],
                    'jurusan' => $m['jurusan'],
                    'email'   => $m['email'],
                    'nilai'   => $m['nilai'],
                ]);
            ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= e($m['nim']) ?></td>
                <td><?= e($m['nama']) ?></td>
                <td><?= e($m['jurusan']) ?></td>
                <td><?= $m['nilai'] ?></td>
                <td><?= $grade ?></td>
                <td class="<?= kelasStatus($status) ?>"><?= $status ?></td>
                <td><a class="btn" href="detail.php?<?= $query ?>">Lihat Detail</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
