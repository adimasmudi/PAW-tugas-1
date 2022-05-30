<?php
require_once 'config.php';

if (isset($_POST["edit"])) {
    $edit_id = $_POST['id'];
    // ambil nama
    $nrp = filter_input(INPUT_POST, 'nrp', FILTER_VALIDATE_INT);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);

    // ambil nama
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    // ambil nama
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);

    $sql = "UPDATE tbl_mahasiswa set NRP=:nrp,nama=:nama, email=:email, alamat=:alamat WHERE id=$edit_id";
    $stmt = $db->prepare($sql);

    $saved = $stmt->execute([
        ":nrp" => $nrp,
        ":nama" => $nama,
        ":email" => $email,
        ":alamat" => $alamat
    ]);

    if ($saved) header('Location:index.php');
}
