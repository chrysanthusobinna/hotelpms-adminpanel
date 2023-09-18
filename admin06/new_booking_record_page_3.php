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
  
 

		$cart_ref					=				$_GET["cart_ref"];
		$checking_in_date			=				$_GET["checking_in_date"];
		$checking_out_date			=				$_GET["checking_out_date"];
		$class_id					=				$_GET["class_id"];
		$number_of_selected_rooms	=				$_GET["number_of_selected_rooms"];
		

		$query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$class_id'")) or die(mysqli_error($con));
		$class_name				=			 clean_output($query_row_room_class['class_name']);
		$class_id				=			 clean_output($query_row_room_class['id']);
		$class_name				=			 clean_output($query_row_room_class['class_name']);
		$class_description		=			 clean_output($query_row_room_class['class_description']);
		$weekday_price			=			 clean_output($query_row_room_class['weekday_price']);
		$weekend_price			=			 clean_output($query_row_room_class['weekend_price']);


		$b_cart_room_number		=	array();
		$sub_total_amount 		=	0;
		$query_booking_cart=mysqli_query($con,"SELECT * FROM booking_cart WHERE cart_ref='$cart_ref' ORDER BY id DESC");
		  
		  while($row_booking_cart=mysqli_fetch_array($query_booking_cart))
		  {
			  
		  $b_cart_room_number[]		  		=			 ",".$row_booking_cart["b_cart_room_number"];
 
		  $sub_total_amount						+=			$row_booking_cart["b_cart_sub_total_amount"];
		  
 		  }
		  
		  $all_room_numbers = implode(" ",$b_cart_room_number);

		  
 

		$booking_duration = ceil(abs($checking_out_date - $checking_in_date) / 86400);



//BOKING DISCOUNT
		$discount_info			 = "NULL";
		$discount_amount		 = 0; //default
		$grand_total_amount = $sub_total_amount; //default 
		
		if(isset($_GET['add_discount']) && ($_GET['add_discount']=='true'))
		{
			
		$booking_discount_id_x			=		$_GET['booking_discount_id_x'];
		
		if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM booking_discount WHERE id='$booking_discount_id_x'"))>0)
		{ 


	
		$query_booking_discount_sql_x	=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM booking_discount WHERE id='$booking_discount_id_x'"));
		$booking_discount_name			=		$query_booking_discount_sql_x["booking_discount_name"];
		$booking_discount_percentage	=		(int)$query_booking_discount_sql_x["booking_discount_percentage"];
	

				$discount_amount		 =	($booking_discount_percentage / 100) * $sub_total_amount;
				$grand_total_amount =	($sub_total_amount - $discount_amount);
				$discount_info			 =  $booking_discount_name."-".$booking_discount_percentage."%";

				
		}
		else
		{
		$discount_amount		 = 0; //default
		$grand_total_amount = $sub_total_amount; //default 
		$discount_info			 = "NULL";
		

		}
		
		}
		
		if($discount_info=="NULL") {$discount_info_txt="";}else{$discount_info_txt="[".$discount_info."]";}

		


//FUNCTION THAT GENERATES RANDOM NUMBER USING TIME & RAND FOR 9 NUMBERS

 		$new_rand		=	time().rand(1000,9000);
		$new_rand		=	substr($new_rand, 5);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $site_title; ?> | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
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


 <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">	

