<?php

    session_start();
    if (!isset($_SESSION["admin"])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='admin.php'</script>";
    }

    include "koneksi.php";
    if(isset($_GET['status'])){
        if($_GET['status']=='terima'){
            $query = mysqli_query($conn,"UPDATE PEMESANAN SET STATUS='confirm' WHERE no_pemesanan='$_GET[no]'");
            echo "<script>
                document.location = 'pesanan.php'
            </script>";
        }elseif ($_GET['status']=='tolak') {
            $query = mysqli_query($conn,"UPDATE PEMESANAN SET STATUS='reject' WHERE no_pemesanan='$_GET[no]'");
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
                <a class="nav-link" href="daftarpegawai.php">pegawai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="akuncustomer.php">akun</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rekap.php">Rekap</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logoutadmin.php" >Logout</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="judul">
        <h1>Daftar pesanan</h1>
    </div>
    <div class="container">
        <div class="accordion" id="accordionExample">
        <?php
          include "koneksi.php";
          $query = mysqli_query($conn,"SELECT*FROM PEMESANAN WHERE STATUS='wait'");
          while($hasil=mysqli_fetch_array($query)) :?>
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?=$hasil['no_pemesanan']?>" aria-expanded="true" aria-controls="collapseOne">
                    No Pemesanan : <?=$hasil['no_pemesanan']?>
                    </button>
                </h2>
                </div>

                <div id="collapse<?=$hasil['no_pemesanan']?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <img src="./img/<?=$hasil['foto']?>" class="transfer" alt="<?=$hasil['foto']?>">
                        </div>
                        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <h3>No pemesanan : <?=$hasil['no_pemesanan']?></h3>
                            <h5>Customer : <?=$hasil['username']?></h5>
                            <h5>Alamat : <?=$hasil['alamat']?></h5>
                            <h5>Waktu : <?=$hasil['waktu']?></h5>
                            <h5>Layanan : <?php if($hasil['layanan']=="sini"){
                                echo "Mba Sini Dong";
                            }else{
                                echo "Mba Antar Dong";
                            }?></h5>
                            <a class="btn btn-success btn-pesan" href="tugas.php?id=<?=$hasil['no_pemesanan']?>">Terima</a>
                            <button class="btn btn-danger" onclick="
                                            var konfirmasi = confirm('Yakin ingin menolak pesanan?');
                                            if(konfirmasi)window.location.href = 'pesanan.php?status=tolak&no=<?=$hasil['no_pemesanan']?>'">Tolak</button> 

                                        </td>
                        </div>

                    </div>
                </div>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>