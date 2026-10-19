<?php
// Fungsi bantu yang dipakai index.php dan detail.php

function hitungGrade(int $nilai): string
{
    if ($nilai >= 85) return 'A';
    if ($nilai >= 70) return 'B';
    if ($nilai >= 60) return 'C';
    return 'D';
}

function tentukanStatus(int $nilai): string
{
    // Lulus jika nilai minimal 70 (grade B ke atas)
    return $nilai >= 70 ? 'Lulus' : 'Tidak Lulus';
}

function kelasStatus(string $status): string
{
    return $status === 'Lulus' ? 'lulus' : 'tidak-lulus';
}

// Singkat untuk escape output HTML
function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}
