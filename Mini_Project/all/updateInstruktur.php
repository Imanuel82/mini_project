<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$idInstruktur = $_GET['idInstruktur'];

$ins = query("SELECT * FROM instruktur WHERE idInstruktur = $idInstruktur")[0];

if(isset($_POST["submit"])){
    if(updateInstruktur($_POST)>0){
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'crudInstruktur.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'crudInstruktur.php';
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
    <title>Update Instruktur</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Update Data Instruktur</h1>
        </div>
        <div>
            <form action="" method="POST">
                <input type="hidden" name="idInstruktur" id="idInstruktur" value="<?= $ins["idInstruktur"]?>">
                <table>
                    <tr>
                        <td><label for="namaInstruktur">Nama Instruktur</label></td>
                        <td><input type="text" name="namaInstruktur" id="namaInstruktur" placeholder="Nama Instruktur" required value ="<?= $ins["namaInstruktur"]?>"></td>
                    </tr>
                </table>
                <div class="tombol">
                    <button type="submit" name="submit" class="box">Update</button>
                    <br>
                    <a href="crudInstruktur.php" class="back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>