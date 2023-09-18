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


		if($main_role_x 				== 			"regular_staff")
		{
			
			$dept						=			"Regular Staff";				
			$header_text_1				=			"REGULAR STAFF DASHBOARD";
			$header_text_2				=			"Regular Staff Dashboard";
			$functional_btn				=			" ";			
			
		}
		elseif($main_role_x 			== 			"front_desk_staff")
		{	
			$dept						=			"Front Desk / Booking Staff";	
			$header_text_1				=			"BOOKINGS MANAGEMENT DASHBOARD";
			$header_text_2				=			"Bookings Management Dashboard";
			$functional_btn				=			"<hr/>
													<a href='manage_bookings.php' class='text-left btn btn-default btn-block'> 
													<i class='fas fa-copy'></i> &nbsp;
													<b>Manage Booking Records</b>
													</a>
									
													<a href='manage_bookings_record_statistics.php' class='text-left btn btn-default btn-block'> 
													<i class='far fa-chart-bar'></i> &nbsp;
													<b>Booking Record & Statistics</b>
													</a>";
		

		
		}
		elseif($main_role_x				== 			"sales_staff")
		{

 			$dept						=			"Restaurant / Bar Staff";					
			$header_text_1				=			"SALES MANAGEMENT DASHBOARD";
			$header_text_2				=			"Sales Management Dashboard";
			
			$functional_btn				=			"<hr/>
													<a href='manage_sales_record.php' class='text-left btn btn-default btn-block'> 
													<i class='fas fa-shopping-cart'></i> &nbsp;
													<b>Manage Sales Records</b>
													</a>
									
													<a href='manage_sales_record_statistics.php' class='text-left btn btn-default btn-block'> 
													<i class='far fa-chart-bar'></i> &nbsp;
													<b>Sales Record & Statistics</b>
													</a>";

											
		} 
		elseif($main_role_x 			==			"general_admin")
		{	
	
			$dept						=			"General Administrator";				
			$header_text_1				=			"GENERAL ADMIN DASHBOARD";
			$header_text_2				=			"General Admin Dashboard";
			$functional_btn				=			" <a href='manage_bookings_record_statistics.php' class='text-left btn btn-default btn-block'> 
													<i class='far fa-chart-bar'></i> &nbsp;
													<b>Booking Record & Statistics</b>
													</a>
									
									
													<a href='manage_sales_record_statistics.php' class='text-left btn btn-default btn-block'> 
													<i class='far fa-chart-bar'></i> &nbsp;
													<b>Sales Record & Statistics</b>
													</a>
													";

		}	

$q_staff_last_login_date=mysqli_query($con,"SELECT * FROM staff_last_login_date WHERE email_address ='$_SESSION[user]' ");
$num_rows	=	mysqli_num_rows($q_staff_last_login_date);


	if($num_rows=='1')
	{
	$q_last_login_date=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff_last_login_date WHERE  email_address='$_SESSION[user]' ORDER BY id DESC LIMIT 1"));
	$row_id							=			clean_output($q_last_login_date['id']); 
	$time_date						=			clean_output($q_last_login_date['time_date']); 
			
	}
	else
	{
	$q_last_login_date=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff_last_login_date WHERE  email_address='$_SESSION[user]' ORDER BY id DESC LIMIT 1"));
	$row_id							=			($q_last_login_date['id']-1); 
	
		$q_last_login_date=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff_last_login_date WHERE  id='$row_id'"));
		$time_date						=			clean_output($q_last_login_date['time_date']); 
		
			
	}


