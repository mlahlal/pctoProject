<?php
    require_once '../middleware/auth.php';
    checkAuth();
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
        <?php include 'components/navbar.html'; ?>
        <div id="content">
            <div id="hero">
                <h1>Statistiche</h1>
                <h4>Usa questi dati per aumentare qualcosa e diventare il G.O.A.T</h4>
            </div>
            <br><br>
            <div id="boxes">
                <div class="infoBox">
                    <span class="info">59</span>
                    <span class="comment">Projects</span>
                </div>
                <div class="infoBox">
                    <span class="info">5</span>
                    <span class="comment">Students</span>
                </div>
                <div class="infoBox">
                    <span class="info">74%</span>
                    <span class="comment">Conversione</span>
                </div>
                <div class="infoBox">
                    <span class="info">17</span>
                    <span class="comment">Anni di collaborazione</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>