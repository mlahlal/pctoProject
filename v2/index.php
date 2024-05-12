<?php
	//require ",/v2/includes/auth.php";
	//check_auth();
	$voices = ["Home", "SecondPage", "Profile"];
	$trendBusiness = [["name"=>"Google", "ambito"=>"informatica", "sede"=>"Milano"]];
	$newBusiness = $trendBusiness;
	require("components/sidebar.html");
	require("templates/student/index.html");
?>
