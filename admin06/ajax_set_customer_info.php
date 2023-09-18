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

if($_POST)
{

	$reference_no	=	$_POST["reference_no"];

	$query_bookings_row					=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM bookings WHERE reference_no='$reference_no'"));


	$guest_full_name					=			$query_bookings_row["guest_full_name"];
	$guest_email_address				=			$query_bookings_row["guest_email_address"];
	$guest_phone_number					=			$query_bookings_row["guest_phone_number"];
	$residential_address				=			$query_bookings_row["residential_address"];
	$room_number						=			$query_bookings_row["room_number"];

	$booking_ref						=			"#".$reference_no." - Room no.".$room_number;
	
		echo"<script>

		document.getElementById('guest_full_name').value = '$guest_full_name';
 		var guest_full_name_var = document.getElementById('guest_full_name');
					guest_full_name_var.classList.add('is-valid');


		document.getElementById('guest_phone_number').value = '$guest_phone_number';
 		var guest_phone_number_var = document.getElementById('guest_phone_number');
					guest_phone_number_var.classList.add('is-valid');

		document.getElementById('residential_address').value = '$residential_address';
 		var residential_address_var = document.getElementById('residential_address');
					residential_address_var.classList.add('is-valid');


		document.getElementById('save_laundry_customer_info').disabled = false;
		document.getElementById('booking_ref').value = '$booking_ref';

		</script>";


}
		?>
