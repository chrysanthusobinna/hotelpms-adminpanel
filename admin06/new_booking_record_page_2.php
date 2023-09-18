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


		$checking_in_date			=				$_GET["checking_in_date"];
		$checking_out_date			=				$_GET["checking_out_date"];
		$class_id					=				$_GET["class_id"];
		$number_of_rooms			=				$_GET["number_of_rooms"];


		$cart_ref					=				$_GET["cart_ref"];

		//WIPE DB WHERE cart_ref EXIST
		mysqli_query($con,"DELETE FROM booking_cart WHERE cart_ref='$cart_ref'") or die(mysqli_error($con));

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
  
  
 
     <script language="javascript">
	function select_room(room_card_btn){
		
		var room_card_btn_element = document.getElementById(room_card_btn);
		
		var number_of_selected_rooms		= Number(document.getElementById('number_of_selected_rooms').value);
		var number_of_rooms 				= Number(document.getElementById('number_of_rooms').value);


		var cart_ref					 	= 	document.getElementById('cart_ref').value;		
 		var room_number	 					= 	room_card_btn;
		var class_id			 			= 	document.getElementById('class_id').value;
		var checking_in_date			 	= 	document.getElementById('checking_in_date').value;
		var checking_out_date			 	= 	document.getElementById('checking_out_date').value;
		
	
		if(room_card_btn_element.classList.contains("btn-default"))
		{

		//ADD TO CART

			if(number_of_selected_rooms < number_of_rooms)
			{
				


			//AJAX START
			var linkx="ajax_cart_booking.php?cart_ref="+cart_ref+"&room_number="+room_number+"&class_id="+ class_id +"&checking_in_date="+checking_in_date+"&checking_out_date="+checking_out_date+"&action=add_to_cart";
  
			if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			//LOADER
			document.getElementById("loader_santhus").style.display = "none"; 
 
 			//SET BUTTON
			room_card_btn_element.classList.remove("btn-default");
			room_card_btn_element.classList.add("btn-primary");
			document.getElementById(room_card_btn).innerHTML = "UNSELECT";

			//UPDATE number_of_selected_rooms
			number_of_selected_rooms	=	(number_of_selected_rooms + 1);
			document.getElementById('number_of_selected_rooms').value=number_of_selected_rooms;
			
			}
			}
			document.getElementById("loader_santhus").style.display = "block"; 

			xmlhttp.open("GET",linkx,true);
			xmlhttp.send();
			//AJAX END

				
				
			}
			else
			{
				alert('You are only Allowed to Choose '+number_of_rooms+' Room(s)');
			}
		}
		else
		{
		//MINUS FROM CART


			//AJAX START
			var linkx="ajax_cart_booking.php?cart_ref="+cart_ref+"&room_number="+room_number+"&class_id="+ class_id +"&checking_in_date="+checking_in_date+"&checking_out_date="+checking_out_date+"&action=minus_from_cart";
  
			if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			//LOADER
			document.getElementById("loader_santhus").style.display = "none"; 
 
			//SET BUTTON			
			room_card_btn_element.classList.remove("btn-primary");
			room_card_btn_element.classList.add("btn-default");
			document.getElementById(room_card_btn).innerHTML = "SELECT";

			//UPDATE number_of_selected_rooms
			number_of_selected_rooms	=	(number_of_selected_rooms - 1);
			document.getElementById('number_of_selected_rooms').value=number_of_selected_rooms;
			
			}
			}
			document.getElementById("loader_santhus").style.display = "block"; 

			xmlhttp.open("GET",linkx,true);
			xmlhttp.send();
			//AJAX END

				
			
					
		}
	
	
 	 

	
	}

	</script>
  
  
  
       <script language="javascript">
		function continue_this_booking(){
	
  		var number_of_selected_rooms		= Number(document.getElementById('number_of_selected_rooms').value);
		var number_of_rooms 				= Number(document.getElementById('number_of_rooms').value);
		var cart_ref					 	= document.getElementById('cart_ref').value;		
		
		var class_id			 			= 	document.getElementById('class_id').value;
		var checking_in_date			 	= 	document.getElementById('checking_in_date').value;
		var checking_out_date			 	= 	document.getElementById('checking_out_date').value;
		
		
		if(number_of_selected_rooms == number_of_rooms)
		{
		var link_next ='?cart_ref='+cart_ref+'&checking_in_date='+checking_in_date+'&checking_out_date='+checking_out_date+'&class_id='+class_id+'&number_of_selected_rooms='+number_of_selected_rooms;

		window.location='new_booking_record_page_3.php'+link_next;
		}
		else
		{
				alert('You are Expected to Choose '+number_of_rooms+' Room(s)');
			
		}

	
  
	}
	
	</script>
	
	
	
   <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">





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
 


 <input type="hidden" value="0" id="number_of_selected_rooms" />
 <input type="hidden" value="<?php echo $number_of_rooms; ?>" id="number_of_rooms" />
 <input type="hidden" value="<?php echo $class_id; ?>" id="class_id" />
 <input type="hidden" value="<?php echo $checking_in_date; ?>" id="checking_in_date" />
 <input type="hidden" value="<?php echo $checking_out_date; ?>" id="checking_out_date" />
 <input type="hidden" value="<?php echo $cart_ref; ?>" id="cart_ref" />
 



