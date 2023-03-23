<?php
require 'header.php';
if (isset($_POST['submit'])) {
    $nama = ucwords($_POST['nama']);
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = mysqli_query($conn, "UPDATE pengguna SET 
  nama = '" . $nama . "',
  username = '" . $user . "',
  password = '" . MD5($pass) . "'
  WHERE id = '" . $_GET['id'] . "'");

    if ($sql) {
        echo "<script> alert('Update data berhasil')
        window.location.href = 'pengguna.php';</script>";
    } else {
        echo "data gagal ditambah" . mysqli_error($conn);
    }
}
?>
<?php
$pengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '" . $_GET['id'] . "'");
if(mysqli_num_rows($pengguna) == 0){
    echo "<script> alert('Data tidak ada')
            window.location.href = 'pengguna.php';</script>";
}
$p = mysqli_fetch_object($pengguna);
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
                    Edit Pengguna
                </div>
                <div class="box-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?= $p->nama ?>" required><br>
                            <input type="text" name="user" placeholder="Username" class="input-control" value="<?= $p->username ?>" required><br>
                            <input type="password" name="pass" placeholder="Password" class="input-control" value="<?= $p->password ?>" required><br>
                            <input type="submit" name="submit" value="Simpan" class="btn"><br>
                        </div>
                    </form>
                    <button><a href="pengguna.php">Back</a></button>
                </div>
            </div>
        </div>
</body>

</html>