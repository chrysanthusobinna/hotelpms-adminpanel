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
		if((($main_role_x == 'front_desk_staff') && ($access_booking_record_statistics_x =='1')) || ($main_role_x == 'general_admin'))
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
  <title><?php echo $site_title; ?> | ADMIN CPANEL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../_source/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../_source/dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../_source/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


 <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">



     	<script language="javascript">

    function printpage() {
		
		$('#modal_export_data').modal('hide');
		
		
		//hide other elements now
        document.getElementById("functional_buttons_div").style.display = 'none';
        document.getElementById("included_divs").style.display = 'none';
        document.getElementById("santhus_card").style.display = 'none';
		document.getElementById("html_body").classList.add("sidebar-collapse");
		document.getElementById("example1").classList.add("hide_now");
		
		
		//print now
		window.print()

		
        //show other elements now
        document.getElementById("functional_buttons_div").style.display = 'block';
        document.getElementById("included_divs").style.display = 'block';
        document.getElementById("santhus_card").style.display = 'block';
		document.getElementById("html_body").classList.remove("sidebar-collapse");
		document.getElementById("example1").classList.remove("hide_now");

    }
	
	




    function printpage_2() {
		
		$('#modal_export_data').modal('hide');
		
		
		//hide other elements now
        document.getElementById("functional_buttons_div").style.display = 'none';
        document.getElementById("included_divs").style.display = 'none';
        document.getElementById("santhus_card").style.display = 'none';
		document.getElementById("html_body").classList.add("sidebar-collapse");
		document.getElementById("example2").classList.add("hide_now");
		
		
		//print now
		window.print()

		
        //show other elements now
        document.getElementById("functional_buttons_div").style.display = 'block';
        document.getElementById("included_divs").style.display = 'block';
        document.getElementById("santhus_card").style.display = 'block';
		document.getElementById("html_body").classList.remove("sidebar-collapse");
		document.getElementById("example2").classList.remove("hide_now");

    }
		
	</script>	


	<style>
	
	#example1 td { 
	}

	#example1.hide_now tr > *:nth-child(8) {
    display: none;
	}


	#example2 td { 
	}

	#example2.hide_now tr > *:nth-child(6) {
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


