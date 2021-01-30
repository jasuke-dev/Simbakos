<html>
<head>
    <title>SIMBAKOS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/script.js"></script>
	<script>
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
</head>
<body>
<div id="blur">
      <!-- navbar -->
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
      <!-- akhir navbar -->
	  
	<center><h2 style="padding-top: 25px">Akun Customer</h2></center>
	<hr>
	<section id="akuncust">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<table class="table">
						<thead class="table-dark table-hover">
							<th width="100px">id</th>
							<th width="230px">nama</th>
							<th width="180px">email</th>
							<th width="180px">username</th>
							<th width="100px">telp</th>
							<th width="100px">detil</th>
						</thead>
						<?php
							$link = mysqli_connect("localhost", "root", "", "simbakosdb");
							$perintah=mysqli_query($link,"select*from customer");
							while ($hasil=mysqli_fetch_array($perintah))
								{
									echo "<tr>
									<td>$hasil[id]</td>
									<td>$hasil[nama_lengkap]</td>
									<td>$hasil[email]</td>
									<td>$hasil[username]</td>
									<td>$hasil[no_telp]</td>
									<td><button onclick='pop()' name='detail' class='btn btn-primary'>Detail</button></td>
									</tr>";
								}
						?>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>	
	<div id='box'>
       	<h1>Detail Customer</h1>
        <?php
			$link = mysqli_connect("localhost", "root", "", "simbakosdb");
			$ambil=mysqli_query($link,"select*from customer");
			$akun=mysqli_fetch_array($ambil);
			$id = $akun['id_akun'];
			$perintah=mysqli_query($link,"select*from customer where id_akun='$id'");
			while ($hasil=mysqli_fetch_array($perintah)){
				echo "<table>
				<tr><td>id_akun: </td><td>$hasil[id_akun]</td></tr>
				<tr><td>nama: </td><td>$hasil[nama]</td></tr>
				<tr><td>email: </td><td>$hasil[email]</td></tr>
				<tr><td>username: </td><td>$hasil[username]</td></tr>
				<tr><td>password: </td><td>$hasil[password]</td></tr>
				<tr><td>telp: </td><td>$hasil[no_telp]</td></tr>
				</table>
				";
			}
		?>
        <button onclick="pop()" class="btn btn-primary">OK</button>
    </div>
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
</body>
</html>