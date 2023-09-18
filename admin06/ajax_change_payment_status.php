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
	$payment_confirmation_staff		=		$_SESSION["user"];
	$payment_confirmation_date		= 		time();
	$payment_confirmation_date_2	= 		date('h:i A - jS M Y',(int)$payment_confirmation_date);

 if(!empty($selected)){


			mysqli_query($con,"UPDATE laundry_order_record SET		payment_confirmation_staff		=		'$payment_confirmation_staff',
																	payment_confirmation_date		=		'$payment_confirmation_date',
																	payment_method					=		'$selected'  WHERE id='$id'");





 	$query_payment_confirmation_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$payment_confirmation_staff'")) or die(mysqli_error($con));
	$payment_confirmation_staff_name				=			 $query_payment_confirmation_staff['full_name'];


	$payment_info			= $selected." was Confirmed at ".$payment_confirmation_date_2." by Staff ".$payment_confirmation_staff_name."!";

	echo	"<a href='#' title='$payment_info' onclick='alert(this.title);' >$selected Confirmed at $payment_confirmation_date_2</a>";


 }

?>
