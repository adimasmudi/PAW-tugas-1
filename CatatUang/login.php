<?php
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="assets/vendors/sweetalert2/sweetalert2.min.js"></script>


</head>

<body>
    <div class="card outer-form">
        <div class="logo">
            <h1 class="active text-center">Catat Uang</h1>
        </div>
        <div class="toggle-btn-up">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 btn-group d-flex justify-content-center mt-3">
                        <a href="login.php" class="btn btn-active">Login</a>
                        <a href="signup.php" class="btn btn-second">Sign up</a>
                    </div>
                </div>
                <form action="login.php" method="POST">

                    <div class="form-group position-relative has-icon-left mb-4 mt-4">
                        <input type="text" class="form-control form-control-md" placeholder="Username" name="Username" required>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>


                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-md" placeholder="Password" name="Password" required>
                        <div class="form-control-icon">
                            <i class="bi bi-hash"></i>
                        </div>
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-rounded btn-active w-50" name="login">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);

        $sql = 'SELECT * FROM pengguna WHERE ID_pengguna=:username';

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ":username" => $username
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // verifikasi password
            if (password_verify(trim($password), trim($user["Password"]))) {
                // buat Session
                session_start();
                $_SESSION["user"] = $user;
                // login sukses, alihkan ke halaman index pelanggan
                // header("Location: index.php");
                echo "
                        <script type='text/javascript'>
                        setTimeout(function () {
                            swal.fire(
                            'Sukses',
                            'Login Berhasil..',
                            'success',
                            
                            ).then(function(){
                                window.location.replace('index.php');
                            });   
                            },10);  
                            
                            
                            
                        </script>";
            } else {
                echo "
                    <script type='text/javascript'>
                    setTimeout(function () {
                    swal.fire(
                    'Error',
                    'Username / Password Salah!',
                    'error',
                    
                    ).then(function(){
                        window.location.replace('login.php');
                    });     
                    },10);  
                    
                    </script>";
            }
        } else {
            echo "
                    <script type='text/javascript'>
                    setTimeout(function () {
                    swal.fire(
                    'Error',
                    'Username / Password belum terdaftar',
                    'error',
                    ).then(function(){
                        window.location.replace('signup.php');
                    });     
                    },10);  
                    
                    </script>";
        }
    }
    ?>




</body>

</html>