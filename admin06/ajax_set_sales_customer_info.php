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


//PARENT FILE manage_sales_record.php



	$booking_id						=		clean_input($_GET["booking_id"]);

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE id='$booking_id'"))>0)
	{ 	
	$query_bookings					=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM bookings WHERE id='$booking_id'"));
		$reference_no				=		$query_bookings["reference_no"];	
		$room_number				=		$query_bookings["room_number"];	
		$booking_ref				=		"#".$reference_no." - Room no.".$room_number;
		$customer_name				=		$query_bookings["guest_full_name"];
		$customer_phonenumber		=		$query_bookings["guest_phone_number"];
		$customer_address			=		$query_bookings["residential_address"];



	}
	else
	{
		$booking_ref				=		"NULL";
		$customer_name				=		"NULL";
		$customer_phonenumber		=		"NULL";
		$customer_address			=		"NULL";

	}
?>

				 <input type="hidden" name="booking_ref" value="<?php echo $booking_ref; ?>" />
				 <input type="hidden" name="customer_name" value="<?php echo $customer_name; ?>" />
				 <input type="hidden" name="customer_phonenumber" value="<?php echo $customer_phonenumber; ?>" />
				 <input type="hidden" name="customer_address" value="<?php echo $customer_address; ?>" />