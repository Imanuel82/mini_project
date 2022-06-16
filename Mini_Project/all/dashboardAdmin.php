<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}
if(isset($_POST["Logout"])){
    session_destroy();
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dashboardAdmin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Dashboard</title>
</head>
<body>
    <div class="box">
        <form action="" method="POST">
            <button><a href="crudAdmin.php" id="crud">Manage Admin</a></button>
            <br>
            <button><a href="manageContent.php" id="manage">Manage Content</a></button>
            <br><br><br>
            <input type="submit" value="Logout" name="Logout">
        </form>
    </div>
</body>
</html>