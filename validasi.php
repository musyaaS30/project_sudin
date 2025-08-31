<?php

require_once __DIR__ . '/config/auth.php';

if(isset($_POST['btn'])) {
    validateNPSN();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="npsn" placeholder="masukkan npsn">
        <input type="text" name="nama_lembaga" placeholder="masukkan nama lembaga">
        <button type="submit" name="btn">Masuk</button>
    </form>
</body>
</html>