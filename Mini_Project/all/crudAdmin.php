<?php
require "functions.php";
$admin = query("SELECT * FROM admins");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="crud.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Admin Management</h1>
            <a href="dashboardAdmin.php">Admin Dashboard</a>
            <a href="Regis.php">Tambah Admin</a>
            <br><br><br>
        </div>
        <table>
            <tr>
                <th>Action</th>
                <th>ID Admin</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php foreach($admin as $row) :?>
                <tr>
                    <td>
                        <a href="updateAdmin.php?idAdmin=<?= $row["idAdmin"];?>">Update</a> |
                        <a href="deleteAdmin.php?idAdmin=<?= $row["idAdmin"];?>" onclick="return confirm('Apakah anda yakin?');">Delete</a>
                    </td>
                    <td><?=$row['idAdmin'];?></td>
                    <td><?=$row['username'];?></td>
                    <td><?=$row['passwords'];?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>