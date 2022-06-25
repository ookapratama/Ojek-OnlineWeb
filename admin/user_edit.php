<?php
require 'function/function.php';

$id = $_GET['id'];

if (isset($_POST['submit'])) {
   $data = update("user", $_POST, $id);
   if ($data > 0) {
      echo "<script>alert('Data Sudah diedit')</script>";
      header("location: user.php");
   } else
      echo "<script>alert('Data Gagal diedit')</script>";
}

$data_id = view("user", $id, "id_user");

?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>SB Admin 2 - Update Data User</title>

   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

   <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5">
         <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
               <div class="col-lg-7">
                  <div class="p-5">
                     <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data User!</h1>
                     </div>
                     <form class="user" method="POST" action="">
                        <?php while($row = mysqli_fetch_assoc($data_id)) : ?>

                        <input type="hidden">
                        <div class="form-group row">
                           <div class="col-sm mb-4 ">
                              <input type="text" name="nama" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Lengkap" value="<?= $row['nm_user'] ?>">
                           </div>

                        </div>
                       

                        <div class="form-group mb-5">
                           <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat Lengkap" value="<?= $row['alamat'] ?>">
                        </div>

                        <div class="form-group row">
                           <div class="col-sm mb-3 mb-sm-0">
                              <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="<?= $row['password'] ?>">
                           </div>

                        </div>
                        <?php endwhile; ?>

                        <button type="submit" name="submit" class="btn btn-warning btn-block mt-5 py-3">+ .Update Data</button>
                     </form>


                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="js/sb-admin-2.min.js"></script>

</body>

</html>