<?php
   require 'function/function.php';
   $id = $_GET['id'];

   $hapus = hapus("driver", $id);

   if ($hapus > 0) {
      echo "<script>alert('Data Sudah dihapus')</script>";
      header("location: driver.php");
      
   }
   else 
      echo "<script>alert('Data Gagal dihapus')</script>";
   