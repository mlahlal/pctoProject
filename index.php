<?php
    session_start();
    
    if (isset($_SESSION["logged"])) {
        if ($_SESSION["logged"] == false) {
            header('Location: login.php');    
        }
    } else {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pcto by mouad</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="index.css">
    <script>
        function changeTheme() {
            var themeIcon = document.getElementById("themeIcon");
            if (themeIcon.src === "http://localhost/pcto/assets/svg/sun.svg") {
                themeIcon.src = "http://localhost/pcto/assets/svg/moon.svg";
            } else {
                themeIcon.src = "http://localhost/pcto/assets/svg/sun.svg";
            }
        }
    </script>
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
            <div id="hero">
                <h1>Esplora, scegli e lavora</h1>
                <h4>Trova l'azienda che più ti piace e manda la tua richiesta</h4>
                <span>
                    <button>Esplora adesso</button>
                    <button>Tutorial</button>
                </span>
            </div>
            <div id="trends">
                <h1>Aziende in tendenza</h1>
                <div class="business_list">
                    <a href="business.php?idbusiness=blablabla">
                        <div class="business_card">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQafX9X4oVKEEpBfQvuaw-VyYNuaYCyzhRwght_1_JfmA&s" alt="business logo">
                            <h3>Google</h3>
                            <h5>Ambito: informatica</h5>
                            <h5>Sede: Brescia (BS)</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div id="new">
                <h1>Nuove aziende</h1>
                <div class="business_list">
                    <div class="business_card">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQafX9X4oVKEEpBfQvuaw-VyYNuaYCyzhRwght_1_JfmA&s" alt="business logo">
                        <h3>Google</h3>
                        <h5>Ambito: informatica</h5>
                        <h5>Sede: Brescia (BS)</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>