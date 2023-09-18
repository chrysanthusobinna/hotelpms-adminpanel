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


	$booking_id			=	$_GET['booking_id'];
	
	if(is_numeric($booking_id) && is_int((int)$booking_id)){
        $booking_id = (int)$booking_id;
    } else {
		header("location: manage_bookings.php?notif_err=Invalid+Booking!");  
    }
	
	
	if(empty($booking_id)) { 	header("location: manage_bookings.php?notif_err=Invalid+Booking!");  }

	$query_bookings = mysqli_query($con,"SELECT * FROM bookings WHERE id='$booking_id'");

	if(mysqli_num_rows($query_bookings)<1) {		header("location: manage_bookings.php?notif_err=Invalid+Booking!");  }

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

	
	if($booking_staff != "NULL")
	{
	$query_row_staff_booking=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$booking_staff'")) or die(mysqli_error($con));
	$booking_staff_info			=			 clean_output($query_row_staff_booking['full_name']);
		
	}
	else
	{
	$booking_staff_info			=			 "Guest";
		
	}

  if($checkin_staff	==	"NULL"){
	  $checkin_staff_info = "NO CHECKED-IN GUEST!";
  }
  else
  {
  $query_row_staff_checking=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$checkin_staff'")) or die(mysqli_error($con));
  $checkin_staff_info			=			 clean_output($query_row_staff_checking['full_name']);
  }


		//setting check-in time from hotel system settings
		$default_checkin_time_date =  date('jS M Y',(int)$checking_in_date);
		$default_checkin_time_date =  strtotime("$new_check_in_hours $default_checkin_time_date");
		$default_checkin_time_date_text =  date('h:iA - jS M Y',(int)$default_checkin_time_date);

		//if guest wishes to checkin at very early of a new day that is not accepted by the take out 24 hours from the original check out time

		$new_checking_out_date_x		=		($checking_out_date - 86400);
		$new_checking_out_date			=		 date('h:iA - jS M Y',(int)$new_checking_out_date_x);




?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $site_title; ?> | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta value="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../_source/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../_source/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../_source/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../_source/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../_source/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../_source/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../_source/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../_source/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



   	<script language="javascript">
	function update_active_link(){

	var element_ul = document.getElementById("manage_bookings");
	element_ul.classList.add("active");


	}
	</script>

	 <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">




<script>
function update_online_presence() {
  setInterval(function(){ 
  


 //ajax php
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        //return no result
 
     }
  }

var linkx = "ajax_update_online_presence.php?true=1";
xmlhttp.open("GET",linkx,true);
xmlhttp.send();


  
  }, 3000);
}

//300000 =  5mins in miliseconds

</script>


</head>
<body onload="update_online_presence();  update_active_link();" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="exit.php" class="nav-link">Logout</a>
      </li>
    </ul>


   </nav>
  <!-- /.navbar -->

