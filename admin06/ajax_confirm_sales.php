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

		$sub_total_amount	=	$_GET["sub_total_amount"];
		$reciept_no		=	$_GET["reciept_no"];


		?>

		<input type="hidden" name="table_sales" id="table_sales_input"/>
		<input type="hidden" name="sub_total_amount" value="<?php echo $sub_total_amount; ?>"/>
		<input type="hidden" name="reciept_no"	value="<?php echo $reciept_no; ?>"/>
		<input type="hidden" name="date_time"	value="<?php echo time(); ?>"/>
		<input type="hidden" name="sales_staff" value="<?php echo $_SESSION["user"]; ?>"/>





                  <div class="row">
                    <div class="col-md-3">
            <div class="card card-secondary" style="height:530px;">
              <div class="card-header">
                <h3 class="card-title">Billing</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="form-group">
                <input value="SUBTOTAL: £<?php echo $sub_total_amount; ?>" disabled type="text" class="form-control form-control-sm">
				</div>		
				
					<div id="sales_discount_card">
					
					<input type="hidden" name="discount_amount" value="0"/>
					<input type="hidden" name="grand_total_amount" value="<?php echo $sub_total_amount; ?>"/>
					<input type="hidden" name="discount_info" value="NULL"/>
		
					<div class="form-group">
					<input value="DISCOUNT: £0" disabled type="text" class="form-control form-control-sm">
					</div>

					<div class="form-group">
					<input value="GRAND TOTAL: £<?php echo $sub_total_amount; ?>" disabled type="text" class="form-control form-control-sm">
					</div>
				
					</div>
				
                    <div class="form-group">
					<select name="set_discount" onchange="set_discount_func(this.value);" class="form-control form-control-sm">
					<option value='0'>NO DISCOUNT</option>
					
					<?php

					$query_sales_discount_sql=mysqli_query($con,"SELECT * FROM sales_discount") or die(mysqli_error($con));
 
					while($query_sales_discount=mysqli_fetch_array($query_sales_discount_sql))
					{
 					$sales_discount_id			=			 clean_output($query_sales_discount['id']);
  					$sales_discount_name		=			 clean_output($query_sales_discount['sales_discount_name']);
  					$sales_discount_percentage	=			 clean_output($query_sales_discount['sales_discount_percentage']);
  					$sales_discount_status		=			 clean_output($query_sales_discount['sales_discount_status']);

 					 if($sales_discount_status		==	"0")
  					{
						$disabled	=	"";
  					}
 					elseif($sales_discount_status	==	"1")
 					{
					echo "<option value='$sales_discount_id'>$sales_discount_name - $sales_discount_percentage % </option>";
					
					}} 
					?>

					</select>
                    </div>		


					
                    <div class="form-group">
					<select name="payment_method" onchange="set_data_table_sales();" required class="form-control form-control-sm">
					<option value=''>SELECT PAYMENT METHOD </option>
					<option>CASH</option>
 					<option>POS</option>
 					<option>ONLINE TRANSFER</option>

					</select>
                    </div>				
<hr/>

               <div class="form-group">
                 <select required class="form-control form-control-sm" name="" onchange="set_customer_info(this.value);" >
				 <option value=""> SELECT CUSTOMER</option>
				 <option value="0">Guest</option>
				<?php

				$query_bookings		=    mysqli_query($con,"SELECT * FROM bookings order by id DESC LIMIT 100");

				while($query_row_bookings=mysqli_fetch_array($query_bookings	))
				{
				$booking_id					=	$query_row_bookings['id'];
				$guest_full_name			=	$query_row_bookings['guest_full_name'];
				$room_number				=	$query_row_bookings['room_number'];
				$reference_no				=	$query_row_bookings['reference_no'];
				$checking_in_date			=	date('jS M Y',(int)$query_row_bookings['checking_in_date']);

				 echo"<option value='$booking_id'>$guest_full_name - Room $room_number - $checking_in_date</option>";
				}
				?>
                 </select>
			

				</div>
				
				 <div id="customer_info_x">
				 <input type="hidden" name="reference_no" value="NULL" />
				 <input type="hidden" name="customer_name" value="NULL" />
				 <input type="hidden" name="customer_phonenumber" value="NULL" />
				 <input type="hidden" name="customer_address" value="NULL" />
				 </div>

<hr/>



               <div class="form-group">
				<button type="submit" name="add_new_sales" class="btn-sm btn btn-block btn-info btn-flat">SUBMIT</button>
				</div>

               <div class="form-group">
				<button type="button" onclick="back_to_card_sales();" class="btn-sm btn btn-block btn-info btn-flat">BACK</button>
				</div>

               <div class="form-group">
				<button type="button" onclick="window.location.reload();" class="btn-sm btn btn-block btn-info btn-flat">CANCEL</button>
				</div>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                    </div>
                    <div class="col-md-9">

            <div class="card card-secondary" style="height:530px;" >
              <div class="card-header">
                <h3 class="card-title">Items</h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 350px;">

                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>QTY</th>
                      <th>ITEM</th>
                      <th>CATEGORY</th>
                      <th>PRICE</th>
                      <th>AMOUNT</th>

                    </tr>
                  </thead>
                  <tbody id="table_sales">

				<?php

						$query_sales_cart=mysqli_query($con,"SELECT * FROM sales_cart WHERE reciept_no = '$reciept_no' order by id DESC");
						while($row_query_sales_cart=mysqli_fetch_array($query_sales_cart))
						{
						$qty					=		$row_query_sales_cart["qty"];
						$item_name				=	    $row_query_sales_cart['item_name'];
						$item_cat				=	    $row_query_sales_cart['item_cat'];
						$item_price				=	    $row_query_sales_cart['item_price'];
						$item_sub_total			=	    $row_query_sales_cart['item_sub_total'];
						$reciept_no				=	    $row_query_sales_cart['reciept_no'];


				?>



				  <tr>
                    <td><?php echo $qty; ?></td>

                    <td><?php echo $item_name; ?></td>

                    <td><?php echo $item_cat; ?></td>

                    <td>&#163; <?php echo number_format($item_price,2); ?></td>

                    <td>&#163; <?php echo number_format($item_sub_total,2); ?></td>

                  </tr>

				<?php }	  ?>


                  </tbody>
                 </table><hr/>




              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->






                   </div>
                  </div>
