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