<?php 
// Selalu mulai session di awal
session_start();

// Cek apakah session 'user' ada atau tidak
// Jika tidak ada, artinya belum login, maka redirect ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: validasi.php");
    exit();
}

// Jika session ada, kita bisa gunakan datanya
// Untuk gampangnya, kita simpan data user ke dalam variabel
$user = $_SESSION['user'];


if(isset($_POST["pilih"])) {
    if($_POST["pilih_cabang_lkp"] == "Non Pma") {
        header("Location: form_non_pma.php");
        exit;
    } else if($_POST["pilih_cabang_lkp"] == "PMA") {
        header("Location: form_pma.php");
        exit;
    }
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
    <div>
        <p>Lembaga Pendidikan</p>
        <ul>
            <li>NPSN : <?= $user['npsn']; ?></li>
            <li>Nama Lembaga : <?= $user['nama_satuan_pendidikan']; ?></li>
            <li>Alamat : <?= $user['alamat']; ?></li>
            <li>Kecamatan : <?= $user['kecamatan']; ?></li>
            <li>Kelurahan : <?= $user['kelurahan']; ?></li>
            <li>Status : <?= $user['status']; ?></li>
        </ul>
        
    </div>
    <form action="" method="post">
        <select name="pilih_cabang_lkp" id="">
            <option value="Non Pma">Non PMA</option>
            <option value="PMA">PMA</option>
        </select>
        <button type="submit" name="pilih">masuk</button>
    </form>
</body>
</html>