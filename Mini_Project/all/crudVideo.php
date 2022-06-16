<?php
session_start();
require "functions.php";
$video = query("SELECT * FROM video");

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="crud.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Videos</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Video Management</h1>
            <a href="manageContent.php">Back</a>
            <a href="addVideo.php">Add Video</a>
            <br><br><br>
        </div>
        <table>
            <tr>
                <th>Action</th>
                <th>ID Video</th>
                <th>Judul</th>
                <th>Video</th>
                <th>Level</th>
                <th>Durasi</th>
                <th>Peralatan</th>
                <th>ID Detail Olahraga</th>
                <th>ID Instruktur</th>
            </tr>
            <?php foreach($video as $row) :?>
                <tr>
                    <td>
                        <a href="updateVideo.php?idVideo=<?= $row["idVideo"];?>">Update</a> |
                        <a href="deleteVideo.php?idVideo=<?= $row["idVideo"];?>" onclick="return confirm('Apakah anda yakin?');">Delete</a>
                    </td>
                    <td><?=$row["idVideo"];?></td>
                    <td><?=substr($row["judulVideo"],0, 20);?>..</td>
                    <td><a href="https://www.youtube.com/embed/<?= $row["linkVideo"] ?>"><?= $row["linkVideo"] ?></a></td> 
                    <td><?= $row['levels'] ?></td>
                    <td><?= $row['durasi'] ?> Menit</td>
                    <td><?= $row['peralatan'] ?></td>
                    <td><?= $row['idDtlOlahraga'] ?></td>
                    <td><?= $row['idInstruktur'] ?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>