<?php include("side_bar.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show Booking Record  <?php echo "#".$reference_no; ?></h1>
          </div><!-- /.col -->


        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Show Booking Record</li>
            </ol>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


	<?php include('notification.php'); ?>


	<?php include('manage_bookings_top_buttons.php'); ?>



	<!-- Loader -->
  <div class="loader loader-default is-active" id="loader_santhus" style=""></div>




	<?php

	// PHP FUNCTION FOR CHECK-IN DIV CARD

	if($cancel_staff != "NULL")
	 {
			 $card_checkin_text		=	"<p>No CHECK-IN! This Booking has been Canceled for more information See Staff Activity</p>";
			 $card_checkin_btn		=	"<button style='width:140px;' disabled type='button' class='btn btn-sm btn-primary'>
											CHECK-IN</button> ";
	  }
	  else
	  {
			if($checkin_staff	==	"NULL")
			{

				   if(time() < $default_checkin_time_date)
				   {
					$date_text_now			= 			date('jS M Y',time());	
					$date_text_checkin		=			date('jS M Y',(int)$default_checkin_time_date);
					
					if($date_text_now		==			$date_text_checkin)
					{
			 $card_checkin_text		=	"<p>You can't CHECK-IN Guest Now! Please Wait for our Early CHECK-IN time <b class='text-info
										'>$default_checkin_time_date_text</b> or Click the Button at the right side to CHECK-IN now and Check out at <b class='text-info'>$new_checking_out_date</b></p>";

			 $card_checkin_btn		=	"<button data-toggle='modal' data-target='#modal-checkin_guest_late'  style='width:140px;'
										type='button' class='btn btn-sm btn-primary'>CHECK-IN NOW</button> ";
										
													
					}
					else
					{
			 $card_checkin_text		=	"<p>You can't CHECK-IN Guest Now until CHECK-IN DATE <b class='text-info
										'>$date_text_checkin</b>";

			 $card_checkin_btn		=	"<button  style='width:140px;' disabled type='button' class='btn btn-sm btn-primary'>CHECK-IN NOW</button> ";
										
													
					}
  
					   
			
					}
					elseif(time() > $checking_out_date)
					{
			 $card_checkin_text		=	"<p>You can not CHECK-IN Guest! Booking CHECK-OUT Time has past!</p>";

			 $card_checkin_btn		=	"<button style='width:140px;' disabled type='button' class='btn btn-sm btn-primary'>
											CHECK-IN NOW</button> ";
					}
					else
					{
			 $card_checkin_text		=	"<p>Guest has not CHECKED-IN yet, Click the Button at the right side to CHECK-IN now!</p>";

			 $card_checkin_btn		=	"<button style='width:140px;' data-toggle='modal' data-target='#modal-checkin_guest'
											type='button' class='btn btn-sm btn-primary'>CHECK-IN NOW</button> ";
					}


			  }
			  else
			  {
			 $card_checkin_text		=	"<p>Guest has CHECKED-IN, For more information See Staff Activity.</p>";

			 $card_checkin_btn		=	"<button style='width:140px;'  type='button' class='btn btn-sm btn-primary' disabled>
											CHECK-IN NOW</button> ";
			  }

	  }

?>




<?php

	// PHP FUNCTION FOR CHECK-OUT

		if($cancel_staff !=	"NULL")
		{


			 $card_checkout_text		=	"<p>CHECK-OUT Function is unavaillable for Cancelled Booking!</p>";

			 $card_checkout_btn			=	"<button style='width:140px;' disabled type='button' class='btn btn-sm btn-primary'>
											CHECK-OUT NOW</button> ";


		}
		elseif($checkin_staff	==	"NULL")
		{
			 $card_checkout_text		=	"<p>CHECK-OUT Function is unavaillable Because Guest Has'nt CHECKED-IN yet!</p>";

			 $card_checkout_btn			=	"<button style='width:140px;' disabled type='button' class='btn btn-sm btn-primary'>
											CHECK-OUT NOW</button> ";


		}
		elseif($checkout_staff	!=	"NULL")
		{
			 $card_checkout_text		=	"<p>Guest has been CHECKED-OUT, for more information See Staff Activity.!</p>";

			 $card_checkout_btn			=	"<button style='width:140px;' disabled type='button' class='btn btn-sm btn-primary'>
											CHECK-OUT NOW</button> ";


		}
		else
		{

			 $card_checkout_text		=	"<p>You can click the Button at the right side to CHECK-OUT Guest!</p>";

			 $card_checkout_btn			=	"<button  data-toggle='modal' data-target='#modal-checkout_guest'  style='width:140px;'
											type='button' class='btn btn-sm btn-primary'> CHECK-OUT NOW</button> ";

		}


?>



<?php

	// PHP FUNCTION FOR CANCEL DIV CARD

	if($cancel_staff	==	"NULL")
	{


			if($checkin_staff	==	"NULL")
			{

			 $card_cancel_text		=	"<p>You can click the Button at the right side to Cancel to Cancel This Booking</p>";

			 $card_cancel_btn		=	"<button style='width:140px;' data-toggle='modal' data-target='#modal-cancel_booking'
										type='button' class='btn btn-sm btn-primary'  >
											CANCEL BOOKING</button> ";

			}
			else
			{

			 $card_cancel_text		=	"<p>You Can NOT Cancel This Booking Because Guest has already CHECKED-IN</p>";

			 $card_cancel_btn		=	"<button style='width:140px;'  type='button' class='btn btn-sm btn-primary' disabled >
											CANCEL BOOKING</button> ";

			}

	 }
	 else
	 {

		   	 $card_cancel_text		=	"<p>This Booking has been Canceled for more information See Staff Activity.</p>";

			 $card_cancel_btn		=	"<button style='width:140px;'  type='button' class='btn btn-sm btn-primary' disabled >
											CANCEL BOOKING</button> ";

	  }

?>


	<div class="callout callout-info">

	<table class="table table-bordered">
        <tbody>

        <tr>
        <td><b>CHECK-IN STATUS</b></td>
        <td><?php echo $card_checkin_text; ?></td>
		<td><?php echo $card_checkin_btn; ?> </td>
        </tr>

        <tr>
        <td><b>CHECK-OUT STATUS </b></td>
        <td><?php echo $card_checkout_text; ?></td>
        <td><?php echo $card_checkout_btn; ?></td>
        </tr>

        <tr>
        <td><b>CANCEL STATUS </b></td>
        <td><?php echo $card_cancel_text; ?></td>
        <td><?php echo $card_cancel_btn; ?></td>
        </tr>

        </tbody>

    </table>


	</div>


 <br/>

            <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Guest Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><b>Name</b></td>
                      <td><input disabled  type="text" value="<?php echo $guest_full_name; ?>"   class="form-control"></td>
                    </tr>
                    <tr>
                      <td><b>Phone Number</b></td>
                      <td><input disabled  type="text" value="<?php echo $guest_phone_number; ?>"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Email </b></td>
                      <td><input disabled  type="text" value="<?php echo $guest_email_address; ?>"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Address </b></td>
                      <td><input disabled  type="text" value="<?php echo $residential_address; ?>"   class="form-control"> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Room Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><b>Room Number</b></td>
                      <td><input disabled  type="text" value="<?php echo $room_number; ?>"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Class</b></td>
                      <td><input disabled  type="text" value="<?php echo $class_name; ?>"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Weekday Price</b></td>
                      <td><input disabled  type="email" value="&#163;<?php echo number_format($weekday_price,2); ?>"   class="form-control"></td>
                    </tr>
                    <tr>
                      <td><b>Weekend Price</b></td>
                      <td><input disabled  type="text" value="&#163;<?php echo number_format($weekend_price,2); ?>"   class="form-control"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



            <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Booking Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>CHECK-IN Date</b></td>
                      <td><input disabled  type="text" value="<?php echo date('h:iA - l,jS M Y',(int)$checking_in_date); ?>"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>CHECK-OUT Date </b></td>
                      <td><input disabled  type="text" value="<?php echo date('h:iA - l,jS M Y',(int)$checking_out_date); ?>"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Date Booked </b></td>
                      <td><input disabled  type="text" value="<?php echo date('h:iA - l,jS M Y',(int)$date_of_booking); ?>"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Method of Booking </b></td>
                      <td><input disabled  type="text" value="<?php echo $booking_method; ?>"   class="form-control"> </td>
                    </tr>
					</tbody>
                </table>
               </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-6">


            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Billing - <?php echo $booking_duration; ?> Night(s)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body  table-responsive p-0" style="height: 300px;">

                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>DAYS</th>
                      <th>DATE</th>
                      <th>PRICE</th>
                    </tr>
                  </thead>
                  <tbody>


		<?php echo $booking_billing; ?>

                  </tbody>
                 </table>
				 <hr/>

<br/>
<center>
                <table class="table table-bordered" style="width:90%">
                  <tbody>
				  <tr>
				  <td><b>SUBTOTAL</b></td>  <td>&#163;<?php echo number_format($sub_total_amount,2); ?></td> 
				  </tr>
				  <tr>				  
				  <td><b>DISCOUNT</b> <?php echo $discount_info; ?></td>  <td>&#163;<?php echo number_format($discount_amount,2); ?></td> 
				  </tr>
				  
				  <tr>				  
				  <td><b>GRAND TOTAL</b></td>  <td>&#163;<?php echo number_format($grand_total_amount,2); ?></td> 
				  </tr>
				  </tr>
				  <tr>				  
				  <td><b>PAYMENT METHOD</b></td>  <td><?php echo $payment_method; ?></td> 
				  </tr>				  
                  </tbody>
                 </table>
				 
				 <button  onclick="javascript:window.open('reciept_booking/?booking_id=<?php echo $booking_id; ?>', '_blank');" type="button" class="btn btn-info btn-flat btn-block">
				 PRINT RECIEPT
				 </button>				 
		 
</center>



                 </div>
                 <!-- /.card-->
 
            </div>
            <!-- /.card -->



          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Staff Activity Logs.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body  table-responsive p-0" style="height: 173px;">

                <table class="table table-head-fixed text-nowrap">
                  <tbody>

				  <?php echo $activity_logs_staff; ?>
				  <tr>
				  <td> </td>
				  </tr>


                  </tbody>
                 </table>




              </div>
              <!-- /.card-body -->
          				<div class="card-footer ">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-info float-right">BACK</button>
                 </div>
                 <!-- /.card-footer -->

            </div>
            <!-- /.card -->









      <div class="modal fade" id="modal-checkin_guest">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >CHECK-IN GUEST</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to CHECK-IN Guest Now?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="booking_id" 		value="<?php echo $booking_id; ?>" />
					<input type="hidden" name="activity_logs_staff" value="<?php echo $activity_logs_staff; ?>" />
                   <button type="submit" name="checkin"  class="btn btn-primary">YES</button>
				   </form>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">NO</button>
           </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->









      <div class="modal fade" id="modal-checkout_guest">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >CHECK-OUT GUEST</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to CHECK-OUT Guest Now?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="booking_id" 		value="<?php echo $booking_id; ?>" />
					<input type="hidden" name="activity_logs_staff" value="<?php echo $activity_logs_staff; ?>" />
                   <button type="submit" name="checkout"  class="btn btn-primary">YES</button>
				   </form>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">NO</button>
           </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->












      <div class="modal fade" id="modal-checkin_guest_late">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >CHECK-IN GUEST</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to CHECK-IN Guest Now?</p>
			<hr/>
			<b class="text-danger">Guest CHECK-OUT Time Will Be : <?php echo $new_checking_out_date; ?></b>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="booking_id" 		value="<?php echo $booking_id; ?>" />
					<input type="hidden" name="new_checking_out_date" 		value="<?php echo $new_checking_out_date_x; ?>" />
					<input type="hidden" name="activity_logs_staff" value="<?php echo $activity_logs_staff; ?>" />
                   <button type="submit" name="checkin_late"  class="btn btn-primary">YES</button>
				   </form>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">NO</button>
           </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->





      <div class="modal fade" id="modal-cancel_booking">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >CANCEL BOOKING</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to Cancel This Booking?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>" />
					<input type="hidden" name="hotel_room_id" value="<?php echo $hotel_room_id; ?>" />
					<input type="hidden" name="activity_logs_staff" value="<?php echo $activity_logs_staff; ?>" />
                   <button type="submit" name="cancel_booking"  class="btn btn-primary">YES</button>
				   </form>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">NO</button>
           </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->















      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><script>document.write(new Date().getFullYear());</script> &copy;  </strong>
    <?php echo $site_title; ?>  | Designed by <a href="https://www.linkedin.com/in/chrysanthus-obinna/" target="_blank"><b>CHRYSANTHUS.C</b></a>
    <div class="float-right d-none d-sm-inline-block">
     </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../_source/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../_source/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../_source/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../_source/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../_source/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../_source/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../_source/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../_source/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../_source/plugins/moment/moment.min.js"></script>
<script src="../_source/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../_source/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../_source/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../_source/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../_source/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../_source/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_source/dist/js/demo.js"></script>

  <script>
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>

<?php

	if(isset($_POST["checkin"]))
	{

		$checkin_staff			=			$_SESSION["user"];
		$query_row_staff_checking=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$_SESSION[user]'"));
		$checking_in_staff_info	=			 clean_output($query_row_staff_checking['full_name']);

		$new_checking_in_date	=			time();


		$booking_id			=			clean_input($_POST["booking_id"]);
		$activity_logs_staff	=			clean_input($_POST["activity_logs_staff"]);
		$check_date				=			date('h:i A - jS M Y',time());


		$activity_logs_staff	=			$activity_logs_staff."<tr><td>CHECKED-IN by Staff <b>$checking_in_staff_info</b> at $check_date</td></tr>";



		mysqli_query($con,"UPDATE bookings SET 	checkin_staff			=		'$checkin_staff',
												checking_in_date		=		'$new_checking_in_date',
												activity_logs_staff		=		'$activity_logs_staff'  WHERE id = '$booking_id'");

			header("location: ?booking_id=$booking_id&notif=Guest+has+been+CHECKED-IN!");
	}


?>





<?php

	if(isset($_POST["checkin_late"]))
	{

		$checkin_staff			=			$_SESSION["user"];
		$new_checking_out_date	=			clean_input($_POST["new_checking_out_date"]);
		$new_checking_in_date	=			time();

		$query_row_staff_checking=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$_SESSION[user]'")) or die(mysqli_error($con));
		$checking_in_staff_info	=			 clean_output($query_row_staff_checking['full_name']);


		$booking_id				=			clean_input($_POST["booking_id"]);
		$activity_logs_staff	=			clean_input($_POST["activity_logs_staff"]);
		$check_date				=			date('h:i A - jS M Y',time());


		$activity_logs_staff	=			$activity_logs_staff."<tr><td>CHECKED-IN by Staff <b>$checking_in_staff_info</b> at $check_date</td></tr>";



		mysqli_query($con,"UPDATE bookings SET 	checkin_staff			=		'$checkin_staff',
												activity_logs_staff		=		'$activity_logs_staff',
												checking_out_date		=		'$new_checking_out_date',
												checking_in_date		=		'$new_checking_in_date' WHERE id = '$booking_id'");

			header("location: ?booking_id=$booking_id&notif=Guest+has+been+CHECKED-IN!");
	}


?>








<?php

	if(isset($_POST["checkout"]))
	{

		$checkout_staff			=			$_SESSION["user"];
		$query_row_staff_checkout=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$_SESSION[user]'")) or die(mysqli_error($con));
		$checking_out_staff_info		=			 clean_output($query_row_staff_checkout['full_name']);

		$new_checking_out_date	=			time();


		$booking_id				=			clean_input($_POST["booking_id"]);
		$activity_logs_staff	=			clean_input($_POST["activity_logs_staff"]);
		$check_date				=			date('h:i A - jS M Y',time());


		$activity_logs_staff	=			$activity_logs_staff."<tr><td>CHECKED-OUT by Staff <b>$checking_out_staff_info</b> at $check_date</td></tr>";



		mysqli_query($con,"UPDATE bookings SET 	checkout_staff			=		'$checkout_staff',
											checking_out_date		=		'$new_checking_out_date',
											activity_logs_staff		=		'$activity_logs_staff'  WHERE id = '$booking_id'");

			header("location: ?booking_id=$booking_id&notif=Guest+has+been+CHECKED-OUT!");
	}


?>








<?php

	if(isset($_POST["cancel_booking"]))
	{

		$cancel_staff			=			$_SESSION["user"];
		$query_row_staff_cancel =mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$_SESSION[user]'")) or die(mysqli_error($con));
		$cancel_staff_info		=			 clean_output($query_row_staff_cancel['full_name']);

		$booking_id				=			clean_input($_POST["booking_id"]);
		$hotel_room_id			=			clean_input($_POST["hotel_room_id"]);
		$activity_logs_staff	=			clean_input($_POST["activity_logs_staff"]);

		$cancel_date			=			date('h:i A - jS M Y',time());
		$cancel_date_x			=			time();

		$activity_logs_staff	= 			$activity_logs_staff."<tr><td>Booking was Cancelled by Staff <b>$cancel_staff_info</b> at $cancel_date</td></tr>";


		mysqli_query($con,"UPDATE bookings SET 	cancel_staff			=		'$cancel_staff',
												cancel_date				=		'$cancel_date_x',
												activity_logs_staff		=		'$activity_logs_staff' WHERE id = '$booking_id'");


			header("location: ?booking_id=$booking_id&notif=This+Booking+Has+been+Cancelled!");
	}


?>






