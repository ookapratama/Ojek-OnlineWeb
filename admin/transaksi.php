<?php
require 'header.php';

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

   <!-- Main Content -->
   <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

         <!-- Sidebar Toggle (Topbar) -->
         <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
               <i class="fa fa-bars"></i>
            </button>
         </form>

         <!-- Topbar Search -->
         <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
               <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
               <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                     <i class="fas fa-search fa-sm"></i>
                  </button>
               </div>
            </div>
         </form>

         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
               <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
               </a>
               <!-- Dropdown - Messages -->
               <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                     <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                           <button class="btn btn-primary" type="button">
                              <i class="fas fa-search fa-sm"></i>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </li>



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                  <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
               </a>
               <!-- Dropdown - User Information -->
               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                     Logout
                  </a>
               </div>
            </li>

         </ul>

      </nav>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Table Transaksi</h1>

         <!-- DataTales Example -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">DataTables Transaksi</h6>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <a href="driver_tambah.php" class="btn btn-primary  mb-4">
                        <span class="icon text-white-50">
                        </span>
                        <span class="text">+ Add Data</span>
                     </a>
                     <thead>

                        <tr>
                           <th>No</th>
                           <th>No User</th>
                           <th>No Driver</th>
                           <th>Harga</th>
                           <th>Action</th>
                        </tr>
                     </thead>

                     <tbody>
                        <?php
                        $data = view("transaksi", null, null);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($data)) :
                        ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td>
                                 <?= $row['id_tran'] ?>
                              </td>
                              <td><?= $row['id_driver'] ?></td>
                              <td><?= $row['harga'] ?></td>
                              <td>
                                 <a href="transaksi_edit.php?id=<?= $row['id_tran'] ?>" class="btn btn-warning btn-circle btn-md">
                                    <i class="fas fa-exclamation-triangle"></i>
                                 </a>
                                 <a href="transaksi_hapus.php?id=<?= $row['id_tran'] ?>" class="btn btn-danger btn-circle btn-md">
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




   <?php require 'footer.php' ?>