<?php

require_once('config.php');
require_once "auth.php";
$id = $_GET['id'];

$sql = "DELETE FROM catatan WHERE ID_catatan=$id";
$stmt = $db->prepare($sql);
$saved = $stmt->execute();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
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
                    'Berhasil dihapus!',
                    'success',
                    
                ).then(function(){
                    window.location.replace('index.php');
                });
                </script>";
    }

    ?>

</body>

</html>