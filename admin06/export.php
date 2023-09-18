<?php
include("../set.php");
 
 
  $current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  
  
 //removeQueryStringParameter
 
 		$var_remove="action";

		$parsedUrl = parse_url($current_link);
		$query = array();

		if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $query);
        unset($query[$var_remove]);
		}

		$path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
		$query = !empty($query) ? '?'. http_build_query($query) : '';

		$new_link = $parsedUrl['scheme']. '://'. $parsedUrl['host']. $path. $query;
   
   
  
  
  $new_link	=	"https://v2018.api2pdf.com/wkhtmltopdf/url?url=".$new_link."&apikey=".$api2pdf_key;



  $qry_export_html_data=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM export_html_data ORDER BY id DESC LIMIT 1")) or die(mysqli_error($con));
  $last_id				=			 $qry_export_html_data['id'];
   
 
 	if(isset($_GET['action']) && $_GET['action']=='print') 
	{
		echo"<script> window.print(); </script>";
	}
	elseif(isset($_GET['action']) && $_GET['action']=='download_pdf')
	{
	
    header("location: $new_link"); 
 
	
	}
?>
 
 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $site_title; ?> </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../_source/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../_source/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  


</head>
<body  onload="hide_card_footer();" class="hold-transition layout-top-nav">
<div class="wrapper">

 
  
  <script>
function hide_card_footer() {
  document.getElementById("card_footer").style.display = "none"; 
}

//document.addEventListener('contextmenu', event => event.preventDefault());
</script>


 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
 
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
	  
	  
	       <div class="row">
		   
           <div class="col-md-1"> 
			</div>
 
	        <div class="col-md-10"> 


 
			<?php echo $qry_export_html_data['content'];  ?>
			
		 
	
				 
			</div>
		
	        <div class="col-md-1"> 
			</div>
			
			</div>	

 
		
		
		
		
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5> </h5>
      <p> </p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../_source/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../_source/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../_source/dist/js/adminlte.min.js"></script>
 

</body>
</html>
