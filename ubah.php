<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';
// ambil data
$id = $_GET["id"];
// query data mhs berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id") [0];
 

if(isset($_POST["submit"])){
    // cek error
    if(ubah($_POST)>0){
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href ='index.php';
            </script>
        ";
    } else{
        echo "data gagal diubah";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah data mahasiswa</title>
</head>
<body>
    <h1>ubah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>" >
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>" required>
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp"  value="<?= $mhs["nrp"]; ?>" >
            </li>
            <li>
                <label for="nama">nama : </label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">email : </label>
                <input type="text" name="email" id="email"  value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">jurusan : </label>
                <input type="text" name="jurusan" id="jurusan"  value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                
                <label for="gambar">gambar : </label> <br>
                <img src="img/<?= $mhs['gambar']; ?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar" >
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>


</body>
</html>