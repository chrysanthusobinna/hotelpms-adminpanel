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


//PARENT FILE manage_laundry.php



	$id								=		$_GET["id"];
	$selected						=		$_GET["selected"];
	$delivery_staff					=		$_SESSION["user"];
	$delivery_date					= 		time();
	$delivery_date_2				= 		date('h:i A - jS M Y',(int)$delivery_date);

 if($selected 	==	"delivered"){


			mysqli_query($con,"UPDATE laundry_order_record SET 		delivery_staff	= '$delivery_staff', delivery_date =  '$delivery_date' WHERE id='$id'") or die(mysqli_error($con));




 	$query_delivery_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$delivery_staff'")) or die(mysqli_error($con));
	$delivery_staff_name				=			 $query_delivery_staff['full_name'];


	$delivery_info			= "Laundry Order was Delivered at ".$delivery_date_2." by Staff ".$delivery_staff_name."!";

	echo	"<a href='#' title='$delivery_info' onclick='alert(this.title);' >Delivered at $delivery_date_2</a>";


 }


?>
