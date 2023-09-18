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
		if((($main_role_x == 'sales_staff') && ($access_sales_record_statistics_x =='1')) || ($main_role_x == 'general_admin'))
		{
		allow_access();
		}
		else
		{
		header("location: index.php?notif_err=Access+Denied");
		}
		
		
?>


<?php


	//GET amount_of_sales_sold_today
	$q_amount_of_sales_sold_today=mysqli_query($con,"SELECT * FROM sales_record");

	$amount_of_sales_sold_today =0;

		while($query_amount_of_sales_sold_today	=	mysqli_fetch_array($q_amount_of_sales_sold_today))
		{
			$var_amount_paid_xx			=			 clean_output($query_amount_of_sales_sold_today['grand_total_amount']);
			$var_date_of_sales_xx		=			 clean_output($query_amount_of_sales_sold_today['date_time']);
 			$var_date_of_sales_xx		= 			 clean_output(date('jS M Y',(int)$var_date_of_sales_xx));
			$var_todays_date			=			 clean_output(date('jS M Y',time()));

					if($var_date_of_sales_xx == $var_todays_date)
					{
 					$amount_of_sales_sold_today			+=			$var_amount_paid_xx;

					}

		}

		$amount_of_sales_sold_today 		=	"&#163;".number_format($amount_of_sales_sold_today);




	//GET amount_of_sales_sold_yesterday
	$q_amount_of_sales_sold_yesterday=mysqli_query($con,"SELECT * FROM sales_record");

	$amount_of_sales_sold_yesterday =0;

		while($query_amount_of_sales_sold_yesterday	=	mysqli_fetch_array($q_amount_of_sales_sold_yesterday))
		{
			$var_amount_paid_xxx			=			 clean_output($query_amount_of_sales_sold_yesterday['grand_total_amount']);
			$var_date_of_sales_xxx			=			 clean_output($query_amount_of_sales_sold_yesterday['date_time']);

			$time_yesterday_x				=			 (time() - 86400);

 			$var_date_of_sales_xxx			= 			 date('jS M Y',(int)$var_date_of_sales_xxx);
			$var_todays_date				=			 date('jS M Y',(int)$time_yesterday_x);

					if($var_date_of_sales_xxx == $var_todays_date)
					{
 					$amount_of_sales_sold_yesterday			+=			$var_amount_paid_xxx;

					}

		}

		$amount_of_sales_sold_yesterday 		=	"&#163;".number_format($amount_of_sales_sold_yesterday);






	//GET amount_of_sales_sold_current_week

		$week_start	= date("Y-m-d", strtotime('monday this week'));

		$week_end	=  date("Y-m-d", strtotime('sunday this week'));

		$week_start	=	strtotime($week_start);

		$week_end	=	strtotime($week_end);


	$q_amount_of_sales_sold_current_week=mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$week_start' AND  date_time <= '$week_end'");


	$amount_of_sales_sold_current_week =0;

		while($query_amount_of_sales_sold_current_week	=	mysqli_fetch_array($q_amount_of_sales_sold_current_week))
		{
			$var_amount_paid_xxxx			=			 clean_output($query_amount_of_sales_sold_current_week['grand_total_amount']);


 					$amount_of_sales_sold_current_week			+=			$var_amount_paid_xxxx;



		}

		$amount_of_sales_sold_current_week 		=	"&#163;".number_format($amount_of_sales_sold_current_week);





	//GET amount_of_sales_sold_current_month

		$month_start	=   date("Y-m-d", strtotime('first day of this month'));

		$month_end		=   date("Y-m-d", strtotime('last day of this month'));

		$month_start	=	strtotime($month_start);

		$month_end		=	strtotime($month_end);



	$q_amount_of_sales_sold_current_month=mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$month_start' AND  date_time <= '$month_end'");

	$amount_of_sales_sold_current_month =0;

		while($query_amount_of_sales_sold_current_month	=	mysqli_fetch_array($q_amount_of_sales_sold_current_month))
		{
			$var_amount_paid_xxxxx			=			 clean_output($query_amount_of_sales_sold_current_month['grand_total_amount']);


 					$amount_of_sales_sold_current_month			+=			$var_amount_paid_xxxxx;



		}

		$amount_of_sales_sold_current_month 		=	"&#163;".number_format($amount_of_sales_sold_current_month);




	//GET amount_of_sales_sold_current_year

		$year_start		=   date('Y-m-d', strtotime('first day of january this year'));

		$year_end		=   date('Y-m-d', strtotime('last day of december this year'));

		$year_start		=	strtotime($year_start);

		$year_end		=	strtotime($year_end);

 	$q_amount_of_sales_sold_current_year=mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$year_start' AND  date_time <= '$year_end'");

	$amount_of_sales_sold_current_year =0;

		while($query_amount_of_sales_sold_current_year	=	mysqli_fetch_array($q_amount_of_sales_sold_current_year))
		{
			$var_amount_paid_xxxxxx			=			 clean_output($query_amount_of_sales_sold_current_year['grand_total_amount']);


 					$amount_of_sales_sold_current_year			+=			$var_amount_paid_xxxxxx;



		}

		$amount_of_sales_sold_current_year 		=	"&#163;".number_format($amount_of_sales_sold_current_year);





