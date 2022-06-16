<?php
require 'all/functions.php';

$query = 'SELECT * FROM olahraga';
$result = mysqli_query($conn, $query);
if (isset($_POST['workout'])) {
    header("Location:all/Olahraga.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="all/Main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Workout</title>
</head>

<body>

    <header>
        <img src="all/holding-dumbbell-business-name-logo-design-template-black-dumbbell-hand-wearing-red-glove-holding-dumbbell-business-172910318.jpg" alt="">
        <div id="search">
            <form method="GET" action="all/Search.php">
                <input type="text" name="search" placeholder="Type to Search...">
                <button class="search">Search</button>
            </form>
        </div>
        <a href="all/Login_Admin.php"><img id="login" src="https://iconarchive.com/download/i91959/icons8/windows-8/Users-Administrator.ico" alt=""></a>
    </header>

    <main>
        <div class="luar">
            <table>
                <?php foreach ($result as $row) : ?>
                    <form action="" method="POST">
                        <tr>
                            <td>
                                <div class="left reveal">
                                    <img id="olg" width="300px" height="200px" src="<?= $row["urlGambarMain"] ?>" alt="">
                                </div>
                            </td>
                            <td>
                                <div class="right reveal">
                                    <a href="all/Olahraga.php?id=<?= $row['idOlahraga'] ?>"><?= $row["tipeOlahraga"] ?></a>
                                </div>
                            </td>
                        </tr>
                    </form>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
    <br>
    <footer id="foot">
        <table id="footer">
            <tr>
                <td>
                    <a href="https://www.youtube.com/">
                        <img id="yt" src="all/youtube-logo.jpg" alt="">
                    </a>
                    <a href="https://www.instagram.com/?hl=en">
                        <img id="ins" src="all/instagram-logo.png" alt="">
                    </a>
                    <a href="https://www.facebook.com/">
                        <img id="face" src="all/facebook-logo.png" alt="">
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
        window.addEventListener("scroll", reveal);
        reveal();
    </script>
</body>

</html>