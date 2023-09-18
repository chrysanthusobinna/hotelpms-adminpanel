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



	$laundry_discount_id				=		clean_input($_POST["laundry_discount_id"]);
	$grand_total_amount_hidden			=		clean_input($_POST["grand_total_amount_hidden"]);
	$service_amount_hidden				=		clean_input($_POST["service_amount_hidden"]);
	
	

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM laundry_discount WHERE id='$laundry_discount_id'"))>0)
	{ 	
	$query_laundry_discount_sql_x			=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM laundry_discount WHERE id='$laundry_discount_id'"));
	$laundry_discount_name					=		$query_laundry_discount_sql_x["laundry_discount_name"];
	$laundry_discount_percentage			=		(int)$query_laundry_discount_sql_x["laundry_discount_percentage"];


			$discount_amount_hidden			=	($laundry_discount_percentage / 100) * $grand_total_amount_hidden;
			$discount_amount_vissible		=	"DISCOUNT: £".number_format($discount_amount_hidden,2);
			$discount_info_hidden			=	 $laundry_discount_name." -".$laundry_discount_percentage."%";			
			$grand_total_amount_hidden		=	($grand_total_amount_hidden - $discount_amount_hidden)  + $service_amount_hidden;
			$grand_total_amount_vissible	=	"GRAND TOTAL: £".number_format($grand_total_amount_hidden,2);
	


	}
	else
	{
			$discount_amount_hidden			=	0;
			$discount_amount_vissible		=	"DISCOUNT: £".number_format($discount_amount_hidden,2);
			$discount_info_hidden			=	"NULL";		
			$grand_total_amount_hidden		=	($grand_total_amount_hidden  + $service_amount_hidden);
			$grand_total_amount_vissible	=	"GRAND TOTAL: £".number_format($grand_total_amount_hidden,2);			
 

	}
	

?>

 
	<script>
	document.getElementById('discount_amount_hidden').value = '<?php echo $discount_amount_hidden; ?>';
	document.getElementById('discount_amount_vissible').value = '<?php echo $discount_amount_vissible; ?>';
	document.getElementById('discount_info_hidden').value = '<?php echo $discount_info_hidden; ?>';
	document.getElementById('grand_total_amount_hidden').value = '<?php echo $grand_total_amount_hidden; ?>';
	document.getElementById('grand_total_amount_vissible').value = '<?php  echo $grand_total_amount_vissible; ?>';
 
	</script>