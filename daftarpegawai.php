<?php
    session_start();
    if (!isset($_SESSION["admin"])) {
        echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='admin.php'</script>";
    }
include "koneksi.php";
  if(isset($_GET['page'])){
    if($_GET['page']=='delete'){
        $query = mysqli_query($conn,"SELECT foto from pegawai where id_pegawai = '$_GET[id]'");
        $delfoto = mysqli_fetch_array($query);
        unlink ("./img/$delfoto[foto]");
        $delete = mysqli_query($conn,"delete from pegawai WHERE id_pegawai = '$_GET[id]' ");
        if($delete){
            echo "<script>alert('Hapus data berhasil');document.location ='pegawai.php'</script>";
        }
    }
    }
    // simpan data
    if(isset($_POST['simpan'])){
        if($_POST['nama']==''){
            header('location:pegawai.php');
        }

        $nama = $_POST['nama'];
        $notelp = $_POST['nohp'];
        $email= $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass = md5($password);
        $fotoname=$_FILES['foto']['name'];
        $fototmpname=$_FILES['foto']['tmp_name'];
        $direktori="./img";
        move_uploaded_file($fototmpname,$direktori."/$fotoname");
        
        include "koneksi.php";
        $perintah = mysqli_query($conn,"INSERT into pegawai(id_pegawai,nama,no_telp,email,username,pass,foto) 
        values (NULL,'$nama',$notelp,'$email','$username','$pass','$fotoname')");
        if($perintah){
            echo "<script>
                        alert('Inputan data berhasil');
                        document.location = 'pegawai.php';
                </script>";
        }else{
            echo "<script>
                        alert('Inputan data gagal');
                        document.location = 'pegawai.php';
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
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Pegawai</title>
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
        <h1>Daftar Pegawai</h1>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="post" action="pegawai.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">Nama</label>
                        <input class="form-control" type="text" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">No telp</label>
                        <input class="form-control" type="text" name="nohp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">username</label>
                        <input class="form-control" type="text" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Password</label>
                        <input class="form-control" type="text" name="password" required>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Foto Pegawai</label>
                            <input type="file" class="custom-file-input" name="foto" >
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                </form>
            </div>
        </div>
        <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                Daftar Pegawai
                </div>
                <div class="card-body">                  
                    <?php
                    include "koneksi.php";
                        $daftar_pegawai = mysqli_query($conn,"select*from pegawai");
                        $no=0;
                        while($hasil=mysqli_fetch_array($daftar_pegawai)){ $no++; ?>
                        <div class="row mt-3">
                            <div class="col col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <?= $no?>
                            </div>
                            <div class="col col-sm-8 col-md-8 col-lg-8 col-xl-8 ">
                                <div class="row">
                                    <div class="col col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                        <img src="./img/<?=$hasil['foto']?>" class="foto-pegawai" alt="<?=$hasil['foto']?>">
                                    </div>
                                    <div class="col col-sm-8 col-md-8 col-lg-8 col-xl-8 ">
                                        <table>
                                            <tr>
                                                <th>Nama </th>
                                                <th>:</th>
                                                <th><?= $hasil['nama'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>No telp </th>
                                                <th>:</th>
                                                <th><?= $hasil['no_telp'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>email </th>
                                                <th>:</th>
                                                <th><?= $hasil['email'] ?></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                <a href="update.php?id=<?=$hasil['id_pegawai']?>" class="btn btn-warning mt-3">Update</a>
                                <button class="btn btn-danger mt-3" onclick="
                                    var konfirmasi = confirm('Yakin ingin menghapus data?');
                                    if(konfirmasi)window.location.href = 'pegawai.php?page=delete&id=<?=$hasil['id_pegawai']?>';">hapus </button> 
                            </div>
                                
                        </div>
                    <?php } ?>
                </div>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>