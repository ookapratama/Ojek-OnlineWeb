<?php 
   $koneksi = mysqli_connect("localhost", "root", "", "db_ojol");

   function view($table, $id, $field) 
   {
      global $koneksi;
      if ($id == null) {
         $sql = "SELECT * FROM $table";
      }
      else 
         $sql = "SELECT * FROM $table WHERE $field = $id";

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
      $row = mysqli_affected_rows($koneksi);
      
      return $row;
   }


   function hapus($table, $id)
   {
      global $koneksi;


      switch ($table) {
         case 'user':
            $sql = "DELETE FROM $table WHERE id_user = $id";
            break;
         
         default:
            # code...
            break;
      }

      $result = mysqli_query($koneksi, $sql);
      return mysqli_affected_rows($koneksi);
   }

   function update($table, $data, $id)
   {
      global $koneksi;

      switch ($table) {
         case 'user':
            $nm = $data['nama'];
            $alamat = $data['alamat'];
            $pass = $data['password'];
            $sql = "UPDATE $table SET nm_user = '$nm', alamat = '$alamat', password = '$pass' WHERE id_user = $id";
            break;
         
         default:
            # code...
            break;
      }

      mysqli_query($koneksi, $sql);
      return mysqli_affected_rows($koneksi);
   }