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

	$action						=		$_GET["action"];
	$cart_no					=		$_GET["cart_no"];

	if($action=="add_to_cart")
	{ 


	$laundry_item				=		 $_GET["laundry_item"];
	$wash_amount				=		 $_GET["wash_amount"];
	$iron_amount				=		 $_GET["iron_amount"];
	$starch_amount				=		 $_GET["starch_amount"];
	$dry_clean_amount			=		 $_GET["dry_clean_amount"];
	$stain_remove_amount		=		 $_GET["stain_remove_amount"];





  mysqli_query($con,"INSERT INTO laundry_cart SET 	laundry_item			=			'$laundry_item',
													wash_amount				=			'$wash_amount',
													iron_amount				=			'$iron_amount',
													starch_amount			=			'$starch_amount',
													dry_clean_amount		=			'$dry_clean_amount',
													stain_remove_amount		=			'$stain_remove_amount',
													cart_no					=			'$cart_no'") or die(mysqli_error($con));


	}
	elseif($action=="minus_from_cart")
	{

	$cart_item_id				=		$_GET["cart_item_id"];

	mysqli_query($con,"DELETE FROM laundry_cart WHERE id='$cart_item_id'") or die(mysqli_error($con));

	}
?>

                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ITEM</th>
                      <th>WASH</th>
                      <th>IRON</th>
                      <th>STARCH</th>
                      <th>DRY CLEAN</th>
                      <th>STAIN REMOVE</th>
                      <th>AMOUNT</th>
                      <th>#</th>

                    </tr>
                  </thead>
                  <tbody id="">

				<?php

						$query_laundry_cart=mysqli_query($con,"SELECT * FROM laundry_cart WHERE cart_no = '$cart_no' order by id DESC");
						while($row_query_laundry_cart=mysqli_fetch_array($query_laundry_cart))
						{
						$id					=		$row_query_laundry_cart["id"];
						$cart_no			=		$row_query_laundry_cart["cart_no"];
						$laundry_item		=		$row_query_laundry_cart["laundry_item"];
						$wash_amount		=		$row_query_laundry_cart["wash_amount"];
						$iron_amount		=		$row_query_laundry_cart["iron_amount"];
						$starch_amount		=		$row_query_laundry_cart["starch_amount"];
						$dry_clean_amount	=		$row_query_laundry_cart["dry_clean_amount"];
						$stain_remove_amount=		$row_query_laundry_cart["stain_remove_amount"];

						$subtotal			=		$wash_amount + $iron_amount + $starch_amount + $dry_clean_amount + $stain_remove_amount;

					if($wash_amount			=='0'){ $wash_amount			=		"-";}else { $wash_amount = "&#163;".number_format($wash_amount); }
					if($iron_amount			=='0'){ $iron_amount			=		"-";}else { $iron_amount = "&#163;".number_format($iron_amount); }
					if($starch_amount		=='0'){ $starch_amount			=		"-";}else { $starch_amount = "&#163;".number_format($starch_amount); }
					if($dry_clean_amount	=='0'){ $dry_clean_amount		=		"-";}else { $dry_clean_amount = "&#163;".number_format($dry_clean_amount); }
					if($stain_remove_amount	=='0'){ $stain_remove_amount	=		"-";}else { $stain_remove_amount = "&#163;".number_format($stain_remove_amount); }

				?>



				  <tr>
                    <td><?php echo $laundry_item; ?></td>

                    <td><?php echo $wash_amount; ?></td>

                    <td><?php echo $iron_amount; ?></td>

                    <td><?php echo $starch_amount; ?></td>

                    <td><?php echo $dry_clean_amount; ?></td>

                    <td><?php echo $stain_remove_amount; ?></td>

                    <td><?php echo "&#163;".number_format($subtotal); ?> <input type="hidden" value="<?php echo $subtotal; ?>" id="<?php echo $id; ?>"></td>
					<td>

                    <button  value="<?php echo $id; ?>" onclick="minus_cart(this.value);" type="button"  class="btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>

					</td>

                  </tr>

				<?php }	  ?>


                  </tbody>


                 </table><hr/>



<!-- Table to be submited -->

					<table style="display: none;">

                  <tbody id="table_order" >

				<?php

						$query_laundry_cart=mysqli_query($con,"SELECT * FROM laundry_cart WHERE cart_no = '$cart_no' order by id DESC");
						while($row_query_laundry_cart=mysqli_fetch_array($query_laundry_cart))
						{
						$id					=		$row_query_laundry_cart["id"];
						$cart_no			=		$row_query_laundry_cart["cart_no"];
						$laundry_item		=		$row_query_laundry_cart["laundry_item"];
						$wash_amount		=		$row_query_laundry_cart["wash_amount"];
						$iron_amount		=		$row_query_laundry_cart["iron_amount"];
						$starch_amount		=		$row_query_laundry_cart["starch_amount"];
						$dry_clean_amount	=		$row_query_laundry_cart["dry_clean_amount"];
						$stain_remove_amount=		$row_query_laundry_cart["stain_remove_amount"];

						$subtotal			=		$wash_amount + $iron_amount + $starch_amount + $dry_clean_amount + $stain_remove_amount;

					if($wash_amount			=='0'){ $wash_amount			=		"-";}else { $wash_amount = "&#163;".number_format($wash_amount); }
					if($iron_amount			=='0'){ $iron_amount			=		"-";}else { $iron_amount = "&#163;".number_format($iron_amount); }
					if($starch_amount		=='0'){ $starch_amount			=		"-";}else { $starch_amount = "&#163;".number_format($starch_amount); }
					if($dry_clean_amount	=='0'){ $dry_clean_amount		=		"-";}else { $dry_clean_amount = "&#163;".number_format($dry_clean_amount); }
					if($stain_remove_amount	=='0'){ $stain_remove_amount	=		"-";}else { $stain_remove_amount = "&#163;".number_format($stain_remove_amount); }

				?>



				  <tr>
                    <td><?php echo $laundry_item; ?></td>

                    <td><?php echo $wash_amount; ?></td>

                    <td><?php echo $iron_amount; ?></td>

                    <td><?php echo $starch_amount; ?></td>

                    <td><?php echo $dry_clean_amount; ?></td>

                    <td><?php echo $stain_remove_amount; ?></td>

                    <td><?php echo "&#163;".number_format($subtotal); ?></td>
                  </tr>

				<?php }	  ?>


                  </tbody>
				  </table>
