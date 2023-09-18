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

	$qty						=		clean_input($_GET["qty"]);
	$item_name					=		clean_input($_GET["item_name"]);
	$item_cat					=		clean_input($_GET["item_cat"]);
	$item_price					=		clean_input($_GET["item_price"]);
	$reciept_no					=		clean_input($_GET["reciept_no"]);

	$item_sub_total				=		($item_price * $qty);


	$check_item	=	mysqli_query($con,"SELECT * FROM sales_cart WHERE item_name='$item_name' AND item_price='$item_price' AND reciept_no='$reciept_no' ");

	if(mysqli_num_rows($check_item)>0){

		 $query_sales_cart=mysqli_fetch_assoc($check_item);
		 $id_sales_cart						=			$query_sales_cart['id'];



		if($qty=='0'){

		mysqli_query($con,"DELETE FROM sales_cart WHERE id='$id_sales_cart'");

		}
		else
		{
		mysqli_query($con,"UPDATE sales_cart SET 	qty						=			'$qty',
													item_name				=			'$item_name',
													item_cat				=			'$item_cat',
													item_price				=			'$item_price',
													item_sub_total			=			'$item_sub_total' WHERE id='$id_sales_cart'");

		}

	}
	else
	{


   mysqli_query($con,"INSERT INTO sales_cart SET 	qty						=			'$qty',
													item_name				=			'$item_name',
													item_cat				=			'$item_cat',
													item_price				=			'$item_price',
													item_sub_total			=			'$item_sub_total',
													reciept_no				=			'$reciept_no'");

	}

?>
