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

 
		//validates user 
		if(($main_role_x == 'front_desk_staff') || ($main_role_x == 'general_admin')) 
		{
		allow_access();
		}
		else
		{
		header("location: index.php?notif_err=Access+Denied");
		}
		
 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $site_title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../_source/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../_source/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../_source/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
 
	

	
	<style>
	
	#example1 td { 
	}

	#example1.hide_now tr > *:nth-child(8) {
    display: none;
	}

	#example2.hide_now tr > *:nth-child(8) {
    display: none;
	}
	</style>	 
	
	
	
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


	 <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">


</head>
<body onload="update_online_presence();  update_active_link();" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed " id="html_body">

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
    <section class="content-header">
      <div class="container-fluid">
	  

	<?php include('notification.php'); ?>



	<!-- Loader -->
  <div class="loader loader-default is-active" id="loader_santhus" style=""></div>



	  
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Booking Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage All Booking Records</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
       <section class="content">
      <div class="container-fluid">

		<div id="included_divs">
		
		<?php include("manage_bookings_small_boxes.php"); ?>


		<?php include('manage_bookings_top_buttons.php'); ?>
		
		</div>

	
	  
	<div class="row">

	<div class="col-12">
	
		
			
		<?php if(isset($_GET['sort']) && $_GET['sort']=='today_checkin') { ?>
	

             <div class="card card-success collapsed-card">
              <div class="card-header" data-card-widget="collapse" data-toggle="tooltip">
                <h3 class="card-title">( <?php echo $no_today_check_in; ?> ) Booking Records Where Guest CHECKED-IN Today</h3>
		 
					<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-plus"></i>
					</button>
			  
					
				   </div>
 				
              </div>
              <!-- /.card-header -->


            <div class="card-body table-responsive">

              <table id="example1" class="table table-bordered table-striped" style="height: 265px;">
                  <thead>
                    <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                    </tr>
                  </thead>
                  <tbody>
				  
				  
		<?php
		$query_bookings=mysqli_query($con,"SELECT * FROM bookings ORDER BY id DESC");
		while($query_bookings_rows=mysqli_fetch_array($query_bookings))
			{
			$id						=			 clean_output($query_bookings_rows['id']);
			$date_of_booking		=			 clean_output($query_bookings_rows['date_of_booking']);
			$checking_in_date		=			 clean_output($query_bookings_rows['checking_in_date']);
			$checking_out_date		=			 clean_output($query_bookings_rows['checking_out_date']);
			$reference_no			=			 clean_output($query_bookings_rows['reference_no']);
			$guest_full_name		=			 clean_output($query_bookings_rows['guest_full_name']);
			$guest_phone_number		=			 clean_output($query_bookings_rows['guest_phone_number']);
			$room_number			=			 clean_output($query_bookings_rows['room_number']);
			$grand_total_amount		=			 clean_output($query_bookings_rows['grand_total_amount']);


			
			$var_checkin_staff_xx	= 			 clean_output($query_bookings_rows['checkin_staff']);

			$checking_in_date_x		= 			 date('jS M Y',(int)$checking_in_date);
			
			$todays_date			=			 date('jS M Y',time());
  
 
		if(($checking_in_date_x == $todays_date) && ($var_checkin_staff_xx != "NULL"))
		{
		

		?>
		<tr> 
		<td><?php echo $guest_full_name; ?></td>  
		<td><?php echo $guest_phone_number; ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_in_date); ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_out_date); ?></td> 
		<td><?php echo $reference_no; ?></td> 
		<td><?php echo $room_number; ?></td> 
		<td>&#163;<?php echo number_format($grand_total_amount,2); ?></td> 
		<td>
		<button  onclick="window.location='show_booking.php?booking_id=<?php echo $id; ?>';" type="button"  class="open-EditDialog btn btn-success  btn-sm"><i class="fas fa-eye"></i></button>

		<button  
		data-id='<?php echo $id; ?>' 
		data-toggle='modal' 
		data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>            
		</td>
			
		</tr>

		<?php 
		}
		
		} 
		?>
 


