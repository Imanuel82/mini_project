<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}
$idDtlOlahraga = $_GET['idDtlOlahraga'];

$query2 = "SELECT * FROM olahraga";


$query1 = query("SELECT * FROM dtlolahraga WHERE idDtlOlahraga = $idDtlOlahraga")[0];

$targetFolder = "dtlOlahraga/";

if(isset($_POST['submit'])){
    if(isset($_FILES)){
        $unique = uniqid()+time();
        $allowed_image_extensions = array("jpg", "jpeg", "png");
        $pathGambar = $targetFolder."gambarDtlOlahraga_".$unique.".".pathinfo($_FILES['gambarDtlOlahraga']['name'], PATHINFO_EXTENSION);

        $idDtlOlahraga = $_POST['idDtlOlahraga'];
        $namaOlahraga = htmlspecialchars($_POST['namaOlahraga']);
        $deskOlahraga = htmlspecialchars($_POST['deskOlahraga']);

        $oldGambar = $_POST['oldGambar'];

        $idOlahraga = htmlspecialchars($_POST['idOlahraga']);

        $file_extension = pathinfo($_FILES['gambarDtlOlahraga']['name'], PATHINFO_EXTENSION);

        if(!file_exists($_FILES['gambarDtlOlahraga']['tmp_name']) || !is_uploaded_file($_FILES['gambarDtlOlahraga']['tmp_name'])){
            $query3 = "UPDATE dtlolahraga SET idDtlOlahraga = '".$idDtlOlahraga."', namaOlahraga = '".$namaOlahraga."', deskOlahraga = '".$deskOlahraga."', gambarDtlOlahraga = '".$oldGambar."', idOlahraga = '".$idOlahraga."' WHERE idDtlOlahraga = '".$idDtlOlahraga."'";
        
            if(mysqli_query($conn, $query3)){
                echo"<script type='text/javascript'>alert
                ('Berhasil update dan gambar detail olahraga tetap');
                
                location.href = 'crudDtlOlahraga.php';</script>";"
                ";
            }
        }else{
            if(! in_array($file_extension, $allowed_image_extensions)){
                echo"<script type='text/javascript'>alert('Upload Gagal, file harus dalam format jpg, jpeg, atau png');</script>";
            }else if($_FILES['gambarDtlOlahraga']['size']>3000000){
                echo"<script type='text/javascript'>alert
                ('Upload Gagal, file maksimal berukuran 3MB');</script>";
            }else{
                $query = "UPDATE dtlolahraga SET idDtlOlahraga = '".$idDtlOlahraga."', namaOlahraga = '".$namaOlahraga."', deskOlahraga = '".$deskOlahraga."', gambarDtlOlahraga = '".$pathGambar."', idOlahraga = '".$idOlahraga."' WHERE idDtlOlahraga = '".$idDtlOlahraga."'";

                unlink($query1['gambarDtlOlahraga']);

                $result = mysqli_query($conn, $query);

                if(mysqli_affected_rows($conn)>0){
                    if(move_uploaded_file($_FILES['gambarDtlOlahraga']['tmp_name'],$pathGambar)){
                        echo"<script type='text/javascript'>alert
                        ('Update berhasil dan gambar detail olahraga berubah');
                        location.href = 'crudDtlOlahraga.php';</script>";
                    }else{
                        echo"<script type='text/javascript'>alert
                        ('Update Gagal');
                        location.href = 'crudDtlOlahraga.php';</script>";
                    }
                }
            }
        }   
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
    <title>Update Detail Olahraga</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Update Data Detail Olahraga</h1>
        </div>
        <div>
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idDtlOlahraga" id="idDtlOlahraga" value="<?= $query1["idDtlOlahraga"] ?>">
            <input type="hidden" name="oldGambar" value="<?= $query1["gambarDtlOlahraga"] ?>">
                <table>
                    <tr>
                        <td><label for="namaOlahraga">Nama Olahraga</label></td>
                        <td><input type="text" name="namaOlahraga" id="namaOlahraga" placeholder="Nama Olahraga" required value="<?=$query1['namaOlahraga']?>"></td>
                    </tr>
                    <tr>
                        <td><label for="deskOlahraga">Deskripsi</label></td>
                        <td><textarea name="deskOlahraga" id="deskOlahraga" cols="60" rows="7" placeholder="Deskripsi Olahraga..." required><?=$query1['deskOlahraga']?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="gambarDtlOlahraga">Gambar Detail</label></td>
                        <td><input type="file" name="gambarDtlOlahraga" id="gambarDtlOlahraga">
                        <img src="<?=$query1['gambarDtlOlahraga']?>" width="60px" height="40px" border="1px solid black" alt=""></td>
                    </tr>
                    <tr>
                        <td><label for="idOlahraga">ID Olahraga</label></td>
                        <td><select name="idOlahraga" id="idOlahraga">
                            <option value="<?=$query1["idOlahraga"]?>"><?=$query1["idOlahraga"]?></option>
                            <?php foreach ($result2 as $row2) :?>
                            <option value="<?= $row2["idOlahraga"] ?>"><?= $row2["idOlahraga"] ?>. <?= $row2["tipeOlahraga"] ?></option>
                            <?php endforeach;?>
                        </select></td>
                    </tr>
                </table>
                <div class="tombol">
                    <button type="submit" name="submit" value="upload" class="box">Update</button>
                    <br>
                    <a href="crudDtlOlahraga.php"class="back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>