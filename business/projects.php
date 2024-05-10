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
    <link rel="stylesheet" href="css/projects.css">
    <script>
        function handleEdit(){
            var e = window.event;
            document.getElementById("popup").style.display = "block";
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        }
    </script>
</head>
<body>
    <div id="popup">
        <form action="">
            Nome progetto : <input type="text" name="nome_progetto" id="nome_progetto">
            Data inizio : <input type="date" name="data_inizio" id="data_inzio">
            <input type="submit" value="modifica">
        </form>
    </div>
    <?php include 'components/sidebar.html'; ?>
    <div id="main">
        <?php include 'components/navbar.html'; ?>
        <div id="content">
            <div class="infoBox">
                <h2>Progetti</h2>
                <div class="project">
                    <span>Nome progetto</span>
                    <img src="../assets/svg/edit.svg" alt="star icon" onclick="handleEdit()">
                </div>
                <div class="project">
                    <span>Nome progetto</span>
                </div>
                <div class="project">
                    
                </div>
                <div class="project">
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>