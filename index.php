<?php
	session_start();

	if (isset($_SESSION["user"])) {
		$type = $_SESSION["user"]["type"];
		switch($type) {
			case "student":
				header("Location: http://internify.lahlalmouad.it/pcto/student.php");
				break;
			case "delegate":
				header("Location: http://internify.lahlalmouad.it/pcto/business.php");
				break;
			case "school":
				header("Location: http://internify.lahlalmouad.it/pcto/index.php");
				break;
			default:
				header("Location: http://internify.lahlalmouad.it/pcto/login.php");
				break;
		}
	} else {
		header("Location: login.php");
	}
?>
