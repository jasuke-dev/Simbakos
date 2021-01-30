<?php 
include 'koneksi.php';
if (isset($_POST['btnregister'])){

  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $nama_lengkap = mysqli_real_escape_string($conn,$_POST['nama']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $notelp = mysqli_real_escape_string($conn,$_POST['notelp']);
  $password1 = mysqli_real_escape_string($conn,$_POST['password1']);
  $password2 = mysqli_real_escape_string($conn,$_POST['password2']);

  if ($password1 === $password2) {
    $password1=password_hash($password1,PASSWORD_DEFAULT);
      mysqli_query($conn,"INSERT INTO customer (id,username,nama_lengkap,password,email,no_telp) 
                          Values('','$username','$nama_lengkap','$password1','$email',$notelp)");
      echo "<div class='alert alert-success'>Register Sukses. Silahkan Login</div>";
      echo "<meta http-equiv='refresh' content='1.5; url=index.php'>";
  }else if ($password1 !== $password2) {
      echo "<div class='alert alert-danger'>Password tidak cocok</div>";
      echo "<meta http-equiv='refresh' content='1; url=register.php'>";
  } 
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Register | SIMBAKOS</title> 

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
</head>

<body>
  <form class="form-signin" method="post">
    <div class="text-center mb-4">
      <img class="mb-4" src="assets/brand/house-door.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Register SIMBAKOS</h1>
      <p>Masukkan Username dan Password yang anda inginkan!</p>
    </div>

    <div class="form-label-group">
      <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda!" required autofocus>
      <label>Masukkan Username Anda!</label>
    </div>

    <div class="form-label-group">
      <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap Anda!" required autofocus>
      <label>Masukkan Nama Lengkap Anda!</label>
    </div>

    <div class="form-label-group">
      <input type="text" class="form-control" name="email" placeholder="Masukkan email anda!" required autofocus>
      <label>Masukkan email Anda!</label>
    </div>

    <div class="form-label-group">
      <input type="text" class="form-control" name="notelp" placeholder="Masukkan No telp Anda!" required autofocus>
      <label>Masukkan No telp Anda!</label>
    </div>

    <div class="form-label-group">
      <input type="password" name="password1" class="form-control" placeholder="Masukkan Password Anda!" required>
      <label>Masukkan Password Anda!</label>
    </div>

    <div class="form-label-group">
      <input type="password" name="password2" class="form-control" placeholder="Konfirmasi Password Anda!" required>
      <label>Konfirmasi Password Anda!</label>
    </div>

    <div class="form-label-group">
      <select class="form-control" name="level">
        <option value="Customer">Customer</option>
      </select>
    </div>

    <button class="btn btn-primary" name="btnregister" button type="submit">Register</button><br>    
     <p class="mt-5 mb-3 text-muted text-center">&copy; SIMBAKOS 2020</p>
  </form>
</body>
</html>