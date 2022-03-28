<?php

    require_once('config.php');
    // Program to display URL of current page.
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else $link = "http";

    // Here append the common URL characters.
    $link .= "://";

    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];
    if (sizeof(explode('?',$link)) > 1){
        $id = explode('=',explode('?',$link)[1])[1];

        $karyawan = $db->query("SELECT * FROM karyawan WHERE id_karyawan=$id");
        $data_karyawan = $karyawan->fetch();
    }


    

    $jabatan = $db->query("SELECT * FROM jabatan_karyawan");
    $jabatan_arr = $jabatan->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["edit"])){
        $nama_karyawan = filter_input(INPUT_POST, 'nama_karyawan', FILTER_SANITIZE_STRING);
        $jabatan_karyawan = $_POST["jabatan"];
        $id_to_update = $_POST["id"];

        $sql = "UPDATE karyawan set nama_karyawan=:nama_karyawan, jabatan=:jabatan WHERE id_karyawan=$id_to_update";


        $stmt = $db->prepare($sql);

        $saved = $stmt->execute([
            ":nama_karyawan" => $nama_karyawan,
            ":jabatan" => $jabatan_karyawan
        ]);

        if($saved) header('Location:index.php');
        else echo "error";
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
    <form action="edit_karyawan.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $data_karyawan["id_karyawan"]; ?>">
        <label for="nama_karyawan">Nama Karyawan:</label>
        <input type="text" id="nama_karyawan" name="nama_karyawan" value="<?php echo $data_karyawan["nama_karyawan"]; ?>"><br>
        <label for="jabatan_karyawan">Jabatan Karyawan:</label>
        <select name="jabatan" id="jabatan_karyawan" name="jabatan">
            <?php foreach($jabatan_arr as $jabatan){ ?>
                <option value='<?php echo $jabatan["jabatan"] ?>'><?php echo $jabatan["jabatan"]; ?></option>
            <?php } ?>
        </select><br>
        <input type="submit" value="edit" name="edit">
    </form>
</body>
</html>