<?php
    require_once 'middleware/auth.php';
    checkAuth();

    $trendBusiness = [["name"=>"Google", "ambito"=>"informatica", "sede"=>"Milano"], ["name"=>"Microsoft", "ambito"=>"informatica", "sede"=>"Milano"]];
    $newBusiness = [["name"=>"Feralpi", "ambito"=>"meccanica", "sede"=>"Lonato"]];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pcto by mouad</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
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
    <?php include 'components/sidebar.html';?>
    <div id="main">
        <div id="navWrapper">
            <div id="nav">
                <span id="search">
                    <img src="./assets/svg/search.svg" alt="search icon" class="icon" >
                </span>
                <span id="theme" onclick="changeTheme();">
                    <img src="./assets/svg/sun.svg" alt="theme icon" class="icon" id="themeIcon">
                </span>
                <span id="profile">
                    <img src="./assets/svg/avatar.svg" alt="avatar icon" class="icon">
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
                    <?php
                        foreach ($trendBusiness as $business) {
                            echo "<div class='business_card'> <a href='business.php?idbusiness=".$business["name"]."'> <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQafX9X4oVKEEpBfQvuaw-VyYNuaYCyzhRwght_1_JfmA&s' alt='business logo'> <h3>".$business["name"]."</h3> <h5>Ambito: ".$business["ambito"]."</h5> <h5>Sede: ".$business["sede"]."</h5> </a> </div>";
                        }
                    ?>
                </div>
            </div>
            <div id="new">
                <h1>Nuove aziende</h1>
                <div class="business_list">
                    <?php
                        foreach ($newBusiness as $business) {
                            echo "<div class='business_card'> <a href='business.php?idbusiness=".$business["name"]."'> <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQafX9X4oVKEEpBfQvuaw-VyYNuaYCyzhRwght_1_JfmA&s' alt='business logo'> <h3>".$business["name"]."</h3> <h5>Ambito: ".$business["ambito"]."</h5> <h5>Sede: ".$business["sede"]."</h5> </a> </div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>