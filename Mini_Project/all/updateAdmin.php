<?php
require "functions.php";

$idAdmin = $_GET["idAdmin"];

$adm = query("SELECT * FROM admins WHERE idAdmin = $idAdmin")[0];

if(isset($_POST["submit"])){
    if(updateAdmin($_POST)>0){
        echo"
            <script>
                alert('Data berhasil diupdate!');
                document.location.href = 'crudAdmin.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('Data gagal diupdate!');
                document.location.href = 'crudAdmin.php';
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
            <h1>Update Data Admin</h1>
        </div>
        <div>
            <form action="" method="POST">
                <input type="hidden" name="idAdmin" value="<?= $adm["idAdmin"] ?>">
                <table>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input type="text" name="username" id="username" placeholder="Username" required value="<?= $adm["username"] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="text" name="passwords" id="passwords" placeholder="Password" required value="<?= $adm["passwords"] ?>"></td>
                    </tr>
                </table>
                <div class="tombol">
                    <button type="submit" name="submit" class="box">Update</button>
                    <br>
                    <a href="crudAdmin.php" class="back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>