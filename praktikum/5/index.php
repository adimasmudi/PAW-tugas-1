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

  <title>Data Mahasiswa</title>
  <style>
    table,
    tr,
    td {
      border: 1px solid black;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Modul 5 PHP & MYSQL</h1> <a href="tambah.php" class="btn btn-primary">Tambah</a>
    <div class="row pt-5">
      <div class="col-6">
        <table>
          <?php
          $data = $db->query("SELECT * FROM tbl_mahasiswa");
          $data_arr = $data->fetchAll(PDO::FETCH_ASSOC);

          if (sizeof($data_arr) > 0) {
          ?>
            <tr>
              <th>No</th>
              <th>NRP</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Operasi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($data_arr as $data) {
            ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $data['NRP']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['email']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td>
                  <a href="edit.php?id=<?php echo $data['id']; ?>" class="card-link btn btn-success">Edit</a>
                  <a href="hapus.php?id=<?php echo $data['id']; ?>" class="card-link btn btn-danger">Hapus</a>
                </td>
              </tr>

          <?php $no++;
            }
          } else {
            echo "tidak ada data";
          } ?>
        </table>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>