<?php if((mysqli_num_rows($query_bookings))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>
             
			 
                  </tbody>	
                <tfoot>
                <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                </tr>
                </tfoot>				  
                 </table>
				 
  
  

              </div>
              <!-- /.card-body -->
 				<div class="card-footer" id="functional_buttons_div">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-success float-right">BACK</button>
                 </div>
                 <!-- /.card-footer -->         
		  

            </div>
            <!-- /.card -->
		
<hr/>	


             <div class="card card-success collapsed-card">
              <div class="card-header" data-card-widget="collapse" data-toggle="tooltip">
                <h3 class="card-title">( <?php echo $total_today_check_in; ?> ) Booking Records Where Guest are expected to CHECK-IN Today</h3>

					<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-plus"></i>
					</button>
			  
					
				   </div>		 
 				
              </div>
              <!-- /.card-header -->


            <div class="card-body table-responsive">

              <table id="example2" class="table table-bordered table-striped" style="height: 265px;">
                  <thead>
                    <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                    </tr>
                  </thead>
                  <tbody>
				  
				  
		<?php
		$query_bookings=mysqli_query($con,"SELECT * FROM bookings ORDER BY id DESC");
		while($query_bookings_rows=mysqli_fetch_array($query_bookings))
			{
			$id						=			 clean_output($query_bookings_rows['id']);
			$date_of_booking		=			 clean_output($query_bookings_rows['date_of_booking']);
			$checking_in_date		=			 clean_output($query_bookings_rows['checking_in_date']);
			$checking_out_date		=			 clean_output($query_bookings_rows['checking_out_date']);
			$reference_no			=			 clean_output($query_bookings_rows['reference_no']);
			$guest_full_name		=			 clean_output($query_bookings_rows['guest_full_name']);
			$guest_phone_number		=			 clean_output($query_bookings_rows['guest_phone_number']);
			$room_number			=			 clean_output($query_bookings_rows['room_number']);
			$grand_total_amount			=			 clean_output($query_bookings_rows['grand_total_amount']);
			
			$checking_in_date_x		= 			 date('jS M Y',(int)$checking_in_date);
			
			$todays_date			=			 date('jS M Y',time());
  
  
		if($checking_in_date_x == $todays_date)
		{
		

		?>
		<tr> 
		<td><?php echo $guest_full_name; ?></td>  
		<td><?php echo $guest_phone_number; ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_in_date); ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_out_date); ?></td> 
		<td><?php echo $reference_no; ?></td> 
		<td><?php echo $room_number; ?></td> 
		<td>&#163;<?php echo number_format($grand_total_amount,2); ?></td> 
		<td>
		<button  onclick="window.location='show_booking.php?booking_id=<?php echo $id; ?>';" type="button"  class="open-EditDialog btn btn-success  btn-sm"><i class="fas fa-eye"></i></button>

		<button  
		data-id='<?php echo $id; ?>' 
		data-toggle='modal' 
		data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>            
		</td>
			
		</tr>
		<?php 
		}
		
		} 
		?>
 


