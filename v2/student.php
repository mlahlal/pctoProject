<?php
	require "./includes/auth.php";
    require "./includes/stdFunc.php";
    
	check_auth();
	
    $voices = ["Dashboard", "Search", "Profile"];
	//$trendBusiness = [["name"=>"Google", "ambito"=>"informatica", "sede"=>"Milano"]];
    $trendBusiness = getTrendBusiness();
	$newBusiness = getNewBusiness();
	
    require("components/sidebar.html");
	require("templates/student/index.html");
    require("templates/student/search.html");
    require("templates/student/profile.html");
    require("templates/student/business.html");
?>
