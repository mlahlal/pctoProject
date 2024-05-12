<?php
    function query($sql) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pcto";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
            
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $temp = [];
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($temp, $row);
            }
            return $temp;
        } else {
            return false;
        }
    }
?>
