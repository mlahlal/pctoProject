<?php
	echo "funzia?<br/>";
	require ",/v2/includes/auth.php";
	echo "ancora?<br/>";
	check_auth();
	echo "<br/><br/><br/>finalmente";
	$voices = ["Home", "SecondPage", "Profile"];
	$trendBusiness = [["name"=>"Google", "ambito"=>"informatica", "sede"=>"Milano"]];
	$newBusiness = $trendBusiness;
	//require("components/sidebar.html");
	//require("templates/student/index.html");
?>
