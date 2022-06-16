<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

if(isset($_POST["submit"])){
    if(addInstruktur($_POST)>0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'crudInstruktur.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'crudInstruktur.php';
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
    <title>Add Instruktur</title>
</head>
<body>
    <div>
        <div>
            <h1>Add Instruktur</h1>
        </div>
        <div>
            <form action="addInstruktur.php" method="POST">
                <table>
                    <tr>
                        <td><label for="namaInstruktur">Nama Instruktur</label></td>
                        <td><input type="text" name="namaInstruktur" id="namaInstruktur" placeholder="Nama Instruktur" required></td>
                    </tr>
                </table>
                    <div>
                        <button type="submit" name="submit">Insert</button>
                        <br>
                        <a href="crudInstruktur.php">Back</a>
                    </div>
            </form>
        </div>
    </div>
</body>
</html>