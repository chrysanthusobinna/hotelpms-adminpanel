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
 

//PARENT FILE new_booking_record_page_2.php

	$action						=		$_GET["action"];
	$cart_ref					=		$_GET["cart_ref"];
	$room_number				=		$_GET["room_number"];
	$class_id					=		$_GET["class_id"];
	$checking_in_date			=		$_GET["checking_in_date"];
	$checking_out_date			=		$_GET["checking_out_date"]; 

	if($action=="add_to_cart")
	{ 

 
 		$query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$class_id'")) or die(mysqli_error($con));
		$weekday_price			=			 clean_output($query_row_room_class['weekday_price']);
		$weekend_price			=			 clean_output($query_row_room_class['weekend_price']);


 		$query_row_hotel_rooms=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM hotel_rooms WHERE room_number='$room_number'")) or die(mysqli_error($con));
		$room_id				=			 clean_output($query_row_hotel_rooms['id']);
		
		$start =  $checking_in_date;
		$end   =  $checking_out_date;

		$list_bills = array();  
		$sub_total_amount  = 0;
		for ($x = $start; $x <= $end; $x+=86400) {
		$datex_x		=	date('l',$x);
		if(($datex_x=="Friday") OR ($datex_x=="Saturday") OR ($datex_x=="Sunday")){$prize=$weekend_price;} else {$prize=$weekday_price;}
		$each_date	=	date('jS M Y',(int)$x);
		$sub_total_amount += $prize;
		
		 $prize_2    	=	number_format($prize,2);
		 $list_bills[] = "<tr> <td>$datex_x</td> <td>$each_date</td> <td>&#163; $prize_2 </td> </tr>";

		}

 		$billings = implode(" ",$list_bills);



  mysqli_query($con,"INSERT INTO booking_cart SET 	cart_ref				=			'$cart_ref',
													b_cart_hotel_room_id	=			'$room_id',
													b_cart_room_number		=			'$room_number',
													b_cart_sub_total_amount	=			'$sub_total_amount',
													b_cart_booking_billing	=			'$billings'") or die(mysqli_error($con));


	}
	elseif($action=="minus_from_cart")
	{

 
	mysqli_query($con,"DELETE FROM booking_cart WHERE cart_ref='$cart_ref' AND b_cart_room_number='$room_number'") or die(mysqli_error($con));

	}
?>
