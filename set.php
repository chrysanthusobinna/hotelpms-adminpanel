<?php
session_start();
ob_start();
date_default_timezone_set("Europe/London");

//ERROR_REPORTING(0);

/*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/


	$db_host	= 	'localhost';
	$db_user 	= 	'db_user';
	$db_pass 	= 	'db_pass';
	$db_name 	= 	'db_name';
	

	$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	
	

	// Check connection
	if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit(); }



	$head_title 					= "HPMS";
	$site_title 					= "HPMS";
	$meta_description 				= "HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN PANEL";
	$hotel_name 					= "[HOTEL NAME]";

	$velitech_software_name			= "HPMS ADMIN";
	
	$administrative_pin				=	"1234";


	$api2pdf_key	=	"f2a6e0a1-4cee-4a91-a6a5-040dc6aa1e46";



	//PAYSTACK API  KEY
	$pay_stack_public_key="pk_test_0c1a85e2af89c71f6213dfeeed2ee53a57280e57";


	//SMS API TOKEN
	$sms_token="6LtwUhQP8JAEFcMIVNUFVfiOzEEEH6X8hF2A2meEdzPaNTeRnb26Os7pzlaS";




	//WEBMAIL LOGIN
	$webmail_action_link			=			"https://customerscareunit.com:2096/login/";
	$webmail_email_address			=			"enquiries@velitechs.com";
	$webmail_password				=			"2020velitechs.com";
	


	//LIVECHAT LOGIN
	$livechat_action_link			=			"https://dashboard.tawk.to/login/";
	$livechat_email_address			=			"enquiries@velitechs.com";
	$livechat_password				=			"2020velitechs.com";
	


//MYSQL DATA HOTEL SETTINGS
 $query_hotel_system_settings=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM hotel_system_settings WHERE id=1"))or die(mysqli_error($con));
  $new_check_in_hours							=			$query_hotel_system_settings['new_check_in_hours']; 
  $hotel_email_address							=			$query_hotel_system_settings['hotel_email_address']; 
  $hotel_phone_number							=			$query_hotel_system_settings['hotel_phone_number']; 
  $hotel_address								=			$query_hotel_system_settings['hotel_address']; 
  $intro_text									=			$query_hotel_system_settings['intro_text']; 
  $hotel_google_iframe_link						=			$query_hotel_system_settings['hotel_google_iframe_link']; 
  $hotel_other_phonenumbers						=			$query_hotel_system_settings['hotel_other_phonenumbers']; 
  $hotel_other_emails							=			$query_hotel_system_settings['hotel_other_emails']; 
	

  $hotel_other_emails				=			str_replace("<br/>",",",$hotel_other_emails);
  $hotel_other_phonenumbers			=			str_replace("<br/>",",",$hotel_other_phonenumbers);

 



?>