<?php if((mysqli_num_rows($query_bookings))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>
             
			 
                  </tbody>		
                <tfoot>
                <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                </tr>
                </tfoot>				  
                 </table>
				 
  
  

              </div>
              <!-- /.card-body -->
          
              <!-- /.card-body -->
 				<div class="card-footer" id="functional_buttons_div_2">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-success float-right">BACK</button>
                 </div>
                 <!-- /.card-footer --> 	  
		  
 
            </div>
            <!-- /.card -->
		

		
	<?php } elseif(isset($_GET['sort']) && $_GET['sort']=='today_checkout') { ?>


             <div class="card card-warning collapsed-card">
              <div class="card-header" data-card-widget="collapse" data-toggle="tooltip">
                <h3 class="card-title">( <?php echo $no_today_check_out; ?> ) Booking Records Where Guest has CHECKED-OUT Today</h3>
					<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-plus"></i>
					</button>
			  
					
				   </div>					 
              </div>
              <!-- /.card-header -->


            <div class="card-body table-responsive">

              <table id="example1" class="table table-bordered table-striped" style="height: 265px;">
                  <thead>
                    <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                    </tr>
                  </thead>
                  <tbody>
				  
				  
		<?php
		$query_bookings=mysqli_query($con,"SELECT * FROM bookings ORDER BY id DESC");
		while($query_bookings_rows=mysqli_fetch_array($query_bookings))
			{
			$id						=			 clean_output($query_bookings_rows['id']);
			$date_of_booking		=			 clean_output($query_bookings_rows['date_of_booking']);
			$checking_in_date		=			 clean_output($query_bookings_rows['checking_in_date']);
			$checking_out_date		=			 clean_output($query_bookings_rows['checking_out_date']);
			$reference_no			=			 clean_output($query_bookings_rows['reference_no']);
			$guest_full_name		=			 clean_output($query_bookings_rows['guest_full_name']);
			$guest_phone_number		=			 clean_output($query_bookings_rows['guest_phone_number']);
			$room_number			=			 clean_output($query_bookings_rows['room_number']);
			$grand_total_amount			=			 clean_output($query_bookings_rows['grand_total_amount']);

			$var_checkout_staff_x	=			 clean_output($query_bookings_rows['checkout_staff']);
			
			$checking_out_date_x	= 			 date('jS M Y',(int)$checking_out_date);
			
			$todays_date			=			 date('jS M Y',time());
  
 
		if(($checking_out_date_x == $todays_date) && ($var_checkout_staff_x != "NULL"))
		{
		

		?>
		<tr> 
		<td><?php echo $guest_full_name; ?></td>  
		<td><?php echo $guest_phone_number; ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_in_date); ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_out_date); ?></td> 
		<td><?php echo $reference_no; ?></td> 
		<td><?php echo $room_number; ?></td> 
		<td>&#163;<?php echo number_format($grand_total_amount,2); ?></td> 
		<td>
		<button  onclick="window.location='show_booking.php?booking_id=<?php echo $id; ?>';" type="button"  class="open-EditDialog btn btn-success  btn-sm"><i class="fas fa-eye"></i></button>

		<button  
		data-id='<?php echo $id; ?>' 
		data-toggle='modal' 
		data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>            
		</td>
			
		</tr>
		<?php 
		}
		
		} 
		?>
 


<?php if((mysqli_num_rows($query_bookings))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>
             
			 
                  </tbody>	
                <tfoot>
                <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                </tr>
                </tfoot>				  
                 </table>
				 
  
  

              </div>
                <!-- /.card-body -->
 				<div class="card-footer" id="functional_buttons_div">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-warning float-right">BACK</button>
                 </div>
                 <!-- /.card-footer -->   
 
            </div>
            <!-- /.card -->

<hr/>


             <div class="card card-warning  collapsed-card">
              <div class="card-header" data-card-widget="collapse" data-toggle="tooltip">
                <h3 class="card-title">( <?php echo $total_today_check_out; ?> ) Booking Records Where Guest are Expected to CHECK-OUT Today</h3>
					<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-plus"></i>
					</button>
			  
					
				   </div>					 
              </div>
              <!-- /.card-header -->


            <div class="card-body table-responsive">

              <table id="example2" class="table table-bordered table-striped" style="height: 265px;">
                  <thead>
                    <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                    </tr>
                  </thead>
                  <tbody>
				  
				  
		<?php
		$query_bookings=mysqli_query($con,"SELECT * FROM bookings ORDER BY id DESC");
		while($query_bookings_rows=mysqli_fetch_array($query_bookings))
			{
			$id						=			 clean_output($query_bookings_rows['id']);
			$date_of_booking		=			 clean_output($query_bookings_rows['date_of_booking']);
			$checking_in_date		=			 clean_output($query_bookings_rows['checking_in_date']);
			$checking_out_date		=			 clean_output($query_bookings_rows['checking_out_date']);
			$reference_no			=			 clean_output($query_bookings_rows['reference_no']);
			$guest_full_name		=			 clean_output($query_bookings_rows['guest_full_name']);
			$guest_phone_number		=			 clean_output($query_bookings_rows['guest_phone_number']);
			$room_number			=			 clean_output($query_bookings_rows['room_number']);
			$grand_total_amount			=			 clean_output($query_bookings_rows['grand_total_amount']);

			$var_checkout_staff_xx	=			 clean_output($query_bookings_rows['checkout_staff']);
			
			$checking_out_date_x	= 			 date('jS M Y',(int)$checking_out_date);
			
			$todays_date			=			 date('jS M Y',time());
  
 
		if($checking_out_date_x == $todays_date)
		{
		

		?>
		<tr> 
		<td><?php echo $guest_full_name; ?></td>  
		<td><?php echo $guest_phone_number; ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_in_date); ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_out_date); ?></td> 
		<td><?php echo $reference_no; ?></td> 
		<td><?php echo $room_number; ?></td> 
		<td>&#163;<?php echo number_format($grand_total_amount,2); ?></td> 
		<td>
		<button  onclick="window.location='show_booking.php?booking_id=<?php echo $id; ?>';" type="button"  class="open-EditDialog btn btn-success  btn-sm"><i class="fas fa-eye"></i></button>

		<button  
		data-id='<?php echo $id; ?>' 
		data-toggle='modal' 
		data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>            
		</td>
			
		</tr>
		<?php 
		}
		
		} 
		?>
 


