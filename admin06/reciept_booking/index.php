<?php
include("../../set.php");
include("../../functions.php");
 

	$booking_id			=	$_GET['booking_id'];
	
	
		if(is_numeric($booking_id) && is_int((int)$booking_id)){
        $booking_id = (int)$booking_id;
    } else {
			header("location: ../manage_bookings.php?notif_err=Invalid+Booking!");
    }
	
	if(empty($booking_id)) { 	header("location: ../manage_bookings.php?notif_err=Invalid+Booking!");  }

	$query_bookings = mysqli_query($con,"SELECT * FROM bookings WHERE id='$booking_id'");

	if(mysqli_num_rows($query_bookings)<1) {		header("location: ../manage_bookings.php?notif_err=Invalid+Booking!");  }

	$query_bookings_row					=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM bookings WHERE id='$booking_id'"));


	$guest_full_name					=			clean_output($query_bookings_row["guest_full_name"]);
	$guest_email_address				=			clean_output($query_bookings_row["guest_email_address"]);
	$guest_phone_number					=			clean_output($query_bookings_row["guest_phone_number"]);
	$residential_address				=			clean_output($query_bookings_row["residential_address"]);


	$checking_in_date					=			clean_output($query_bookings_row["checking_in_date"]);
	$checking_out_date					=			clean_output($query_bookings_row["checking_out_date"]);
	$class_id							=			clean_output($query_bookings_row["class_id"]);
	$hotel_room_id						=			clean_output($query_bookings_row["hotel_room_id"]);
	$room_number						=			clean_output($query_bookings_row["room_number"]);

	$reference_no						=			clean_output($query_bookings_row["reference_no"]);
	$date_of_booking					=			clean_output($query_bookings_row["date_of_booking"]);
	$booking_method						=			clean_output($query_bookings_row["booking_method"]);
	$payment_method						=			clean_output($query_bookings_row["payment_method"]);

	$sub_total_amount					=			clean_output($query_bookings_row["sub_total_amount"]);
	$discount_amount					=			clean_output($query_bookings_row["discount_amount"]);
	$grand_total_amount					=			clean_output($query_bookings_row["grand_total_amount"]);
	$discount_info						=			clean_output($query_bookings_row["discount_info"]);
	
	
	$booking_billing					=			$query_bookings_row["booking_billing"];
	$booking_duration					=			clean_output($query_bookings_row["booking_duration"]);

	$booking_staff						=			clean_output($query_bookings_row["booking_staff"]);
	$checkin_staff						=			clean_output($query_bookings_row["checkin_staff"]);
	$checkout_staff						=			clean_output($query_bookings_row["checkout_staff"]);

	$cancel_staff						=			clean_output($query_bookings_row["cancel_staff"]);
	$activity_logs_staff				=			$query_bookings_row["activity_logs_staff"];



 $query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$class_id'")) or die(mysqli_error($con));
  $class_name				=			 clean_output($query_row_room_class['class_name']);
  $class_id					=			 clean_output($query_row_room_class['id']);
  $class_name				=			 clean_output($query_row_room_class['class_name']);
  $class_description		=			 clean_output($query_row_room_class['class_description']);
  $weekday_price			=			 clean_output($query_row_room_class['weekday_price']);
  $weekend_price			=			 clean_output($query_row_room_class['weekend_price']);




	if($discount_info == "NULL")
	{
		$discount_info	=	"";
	}
	else
	{
		$discount_info	=	"[".$discount_info."]";
		
	}


?>




