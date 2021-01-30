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
    <div id="blur">
      <!-- navbar -->
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="mainmenu.php" >SIMBAKOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Mba anter dong</a>
                  </li>
            </ul>
          </div>
      </nav>
      <!-- akhir navbar -->
    <center><h2 style="padding-top: 25px;">Form Pemesanan</h2></center>
    <hr>
    <section> 
      <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="" method="post">
                 <div class="form-group">
                  <label for="nama">Nama Lengkap :</label>
                  <input type="text" class="form-control form-control" id="nama" name="nama" placeholder="Marina" required>
                  <label for="alamat">Alamat Awal :</label>
                  <input type="text" class="form-control form-control" id="alamat" name="alamat" placeholder="bekasi" required>
                  <label for="alamat2">Alamat Tujuan :</label>
                  <input type="text" class="form-control" id="alamat2" name="alamat2" required>
                  <label for="durasi">durasi :</label>
                  <input type="text" class="form-control" id="durasi" name="durasi"required>
                  <label for="waktubooking">Waktu booking :</label>
                  <input type="datetime-local" class="form-control form-control" id="waktubooking" name="waktubooking"  required>
                  <label for="nohp">Nomor Telepon :</label>
                  <input type="text" class="form-control form-control" id="nohp" name="nohp" placeholder="+62 **** ****" required>
                  <br>
                  <button type="submit" name="kirim" id="kirim" class="btn btn-primary" onclick="return confirm ('Yakin ingin menambah produk ?');">Kirim!</button>
                     
                    
                     
                  <a href="mainmenu.php">
                  <button type="button" class="btn btn-large btn-danger">batal!</button>
                  </a>
                  </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
 
      
     <!-----alert------->
      <div id="box">
        <h1>Konfirmasi Pesanan</h1>
        <p>Nama : xxx</p>

        <p>Alamat awal : yyy</p>
        <p>Alamat Tujuan : zzz</p>
        <p>durasi : aaa</p>
        <p>waktu booking : dd:mm:yy</p>
        <p>nomor telpon : 000</p>
        <a class="konfirmasi">Setuju</a>
        <a onclick="pop()" class="batal">Batal</a>



    </div>
    <script type="text/javascript">
    var a = 0;
    function pop(){
        if(a==0){
            document.getElementById("box").style.display="block";
            document.getElementById("blur").style.filter="blur(4px)";
            a=1;
        }else{
            document.getElementById("box").style.display="none";
            document.getElementById("blur").style.filter="blur(0px)";
            a=0;
        }
    }
    
    </script>
      
      
      <!------php------->
      
<?php
if (isset($_POST['kirim']))
{
        $username=$_SESSION['username'];
        $alamat=$_POST['alamat'];
        $alamat2=$_POST['alamat2'];
        $durasi=$_POST['durasi'];
        $waktu=$_POST['waktubooking'];
        $harga=30000*$_POST['durasi'];
        $nopemesanan = $username."anter". date("ymdHis");
		

		

		
		include "koneksi.php";
		$perintah=mysqli_query($conn,"INSERT INTO pemesanan VALUES ('$nopemesanan', '$username', '$alamat', '$alamat2','$durasi', '$waktu', NULL, '$harga', '', 'submit', 'antar')");
		if ($perintah){
      $query = mysqli_query($conn,"SELECT NO_PEMESANAN FROM PEMESANAN WHERE ");
      echo "<script>
      document.location = 'pembayaran.php?nopemesanan=$nopemesanan'
      </script>";
		}
		else
		{
				echo "Gagal";	
		}
		
}
?>
      
      
      
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