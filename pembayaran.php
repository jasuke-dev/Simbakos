<?php
    include "koneksi.php";
    if(isset($_GET['nopemesanan'])){
        $nopemesanan = $_GET['nopemesanan'];
      }
  if(isset($_POST['kirim'])){    
    $fotoname=$_FILES['buktipembayaran']['name'];
    $fototmpname=$_FILES['buktipembayaran']['tmp_name'];
    $direktori="./img";
    move_uploaded_file($fototmpname,$direktori."/$fotoname");
    $query = mysqli_query($conn,"UPDATE pemesanan SET foto = '$fotoname', status = 'wait' WHERE no_pemesanan = '$_GET[nopemesanan]'");
    if($query){
        echo "<script>
            alert('berhasil mengirim bukti pembayaran')
            document.location ='pemesanan.php'
            </script>";   
      }else{
        echo "<script>
        alert('gagal mengirim bukti pembayaran')
        </script>";
      }
  }
?>
<!DOCTYPE html>
<html>
<title>SIMBAKOS - Sistem Bersih-bersih dan Antar Kos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("wp/bbb.png");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
.judul{
  font-family: Copperplate, fantasy;
  font-size: 48px;
}
.konten{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 16px;
  padding: 4px;
}
.bgwoe{
  background: rgb(0,117,255);
  background: linear-gradient(0deg, rgba(0,117,255,0.6167600829394257) 0%, rgba(9,68,121,0) 26%, rgba(0,212,255,0.4038749288778011) 100%); 

  }
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="mainmenu.php" class="w3-bar-item w3-button w3-wide">SIMBAKOS</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-mdall">
      <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
      <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i> TEAM</a>
      <a href="#work" class="w3-bar-item w3-button"><i class="fa fa-th"></i> WORK</a>
      <a href="#pricing" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> PRICING</a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
    </div>
    <!-- Hide right-floated links on mdall screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on mdall screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
  <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min bgwoe" id="home">
<br><br><br>
<div>
    <b class="judul"><center>PEMBAYARAN</center></b>
</div> 
<div>
    <x class="konten">
	<div class="container">
	<form  method="post" action="" enctype="multipart/form-data">
	<div class="row">
	<div class="col-md" align="center">No Pemesanan Anda : <?= $nopemesanan ?></div>
	</div>
	<div class="row">
	<div class="col-md" align="center">~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</div>
	</div>
	<div class="row">
	<div class="col-md" align="center">Lakukan pembayaran melalui transfer ke salah satu rekening berikut.</div>
	</div>
	<div class="row">
	<div class="col-md" align="center"><img src=wp/BCA.png width=240></div>
	<div class="col-md" align="center"><img src=wp/Mandiri.png width=240></div>
	<div class="col-md" align="center"><img src=wp/BNI.png width=240></div>
	</div>
	<div class="row">
	<div class="col-md" align="center">00B0123456</div>
	<div class="col-md" align="center">1300001234567</div>
	<div class="col-md" align="center">0162012345</div>
	</div>
	<div class="row">
	<div class="col-md" align="center">Uchiha Ammar</div>
	<div class="col-md" align="center">Uchiha Ammar</div>
	<div class="col-md" align="center">Uchiha Ammar</div>
	</div>
	<div class="row">
	<div class="col-md" align="center">Indonesia Purwokerto</div>
	<div class="col-md" align="center">Purwokerto Jawa Tengah</div>
	<div class="col-md" align="center">Perintis Kemerdekaan Wibu</div>
	</div>
	<div class="row">
	<div class="col-md" align="center">~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</div>
	</div>
	<div class="row">
	<div class="col-md" align="right">Upload bukti pembayaran :</div>
	<div class="col-md" align="center"><input class="btn btn-outline-primary" type=file name=buktipembayaran required autofocus></div>
	<div class="col-md"><input class="btn btn-primary" type="submit" name="kirim" value="Kirim"></div>
    </div>
    </form>
	</div>
	</x>
</div> 
  
</header>


<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
