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
		if($main_role_x != 'general_admin')
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

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../_source/plugins/icheck-bootstrap/icheck-bootstrap.min.css">


 <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">
 

   
	
	
 
   	<script language="javascript">
	function select_staff_role(checked_value){
		//var checked_value_var	=	checked_value;
		
 
		if(checked_value == "regular_staff")
		{
	
	        document.getElementById("access_booking_record_statistics_div").style.display = "none";
	        document.getElementById("access_sales_record_statistics_div").style.display = "none";
			document.getElementById("access_website_management_div").style.display = "block";


			document.getElementById("access_booking_record_statistics").checked = false;			
			document.getElementById("access_sales_record_statistics").checked = false;			
			document.getElementById("access_website_management").checked = false;			
 
 		
						
		}
		else if(checked_value == "front_desk_staff")
		{

	        document.getElementById("access_booking_record_statistics_div").style.display = "block";
	        document.getElementById("access_sales_record_statistics_div").style.display = "none";
			document.getElementById("access_website_management_div").style.display = "block";


			document.getElementById("access_booking_record_statistics").checked = false;			
			document.getElementById("access_sales_record_statistics").checked = false;			
			document.getElementById("access_website_management").checked = false;			
 
 		
		}
		else if(checked_value == "sales_staff")
		{

	        document.getElementById("access_booking_record_statistics_div").style.display = "none";
	        document.getElementById("access_sales_record_statistics_div").style.display = "block";
 			document.getElementById("access_website_management_div").style.display = "block";


			document.getElementById("access_booking_record_statistics").checked = false;			
			document.getElementById("access_sales_record_statistics").checked = false;			
			document.getElementById("access_website_management").checked = false;				
 
 			
		} 	
		else if(checked_value == "general_admin")
		{

	        document.getElementById("access_booking_record_statistics_div").style.display = "block";
	        document.getElementById("access_sales_record_statistics_div").style.display = "block";
			document.getElementById("access_website_management_div").style.display = "block";


			document.getElementById("access_booking_record_statistics").checked = true;			
			document.getElementById("access_sales_record_statistics").checked = true;			
 			document.getElementById("access_website_management").checked = true;			
 
 			
		}
		
	}
	</script>	

	
	

   	<script language="javascript">
	function edit_select_staff_role(checked_value){
		//var checked_value_var	=	checked_value;
		
 
		if(checked_value == "regular_staff")
		{
	
	        document.getElementById("edit_access_booking_record_statistics_div").style.display = "none";
	        document.getElementById("edit_access_sales_record_statistics_div").style.display = "none";
			document.getElementById("edit_access_website_management_div").style.display = "block";


			document.getElementById("edit_access_booking_record_statistics").checked = false;			
			document.getElementById("edit_access_sales_record_statistics").checked = false;			
			document.getElementById("edit_access_website_management").checked = false;			
 
 		
						
		}
		else if(checked_value == "front_desk_staff")
		{

	        document.getElementById("edit_access_booking_record_statistics_div").style.display = "block";
	        document.getElementById("edit_access_sales_record_statistics_div").style.display = "none";
			document.getElementById("edit_access_website_management_div").style.display = "block";


			document.getElementById("edit_access_booking_record_statistics").checked = false;			
			document.getElementById("edit_access_sales_record_statistics").checked = false;			
			document.getElementById("edit_access_website_management").checked = false;			
 
 		
		}
		else if(checked_value == "sales_staff")
		{

	        document.getElementById("edit_access_booking_record_statistics_div").style.display = "none";
	        document.getElementById("edit_access_sales_record_statistics_div").style.display = "block";
 			document.getElementById("edit_access_website_management_div").style.display = "block";


			document.getElementById("edit_access_booking_record_statistics").checked = false;			
			document.getElementById("edit_access_sales_record_statistics").checked = false;			
 			document.getElementById("edit_access_website_management").checked = false;				
 
 			
		}
		else if(checked_value == "general_admin")
		{

	        document.getElementById("edit_access_booking_record_statistics_div").style.display = "block";
	        document.getElementById("edit_access_sales_record_statistics_div").style.display = "block";
   			document.getElementById("edit_access_website_management_div").style.display = "block";


			document.getElementById("edit_access_booking_record_statistics").checked = true;			
			document.getElementById("edit_access_sales_record_statistics").checked = true;			
  			document.getElementById("edit_access_website_management").checked = true;			
 
 			
		}
		
	}
	</script>	
	
	
	
   	<script language="javascript">
	function update_active_link(){
	
	var element_ul = document.getElementById("manage_staff_roles");
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
    <section class="content-header">
      <div class="container-fluid">




<?php include('notification.php'); ?>


	<!-- Loader -->
  <div class="loader loader-default is-active" id="loader_santhus" style=""></div>
 


        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Staff Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Staff Roles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


 
<?php $query_hotel_staff=mysqli_query($con,"SELECT * FROM staff ORDER BY id DESC") or die(mysqli_error($con)); ?>



      <div class="row">
        <div class="col-12">

          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-cog"></i> &nbsp; All Staff  ( <b><?php echo  mysqli_num_rows($query_hotel_staff); ?> </b> ) </h3>
                <div class="card-tools">

                  <div class="input-group input-group-sm" >

                    <div class="input-group-append">
                      <button  data-toggle='modal' data-target='#modal-new'  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
					  ADD NEW STAFF</button>
                    </div>
                  </div>

				</div>
              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>STAFF NAME</th>
                      <th>EMAIL ADDRESS</th>
                      <th>DEPARTMENT</th>
                      <th>#</th>
                    </tr>
                  </thead>

                  <tbody>



<?php


while($query_hotel_staff_row=mysqli_fetch_array($query_hotel_staff))
{
 
 
  $staff_row_id						=			clean_output($query_hotel_staff_row['id']);
  $email_address					=			clean_output($query_hotel_staff_row['email_address']);
  $full_name						=			clean_output($query_hotel_staff_row['full_name']);
  $phone_number						=			clean_output($query_hotel_staff_row['phone_number']);
  $house_address					=			clean_output($query_hotel_staff_row['house_address']);
  $main_role						=			clean_output($query_hotel_staff_row['main_role']);
  
  $access_booking_record_statistics	=			clean_output($query_hotel_staff_row['access_booking_record_statistics']);
  $access_sales_record_statistics	=			clean_output($query_hotel_staff_row['access_sales_record_statistics']);
  $access_website_management		=			clean_output($query_hotel_staff_row['access_website_management']);
  
  $password							=			clean_output($query_hotel_staff_row['password']);  


		if($main_role 				==			'regular_staff')
		{
		$staff_department			=			"Regular Staff";					
		}
		elseif($main_role 			==			'front_desk_staff')
		{
		$staff_department			=			"Front Desk Staff";	
		}
		elseif($main_role 			==			'sales_staff')
		{
		$staff_department			=			"Sales Staff";					
		}			
		elseif($main_role 			==			'general_admin')
		{	
		$staff_department			=			"General Administrator";						
		}			
		 
	
	

?>
					  <tr>
                      <td><?php echo $full_name; ?></td>
                      <td><?php echo $email_address; ?></td>
                      <td><?php echo $staff_department; ?></td>
  					  <td>

                      <button
					  data-staff_row_id='<?php echo $staff_row_id; ?>'
					  data-edit_email_address='<?php echo $email_address; ?>'
					  data-edit_full_name='<?php echo $full_name; ?>'
					  data-edit_phone_number='<?php echo $phone_number; ?>'
					  data-edit_house_address='<?php echo $house_address; ?>'
					  data-edit_main_role='<?php echo $main_role; ?>'
					  data-edit_access_booking_record_statistics='<?php echo $access_booking_record_statistics; ?>'
					  data-edit_access_sales_record_statistics='<?php echo $access_sales_record_statistics; ?>'
					  data-edit_access_website_management='<?php echo $access_website_management; ?>'
					  
					  
					  
					  data-toggle='modal' data-target='#modal-edit' type="button"  class="open-EditDialog btn-sm btn btn-success"><i class="fas fa-edit"></i></button>

                      <button
					  data-staff_row_id='<?php echo $staff_row_id; ?>'
					  data-full_name='<?php echo $full_name; ?>'
					  data-toggle='modal' data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>



					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($query_hotel_staff))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>
                  </tbody>


                <tfoot>
                <tr>
                      <th>STAFF NAME</th>
                      <th>EMAIL ADDRESS</th>
                      <th>DEPARTMENT</th>
                      <th>#</th>
                </tr>
                </tfoot>

              </table>            </div>
            <!-- /.card-body -->
					<div class="card-footer ">
                   <button type="button"  onclick="window.location='index.php';" class="btn btn-secondary">DASHBOARD</button>
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-secondary float-right">BACK</button>
                 </div> <!-- /.card-footer --> 
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->



























      <div class="modal fade" id="modal-new">
        <div class="modal-dialog modal-xl">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add Staff Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
			<div class='alert alert-success alert-dismissible'>
			<a href='#' class='close'   aria-label='close'>&times;</a>
			<strong>NOTE:</strong> Default Password is Staff's Phone Number, Ensure Staff Changes this Password as soon as possible for Security purpose.
			
			</div>


            <div class="row">
			
            <div class="col-md-4">
			  <div class="card card-secondary" style="height:270px;">
              <div class="card-header">
                <h3 class="card-title">Staff Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body  table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                  <tbody>
                    <tr>
                      <td><b>Full Name</b></td>
                      <td><input required  type="text" name="full_name"   class="form-control form-control-sm"></td>
                    </tr>
                    <tr>
                      <td><b>Phone Number</b></td>
                      <td><input required  type="text" name="phone_number"    class="form-control form-control-sm"> </td>
                    </tr>
                    <tr>
                      <td><b>Home Address </b></td>
                      <td><input required  type="text" name="house_address"   class="form-control form-control-sm"> </td>
                    </tr>
                    <tr>
                      <td><b>Email Address </b></td>
                      <td><input required  type="email" name="email_address"    class="form-control form-control-sm"> </td>
                    </tr>				
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

			</div>
			
            <div class="col-md-4">

			  <div class="card card-secondary" style="height:270px;">
              <div class="card-header">
                <h3 class="card-title">Main Role</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  		<div class="form-group">
				
                      <div class="icheck-primary">
                        <input onclick="select_staff_role(this.value);"  value="regular_staff" type="radio" id="regular_staff" name="main_role" >
                        <label for="regular_staff">Regular Staff</label>
                      </div>
  
                       <div class="icheck-primary">
                        <input  onclick="select_staff_role(this.value);"   value="front_desk_staff" type="radio" id="front_desk_staff" name="main_role"  >
                        <label for="front_desk_staff">Front Desk Staff</label>
                      </div>
 					  
					  

                       <div class="icheck-primary">
                        <input  onclick="select_staff_role(this.value);"  value="sales_staff"   type="radio" id="sales_staff" name="main_role"  >
                        <label for="sales_staff">Sales Staff</label>
                      </div>
  				  

                       <div class="icheck-primary ">
                        <input  onclick="select_staff_role(this.value);"  value="general_admin"  type="radio" id="general_admin" name="main_role" checked >
                        <label for="general_admin">General Admin</label>
                      </div>
					  <hr/>
						  <hr/>
					  
                    </div>
					
				
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
			
			</div>


            <div class="col-md-4">

			  <div class="card card-secondary" style="height:270px;">
              <div class="card-header">
                <h3 class="card-title">Other Roles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  
			  <div class="form-group">

                      <div class="icheck-primary" id="access_booking_record_statistics_div">
                        <input type="checkbox" id="access_booking_record_statistics" value="1" name="access_booking_record_statistics" checked>
                        <label for="access_booking_record_statistics">Access Booking Record & Statistics </label>
                      </div>

                      <div class="icheck-primary" id="access_sales_record_statistics_div">
                        <input type="checkbox" id="access_sales_record_statistics"  value="1" name="access_sales_record_statistics" checked>
                        <label for="access_sales_record_statistics">Access Sales Record & Statistics </label>
                      </div>
 

               
 
                      <div class="icheck-primary" id="access_website_management_div">
                        <input type="checkbox" id="access_website_management"  value="1" name="access_website_management" checked>
                        <label for="access_website_management">Access Website Management </label>
                      </div>


 
                    </div>
					
				 
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
			
			</div>
				
			</div>
         


      

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
              <h4 class="modal-title"  >Edit Staff Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


				<input type="hidden" name="staff_row_id" id="staff_row_id"/>

  			<div class='alert alert-warning alert-dismissible'>
			<a href='#' class='close'   aria-label='close'>&times;</a>
			<strong>NOTE:</strong> Only Staff Can Change Password From Dashboard, If Password is Forgotten Staff can only use the password reset Button at the Admin Login Page to Reset Password
			
			</div>

    
   

            <div class="row">
			
            <div class="col-md-4">
			  <div class="card card-secondary" style="height:270px;">
              <div class="card-header">
                <h3 class="card-title">Staff Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body  table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                  <tbody>
                    <tr>
                      <td><b>Full Name</b></td>
                      <td><input required  type="text" name="full_name"  id="edit_full_name" class="form-control form-control-sm"></td>
                    </tr>
                    <tr>
                      <td><b>Phone Number</b></td>
                      <td><input required  type="text" name="phone_number"  id="edit_phone_number"  class="form-control form-control-sm"> </td>
                    </tr>
                    <tr>
                      <td><b>Home Address </b></td>
                      <td><input required  type="text" name="house_address" id="edit_house_address"  class="form-control form-control-sm"> </td>
                    </tr>
                    <tr>
                      <td><b>Email Address </b></td>
                      <td><input required  type="email" name="email_address"  id="edit_email_address"  class="form-control form-control-sm"> </td>
                    </tr>				
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

			</div>
			
            <div class="col-md-4">

			  <div class="card card-secondary" style="height:270px;">
              <div class="card-header">
                <h3 class="card-title">Main Role</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  		<div class="form-group">
				
                      <div class="icheck-primary">
                        <input onclick="edit_select_staff_role(this.value);"  value="regular_staff" type="radio" id="edit_regular_staff" name="main_role" >
                        <label for="edit_regular_staff">Regular Staff</label>
                      </div>

					<div class="icheck-primary">
                        <input  onclick="edit_select_staff_role(this.value);"   value="front_desk_staff" type="radio" id="edit_front_desk_staff" name="main_role"  >
                        <label for="edit_front_desk_staff">Front Desk Staff</label>
                      </div>
 					  
					  

                       <div class="icheck-primary">
                        <input  onclick="edit_select_staff_role(this.value);"  value="sales_staff"   type="radio" id="edit_sales_staff" name="main_role"  >
                        <label for="edit_sales_staff">Sales Staff</label>
                      </div>
 
                 				  

                       <div class="icheck-primary ">
                        <input  onclick="edit_select_staff_role(this.value);"  value="general_admin"  type="radio" id="edit_general_admin" name="main_role"  >
                        <label for="edit_general_admin">General Admin</label>
                      </div>
					  <hr/>
						  <hr/>
					  
                    </div>
					
				
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
			
			</div>


            <div class="col-md-4">

			  <div class="card card-secondary" style="height:270px;">
              <div class="card-header">
                <h3 class="card-title">Other Roles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  
			  <div class="form-group">

                      <div class="icheck-primary" id="edit_access_booking_record_statistics_div">
                        <input type="checkbox" id="edit_access_booking_record_statistics" value="1" name="access_booking_record_statistics" >
                        <label for="edit_access_booking_record_statistics">Access Booking Record & Statistics </label>
                      </div>

                      <div class="icheck-primary" id="edit_access_sales_record_statistics_div">
                        <input type="checkbox" id="edit_access_sales_record_statistics"  value="1" name="access_sales_record_statistics" >
                        <label for="edit_access_sales_record_statistics">Access Sales Record & Statistics </label>
                      </div>
 
 
                      <div class="icheck-primary" id="edit_access_website_management_div">
                        <input type="checkbox" id="edit_access_website_management"  value="1" name="access_website_management" >
                        <label for="edit_access_website_management">Access Website Management </label>
                      </div>


 
                    </div>
					
				 
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
			
			</div>
				
			</div>
         


      
	  


            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="edit"  class="btn btn-primary">Save Settings</button>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
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
              <h4 class="modal-title"  >Delete Staff Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form action="" method="POST">
            <div class="modal-body">

			<p>Are you Sure you want to Delete Staff Account  "<b id="full_name_2"></b>" ?</p>
			<hr/>

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
					
					<input type="hidden" name="staff_row_id_2" id="staff_row_id_2"/>
                   <button type="submit" name="delete"  class="btn btn-primary">YES</button>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">NO</button>
           </div>
		   </form>

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
      $('#staff_row_id').val($(this).data('staff_row_id'));
	  
      $('#edit_full_name').val($(this).data('edit_full_name'));
      $('#edit_email_address').val($(this).data('edit_email_address'));
	  $("#edit_phone_number").val($(this).data('edit_phone_number'));
	  $("#edit_house_address").val($(this).data('edit_house_address'));
	  
	  var edit_main_role						=	$(this).data('edit_main_role');
	  var edit_access_booking_record_statistics	=	$(this).data('edit_access_booking_record_statistics');
	  var edit_access_sales_record_statistics	=	$(this).data('edit_access_sales_record_statistics');
 	  var edit_access_website_management		=	$(this).data('edit_access_website_management');

		if(edit_main_role	==	'regular_staff')
		{
		document.getElementById("edit_regular_staff").checked = true;	


	        document.getElementById("edit_access_booking_record_statistics_div").style.display = "none";
	        document.getElementById("edit_access_sales_record_statistics_div").style.display = "none";
			document.getElementById("edit_access_website_management_div").style.display = "block";
		
		}
		else if(edit_main_role	==	'front_desk_staff')
		{
		document.getElementById("edit_front_desk_staff").checked = true;


	        document.getElementById("edit_access_booking_record_statistics_div").style.display = "block";
	        document.getElementById("edit_access_sales_record_statistics_div").style.display = "none";
			document.getElementById("edit_access_website_management_div").style.display = "block";

 				
		}
		else if(edit_main_role	==	'sales_staff')
		{
		document.getElementById("edit_sales_staff").checked = true;		


	        document.getElementById("edit_access_booking_record_statistics_div").style.display = "none";
	        document.getElementById("edit_access_sales_record_statistics_div").style.display = "block";
 			document.getElementById("edit_access_website_management_div").style.display = "block";

		
		}
		else if(edit_main_role	==	'general_admin')
		{
		document.getElementById("edit_general_admin").checked = true;	


	        document.getElementById("edit_access_booking_record_statistics_div").style.display = "block";
	        document.getElementById("edit_access_sales_record_statistics_div").style.display = "block";
 			document.getElementById("edit_access_website_management_div").style.display = "block";

		
		}
		
		
			if(edit_access_booking_record_statistics	==	"0")
			{
   			document.getElementById("edit_access_booking_record_statistics").checked = false;							
			}
			else if(edit_access_booking_record_statistics	==	"1")
			{
   			document.getElementById("edit_access_booking_record_statistics").checked = true;							
			}

			if(edit_access_sales_record_statistics	==	"0")
			{
   			document.getElementById("edit_access_sales_record_statistics").checked = false;							
			}
			else if(edit_access_sales_record_statistics	==	"1")
			{
   			document.getElementById("edit_access_sales_record_statistics").checked = true;							
			}



			if(edit_access_website_management	==	"0")
			{
   			document.getElementById("edit_access_website_management").checked = false;							
			}
			else if(edit_access_website_management	==	"1")
			{
   			document.getElementById("edit_access_website_management").checked = true;							
			}
		
				
 

		

   });
});

