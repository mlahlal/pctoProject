<?php
    session_start();
	require "./includes/auth.php";
    require "./includes/stdFunc.php";

    if (isset($_SESSION["user"]) && $_SESSION["user"]["type"] == "studente") {
	} else {
		header("Location: login.php");
	}
	
    $voices = ["Dashboard", "Search", "Requests", "Profile"];
    $trendBusiness = getTrendBusiness();
	$newBusiness = getNewBusiness();
    $requests = getRequests();
	
    require("components/sidebar.html");
	require("templates/student/index.html");
    require("templates/student/search.html");
    require("templates/student/profile.html");
    require("templates/student/business.html");
    require("templates/student/requests.php");
?>
