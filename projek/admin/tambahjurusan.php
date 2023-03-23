<?php
require 'header.php';
$conn = mysqli_connect("localhost", "root", "", "db_sekolah");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_error = $_FILES['gambar']['error'];
    if ($gambar_error == UPLOAD_ERR_OK) {
        $upload_dir = '../uploads/jurusan/';
        $upload_file = $upload_dir . $gambar;
        move_uploaded_file($gambar_tmp, $upload_file);
    }

    // Insert data ke database
    $sql = "INSERT INTO jurusan (nama, keterangan, gambar) VALUES ('$nama', '$keterangan', '$gambar')";
    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script> alert('Data berhasil ditambah')
                window.location.href = 'jurusan.php';
                </script>";
    } else {
        echo "<script> alert('Data gagal ditambahkan')
                window.location.href = 'tambahjurusan.php';
                </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="box">
                <div class="box-header">
                    Tambah Jurusan
                </div>
                <div class="box-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Jurusan</label>
                            <input type="text" name="nama" placeholder="Nama Jurusan" class="input-control" required><br>
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="input-control"></textarea>
                            <label>Gambar</label>
                            <center><input type="file" name="gambar" placeholder="Gambar" class="input-control" required><br></center>
                            <input type="submit" name="submit" value="Simpan" class="btn"><br>
                        </div>
                    </form>
                    <button><a href="jurusan.php">Back</a></button>
                </div>
            </div>
        </div>
</body>

</html>