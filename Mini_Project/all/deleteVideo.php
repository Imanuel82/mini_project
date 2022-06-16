<?php
session_start();
require "functions.php";

if(!isset($_SESSION['username'])){
    header("Location:Login_Admin.php");
}

$idVideo = $_GET["idVideo"];

if(deleteVideo($idVideo)>0) {
    echo "
        <script>
            alert('Data video berhasil dihapus !');
            document.location.href = 'crudVideo.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data video gagal dihapus !');
            document.location.href = 'crudVideo.php';
        </script>
    ";
}