//getting bar chat statics value

$year_now = date('Y',time());

$jan_start 	=   strtotime("$year_now-01-01");
$jan_end	=   strtotime(date('t M Y',strtotime("$year_now-01-01")));

$feb_start 	=  strtotime("$year_now-02-01");
$feb_end	=   strtotime(date('t M Y',strtotime("$year_now-02-01")));

$mar_start	=  strtotime("$year_now-03-01");
$mar_end	=   strtotime(date('t M Y',strtotime("$year_now-03-01")));

$apr_start	=  strtotime("$year_now-04-01");
$apr_end	=   strtotime(date('t M Y',strtotime("$year_now-04-01")));

$may_start	=  strtotime("$year_now-05-01");
$may_end	=   strtotime(date('t M Y',strtotime("$year_now-05-01")));

$jun_start	=  strtotime("$year_now-06-01");
$jun_end	=   strtotime(date('t M Y',strtotime("$year_now-06-01")));

$jul_start	=  strtotime("$year_now-07-01");
$jul_end	=  strtotime(date('t M Y',strtotime("$year_now-07-01")));

$aug_start	=  strtotime("$year_now-08-01");
$aug_end	=  strtotime(date('t M Y',strtotime("$year_now-08-01")));

$sep_start	=  strtotime("$year_now-09-01");
$sep_end	=  strtotime(date('t M Y',strtotime("$year_now-09-01")));

$oct_start	=  strtotime("$year_now-10-01");
$oct_end	=  strtotime(date('t M Y',strtotime("$year_now-10-01")));

$nov_start	=  strtotime("$year_now-11-01");
$nov_end	=  strtotime(date('t M Y',strtotime("$year_now-11-01")));

$dec_start	=  strtotime("$year_now-12-01");
$dec_end	=  strtotime(date('t M Y',strtotime("$year_now-12-01")));



$stat_jan = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$jan_start' AND  date_time <= '$jan_end'"));
$stat_feb = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$feb_start' AND  date_time <= '$feb_end'"));
$stat_mar = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$mar_start' AND  date_time <= '$mar_end'"));
$stat_apr = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$apr_start' AND  date_time <= '$apr_end'"));
$stat_may = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$may_start' AND  date_time <= '$may_end'"));
$stat_jun = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$jun_start' AND  date_time <= '$jun_end'"));
$stat_jul = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$jul_start' AND  date_time <= '$jul_end'"));
$stat_aug = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$aug_start' AND  date_time <= '$aug_end'"));
$stat_sep = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$sep_start' AND  date_time <= '$sep_end'"));
$stat_oct = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$oct_start' AND  date_time <= '$oct_end'"));
$stat_nov = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$nov_start' AND  date_time <= '$nov_end'"));
$stat_dec = mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_record WHERE date_time >= '$dec_start' AND  date_time <= '$dec_end'"));



