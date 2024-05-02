<?php
    require_once 'middleware/auth.php';
    checkAuth();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id_business = $_GET["idbusiness"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // $sql = "SELECT * FROM business WHERE id_business='$id_business'";
        // $result = mysqli_query($conn, $sql);

        // if (mysqli_num_rows($result) > 0) {
        //     $row = $result->fetch_assoc();
        //     // prendere info del business e metterle in delle variabili
        // } else {
        //     // nessun risultato
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCTO By Lahlal</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/business.css">
    <script>
        function handleStar() {
            var e = window.event;
            if (e.target.src === "http://localhost/pcto/assets/svg/emptystar.svg") {
                e.target.src = "http://localhost/pcto/assets/svg/filledstar.svg";
            } else {
                e.target.src = "http://localhost/pcto/assets/svg/emptystar.svg";
            }
        }
    </script>
</head>
<body>
    <?php include 'components/sidebar.html';?>
    <div id="main">
        <div id="navWrapper">
            <div id="nav">
                <span id="search">
                    <img src="./assets/svg/search.svg" alt="search icon" class="icon" >
                    <!-- <input type="text" name="txtsearch" id="txtsearch"> -->
                </span>
                <span id="theme" onclick="changeTheme();">
                    <img src="./assets/svg/sun.svg" alt="theme icon" class="icon" id="themeIcon">
                </span>
                <span id="profile">
                    <img src="./assets/svg/avatar.svg" alt="avatar icon" class="icon">
                    <!-- <span id="profilePopup"></span> -->
                </span>
            </div>
            <h1 id="actual_page">Aziende</h1>
        </div>
        <div id="content">
            <div id="banner">
                <div id="profilePic">
                    <img src="assets/svg/avatar.svg" alt="profile picture">
                </div>
            </div>
            <h1 id="businessName"><?php echo $id_business; ?></h1>
            <div id="boxes">
                <div class="infoBox">
                    <h2>Informazioni</h2>
                    <div class="info">
                        <span class="infoTitle"> Ragione sociale </span>
                        <span> <?php echo $id_business; ?> </span>
                    </div>

                    <div class="info">
                        <span class="infoTitle"> Rappresentante </span>
                        <span> <?php echo "Andrea Schinocca"; ?> </span>
                    </div>

                    <div class="info">
                        <span class="infoTitle"> Ambito </span>
                        <span> <?php echo "Informatica"; ?> </span>
                    </div>

                    <div class="info">
                        <span class="infoTitle"> Numero dipendenti </span>
                        <span> <?php echo "420"; ?> </span>
                    </div>

                    <div class="info">
                        <span class="infoTitle"> Sede </span>
                        <span> <?php echo "Non Parla Proprio (NPP)"; ?> </span>
                    </div>
                </div>
                <div class="infoBox">
                    <h2>Progetti</h2>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis quisquam alias, modi nihil eligendi beatae aspernatur maxime aliquam soluta excepturi saepe maiores impedit, dignissimos, temporibus quod fugit laudantium fugiat ipsa.</span>
                    <div class="project">
                        <span class="projectTitle">Nome progetto</span>
                        <div>
                            <span class="projectStart">Data inizio</span>
                            <a href="" class="projectLink">Visualizza</a>
                        </div>
                        <img src="assets/svg/emptystar.svg" alt="star icon" onclick="handleStar()">
                    </div>
                    <div class="project">
                        <span class="projectTitle">Nome progetto</span>
                        <div>
                            <span class="projectStart">Data inizio</span>
                            <a href="" class="projectLink">Visualizza</a>
                        </div>
                        <img src="assets/svg/filledstar.svg" alt="star icon">
                    </div>
                    <div class="project">
                        <span class="projectTitle">Nome progetto</span>
                        <div>
                            <span class="projectStart">Data inizio</span>
                            <a href="" class="projectLink">Visualizza</a>
                        </div>
                        <img src="assets/svg/emptystar.svg" alt="star icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>