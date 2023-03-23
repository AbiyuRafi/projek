<?php
session_start();
require 'connect.php';
if (isset($_SESSION["username"])) {
        echo "<script>
        window.location.href = 'admin/index.php';</script>";
}

if(isset($_GET['msg'])){
    echo $_GET['msg'];
}
if (isset($_POST['submit'])) {
    $username = mysqli_escape_string($conn,$_POST['username']);
    $pass = md5($_POST['password']);
    
    $sql = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$pass'";
    $hasil =  mysqli_query($conn,$sql);

    if(mysqli_num_rows($hasil) > 0) {
        $_SESSION['username'] = $username;
        echo "<script> window.location.href = 'admin/index.php';
        </script>";
    } else {
        echo "<script> alert('username atau password salah');
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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
        <h3>Login</h3>
        <input type="text" name="username" required placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <input type="submit" name="submit" value="Login" class="form-btn">
        </form>
    </div>
</body>

</html>