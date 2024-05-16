<?php
    // function query($sql) {
    //     $servername = "localhost";
    //     $username = "root";
    //     $password = "";
    //     $dbname = "pcto";
        
    //     $conn = mysqli_connect($servername, $username, $password, $dbname);
        
    //     if (!$conn) {
    //         die("Connection failed: " . mysqli_connect_error());
    //     }
            
    //     $result = mysqli_query($conn, $sql);

    //     if ($result instanceof MySQLi_Result && mysqli_num_rows($result) > 0) {
    //         $temp = [];
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             array_push($temp, $row);
    //         }
    //         return $temp;
    //     } else if (gettype($result) == "boolean" && $result == true) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

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
