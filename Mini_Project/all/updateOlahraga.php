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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <h1>Update Data Olahraga</h1>
        </div>
        <div>
            <form action="" method="POST">
                <input type="hidden" name="idOlahraga" id="idOlahraga" value="<?= $olg["idOlahraga"] ?>">
                <ul>
                    <div>
                        <label for="tipeOlahraga">Tipe Olahraga</label>
                        <input type="text" name="tipeOlahraga" id="tipeOlahraga" placeholder="Tipe Olahraga" required value="<?= $olg["tipeOlahraga"] ?>">
                    </div>
                    <div>
                        <label for="urlGambarMain">Link Gambar Main</label>
                        <input type="text" name="urlGambarMain" id="urlGambarMain" placeholder="Link Gambar Main" required value="<?= $olg["urlGambarMain"] ?>">
                    </div>
                    <div>
                        <button type="submit" name="submit">Update</button>
                        <br>
                        <a href="crudOlahraga.php">Back</a>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>