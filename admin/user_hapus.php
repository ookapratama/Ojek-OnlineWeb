<?php
   require 'function/function.php';
   $id = $_GET['id'];

   $hapus = hapus("user", $id);

   if ($hapus > 0) {
      echo "<script>alert('Data Sudah dihapus')</script>";
      header("location: user.php");
      
   }
   else 
      echo "<script>alert('Data Gagal dihapus')</script>";
   