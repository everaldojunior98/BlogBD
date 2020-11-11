<?php
	session_start();
	$isAdminPage = true;
	
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false)
	{
		header("location: ../../login.php");
		die;
	}
?>