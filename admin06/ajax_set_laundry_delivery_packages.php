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



	$laundry_delivery_packages_id			=		clean_input($_POST["laundry_delivery_packages_id"]);
	$grand_total_amount_hidden				=		clean_input($_POST["grand_total_amount_hidden"]);
	$discount_amount_hidden					=		clean_input($_POST["discount_amount_hidden"]);
	

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM laundry_delivery_packages WHERE id='$laundry_delivery_packages_id'"))>0)
	{ 	
	$q_laundry_packages		=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM laundry_delivery_packages WHERE id='$laundry_delivery_packages_id'"));
	$laundry_package_name		=		$q_laundry_packages["laundry_package_name"];
	$laundry_package_percentage	=		(int)$q_laundry_packages["laundry_package_percentage"];


			$service_amount_hidden			=	($laundry_package_percentage / 100) * $grand_total_amount_hidden;
			$service_amount_vissible		=	"SERVICE: £".number_format($service_amount_hidden,2);
			$service_info_hidden			=	 $laundry_package_name." +".$laundry_package_percentage."%";			
			$grand_total_amount_hidden		=	($grand_total_amount_hidden + $service_amount_hidden  - $discount_amount_hidden);
			$grand_total_amount_vissible	=	"GRAND TOTAL: £".number_format($grand_total_amount_hidden,2);
	


	}
	else
	{
			$service_amount_hidden			=	0;
			$service_amount_vissible		=	"SERVICE: £".number_format($service_amount_hidden,2);
			$service_info_hidden			=	"NULL";		
			$grand_total_amount_hidden		=	($grand_total_amount_hidden  - $discount_amount_hidden);
			$grand_total_amount_vissible	=	"GRAND TOTAL: £".number_format($grand_total_amount_hidden,2);			
 

	}
	

?>

 
	<script>
	document.getElementById('service_amount_hidden').value = '<?php echo $service_amount_hidden; ?>';
	document.getElementById('service_amount_vissible').value = '<?php echo $service_amount_vissible; ?>';
	document.getElementById('service_info_hidden').value = '<?php echo $service_info_hidden; ?>';
	document.getElementById('grand_total_amount_hidden').value = '<?php echo $grand_total_amount_hidden; ?>';
	document.getElementById('grand_total_amount_vissible').value = '<?php  echo $grand_total_amount_vissible; ?>';
 
	</script>