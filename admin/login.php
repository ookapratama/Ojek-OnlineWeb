<?php 
    include 'function/function.php';

    if(isset($_POST['submit'])){
        // mengaktifkan session php
        session_start();
        
        // menangkap data yang dikirim dari form
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // menyeleksi data admin dengan username dan password yang sesuai
        $data = mysqli_query($koneksi,"select * from admin where nm_admin='$username' and pass='$password'");
        
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
        
        if($cek > 0){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            $row = mysqli_fetch_assoc($data);
            $_SESSION['id_admin'] = $row['id_admin'];
            header("location:index.php");
        }else{
            header("location:login.php");
        }

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gojol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
    <div class="d-flex justify-content-center">
        <div class="card col-md-6" style="padding: 50px; margin-top: 100px;">
            <form method="post">
                <h2 style="text-align: center;">Login Admin</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Masukan Username Anda Disini" name="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Masukan Password Anda Disini" name="password">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
                </div>
                
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>