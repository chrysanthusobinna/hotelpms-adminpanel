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
		
		

 
 // GET no_open_request
 
 	$no_open_request = mysqli_num_rows(mysqli_query($con,"SELECT * FROM room_maintenance WHERE status_open_staff != 'NULL' AND status_in_progress_staff = 'NULL' AND status_close_staff = 'NULL'"));

 
  
  // GET no_in_progress_request
 
 	$no_in_progress_request = mysqli_num_rows(mysqli_query($con,"SELECT * FROM room_maintenance WHERE status_open_staff != 'NULL' AND status_in_progress_staff != 'NULL' AND status_close_staff = 'NULL'"));

 
  
  // GET no_closed_request
 
 	$no_closed_request = mysqli_num_rows(mysqli_query($con,"SELECT * FROM room_maintenance WHERE status_open_staff != 'NULL' AND status_in_progress_staff != 'NULL' AND status_close_staff != 'NULL'"));


  // GET no_rooms_out_of_service
 
 	$no_rooms_out_of_service = mysqli_num_rows(mysqli_query($con,"SELECT * FROM room_maintenance WHERE (status_open_staff != 'NULL' OR status_in_progress_staff != 'NULL') AND status_close_staff = 'NULL'"));

 
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


 <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">



  

	<style>
	
	#example1 td { 
	}

	#example1.hide_now tr > *:nth-child(6) {
    display: none;
	}

 
	</style>	 



	<script language="javascript">
	function update_active_link(){
	
	var element_ul = document.getElementById("manage_room_maintenance");
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
            <h1>Room Maintenance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Room Maintenance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">





		<div id="included_divs">


      <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $no_open_request;   ?></h3>

                <p>OPENED Request</p>
              </div>
              <div class="icon">
                <i class="far fa-plus-square"></i>
              </div>
              <a href="?sort=open_request" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> 
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $no_in_progress_request; ?> </h3>

                <p>IN-PROGRESS Request</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
			 <a href="?sort=in_progress_request" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $no_closed_request; ?></h3>

                <p>CLOSED Request</p>
              </div>
              <div class="icon">
                <i class="far fa-check-square"></i>
              </div>
			<a href="?sort=closed_request" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $no_rooms_out_of_service; ?></h3>

                <p>Rooms Out of Service</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-times"></i>
              </div>
              <a href="?sort=rooms_out_of_service" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
		
	





 
	      <div class="row">
		  
          <div class="col-md-3 col-sm-6 col-12">
		   <a  data-toggle='modal' data-target='#modal-new'  href="#" >
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-plus-square"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number">ADD NEW</span>
                 <span class="info-box-number">REQUEST</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <div class="col-md-3 col-sm-6 col-12">
		   <a    href="manage_room_maintenance.php" >
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tools"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number">SHOW ALL</span>
                 <span class="info-box-number"> REQUEST</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

		  
          <div class="col-md-3 col-sm-6 col-12">
		   <a href="index.php" >
            <div class="info-box">
              <span class="info-box-icon bg-warning"> <i class="fas fa-th"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">GOTO</span>
                <span class="info-box-number">DASHBOARD</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
		  
		  
          <div class="col-md-3 col-sm-6 col-12">
		   <a href="logout.php" onclick="if (confirm('Are you Sure you want to Log out Now?')){return true;}else{event.stopPropagation(); event.preventDefault();};"  >
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-sign-out-alt"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number">LOGOUT</span>
                 <span class="info-box-number">NOW</span>
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

	
		
		
		
		
 
<?php 

	if(isset($_GET['sort']))
	{

		if($_GET['sort']=='open_request')
		{
		$q_room_maintenance=mysqli_query($con,"SELECT * FROM room_maintenance WHERE status_open_staff != 'NULL' AND status_in_progress_staff = 'NULL' AND status_close_staff = 'NULL'");
		
		$card_bg	=	"card-info";
		$card_title	=	"<b>OPENED</b> Rooms Maintenance Request";
		
		}
		elseif($_GET['sort']=='in_progress_request')
		{
		$q_room_maintenance=mysqli_query($con,"SELECT * FROM room_maintenance WHERE status_open_staff != 'NULL' AND status_in_progress_staff != 'NULL' AND status_close_staff = 'NULL'"); 
		
		$card_bg	=	"card-success";
		$card_title	=	"<b>IN-PROGRESS</b> Rooms Maintenance Request";
		
		}
		elseif($_GET['sort']=='closed_request')
		{
		$q_room_maintenance=mysqli_query($con,"SELECT * FROM room_maintenance WHERE status_open_staff != 'NULL' AND status_in_progress_staff != 'NULL' AND status_close_staff != 'NULL'"); 

		$card_bg	=	"card-warning";
		$card_title	=	"<b>CLOSED</b> Rooms Maintenance Request";
		
		}
		elseif($_GET['sort']=='rooms_out_of_service')
		{
		$q_room_maintenance=mysqli_query($con,"SELECT * FROM room_maintenance WHERE (status_open_staff != 'NULL' OR status_in_progress_staff != 'NULL') AND status_close_staff = 'NULL'"); 

		$card_bg	=	"card-danger";
		$card_title	=	"<b>OPENED & IN-PROGRESS</b> Rooms Maintenance Request";
		
		}		
		
	}
	else
	{
	$q_room_maintenance=mysqli_query($con,"SELECT * FROM room_maintenance ORDER BY id DESC"); 	
	$card_bg	=	"card-secondary";
	$card_title	=	"<b>ALL</b> Rooms Maintenance Request";	
	}
		





?>



      <div class="row">
        <div class="col-12">

          <div class="card <?php echo $card_bg; ?>">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-cog"></i> &nbsp;<?php echo $card_title; ?> ( <b><?php echo  mysqli_num_rows($q_room_maintenance); ?> </b> ) </h3>
 
              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ROOM NUMBER</th>
                      <th>CLASS NAME</th>
                      <th>ISSUE / DESCRIPTION</th>
                      <th>STATUS</th>
                      <th>ROOM STATE</th>
                      <th style="width:9%;">#</th>
                    </tr>
                  </thead>

                  <tbody>



<?php


while($query_room_maintenance=mysqli_fetch_array($q_room_maintenance))
{
  $room_maintenance_id						=			clean_output($query_room_maintenance['id']);
  $room_id									=			clean_output($query_room_maintenance['room_id']);
  $issue_description						=			clean_output($query_room_maintenance['issue_description']);
  $status_open_staff						=			clean_output($query_room_maintenance['status_open_staff']);
  $status_in_progress_staff					=			clean_output($query_room_maintenance['status_in_progress_staff']);
  $status_close_staff						=			clean_output($query_room_maintenance['status_close_staff']);
  $status_open_date							=			clean_output(date('h:iA - jS M Y',(int)$query_room_maintenance['status_open_date'])); 
  $status_in_progress_date					=			clean_output(date('h:iA - jS M Y',(int)$query_room_maintenance['status_in_progress_date'])); 
  $status_close_date						=			clean_output(date('h:iA - jS M Y',(int)$query_room_maintenance['status_close_date'])); 

  $issue_description_x = substr($issue_description, 0, 30)."...";


	if(($status_open_staff != "NULL") && ($status_in_progress_staff == "NULL") &&($status_close_staff == "NULL"))
	{
	$query_row_open_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$status_open_staff'"));
	$open_staff_name		=			 clean_output($query_row_open_staff['full_name']);
	$staff_activity			=			"<p>Opened on $status_open_date by Staff <b>$open_staff_name</b></p><hr/>";


	$status									=			"<span style='width:100%;' class='badge bg-danger'>OPEN</span>";
	$data_status							=			"	<td><b>Status</b></td>
															<td>
															<select  required   name='status'  class='form-control'>
															<option value=''>Select Status</option>
															<option value='in_progress'>IN-PROGRESS</option>
															</select>					  
															</td>";	
	
	$data_foot_btn							=			"<button type='submit' name='edit'  class='btn btn-primary'>Submit</button>
														<button type='button'   data-dismiss='modal' class='btn btn-danger float-right'>Back</button>";
	$text_info								=			"";
														
	}
	elseif(($status_open_staff != "NULL") && ($status_in_progress_staff != "NULL") &&($status_close_staff == "NULL"))
	{
	$query_row_in_progress_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$status_in_progress_staff'"));
	$in_progress_staff_name		=			 clean_output($query_row_in_progress_staff['full_name']);

	$query_row_open_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$status_open_staff'"));
	$open_staff_name		=			 clean_output($query_row_open_staff['full_name']);
	
	$staff_activity			=			"<p>Opened on $status_open_date by <b>$open_staff_name</b></p><hr/>
										 <p>Updated as IN-PROGRESS on $status_in_progress_date by Staff <b>$in_progress_staff_name</b></p><hr/>";

		
	$status									=			"<span style='width:100%;' class='badge bg-warning'>IN-PROGRESS</span>";
	$data_status							=			"	<td><b>Status</b></td>
															<td>
															<select  required   name='status'  class='form-control'>
															<option value=''>Select Status</option>
															<option value='closed'>CLOSED</option>
															</select>					  
															</td>";

	$data_foot_btn							=			"<button type='submit' name='edit'  class='btn btn-primary'>Submit</button>
														<button type='button'   data-dismiss='modal' class='btn btn-danger float-right'>Back</button>";
														
	$text_info								=			"<b class='text-danger'>NOTE: CLOSING THIS MAINTENANCE REQUEST WILL SET ROOM BACK TO SERVICE
															</b> ";		
			
	
	}
	elseif(($status_open_staff != "NULL") && ($status_in_progress_staff != "NULL") && ($status_close_staff != "NULL"))
	{
		

	$query_row_close_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$status_close_staff'"));
	$close_staff_name		=			 clean_output($query_row_close_staff['full_name']);

	$query_row_in_progress_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$status_in_progress_staff'"));
	$in_progress_staff_name		=			 clean_output($query_row_in_progress_staff['full_name']);

	$query_row_open_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$status_open_staff'"));
	$open_staff_name		=			 clean_output($query_row_open_staff['full_name']);
	
	$staff_activity			=			"<p>Opened on $status_open_date by $open_staff_name</p><hr/>
										 <p>Updated as IN-PROGRESS on  $status_in_progress_date by $in_progress_staff_name</p><hr/>
										 <p>Closed on $status_close_date by Staff <b>$close_staff_name</b></p><hr/>";


	$status									=			"<span style='width:100%;' class='badge bg-success'>CLOSED</span>";
	$data_status							=			"	<td><b>Status</b></td>
															<td>
															<select  disabled   name='status'  class='form-control'>
															<option value=''>CLOSED</option>
															</select>					  
															</td>";	

	$data_foot_btn							=			"<button type='button'   data-dismiss='modal' class='btn btn-danger float-right'>Back</button>";
	$text_info								=			"";
	}
	
	
	

 $query_row_hotel_rooms=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM hotel_rooms WHERE id='$room_id'")) or die(mysqli_error($con));
  $current_state			=			 clean_output($query_row_hotel_rooms['current_state']);
  $room_number				=			 clean_output($query_row_hotel_rooms['room_number']);
  $room_class_id			=			 clean_output($query_row_hotel_rooms['room_class_id']);
 

 $query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$room_class_id'")) or die(mysqli_error($con));

  $class_id					=			 clean_output($query_row_room_class['id']);
  $class_name				=			 clean_output($query_row_room_class['class_name']);
 

	if($current_state						==			"in_service")
	{
	$current_state_txt						=			"<b class='text-success'>IN SERVICE</b>";	
	}
	elseif($current_state					==			"out_of_service")
	{
	$current_state_txt						=			"<b class='text-danger'>OUT OF SERVICE</b>";	
	} 
	
	
	
	
	

?>
					  <tr>
                      <td><?php echo $room_number; ?></td>
                      <td><?php echo $class_name; ?></td>
                      <td><?php echo $issue_description_x; ?></td>
                      <td><?php echo $status; ?></td>
                      <td><?php echo $current_state_txt; ?></td>
					  <td>

                      <button
					  data-room_maintenance_id="<?php echo $room_maintenance_id; ?>"
					  data-room_id="<?php echo $room_id; ?>"
					  data-room_number="<?php echo $room_number; ?>"
					  data-issue_description="<?php echo $issue_description; ?>"
					  data-data_status="<?php echo $data_status; ?>"
					  data-data_foot_btn="<?php echo $data_foot_btn; ?>"
					  data-text_info="<?php echo $text_info; ?>"
					  data-staff_activity="<?php echo $staff_activity; ?>"


					  data-toggle='modal' data-target='#modal-edit' type="button"  class="open-EditDialog btn btn-sm btn-success"><i class="fas fa-edit"></i></button>


                      <button 
					  data-room_maintenance_id='<?php echo $room_maintenance_id; ?>'
					  data-room_id="<?php echo $room_id; ?>"
					  data-toggle='modal' data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>
                 
					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($q_room_maintenance))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
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
                      <th>ROOM NUMBER</th>
                      <th>CLASS NAME</th>
                      <th>ISSUE / DESCRIPTION</th>
                      <th>STATUS</th>
                      <th>ROOM STATE</th>
                      <th>#</th>
                </tr>
                </tfoot>

              </table>            </div>
            <!-- /.card-body -->
 				<div class="card-footer" id="functional_buttons_div">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-secondary float-right">BACK</button>
                 </div> <!-- /.card-footer --> 
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->










	  
















      <div class="modal fade" id="modal-new">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Room Maintenance Request</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
			<b class="text-danger">NOTE: THIS MAINTENANCE REQUEST WILL SET ROOM OUT OF SERVICE </b>
			<hr/><br/>



                <table class="table table-bordered">
                  <tbody>


                    <tr>
                      <td><b>Select Hotel Room </b></td>
                      <td>
					  <select  required name="room_id"   class="form-control">
					  <option value=''>SELECT ROOM </option>
						<?php 
						$query_room_=mysqli_query($con,"SELECT * FROM hotel_rooms ");
						while($row_query_room_=mysqli_fetch_array($query_room_))
						{
						$room_id				=		clean_output($row_query_room_["id"]);
						$room_number			=		clean_output($row_query_room_["room_number"]);
						$room_class_id			=		clean_output($row_query_room_["room_class_id"]);
						$current_state			=		clean_output($row_query_room_["current_state"]);
						
							
						
						$row_query_room_class	=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$room_class_id'"));
						$class_name				=			clean_output($row_query_room_class["class_name"]);

						echo "<option value='$room_id'>Room No. $room_number [$class_name] </option>";
						} 
						?>

					  </select>
					  </td>
                    </tr>
 

                    <tr>
                      <td><b>Issues / Description</b></td>
                      <td><textarea required   name="issue_description" placeholder="Issues / Description"  class="form-control"></textarea></td>
                    </tr>	
					
					</table>
					<br/>

			




            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="add_new"  class="btn btn-primary">Submit</button>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
           </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->








      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-xl">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  ></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
 				<input type="hidden" name="room_maintenance_id" id="room_maintenance_id"/>
				<input type="hidden" name="room_id" id="room_id"/>

 
 
  
 
            <div class="row">
            <div class="col-md-4">
            <div class="card card-secondary" style="height:320px;">
            <div class="card-header"> <h3 class="card-title">Staff Activity</h3> </div> <!-- /.card-header -->

            <div class="card-body" id="staff_activity">

 

            </div> <!-- /.card-body -->
            </div> <!-- /.card -->

            </div>


            <div class="col-md-8">

			<div class="card card-secondary">
            <div class="card-header"> <h3 class="card-title">Update Maintenance Request</h3> </div> <!-- /.card-header -->
            <div class="card-body">
 
			<div id="text_info">
			</div>
			
               <table class="table table-bordered">
                  <tbody>


                    <tr>
                      <td><b>Hotel Room Number</b></td>
                      <td>
					  <select disabled required   id="room_number"     class="form-control">
					  <option value=''>SELECT ROOM </option>
						<?php 
						$query_room_=mysqli_query($con,"SELECT * FROM hotel_rooms ");
						while($row_query_room_=mysqli_fetch_array($query_room_))
						{
 						$room_number			=		clean_output($row_query_room_["room_number"]);
						$room_class_id			=		clean_output($row_query_room_["room_class_id"]);
						$current_state			=		clean_output($row_query_room_["current_state"]);
						
							
						
						$row_query_room_class	=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$room_class_id'"));
						$class_name				=			clean_output($row_query_room_class["class_name"]);

						echo "<option value='$room_number'>Room No. $room_number [$class_name] </option>";
						} 
						?>

					  </select>
					  </td>
                    </tr>


                    <tr>
                      <td><b>Issues / Description</b></td>
 <td><textarea disabled  id="issue_description"  name="issue_description" placeholder="Issues / Description"  class="form-control"></textarea></td>
                    </tr>	
					
					
                    <tr id="data_status">


                    </tr>					
					</table>


            </div> <!-- /.card-body -->
            </div> <!-- /.card -->





            </div> <!-- /.col-md-9 -->

            </div><!-- /.row -->
 





            </div>
            <div class="modal-footer justify-content-between" id="data_foot_btn">

           </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



 









      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Delete Room Maintenance Request</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form action="" method="POST">
            <div class="modal-body">


			<input type="hidden" name="room_maintenance_id_2" id="room_maintenance_id_2"/>
			<input type="hidden" name="room_id" id="room_id_2"/>



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
	  
	  
	  
	  
	  
	  





 


      </div>
      <!-- /.row -->
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
      "autoWidth": false,
	  "pageLength": 3,
    });
  });
