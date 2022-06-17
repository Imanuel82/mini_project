<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$idVideo = $_GET['idVideo'];

$vid = query("SELECT * FROM video WHERE idVideo = $idVideo")[0];

$query1 = "SELECT * FROM dtlolahraga";
$result1 = mysqli_query($conn, $query1);

$query2 = "SELECT * FROM instruktur";
$result2 = mysqli_query($conn, $query2);

if(isset($_POST["submit"])){
    if(updateVideo($_POST)>0){
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'crudVideo.php'; 
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'crudVideo.php';
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
            <h1>Update Data Video</h1>
        </div>
        <div>
            <form action="" method="POST">
                <input type="hidden" name="idVideo" value="<?= $vid["idVideo"]?>">
                <table>
                    <tr>
                        <td><label for="judulVideo">Judul Video</label></td>
                        <td><input type="text" name="judulVideo" id="judulVideo" placeholder="Judul Video" required value="<?= $vid["judulVideo"]?>"></td>
                    </tr>
                    <tr>
                        <td><label for="linkVideo">Link Video</label></td>
                        <td><input type="text" name="linkVideo" id="linkVideo" required value="<?= $vid["linkVideo"]?>"></td>
                    </tr>
                    <tr>
                        <td><label for="levels">Level</label></td>
                        <td><select name="levels" id="levels">
                            <option value="<?= $vid["levels"]?>"><?= $vid["levels"]?></option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label for="durasi">Durasi</label></td>
                        <td><input type="number" name="durasi" id="durasi" placeholder="Durasi Video" required value="<?= $vid["durasi"] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="peralatan">Peralatan</label></td>
                        <td><input type="text" name="peralatan" id="peralatan" placeholder="Peralatan" required value="<?= $vid["peralatan"] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="idDtlOlahraga">ID Detail Olahraga</label></td>
                        <td><select name="idDtlOlahraga" id="idDtlOlahraga">
                            <option selected value="<?= $vid["idDtlOlahraga"]?>"><?= $vid["idDtlOlahraga"] ?></option>
                            <?php foreach ($result1 as $row1) :?>
                            <option value="<?= $row1["idDtlOlahraga"] ?>"><?= $row1["idDtlOlahraga"] ?>. <?= $row1["namaOlahraga"] ?></option>
                            <?php endforeach;?>
                        </select></td>
                    </tr>
                    <tr>
                        <td><label for="idInsturktur">ID Instruktur</label></td>
                        <td><select name="idInstruktur" id="idInstruktur">
                            <option selected value="<?= $vid["idInstruktur"]?>"><?= $vid["idInstruktur"]?></option>
                            <?php foreach ($result2 as $row2) :?>
                            <option value="<?= $row2['idInstruktur'] ?>"><?= $row2['idInstruktur'] ?>. <?= $row2['namaInstruktur'] ?></option>
                            <?php endforeach;?>
                        </select></td>
                    </tr>
                </table>
                <div class="tombol">
                    <button type="submit" name="submit" class="box">Update</button>
                    <br>
                    <a href="crudVideo.php" class="back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>