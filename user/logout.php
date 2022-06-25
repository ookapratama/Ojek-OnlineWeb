<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman sambil mengirim pesan logout
echo        "<script>
            alert('Anda Berhasil Logout');
            document.location.href = '../login.php';
            </script>";
?>