<?php

    require_once('config.php');

    if(isset($_POST["tambah"])){
        $nama_pekerjaan = filter_input(INPUT_POST, 'nama_pekerjaan', FILTER_SANITIZE_STRING);
        $gaji = filter_input(INPUT_POST, 'gaji', FILTER_SANITIZE_STRING);

        $sql = "INSERT into jabatan_karyawan (jabatan, gaji) VALUES (:jabatan, :gaji)";

        $stmt = $db->prepare($sql);

        $saved = $stmt->execute([
            ":jabatan" => $nama_pekerjaan,
            ":gaji" => $gaji
        ]);

        if($saved) header('Location:index.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pekerjaan</title>
</head>
<body>
    <h1>Tambah Pekerjaan</h1>
    <form action="add_pekerjaan.php" method="POST">
        <label for="nama_pekerjaan">Nama pekerjaan:</label>
        <input type="text" id="nama_pekerjaan" name="nama_pekerjaan"><br>
        <label for="gaji">Gaji:</label>
        <input type="text" id="gaji" name="gaji"><br>
        <input type="submit" value="tambah" name="tambah">
    </form>
</body>
</html>