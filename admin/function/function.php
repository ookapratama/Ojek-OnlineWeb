<?php 
   $koneksi = mysqli_connect("localhost", "root", "", "db_ojol");

   function view($table) 
   {
      global $koneksi;
      $sql = "SELECT * FROM $table";
      $result = mysqli_query($koneksi, $sql);
      return $result;
   }

   function tambah($table, $data)
   {
      global $koneksi;
      
      switch ($table) {
         case 'user':
            $nm = $data['nama'];
            $alamat = $data['alamat'];
            $pass = $data['password'];
            $sql = "INSERT INTO $table (nm_user, alamat, password) VALUES ('$nm', '$alamat', '$pass')";
            break;
         
         default:
            # code...
            break;
      }

      $cek = mysqli_query($koneksi, $sql);
      $row = mysqli_num_rows($cek);
      
      return $row;
   }