</script>
 
 
   <script>
 $(function(){
   $(".open-EditDialog").click(function(){
	   
      $('#room_maintenance_id').val($(this).data('room_maintenance_id'));
      $('#room_id').val($(this).data('room_id'));
      $('#room_number').val($(this).data('room_number'));
	  $('#issue_description').val($(this).data('issue_description'));

	  $("#data_status").html($(this).data('data_status'));
	  $("#data_foot_btn").html($(this).data('data_foot_btn'));
	  $("#text_info").html($(this).data('text_info'));

	  $("#staff_activity").html($(this).data('staff_activity'));

   
    });
});

</script>


	<script type="text/javascript">
	$(function(){
		$(".open-DeleteDialog").click(function(){
		$('#room_maintenance_id_2').val($(this).data('room_maintenance_id'));
        $('#room_id_2').val($(this).data('room_id'));

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

if(isset($_POST["add_new"]))
{

  $current_state				=			"out_of_service";

  $room_id						=			clean_input($_POST["room_id"]);
  $issue_description			=			clean_input($_POST['issue_description']);
  $status_open_staff			=			$_SESSION["user"];
  $status_in_progress_staff		=			"NULL";
  $status_close_staff			=			"NULL";
  $status_open_date				=			time();
  $status_in_progress_date		=			"NULL";
  $status_close_date			=			"NULL";
  
 

 mysqli_query($con,"INSERT INTO room_maintenance SET 		room_id						= 	'$room_id',
															issue_description			= 	'$issue_description',
															status_open_staff			= 	'$status_open_staff', 
															status_in_progress_staff	= 	'$status_in_progress_staff', 
															status_close_staff			= 	'$status_close_staff', 
															status_open_date			= 	'$status_open_date', 
															status_in_progress_date		= 	'$status_in_progress_date',
															status_close_date			= 	'$status_close_date'");
															


 mysqli_query($con,"UPDATE hotel_rooms SET 	current_state = '$current_state'  WHERE id = '$room_id'");

 header("location: ?notif=Room+Maintenance+Request+has+been+Submitted");

}

?>




<?php
if(isset($_POST["edit"]))
{

 

  $room_maintenance_id			=			clean_input($_POST['room_maintenance_id']);
  $room_id						=			clean_input($_POST["room_id"]);
  
  
  $status						=			clean_input($_POST["status"]);
	
  if($status == "in_progress")
  {
  $status_in_progress_staff		=			$_SESSION["user"];
  $status_in_progress_date		=			time();
  
   mysqli_query($con,"UPDATE room_maintenance		SET 	status_in_progress_staff	= 			'$status_in_progress_staff',  
														status_in_progress_date			= 			'$status_in_progress_date' 
														WHERE 						 id = 			'$room_maintenance_id'");	  
  }
  elseif($status == "closed")
  {
  $status_close_staff			=			$_SESSION["user"];
  $status_close_date			=			time();
  $current_state				=			"in_service";


 mysqli_query($con,"UPDATE room_maintenance		SET 	status_close_staff				= 			'$status_close_staff',  
														status_close_date				= 			'$status_close_date'
														WHERE 						 id = 			'$room_maintenance_id'");
														
														

 	   $no_query= mysqli_num_rows(mysqli_query($con,"SELECT * FROM room_maintenance WHERE (status_open_staff != 'NULL' OR status_in_progress_staff != 'NULL') AND status_close_staff = 'NULL' AND room_id = '$room_id'"));
	   
	   if($no_query ==0)
	   {
		 mysqli_query($con,"UPDATE hotel_rooms		SET 	current_state = '$current_state'  WHERE id = '$room_id'");
   
	   }

 
														
  
  }
 
 

 
  

 header("location: ?notif=Room+Maintenance+Request+has+been+Updated-$no_query");

}

?>



<?php
if(isset($_POST["delete"]))
{

  $room_maintenance_id						=			clean_input($_POST["room_maintenance_id_2"]);
  $room_id									=			clean_input($_POST["room_id"]);
  $pin										=			clean_input($_POST["pin"]);
  
  
  if($pin == $administrative_pin)
  {
	mysqli_query($con,"DELETE FROM room_maintenance WHERE id='$room_maintenance_id'") or die(mysqli_error($con));
	header("location: ?notif=Room+Maintenance+Request+has+been+Deleted");
	
	 	   $no_query= mysqli_num_rows(mysqli_query($con,"SELECT * FROM room_maintenance WHERE (status_open_staff != 'NULL' OR status_in_progress_staff != 'NULL') AND status_close_staff = 'NULL' AND room_id = '$room_id'"));
	   
	   if($no_query ==0)
	   {
		 mysqli_query($con,"UPDATE hotel_rooms		SET 	current_state = '$current_state'  WHERE id = '$room_id'");
   
	   }
	   
  }
  else
  {
   header("location: ?notif_err=Incorrect+Administrative+Pin");

  }


 

}

?>



