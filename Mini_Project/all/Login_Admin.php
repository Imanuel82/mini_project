<?php
session_start();
require 'functions.php';


if(isset($_POST['login'])){

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$username' LIMIT 1");

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        if($password===$row["passwords"]){
            $_SESSION["username"] = $row["username"];
            $_SESSION["password"] = $row["passwords"];
            echo"<script>location.href = 'dashboardAdmin.php';</script>";
            exit;
        }else{
            echo"<script>alert('Gagal Login, password tidak tepat');</script>";
        }
    } else {
        echo"<script>alert('Gagal Login, silakan masukkan username atau password yang tepat');
        location.href = 'Login_Admin.php';</script>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Login_Admin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>

    <div class= "box">
        <form action="" method="POST">

        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login" class="button">Login</button>
            </li>
            <li class="back">
                <button><a href="../index.php">Back</a></button>
            </li>
        </ul>

        </form>
    </div>

</body>
</html>