<?php
session_start();

if (empty($_SESSION['login'] == 'masyarakat')) {
    header('Location:../index.php');
}

include '../layouts/header.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'tanggapan':
            include 'tanggapan.php';
            break;

        case 'riwayat':
            include 'riwayat_pengaduan.php';
            break;

        default:
            echo "Halaman tidak tersedia";
            break;
    }
} else {
    include 'home.php';
}

include '../layouts/footer.php';
