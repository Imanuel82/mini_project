<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$query1 = "SELECT * FROM olahraga";
$result1 = mysqli_query($conn, $query1);

$targetFolder = "dtlOlahraga/";

if(isset($_POST['submit'])){
    if(isset($_FILES)){
        $unique= uniqid()+time();
        $isValid = true;
        $allowed_image_extensions = array("jpg", "jpeg", "png");
        $pathGambar = $targetFolder."gambarDtlOlahraga_".$unique.".".pathinfo($_FILES['gambarDtlOlahraga']['name'], PATHINFO_EXTENSION);

        $namaOlahraga = htmlspecialchars($_POST['namaOlahraga']);
        $deskOlahraga = htmlspecialchars($_POST['deskOlahraga']);
        $gambarDtlOlahraga = $pathGambar;
        $idOlahraga = htmlspecialchars($_POST['idOlahraga']);

        $file_extension = pathinfo($_FILES['gambarDtlOlahraga']['name'], PATHINFO_EXTENSION);

        if($isValid){
            if(! in_array($file_extension, $allowed_image_extensions)){
                echo"<script type='text/javascript'>alert('Upload Gagal, file harus dalam format jpg, jpeg, atau png');</script>";
            }else if($_FILES['gambarDtlOlahraga']['size']>3000000){
                echo"<script type='text/javascript'>alert
                ('Upload Gagal, file maksimal berukuran 3MB');</script>";
            }else{
                $query = "INSERT INTO dtlolahraga VALUES('','$namaOlahraga','$deskOlahraga','$gambarDtlOlahraga','$idOlahraga')";

                $result = mysqli_query($conn, $query);

                if(mysqli_affected_rows($conn)>0){
                    if(move_uploaded_file($_FILES['gambarDtlOlahraga']['tmp_name'],$gambarDtlOlahraga)){
                        echo"<script type='text/javascript'>alert
                        ('Upload Berhasil');
                        document.location.href = 'crudDtlOlahraga.php';
                        </script>";
                    }else{
                        echo"<script type='text/javascript'>alert
                        ('Upload Gagal')
                        document.location.href = 'crudDtlOlahraga.php';
                        </script>";
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
    <title>Document</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Add Data Detail Olahraga</h1>
        </div>
        <div>
        <form action="addDtlOlahraga.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="namaOlahraga">Nama Olahraga</label></td>
                    <td><input type="text" name="namaOlahraga" id="namaOlahraga" placeholder="Nama Olahraga" required></td>
                </tr>
                <tr>
                    <td><label for="deskOlahraga">Deskripsi</label></td>
                    <td><textarea name="deskOlahraga" id="deskOlahraga" cols="60" rows="7" placeholder="Deskripsi Olahraga..." required></textarea></td>
                </tr>
                <tr>
                    <td><label for="gambarDtlOlahraga">Gambar Detail</label></td>
                    <td><input type="file" name="gambarDtlOlahraga" id="gambarDtlOlahraga" placeholder="Gambar Detail Olahraga" required></td>
                </tr>
                <tr>
                    <td><label for="idOlahraga">ID Olahraga</label></td>
                    <td><select name="idOlahraga" id="idOlahraga">
                            <option value=""></option>
                            <?php foreach ($result1 as $row1) :?>
                            <option value="<?= $row1['idOlahraga'] ?>"><?= $row1['idOlahraga'] ?>. <?= $row1['tipeOlahraga'] ?></option>
                            <?php endforeach;?>
                        </select></td>
                </tr>
            </table>
                <div class="tombol">
                    <button type="submit" name="submit" value="upload" class="box">Insert</button>
                    <br>
                    <a href="crudDtlOlahraga.php" class="back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>