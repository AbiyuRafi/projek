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
    <div class="banner" style="background-image: url('uploads/identitas/<?= $d->foto_sekolah ?>');">
        <div class="banner-text">
            <div class="container">
                <h3><?= $d->nama ?></h3>
                <p>Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah.</p>
            </div>
        </div>
    </div>

    <div class="section" id="jurusan">
        <div class="container text-center">
            <h3>Jurusan</h3>
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

    <div class="section">
        <div class="container">

            <h3 class="text-center">Tentang Sekolah</h3>
            <img src="uploads/identitas/<?= $d->foto_sekolah ?>" width="60%" height="40%" class="image">
            <p><?= $d->tentang_sekolah ?></p>
        </div>
    </div>
    
    <center>
    <div class="section" id="kontak">
        <div class="container">
            <h3 class="text-center">Kontak</h3>
                <div class="coll-4">
                    <p><b> Alamat :</b><br><?= $d->alamat?></p><br>
                    <p><b> Telepon :</b><br><?= $d->telepon?></p><br>
                </div>
                <div class="box-gmaps">
                   <iframe src="<?= $d->google_maps?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
        </div>
    </div>
</center>
</body>

</html>