<?php
	session_start();
	require "./includes/auth.php";
	require "./includes/bsnFunc.php";
	
	if (isset($_SESSION["user"]) && $_SESSION["user"]["type"] == "delegate") {
	} else {
		header("Location: login.php");
	}

	$mybusiness = getMyBusiness();

	echo "<script>localStorage.setItem('id', '".$_SESSION["id"]."');</script>";
	echo "<script>localStorage.setItem('id_business', '".$mybusiness[0]["id_business"]."');</script>";
	$_SESSION["id_business"] = $mybusiness[0]["id_business"];


	$voices = ["Dashboard", "Requests", "Projects", "Profile"];
	$projects = getProjects();
	$requests = getStudentRequests();

	require("components/sidebar.html");
	require("templates/business/index.html");
	require("templates/business/requests.html");
	require("templates/business/student.html");
	require("templates/business/profile.html");
	require("templates/business/projects.php");
?>