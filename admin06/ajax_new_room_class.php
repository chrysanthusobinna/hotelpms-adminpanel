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



  $class_name					=			clean_input($_POST['class_name']);
  $class_description			=			clean_input($_POST['class_description']);
  $room_features_1				=			clean_input($_POST['room_features_1']);
  $room_features_2				=			clean_input($_POST['room_features_2']);
  $room_features_3				=			clean_input($_POST['room_features_3']);
  
  $weekday_price				=			clean_input($_POST['weekday_price']);
  $weekend_price				=			clean_input($_POST['weekend_price']);
  
  

  mysqli_query($con,"INSERT INTO room_class SET		class_name					=			'$class_name',
													class_description			=			'$class_description',
													room_features_1				=			'$room_features_1',
													room_features_2				=			'$room_features_2',
													room_features_3				=			'$room_features_3',
													weekday_price				=			'$weekday_price',		
													weekend_price				=			'$weekend_price'");


  $qry_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class ORDER BY id DESC LIMIT 1")) or die(mysqli_error($con));
  echo $last_id				=			 $qry_room_class['id'];
   
}

?>
