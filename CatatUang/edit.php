<?php
// sambungkan dengan config
require_once('config.php');
require_once "auth.php";
try {
    $id = $_GET['id'];
    $data = $db->query("SELECT * FROM catatan WHERE ID_catatan=$id")->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo '';
}









?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan Keuangan</title>
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

                    <h1 class="auth-title">Edit</h1>
                    <p class="auth-subtitle mb-5">Edit Catatan Keuangan</p>

                    <form action="edit_process.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data["ID_catatan"]; ?>">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Nama Barang" name="Nama" value="<?php echo $data["Nama_barang"]; ?>" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Jenis" id="flexRadioDefault1" <?php echo ($data['Jenis'] == 'Pemasukan' ? 'checked' : ''); ?> value="Pemasukan">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Pemasukan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Jenis" id="flexRadioDefault2" <?php echo ($data['Jenis'] == 'Pengeluaran' ? 'checked' : ''); ?> value="Pengeluaran">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Pengeluaran
                                </label>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" class="form-control form-control-xl" placeholder="Nominal (Rp)" name="Nominal" value="<?php echo $data["Nominal"]; ?>" required>
                            <div class="form-control-icon">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="Catatan"><?php echo $data["Catatan"]; ?></textarea>
                                <label for="floatingTextarea2">Catatan</label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" value="edit" name="edit" />
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