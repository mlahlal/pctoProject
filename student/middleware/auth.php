<?php
    session_start();
    function checkAuth() {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
            header("Location: login.php");
        }
    }
?>