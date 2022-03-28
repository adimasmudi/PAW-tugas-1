<?php
    require_once('config.php');
    $karyawan = $db->query("SELECT * FROM karyawan");
    $karyawan_arr = $karyawan->fetchAll(PDO::FETCH_ASSOC);

    // print_r($karyawan_arr);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba dulu gan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table, tr, th, td{
            border:1px solid black;
            margin:5px;
        }
    </style>
</head>
<body>
    <a href="add_karyawan.php"><button>tambah karyawan</button></a>
    <a href="add_pekerjaan.php"><button>tambah pekerjaan</button></a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>jabatan</th>
        </tr>
        <?php
            $no = 1;
            foreach($karyawan_arr as $karyawan){
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $karyawan["nama_karyawan"]; ?></td>
            <td><?php echo $karyawan["jabatan"]; ?></td>
            <td><a href="edit_karyawan.php?id=<?php echo $karyawan["id_karyawan"]; ?>" style="color:blue">Edit</a></td>
            <td><a href="hapus_karyawan.php?id=<?php echo $karyawan["id_karyawan"]; ?>" style="color:red">Hapus</a></td>
        </tr>

        <?php $no++; } ?>
    </table>
</body>
</html>