<?php
session_start();
require "functions.php";
$olahraga = query("SELECT * FROM dtlolahraga");

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Olahraga</title>
</head>
<body>
    <a href="manageContent.php">Back</a>
    <a href="addDtlOlahraga.php">Add Olahraga</a>
    <br><br><br>
    <table>
        <tr>
            <th>Action</th>
            <th>ID Olahraga</th>
            <th>Tipe Olahraga</th>
            <th>Deskripsi Olahraga</th>
            <th>Gambar Main</th>
            <th>ID Olahraga</th>
        </tr>
        <?php foreach($olahraga as $row) :?>
            <tr>
                <td>
                    <a href="updateDtlOlahraga.php?idDtlOlahraga=<?= $row["idDtlOlahraga"];?>">Update</a> |
                    <a href="deleteDtlOlahraga.php?idDtlOlahraga=<?= $row["idDtlOlahraga"];?>" onclick="return confirm('Apakah anda yakin?');">Delete</a>
                </td>
                <td><?=$row['idDtlOlahraga'];?></td>
                <td><?=$row['namaOlahraga'];?></td>
                <td><?=substr($row['deskOlahraga'],0,50);?>..</td>
                <td><img src="<?=$row['gambarDtlOlahraga']?>" width="100" height="70" alt=""></td>
                <td><?=$row['idOlahraga'];?></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>