//FUNCTION THAT CHECKS export_html_data LIST AND DELETE TO SAVE DISC SPACE


 	$query_no_export_html_data=mysqli_query($con,"SELECT * FROM export_html_data");
	$no_export_html_data		  =		mysqli_num_rows($query_no_export_html_data);
	if($no_export_html_data > 0)
	{
		mysqli_query($con,"delete from export_html_data");
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
  
  
  
  

<link href="../_source/plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">

<script src="js/jquery.min.js"></script>


 
  	<script language="javascript">
	function update_active_link(){
	
	var element_ul = document.getElementById("dashboard");
	element_ul.classList.add("active");


	}
	</script>	
	
	
  
  <script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  
  var ampm = h >= 12 ? 'PM' : 'AM';
  h = h % 12;
  h = h ? h : 12; // the hour '0' should be '12'
  
  
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt_time').innerHTML =
  h + ":" + m + ":" + s +  ampm; ;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
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
<body onload="update_online_presence();  update_active_link(); startTime();" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
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
            <h1 class="m-0 text-dark"><?php echo $header_text_1; ?></h1>
          </div><!-- /.col -->


        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php"><?php echo $header_text_1; ?></a></li>
              <li class="breadcrumb-item active"></li>
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
		 
         <div class="col-md-4">
		 
            <!-- Profile Image -->
            <div class="card card-primary card-outline" style="height:530px;">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../_source/dist/img/user2-160x160.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $staff_full_name_x; ?></h3>

                <p class="text-muted text-center"><?php echo $dept; ?></p>
				<hr/>


 
 
 <br/>
               <?php echo $functional_btn; ?>

                <a href="#"  data-toggle='modal' data-target='#modal-profile'  class="text-left btn btn-default btn-block">
				<i class="fas fa-user-shield"></i> &nbsp;
				<b>View My Profile</b>
				</a>
				
                <a href="#"  data-toggle='modal' data-target='#change-password'  class="text-left btn btn-default btn-block">
				<i class="fas fa-lock"></i>&nbsp;
				<b>Change My Password</b></a>
				
                <a href="logout.php" onclick="if (confirm('Are you Sure you want to Log out Now?')){return true;}else{event.stopPropagation(); event.preventDefault();};"  class="text-left btn btn-danger btn-block"> 
				<i class="fas fa-sign-out-alt"></i>&nbsp;
				<b>Log out Now</b></a>
				
 

              </div>
	  
              <!-- /.card-body -->
			  
			  
			  
		 
              <!-- /.card-body -->
			  
            </div>
            <!-- /.card -->
			
		 </div>

         <div class="col-md-8">
		 
		 
		 		  
			<div class="callout callout-info">
                <h4> Current Time    <br/><span class="badge bg-info float-right"><b id="txt_time"></b> - <?php echo date('jS F Y',time()); ?> </span></h4>
				<br/> <hr/>
                <h4> Last Login Time  <br/><span class="badge bg-info float-right"><?php echo $time_date; ?></span></h4>
				<br/>
              </div>
			  

 
 
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
            <div class="card bg-gradient-primary" style="height:330px;">
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


 

<br/>
  
 
 












   <div class="modal fade" id="change-password">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Change My Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


  
                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Old Password</b></td>
                      <td><input required  type="password"  name="old_password"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>New Password</b></td>
                      <td><input required  type="password"  name="new_password"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Repeat New Password</b></td>
                      <td><input required  type="password"  name="repeat_password"   class="form-control"> </td>
                    </tr>
					
 					</table>
					<br/>
	 
					


            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="change_password"  class="btn btn-primary">Submit</button>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
           </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  














   <div class="modal fade" id="first_time_change_password">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Change My Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
  			<div class='alert alert-warning alert-dismissible'>
			<a href='#' class='close'   aria-label='close'>&times;</a>
			<strong>NOTICE:</strong> Your Default Password has not been Reset, Kindly Reset it Now!Enter a new password.
			
			</div>
			<input hidden value="<?php echo $staff_password_address_x; ?>" type="text"  name="old_password"   class="form-control">	
  
                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>New Password</b></td>
                      <td><input required  type="password"  name="new_password"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Repeat New Password</b></td>
                      <td><input required  type="password"  name="repeat_password"   class="form-control"> </td>
                    </tr>
					
 					</table>
					<br/>
	 
					


            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="change_password"  class="btn btn-primary">Submit</button>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
           </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  












      <div class="modal fade" id="modal-profile">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="full_name" ></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info"><b><?php echo $dept; ?></b>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../_source/dist/img/user2-160x160.jpg" id="profile_pic" src="" alt="User Avatar">
              </div>
              <div class="card-footer">

               <ul class="nav flex-column">
                  <li class="nav-item">
                    <p  class="nav-link">
                       <i class="fas fa-user-shield"></i> <b   class="float-right"><?php echo $staff_full_name_x; ?></b>
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                       <i class="far fa-envelope"></i>  <b   class="float-right"><?php echo $staff_email_address_x; ?></b>
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                       <i class='fas fa-phone-alt'></i>  <b  class="float-right"><?php echo $staff_phone_number_x; ?></b>
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                      <i class='fas fa-map-marker-alt'></i> <b  class="float-right "><?php echo $staff_house_address_x; ?></b>
                    </p>
                  </li>

            
				  
               </ul>



              </div>
            </div>
            <!-- /.widget-user -->


            </div>
            <div class="modal-footer justify-content-between">
			  <form action="" method="POST">
			  <input type="hidden" value="" id="user_id" name="user_id">
              <div id="ban_button"></div>
			  </form>
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



<link href="js/jquery-ui.css" rel="stylesheet" type="text/css">
<script src="js/jquery-ui.js"></script>



 <?php
	//check if user has chnaged password
 	
	if($staff_password_address_x == $staff_phone_number_x)
	{
		echo"<script> $('#first_time_change_password').modal('show'); </script>";
	}
	

?>

  <script>
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>
 

<?php

if(isset($_POST["change_password"])){
	
$old_password			=			clean_input($_POST["old_password"]);
$new_password			=			clean_input($_POST["new_password"]);
$repeat_password		=			clean_input($_POST["repeat_password"]);



 $query_user=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$_SESSION[user]'"))or die(mysqli_error($con));
  $password							=			clean_output($query_user['password']);
  
  if($password != $old_password){  header("location: ?notif_err=Old+Password+Incorrect! "); }
  
  elseif($new_password != $repeat_password){  header("location: ?notif_err=Passwords+do+not+match!"); }
  
  else{

 mysqli_query($con,"UPDATE staff SET  password 		= 		'$new_password' 	WHERE email_address = '$_SESSION[user]'") or die(mysqli_error($con));

 header("location: ?notif=Password+Changed!");
 
  }
 
}


?>