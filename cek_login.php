<?php

//panggil koneksi database
include "koneksi.php";
if (isset($_POST['login'])){
$pass = md5($_POST['password']);
$username = $_POST['username'];
$password = $pass;
$level = 'Customer';

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($conn, "SELECT * FROM tuser WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

        //uji level user
        if ($level == "Customer") {
            header('location:home_customer.php');
        } elseif ($level == "Pegawai") {
            header('location:home_pegawai.php');
        } elseif ($level == "Administrator") {
            header('location:home_admin.php');
        }
    }else {
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');</script>";
}

}
?>