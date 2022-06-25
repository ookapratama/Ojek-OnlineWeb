<?php
require 'header.php';

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

   <!-- Main Content -->
   <div id="content">

      <?php require 'nav.php' ?>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Table User</h1>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <a href="user_tambah.php" class="btn btn-primary  mb-4">
                        <span class="icon text-white-50">
                        </span>
                        <span class="text">+ Add Data</span>
                     </a>
                     <thead>

                        <tr>
                           <th>No</th>
                           <th>Nama User</th>
                           <th>Alamat</th>
                           <th>Password</th>
                           <th>Action</th>
                        </tr>
                     </thead>

                     <tbody>
                        <?php
                        $data = view("user", null, null);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($data)) :
                        ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $row['nm_user'] ?></td>
                              <td><?= $row['alamat'] ?></td>
                              <td><?= $row['password'] ?></td>
                              <td>
                                 <a href="user_edit.php?id=<?= $row['id_user'] ?>" class="btn btn-warning btn-circle btn-md">
                                    <i class="fas fa-exclamation-triangle"></i>
                                 </a>
                                 <a href="user_hapus.php?id=<?= $row['id_user'] ?>" class="btn btn-danger btn-circle btn-md">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              </td>
                           </tr>

                        <?php endwhile; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>

      </div>
      <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->




   <?php require 'footer.php'; ?>