<br/>

              <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Select from Available Rooms</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
			  
			 
			 
		<div class="row">
		
<?php 
$query_hotel_rooms=mysqli_query($con,"SELECT * FROM hotel_rooms WHERE room_class_id='$class_id' ORDER BY room_number ASC");
while($query_hotel_rooms_x=mysqli_fetch_array($query_hotel_rooms))
{
  $hotel_room_id			=			 clean_output($query_hotel_rooms_x['id']);
  $room_number				=			 clean_output($query_hotel_rooms_x['room_number']); 
  $current_state			=			 clean_output($query_hotel_rooms_x['current_state']); 
  $room_class_id			=			 clean_output($query_hotel_rooms_x['room_class_id']); 
  
  
 $query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$room_class_id'")) or die(mysqli_error($con));
 
  $class_id					=			 clean_output($query_row_room_class['id']);
  $class_name				=			 clean_output($query_row_room_class['class_name']);
  $class_description		=			 clean_output($query_row_room_class['class_description']);
  $weekday_price			=			 clean_output($query_row_room_class['weekday_price']);
  $weekend_price			=			 clean_output($query_row_room_class['weekend_price']); 
  
 


	
$checking1=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings 	WHERE 		checking_in_date	< '$checking_in_date'	AND
																			checking_in_date	< '$checking_out_date'	AND
																			checking_out_date	> '$checking_in_date'	AND
																			checking_out_date	> '$checking_out_date'	AND
																			hotel_room_id		= '$hotel_room_id'		AND
																			cancel_staff		= 'NULL'				 AND
																			checkout_staff		= 'NULL'"));																			
			 

$checking2=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings	 WHERE		checking_in_date	> '$checking_in_date'	AND
																			checking_in_date	< '$checking_out_date'	AND
																			checking_out_date	> '$checking_in_date'	AND
																			checking_out_date	> '$checking_out_date'	AND
																			hotel_room_id		= '$hotel_room_id'		AND
																			cancel_staff		= 'NULL'				AND
																			checkout_staff		= 'NULL'"));

$checking3=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings 	WHERE 		checking_in_date	< '$checking_in_date'	 AND
																			checking_in_date	< '$checking_out_date'	 AND
																			checking_out_date	> '$checking_in_date'	 AND
																			checking_out_date	< '$checking_out_date'	 AND
																			hotel_room_id		= '$hotel_room_id'		 AND
																			cancel_staff		= 'NULL'				 AND
																			checkout_staff		= 'NULL'"));

$checking4=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings 	WHERE 		checking_in_date	> '$checking_in_date'	 AND
																			checking_in_date	< '$checking_out_date'	 AND
																			checking_out_date	> '$checking_in_date'	 AND
																			checking_out_date	< '$checking_out_date'	 AND
																			hotel_room_id		= '$hotel_room_id'		 AND
																			cancel_staff		= 'NULL'				 AND
																			checkout_staff		= 'NULL'"));

$checking5=mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings	

WHERE (checking_in_date =	'$checking_in_date' AND hotel_room_id =	'$hotel_room_id'   AND cancel_staff = 'NULL' AND checkout_staff = 'NULL')
																 OR
		(checking_out_date	= '$checking_out_date' AND hotel_room_id = '$hotel_room_id'   AND cancel_staff = 'NULL' AND checkout_staff = 'NULL')"));





$checking = $checking1 + $checking2  + $checking3 + $checking4 + $checking5; //result should give 0 if all conditions are false



    	if($checking >0)
   		{
    	$button_disabled	=	"disabled";
		$button_value		=	"Occupied";
		$card_color			=	"card-danger";
    	}
    	else
    	{
			if($current_state	==	"out_of_service")
			{
			$button_disabled	=	"disabled";
			$button_value		=	"OUT OF SERVICE";
			$card_color			=	"card-danger";	
			}
			else
			{
			$button_disabled	=	"";
			$button_value		=	"SELECT";
			$card_color			=	"card-primary";
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
                    <p  class="nav-link">
                       Class  <b class="float-right"><?php echo $class_name; ?></b>
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                       Weekday Price <b class="float-right">&#163;<?php echo number_format($weekday_price,2); ?></b>
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                       Weekend Price  <b class="float-right">&#163;<?php echo number_format($weekend_price,2); ?></b>
                    </p>
                  </li>
                  <li class="nav-item">
                    <p class="nav-link">
                      <button type="button" <?php echo $button_disabled; ?>
					  onclick="select_room(this.name);" name="<?php echo $room_number; ?>" id="<?php echo $room_number; ?>" class="btn btn-block btn-default"><?php echo $button_value; ?></button>
                    </p>
                  </li>
                </ul>

              </div>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


<?php } ?>

        </div>
        <!-- /.row -->




 




   

			 </div>
              <!-- /.card-body -->
                 <div class="card-footer ">
                    <button type="button"  onclick="history.go(-1);" class="btn btn-danger">GO BACK</button>
                   <button type="button"  onclick="continue_this_booking();" class="btn btn-success float-right">CONTINUE</button>
                 </div>
                 <!-- /.card-footer -->  
            </div>
            <!-- /.card -->

  
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


  <script>
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>

 