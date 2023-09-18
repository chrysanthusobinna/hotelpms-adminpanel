<?php
/*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/

 if(!isset($_SESSION["user"]))
 {
	 header("location: ../index.php");
	 exit();
 }

$logged_user =  $_SESSION['user'];




$query_staff_info=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$logged_user'"))or die(mysqli_error($con));
  $staff_full_name_x					=			$query_staff_info['full_name'];
  $staff_phone_number_x					=			$query_staff_info['phone_number'];
  $staff_house_address_x				=			$query_staff_info['house_address'];
  $staff_email_address_x				=			$query_staff_info['email_address'];
  $staff_password_address_x				=			$query_staff_info['password'];
  $main_role_x							=			$query_staff_info['main_role'];
  
  $access_booking_record_statistics_x	=			$query_staff_info['access_booking_record_statistics'];
  $access_sales_record_statistics_x		=			$query_staff_info['access_sales_record_statistics'];
  $access_laundry_record_statistics_x	=			$query_staff_info['access_laundry_record_statistics'];

  $access_paystack_x					=			$query_staff_info['access_paystack'];
  $access_communicaton_x				=			$query_staff_info['access_communicaton'];
  $access_website_management_x			=			$query_staff_info['access_website_management'];

 
 
?>