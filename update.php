<?php

    session_start();
    if (!isset($_SESSION["admin"])) {
        echo "<scripts>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='admin.php'</script>";
    }

    include "koneksi.php";
    if(isset($_GET['id'])){
        
        $query = mysqli_query($conn,"SELECT*FROM pegawai where id_pegawai = '$_GET[id]'");
        while($hasil=mysqli_fetch_array($query)){
            $tmpnama = $hasil['nama'];
            $tmpnotelp = $hasil['no_telp'];
            $tmpemail = $hasil['email'];
            $tmpfoto = $hasil['foto'];
        }
    }
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $notelp = $_POST['nohp'];
        $email= $_POST['email'];
        $password = $_POST['password'];
        $fotoname=$_FILES['foto']['name'];
        $fototmpname=$_FILES['foto']['tmp_name'];
        $direktori="./img";
        if($password == '' && $fotoname ==''){
            echo "1";
            $query = mysqli_query($conn,"UPDATE pegawai set
                                        nama = '$nama',
                                        no_telp = '$notelp',
                                        email = '$email'
                                        WHERE id_pegawai = '$_GET[id]'
                                ");
        }elseif($password != '' && $fotoname ==''){
            echo "2";
            $pass = md5($password);
            $query = mysqli_query($conn,"UPDATE pegawai set
                                        nama = '$nama',
                                        no_telp = '$notelp',
                                        email = '$email',
                                        password = '$pass'
                                        WHERE id_pegawai = '$_GET[id]'
                                        ");
        }elseif ($fotoname !='' && $password == '') {
            echo "3";
            unlink("./img/$tmpfoto");
            move_uploaded_file($fototmpname,$direktori."/$fotoname");
            $query = mysqli_query($conn,"UPDATE pegawai set
                                        nama = '$nama',
                                        no_telp = '$notelp',
                                        email = '$email',
                                        foto = '$fotoname'
                                        WHERE id_pegawai = '$_GET[id]'
                                        ");
        }else {
            $pass = md5($password);
            unlink("./img/$tmpfoto");
            move_uploaded_file($fototmpname,$direktori."/$fotoname");
            $query = mysqli_query($conn,"UPDATE pegawai set
                                        nama = '$nama',
                                        no_telp = '$notelp',
                                        email = '$email',
                                        foto = '$fotoname',
                                        password = '$pass'
                                        WHERE id_pegawai = '$_GET[id]'
                                        ");
        }
        
        if($query){
            echo "<script>
                        alert('Update data berhasil');
                        document.location = 'pegawai.php';
                </script>";
        }else{
            echo "<script>
                        alert('Update data gagal');
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
                <a class="nav-link" href="pegawai.php">pegawai</a>
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
        <h1>Update Pegawai</h1>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <img src="./img/<?=$tmpfoto?>" alt="<?=$foto?>" class="foto-update">
                    </div>
                    <div class="col col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="id">Nama</label>
                                <input class="form-control" type="text" name="nama" value="<?=@$tmpnama?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">No telp</label>
                                <input class="form-control" type="text" name="nohp" value="<?=@$tmpnotelp?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" value="<?=@$tmpemail?>" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Password</label>
                                <input class="form-control" type="text" name="password" placeholder="Kosongi jika tidak ingin mengganti password">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">Foto Pegawai</label>
                                    <input type="file" class="custom-file-input" name="foto" placeholder="Kosongi jika tidak ingin mengganti Foto">
                                </div>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>