<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$idOlahraga = $_GET['idOlahraga'];

$olg = query("SELECT * FROM olahraga WHERE idOlahraga = $idOlahraga")[0];

if(isset($_POST["submit"])){
    if(updateOlahraga($_POST)>0){
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'crudOlahraga.php'; 
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'crudOlahraga.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="addupdate.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Update Data Olahraga</h1>
        </div>
        <div>
            <form action="" method="POST">
                <input type="hidden" name="idOlahraga" id="idOlahraga" value="<?= $olg["idOlahraga"] ?>">
                <table>
                    <tr>
                        <td><label for="tipeOlahraga">Tipe Olahraga</label></td>
                        <td><input type="text" name="tipeOlahraga" id="tipeOlahraga" placeholder="Tipe Olahraga" required value="<?= $olg["tipeOlahraga"] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="urlGambarMain">Link Gambar Main</label></td>
                        <td><input type="text" name="urlGambarMain" id="urlGambarMain" placeholder="Link Gambar Main" required value="<?= $olg["urlGambarMain"] ?>"></td>
                    </tr>
                </table>
                <div class="tombol">
                    <button type="submit" name="submit" class="box">Update</button>
                    <br>
                    <a href="crudOlahraga.php" class="back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>