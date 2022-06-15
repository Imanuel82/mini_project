<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$olahraga = query("SELECT * FROM instruktur");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Instruktur</title>
</head>
<body>
    <a href="manageContent.php">Back</a>
    <a href="addInstruktur.php">Add Olahraga</a>
    <br><br><br>
    <table>
        <tr>
            <th>Action</th>
            <th>ID Instruktur</th>
            <th>Nama Instruktur</th>
        </tr>
        <?php foreach($olahraga as $row) :?>
            <tr>
                <td>
                    <a href="updateInstruktur.php?idInstruktur=<?= $row["idInstruktur"];?>">Update</a> |
                    <a href="deleteInstruktur.php?idInstruktur=<?= $row["idInstruktur"];?>" onclick="return confirm('Apakah anda yakin?');">Delete</a>
                </td>
                <td><?=$row['idInstruktur'];?></td>
                <td><?=$row['namaInstruktur'];?></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>