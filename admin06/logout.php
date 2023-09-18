<?php
include("../set.php");
include("../functions.php");
include("user_inc.php");


/*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/


$current_time		=	time();

$logged_user		=	$_SESSION['user'];

 
 
unset($_SESSION["user"]);
//session_destroy();

$msg = "You have been logged out successfuly!";
header("location: ../index.php?msg=$msg");

?>