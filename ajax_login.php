<?php
include("set.php");
include("functions.php");
   

/*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/

   
//PARENT FILE admin06_login.php

if($_POST)
{
 

$email_address		=	clean_input($_POST["email_address"]);
$password			=	clean_input($_POST["password"]);



$query_staff = mysqli_query($con,"SELECT * FROM staff WHERE email_address = '$email_address' AND password = '$password' ");


   if(mysqli_num_rows($query_staff)>0)
   {

	 

		$_SESSION['user']=$email_address;

		$time_date							=	 date('h:i:s A - jS  F Y',time());


 		     mysqli_query($con,"INSERT INTO staff_last_login_date SET 	time_date				=			'$time_date',
																		email_address			=			'$email_address'");




			//FUNCTION THAT CHECKS staff_last_login_date LIST AND DELETE TO SAVE DISC SPACE


			$number_of_data_limit		=	10;  //must be a number divisible by 2
			$number_of_data_to_delete	=	($number_of_data_limit/2);
			$no_staff_last_login_date	=	mysqli_num_rows(mysqli_query($con,"SELECT * FROM staff_last_login_date WHERE email_address = '$email_address'"));
			if($no_staff_last_login_date > $number_of_data_limit)
			{
			mysqli_query($con,"DELETE FROM staff_last_login_date WHERE email_address = '$email_address' ORDER BY id ASC LIMIT $number_of_data_to_delete");	
			}

	


			echo "<script>window.location='admin06/?notif=Login was successful!';</script>";
			
	 



   }
   else
   {
			echo "<script>window.location='?msg=Wrong+Email+Adrress+or+Password!';</script>";

   }


 } ?>

 