<script language="javascript">


 
 
 
	//validate  guest_full_name
	function validate_guest_full_name(var_guest_full_name){	
		if ((/^[a-zA-Z ]+$/.test(var_guest_full_name)==false) || (var_guest_full_name.length > 50))
		  {

 			var guest_full_name_var = document.getElementById("guest_full_name");
			guest_full_name_var.classList.remove("is-valid");
			guest_full_name_var.classList.add("is-invalid");
			//document.getElementById("guest_full_name").value="";	
		  }
		  else
		  {
  
 			var guest_full_name_var = document.getElementById("guest_full_name");
			guest_full_name_var.classList.remove("is-invalid");
			guest_full_name_var.classList.add("is-valid");
 
 
  		  }	


			var guest_full_nameElement = document.getElementById('guest_full_name');
			var guest_phone_numberElement = document.getElementById('guest_phone_number');
			var residential_addressElement = document.getElementById('residential_address');
			
			if(guest_full_nameElement.classList.contains('is-valid') && guest_phone_numberElement.classList.contains('is-valid') && residential_addressElement.classList.contains('is-valid'))
			{
			document.getElementById("continue_booking").disabled = false;
			}
			else
			{
			document.getElementById("continue_booking").disabled = true;				
			}		 

	}
	



 



	//validate  guest_phone_number
	function validate_guest_phone_number(var_guest_phone_number){
		if((isNaN(var_guest_phone_number))  || (var_guest_phone_number.length > 30))
 		{
			var guest_phone_number_var = document.getElementById("guest_phone_number");
			guest_phone_number_var.classList.remove("is-valid");
			guest_phone_number_var.classList.add("is-invalid");
			//document.getElementById("guest_phone_number").value="";
		  }
		  else
		  {
  			var guest_phone_number_var = document.getElementById("guest_phone_number");
			guest_phone_number_var.classList.remove("is-invalid");
			guest_phone_number_var.classList.add("is-valid");

  		  }


			var guest_full_nameElement = document.getElementById('guest_full_name');
			var guest_phone_numberElement = document.getElementById('guest_phone_number');
			var residential_addressElement = document.getElementById('residential_address');
			
			if(guest_full_nameElement.classList.contains('is-valid') && guest_phone_numberElement.classList.contains('is-valid') && residential_addressElement.classList.contains('is-valid'))
			{
			document.getElementById("continue_booking").disabled = false;
			}
			else
			{
			document.getElementById("continue_booking").disabled = true;				
			}		 
	}







	//validate  residential_address
	function validate_residential_address(var_residential_address){

 		if((/[,#-\/\s\!\@\$.....]/.test(var_residential_address)==false)  || (var_residential_address.length > 100))
		{
  			var residential_address_var = document.getElementById("residential_address");
			residential_address_var.classList.remove("is-valid");
			residential_address_var.classList.add("is-invalid");
			//document.getElementById("residential_address").value="";
		  }
		  else
		  {

 			var residential_address_var = document.getElementById("residential_address");
			residential_address_var.classList.remove("is-invalid");
			residential_address_var.classList.add("is-valid");
  		  }

			var guest_full_nameElement = document.getElementById('guest_full_name');
			var guest_phone_numberElement = document.getElementById('guest_phone_number');
			var residential_addressElement = document.getElementById('residential_address');
			
			if(guest_full_nameElement.classList.contains('is-valid')&& guest_phone_numberElement.classList.contains('is-valid') && residential_addressElement.classList.contains('is-valid'))
			{
			document.getElementById("continue_booking").disabled = false;
			}
			else
			{
			document.getElementById("continue_booking").disabled = true;				
			}		 
	}





	
</script>
 
 
 
 
 

<script language="javascript">
function fetch_guest_information(guest_phone_number) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("loader_santhus").style.display = "none";
		document.getElementById("continue_booking").disabled = false;
        document.getElementById("guest_info_result").innerHTML=xmlhttp.responseText;
     }
  }

  document.getElementById("loader_santhus").style.display = "block";
  xmlhttp.open("GET","ajax_fetch_guest_information.php?guest_phone_number="+guest_phone_number,true);
  xmlhttp.send();
}

