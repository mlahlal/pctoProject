<?php
	session_start();

	if (isset($_SESSION["user"])) {
		$type = $_SESSION["user"]["type"];
		switch($type) {
			case "student":
				header("Location: http://localhost/pcto/student.php");
				break;
			case "delegate":
				header("Location: http://localhost/pcto/business.php");
				break;
			case "school":
				header("Location: http://localhost/pcto/index.php");
				break;
			default:
				header("Location: http://localhost/pcto/login.php");
				break;
		}
	} else {
		header("Location: login.php");
	}
?>
