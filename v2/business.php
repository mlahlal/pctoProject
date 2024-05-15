<?php
	require "./includes/auth.php";
	require "./includes/bsnFunc.php";
	
	check_auth();

	$voices = ["Dashboard", "Requests", "Projects", "Profile"];
	$trendBusiness = [["name"=>"Google", "ambito"=>"informatica", "sede"=>"Milano"]];

	require("components/sidebar.html");
	require("templates/business/index.html");
	require("templates/business/requests.html");
	require("templates/business/projects.html");
	require("templates/business/profile.html");
	require("templates/business/student.html");
?>
<link rel="stylesheet" href="css/global.css">