<?php

		
		$start =  $checking_in_date;
		$end   =  $checking_out_date;
		
		$no_of_weekdays=0;
		$no_of_weekends=0;
		$prize_weekend=0;
		$prize_weekday=0;

		for ($x = $start; $x <= $end; $x+=86400) {
			
		$datex_x		=	date('l',$x);
		
		if(($datex_x=="Friday") OR ($datex_x=="Saturday") OR ($datex_x=="Sunday"))
		{
		//$day_xxx	=	"Weekend"; 
		$no_of_weekends++;
		$prize_weekend		=	$weekend_price * $no_of_weekends; 
		
		}
		else
		{
		$day_xxx	=	"Weekday"; 	
		$no_of_weekdays++;
		$prize_weekday		=	$weekday_price * $no_of_weekdays; 
		
		}

 
	} 
	
	?>					
		
		

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title><?php echo $site_title; ?> - Booking - Reciept</title>



      <link rel="stylesheet" href="style.css">

   	<script language="javascript">

    function printpage() {
        //Get the print button and put it into a variable
        var functional_buttons_div = document.getElementById("functional_buttons");
        //Set the print button visibility to 'hidden' 
        functional_buttons_div.style.visibility = 'hidden';
        //Print the page content
        window.print()
        functional_buttons_div.style.visibility = 'visible';
    }
	</script>
	<script> document.addEventListener('contextmenu', event => event.preventDefault()); </script>

</head>

<body>

 <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->

<div class="container">

<center>
<br/>
<div id="functional_buttons">
 <button  onclick="printpage();" type="button" class="btn btn-info btn-flat">PRINT NOW</button> 
  <button  onclick="window.close();" type="button" class="btn btn-danger btn-flat">CLOSE PAGE</button>
  </div>
 </center>

	
	<div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
				<p>Booking - #<?php echo $reference_no; ?></p><hr>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="logo" src="../../images/hotel_logo.png" style="width: 71px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5><?php echo $site_title; ?></h5>
							<p><?php echo $hotel_phone_number; ?><i class="fa fa-phone"></i></p>
							<p><?php echo $hotel_email_address; ?> <i class="fa fa-envelope-o"></i></p>
							<p><?php echo $hotel_address; ?> <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5><?php echo $guest_full_name; ?> <small>[GUEST]</small></h5>
							<p><b>Mobile :</b> <?php echo $guest_phone_number; ?></p>
							<p><b>Email :</b> <?php echo $guest_email_address; ?></p>
							<p><b>Address :</b> <?php echo $residential_address; ?></p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Receipt</h1>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Bookings - <?php echo $booking_duration; ?> Night(s)</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
					
					
					
										
						
						
                        <tr>
                            <td class="col-md-9"><?php echo $class_name." ROOM - (".$no_of_weekdays.")"; ?> Weekday(s)</td>
                            <td class="col-md-3">&#8358;<?php echo number_format($prize_weekday,2); ?></td>
                        </tr>					
						
                      <tr>
                            <td class="col-md-9"><?php echo $class_name." ROOM - (".$no_of_weekends.")"; ?> Weekend(s)</td>
                            <td class="col-md-3">&#8358;<?php echo number_format($prize_weekend,2); ?></td>
                        </tr>					
												
						
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>SUBTOTAL: </strong>
                            </p>
                            <p>
                                <strong>DISCOUNT <?php echo $discount_info; ?>: </strong>
                            </p>

							<p>
                                <strong>PAYMENT METHOD: </strong>
                            </p>
							</td>
                            <td>
                            <p>
                                <strong>&#8358;<?php echo number_format($sub_total_amount,2); ?></strong>
                            </p>
                            <p>
                                <strong>&#8358;<?php echo number_format($discount_amount,2); ?></strong>
                            </p>

							<p>
                                <strong><?php echo $payment_method; ?></strong>
                            </p>
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>GRAND TOTAL: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong>&#8358;<?php echo number_format($grand_total_amount,2); ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> <?php echo date('h:iA - l, jS M Y',(int)$date_of_booking); ?></p>
							<h5 style="color: rgb(140, 140, 140);">Thank you!</h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Signature</h1>
						</div>
					</div>
				</div>
            </div>
			
        </div>    
	</div>
	

	
	
</div>

</body>

</html>