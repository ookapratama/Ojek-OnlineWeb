<?php 
    session_start();
    include 'fungsi.php'; ?>
    
    

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gojol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
    <div class="d-flex justify-content-center">
        <div class="card col-md-6" style="padding: 50px; margin-top: 100px;">
        <h2>Orderan</h2>
        <?php 
        $no = 1;
        $row = mysqli_query($conn,"SELECT a.id_tran, a.titik, a.tujuan, b.nm_user, c.nm_driver, c.plat_motor, c.photo  FROM transaksi a, user b, driver c WHERE a.id_user = b.id_user AND a.id_driver = c.id_driver AND b.id_user = $_SESSION[id_user] AND a.ket = 'order'");
        while($data = mysqli_fetch_assoc($row)) : ?>
        <table class="table">
            <tr>
                <td rowspan="4"><img src="https://cdn-asset.jawapos.com/wp-content/uploads/2019/01/driver-ojol-tunawicara-kerap-kehilangan-penumpang-karena-komunikasi_c_239380.jpg" class="card-img" alt="..." style="max-width: 400px ;"></td>
                <td>Pemesan</td>
                <td>:</td>
                <td><?= $data['nm_user'] ?></td>
            </tr>
            <tr>
                <td>Driver</td>
                <td>:</td>
                <td><?= $data['nm_driver'] ?></td>
            </tr>
            <tr>
                <td>Nomor Kendaraan</td>
                <td>:</td>
                <td><?= $data['plat_motor'] ?></td>
            </tr>
            <tr>
                <td><?= $data['titik'] ?></td>
                <td>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
                </td>
                <td><?= $data['tujuan'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: right;"><a href="selesai.php?id=<?= $data['id_tran'] ?>" class="btn btn-danger">Selesai</a></td>
            </tr>
        </table>
    <?php $no++ ?>
    <?php endwhile; ?>       
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>