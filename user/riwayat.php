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
  <nav class="navbar bg-light ">
        <div class="container-fluid col-md-11">
            <a class="navbar-brand"><b>GOJOL</b></a>
            <div class="d-flex justify-content-end" role="search">
            <a href="index.php" class="btn btn-light">
                Home
            </a>
            <a href="#" class="btn btn-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                </svg>
                <?= $_SESSION['username'];?>
            </a>
            <a href="logout.php" class="btn btn-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a>
            </div>
        </div>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="card col-md-8" style="padding: 50px; margin-top: 100px;">
        <h2>Riwayat Pesanan</h2>
        <table class="table">
            <thead>
            <tr>
                <td>Driver</td>
                <td>Nomor kendaraan</td>
                <td>Lokasi</td>
                <td>
                    
                </td>
                <td>Tujuan</td>
                <td>Status</td>
            </tr>
            </thead>
            <tbody>
        <?php 
        $no = 1;
        $row = mysqli_query($conn,"SELECT a.id_tran, a.titik, a.tujuan, a.ket, b.nm_user, c.nm_driver, c.plat_motor, c.photo  FROM transaksi a, user b, driver c WHERE a.id_user = b.id_user AND a.id_driver = c.id_driver AND b.id_user = $_SESSION[id_user] AND a.ket = 'selesai'");
        while($data = mysqli_fetch_assoc($row)) : ?>
            <tr>
                <td><?= $data['nm_driver'] ?></td>
                <td><?= $data['plat_motor'] ?></td>
                <td><?= $data['titik'] ?></td>
                <td>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
                </td>
                <td><?= $data['tujuan'] ?></td>
                <td><?= $data['ket'] ?></td>
            </tr>
    <?php $no++ ?>
    <?php endwhile; ?>  
        </tbody>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>