<?php
    function query($sql, $data) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pcto";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->execute_query($sql, $data);
        
        if ($result instanceof MySQLi_Result) {
            $temp = [];
            foreach ($result as $row) {
                array_push($temp, $row);
            }
            return $temp;
        } else if (gettype($result) == "boolean" && $result == true) {
            return true;
        } else {
            return false;
        }
    }
?>
