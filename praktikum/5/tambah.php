<?php
require_once('config.php');

if (isset($_POST["tambah"])) {
    // ambil nama
    $nrp = filter_input(INPUT_POST, 'nrp', FILTER_VALIDATE_INT);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);

    // ambil nama
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    // ambil nama
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);

    $sql = "INSERT into tbl_mahasiswa (nrp, nama, email, alamat) VALUES (:nrp, :nama, :email, :alamat)";

    $stmt = $db->prepare($sql);

    $saved = $stmt->execute([
        ":nrp" => $nrp,
        ":nama" => $nama,
        ":email" => $email,
        ":alamat" => $alamat
    ]);

    if ($saved) header('Location:index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <h1>Tambah identitas</h1>
        <form action="tambah.php" method="POST">
            <div class="mb-3">
                <label for="nrp" class="form-label">NRP</label>
                <input type="text" class="form-control" id="nrp" name="nrp">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email :</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>