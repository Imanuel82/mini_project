<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}
if(isset($_POST["Logout"])){
    session_destroy();
    header("Location:Main.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Dashboard</title>
</head>
<body>
    <form action="" method="POST">
        <a href="crudAdmin.php">Manage Admin</a>
        <br>
        <a href="manageContent.php">Manage Contents</a>
        <br><br><br>
        <input type="submit" value="Logout" name="Logout">
    </form>
</body>
</html>