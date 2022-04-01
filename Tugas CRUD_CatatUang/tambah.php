<?php
    // sambungkan dengan config
    require_once('config.php');

    // cek apakah sudah submit form
    if(isset($_POST['tambah'])){
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

        $sql = "INSERT into tbl_160 (Nama, Tanggal, Jenis, Nominal, Catatan) VALUES (:nama, :tanggal, :jenis, :nominal, :catatan)";

        $stmt = $db->prepare($sql);

        $saved = $stmt->execute([
            ":nama" => $nama,
            ":tanggal" => $tanggal,
            ":jenis" => $jenis,
            ":nominal" => $nominal,
            ":catatan" => $catatan
        ]);

        if($saved) header('Location:index.php');
        

         
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan Keuangan</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/form.css">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            
            <h1 class="auth-title">Tambah</h1>
            <p class="auth-subtitle mb-5">Tambah Catatan Keuangan</p>

            <form action="#" method="POST">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Nama" name="Nama">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                
                <div class="form-group position-relative has-icon-left mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Jenis" id="flexRadioDefault1" value="Pemasukan">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Pemasukan
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="Jenis" id="flexRadioDefault2" value="Pengeluaran" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          Pengeluaran
                        </label>
                      </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="number" class="form-control form-control-xl" placeholder="Nominal (Rp)" name="Nominal">
                    <div class="form-control-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="Catatan"></textarea>
                        <label for="floatingTextarea2">Catatan</label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" value="Tambah" name="tambah"/>
            </form>
            
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
