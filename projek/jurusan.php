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
<style>

</style>

<body>
    <div class="section" id="tentang">
        <div class="container">
            <h3 class="text-center">Jurusan</h3>
            <?php
            $jurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC LIMIT 8");
            if (mysqli_num_rows($jurusan) > 0) {
                while ($j = mysqli_fetch_array($jurusan)) {
            ?>
                    <div class="col-4">
                        <a href="detail-jurusan.php?id=<?= $j['id'] ?>" class="thumbnail-link">
                            <div class="thumbnail-box">
                                <div class="thumbnail-img" style="background-image: url('uploads/jurusan/<?= $j['gambar'] ?>');">

                                </div>
                                <div class="thumbnail-text">
                                    <?= $j['nama'] ?>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php
                }
            } else { ?>
                Tidak ada Data
            <?php } ?>
        </div>
    </div>
</body>

</html>