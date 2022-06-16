<?php
require 'functions.php';

$idAdmin = $_GET["idAdmin"];

if(deleteAdmin($idAdmin) > 0 ) {
    echo "
        <script>
            alert('Data admin berhasil dihapus!');
            document.location.href = 'crudAdmin.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data admin gagal dihapus!');
            document.location.href = 'crudAdmin.php';
        </script>
    ";
}
?>