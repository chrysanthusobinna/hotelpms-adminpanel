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


//PARENT FILE manage_bookings_record_statistics.php

  


	$target_html						=		clean_input($_POST["target_html"]);
 
 
   mysqli_query($con,"INSERT INTO export_html_data SET content =	'$target_html' ") or die(mysqli_error($con));


?>

