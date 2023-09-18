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
	
		
			
		<?php 
		$query_hotel_rooms=mysqli_query($con,"SELECT * FROM hotel_rooms ORDER BY room_number ASC") or die(mysqli_error($con));
		?>
	

	<div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">( <?php echo $no_occupied_rooms; ?>/<?php echo $no_total_room; ?> ) Current Rooms Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  
			 
			 
		<div class="row">
		
						


<?php


while($query_hotel_rooms_x=mysqli_fetch_array($query_hotel_rooms))
{
  $hotel_room_id			=			 clean_output($query_hotel_rooms_x['id']);
  $room_number				=			 clean_output($query_hotel_rooms_x['room_number']);
  $current_state			=			 clean_output($query_hotel_rooms_x['current_state']);
  $room_class_id			=			 clean_output($query_hotel_rooms_x['room_class_id']);


 $query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$room_class_id'")) or die(mysqli_error($con));
  $class_name				=			 clean_output($query_row_room_class['class_name']);


	$current_time_xxx = time();


		$d_query	=	mysqli_query($con,"SELECT * FROM bookings WHERE checking_in_date < '$current_time_xxx' AND checking_out_date > '$current_time_xxx' AND room_number = '$room_number' AND cancel_staff = 'NULL' AND checkout_staff = 'NULL'");
		
		if(mysqli_num_rows($d_query) > 0){
 
		$query_room_book = mysqli_fetch_assoc($d_query);

		$guest_full_name					=			clean_output($query_room_book["guest_full_name"]);
 		$reference_no						=			clean_output($query_room_book['reference_no']);		
 		$checkin_staff						=			clean_output($query_room_book['checkin_staff']);
		
	

			
		 
 			$guest_full_name				=			"<i class='fas fa-user-alt'></i>  <b class='float-right'>$guest_full_name</b>";  
			$reference_no					=			"<i class='fas fa-copy'></i>  <b class='float-right'># $reference_no</b>"; 
			$booking_btn					=			"show_booking.php?booking_id=$query_room_book[id]";
	    	$button_disabled				=			"";
			$button_value					=			"OCCUPIED";
			$card_color						=			"card-danger";		
		}
		else
		{
			
			if($current_state	==	"out_of_service")
			{
 			$guest_full_name				=			"&nbsp;";
			$reference_no					=			"&nbsp;";	
			$booking_btn					=			"";

	    	$button_disabled				=			"disabled";
			$button_value					=			"OUT OF SERVICE";
			$card_color						=			"card-danger";					
			}
			else
			{
 			$guest_full_name				=			"&nbsp;";
			$reference_no					=			"&nbsp;";	
			$booking_btn					=			"";

	    	$button_disabled				=			"disabled";
			$button_value					=			"VACANT";
			$card_color						=			"card-primary";					
			}

		}
			

 
?>
						
          <div class="col-md-3">
            <div class="card <?php echo $card_color; ?>">
              <div class="card-header">
                <h3 class="card-title">Room <?php echo $room_number; ?></h3>

                <div class="card-tools">
                  <i class="fas fa-home"></i>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->

			                <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <p class="nav-link">
                       <i class="fas fa-arrow-circle-right"></i>  <b class="float-right"><?php echo $class_name; ?></b>
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                        <?php echo $guest_full_name; ?> 
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                       <?php echo $reference_no; ?> 
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                      <button type="button" <?php echo $button_disabled; ?> onclick="window.location='<?php echo $booking_btn; ?>'" class="btn btn-block btn-default"><?php echo $button_value; ?></button>
                    </p>
                  </li>
                </ul>

              </div>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


						
	<?php } 	?>


<?php if((mysqli_num_rows($query_hotel_rooms))==0){ ?>

			 
                     <center> <h1>No Record(s)</h1></center> 
 
        
<?php } ?>					
 


        </div>
        <!-- /.row -->


 

			 </div>
              <!-- /.card-body -->
				<div class="card-footer " id="functional_buttons_div">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-secondary float-right">BACK</button>
                 </div> <!-- /.card-footer --> 
            </div>
			
			
	
	
	
 	
 

	</div>
	</div>
 




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

  <script>
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>


 