</script>


  <script>
 $(function(){
   $(".open-DeleteDialog").click(function(){
      $('#staff_row_id_2').val($(this).data('staff_row_id'));
	  $("#full_name_2").html($(this).data('full_name'));

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
 
  $email_address					=			clean_input($_POST['email_address']);
  $full_name						=			clean_input(ucwords(strtolower($_POST["full_name"])));
  $phone_number						=			clean_input($_POST['phone_number']);
  $house_address					=			clean_input($_POST['house_address']);
  $main_role						=			clean_input($_POST['main_role']);
  
  $access_booking_record_statistics	=			clean_output($_POST['access_booking_record_statistics']);
  $access_sales_record_statistics	=			clean_output($_POST['access_sales_record_statistics']);
  $access_website_management		=			clean_output($_POST['access_website_management']);
   
  
  $password							=			clean_input($_POST['phone_number']); //using phone number as password


$check_email_address	=	mysqli_query($con,"SELECT * FROM staff WHERE email_address='$email_address'");

 if(mysqli_num_rows($check_email_address)>0){  	header("location: ?notif_err=Staff+Account+Exist!");  exit(); }


  mysqli_query($con,"INSERT INTO staff		 SET		    email_address						=			'$email_address',
															password							=			'$password',
															full_name							=			'$full_name',
															phone_number						=			'$phone_number',
															house_address						=			'$house_address',
															main_role							=			'$main_role',
															
															access_booking_record_statistics	=			'$access_booking_record_statistics',
															access_sales_record_statistics		=			'$access_sales_record_statistics',
															access_website_management			=			'$access_website_management'");



	header("location: ?notif=New+Staff+Account+Added!");
 
}



?>




<?php
if(isset($_POST["edit"]))
{
	
  $staff_row_id						=			clean_input($_POST['staff_row_id']);


  $email_address					=			clean_input($_POST['email_address']);
  $full_name						=			clean_input(ucwords(strtolower($_POST["full_name"])));
  $phone_number						=			clean_input($_POST['phone_number']);
  $house_address					=			clean_input($_POST['house_address']);
  $main_role						=			clean_input($_POST['main_role']);
  
  $access_booking_record_statistics	=			clean_output($_POST['access_booking_record_statistics']);
  $access_sales_record_statistics	=			clean_output($_POST['access_sales_record_statistics']);   
  $access_website_management		=			clean_output($_POST['access_website_management']);
   
  


$check_email_address	=	mysqli_query($con,"SELECT * FROM staff WHERE email_address='$email_address'");

 if(mysqli_num_rows($check_email_address)>1){  	header("location: ?notif_err=Staff+Account+Exist!");  exit(); }


 
 mysqli_query($con,"UPDATE staff SET 	email_address						=			'$email_address',
										full_name							=			'$full_name',
										phone_number						=			'$phone_number',
										house_address						=			'$house_address',
										main_role							=			'$main_role',
															
										access_booking_record_statistics	=			'$access_booking_record_statistics',
										access_sales_record_statistics		=			'$access_sales_record_statistics',
										access_website_management			=			'$access_website_management'' WHERE id = '$staff_row_id'");

 header("location: ?notif=Staff+Information+has+been+Modified");

}

?>



<?php
if(isset($_POST["delete"]))
{

  $staff_row_id_2						=			clean_input($_POST["staff_row_id_2"]);
  $pin									=			clean_input($_POST["pin"]);

 
  if($pin == $administrative_pin)
  {
  mysqli_query($con,"DELETE FROM staff WHERE id='$staff_row_id_2'") or die(mysqli_error($con));


 header("location: ?notif=Staff+Account+has+been+Deleted");
  }
}


 
?>