</script>

   	<script language="javascript">
	function update_active_link(){

	var element_ul = document.getElementById("manage_bookings");
	element_ul.classList.add("active");


	}
	</script>




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
        <a href="logout.php" onclick="if (confirm('Are you Sure you want to Log out Now?')){return true;}else{event.stopPropagation(); event.preventDefault();};"   class="nav-link">Logout</a>
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
            <h1 class="m-0 text-dark">New Booking Record</h1>
          </div><!-- /.col -->


        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">New Booking Record</li>
            </ol>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">



	<?php include('notification.php'); ?>


	<!-- Loader -->
  <div class="loader loader-default is-active" id="loader_santhus" style=""></div>





        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="width:15%;" class="profile-user-img img-fluid img-circle"
                       src="../_source/dist/img/house4-128x128.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">[<b><?php echo $number_of_selected_rooms; ?></b>] <?php echo $class_name; ?> ROOM(S)</h3>

                <p class="text-muted text-center"><b>Room Number(s): <?php echo substr($all_room_numbers, 1); ?></b> </p>

                <ul class="list-group list-group-unbordered mb-3">
				
                  <li class="list-group-item">
                    <b>Weekday Price</b> <a class="float-right">&#163;<?php echo number_format($weekday_price,2); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Weekend Price</b> <a class="float-right">&#163;<?php echo number_format($weekend_price,2); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>CHECK-IN Date</b> <a class="float-right"><?php echo date('jS M Y',(int)$checking_in_date); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>CHECK-OUT Date</b> <a class="float-right"><?php echo date('jS M Y',(int)$checking_out_date); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Booking Duration</b> <a class="float-right"><?php echo $booking_duration; ?> Night(s)</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sub Total</b> <a class="float-right">&#163;<?php echo number_format($sub_total_amount,2); ?></a>
                  </li>

                  <li class="list-group-item">
				  <b>Discount <?php echo $discount_info_txt; ?></b> <a class="float-right">&#163;<?php echo number_format($discount_amount,2); ?></a> 
                  </li>
				  
                  <li class="list-group-item">
                    <b>Total</b> <a class="float-right">&#163;<?php echo number_format($grand_total_amount,2); ?></a>
                  </li>				  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-7">

  <form action="" method='POST'>

  <input type ="hidden" name="cart_ref" 				value="<?php echo $cart_ref; ?>"/>


  <input type ="hidden" name="checking_in_date" 		value="<?php echo $checking_in_date; ?>"/>
  <input type ="hidden" name="checking_out_date" 		value="<?php echo $checking_out_date; ?>"/>
  <input type ="hidden" name="class_id" 				value="<?php echo $class_id; ?>"/>
  <input type ="hidden" name="reference_no" 			value="<?php echo $new_rand; ?>"/>
  <input type ="hidden" name="date_of_booking"			value="<?php echo time(); ?>"/>
  <input type ="hidden" name="booking_method" 			value="LOCAL"/>
  <input type ="hidden" name="booking_duration" 		value="<?php echo $booking_duration; ?>"/>


  <input type ="hidden" name="discount_amount" 			value="<?php echo ($discount_amount / $number_of_selected_rooms); ?>"/>
  <input type ="hidden" name="grand_total_amount" 	value="<?php echo ($grand_total_amount / $number_of_selected_rooms); ?>"/>
  <input type ="hidden" name="discount_info" 			value="<?php echo $discount_info; ?>"/>




             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Enter Guest Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">



                <div class="input-group input-group">
                  <input placeholder="Search of Guest information Using Phone Number E.g: 080xxxxxxxx" onchange="fetch_guest_information(this.value);"  type="text" class="form-control">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat">Search!</button>
                  </span>
                </div>

<hr/>

<div id="guest_info_result">

<div class="row">

<div class="col-6">
<div class="form-group">
<label  class="control-label mb-1">Guest Name</label>
<input autocomplete="off" value="" onkeyup="validate_guest_full_name(this.value);"  onchange="validate_guest_full_name(this.value);" required  name="guest_full_name" id="guest_full_name" type="text" class="form-control" >
</div>
</div>

<div class="col-6">
<label class="control-label mb-1">Guest Email</label>
 <div class="input-group">
<input autocomplete="off"  name="guest_email_address" id="guest_email_address"  type="email" class="is-valid form-control" >
</div>
</div>


</div>


<div class="row">

<div class="col-6">
<div class="form-group">
<label  class="control-label mb-1">Guest Phone Number</label>
<input autocomplete="off"  value=""  onkeyup="validate_guest_phone_number(this.value);"  onchange="validate_guest_phone_number(this.value);" required  name="guest_phone_number" id="guest_phone_number" type="text" class="form-control" >
</div>
</div>

<div class="col-6">
<label class="control-label mb-1">Guest Address</label>
 <div class="input-group">
<input autocomplete="off" value=""  onkeyup="validate_residential_address(this.value);" onchange="validate_residential_address(this.value);" id="residential_address"  required  name="residential_address" type="text" class="form-control" >
</div>
</div>


</div>

  <div class="form-group">

