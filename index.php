<?php 
session_start();
if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
  }
require 'koneksi.php';

if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["username"] = $username;


 $result=mysqli_query($conn,"SELECT * FROM customer WHERE username = '$username'");
    //cek username
 if(mysqli_num_rows($result) === 1){

    //cek password

    $row = mysqli_fetch_assoc($result);
   if( password_verify($password,$row["password"]) ){
       $_SESSION["login"] = true;
       header("Location: mainmenu.php");
       exit;
   }
   
 }

 $error=true;

}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Login | SIMBAKOS</title> 

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
<?php if(isset($error)): ?>
  <p>Username/password salah</p>
  <?php endif; ?>
  <form class="form-signin" method="post" action="">
    <div class="text-center mb-4">
      <img class="mb-4" src="assets/brand/house-door.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login SIMBAKOS</h1>
      <p>Masukkan Username dan Password anda dengan Benar!</p>
    </div>

    <div class="form-label-group">
      <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda!" >
      <label>Masukkan Username Anda!</label>
    </div>

    <div class="form-label-group">
      <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda!" >
      <label>Masukkan Password Anda!</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Log In">Sign in</button><br>
    <p>belum punya akun ? <a href="register.php" button class="btn btn-success">Register</button></a></p>
    <p class="mt-5 mb-3 text-muted text-center">&copy; SIMBAKOS 2020</p>
  </form>
</body>

</html>