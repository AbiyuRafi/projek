<?php
session_start();
require '../connect.php';

if ($_SESSION['username'] == '') {
    echo "<script>window.location.href = '../login.php';</script>";
}

$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin- <?= $d->nama ?></title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


</head>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>

<body>
    <div class="navbar">
        <div class="container">
            <h2 class="nav-brand"> <?= $d->nama ?></h2>

            <ul class="nav-menu">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="pengguna.php">Pengguna</a></li>
                <li><a href="jurusan.php">Jurusan</a></li>
                <li class="dropdown">
                    <a href="">Pengaturan</a>
                    <!-- sub-menu -->
                    <ul>
                        <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                        <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                    </ul>
                </li>
                <li class=dropdown>
                    <a href="">Akun</a>
                    <!-- sub-menu -->
                    <ul>
                        <li><a href="logout.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    </div>
</body>

</html>