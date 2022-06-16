<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$idOlahraga = $_GET["idOlahraga"];

if(deleteOlahraga($idOlahraga)>0) {
    echo "
        <script>
            alert('Data olahraga berhasil dihapus !');
            document.location.href = 'crudOlahraga.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data olahraga gagal dihapus !');
            document.location.href = 'crudOlahraga.php';
        </script>
    ";
}
?>