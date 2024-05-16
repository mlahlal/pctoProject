<?php
	session_start();
	require "./includes/auth.php";
	require "./includes/bsnFunc.php";
	
	if (isset($_SESSION["user"]) && $_SESSION["user"]["type"] == "delegate") {
	} else {
		header("Location: login.php");
	}

	$voices = ["Dashboard", "Requests", "Projects", "Profile"];
	$trendBusiness = [["name"=>"Google", "ambito"=>"informatica", "sede"=>"Milano"]];
	$projects = getProjects();

	require("components/sidebar.html");
	require("templates/business/index.html");
	require("templates/business/requests.html");
	require("templates/business/student.html");
	require("templates/business/profile.html");
	require("templates/business/projects.php");
?>