</head>
<body onload="update_online_presence();  update_active_link();" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" id="html_body">
<div id="notif_info"></div>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">DASHBOARD</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">Logout</a>
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Front Desk Record & Statistics</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Front Desk Record & Statistics</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		
		<?php include('notification.php'); ?>

		<div id="included_divs">
		<?php include("manage_bookings_small_boxes.php"); ?>



		<?php include('manage_bookings_top_buttons.php'); ?>
		</div>

 

	<!-- Loader -->
  <div class="loader loader-default is-active" id="loader_santhus" style=""></div>



		      <!-- Default box -->
      <div class="card collapsed-card card-primary" id="santhus_card">
         <div class="card-header" data-card-widget="collapse" data-toggle="tooltip" >
          <i class="fas fa-copy"></i> SORT BOOKING RECORDS

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-plus"></i></button>
          </div>
        </div>
        <div class="card-body table-responsive" >
 		  		<form action="#result" method="GET">


	                 <table class="table table-bordered table-striped">
					<thead>
                    <tr>
                      <th>BOOKING METHOD </th>
                      <th>ACTIVITY </th>
                      <th>STAFF</th>
                      <th>LIST INFORMATION</th>
                      <th>START DATE</th>
                      <th>END DATE </th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr>

                     <td>

					  <select required name="booking_method" id="booking_method" >
					  <option value='ONLINE_AND_LOCAL'>ALL METHODS </option>
					  <option value='LOCAL'>LOCAL BOOKING </option>
					  <option value='ONLINE'>ONLINE BOOKING </option>
					  </select>

					  </td>
					  
                     <td>

					  <select required name="activity" id="activity" >
					  <option value=''>SELECT ACTIVITY </option>
					  <option value='booking'>BOOKING </option>
					  <option value='check_in'>CHECK-IN </option>
					  <option value='check_out'>CHECK-OUT </option>
					  <option value='cancel'>CANCEL</option>
					  </select>

					  </td>

                      <td>
					  <select required id="staff_var"  name="staff_var"  >
					  <option value=''>SELECT STAFF </option>
					  <option value='all_staff'>ALL STAFF </option>
						<?php
						$query_staff_xxx=mysqli_query($con,"SELECT * FROM staff");
						while($row_query_staff_xxx=mysqli_fetch_array($query_staff_xxx))
						{
						$email_address_xxx			=		clean_output($row_query_staff_xxx["email_address"]);
						$full_name_xxx				=	    clean_output($row_query_staff_xxx['full_name']);
						echo "<option value='$email_address_xxx'>$full_name_xxx </option>";
						}
						?>

					  </select>
					  </td>

                       <td>

					  <select required name="list_information" id="list_information" >

					  <option value='default_list'>DEFAULT LIST </option>
					  <option value='guest_info_list'>GUEST INFORMATION </option>

					  </select>

					  </td>

					  <td>

						<div class="form-group">
						<input required  id="start_date" name="start_date" type="date"    >
						</div>

					  </td>

					  <td>

						<div class="input-group">
						<input  required  id="end_date" name="end_date" type="date"  >
						</div>


					  </td>



                    </tr>


					</table>






        </div>

        <!-- /.card-body -->
				<div class="card-footer ">
                   <button type="submit" name="sort" value="general_sort" class="btn btn-primary">Submit</button>
                   <button type="button" data-card-widget="collapse" data-toggle="tooltip" class="btn btn-primary float-right">Close</button>
                 </div>

				 </form>
       </div>
      <!-- /.card -->



	<?php
	if(isset($_GET['sort']) && $_GET['sort']=='general_sort') {

	 if($_GET["start_date"] > $_GET["end_date"])
	{
		header("location: ?notif_err=START Date Can NOT be greater than END Date");
	}
	else
	{

	 echo"
	 <script>
	 document.getElementById('booking_method').value='$_GET[booking_method]';
	 document.getElementById('activity').value='$_GET[activity]';
	 document.getElementById('staff_var').value='$_GET[staff_var]';
	 document.getElementById('list_information').value='$_GET[list_information]';
	 document.getElementById('start_date').value='$_GET[start_date]';
	 document.getElementById('end_date').value='$_GET[end_date]';

	    var element = document.getElementById('santhus_card');
		element.classList.remove('collapsed-card');

	 </script>
	 ";


	//GET OTHER GET VARS
	
	$booking_method			=			$_GET["booking_method"];
	$activity_var			=			$_GET["activity"];
	$staff_var				=			$_GET["staff_var"];
	$list_information		=			$_GET["list_information"];

	$start_date_var			=			$_GET["start_date"];
	$end_date_var			=			$_GET["end_date"];

	$start_date_var			=			strtotime("12:00am $start_date_var");
	$end_date_var			=			strtotime("11:59pm $end_date_var");


	$start_date_txt			=			date('jS M Y',(int)$start_date_var);
	$end_date_txt			=			date('jS M Y',(int)$end_date_var);

	if($booking_method		==	"ONLINE_AND_LOCAL")
	{
	$booking_method_sql		=	"";
	}
	elseif($booking_method	==	"ONLINE")
	{
	$booking_method_sql		=	"AND booking_method = 'ONLINE'";		
	}
	elseif($booking_method	==	"LOCAL")
	{
	$booking_method_sql		=	"AND booking_method = 'LOCAL'";				
	}
	
	
	

	if($staff_var			==	"all_staff")
	{
			$staff_name_txt			=	"All Staffs";

			if($activity_var		==	"booking")
			{
			$sql_line_				=	"date_of_booking >= '$start_date_var' AND  date_of_booking <= '$end_date_var'";
			$activity_txt			=	"Registered";
			}
			elseif($activity_var	==	"check_in")
			{
			$sql_line_				=	"checking_in_date >= '$start_date_var' AND  checking_in_date <= '$end_date_var'";
			$activity_txt			=	"CHECKED-IN";
			}
			elseif($activity_var	==	"check_out")
			{
			$sql_line_				=	"checking_out_date >= '$start_date_var' AND  checking_out_date <= '$end_date_var'";
			$activity_txt			=	"CHECKED-OUT";
			}
			elseif($activity_var	==	"cancel")
			{
			$sql_line_				=	"cancel_date >= '$start_date_var' AND  cancel_date <= '$end_date_var'";
			$activity_txt			=	"CANCELLED";

			}
	}
	else
	{

			$query_row_booking_staff	=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$staff_var'")) or die(mysqli_error($con));
			$staff_name_txt		=			 clean_output($query_row_booking_staff['full_name']);


			if($activity_var	==	"booking")
			{
			$sql_line_			=	"date_of_booking >= '$start_date_var' AND  date_of_booking <= '$end_date_var' AND booking_staff = '$staff_var'";
			$activity_txt			=	"Registered";
			}
			elseif($activity_var==	"check_in")
			{
			$sql_line_			=	"checking_in_date >= '$start_date_var' AND  checking_in_date <= '$end_date_var' AND checkin_staff = '$staff_var'";
			$activity_txt			=	"CHECKED-IN";
			}
			elseif($activity_var==	"check_out")
			{
			$sql_line_			=	"checking_out_date >= '$start_date_var' AND  checking_out_date <= '$end_date_var' AND checkout_staff = '$staff_var'";
			$activity_txt		=	"CHECKED-OUT";

			}
			elseif($activity_var==	"cancel")
			{
			$sql_line_			=	"cancel_date >= '$start_date_var' AND cancel_date <= '$end_date_var' AND cancel_staff = '$staff_var'";
			$activity_txt		=	"CANCELLED";

			}

	}


			$sql_line_		=		$sql_line_.$booking_method_sql;


	$query_bookingx=mysqli_query($con,"SELECT * FROM bookings WHERE  $sql_line_   ORDER BY id DESC");

	if($list_information			==		"default_list")
	{
		$table_th					=			"<th>GUEST NAME</th>
												<th>PHONE NUMBER</th>
												<th>CHECK-IN </th>
												<th>CHECK-OUT </th>
												<th>REFERENCE NO.</th>
												<th>ROOM</th>
												<th>AMOUNT</th>
												<th style='width:9%;'>#</th>";
												
	$table_style_id					=	"example1";	

 
	}
	elseif($list_information		==		"guest_info_list")
	{

		$table_th					=			"<th>GUEST NAME</th>
												<th>PHONE NUMBER</th>
												<th>EMAIL ADDRESS</th>
												<th>RESIDENTIAL ADDRESS</th>
												<th>REFERENCE NO.</th>
												<th style='width:9%;'>#</th>";

		$table_style_id					=	"example2";											
 
	}



	?>

				<div id="target_html" >
              <div class="card card-info" id="result" >
              <div class="card-header">
                <h3 class="card-title">( <?php echo mysqli_num_rows($query_bookingx); ?> ) Booking Records <?php echo $activity_txt; ?> by <?php echo $staff_name_txt; ?> From <?php echo $start_date_txt; ?> To <?php echo $end_date_txt; ?></h3>

              </div>
              <!-- /.card-header -->


            <div class="card-body table-responsive">



               <table id="<?php echo $table_style_id; ?>" class="table table-bordered table-striped" style="height: 265px;">
                  <thead>
                    <tr>
					<?php echo $table_th; ?>
                    </tr>
                  </thead>
                  <tbody>


		<?php

		$grand_total_amount_from_list=0;

		while($query_bookings_rows=mysqli_fetch_array($query_bookingx))
			{
			$id						=			 clean_output($query_bookings_rows['id']);
			$date_of_booking		=			 clean_output($query_bookings_rows['date_of_booking']);
			$checking_in_date		=			 clean_output(date('jS M Y',(int)$query_bookings_rows['checking_in_date']));
			$checking_out_date		=			 clean_output(date('jS M Y',(int)$query_bookings_rows['checking_out_date']));
			$reference_no			=			 clean_output($query_bookings_rows['reference_no']);
			$guest_full_name		=			 clean_output($query_bookings_rows['guest_full_name']);
			$guest_email_address	=			 clean_output($query_bookings_rows['guest_email_address']);
			$guest_phone_number		=			 clean_output($query_bookings_rows['guest_phone_number']);
			$residential_address	=			 clean_output($query_bookings_rows['residential_address']);
			$room_number			=			 clean_output($query_bookings_rows['room_number']);
			$grand_total_amount		=			 "&#163;".clean_output(number_format($query_bookings_rows['grand_total_amount'],2));


  			$grand_total_amount_from_list			+=			$query_bookings_rows['grand_total_amount'];


	if($list_information			==		"default_list")
	{
		$table_td = "
		<tr>
		<td>$guest_full_name</td>  
		<td>$guest_phone_number</td>
		<td>$checking_in_date</td>
		<td>$checking_out_date</td>
		<td>#$reference_no</td>
		<td>$room_number</td>
		<td>$grand_total_amount</td>

		<td>
		<a href='show_booking.php?reference_no=$reference_no' class='open-EditDialog btn btn-success  btn-sm'><i class='fas fa-eye'></i></a>

		<button  
		data-id='<?php echo $id; ?>' 
		data-toggle='modal' 
		data-target='#modal-delete'  type='button'  class='open-DeleteDialog btn btn-danger btn-sm'><i class='fas fa-trash'></i></button>            
		</td>		
		</tr>
		";

	}
	elseif($list_information		==		"guest_info_list")
	{

		$table_td = "
		<tr>
		<td>$guest_full_name</td>  
		<td>$guest_phone_number</td>
		<td>$residential_address</td>
		<td>$guest_email_address</td>
 		<td>#$reference_no</td>

		<td>
		<a href='show_booking.php?booking_id=$id' class='open-EditDialog btn btn-success  btn-sm'><i class='fas fa-eye'></i></a>

		<button  
		data-id='<?php echo $id; ?>' 
		data-toggle='modal' 
		data-target='#modal-delete'  type='button'  class='open-DeleteDialog btn btn-danger btn-sm'><i class='fas fa-trash'></i></button>            
		</td>
		
 		</tr>
		";
	}

		echo $table_td; //<td> table_list</td>

    }

 		$grand_total_amount_from_list		=		"&#163;".number_format($grand_total_amount_from_list,2);





	?>





<?php if((mysqli_num_rows($query_bookingx))==0){ ?>

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
                   <?php echo $table_th; ?>
                </tr>
                </tfoot>
				
                 </table>

 <?php
			if($list_information			==		"default_list"){
			echo"<br/>
			<div class='callout callout-info'>
			<h4> Total: <span style='width:150px; text-align:left' class='badge bg-info float-right'>
			<b>$grand_total_amount_from_list</b></span>
			</h4>
			</div>";
		  }
?>


              </div>
              <!-- /.card-body -->



				<div class="card-footer" id="functional_buttons_div">
                   <button type="button"  id="export_data_btn" class="btn btn-info">EXPORT DATA</button>
                   <button type="button" onclick="window.location='manage_bookings_record_statistics.php';"  class="btn btn-info float-right">BACK</button>
                 </div>
                 <!-- /.card-footer -->
            </div>

			</div>


	<?php } }  else { ?>


    <div class="row">
	<div class="col-12">
             <!-- Bar chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Bar Chart For Bookings Records Per Month [ <script>document.write(new Date().getFullYear());</script> ]
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

    </div>


          <div class="col-md-6">

            <!-- Donut chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Donut Chart For Bookings Records Per Month [ <script>document.write(new Date().getFullYear());</script> ]
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <div class="card-body">
                <div id="donut-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->

          <div class="col-md-6">

		  <div class="callout callout-info">


     <h3 class="card-title"> <i class="far fa-chart-bar"></i>&nbsp; CURRENT BOOKINGS REPORT</h3><br/>
		  				<hr>

     <h4> Today	<span style="width:150px; text-align:left" class="badge bg-info float-right">
	 <?php echo $amount_of_bookings_sold_today; ?> </span>
	 </h4>
	 <hr>

     <h4> Yesterday	<span  style="width:150px; text-align:left" class="badge bg-info float-right">
	 <?php echo $amount_of_bookings_sold_yesterday; ?></span>
	 </h4>
	 <hr>

     <h4>Current Week <span  style="width:150px; text-align:left" class="badge bg-info float-right">
	 <?php echo $amount_of_bookings_sold_current_week; ?> </span>
	 </h4>
	 <hr>

     <h4> Current Month <span  style="width:150px; text-align:left"  class="badge bg-info float-right">
	 <?php echo $amount_of_bookings_sold_current_month; ?> </span>
	 </h4>
	 <hr>

      <h4>Current Year <span  style="width:150px; text-align:left"  class="badge bg-info float-right">
	  <?php echo $amount_of_bookings_sold_current_year; ?></span>
	  </h4>
				<hr>

              </div>







	          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->
	<?php } ?>

















      <div class="modal fade" id="modal_export_data">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >EXPORT DATA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


 	      <div class="row">

          <div class="col-md-6 col-sm-6 col-12">
		   <a   id="btn_print_data"  href="javascript: " >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-print"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number">PRINT</span>
                 <span class="info-box-number">NOW</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <div class="col-md-6 col-sm-6 col-12">
		   <a  target="_blank" id="btn_download_pdf"   href="export.php?action=download_pdf" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-file-pdf"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number">DOWNLOAD</span>
                 <span class="info-box-number">AS PDF</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->





        </div>
        <!-- /.row -->


            </div>
            <div class="modal-footer justify-content-between">

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->














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
		   <form>
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
<!-- jQuery UI -->
<script src="../_source/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../_source/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../_source/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_source/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="../_source/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../_source/plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../_source/plugins/flot-old/jquery.flot.pie.min.js"></script>
<!-- Page script -->
<script>
  $(function () {



    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,<?php echo $stat_jan; ?>], [2,<?php echo $stat_feb; ?>], [3,<?php echo $stat_mar; ?>], [4,<?php echo $stat_apr; ?>], [5,<?php echo $stat_may; ?>], [6,<?php echo $stat_jun; ?>], [7,<?php echo $stat_jul; ?>], [8,<?php echo $stat_aug; ?>], [9,<?php echo $stat_sep; ?>], [10,<?php echo $stat_oct; ?>], [11,<?php echo $stat_nov; ?>], [12,<?php echo $stat_dec; ?>]],
      bars: { show: true }
    }

    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],


      xaxis : {
        ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June'] , [7,'July'] , [8,'August'] , [9,'September'] , [10,'October'] , [11,'November'] , [12,'December']]
      },

 /*
       yaxis : {
        ticks: [[10], [20], [30], [40], [50], [60], [70], [70] , [80], [90], [100]]
      }
 */

    })
    /* END BAR CHART */


    /*
     * DONUT CHART
     * -----------
     */


    var donutData = [
      {
        label: 'January',
        data : <?php echo $donot_jan; ?>,
        color: '#3c8dbc'
      },
      {
        label: 'February',
        data : <?php echo $donot_feb; ?>,
        color: '#0073b7'
      },
      {
        label: 'March',
        data :  <?php echo $donot_mar; ?>,
        color: '#00c0ef'
      },
      {
        label: 'April',
        data :  <?php echo $donot_apr; ?>,
        color: '#FF00FF'
      },
      {
        label: 'May',
        data : <?php echo $donot_may; ?>,
        color: '#800080'
      },
      {
        label: 'June',
        data : <?php echo $donot_jun; ?>,
        color: '#FFA07A'
      },
      {
        label: 'July',
        data : <?php echo $donot_jul; ?>,
        color: '#800000'
      },
      {
        label: 'August',
        data : <?php echo $donot_aug; ?>,
        color: '#808080'
      },
      {
        label: 'September',
        data : <?php echo $donot_sep; ?>,
        color: '#FFA07A'
      },
      {
        label: 'October',
        data : <?php echo $donot_oct; ?>,
        color: '#F08080'
      },
      {
        label: 'November',
        data : <?php echo $donot_nov; ?>,
        color: '#CD5C5C'
      },
      {
        label: 'December',
        data : <?php echo $donot_dec; ?>,
        color: '#C0C0C0'
      }

    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>















<script type="text/javascript">
$(document).ready(function()
{
	 $("#export_data_btn").click(function()
	{

		var target_html = $('#target_html').html();


		var data = 'target_html='+target_html;

		$.ajax({

		type : 'POST',
		url  : 'ajax_export_data.php',
		data : data,

   beforeSend: function(data)
			  		{
					$("#loader_santhus").show();
		           	},

		success :  function(data)
				   {
					$("#loader_santhus").hide();
				   //$('#set_customer_info_ajax_result').append(data);

					$('#modal_export_data').modal('show');
				   }
		});
		return false;



	});
});
</script>




<script type="text/javascript">
$(document).ready(function()
{

	 $("#btn_download_pdf").click(function()
	{

		$('#modal_export_data').modal('hide');

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

<!-- DataTables -->
<script src="../_source/plugins/datatables/jquery.dataTables.js"></script>
<script src="../_source/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

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
  
  $_current_page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   
  if($pin == $administrative_pin)
  {
	mysqli_query($con,"DELETE FROM bookings WHERE id='$id'") or die(mysqli_error($con));
	header("location: $_current_page&notif=Booking+Record+has+been+Deleted#notif_info");
  }
  else
  {
   header("location: $_current_page&notif_err=Incorrect+Administrative+Pin#notif_info");

  }


 

}

?>

