<?php
require 'header.php';
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
    <div class="section">
        <div class="container">
            <?php
            $jurusan = mysqli_query($conn, "SELECT * FROM jurusan WHERE id = '" . $_GET['id'] . "'");
            if (mysqli_num_rows($jurusan) == 0) {
            echo "<script>
                window.location.href = 'index.php';
            </script>";
            }
            $p = mysqli_fetch_object($jurusan);
            ?>
            <h3 class="text-center"><?= $p->nama?></h3>
           <img src="uploads/jurusan/<?=$p->gambar?>" width="40%" height="40%" class="image">
           <p><?=$p->keterangan?></p>
        </div>
    </div>
</body>

</html>