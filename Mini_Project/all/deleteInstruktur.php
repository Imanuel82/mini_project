<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$idInstruktur = $_GET["idInstruktur"];

if(deleteInstruktur($idInstruktur)>0) {
    echo "
        <script>
            alert('Data Instruktur berhasil dihapus !');
            document.location.href = 'crudInstruktur.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data Instruktur gagal dihapus !');
            document.location.href = 'crudInstruktur.php';
        </script>
    ";
}
?>