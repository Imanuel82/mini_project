<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}


if(isset($_POST["submit"])){
    if(addOlahraga($_POST)>0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'crudOlahraga.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
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
    <title>Add Olahraga</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Add Data Olahraga</h1>
        </div>
        <div>
            <form action="addOlahraga.php" method="POST">
                <table>
                    <tr>
                        <td><label for="tipeOlahraga">Tipe Olahraga</label></td>
                        <td><input type="text" name="tipeOlahraga" id="tipeOlahraga" placeholder="Tipe Olahraga" required></td>
                    </tr>
                    <tr>
                        <td><label for="urlGambarMain">Link Gambar</label></td>
                        <td><input type="text" name="urlGambarMain" id="urlGambarMain" placeholder="Link Gambar Main" required></td>
                    </tr>
                </table>
                <div class="tombol">
                    <button type="submit" name="submit" class="box">Insert</button>
                    <br>
                    <a href="crudOlahraga.php" class="back">Back</a>
                </div>
            </form>
        </div>
    </divc>
</body>
</html>