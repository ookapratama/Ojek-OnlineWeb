<?php
require 'function/function.php';


if (isset($_POST['submit'])) {

   $data = tambah("driver", $_POST);
   if ($data > 0) {
      echo "<script>alert('Data Sudah ditambah')</script>";
      header("location: driver.php");
      // var_dump($_POST);

   } else
      echo "<script>alert('Data Gagal ditambah')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>SB Admin 2 - Tambah Data User</title>

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
                        <h1 class="h4 text-gray-900 mb-4">Create Driver Account!</h1>
                     </div>
                     <form class="user" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group row">
                           <div class="col-sm mb-4 ">
                              <input type="text" name="nm_driver" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Lengkap">
                           </div>

                        </div>
                        <div class="form-group mb-3">
                           <input type="text" name="plat_motor" class="form-control form-control-user" id="exampleInputEmail" placeholder="Plat Motor">
                        </div>

                        <div class="mb-3 form-group">
                           <label for="formFile" class="form-label">Upload Profile</label>
                           <input class="form-control" name="file" type="file" id="formFile">
                        </div>


                        <button type="submit" name="submit" class="btn btn-facebook btn-block mt-5 py-3">+ .Tambah Data</button>

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