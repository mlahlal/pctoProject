<?php
    require_once 'middleware/auth.php';
    require_once 'utils/db.php';
    checkAuth();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $search = $_GET["search"];
        $regione = $_GET["regione"];
        $provincia = $_GET["provincia"];
        
        if (isset($search) || isset($regione) || isset($provincia)) {
            $result = query("SELECT * FROM business WHERE field='$search'");
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["name"];
                echo $name;
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCTO By Lahlal</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
    <?php include 'components/sidebar.html'; ?>
    <div id="main">
        <div id="navWrapper">
            <div id="nav">
                <span id="nam">
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
                <h1>Cerca l'azienda che fa per te</h1>
                <form action="search.php" method="get" id="searchWrapper">
                    <input type="text" placeholder="Search" id="search" name="search">
                    <select name="regione" id="regione">
                        <option value="lombardia">lombardia</option>
                        <option value="lazio">lazio</option>
                        <option value="sicilia">sicilia</option>
                    </select>
                    <select name="provincia" id="provincia">
                        <option value="brescia">brescia</option>
                        <option value="roma">roma</option>
                        <option value="palermo">palermo</option>
                    </select>
                    <button>SEARCH</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>