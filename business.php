<?php
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
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="business.css">
</head>
<body>
    <div id="sidebar">
        <h1 class="brand">PCTO By Lahlal</h1>
        <ul class="menu">
            <li class="menu_voice active_voice">Voice 1</li>
            <li class="menu_voice">Voice 2</li>
            <li class="menu_voice">Voice 3</li>
            <li class="menu_voice">Voice 4</li>
        </ul>
    </div>
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
                    <span> Ragione sociale </span>
                    
                    <span> Rappresentante </span>
                    
                    <span> Ambito </span>
                    
                    <span> Numero dipendenti </span>
                    
                    <span> Sede </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>