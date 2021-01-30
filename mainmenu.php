<!doctype html>

<?php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}
?>

<html lang="en">
  <head>
    <title>SIMBAKOS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="mainmenu.php" >SIMBAKOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="mainmenu.php">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pemesanan.php">Pemesanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="history.php">History</a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
      </nav>
      <!-- akhir navbar -->
    
      <!-- layanan -->
      <section class="layanan" style="padding-top: 25px;" >
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <h2 class="text-center" >Layanan Kami</h2>
                <hr>
              </div>
          </div>
          <div class="row">
              <div class="col-md-5 offset-md-1">
                <div class="card" style="width: 28rem;">
                    <img src="img/Aquila.png" class="card-img-top" alt="Anter-anter">
                    <div class="card-body">
                      <h5 class="card-title">Mba Anter Dong</h5>
                      <p class="card-text pkiri">Mba anter dong adalah layanan jasa untuk membantu anda jika ingin pindah kosan</p>
                      <a href="mbaanterdong.php" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                  </div>
              </div>
              <div class="col-md-5">
                <div class="card" style="width: 28rem;">
                    <img src="img/Aquila.png" class="card-img-top" alt="Bersih-bersih">
                    <div class="card-body">
                      <h5 class="card-title">Mba Sini Dong</h5>
                      <p class="card-text pkanan">Mba sini dong adalah layanan jasa untuk membantu anda untuk membersihkan kos tempat anda tinggal</p>
                      <a href="mbasinidong.php" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- akhir layanan -->

    <!-- footer -->
    <footer>
        <div class="container text-center"id="">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; Copyright 2020 | built with <img src="img/heart.png" width="20px"> by Simbakos-Team .</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/script.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>