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
		$temp = mysqli_fetch_assoc($result);
		return $temp;
	} else {
            return false;
        }
    }
?>
