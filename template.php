<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM test";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();
            // trattare informazioni ricevute
        } else {
            // nessun risultato
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCTO By Lahlal</title>
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
        </div>
    </div>
</body>
</html>