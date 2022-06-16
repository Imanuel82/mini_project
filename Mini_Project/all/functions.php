<?php
$conn = mysqli_connect("localhost", "root", "", "mini_project");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function regis($data)
{
    global $conn;

    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM admins WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username yang dipilih sudah terdaftar !')
            </script>";
        return false;
    }

    // tambahkan user baru ke database
    $regex = "/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9]{3,16}$/";
    if (preg_match_all($regex, $password)) {
        mysqli_query($conn, "INSERT INTO admins VALUES('','$username','$password')");
        return mysqli_affected_rows($conn);
    } else {
        echo "<script>
            window.alert('Password tidak memenuhi syarat !')
            </script>";
    }
}

function updateAdmin($data){
    global $conn;
    $idAdmin = htmlspecialchars($data["idAdmin"]);
    $username = htmlspecialchars($data["username"]);
    $passwords = htmlspecialchars($data["passwords"]);

    $query = "UPDATE admins SET idAdmin = '".$idAdmin."', username = '".$username."', passwords = '".$passwords."' WHERE idAdmin = $idAdmin";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteAdmin($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM admins WHERE idAdmin = $id");

    return mysqli_affected_rows($conn);
}

function addOlahraga($data){
    global $conn;
    $idOlahraga = htmlspecialchars($data["idOlahraga"]);
    $tipeOlahraga = htmlspecialchars($data["tipeOlahraga"]);
    $urlGambarMain = htmlspecialchars($data["urlGambarMain"]);
    $query = ("INSERT INTO olahraga
                VALUES
                ('$idOlahraga','$tipeOlahraga','$urlGambarMain')");
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateOlahraga($data){
    global $conn;
    $idOlahraga = htmlspecialchars($data["idOlahraga"]);
    $tipeOlahraga = htmlspecialchars($data["tipeOlahraga"]);
    $urlGambarMain = htmlspecialchars($data["urlGambarMain"]);

    $query = ("UPDATE olahraga SET idOlahraga = '".$idOlahraga."', tipeOlahraga = '".$tipeOlahraga."', urlGambarMain = '".$urlGambarMain."'
                WHERE idOlahraga = $idOlahraga");
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteOlahraga($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM olahraga WHERE idOlahraga = $id");

    return mysqli_affected_rows($conn);
}

function deleteDtlOlahraga($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM dtlolahraga WHERE idDtlOlahraga = $id");

    return mysqli_affected_rows($conn);
}

function addVideo($data){
    global $conn;
    $idVideo = htmlspecialchars($data["idVideo"]);
    $judulVideo = htmlspecialchars($data["judulVideo"]);
    $linkVideo = htmlspecialchars($data["linkVideo"]);
    $levels = htmlspecialchars($data["levels"]);
    $durasi = htmlspecialchars($data["durasi"]);
    $peralatan = htmlspecialchars($data["peralatan"]);
    $idDtlOlahraga = htmlspecialchars($data["idDtlOlahraga"]);
    $idInstruktur = htmlspecialchars($data["idInstruktur"]);

    $query = ("INSERT INTO video VALUES('$idVideo','$judulVideo','$linkVideo','$levels','$durasi','$peralatan','$idDtlOlahraga','$idInstruktur')");

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateVideo($data){
    global $conn;
    $idVideo = htmlspecialchars($data["idVideo"]);
    $judulVideo = htmlspecialchars($data["judulVideo"]);
    $linkVideo = htmlspecialchars($data["linkVideo"]);
    $levels = htmlspecialchars($data["levels"]);
    $durasi = htmlspecialchars($data["durasi"]);
    $peralatan = htmlspecialchars($data["peralatan"]);
    $idDtlOlahraga = htmlspecialchars($data["idDtlOlahraga"]);
    $idInstruktur = htmlspecialchars($data["idInstruktur"]);

    $query = ("UPDATE video SET idVideo = '".$idVideo."', judulVideo = '".$judulVideo."', linkVideo = '".$linkVideo."', levels = '".$levels."', durasi = '".$durasi."', peralatan = '".$peralatan."', idDtlOlahraga = '".$idDtlOlahraga."', idInstruktur = '".$idInstruktur."' WHERE idVideo = $idVideo");

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteVideo($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM video WHERE idVideo = $id");

    return mysqli_affected_rows($conn);
}

function addInstruktur($data){
    global $conn;
    $idInstruktur = htmlspecialchars($data["idInstruktur"]);
    $namaInstruktur = htmlspecialchars($data["namaInstruktur"]);

    $query = ("INSERT INTO instruktur VALUES ('$idInstruktur', '$namaInstruktur')");

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateInstruktur($data){
    global $conn;
    $idInstruktur = htmlspecialchars($data["idInstruktur"]);
    $namaInstruktur = htmlspecialchars($data["namaInstruktur"]);

    $query = ("UPDATE instruktur SET idInstruktur = '".$idInstruktur."', namaInstruktur = '".$namaInstruktur."' WHERE idInstruktur = $idInstruktur");

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function deleteInstruktur($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM instruktur WHERE idInstruktur = $id");

    return mysqli_affected_rows($conn);
}