<?php if((mysqli_num_rows($query_bookings))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>
             
			 
                  </tbody>			
                <tfoot>
                <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                </tr>
                </tfoot>				  
                 </table>
				 
  
  

              </div>
              <!-- /.card-body -->
 				<div class="card-footer" id="functional_buttons_div_2">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-warning float-right">BACK</button>
                 </div>
                 <!-- /.card-footer -->    
            </div>
            <!-- /.card -->



	
	<?php } elseif(isset($_GET['sort']) && $_GET['sort']=='current_bookings') { ?>


              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">( <?php echo $no_current_logged; ?> ) Booking Records Where Guest are Currently Logged </h3>
				 
              </div>
              <!-- /.card-header -->


            <div class="card-body table-responsive">

              <table id="example1" class="table table-bordered table-striped" style="height: 265px;">
                  <thead>
                    <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                    </tr>
                  </thead>
                  <tbody>
				  
				  
		<?php
		$current_time = time();
		
		$query_bookings=mysqli_query($con,"SELECT * FROM bookings WHERE checking_in_date < '$current_time_x' AND checkin_staff !='NULL' AND checkout_staff ='NULL'");
		while($query_bookings_rows=mysqli_fetch_array($query_bookings))
			{
			$id						=			 clean_output($query_bookings_rows['id']);
			$date_of_booking		=			 clean_output($query_bookings_rows['date_of_booking']);
			$checking_in_date		=			 clean_output($query_bookings_rows['checking_in_date']);
			$checking_out_date		=			 clean_output($query_bookings_rows['checking_out_date']);
			$reference_no			=			 clean_output($query_bookings_rows['reference_no']);
			$guest_full_name		=			 clean_output($query_bookings_rows['guest_full_name']);
			$guest_phone_number		=			 clean_output($query_bookings_rows['guest_phone_number']);
			$room_number			=			 clean_output($query_bookings_rows['room_number']);
			$grand_total_amount			=			 clean_output($query_bookings_rows['grand_total_amount']);
			
 
			$checkin_staff			=			 clean_output($query_bookings_rows['checkin_staff']);
 
	 
		?>
		<tr> 
		<td><?php echo $guest_full_name; ?></td>  
		<td><?php echo $guest_phone_number; ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_in_date); ?></td> 
		<td><?php echo date(' jS M Y',(int)$checking_out_date); ?></td> 
		<td><?php echo $reference_no; ?></td> 
		<td><?php echo $room_number; ?></td> 
		<td>&#163;<?php echo number_format($grand_total_amount,2); ?></td> 
		<td>
		<button  onclick="window.location='show_booking.php?booking_id=<?php echo $id; ?>';" type="button"  class="open-EditDialog btn btn-success  btn-sm"><i class="fas fa-eye"></i></button>

		<button  
		data-id='<?php echo $id; ?>' 
		data-toggle='modal' 
		data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>            
		</td>
		
		</tr>
			<?php  }  ?>
 


