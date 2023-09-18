<?php

/*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/

 


	function clean_input($string)
	{
		
	global $con;
	$string=trim($string);
	return $con->real_escape_string($string);
	}
 
	
	
	function clean_output($string)
	{
	//$string=strip_tags($string);
	//$string=htmlspecialchars($string);	
	$string=stripslashes($string);
	return htmlentities($string);	
 	}

 
 	function allow_access()
	{
		$logged_user	=	$_SESSION['user'];
	}
 
 
?>
