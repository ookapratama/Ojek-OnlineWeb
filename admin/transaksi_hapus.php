<?php
   require 'function/function.php';
   $id = $_GET['id'];

   $hapus = hapus("transaksi", $id);

   if ($hapus > 0) {
      echo "<script>alert('Data Sudah dihapus')</script>";
      header("location: transaksi.php");
      
   }
   else 
      echo "<script>alert('Data Gagal dihapus')</script>";
   