<?php

    require_once "config.php";

    $catatan = $db->query("SELECT * FROM tbl_160");
    $catatan_arr = $catatan->fetchAll(PDO::FETCH_ASSOC);

    // Pagination

    // data per halaman
    $results_per_page = 5;

    // mendapatkan total data di database 
    $total_data = sizeof($catatan_arr);  
  
    // memperoleh total halaman yang ada 
    $number_of_page = ceil ($total_data / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
<link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <style>
        .catatan-table{
            width:70%;
            margin-left: 350px;
            margin-top:100px;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <span class="active">Catat Uang</span>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li
                class="sidebar-item active ">
                <a href="index.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </div>
    </div>
    <!-- Hoverable rows start -->
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card catatan-table">
                    <div class="card-header">
                        <h4 class="card-title">Catatan Keuangan</h4>
                        <a href="tambah.php" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="card-content">
                        
                        <!-- table hover -->
                        <div class="table-responsive">
                            <?php
                                //retrieve the selected results from database   
                                $data_pagination = $db->query("SELECT * FROM tbl_160 LIMIT $page_first_result,$results_per_page");
                                $data_pagination_arr = $data_pagination->fetchAll(PDO::FETCH_ASSOC);
                                
                            ?>
                            <table class="table table-hover mb-0">
                                <?php
                                    if (sizeof($catatan_arr) > 0){
                                ?>
                                
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>TANGGAL</th>
                                            <th>JENIS</th>
                                            <th>NOMINAL</th>
                                            <td>CATATAN</td>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1 + ($results_per_page * ($page - 1));
                                            foreach($data_pagination_arr as $data){
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td class="text-bold-500"><?php echo $data['Nama']; ?></td>
                                                <td><?php echo $data['Tanggal']; ?></td>
                                                <td class="text-bold-500"><?php echo $data['Jenis']; ?></td>
                                                <td>Rp. <?php echo $data['Nominal']; ?></td>
                                                <td><?php echo $data['Catatan']; ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?php echo $data["id"]; ?>" class="btn btn-success">Edit</a>
                                                    <a href="hapus.php?id=<?php echo $data["id"]; ?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                                
                                            </tr>
                                        <?php $no++; } ?>
                                        
                                    </tbody>
                                    <?php

                                    }
                                ?>
                                
                            </table>
                        </div>
                        <?php if(sizeof($catatan_arr) > 5){ ?>
                            <nav aria-label="Page navigation example" class="mt-3">
                                <ul class="pagination pagination-primary  justify-content-center">
                                    <li class="page-item <?php echo $page == 1 ? "disabled" : "" ?>">
                                        <a class="page-link" href="index.php?page=<?php echo $page-1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <?php
                                        for($i=1;$i<=$number_of_page;$i++){
                                    ?>
                                    
                                        <li class="page-item <?php echo $page == $i ? "active" : "" ?>"><a class="page-link" href="#"><?php echo $i; ?></a></li>
                                    <?php
                                        }
                                    
                                    ?>
                                        
                                        
                                    <li class="page-item <?php echo $page == $number_of_page ? "disabled" : "" ?>">
                                        <a class="page-link" href="index.php?page=<?php echo $page+1; ?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hoverable rows end -->
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
<script src="assets/vendors/apexcharts/apexcharts.js"></script>
<script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
</body>

</html>
