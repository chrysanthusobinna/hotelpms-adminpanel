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


		$rooms_class_photos_id	=	clean_input($_POST["rooms_class_photos_id"]);
		
		//fetch file info [src]
		$q_class_photos=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM rooms_class_photos WHERE id='$rooms_class_photos_id'")) or die(mysqli_error($con));
		$photo_src				=			 "dir_room_photos/".$q_class_photos['photo_src'];
  
		
		//delete file from dir
		unlink($photo_src);
 
		//delete form mysql_db
 		mysqli_query($con,"DELETE FROM rooms_class_photos WHERE id='$rooms_class_photos_id'") or die(mysqli_error($con));

 
 
 
 ?>
 