<button type="button" data-toggle='modal'  data-target='#modal-discount' class="btn btn-info btn-flat btn-block">BOOKING DISCOUNT</button>

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

</div>
			 </div>
              <!-- /.card-body -->
                 <div class="card-footer ">
                   <button disabled onclick="return confirm('Are you Sure you want to Save this Booking?');"
				   type="submit" name="submit"  id="continue_booking"  class="btn btn-primary">Continue</button>
                   <button type="button"  onclick="history.go(-1);" class="btn btn-danger float-right">Back</button>
                 </div>
                 <!-- /.card-footer -->
            </div>
            <!-- /.card -->
</form>


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->









<br/>















      <div class="modal fade" id="modal-discount">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Booking Discount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

			<form action="" method="GET">
			<input type="hidden" name="cart_ref" value="<?php echo $_GET['cart_ref']; ?>">
			<input type="hidden" name="checking_in_date" value="<?php echo $_GET['checking_in_date']; ?>">
			<input type="hidden" name="checking_out_date" value="<?php echo $_GET['checking_out_date']; ?>">
			<input type="hidden" name="class_id" value="<?php echo $_GET['class_id']; ?>">
			<input type="hidden" name="number_of_selected_rooms" value="<?php echo $_GET['number_of_selected_rooms']; ?>">
            <div class="modal-body">

	<table class="table table-bordered">
    <thead>
    <tr>
    <th>DISCOUNT </th>
    <th>PERCENTAGE(%) </th>
    </tr>
    </thead>	
        <tbody>

<tr>
<td>
<div class="custom-control custom-radio">
<?php
$checked_var_x ="checked";
if(isset($_GET["booking_discount_id_x"]) && ($_GET["booking_discount_id_x"]=='0')){ $checked_var_x ="checked";} 

?>
<input name="booking_discount_id_x" class="custom-control-input" type="radio" id="none" value="0" <?php echo $checked_var_x; ?> >
<label for="none" class="custom-control-label">NO DISCOUNT</label>
</div>
</td>
<td>- % 0</td>
</tr>


<?php

$query_booking_discount_sql=mysqli_query($con,"SELECT * FROM booking_discount ORDER BY id DESC") or die(mysqli_error($con));
 
while($query_booking_discount=mysqli_fetch_array($query_booking_discount_sql))
{
  $booking_discount_id			=			 clean_output($query_booking_discount['id']);
  $booking_discount_name		=			 clean_output($query_booking_discount['booking_discount_name']);
  $booking_discount_percentage	=			 clean_output($query_booking_discount['booking_discount_percentage']);
  $booking_discount_status		=			 clean_output($query_booking_discount['booking_discount_status']);

  if($booking_discount_status		==	"1")
  {
	$disabled	=	"";
  }
  elseif($booking_discount_status	==	"0")
  {
	$disabled	=	"disabled";
  } 
  
 
  
  if(isset($_GET["booking_discount_id_x"]) && ($_GET["booking_discount_id_x"]==$booking_discount_id)){ $checked_var ="checked";}else{$checked_var ="";}
	 
 if($booking_discount_name!="Online Booking"){	 
  ?>
  
<tr>
<td>
<div class="custom-control custom-radio">
<input name="booking_discount_id_x" class="custom-control-input" type="radio" id="<?php echo $booking_discount_id; ?>" value="<?php echo $booking_discount_id; ?>" <?php echo $disabled; ?>  <?php echo $checked_var; ?>>
<label for="<?php echo $booking_discount_id; ?>" class="custom-control-label"><?php echo $booking_discount_name; ?></label>
</div>
</td>
<td>- % <?php echo $booking_discount_percentage; ?> </td>
</tr>
  
<?php } ?>

<?php if((mysqli_num_rows($query_booking_discount_sql))==0){ ?>
<tr>
<td><b>NO BOOKING DISCOUNT AVAILABLE</b></td>
<td></td>

</tr>

<?php }} ?>
                