//getting donot chat statics value

$sum_months_vals=$stat_jan + $stat_feb + $stat_mar + $stat_apr + $stat_may + $stat_jun + $stat_jul + $stat_aug + $stat_sep + $stat_oct + $stat_nov + $stat_dec;

	
	if($stat_jan > 0){$donot_jan	=	($stat_jan/$sum_months_vals) * 100;} else {$donot_jan = 1;}
	if($stat_feb > 0){$donot_feb	=	($stat_feb/$sum_months_vals) * 100;} else {$donot_feb = 1;}
	if($stat_mar > 0){$donot_mar	=	($stat_mar/$sum_months_vals) * 100;} else {$donot_mar = 1;}
	if($stat_apr > 0){$donot_apr	=	($stat_apr/$sum_months_vals) * 100;} else {$donot_apr = 1;}
	if($stat_may > 0){$donot_may	=	($stat_may/$sum_months_vals) * 100;} else {$donot_may = 1;}	
	if($stat_jun > 0){$donot_jun	=	($stat_jun/$sum_months_vals) * 100;} else {$donot_jun = 1;}
	if($stat_jul > 0){$donot_jul	=	($stat_jul/$sum_months_vals) * 100;} else {$donot_jul = 1;}
	if($stat_aug > 0){$donot_aug	=	($stat_aug/$sum_months_vals) * 100;} else {$donot_aug = 1;}
	if($stat_sep > 0){$donot_sep	=	($stat_sep/$sum_months_vals) * 100;} else {$donot_sep = 1;}
	if($stat_oct > 0){$donot_oct	=	($stat_oct/$sum_months_vals) * 100;} else {$donot_oct = 1;}
	if($stat_nov > 0){$donot_nov	=	($stat_nov/$sum_months_vals) * 100;} else {$donot_nov = 1;}
	if($stat_dec > 0){$donot_dec	=	($stat_dec/$sum_months_vals) * 100;} else {$donot_dec = 1;}
 	 






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

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="../_source/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  
  
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
	
	</script>	


	<style>
	
	#example1 td { 
	}

	#example1.hide_now tr > *:nth-child(7) {
    display: none;
	}

 
	</style>	 




  
   	<script language="javascript">
	function update_active_link(){
	
	var element_ul = document.getElementById("manage_sales_record");
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
            <h1>Sales Record & Statistics</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Sales Record & Statistics</li>
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

	      <div class="row">

          <div class="col-md-4 col-sm-6 col-12">
		   <a  href="manage_sales_record.php" >
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-tshirt"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number">SHOW ALL</span>
                 <span class="info-box-number">SALES RECORD</span>
              </div>
              <!-- /.info-box-content -->
            </div>
			</a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-4 col-sm-6 col-12">
		   <a href="index.php" >
            <div class="info-box">
              <span class="info-box-icon bg-success"> <i class="fas fa-th"></i></span>

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


          <div class="col-md-4 col-sm-6 col-12">
		   <a href="logout.php" onclick="if (confirm('Are you Sure you want to Log out Now?')){return true;}else{event.stopPropagation(); event.preventDefault();};"  >
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-sign-out-alt"></i></span>

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





	<!-- Loader -->
  <div class="loader loader-default is-active" id="loader_santhus" style=""></div>



		      <!-- Default box -->
      <div class="card collapsed-card card-secondary" id="santhus_card">
         <div class="card-header" data-card-widget="collapse" data-toggle="tooltip" >
          <i class="fas fa-copy"></i> SORT SALES RECORDS

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
                      <th>STAFF</th>
                      <th>START DATE</th>
                      <th>END DATE </th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr>

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
                   <button type="submit" name="sort" value="general_sort" class="btn btn-secondary">Submit</button>
                   <button type="button" data-card-widget="collapse" data-toggle="tooltip" class="btn btn-secondary float-right">Close</button>
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
	 document.getElementById('staff_var').value='$_GET[staff_var]';
	 document.getElementById('start_date').value='$_GET[start_date]';
	 document.getElementById('end_date').value='$_GET[end_date]';

	    var element = document.getElementById('santhus_card');
		element.classList.remove('collapsed-card');

	 </script>
	 ";


	//GET OTHER GET VARS
	$staff_var				=			$_GET["staff_var"];

	$start_date_var			=			$_GET["start_date"];
	$end_date_var			=			$_GET["end_date"];

	$start_date_var			=			strtotime("12:00am $start_date_var");
	$end_date_var			=			strtotime("11:59pm $end_date_var");


	$start_date_txt			=			date('jS M Y',(int)$start_date_var);
	$end_date_txt			=			date('jS M Y',(int)$end_date_var);


	if($staff_var			==	"all_staff")
	{
			$staff_name_txt			=	"All Staffs";

			$sql_line_				=	"date_time >= '$start_date_var' AND  date_time <= '$end_date_var'";

	}
	else
	{


			$query_row_sales_staff	=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$staff_var'")) or die(mysqli_error($con));
			$staff_name_txt		=			clean_output( $query_row_sales_staff['full_name']);

 			$sql_line_			=	"date_time >= '$start_date_var' AND  date_time <= '$end_date_var' AND booking_staff = '$staff_var'";


	}




	$query_sales_record		=    mysqli_query($con,"SELECT * FROM sales_record WHERE  $sql_line_   ORDER BY id DESC") or die(mysql_error($con));

	?>

				<div id="target_html" >
              <div class="card card-secondary" id="result" >
              <div class="card-header">
                <h3 class="card-title">( <?php echo mysqli_num_rows($query_sales_record); ?> ) Sales Records  by <?php echo $staff_name_txt; ?> From <?php echo $start_date_txt; ?> To <?php echo $end_date_txt; ?></h3>

              </div>
              <!-- /.card-header -->


            <div class="card-body table-responsive">



               <table id="example1" class="table table-bordered table-striped" style="height: 265px;">
                  <thead>
					<tr>
					<th>CUSTOMER NAME</th>
					<th>DATE</th>
					<th>AMOUNT</th>
					<th>PAYMENT METHOD</th>
					<th>STAFF</th>
					<th>ORDER</th>
					<th>#</th>
					</tr>
                  </thead>
                  <tbody>


		<?php

		$amount_paid_from_list=0;




while($query_row_sales_record=mysqli_fetch_array($query_sales_record	))
{

  $sales_row_id				=			 clean_output($query_row_sales_record['id']);
  $no_items					=			 clean_output($query_row_sales_record['no_items']);
  $table_sales				=			 $query_row_sales_record['table_sales'];
  
  $grand_total_amount		=			 clean_output($query_row_sales_record['grand_total_amount']);
  $discount_amount			=			 clean_output($query_row_sales_record['discount_amount']);
  $discount_info			=			 clean_output($query_row_sales_record['discount_info']);
  $sub_total_amount			=			 clean_output($query_row_sales_record['sub_total_amount']);
  
  
  $payment_method			=			 clean_output($query_row_sales_record['payment_method']);
  $reciept_no				=			 clean_output($query_row_sales_record['reciept_no']);
  $date_time				=			 clean_output(date('h:i A - jS M Y',(int)$query_row_sales_record['date_time']));
  $reference_no				=			 clean_output($query_row_sales_record['reference_no']);
  $sales_staff				=			 clean_output($query_row_sales_record['sales_staff']);

  $customer_name			=			 clean_output($query_row_sales_record['customer_name']);
  $customer_phonenumber		=			 clean_output($query_row_sales_record['customer_phonenumber']);
  $customer_address			=			 clean_output($query_row_sales_record['customer_address']);
  
  
  if($customer_name =="NULL")
  {
	$customer_name ="<b style=color:red;>NULL</b>"; 
  }
  
  if($customer_phonenumber =="NULL")
  {
	$customer_phonenumber ="<b style=color:red;>NULL</b>"; 
  }

  if($customer_address =="NULL")
  {
	$customer_address ="<b style=color:red;>NULL</b>"; 
  }

  if($reference_no !="NULL")
  {
  $reference_no			=	"Booking #".$reference_no;
  }
  else
  {
  $reference_no			=	"<b style=color:red;>NO BOOKING</b>";
  }


  $query_sales_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$sales_staff'")) or die(mysqli_error($con));
  $sales_staff_name				=			 clean_output($query_sales_staff['full_name']);

  			$amount_paid_from_list			+=			$query_row_sales_record['grand_total_amount'];


?>
					  <tr>
                      <td><?php echo $customer_name; ?></td>
                      <td><?php echo $date_time; ?></td>
                      <td>&#163; <?php echo number_format($grand_total_amount); ?></td>
                      <td><?php echo $payment_method; ?></td>
                      <td><?php echo $sales_staff_name; ?></td>
                      <td>#<?php echo $reciept_no; ?></td>
                      <td>
					  <button



					  data-print_sales_reciept_link="reciept_sales/?sales_row_id=<?php echo $sales_row_id; ?>"
					  data-no_items="(<?php echo $no_items; ?>) Sales Item(s)"
					  data-open_modal_title="Sales Order #<?php echo $reciept_no; ?>"
					  data-open_table_sales="<?php echo $table_sales; ?>"
					  

					  data-open_sub_total_amount="SUBTOTAL: &#163; <?php echo number_format($sub_total_amount); ?>"
					  data-open_discount_amount="DISCOUNT: &#163; <?php echo number_format($discount_amount); ?>"
					  data-open_discount_info="<?php echo $discount_info; ?>"
					  data-open_grand_total_amount="GRAND TOTAL: &#163; <?php echo number_format($grand_total_amount); ?>"
					  
		
					  data-open_grand_total_amount_2="<?php echo "&#163; ". number_format($grand_total_amount); ?> &nbsp; &nbsp; [<?php echo $payment_method; ?>]"



					  data-open_date_time="<?php echo $date_time; ?>"
					  data-open_reference_no="<?php echo $reference_no; ?>"
					  data-open_sales_staff_name="<?php echo $sales_staff_name; ?>"

					  data-open_customer_name="<?php echo $customer_name; ?>"
					  data-open_customer_phonenumber="<?php echo $customer_phonenumber; ?>"
					  data-open_customer_address="<?php echo $customer_address; ?>"


					  data-toggle='modal' data-target='#modal-open'
					  type="button" class="open-ViewDialog btn btn-sm btn-success">
					  <i class="fas fa-eye"></i></button>
					  
					  
					<button  
					data-sales_row_id='<?php echo $sales_row_id; ?>' 
					data-toggle='modal' 
					data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>					  
					  </td>
                      </tr>
<?php } ?>



<?php if((mysqli_num_rows($query_sales_record))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>


                  </tbody>
                 </table>

 <?php   	$amount_paid_from_list		=		"&#163;".number_format($amount_paid_from_list);

 			echo"<br/>
			<div class='callout callout-info'>
			<h4> Total: <span style='width:150px; text-align:left' class='badge bg-info float-right'>
			<b>$amount_paid_from_list</b></span>
			</h4>
			</div>";
 ?>


              </div>
              <!-- /.card-body -->



				<div class="card-footer" id="functional_buttons_div">
                   <button type="button"  id="export_data_btn" class="btn btn-secondary">EXPORT DATA</button>
                   <button type="button" onclick="window.location='manage_sales_record_statistics.php';"  class="btn btn-secondary float-right">BACK</button>
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
                  Bar Chart For Sales Records Per Month [ <script>document.write(new Date().getFullYear());</script> ]
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
                  Donut Chart For Sales Records Per Month [ <script>document.write(new Date().getFullYear());</script> ]
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


     <h3 class="card-title"> <i class="far fa-chart-bar"></i>&nbsp; CURRENT SALES REPORT</h3><br/>
		  				<hr>

     <h4> Today <span style="width:150px; text-align:left" class="badge bg-info float-right">
	 <?php echo $amount_of_sales_sold_today; ?> </span>
	 </h4>
	 <hr>

     <h4> Yesterday <span  style="width:150px; text-align:left" class="badge bg-info float-right">
	 <?php echo $amount_of_sales_sold_yesterday; ?></span>
	 </h4>
	 <hr>

     <h4> Current Week   <span  style="width:150px; text-align:left" class="badge bg-info float-right">
	 <?php echo $amount_of_sales_sold_current_week; ?> </span>
	 </h4>
	 <hr>

     <h4> Current Month  <span  style="width:150px; text-align:left"  class="badge bg-info float-right">
	 <?php echo $amount_of_sales_sold_current_month; ?> </span>
	 </h4>
	 <hr>

      <h4>Current Year  <span  style="width:150px; text-align:left"  class="badge bg-info float-right">
	  <?php echo $amount_of_sales_sold_current_year; ?></span>
	  </h4>
				<hr>

              </div>







	          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->
	<?php } ?>




















    <div class="modal fade" id="modal-open">
    <div class="modal-dialog modal-xl">

          <div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title" id="open_modal_title" > <!-- Modal Title --> </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
				</button>
				</div>
            <div class="modal-body"  >





            <div class="row">

            <div class="col-md-3">


<div class="card card-secondary card-outline card-tabs" >
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tab_order_info-tab" data-toggle="pill" href="#tab_order_info" role="tab" aria-controls="tab_order_info" aria-selected="true">Order Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab_billing-tab" data-toggle="pill" href="#tab_billing" role="tab" aria-controls="tab_billing" aria-selected="false">Billing</a>
                  </li>

                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade active show" id="tab_order_info" role="tabpanel" aria-labelledby="tab_order_info-tab">

			<table class="small table table-head-fixed text-wrap">
			<tbody>

			<tr title="Total Amount and Method of Payment">
			<td><b><i class="fas fa-money-check-alt"></i></b></td>
			<td id="open_grand_total_amount_2"></td>
			</tr>


			<tr title="Sales Staff">
			<td><b><i class="fas fa-user-shield"></i></b></td>
			<td id="open_sales_staff_name"> </td>
			</tr>

			<tr title="Time of Sales">
			<td><i class="far fa-clock"></i></td>
			<td id="open_date_time"> </td>
			</tr>

			</tbody>
			</table>
	
                  </div>
                  <div class="tab-pane fade" id="tab_billing" role="tabpanel" aria-labelledby="tab_billing-tab">

 				<div class="form-group">
				<div class="input-group input-group">
				<input value="" title="" disabled type="text" class="form-control form-control-sm" id="open_sub_total_amount" />
                </div>
				</div>
				  
 				<div class="form-group">
				<div class="input-group input-group">
				<input value="" title=""  disabled type="text" class="form-control form-control-sm" id="open_discount_amount" />
                </div>
				</div>


 				<div class="form-group">
				<div class="input-group input-group">
				<input  value="" title="" disabled type="text" class="form-control form-control-sm" id="open_grand_total_amount" />
                </div>
				</div>


				
                  </div>
				<a href="" id="print_sales_reciept" target="_blank"   class="btn-sm btn btn-default btn-flat btn-block"> <b class="text-primary">PRINT RECIEPT</b> </a>

                </div>
              </div>
              <!-- /.card -->
            </div>
			
	


            <div class="card card-secondary card-outline" style="" >
            <div class="card-header"> <h3 class="card-title">Customer Information</h3> </div> <!-- /.card-header -->

            <div class="card-body table-responsive p-0" style=" ">
			<table class="small table table-head-fixed text-wrap">
			<tbody>

			<tr title="Customer Name">
			<td><i class='fas fa-user-alt'></i></td>
			<td id="open_customer_name"> </td>
			</tr>

			<tr  title="Customer Phone Number">
			<td><i class='fas fa-phone-alt'></i> </td>
			<td  id="open_customer_phonenumber"> </td>
			</tr>


			<tr title="Customer Address" >
			<td><i class='fas fa-map-marker-alt'></i> </td>
			<td id="open_customer_address"> </td>
			</tr>

 			<tr title="Booking Reference ">
			<td><i class="far fa-copy"></i></td>
			<td id="open_reference_no"> </td>
			</tr>

			</tbody>
			</table>




            </div> <!-- /.card-body -->

            </div> <!-- /.card -->


            </div> <!-- /.col-md-3 -->


            <div class="col-md-9">

            <div class="card card-secondary" style="height:500px;" >
            <div class="card-header"> <h3 class="card-title" id="open_no_items">Items</h3> </div> <!-- /.card-header -->

            <div class="card-body table-responsive p-0" style="height: 350px;">
			<table class="table table-head-fixed text-nowrap">
            <thead>
			<tr>
			<th>QTY</th>
			<th>ITEM</th>
			<th>CATEGORY</th>
			<th>PRICE</th>
			<th>AMOUNT</th>
			</tr>
			</thead>
			<tbody id="open_table_sales">
			</tbody>
			</table><hr/>




            </div> <!-- /.card-body -->

            </div> <!-- /.card -->

			</div><!-- /.col-md-9 -->



			</div><!-- /.row -->





        </div> <!-- /.modal-body -->



        </div><!-- /.modal-content -->

      </div><!-- /.modal-dialog -->

	</div><!-- /.modal -->


























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
		   <a   id="btn_print_data"  href="javascript:printpage();" >
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
              <h4 class="modal-title"  >Delete Sales Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form action="" method="POST">
            <div class="modal-body">


			<input type="hidden" name="sales_row_id" id="sales_row_id_2"/>



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

 $(function(){
   $(".open-ViewDialog").click(function(){

		$("#print_sales_reciept").attr("href", $(this).data('print_sales_reciept_link'));
        $('#open_table_sales').html($(this).data('open_table_sales'));

        $('#open_grand_total_amount_2').html($(this).data('open_grand_total_amount_2'));
		

		
		$('#open_sub_total_amount').val($(this).data('open_sub_total_amount'));
		$('#open_discount_amount').val($(this).data('open_discount_amount'));
		$("#open_discount_amount").attr("title", $(this).data('open_discount_info'));
		$('#open_grand_total_amount').val($(this).data('open_grand_total_amount'));
		
		
		
        $('#open_sales_staff_name').html($(this).data('open_sales_staff_name'));
        $('#open_date_time').html($(this).data('open_date_time'));

        $('#open_customer_name').html($(this).data('open_customer_name'));

        $('#open_no_items').html($(this).data('no_items'));

        $('#open_customer_phonenumber').html($(this).data('open_customer_phonenumber'));
        $('#open_customer_address').html($(this).data('open_customer_address'));
        $('#open_reference_no').html($(this).data('open_reference_no'));

        $('#open_modal_title').html($(this).data('open_modal_title'));


   });
});

</script>


	<script type="text/javascript">
	$(function(){
		$(".open-DeleteDialog").click(function(){
		$('#sales_row_id_2').val($(this).data('sales_row_id'));
 
		});
	});

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
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>




<?php
if(isset($_POST["delete"]))
{

  $sales_row_id								=			clean_input($_POST["sales_row_id"]);
  $pin										=			clean_input($_POST["pin"]);
  
    $_current_page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


  if($pin == $administrative_pin)
  {
	mysqli_query($con,"DELETE FROM sales_record WHERE id='$sales_row_id'") or die(mysqli_error($con));
	header("location: $_current_page&notif=Sales+Record+has+been+Deleted#notif_info");
  }
  else
  {
   header("location: $_current_page&notif_err=Incorrect+Administrative+Pin#notif_info");

  }


 

}

?>
