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
           
            <h3 class="text-center">Tentang Sekolah</h3>
           <img src="uploads/identitas/<?=$d->foto_sekolah?>" width="60%" height="40%" class="image">
           <p><?=$d->tentang_sekolah?></p>
        </div>
    </div>
</body>

</html>