<tbody>
</table>
 

	
	 
					  
 
           </div>

            <div class="modal-footer justify-content-between">
                    <button type="submit" name="add_discount" value="true" class="btn btn-primary">SAVE</button>
                    <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">CANCEL</button>
           </div>
		   </form>
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

 if(isset($_POST["submit"]))
 {

 
  $cart_ref							=			clean_input($_POST["cart_ref"]);


  $guest_full_name					=			clean_input(ucwords(strtolower($_POST["guest_full_name"])));
  
  if(empty($_POST["guest_email_address"]))
  { 
  $guest_email_address 				= 			"NULL"; 
  }
  else
  { 
  $guest_email_address 				= 			clean_input(strtolower($_POST["guest_email_address"])); 
  }
 
  $guest_phone_number				=			clean_input($_POST["guest_phone_number"]);
  $residential_address				=			clean_input(ucwords(strtolower($_POST["residential_address"])));


  $checking_in_date					=			clean_input($_POST["checking_in_date"]);
  $checking_out_date				=			clean_input($_POST["checking_out_date"]);
  $class_id							=			clean_input($_POST["class_id"]);

  $reference_no						=			clean_input($_POST["reference_no"]);

  $date_of_booking					=			clean_input($_POST["date_of_booking"]);
  $date_of_booking_x				=			 date('h:i A - jS M Y',(int)$date_of_booking);

  $booking_method					=			clean_input($_POST["booking_method"]);
  $payment_method					=			clean_input($_POST["payment_method"]);


  $booking_duration					=			clean_input($_POST["booking_duration"]);

  $discount_amount					=			clean_input($_POST["discount_amount"]);
  $grand_total_amount			=			clean_input($_POST["grand_total_amount"]);
  $discount_info					=			clean_input($_POST["discount_info"]);


  $query_row_staff_booking=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$_SESSION[user]'")) or die(mysqli_error($con));
  $booking_staff_info			=			 clean_output($query_row_staff_booking['full_name']);


  $booking_staff					=			$_SESSION["user"];
  $checkin_staff					=			"NULL";
  $checkout_staff					=			"NULL";
  $cancel_staff						=			"NULL";
  $cancel_date						=			"0";
  $activity_logs_staff				=			"<tr><td>BOOKED by Staff <b>$booking_staff_info</b> at $date_of_booking_x</td></tr>";


//data to fetch from booking_cart using cart_ref
//	$hotel_room_id		 
//	$room_number					 
//	$sub_total_amount			 
//	$booking_billing			 




	$query_booking_cart=mysqli_query($con,"SELECT * FROM booking_cart WHERE cart_ref='$cart_ref' ORDER BY id DESC");
	  
	while($row_booking_cart=mysqli_fetch_array($query_booking_cart))
	{

		  $hotel_room_id						=			$row_booking_cart["b_cart_hotel_room_id"];
		  $room_number							=			$row_booking_cart["b_cart_room_number"];
		  $sub_total_amount						=			$row_booking_cart["b_cart_sub_total_amount"];
		  $booking_billing						=			$row_booking_cart["b_cart_booking_billing"];
		  
		  
		  


  mysqli_query($con,"INSERT INTO bookings SET	guest_full_name				=	'$guest_full_name',
												guest_email_address			=	'$guest_email_address',
												guest_phone_number			=	'$guest_phone_number',
												residential_address			=	'$residential_address',

												checking_in_date			=	'$checking_in_date',
												checking_out_date			=	'$checking_out_date',
												class_id					=	'$class_id',
												hotel_room_id				=	'$hotel_room_id',
												room_number					=	'$room_number',

												reference_no				=	'$reference_no',
												date_of_booking				=	'$date_of_booking',
												booking_method				=	'$booking_method',
												payment_method				=	'$payment_method',

												sub_total_amount			=	'$sub_total_amount',
												discount_amount				=	'$discount_amount',
												grand_total_amount			=	'$grand_total_amount',
												discount_info				=	'$discount_info',
												
												booking_billing				=	'$booking_billing',
												booking_duration			=	'$booking_duration',
												booking_staff				=	'$booking_staff',
												checkin_staff				=	'$checkin_staff',
												checkout_staff				=	'$checkout_staff',
												cancel_staff				=	'$cancel_staff',
												cancel_date					=	'$cancel_date',
												activity_logs_staff			=	'$activity_logs_staff'") or die(mysqli_error($con));		  
		  
 	}
		  





			header("location: manage_bookings.php?notif=Booking+Saved!");


 }

 ?>