<?php if($no_current_logged ==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>
             
			 
                  </tbody>		
                <tfoot>
                <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                </tr>
                </tfoot>				  
                 </table>
				 
  
  

              </div>
                  <!-- /.card-body -->
 				<div class="card-footer" id="functional_buttons_div">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-info float-right">BACK</button>
                 </div>
                 <!-- /.card-footer --> 
            </div>
            <!-- /.card -->

 


	<?php } else { ?>
	
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All Booking Records</h3>

 
				 
              </div>
              <!-- /.card-header -->


            <div class="card-body table-responsive">
 
				
              <table id="example1" class="table table-bordered table-striped" style="height: 265px;">
                  <thead>
                    <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                    </tr>
                  </thead>
                  <tbody>
				  
				  
		<?php
		$query_bookings=mysqli_query($con,"SELECT * FROM bookings ORDER BY id DESC");
		while($query_bookings_rows=mysqli_fetch_array($query_bookings))
			{
			$id						=			 clean_output($query_bookings_rows['id']);
			$date_of_booking		=			 clean_output($query_bookings_rows['date_of_booking']);
			$checking_in_date		=			 clean_output($query_bookings_rows['checking_in_date']);
			$checking_out_date		=			 clean_output($query_bookings_rows['checking_out_date']);
			$reference_no			=			 clean_output($query_bookings_rows['reference_no']);
			$guest_full_name		=			 clean_output($query_bookings_rows['guest_full_name']);
			$guest_phone_number		=			 clean_output($query_bookings_rows['guest_phone_number']);
			$room_number			=			 clean_output($query_bookings_rows['room_number']);
			$grand_total_amount			=			 clean_output($query_bookings_rows['grand_total_amount']);
  

?>
		<tr> 
		<td><?php echo	$guest_full_name; ?></td> 
		<td><?php echo	$guest_phone_number; ?></td> 
		<td><?php echo	date('jS M Y',(int)$checking_in_date); ?></td> 
		<td><?php echo	date('jS M Y',(int)$checking_out_date); ?></td> 
		<td>#<?php echo $reference_no; ?></td> 
		<td><?php echo $room_number; ?></td> 
		<td>&#163;<?php echo number_format($grand_total_amount,2); ?></td> 
 
		<td>
		<button  onclick="window.location='show_booking.php?booking_id=<?php echo $id; ?>';" type="button"  class="open-EditDialog btn btn-success  btn-sm"><i class="fas fa-eye"></i></button>

		<button  
		data-id='<?php echo $id; ?>' 
		data-toggle='modal' 
		data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>            
		</td>
	
</tr>

<?php } ?>
 


<?php if((mysqli_num_rows($query_bookings))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>
             
			 
                  </tbody>	
                <tfoot>
                <tr>
                      <th>GUEST NAME</th>
                      <th>PHONE NUMBER</th>
                      <th>CHECK-IN </th>
                      <th>CHECK-OUT </th>
                      <th>REFERENCE NO.</th>
                      <th>ROOM</th>
                      <th>AMOUNT</th>
                      <th style="width:11%;">#</th>
                </tr>
                </tfoot>				  
                 </table>
				 
  
  

              </div>
              <!-- /.card-body -->
 				<div class="card-footer" id="functional_buttons_div">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-primary float-right">BACK</button>
                 </div>
                 <!-- /.card-footer --> 
            </div>
            <!-- /.card -->
	 
	<?php } ?>



	</div>
	</div>
 




<br/>



      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Delete Booking Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form action="" method="POST">
            <div class="modal-body">


			<input type="hidden" name="id" id="id"/>



				<b>ENTER ADMINISTRATIVE 4 DIGIT PIN TO DELETE THIS RECORD</b>
				<hr/>


                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><b>PIN</b></td>
                      <td><input required  type="password" name="pin"  autocomplete="new-password" class="form-control"> </td>
                    </tr>
 					
					</tbody>
					</table>
					
			       </div>

            <div class="modal-footer justify-content-between">
                    <button type="submit" name="delete"  class="btn btn-primary">SUBMIT</button>
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
<!-- Bootstrap 4 -->
<script src="../_source/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../_source/plugins/datatables/jquery.dataTables.js"></script>
<script src="../_source/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../_source/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_source/dist/js/demo.js"></script>
<!-- page script -->

<script>
  $(function () {
 	
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
    });
  });
</script>


<script>
  $(function () {
 	
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
    });
  });
</script>



	<script type="text/javascript">
	$(function(){
		$(".open-DeleteDialog").click(function(){
		$('#id').val($(this).data('id'));
 
		});
	});

</script>



  <script>
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>




<?php
if(isset($_POST["delete"]))
{

  $id										=			clean_input($_POST["id"]);
  $pin										=			clean_input($_POST["pin"]);
  
  
  if($pin == $administrative_pin)
  {
	mysqli_query($con,"DELETE FROM bookings WHERE id='$id'") or die(mysqli_error($con));
	header("location: ?notif=Booking+Record+has+been+Deleted");
  }
  else
  {
   header("location: ?notif_err=Incorrect+Administrative+Pin");

  }


 

}

?>

