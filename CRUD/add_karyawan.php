<?php

    require_once('config.php');

    $jabatan = $db->query("SELECT * FROM jabatan_karyawan");
    $jabatan_arr = $jabatan->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["tambah"])){
        $nama_karyawan = filter_input(INPUT_POST, 'nama_karyawan', FILTER_SANITIZE_STRING);
        $jabatan_karyawan = $_POST["jabatan"];

        $sql = "INSERT into karyawan (nama_karyawan, jabatan) VALUES (:nama_karyawan, :jabatan)";

        $stmt = $db->prepare($sql);

        $saved = $stmt->execute([
            ":nama_karyawan" => $nama_karyawan,
            ":jabatan" => $jabatan_karyawan
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
    <title>Tambah Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Karyawan</h1>
    <form action="add_karyawan.php" method="POST">
        <label for="nama_karyawan">Nama Karyawan:</label>
        <input type="text" id="nama_karyawan" name="nama_karyawan"><br>
        <label for="jabatan_karyawan">Jabatan Karyawan:</label>
        <select name="jabatan" id="jabatan_karyawan" name="jabatan">
            <?php foreach($jabatan_arr as $jabatan){ ?>
                <option value='<?php echo $jabatan["jabatan"] ?>'><?php echo $jabatan["jabatan"]; ?></option>
            <?php } ?>
        </select><br>
        <input type="submit" value="tambah" name="tambah">
    </form>
</body>
</html>