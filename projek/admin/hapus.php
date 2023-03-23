<?php
require '../connect.php';

if (isset($_GET['idpengguna'])) {
    $hapus = mysqli_query($conn,"DELETE FROM pengguna WHERE id = '".$_GET['idpengguna']."'");
    echo "<script> alert('Data berhasil dihapus')
            window.location.href = 'pengguna.php';</script>";
}

if (isset($_GET['idjurusan'])) {

    $jurusan = mysqli_query($conn, "SELECT gambar FROM jurusan WHERE id ='".$_GET['idjurusan']."'");
    if (mysqli_num_rows($jurusan) > 0) {
        $p = mysqli_fetch_object($jurusan);
        if (file_exists("../uploads/jurusan/".$p ->gambar)) {
            unlink("../uploads/jurusan/".$p ->gambar);
        }
    }
    $hapus = mysqli_query($conn,"DELETE FROM jurusan WHERE id = '".$_GET['idjurusan']."'");
    echo "<script> alert('Data berhasil dihapus')
            window.location.href = 'jurusan.php';</script>";
}

if (isset($_GET['idgaleri'])) {

    $galeri = mysqli_query($conn, "SELECT foto FROM galeri WHERE id ='".$_GET['idgaleri']."'");
    if (mysqli_num_rows($galeri) > 0) {
        $p = mysqli_fetch_object($galeri);
        if (file_exists("../uploads/galeri/".$p ->foto)) {
            unlink("../uploads/galeri/".$p ->foto);
        }
    }
    $hapus = mysqli_query($conn,"DELETE FROM galeri WHERE id = '".$_GET['idgaleri']."'");
    echo "<script> alert('Data berhasil dihapus')
            window.location.href = 'galeri.php';</script>";
}

if (isset($_GET['idinformasi'])) {

    $informasi = mysqli_query($conn, "SELECT gambar FROM informasi WHERE id ='".$_GET['idinformasi']."'");
    if (mysqli_num_rows($informasi) > 0) {
        $p = mysqli_fetch_object($informasi);
        if (file_exists("../uploads/informasi/".$p ->gambar)) {
            unlink("../uploads/informasi/".$p ->gambar);
        }
    }
    $hapus = mysqli_query($conn,"DELETE FROM informasi WHERE id = '".$_GET['idinformasi']."'");
    echo "<script> alert('Data berhasil dihapus')
            window.location.href = 'informasi.php';</script>";
}


?>