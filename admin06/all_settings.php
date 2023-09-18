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
		if($main_role_x == 'general_admin')
		{
		//DO NOTHING
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
            <h1>All Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">All Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

 

 
	 <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog"></i> &nbsp; All Settings</h3> </div>
              <!-- /.card-header -->
            <div class="card-body">
		
		
    <div class="row">
		  
          <div class="col-md-4 col-sm-6 col-12">
		   <a    href="setup_general.php" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">GENERAL</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


 

		  
          <div class="col-md-4 col-sm-6 col-12">
		   <a    href="setup_sales.php" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">SALES</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
		  
		  
   
   
   
         <div class="col-md-4 col-sm-6 col-12">
		   <a    href="setup_sales_menu.php" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">SALES MENU</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
		  
   
        </div>
        <!-- /.row -->


		




		
    <div class="row">
		  
          <div class="col-md-4 col-sm-6 col-12">
		   <a    href="setup_hotel_rooms.php" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">ROOMS</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <div class="col-md-4 col-sm-6 col-12">
		   <a    href="setup_room_class.php" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">ROOM CLASS</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

		  
    
		  
           <div class="col-md-4 col-sm-6 col-12">
		   <a    href="setup_sales_menu_category.php" >
            <div class="info-box">
              <span class="info-box-icon bg-secondary"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number text-secondary">MENU CATEGORIES</span>
                 <span class="info-box-number text-secondary">SETUP</span>
              </div>
               
            </div>
			</a>
            
          </div>
          
		  
 		  
   
        </div>
        <!-- /.row -->



			
			</div>
			
   
					<div class="card-footer ">
                   <button type="button" onclick="window.location='index.php';" class="btn btn-secondary">DASHBOARD</button>
                   <button type="button" onclick="javascript:history.go(-1);" class="btn btn-secondary float-right">BACK</button>
                 </div> <!-- /.card-footer --> 			
          </div>
  

 
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
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>



 
 