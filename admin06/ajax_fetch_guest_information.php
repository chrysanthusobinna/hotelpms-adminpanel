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

//PARENT FILE new_booking_record_page_3.php



$guest_phone_number	=	$_GET["guest_phone_number"];


$xquery=mysqli_query($con,"SELECT * FROM bookings WHERE guest_phone_number='$guest_phone_number'");
 if(mysqli_num_rows($xquery)<1) {

?>


 	<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<i class='fas fa-exclamation-circle'></i> Guest Information Does'nt Exist
		</div>

<div class="row">

<div class="col-6">
<div class="form-group">
<label  class="control-label mb-1">Guest Name</label>
<input  required  name="guest_full_name" type="text" class="form-control"  >
</div>
</div>

<div class="col-6">
<label class="control-label mb-1">Guest Email</label>
 <div class="input-group">
<input    required  name="guest_email_address"  type="email" class="form-control"   >
</div>
</div>


</div>


<div class="row">

<div class="col-6">
<div class="form-group">
<label  class="control-label mb-1">Guest Phone Number</label>
<input   required  name="guest_phone_number" type="text" class="form-control"   >
</div>
</div>

<div class="col-6">
<label class="control-label mb-1">Guest Address</label>
 <div class="input-group">
<input   required  name="residential_address" type="text" class="form-control"  >
</div>
</div>


</div>



  <div class="form-group">
  <label>Booking Method</label>
  <input    value="Local" name="booking_method" type="text" class="form-control" disabled="disabled />
</div>


 <div class="form-group">
 <label>Payment Method</label>
 <select style="width:60;" name="payment_method" required class="form-control" >
 <option>CASH</option>
 <option>POS</option>
 <option>ONLINE TRANSFER</option>
 </select>
 </div>



<?php

	}else {


 $query_row_bookings=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM bookings WHERE guest_phone_number='$guest_phone_number'")) or die(mysqli_error($con));

  $guest_full_name			=			 $query_row_bookings['guest_full_name'];
  $guest_email_address		=			 $query_row_bookings['guest_email_address'];
  $guest_phone_number		=			 $query_row_bookings['guest_phone_number'];
  $residential_address		=			 $query_row_bookings['residential_address'];


?>

 

		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<i class='far fa-check-circle'></i> Guest Information Retrieved
		</div>



<div class="row">

<div class="col-6">
<div class="form-group">
<label  class="control-label mb-1">Guest Name</label>
<input autocomplete="off" value="<?php echo $guest_full_name; ?>" onkeyup="validate_guest_full_name(this.value);"  onchange="validate_guest_full_name(this.value);" required  name="guest_full_name" id="guest_full_name" type="text" class="is-valid form-control" >
</div>
</div>

<div class="col-6">
<label class="control-label mb-1">Guest Email</label>
 <div class="input-group">
<input autocomplete="off" value="<?php echo $guest_email_address; ?>" name="guest_email_address" id="guest_email_address"  type="email" class="is-valid form-control" placeholder="" >
</div>
</div>


</div>


<div class="row">

<div class="col-6">
<div class="form-group">
<label  class="control-label mb-1">Guest Phone Number</label>
<input autocomplete="off"  value="<?php echo $guest_phone_number; ?>"  onkeyup="validate_guest_phone_number(this.value);"  onchange="validate_guest_phone_number(this.value);" required  name="guest_phone_number" id="guest_phone_number" type="text" class="is-valid form-control" placeholder="" >
</div>
</div>

<div class="col-6">
<label class="control-label mb-1">Guest Address</label>
 <div class="input-group">
<input autocomplete="off" value="<?php echo $residential_address; ?>"  onkeyup="validate_residential_address(this.value);" onchange="validate_residential_address(this.value);" id="residential_address"  required  name="residential_address" type="text" class="is-valid form-control" placeholder="" >
</div>
</div>


</div>






  <div class="form-group">
  <label>Booking Method</label>
  <input    value="Local" name="booking_method" type="text" class="form-control" disabled="disabled />
</div>


 <div class="form-group">
 <label>Payment Method</label>
 <select style="width:60;" name="payment_method" required class="form-control" >
 <option>CASH</option>
 <option>POS</option>
 <option>ONLINE TRANSFER</option>
 </select>
 </div>





<?php } ?>