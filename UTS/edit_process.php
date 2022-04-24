<?php
require_once 'config.php';

if (isset($_POST["edit"])) {
    $edit_id = $_POST['id'];
    // ambil nama
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);

    // ambil nama
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    // ambil nama
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);

    $sql = "UPDATE tbl_adi set nama_adi=:nama, email_adi=:email, alamat_adi=:alamat WHERE id_adi=$edit_id";
    $stmt = $db->prepare($sql);

    $saved = $stmt->execute([
        ":nama" => $nama,
        ":email" => $email,
        ":alamat" => $alamat
    ]);

    if ($saved) header('Location:index.php');
}
