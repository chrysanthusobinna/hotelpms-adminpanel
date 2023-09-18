<?php
include("../../set.php");
include("../../functions.php");
 

	$sales_row_id			=	$_GET['sales_row_id'];
	
		if(is_numeric($sales_row_id) && is_int((int)$sales_row_id)){
        $sales_row_id = (int)$sales_row_id;
    } else {
			header("location: ../manage_sales_record.php?notif_err=Invalid+Booking!");
    }
	
	
	if(empty($sales_row_id)) { 	header("location: ../manage_sales_record.php?notif_err=Invalid+Booking!");  }

	$query_sales_record = mysqli_query($con,"SELECT * FROM sales_record WHERE id='$sales_row_id'");

	if(mysqli_num_rows($query_sales_record)<1) {		header("location: ../manage_sales_record.php?notif_err=Invalid+Booking!");  }

	$query_row_sales_record					=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM sales_record WHERE id='$sales_row_id'"));


  $sales_row_id				=			 clean_output($query_row_sales_record['id']);
  $no_items					=			 clean_output($query_row_sales_record['no_items']);
  $table_sales				=			 $query_row_sales_record['table_sales'];
  
  $grand_total_amount		=			 clean_output($query_row_sales_record['grand_total_amount']);
  $discount_amount			=			 clean_output($query_row_sales_record['discount_amount']);
  $discount_info			=			 clean_output($query_row_sales_record['discount_info']);
  $sub_total_amount			=			 clean_output($query_row_sales_record['sub_total_amount']);
  
  
  $payment_method			=			 clean_output($query_row_sales_record['payment_method']);
  $reciept_no				=			 clean_output($query_row_sales_record['reciept_no']);
  $date_time				=			 clean_output($query_row_sales_record['date_time']);
  $booking_ref				=			 clean_output($query_row_sales_record['booking_ref']);
  $sales_staff				=			 clean_output($query_row_sales_record['sales_staff']);

  $customer_name			=			 clean_output($query_row_sales_record['customer_name']);
  $customer_phonenumber		=			 clean_output($query_row_sales_record['customer_phonenumber']);
  $customer_address			=			 clean_output($query_row_sales_record['customer_address']);
  
  
  if($customer_name =="NULL")
  {
	$customer_name =""; 
  }
  
  if($customer_phonenumber =="NULL")
  {
	$customer_phonenumber =""; 
  }

  if($customer_address =="NULL")
  {
	$customer_address =""; 
  }

  if($booking_ref !="NULL")
  {
  $booking_ref			=	"Booking #".$booking_ref;
  }
  else
  {
  $booking_ref			=	"<p style=color:red;>NO BOOKING</p>";
  }


	if($discount_info == "NULL")
	{
		$discount_info	=	"";
	}
	else
	{
		$discount_info	=	"[".$discount_info."]";
		
	}


?>

 
		

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title><?php echo $site_title; ?> - Sales - Reciept</title>



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
	
	<style>
	
	#foo td { 
	}

	#foo.hide2 tr > *:nth-child(3) {
    display: none;
	}

</style>
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
				<p>SALES - #<?php echo $reciept_no; ?></p><hr>
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
							<h5><?php echo $customer_name; ?> <small>[CUSTOMER]</small></h5>
							<p><b>Mobile :</b> <?php echo $customer_phonenumber; ?></p>
							<p><b>Address :</b> <?php echo $customer_address; ?></p>
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
                <table class="table table-bordered hide2" id="foo">
                    <thead>
                        <tr>
							<th>QTY</th>
							<th>ITEM(<?php echo $no_items; ?>)</th>
							<th>CATEGORY</th>
							<th>PRICE</th>
							<th>AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
		
						<?php echo  $table_sales; ?>
 				
                    </tbody>
                </table>
				




                <table class="table table-bordered">
 
                    <tbody>
												
						
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
                                <strong>&#163;<?php echo number_format($sub_total_amount,2); ?></strong>
                            </p>
                            <p>
                                <strong>&#163;<?php echo number_format($discount_amount,2); ?></strong>
                            </p>

							<p>
                                <strong><?php echo $payment_method; ?></strong>
                            </p>
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>GRAND TOTAL: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong>&#163;<?php echo number_format($grand_total_amount,2); ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>












				
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> <?php echo date('h:iA - l, jS M Y',(int)$date_time); ?></p>
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