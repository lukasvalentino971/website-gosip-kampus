<?php 

  include "../config/config.php";

   if(isset($_POST['submit'])) {
    if(isset($_POST['user'])==false){
        echo "<script>alert('Silahkan isi password')</script>";
    }
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $sql = mysqli_query($con, "SELECT * FROM tbl_users WHERE username='$user' AND password='$pass'");

    // Ambil Data Lv User
    $data = mysqli_fetch_array($sql);
    
    // Ambil Data True or False
    $cek = mysqli_num_rows($sql);

    // var_dump($cek);

    if($cek > 0) {
      session_start();

      // Passing Data
      $_SESSION['id'] = $data['id_user'];
      $_SESSION['user'] = $data['username'];
      $_SESSION['pengguna'] = $data['nama_pengguna'];
      $_SESSION['lvluser'] = $data['id_lvuser'];
      
      header("location:index.php?page=home");
    } else {
      $_SESSION['massage'] = "Maaf username dan password salah";
    }
  }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Gosip Kampus</title>
    <link rel="icon" href="../assets/img/logo-gosipkampus.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/login/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/css/login/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/login/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <?php
        if(isset($_SESSION['massage'])){
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['massage']; ?>
    </div>
    <?php
        unset($_SESSION['massage']);

    }
    ?>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>LogIn</b> | Gosip Kampus </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Login :)</p>

                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <span class="fas fa-envelope"></span> -->
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <button type="submit" name="submit" class="btn btn-success flex-fill mr-1">Log
                                In</button>
                            <a href="register.php" <button class="btn btn-secondary flex-fill">Register</button>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <a aria-current="page" href="../index.php?page=beranda"
                                class="btn btn-light btn-block">Home</a>
                        </div>
                    </div>


                    <!-- /.col -->
            </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../assets/js/login/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/js/login/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/login/adminlte.min.js"></script>
</body>

</html>