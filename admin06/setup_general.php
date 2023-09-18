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


 <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">

  	<script language="javascript">
	function update_active_link(){
	
	var element_ul = document.getElementById("all_settings");
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
            <h1>General Setup</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">General Setup</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


 		
            <div class="row">
			<div class="col-md-6">
	 
              <div class="card card-primary card-outline">
         
              <div class="card-body">
			  
			  
			 
			  <button type="button" onclick="window.location=' setup_bookings.php';" class="btn   btn-sm  btn-secondary btn-lg btn-block">
			  <i class="fas fa-cog"></i> 
			  BOOKING SETTINGS</button>
			  <hr/>
			  
			  
			  <form action="" method="POST">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><b>Main Email Address</b></td>
                      <td><input required  type="text" name="hotel_email_address" value="<?php echo $hotel_email_address; ?>"   class="form-control"> </td>
                    </tr>
					<tr>
                      <td><b>Other Email Addresses</b></td>
                      <td><input placeholder="E.g admin@velitechs.com,santhuus@velitechs.com"  type="text" name="hotel_other_emails"  value="<?php echo $hotel_other_emails; ?>"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Main Phone Number</b></td>
                      <td><input required  name="hotel_phone_number"  type="text"  value="<?php echo $hotel_phone_number; ?>" class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Other Phone Numbers</b></td>
                      <td><input   type="text"  name="hotel_other_phonenumbers"  value="<?php echo $hotel_other_phonenumbers; ?>" class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Hotel Address</b></td>
                      <td><input   type="text"  name="hotel_address"  value="<?php echo $hotel_address; ?>" class="form-control"> </td>
                    </tr>					
                    <tr>
                      <td><b>Google Map Iframe</b></td>
                      <td><input   type="text"  name="hotel_google_iframe_link"  value="<?php echo $hotel_google_iframe_link; ?>" class="form-control"> </td>
                    </tr>					
	
                     <tr>
                      <td><b>Website Welcome Note</b></td>
                      <td><textarea   required  name="intro_text"   class="form-control"><?php echo $intro_text; ?></textarea> </td>
                    </tr>						
                   <tr>
                      <td><b>#</b></td>
                      <td><button type="submit" name="save_settings" class="btn   btn-sm  btn-info btn-lg btn-block">SAVE</button></td>
                    </tr>                   

  
                  </tbody>
                </table>
				</form>
              </div> <!-- /.card-body -->

				</div> <!-- /.card -->
 			
			</div> <!-- /.col -->
			
            <div class="col-md-6">
		  
             <div class="card card-primary card-outline">
          
              <div class="card-body"><iframe style="width:100%; height:250px; " src="<?php echo $hotel_google_iframe_link; ?>" style="width: 100%; height:450px;"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		       <hr/>
		   		    <img src="../images/home.jpg" class="img-thumbnail" alt="Cinque Terre"> 


            </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
 

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


 
  
  
  <hr/>
<center>
 <button type="button" onclick="javascript:history.go(-1);" class="btn btn-secondary">BACK</button>
</center>
 

 
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
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>



<?php
if(isset($_POST["save_settings"]))
{

  $hotel_email_address				=			clean_input($_POST['hotel_email_address']);
  $hotel_phone_number				=			clean_input($_POST['hotel_phone_number']);
  $hotel_other_emails				=			clean_input($_POST['hotel_other_emails']);
  $hotel_other_phonenumbers			=			clean_input($_POST['hotel_other_phonenumbers']);
  $hotel_google_iframe_link			=			clean_input($_POST['hotel_google_iframe_link']);
  $hotel_address					=			clean_input($_POST['hotel_address']);
  $intro_text						=			clean_input($_POST['intro_text']);



	$hotel_other_emails				=			str_replace(",","<br/>",$hotel_other_emails);
	$hotel_other_phonenumbers		=			str_replace(",","<br/>",$hotel_other_phonenumbers);

 

 

 mysqli_query($con,"UPDATE hotel_system_settings SET 		hotel_email_address			= 	'$hotel_email_address',
															hotel_phone_number			= 	'$hotel_phone_number',
															hotel_other_emails			= 	'$hotel_other_emails',
															hotel_other_phonenumbers	= 	'$hotel_other_phonenumbers',
															hotel_google_iframe_link	= 	'$hotel_google_iframe_link',
															hotel_address				= 	'$hotel_address',
															intro_text					= 	'$intro_text'   WHERE id = '1'");

 header("location: ?notif=Hotel+General+Setup+has+been+Updated");

}

?>


 