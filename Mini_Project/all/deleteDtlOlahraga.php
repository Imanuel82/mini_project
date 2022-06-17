<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$idDtlOlahraga = $_GET["idDtlOlahraga"];

$sql = "SELECT * FROM dtlolahraga WHERE idDtlOlahraga = '$idDtlOlahraga'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

if(deleteDtlOlahraga($idDtlOlahraga) > 0 ) {
    unlink($row["gambarDtlOlahraga"]);
    echo "
        <script>
            alert('Data detail olahraga berhasil dihapus !');
            document.location.href = 'crudDtlOlahraga.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data detail olahraga gagal dihapus !');
            document.location.href = 'crudDtlOlahraga.php';
        </script>
    ";
}