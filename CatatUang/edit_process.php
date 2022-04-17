<?php
// sambungkan dengan config
require_once('config.php');
require_once "auth.php";
if (isset($_POST["edit"])) {

    $edit_id = $_POST['id'];

    // ambil nama
    $nama = filter_input(INPUT_POST, 'Nama', FILTER_SANITIZE_STRING);

    // ambil datetime hari ini
    $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

    // format tanggalnya
    $tanggal = $date->format('y-m-d H:i:s');

    // Jenis
    $jenis = $_POST["Jenis"];

    // Nominal
    $nominal = filter_input(INPUT_POST, 'Nominal', FILTER_VALIDATE_INT);

    // Catatan
    $catatan = filter_input(INPUT_POST, 'Catatan', FILTER_SANITIZE_STRING);

    // query SQL untuk update table

    $sql = "UPDATE catatan set Nama_barang=:nama, Tanggal=:tanggal, Jenis=:jenis, Nominal=:nominal, Catatan=:catatan WHERE ID_catatan=$edit_id";


    $stmt = $db->prepare($sql);

    $saved = $stmt->execute([
        ":nama" => $nama,
        ":tanggal" => $tanggal,
        ":jenis" => $jenis,
        ":nominal" => $nominal,
        ":catatan" => $catatan
    ]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit process</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="assets/vendors/sweetalert2/sweetalert2.min.js"></script>
</head>

<body>
    <?php
    if ($saved) {
        echo "
                <script type='text/javascript'>
                swal.fire(
                    'Sukses',
                    'Berhasil diedit!',
                    'success',
                    
                ).then(function(){
                    window.location.replace('index.php');
                });
                    
                    
                    
                </script>";
    }
    ?>
</body>

</html>