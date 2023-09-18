<?php
include("../set.php");
include("../functions.php");
include("user_inc.php");
include("device.php");

/*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/

	if($browser=='mobile')
	{
	 header("location: manage_bookings.php?notif_err=New+Booking+Record+is+Restricted+on+mobile+device"); 
	}

//FUNCTION THAT CHECKS booking_cart LIST AND DELETE TO SAVE DISC SPACE


	$number_of_data_limit		=	200;  //must be a number divisible by 2
	$number_of_data_to_delete	=	($number_of_data_limit/2);
	$no_laundry_cart			=	mysqli_num_rows(mysqli_query($con,"SELECT * FROM booking_cart"));
	if($no_laundry_cart > $number_of_data_limit)
	{
		mysqli_query($con,"DELETE FROM booking_cart ORDER BY id ASC LIMIT $number_of_data_to_delete");
		
		
	}

	
	
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
  
  <style>
  
      .ui-widget-content .ui-icon {
    background-image: url("../_source/plugins/jquery-datepicker/images/ui-icons_444444_256x240.png")      
    !important;}
    .ui-widget-header .ui-icon {
    background-image: url("../_source/plugins/jquery-datepicker/images/ui-icons_444444_256x240.png")   
    !important;}
	
	</style>
  
  

<link href="../_source/plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">

<script src="js/jquery.min.js"></script>



<script>
$( document ).ready(function() {
$( function() {
  var dateToday = new Date();
  var dates = $("#start-date, #end-date").datepicker({
    defaultDate: "+2d",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "start-date" ? "minDate" : "maxDate",
        instance = $(this).data("datepicker"),
        date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
  });
});


});


</script>



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





<br/>
<form action="" method='POST'>
 
 
 
<div class="row">
          <div class="col-md-6">
     
          
 
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Search For Available Rooms</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  

				<table class="table table-bordered">
		          <tbody>
		  
		          <tr>
		          <td><b> CHECK-IN DATE </b></td>
		          <td>
				   <div class="input-group"> 
		  		<input autocomplete="off"  id="start-date" placeholder="CHECK-IN DATE"  required  name="checking_in_date" type="text" class="form-control" value="<?php if(isset($_GET['checking_in_date'])){echo $_GET['checking_in_date']; } ?>">
				<div class="input-group-append"> <span class="input-group-text"><i class="fas fa-angle-double-down"></i></span> </div>

				</div>
		  		</td>
		   
		          </tr>
		  
		          <tr>
		          <td><b>CHECK-OUT DATE  </b></td>
		          <td>
				  <div class="input-group"> 
				  <input  autocomplete="off"  id="end-date" placeholder="CHECK-OUT DATE"  required  name="checking_out_date" type="text" class="form-control" value="<?php if(isset($_GET['checking_out_date'])){echo $_GET['checking_out_date']; } ?>" >
				  <div class="input-group-append"> <span class="input-group-text"><i class="fas fa-angle-double-up"></i></span> </div>

				  </div>
		  		</td>
		          
		          </tr>
		  
		          <tr>
		          <td><b>SELECT ROOM </b></td>
		          <td>
		  <select   style="width:60;" name="class_id" id="room_class_id" required class="form-control" >
		  
		  <?php
		  
		  $query=mysqli_query($con,"SELECT * FROM room_class ORDER BY weekday_price ASC");
		  
		  while($row=mysqli_fetch_array($query))
		  {
			  
		  $class_id		  			 =			 clean_output($row["id"]);
		  $class_name				 =			 clean_output($row['class_name']);
		  $class_description		 =			 clean_output($row['class_description']);
		  $weekday_price			 =			 clean_output($row['weekday_price']);
		  $weekend_price			 =			 clean_output($row['weekend_price']);
		  
		  ?>
		  
		      	<option value="<?php echo $class_id; ?>">
		      	<?php echo $class_name; ?> -
		      	&#163;<?php echo  number_format($weekday_price,2) ; ?> / &#163;<?php echo  number_format($weekend_price,2) ; ?>
		      	</option>
		      	<?php } ?>
		      	</select>
		  		</td>
				
				</tr>


		          <tr>
		          <td><b>NO. OF ROOMS</b></td>
		          <td>
 				  <input  autocomplete="off" placeholder="NO. OF ROOMS"  required  name="number_of_rooms" min="1" type="number" class="form-control" value="<?php if(isset($_GET['number_of_rooms'])){echo $_GET['number_of_rooms']; }else{ echo "1";} ?>" />
 
 		  		</td>
		          
		          </tr>
		          
		  
		          </tbody>
		  
		      </table>
	 
			 </div>
              <!-- /.card-body -->
                 <div class="card-footer ">
                   <button type="submit" name="submit"  class="btn btn-primary">Continue</button>
                   <button type="button"  onclick="history.go(-1);" class="btn btn-danger float-right">Back</button>
                 </div>
                 <!-- /.card-footer -->  
            </div>
            <!-- /.card -->

             </div>
  
          
           <div class="col-md-6">
 


 
 
            <!-- Map card -->
            <div class="card bg-gradient-primary" style="display:none;">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info" style="display:none;">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-primary" style="height:400px;">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
 
                  <button type="button" class="btn btn-success btn-sm"  >
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
			
			
			
			
          </div>
          
          </div>


	</form>
  
<br/>










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



 <script src="js/jquery-ui.js"></script>



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

$number_of_rooms			=		clean_input($_POST["number_of_rooms"]);
	
	

$checking_in_date			=		clean_input($_POST["checking_in_date"]);
$checking_out_date			=		clean_input($_POST["checking_out_date"]);
$class_id					=		clean_input($_POST["class_id"]);

$checking_in_date			=			strtotime("12:01pm $checking_in_date");
$checking_out_date			=			strtotime("12:00pm $checking_out_date");


$checking_in_date_text		=		  	date('jS M Y - h:iA',(int)$checking_in_date);
$checking_out_date_text		=		  	date('jS M Y - h:iA',(int)$checking_out_date);

 
 $query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$class_id'")) or die(mysqli_error($con));
  $class_name				=			 clean_output($query_row_room_class['class_name']);
  
  
$total_rooms = mysqli_num_rows(mysqli_query($con,"SELECT * FROM hotel_rooms WHERE room_class_id='$class_id' AND current_state='in_service'"));

	
	
$checking1=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE 		checking_in_date	< '$checking_in_date'	AND
																				checking_in_date	< '$checking_out_date'	AND
																				checking_out_date	> '$checking_in_date'	AND
																				checking_out_date	> '$checking_out_date'	AND
																				class_id			= '$class_id'			AND
																				cancel_staff		= 'NULL'				AND
																				checkout_staff		= 'NULL'"));



$checking2=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE		checking_in_date	> '$checking_in_date'	AND
																				checking_in_date	< '$checking_out_date'	AND
																				checking_out_date	> '$checking_in_date'	AND
																				checking_out_date	> '$checking_out_date'	AND
																				class_id			= '$class_id'			AND
																				cancel_staff		= 'NULL'				AND
																				checkout_staff		= 'NULL'"));



$checking3=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE 		checking_in_date	< '$checking_in_date'	 AND
																				checking_in_date	< '$checking_out_date'	 AND
																				checking_out_date	> '$checking_in_date'	 AND
																				checking_out_date	< '$checking_out_date'	 AND
																				class_id			= '$class_id'			 AND
																				cancel_staff		= 'NULL'				 AND
																				checkout_staff		= 'NULL'"));


$checking4=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE 		checking_in_date	> '$checking_in_date'	 AND
																				checking_in_date	< '$checking_out_date'	 AND
																				checking_out_date	> '$checking_in_date'	 AND
																				checking_out_date	< '$checking_out_date'	 AND
																				class_id			= '$class_id' 			 AND
																				cancel_staff		= 'NULL'				 AND
																				checkout_staff		= 'NULL'"));

$checking5=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings

 WHERE (checking_in_date =	'$checking_in_date' AND class_id =	'$class_id'  AND cancel_staff = 'NULL' AND checkout_staff = 'NULL')
																 OR
		(checking_out_date	= '$checking_out_date' AND class_id = '$class_id'  AND cancel_staff = 'NULL' AND checkout_staff = 'NULL')"));





$checking = $checking1 + $checking2  + $checking3 + $checking4 + $checking5; //result should give 0 if all conditions are false


//header("location: ?notif=$checking/$total_rooms"); //debuger lol


		$today_date_12_00am =  date('jS M Y',time());
		$today_date_12_00am =  strtotime("12:00am $today_date_12_00am");

		if($checking_in_date>$checking_out_date)
			{
			header("location: ?notif_err=Wrong Date, Please Select CHECK-IN and CHECK-OUT Date Properly");
			}
	elseif($checking_in_date < $today_date_12_00am)
			{
			header("location: ?notif_err=Wrong+Date,+Please+Select+CHECK-IN+andCHECK-OUT+Date+Properly");
			}
	elseif(($total_rooms > $checking))
			{
			//WHEN THERE ARE SOME AVAILABLE ROOMS
			$no_available = ($total_rooms - $checking);
			
			//NOW CHECK AVAILABLE NUMBER OF ROOM VS  REQUESTED NUMBER OF ROOM
			
				if($no_available >= $number_of_rooms)
				{
				$msg		  ="&notif=$no_available+$class_name+Available!";
				$pass_data_url="?checking_in_date=$checking_in_date&checking_out_date=$checking_out_date&class_id=$class_id&number_of_rooms=$number_of_rooms";
				$cart_ref	  =	"&cart_ref=".time()."&";
				
				header("location: new_booking_record_page_2.php$pass_data_url$cart_ref$msg");					
				}
				else
				{
				$msg			=	"&notif_err=Unfortunately,+there+are+only+$no_available+$class_name+Rooms+Available!";
				$pass_data_url	=	"?checking_in_date=$_POST[checking_in_date]&checking_out_date=$_POST[checking_out_date]";
				header("location: $pass_data_url$msg");						
				}
		
			} 
	elseif(($total_rooms == $checking))
			{ 
			//WHEN ALL ROOMS ARE OCCUPIED			
			header("location: ?checking_in_date=$_POST[checking_in_date]&checking_out_date=$_POST[checking_out_date]&notif_err=Unfortunately+all+$class_name+Rooms+are+NOT+Available!+Please!+Kindly+Check+other+Rooms+Class");  

 			
			
			}




  
  
	}



?>