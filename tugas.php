<?php

    session_start();
    if (!isset($_SESSION["admin"])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='admin.php'</script>";
    }

    include "koneksi.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if(isset($_GET['status'])){
        if($_GET['status']=='terima'){
            $query = mysqli_query($conn,"UPDATE PEMESANAN SET STATUS='confirm',user_pegawai='$_GET[pegawai]' WHERE no_pemesanan='$_GET[id]'");
            echo "<script>
                document.location = 'pesanan.php'
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Pemesanan</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="pesanan.php">pesanan <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pegawai.php">pegawai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">akun</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Rekap</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logoutadmin.php" >Logout</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="judul">
        <h1>Penugasan Pegawai</h1>
    </div>
    <div class="container">
        <div class="accordion" id="accordionExample">
        <div class="row row row-cols-1 row-cols-md-4 menu">
            <br>   
        <?php
          include "koneksi.php";
          $query = mysqli_query($conn,"SELECT*FROM pegawai");
          while($hasil=mysqli_fetch_array($query)) :?>     
                <div class="col mb-4">
                    <div class="card h-100">
                    <img src="./img/<?= $hasil['foto']?>" class="card-img-top" alt="<?= $hasil['foto']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $hasil['nama']?></h5>
                            <a href="tugas.php?id=<?=$id?>&pegawai=<?=$hasil['username']?>&status=terima" class="btn btn-primary btn-block" >Tugaskan</a>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>