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



	$sales_discount_id				=		clean_input($_GET["sales_discount_id"]);
	$sub_total_amount					=		clean_input($_GET["sub_total_amount"]);

	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_discount WHERE id='$sales_discount_id'"))>0)
	{ 	
	$query_sales_discount_sql_x		=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM sales_discount WHERE id='$sales_discount_id'"));
	$sales_discount_name			=		$query_sales_discount_sql_x["sales_discount_name"];
	$sales_discount_percentage		=		(int)$query_sales_discount_sql_x["sales_discount_percentage"];
	

			$discount_amount		 =	($sales_discount_percentage / 100) * $sub_total_amount;
			$grand_total_amount =	($sub_total_amount - $discount_amount);
			$discount_info			 =  $sales_discount_name."-".$sales_discount_percentage."%";

	
	}
	else
	{
			$discount_amount		 =	0;
			$grand_total_amount =	$sub_total_amount;
			$discount_info			 =  "NULL";		
	}
?>

 

		<input type="hidden" name="discount_amount" value="<?php echo $discount_amount; ?>"/>
		<input type="hidden" name="grand_total_amount" value="<?php echo $grand_total_amount; ?>"/>
		<input type="hidden" name="discount_info" value="<?php echo $discount_info; ?>"/>
		
        <div class="form-group">
        <input value="DISCOUNT: £<?php echo $discount_amount; ?>" disabled type="text" class="form-control form-control-sm">
		</div>


        <div class="form-group">
        <input value="GRAND TOTAL: £<?php echo $grand_total_amount; ?>" disabled type="text" class="form-control form-control-sm">
		</div>
