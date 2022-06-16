<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$olahraga = query("SELECT * FROM olahraga");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="crud.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Olahraga</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Olahraga Management</h1>
            <a href="manageContent.php">Back</a>
            <a href="addOlahraga.php">Add Olahraga</a>
            <br><br><br>
        </div>
        <table>
            <tr>
                <th>Action</th>
                <th>ID Olahraga</th>
                <th>Tipe Olahraga</th>
                <th>Gambar Main</th>
            </tr>
            <?php foreach($olahraga as $row) :?>
                <tr>
                    <td>
                        <a href="updateOlahraga.php?idOlahraga=<?= $row["idOlahraga"];?>">Update</a> |
                        <a href="deleteOlahraga.php?idOlahraga=<?= $row["idOlahraga"];?>" onclick="return confirm('Apakah anda yakin?');">Delete</a>
                    </td>
                    <td><?=$row['idOlahraga'];?></td>
                    <td><?=$row['tipeOlahraga'];?></td>
                    <td><img src="<?=$row['urlGambarMain']?>" width="100" height="70"></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>