<?php
require 'functions.php';
if ($_GET) {
    $idDtlOlahraga = $_GET['id'];
    $Bgnr = 'Beginner';
    $Adv = 'Advanced';
    $Int = 'Intermediate';
    $querydtl = "SELECT * FROM dtlOlahraga WHERE idDtlOlahraga = $idDtlOlahraga";
    $queryVidBeg = "Select dtlolahraga.namaOlahraga as namaOlahraga, dtlolahraga.deskOlahraga as deskOlahraga, video.judulVideo as judulVideo, video.linkVideo as linkVideo, video.levels as levels, video.durasi as durasi, video.peralatan as peralatan, instruktur.namaInstruktur as instruktur FROM dtlOlahraga INNER JOIN video ON video.idDtlOlahraga = dtlolahraga.idDtlOlahraga INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur WHERE dtlolahraga.idDtlOlahraga = '".$idDtlOlahraga."' AND video.levels = '".$Bgnr."'";
    $queryVidAdv = "Select dtlolahraga.namaOlahraga as namaOlahraga, dtlolahraga.deskOlahraga as deskOlahraga, video.judulVideo as judulVideo, video.linkVideo as linkVideo, video.levels as levels, video.durasi as durasi, video.peralatan as peralatan, instruktur.namaInstruktur as instruktur FROM dtlOlahraga INNER JOIN video ON video.idDtlOlahraga = dtlolahraga.idDtlOlahraga INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur WHERE dtlolahraga.idDtlOlahraga = '".$idDtlOlahraga."' AND video.levels = '".$Adv."'";
    $queryVidInt = "Select dtlolahraga.namaOlahraga as namaOlahraga, dtlolahraga.deskOlahraga as deskOlahraga, video.judulVideo as judulVideo, video.linkVideo as linkVideo, video.levels as levels, video.durasi as durasi, video.peralatan as peralatan, instruktur.namaInstruktur as instruktur FROM dtlOlahraga INNER JOIN video ON video.idDtlOlahraga = dtlolahraga.idDtlOlahraga INNER JOIN instruktur ON video.idInstruktur = instruktur.idInstruktur WHERE dtlolahraga.idDtlOlahraga = '".$idDtlOlahraga."' AND video.levels = '".$Int."'";;
    $resultdtl = mysqli_query($conn, $querydtl);
    $resultVidBeg = mysqli_query($conn, $queryVidBeg);
    $resultVidAdv = mysqli_query($conn, $queryVidAdv);
    $resultVidInt = mysqli_query($conn, $queryVidInt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dtlOlahraga.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($resultdtl as $rowdtl) : ?>
    <title><?= $rowdtl['namaOlahraga'] ?> Tutorial</title>
    <?php endforeach; ?>
</head>

<body>

    <header>
        <div id="header">
            <img src="holding-dumbbell-business-name-logo-design-template-black-dumbbell-hand-wearing-red-glove-holding-dumbbell-business-172910318.jpg" alt="">
            <?php foreach ($resultdtl as $rowdtl) : ?>
                <div id="title">
                    <h1><?= strtoupper($rowdtl['namaOlahraga']) ?></h1>
                </div>
            <?php endforeach; ?>
            <br>
            <div id="navbar">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a>CATEGORY</a>
                        <ul>
                            <li><a href="#Beginner">Beginner</a></li>
                            <li><a href="#Intermediate">Intermediate</a></li>
                            <li><a href="#Advanced">Advanced</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <br>
            <br>
        </div>
    </header>

    <main>
        <p>
            <?php foreach ($resultdtl as $rowdtl) : ?>
                <span>Deskripsi <?= $rowdtl['namaOlahraga'] ?></span>
                <br>
                <br>
                <?= $rowdtl['deskOlahraga'] ?>
            <?php endforeach; ?>
        </p>
        <div class="video">
            <br id="Beginner">
            <?php foreach ($resultdtl as $rowdtl) : ?>
                <h2 id="Beginner"><?= strtoupper($rowdtl['namaOlahraga']) ?> FOR BEGINNERS</h2>
            <?php endforeach; ?>
            <table>
                <tr>
                    <?php foreach ($resultVidBeg as $rowBeg) : ?>
                        <td>
                            <iframe width="425" height="215" src="https://www.youtube.com/embed/<?= $rowBeg['linkVideo'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h4>
                                <pre>
                                Durasi     : <?= floor($rowBeg['durasi']/60) ?> Jam <?= $rowBeg['durasi']%60 ?> Menit<br>
                                Instruktur : <?= $rowBeg['instruktur'] ?> <br>
                                Peralatan  : <?= $rowBeg['peralatan'] ?>
                                </pre>
                            </h4>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
            <br id="Intermediate">
            <br>
            <br>
            <br>

            <?php foreach ($resultdtl as $rowdtl) : ?>
                <h2 id="Intermediate"><?= strtoupper($rowdtl['namaOlahraga']) ?> FOR INTERMEDIATE</h2>
            <?php endforeach; ?>
            <table>
                <tr>
                    <?php foreach ($resultVidInt as $rowInt) : ?>
                        <td>
                            <iframe width="425" height="215" src="https://www.youtube.com/embed/<?= $rowInt['linkVideo'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h4>
                                <pre>
                                Durasi     : <?= floor($rowInt['durasi']/60) ?> Jam <?= $rowInt['durasi']%60 ?> Menit<br>
                                Instruktur : <?= $rowInt['instruktur'] ?> <br>
                                Peralatan  : <?= $rowInt['peralatan'] ?>
                                </pre>
                            </h4>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
            <br id="Advanced">
            <br>
            <br>
            <br>

            <?php foreach ($resultdtl as $rowdtl) : ?>
                <h2 id="Advanced"><?= strtoupper($rowdtl['namaOlahraga']) ?> FOR ADVANCED</h2>
            <?php endforeach; ?>
            <table>
                <tr>
                    <?php foreach ($resultVidAdv as $rowAdv) : ?>
                        <td>
                            <iframe width="425" height="215" src="https://www.youtube.com/embed/<?= $rowAdv['linkVideo'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h4>
                                <pre>
                                Durasi     : <?= floor($rowAdv['durasi']/60) ?> Jam <?= $rowAdv['durasi']%60 ?> Menit<br>
                                Instruktur : <?= $rowAdv['instruktur'] ?><br>
                                Peralatan  : <?= $rowAdv['peralatan'] ?>
                                </pre>
                            </h4>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
    </main>

    <footer>
        <table id="footer">
            <tr>
                <td>
                    <a href="https://www.youtube.com/">
                        <img id="yt" src="youtube-logo.jpg" alt="">
                    </a>
                    <a href="https://www.instagram.com/?hl=en">
                        <img id="ins" src="instagram-logo.png" alt="">
                    </a>
                    <a href="https://www.facebook.com/">
                        <img id="face" src="facebook-logo.png" alt="">
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Copyright &copy; 2022 TI UKDW</p>
                </td>
            </tr>
        </table>
    </footer>

    <script>
        window.onscroll = function() {
            myFunction()
        };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>

</body>

</html>