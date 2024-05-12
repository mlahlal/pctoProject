<?php
    require("db.php");
    
    function getNewBusiness() {
        $query = "SELECT * FROM business WHERE created_at >= '2024-05-01' LIMIT 10";
        $result = query($query);
        return $result;
    }

    function getTrendBusiness() {
        $query = "SELECT * FROM business WHERE nstudent >= 30 LIMIT 10";
        $result = query($query);
        return $result;
    }

    function searchBusiness() {
        $searchtxt = $_POST["search"];
        $regione = $_POST["regione"];
        $provincia = $_POST["provincia"];
        // $query = "SELECT * FROM business WHERE field = '".$_POST["search"]."' AND regione = '".$_POST["regione"]."' AND provincia = '".$_POST["provincia"]."'";
        $query = "SELECT * FROM business WHERE MATCH (field) AGAINST ('$searchtxt')";
        $result = query($query);

        header('Content-Type: application/json');
        return json_encode($result);
    }

    function getProjects() {
        $query = "SELECT * FROM project WHERE id_business = '" . $_POST["id_business"] . "'";
        $result = query($query);
        header('Content-Type: application/json');
        return json_encode($result);
    }

    if (isset($_POST["searchBusiness"])) {
        echo searchBusiness();
    }
    if (isset($_POST["getProjects"])) {
        echo getProjects();
    }
?>