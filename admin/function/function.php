<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_ojol");

function view($table, $id, $field)
{
   global $koneksi;
   if ($id == null) {
      $sql = "SELECT * FROM $table";
   } else
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

      case 'driver':
         $nm_driver = $data['nm_driver'];
         $plat = $data['plat_motor'];
         $gambar = gambar();

         if (!$gambar) {
            return false;
         }
         // var_dump($_POST);
         $sql = "INSERT INTO $table (nm_driver, plat_motor, photo) VALUES ('$nm_driver', '$plat','$gambar')";
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

      case 'driver':
         $sql = "DELETE FROM $table WHERE id_driver = $id";
         break;


      default:
         # code...
         break;
   }

   mysqli_query($koneksi, $sql);
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

      case 'driver':
         $nm_driver = $data['nama'];
         $plat = $data['plat'];
         $gambarLama = $data['old_pict'];
         $cek = $_FILES['file']['error'];
         if ($cek === 4) {
            $gambar = $gambarLama;
         } else {
            $gambar = gambar();
         }
         // var_dump($gambarLama);
         // var_dump($nm_driver);
         // var_dump($plat);
         // var_dump($gambar);
         // var_dump($cek);
         $sql = "UPDATE $table SET nm_driver = '$nm_driver', plat_motor = '$plat', photo = '$gambar' WHERE id_driver = $id";
         break;
      default:
         # code...
         break;
   }

   mysqli_query($koneksi, $sql);
   // var_dump(mysqli_affected_rows($koneksi));
   return mysqli_affected_rows($koneksi);
}

function gambar()
{

   $name = $_FILES['file']['name'];
   $tmp = $_FILES['file']['tmp_name'];
   $size = $_FILES['file']['size'];
   $error = $_FILES['file']['error'];

   if ($error === 4) {
      echo "<script>
            alert('Upload profile dulu')
            </script>";
      return false;
   }

   $extValid = ['jpeg', 'jpg', 'png'];
   $extGambar = explode('.', $name);
   $extGambar = strtolower(end($extGambar));

   if (!in_array($extGambar, $extValid)) {
      echo "<script>
            alert('File yang anda upload bukan gambar')
            </script>";
      return false;
   }

   if ($size > 1000000) {
      echo "<script>
            alert('File yang anda upload terlalu besar')
            </script>";
      return false;
   }

   $nameFileBaru = uniqid();
   $nameFileBaru .= '.';
   $nameFileBaru .= $extGambar;

   move_uploaded_file($tmp, 'img/driver/' . $nameFileBaru);

   return $nameFileBaru;
}
