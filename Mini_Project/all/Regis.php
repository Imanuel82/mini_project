<?php
session_start();
require 'functions.php';

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

if(isset($_POST['register'])){

    if(regis($_POST)>0){
        header("Location:Login_Admin.php");
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <h1>Admin Registration</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" onkeyup="validasiPassword();">
                <span class="information-d"></span>
            </li>
            <li>
                <label for="password2">Confirm Password :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register" onclick="validasiPassSubmit();">Register</button>
            </li>
            <li>
                <a href="crudAdmin.php">Back</a>
            </li>
        </ul>
    </form>
</body>
</html>

<script>
    var inpPassword = document.getElementById('password');
    var inpConfirmPassword = document.getElementById('password2');

    function validasiPassword(){
        let areaPeringatan = document.getElementsByClassName('information-d')[0]
        let regularExpression = /^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9]{3,16}$/;
        if (!regularExpression.test(inpPassword.value)){
            areaPeringatan.textContent='Password harus mengandung 1 huruf besar, 1 huruf kecil dan 1 angka';
            areaPeringatan.style.color='red';
        }else{
            areaPeringatan.textContent='Okay';
            areaPeringatan.style.color='green';
        }
    }
    function validasiPassSubmit(){
        if(inpPassword.value !== inpConfirmPassword.value){
                window.alert('Password dan Confirm Password tidak sama !')
                event.preventDefault()
        }
    }
</script>