<?php
    require("db.php");

    function getStudentRequests() {
        $query = "SELECT * FROM requests";
        $result = query($query);
        header('Content-Type: application/json');
        return json_encode($result);
    }

    if (isset($_POST["getStudentRequests"])) {
        echo getStudentRequests();
    }

    echo getStudentRequests();
?>