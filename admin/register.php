<?php
    include "../config/config.php";
    session_start();

    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $nama_pengguna = mysqli_real_escape_string($con, $_POST['nama_pengguna']);
        $password = md5($_POST['password']);
        $id_lvuser = $_POST['id_lvuser'];
        $img = $_POST['img'];

        $select = "SELECT * FROM tbl_users WHERE username = '$username'";

        $result = mysqli_query($con, $select);

        if(mysqli_num_rows($result) > 0){
            // $error[] = 'Username sudah ada!';
            echo "
                    <script>
                        alert('Username sudah ada');
                    </script>
                ";

        }else{
            $insert = "INSERT INTO tbl_users(username, nama_pengguna, password, id_lvuser, img) VALUES('$username', '$nama_pengguna', '$password', '$id_lvuser', '$img')";
            $hasil = mysqli_query($con, $insert);
            if($hasil){
                echo "
                <script>
                    alert('Register berhasil..');
                </script>
            "; 
            }else{
                echo "gagal".mysqli_error($con); 
            }

        }

    };
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Register</b> | Gosip Kampus </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Register :)</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder=" username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- <div class="email"> -->
                        <input type="password" name="password" class="form-control" placeholder=" password" required>
                        <div class="input-group-append">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="nama_pengguna" class="form-control" placeholder="nama pengguna"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <span class="fas fa-envelope"></span> -->
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="img" id="file" class="form-control" placeholder=" File Gambar"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- <span class="fas fa-envelope"></span> -->
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-group">
                            <select name="id_lvuser" id="id_lvuser" class="form-control" style="width: 320px;" required>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <button type="submit" name="submit" class="btn btn-success flex-fill mr-1">Register</button>
                            <a href="login.php" <button class="btn btn-secondary flex-fill">Login</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>