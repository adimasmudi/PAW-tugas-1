<?php
require_once 'config.php';

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
    <h1>Kartu identitas</h1> <a href="tambah.php" class="btn btn-primary">Tambah</a>
    <div class="row pt-5">
      <div class="col-6">
        <?php
        $data = $db->query("SELECT * FROM tbl_adi");
        $data_arr = $data->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($data_arr) > 0) {
          foreach ($data_arr as $data) {
        ?>
            <div class="card" style="width: 18rem;display:inline-block">
              <div class="card-body">
                <h5 class="card-title">Identitas saya</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Nama saya adalah : <?php echo $data["nama_adi"]; ?> </li>
                <li class="list-group-item">Email : <?php echo $data["email_adi"]; ?> </li>
                <li class="list-group-item">Alamat : <?php echo $data["alamat_adi"]; ?> </li>
              </ul>
              <div class="card-body">
                <a href="edit.php?id=<?php echo $data['id_adi']; ?>" class="card-link btn btn-success">Edit</a>
                <a href="hapus.php?id=<?php echo $data['id_adi']; ?>" class="card-link btn btn-danger">Hapus</a>
              </div>
            </div>
        <?php }
        } else {
          echo "tidak ada data";
        } ?>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>