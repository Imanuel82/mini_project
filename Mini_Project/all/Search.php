<?php
require("functions.php");

$search = null;

$sql = "SELECT olahraga.idOlahraga as idOlahraga, 
        olahraga.tipeOlahraga as tipeOlahraga, 
        dtlolahraga.namaOlahraga as namaOlahraga, 
        dtlolahraga.deskOlahraga as deskOlahraga, 
        dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
        video.judulVideo as judul,
        video.linkVideo as linkVideo, 
        video.levels as levels, 
        video.durasi as durasi, 
        video.peralatan as peralatan,
        instruktur.namaInstruktur as instruktur
        FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
        INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
        INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur 
        WHERE olahraga.idOlahraga = 'null'";

$query1 = "SELECT * FROM olahraga";
$result1 = mysqli_query($conn, $query1);

if ($_GET) {
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        if($search!=""){
            $sql = "SELECT olahraga.idOlahraga as idOlahraga, 
            olahraga.tipeOlahraga as tipeOlahraga, 
            dtlolahraga.namaOlahraga as namaOlahraga, 
            dtlolahraga.deskOlahraga as deskOlahraga, 
            dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
            video.judulVideo as judul,
            video.linkVideo as linkVideo, 
            video.levels as levels, 
            video.durasi as durasi, 
            video.peralatan as peralatan,
            instruktur.namaInstruktur as instruktur
            FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
            INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
            INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur
            WHERE olahraga.tipeOlahraga LIKE '%$search%' 
            OR dtlOlahraga.namaOlahraga LIKE '%$search%' 
            OR video.judulVideo LIKE '%$search%'
            OR video.levels LIKE '%$search%'
            OR instruktur.namaInstruktur LIKE '%$search%'";
        }
    } else {
        if ($_GET['nama'] == null) {
            unset($_GET['nama']);
        }
        if ($_GET['tipe'] == null) {
            unset($_GET['tipe']);
        }
        if ($_GET['levels'] == null) {
            unset($_GET['levels']);
        }
        if (isset($_GET['nama'])) {
            $nama = $_GET['nama'];
            $sql = "SELECT olahraga.idOlahraga as idOlahraga, 
            olahraga.tipeOlahraga as tipeOlahraga, 
            dtlolahraga.namaOlahraga as namaOlahraga, 
            dtlolahraga.deskOlahraga as deskOlahraga, 
            dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
            video.judulVideo as judul,
            video.linkVideo as linkVideo, 
            video.levels as levels, 
            video.durasi as durasi, 
            video.peralatan as peralatan,
            instruktur.namaInstruktur as instruktur
            FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
            INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
            INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur
            WHERE dtlOlahraga.namaOlahraga LIKE '%$nama%'";

            if (isset($_GET['tipe'])) {
                $tipe = $_GET['tipe'];
                $sql = "SELECT olahraga.idOlahraga as idOlahraga, 
                olahraga.tipeOlahraga as tipeOlahraga, 
                dtlolahraga.namaOlahraga as namaOlahraga, 
                dtlolahraga.deskOlahraga as deskOlahraga, 
                dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
                video.judulVideo as judul,
                video.linkVideo as linkVideo, 
                video.levels as levels, 
                video.durasi as durasi, 
                video.peralatan as peralatan,
                instruktur.namaInstruktur as instruktur
                FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
                INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
                INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur
                WHERE dtlOlahraga.namaOlahraga LIKE '%$nama%' AND olahraga.tipeOlahraga = '" . $tipe . "'";

                if (isset($_GET['levels'])) {
                    $level = $_GET['levels'];
                    $sql = "SELECT olahraga.idOlahraga as idOlahraga, 
                    olahraga.tipeOlahraga as tipeOlahraga, 
                    dtlolahraga.namaOlahraga as namaOlahraga, 
                    dtlolahraga.deskOlahraga as deskOlahraga, 
                    dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
                    video.judulVideo as judul,
                    video.linkVideo as linkVideo, 
                    video.levels as levels, 
                    video.durasi as durasi, 
                    video.peralatan as peralatan,
                    instruktur.namaInstruktur as instruktur
                    FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
                    INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
                    INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur
                    WHERE dtlOlahraga.namaOlahraga LIKE '%$nama%' AND olahraga.tipeOlahraga = '" . $tipe . "' AND video.levels = '" . $level . "'";
                }
            } else if (isset($_GET['levels'])) {
                $level = $_GET['levels'];
                $sql = "SELECT olahraga.idOlahraga as idOlahraga, 
                olahraga.tipeOlahraga as tipeOlahraga, 
                dtlolahraga.namaOlahraga as namaOlahraga, 
                dtlolahraga.deskOlahraga as deskOlahraga, 
                dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
                video.judulVideo as judul,
                video.linkVideo as linkVideo, 
                video.levels as levels, 
                video.durasi as durasi, 
                video.peralatan as peralatan,
                instruktur.namaInstruktur as instruktur
                FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
                INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
                INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur
                WHERE dtlOlahraga.namaOlahraga LIKE '%$nama%' AND video.levels = '" . $level . "'";
            }
        } else if (isset($_GET['tipe'])) {
            $tipe = $_GET['tipe'];
            $sql = "SELECT olahraga.idOlahraga as idOlahraga, 
            olahraga.tipeOlahraga as tipeOlahraga, 
            dtlolahraga.namaOlahraga as namaOlahraga, 
            dtlolahraga.deskOlahraga as deskOlahraga, 
            dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
            video.judulVideo as judul,
            video.linkVideo as linkVideo, 
            video.levels as levels, 
            video.durasi as durasi, 
            video.peralatan as peralatan,
            instruktur.namaInstruktur as instruktur
            FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
            INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
            INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur
            WHERE olahraga.tipeOlahraga = '" . $tipe . "'";

            if (isset($_GET['levels'])) {
                $level = $_GET['levels'];
                $sql = "SELECT olahraga.idOlahraga as idOlahraga, 
                olahraga.tipeOlahraga as tipeOlahraga, 
                dtlolahraga.namaOlahraga as namaOlahraga, 
                dtlolahraga.deskOlahraga as deskOlahraga, 
                dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
                video.judulVideo as judul,
                video.linkVideo as linkVideo, 
                video.levels as levels, 
                video.durasi as durasi, 
                video.peralatan as peralatan,
                instruktur.namaInstruktur as instruktur
                FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
                INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
                INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur
                WHERE olahraga.tipeOlahraga = '" . $tipe . "' AND video.levels = '" . $level . "'";
            }
        } else if (isset($_GET['levels'])) {
            $level = $_GET['levels'];
            $sql = "SELECT olahraga.idOlahraga as idOlahraga, 
            olahraga.tipeOlahraga as tipeOlahraga, 
            dtlolahraga.namaOlahraga as namaOlahraga, 
            dtlolahraga.deskOlahraga as deskOlahraga, 
            dtlolahraga.gambarDtlOlahraga as gambarDtlOlahraga, 
            video.judulVideo as judul,
            video.linkVideo as linkVideo, 
            video.levels as levels, 
            video.durasi as durasi, 
            video.peralatan as peralatan,
            instruktur.namaInstruktur as instruktur
            FROM olahraga INNER JOIN dtlolahraga ON olahraga.idOlahraga=dtlolahraga.idOlahraga 
            INNER JOIN video ON dtlolahraga.idDtlOlahraga = video.idDtlOlahraga
            INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur
            WHERE video.levels = '" . $level . "'";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Search.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <a href="../index.php"><img src="holding-dumbbell-business-name-logo-design-template-black-dumbbell-hand-wearing-red-glove-holding-dumbbell-business-172910318.jpg" alt=""></a>
        <div id="search">
            <form method="GET" action="Search.php">
                <input type="text" name="search" placeholder="Type to Search...">
                <button id="search" class="search">Search</button>
            </form>
        </div>
        <a href="Login_Admin.php"><img id="login" src="https://iconarchive.com/download/i91959/icons8/windows-8/Users-Administrator.ico" alt=""></a>
    </header>
    <main>
    <form action="" method="GET">
        <div class="advs">
            <label for="nama">Nama Olahraga</label>
            <input class="input2" type="text" name="nama" id="nama" placeholder="Nama Olahraga">
        </div>
        <div class="advs">
            <label for="tipe">Tipe Olahraga</label>
            <select name="tipe" id="tipe">
                <option value="">None</option>
                <?php foreach ($result1 as $row) : ?>
                    <option value="<?= $row['tipeOlahraga'] ?>"><?= $row['tipeOlahraga'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="advs">
            <label for="levels">Level</label>
            <select name="levels" id="levels">
                <option value="">None</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>
        <div>
            <button class="input2" idtype="submit" value="Search"> Search</button>
    </form> <br>
    <?php
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        if (isset($search)) {
            echo "<h1>Search result for '" . $search . "'</h1>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<table> <tr><td>';
            echo '<div class="container"><div id="slide"><div id="olg"><a onclick="reveal()"><img class="konten" width="300px" height="200px" src="' . $row['gambarDtlOlahraga'] . '"></a><div class="reveal"><iframe width="300" height="200" src="https://www.youtube.com/embed/' . $row['linkVideo'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                <div id="container3"><p>' . $row['deskOlahraga'] . '</p><br>
                <pre>
Tipe Olahraga : ' . $row['tipeOlahraga'] . '
Nama Olahraga : ' . $row['namaOlahraga'] . '
Level         : ' . $row['levels'] . '
Instruktur    : ' . $row['instruktur'] . '
Durasi        : ' . $row['durasi'] . '
Peralatan     : ' . $row['peralatan'] . '
                </pre></div></div></div>';
            echo '</div>';
            echo '</td></tr></table>';
        }
    } else {
        echo "<p class='s'>No Workout Found</p>";
    }
    ?>
    </main>
</body>

</html>
<script>
    window.onscroll = function() {
        myFunction()
    };

    var search = document.getElementById("search");
    var sticky = search.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            search.classList.add("sticky")
        } else {
            search.classList.remove("sticky");
        }
    }
</script>
<script>
    function reveal() {
        var reveals = document.querySelectorAll(".reveal")
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 100;
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }
</script>


<script>
    function cek(){
        cari  = document.getElementById('search').innerText;
        console.log(cari)
    }
</script>