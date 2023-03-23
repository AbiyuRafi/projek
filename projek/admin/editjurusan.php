<?php
require 'header.php';
if (isset($_POST['submit'])) {
    $nama = addslashes(ucwords($_POST['nama']));
    $ket =addslashes($_POST['keterangan']);

    if ($_FILES['gambar']['name'] != '') {

        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_error = $_FILES['gambar']['error'];
        if ($gambar_error == UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/jurusan/';
            $upload_file = $upload_dir . $gambar;
            move_uploaded_file($gambar_tmp, $upload_file);
            if (file_exists("../uploads/jurusan/".$_POST['gambar2'])) {
                unlink("../uploads/jurusan/".$_POST['gambar2']);
            }
        }
    } else {
        echo 'Gambar gagal diganti';
        $gambar = $_POST['gambar2'];
    }
    $sql = mysqli_query($conn, "UPDATE jurusan SET 
  nama = '" . $nama . "',
  keterangan = '" . $ket . "',
  gambar = '" .$gambar . "'
  WHERE id = '" . $_GET['id'] . "'");

    if ($sql) {
        echo "<script> alert('Update data berhasil')
        window.location.href = 'jurusan.php';</script>";
    } else {
        echo "<script> alert('Data gagal diupdate')
        window.location.href = 'editjurusan.php';</script>"
         . mysqli_error($conn);
    }
}
?>
<?php
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan WHERE id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($jurusan) == 0) {
    echo "<script> alert('Data tidak ada')
            window.location.href = 'jurusan.php';</script>";
}
$p = mysqli_fetch_object($jurusan);
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
                    Edit Jurusan
                </div>
                <div class="box-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Jurusan" 
                            value="<?=$p->nama?>" class="input-control" required><br>
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="input-control"> <?= $p->keterangan?>
                            </textarea>       
                            <label>Gambar</label>
                            <input type="file" name="gambar" placeholder="Gambar" class="input-control"><br>
                            <center><img src="../uploads/jurusan/<?= $p->gambar ?>" width="80px" class="image">
                            </center>
                            <input type="hidden" name="gambar2" value="<?= $p->gambar ?>">
                            <input type="submit" name="submit" value="Simpan" class="btn"><br>
                        </div>
                    </form>
                    <button><a href="jurusan.php">Back</a></button>
                </div>
            </div>
        </div>
</body>

</html>