<?php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}
?>


<?php
include 'function.php';
$user=$_SESSION["username"];
$pesanan = query("SELECT * FROM pemesanan WHERE username='$user' and status = 'success'");


?>

<!doctype html>
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
   <!-- akkhir navbar -->
   <!doctype html>
   <html lang="en">
     <head>
       <title>Histori</title>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     </head>
     <body> 
         <section class="tabel">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12">
                   <h2 class="text-center">Histori Pemesanan</h2>
                   <hr>
         <table class="table table-dark table-hover">
             <tr>
                 <th>
                     no
                 </th>
                 <th>
                     username
                 </th>
                 <th>
                     alamat
                 </th>
                 <th>
                     durasi
                 </th>
                 <th>
                     waktu
                 </th>
                 <th>
                   harga
                 </th>
                 <th>
                   layanan
                 </th>
                 <th>
                   status
                 </th>
             </tr>
             <?php $i=1 ; ?>
             <?php foreach ($pesanan as $row) :?>  
               <tr>
                   <td> <?= $i ; ?> </td>
                   <td> <?php echo $row['username'];  ?> </td>     
                   <td> <?php echo $row['alamat'];  ?></td>
                   <td> <?php echo $row['durasi'];  ?></td>
                   <td> <?php echo $row['waktu'];  ?></td>     
                   <td> <?php echo $row['harga'];  ?></td>
                   <td> <?php echo $row['layanan'];  ?></td>
                   <td> <?php echo $row['status'];  ?></td>
               </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
         </table>
               </div>    
           </div>
         </div>
        </section>
       <!-- Optional JavaScript -->
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     </body>
   </html>
    <!-- footer -->
    <footer>
        <div class="container text-center"id="">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; Copyright 2020 | built with <img src="img/heart.png" width="20px"> by Simbakos-Team </a>.</p>
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