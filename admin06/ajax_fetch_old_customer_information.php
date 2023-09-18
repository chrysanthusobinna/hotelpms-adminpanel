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

	$customer_phonenumber	=	$_POST["customer_phonenumber_input"];

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM laundry_order_record  WHERE customer_phonenumber='$customer_phonenumber'"))>0){


	$q_laundry_order_record = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM laundry_order_record WHERE customer_phonenumber='$customer_phonenumber'"));


	$guest_full_name 		=			$q_laundry_order_record["customer_name"];
 	$guest_phone_number 	=			$q_laundry_order_record["customer_phonenumber"];
	$residential_address 	=			$q_laundry_order_record["customer_address"];

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

		</script>";


}
else
{
	echo "NO RESULT FOUND";
}

}
		?>
