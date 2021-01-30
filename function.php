<?php

$conn = mysqli_connect("localhost","root","","simbakosdb");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;
$nama = htmlspecialchars($data["nama"]);
$nim =  htmlspecialchars($data["nim"]);
$alamat =  htmlspecialchars($data["alamat"]);

$query = "INSERT INTO mahasiswa VALUES('','$nama','$nim','$alamat')";

mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($conn);
}


function ubah($data){
    global $conn;
    $id=$data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim =  htmlspecialchars($data["nim"]);
    $alamat =  htmlspecialchars($data["alamat"]);
    
    $query = "UPDATE mahasiswa SET
        namamhs ='$nama',
        nim = $nim,
        alamat = '$alamat'
     WHERE id=$id"; 
    
    mysqli_query($conn,$query);
    
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM pemesanan WHERE 
    harga LIKE '%$keyword%' OR
    durasi LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    username like '%$keyword%'
    ";

    return query($query);
}


function registrasi($data){
    global $conn;
    $username=strtolower(stripslashes($data["username"]));
    $nama=strtolower(stripslashes($data["nama"]));
    $password= mysqli_real_escape_string($conn,$data["password"]);
    $password2=mysqli_real_escape_string($conn,$data["password2"]);
    
   $result = mysqli_query($conn,"SELECT username FROM user WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('Username sudah terdaftar');
    </script>";

    return false;
    }

    if($password !== $password2){
        echo "<script>
                alert('Password tidak sesuai!');
            </script>";

            return false;
    }


    $password=password_hash($password,PASSWORD_DEFAULT);
    $query = "INSERT INTO user VALUES('','$username','$nama','$password')";

    mysqli_query($conn,$query);



    
    return mysqli_affected_rows($conn);
}

?>