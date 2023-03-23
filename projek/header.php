<?php

require 'connect.php';

$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website <?= $d->nama ?></title>
    <link rel="stylesheet" href="assets/css/styleb.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="header-logo">
                <img src="uploads/identitas/<?= $d->logo ?>" width="70px">
                <h2><?= $d->nama ?></h2>

            </div>
            <ul class="header-menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="jurusan.php">Jurusan</a></li>
                <li><a href="tentang.php">Tentang Sekolah</a></li>
                <li><a href="kontak.php">Kontak</a></li>
            </ul>
        </div>
    </div>
