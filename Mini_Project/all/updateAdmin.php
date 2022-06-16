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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <h1>Update Data Admin</h1>
        </div>
        <div>
            <form action="" method="POST">
                <input type="hidden" name="idAdmin" value="<?= $adm["idAdmin"] ?>">
                <ul>
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" required value="<?= $adm["username"] ?>">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="text" name="passwords" id="passwords" placeholder="Password" required value="<?= $adm["passwords"] ?>">
                    </div>
                    <div>
                        <button type="submit" name="submit">Update</button>
                        <br>
                        <a href="crudAdmin.php">Back</a>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</body>
</html>