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


//PARENT FILE setup_room_class.php

if($_POST)
{


  $class_id						=			clean_input($_POST["class_id"]);
  $class_name					=			clean_input($_POST['class_name']);
  $class_description			=			clean_input($_POST['class_description']);
  $room_features_1				=			clean_input($_POST['room_features_1']);
  $room_features_2				=			clean_input($_POST['room_features_2']);
  $room_features_3				=			clean_input($_POST['room_features_3']);
  $weekday_price				=			clean_input($_POST['weekday_price']);
  $weekend_price				=			clean_input($_POST['weekend_price']);
  



 mysqli_query($con,"UPDATE room_class SET 	class_name			= 	'$class_name',
											class_description	= 	'$class_description',
											room_features_1		=	'$room_features_1',
											room_features_2		=	'$room_features_2',
											room_features_3		=	'$room_features_3',											
											weekday_price		= 	'$weekday_price',
											weekend_price		= 	'$weekend_price'  WHERE id = '$class_id'");
   
}

?>
