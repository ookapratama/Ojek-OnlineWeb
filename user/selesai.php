<?php 
    include'fungsi.php';
    $id = $_GET['id'];

    $selesai = mysqli_query($conn,"UPDATE transaksi SET ket='selesai' WHERE id_tran='$id'");

    if($selesai == 1){
        echo "<script>
        alert('Terima Kasih Telah Memnggunakan  Layanan Kami, Semoga Harimu Menyenangkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Order Gagal');
        document.location.href = 'index.php';
        </script>";
    }
    ?>