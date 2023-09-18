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

		//validates user 
		if(($main_role_x == 'sales_staff') || ($main_role_x == 'general_admin'))
		{
		allow_access();
		}
		else
		{
		header("location: index.php?notif_err=Access+Denied");
		}
		

//FUNCTION THAT CHECKS sales_cart LIST AND DELETE TO SAVE DISC SPACE

	$number_of_data_limit		=	200; //must be a number divisible by 2
	$number_of_data_to_delete	=	($number_of_data_limit/2);
	$no_sales_cart				=		mysqli_num_rows(mysqli_query($con,"SELECT * FROM sales_cart"));
	if($no_sales_cart > $number_of_data_limit)
	{
		mysqli_query($con,"DELETE FROM sales_cart ORDER BY id ASC LIMIT $number_of_data_to_delete");
		
		
	}
	
//FUNCTION THAT GENERATES RANDOM NUMBER USING TIME & RAND FOR 7 NUMBERS
 
 		$new_rand		=	time().rand(1000,9000);
		$new_rand		=	substr($new_rand, 7);
		


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
function add_cart(item_id){

 document.getElementById(item_id).stepUp();

 var order_qty			= Number(document.getElementById(item_id).value);

 var item_name			= document.getElementById("item_name_"+item_id).value;

 var category_name		= document.getElementById("category_name_"+item_id).value;

 var reciept_no			= document.getElementById("reciept_no").value;


 var order_price = Number(document.getElementById("price_"+item_id).value);

 var no_items = Number(document.getElementById("no_items").value);

 var sub_total_amount = Number(document.getElementById("sub_total_amount").value);

 var new_sub_total_amount  = (sub_total_amount + order_price);

 var new_no_items  = (no_items + 1);

 var sub_total_amount_show = new_sub_total_amount.toLocaleString();

 document.getElementById("sub_total_amount").value = new_sub_total_amount;
 document.getElementById("no_items").value = new_no_items;
 document.getElementById("sub_total_amount_show").value = ("SUBTOTAL: £"+sub_total_amount_show);
 document.getElementById("sub_total_amount_show_2").value = ("GRAND TOTAL: £"+sub_total_amount_show);



 var xub_price = Number(document.getElementById("xub_price_"+item_id).value);

 var sub_price		=	 (xub_price + order_price);

	 sub_price 		= 	sub_price.toLocaleString();

 document.getElementById("sub_price_"+item_id).innerHTML=("&#163;"+sub_price);
 document.getElementById("xub_price_"+item_id).value=(xub_price + order_price);




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
		document.getElementById("loader_santhus").style.display = "none"; 

     }
  }

document.getElementById("loader_santhus").style.display = "block"; 

var linkx = "ajax_sales_form.php?qty="+order_qty+"&item_name="+item_name+"&item_cat="+category_name+"&item_price="+order_price+"&reciept_no="+reciept_no;
xmlhttp.open("GET",linkx,true);
xmlhttp.send();


}

</script>




<script language="javascript">
function minus_cart(item_id){

	var order_qty	 = Number(document.getElementById(item_id).value);

	var item_name			= document.getElementById("item_name_"+item_id).value;

	var category_name		= document.getElementById("category_name_"+item_id).value;

	var reciept_no			= document.getElementById("reciept_no").value;

	var order_price = Number(document.getElementById("price_"+item_id).value);

	var sub_total_amount = Number(document.getElementById("sub_total_amount").value);

	var no_items = Number(document.getElementById("no_items").value);


   if(order_qty > 0){

	    var new_sub_total_amount = (sub_total_amount - order_price);

		var sub_total_amount_show = new_sub_total_amount.toLocaleString();

		document.getElementById("sub_total_amount").value = new_sub_total_amount;
		document.getElementById("sub_total_amount_show").value = ("SUBTOTAL: £"+sub_total_amount_show);
		document.getElementById("sub_total_amount_show_2").value = ("GRAND TOTAL: £"+sub_total_amount_show);

		var new_no_items  = (no_items - 1);
		document.getElementById("no_items").value = new_no_items;

		document.getElementById(item_id).stepDown();



		var xub_price = Number(document.getElementById("xub_price_"+item_id).value);

		var sub_price		=	 (xub_price - order_price);

		sub_price 		= 	sub_price.toLocaleString();

		document.getElementById("sub_price_"+item_id).innerHTML=("&#163;"+sub_price);
		document.getElementById("xub_price_"+item_id).value=(xub_price - order_price);


   }




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
		document.getElementById("loader_santhus").style.display = "none"; 

     }
	}

   	var qty_x	 = Number(document.getElementById(item_id).value);

	document.getElementById("loader_santhus").style.display = "block"; 
	
	var linkx="ajax_sales_form.php?qty="+qty_x+"&item_name="+item_name+"&item_cat="+category_name+"&item_price="+order_price+"&reciept_no="+reciept_no;

	xmlhttp.open("GET",linkx,true);
	xmlhttp.send();



}

</script>









<script language="javascript">
function confirm_sales() {


	var sub_total_amount = Number(document.getElementById("sub_total_amount").value);
	var reciept_no  = document.getElementById("reciept_no").value;

	if(sub_total_amount==0){
	alert('Error: Please Select Sales Item');
	}
	else
	{

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("loader_santhus").style.display = "none"; 
		document.getElementById("sales_card").style.display = "none";
        document.getElementById("sales_confirm_card").innerHTML=xmlhttp.responseText;

     }
  }
  
  document.getElementById("loader_santhus").style.display = "block"; 
  xmlhttp.open("GET","ajax_confirm_sales.php?sub_total_amount="+sub_total_amount+"&reciept_no="+reciept_no,true);
  xmlhttp.send();
}

}

</script>



<script language="javascript">
function back_to_card_sales(){

		document.getElementById("sales_card").style.display = "block";
        document.getElementById("sales_confirm_card").innerHTML="";


}
</script>




<script language="javascript">
function set_data_table_sales(){

         var table_sales = document.getElementById("table_sales").innerHTML;
		 document.getElementById("table_sales_input").value=table_sales;


}
</script>




<script language="javascript">

function set_discount_func(sales_discount_id){

	var sub_total_amount = Number(document.getElementById("sub_total_amount").value);

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("loader_santhus").style.display = "none"; 
		 
        document.getElementById("sales_discount_card").innerHTML=xmlhttp.responseText;
 
     }
  }
  
  document.getElementById("loader_santhus").style.display = "block"; 
  xmlhttp.open("GET","ajax_set_discount_sales.php?sales_discount_id="+sales_discount_id+"&sub_total_amount="+sub_total_amount,true);
  xmlhttp.send();
  
  
}

</script>







<script language="javascript">

function set_customer_info(booking_id){

 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("loader_santhus").style.display = "none"; 
		 
        document.getElementById("customer_info_x").innerHTML=xmlhttp.responseText;
 
     }
  }
  
  document.getElementById("loader_santhus").style.display = "block"; 
  xmlhttp.open("GET","ajax_set_sales_customer_info.php?booking_id="+booking_id,true);
  xmlhttp.send();
  
  
}

</script>



<style>

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

input[type=number] {
  -moz-appearance: textfield;
}

</style>


 



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
            <h1>Manage Sales Record</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Sales Record</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


		<div id="included_divs">


	      <div class="row">
		  
          <div class="col-md-4 col-sm-6 col-12">
		   <a  data-toggle='modal' data-target='#modal-new'  href="#" >
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-plus-square"></i></span>

              <div class="info-box-content">
                 <span class="info-box-number">NEW SALES</span>
                 <span class="info-box-number">ORDER</span>
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



      <div class="row">
        <div class="col-12">

          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">ALL SALES </h3>

              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
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

$query_sales_record		=    mysqli_query($con,"SELECT * FROM sales_record  order by id DESC") or die(mysqli_error($con));

while($query_row_sales_record=mysqli_fetch_array($query_sales_record))
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
  $booking_ref				=			 clean_output($query_row_sales_record['booking_ref']);
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

  if($booking_ref !="NULL")
  {
  $booking_ref			=	$booking_ref;
  }
  else
  {
  $booking_ref			=	"<b style=color:red;>NO BOOKING</b>";
  }


  $query_sales_staff=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM staff WHERE email_address='$sales_staff'")) or die(mysqli_error($con));
  $sales_staff_name				=			 clean_output($query_sales_staff['full_name']);


?> 
					  <tr>
                      <td><?php echo $customer_name; ?></td>
                      <td><?php echo $date_time; ?></td>
                      <td>&#163; <?php echo number_format($grand_total_amount,2); ?></td>
                      <td><?php echo $payment_method; ?></td>
                      <td><?php echo $sales_staff_name; ?></td>
                      <td>#<?php echo $reciept_no; ?></td>
                      <td>
					  <button



					  data-print_sales_reciept_link="reciept_sales/?sales_row_id=<?php echo $sales_row_id; ?>"
					  data-no_items="(<?php echo $no_items; ?>) Sales Item(s)"
					  data-open_modal_title="Sales Order #<?php echo $reciept_no; ?>"
					  data-open_table_sales="<?php echo $table_sales; ?>"
					  

					  data-open_sub_total_amount="SUBTOTAL: &#163; <?php echo number_format($sub_total_amount,2); ?>"
					  data-open_discount_amount="DISCOUNT: &#163; <?php echo number_format($discount_amount,2); ?>"
					  data-open_discount_info="<?php echo $discount_info; ?>"
					  data-open_grand_total_amount="GRAND TOTAL: &#163; <?php echo number_format($grand_total_amount,2); ?>"
					  
		
					  data-open_grand_total_amount_2="<?php echo "&#163; ". number_format($grand_total_amount,2); ?> &nbsp; &nbsp; [<?php echo $payment_method; ?>]"



					  data-open_date_time="<?php echo $date_time; ?>"
					  data-open_booking_ref="<?php echo $booking_ref; ?>"
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


                <tfoot>
                <tr>
                  <th>CUSTOMER NAME</th>
                  <th>DATE</th>
                  <th>AMOUNT</th>
                  <th>PAYMENT METHOD</th>
                  <th>STAFF</th>
                  <th>ORDER</th>
                  <th>#</th>
                </tr>
                </tfoot>

              </table>
			  </div>  <!-- /.card-body -->
			   		<div class="card-footer" id="functional_buttons_div">
                   <button type="button" onclick="javascript:history.go(-1);"  class="btn btn-secondary float-right">BACK</button>
                 </div> 
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->













    <div class="modal fade" id="modal-new">
    <div class="modal-dialog modal-xl">

          <div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title"  >Add New Order</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
				</button>
				</div>
            <div class="modal-body"  >

			<?php 	if($browser=='mobile') { ?>
						
			<div class='alert alert-danger alert-dismissible'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<i class='fas fa-exclamation-circle'></i> Unfortunately, New Sales Record is restricted on Mobile Device 
			</div>
		
			<?php } else { ?>
			<form  method="POST"  >
			<input type="hidden" name="reciept_no" id="reciept_no" value="<?php echo $new_rand; ?>">

			<div id="sales_confirm_card">
			</div>
			


			<div id="sales_card">
            <div class="row">
            <div class="col-md-3">
            <div class="card card-secondary" style="height:530px;">
            <div class="card-header"> <h3 class="card-title">Billing</h3> </div> <!-- /.card-header -->

            <div class="card-body">


			<hr/>

            <input value="0" id="sub_total_amount"   type="hidden" class="form-control">
			<input type="hidden" name="no_items" id="no_items" value="0" class="form-control"/>
 
                <div class="form-group">
                <input  value="SUBTOTAL: £0" id="sub_total_amount_show" disabled type="text" class="form-control form-control-sm">
				</div>		

               <div class="form-group">
                  <input value="GRAND TOTAL: £0" id="sub_total_amount_show_2" disabled type="text" class="form-control form-control-sm">
				</div>

 			
			<hr/>


            <div class="form-group">
			<button type="button" onclick="confirm_sales();" class="btn-sm btn btn-block btn-info btn-flat">CONFIRM</button>
			</div>
			<div class="form-group">
			<button type="button" onclick="window.location.reload();" class="btn-sm btn btn-block btn-info btn-flat">CANCEL</button>
			</div>


            </div> <!-- /.card-body -->
            </div> <!-- /.card -->

            </div>


            <div class="col-md-9">

			<div class="card card-secondary" style="">
            <div class="card-header"> <h3 class="card-title">Items</h3> </div> <!-- /.card-header -->
            <div class="card-body table-responsive">

            <table  id="example2"  class="table table-bordered table-striped">
			
 
            <thead>
            <tr>
            <th>QTY</th>
            <th>ITEM</th>
            <th>CATEGORY</th>
            <th>PRICE</th>
            <th>AMOUNT</th>
			</tr>
            </thead>
            <tbody>

						<?php
						$query_sales_menu=mysqli_query($con,"SELECT * FROM sales_menu order by category_id DESC");
						while($row_query_sales_menu=mysqli_fetch_array($query_sales_menu))
						{
						$item_id				=		clean_output($row_query_sales_menu["id"]);
						$item_name				=	    clean_output($row_query_sales_menu['item']);
						$price					=	    clean_output($row_query_sales_menu['price']);
						$category_id			=	    clean_output($row_query_sales_menu['category_id']);


						$query_sales_menu_categories = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM sales_menu_categories WHERE id='$category_id'"));
						$category_name			=			clean_output(ucwords($query_sales_menu_categories["category_name"]));
 
						?>



				<tr>
                <td>

				<div class="input-group">

                <div class="input-group-prepend">
                <span class="input-group-append">
				<button onclick="add_cart('<?php echo $item_id; ?>');" type="button" class="btn btn-success btn-flat"> <i class="fas fa-plus"></i></button>
                </span>
                </div>

                <input onchange="" disabled style="width:5px;" min="0" id="<?php echo $item_id; ?>" value="0" type="number" class="form-control">
                <div class="input-group-append">
                <span class="input-group-append">
                <button   onclick="minus_cart('<?php echo $item_id; ?>');" type="button" class="btn btn-danger btn-flat"> <i class="fas fa-minus"></i></button>
                </span>
                </div>
				</div>

				</td>

                <td>
				<?php echo $item_name; ?>
				<input type="hidden" name="item_name" id="item_name_<?php echo $item_id; ?>" value="<?php echo $item_name; ?>" />
				</td>

                <td>
				<?php echo $category_name; ?>
				<input type="hidden" name="category_name" id="category_name_<?php echo $item_id; ?>" value="<?php echo $category_name; ?>" />
				</td>

                <td>
				&#163; <?php echo number_format($price,2); ?>
				<input type="hidden" value="<?php echo $price; ?>" id="price_<?php echo $item_id; ?>">
				</td>

                <td>
				<p id="sub_price_<?php echo $item_id; ?>">&#163;0 </p>
				<input type="hidden" value="0" id="xub_price_<?php echo $item_id; ?>">
				</td>

                </tr>

				<?php }	  ?>


                </tbody>
                </table><hr/>




            </div> <!-- /.card-body -->
            </div> <!-- /.card -->





            </div> <!-- /.col-md-9 -->

            </div><!-- /.row -->

		</div><!-- /.sales_card -->
		</form>



			<?php } ?>
 

        </div> <!-- /.modal-body -->



        </div><!-- /.modal-content -->

      </div><!-- /.modal-dialog -->

	</div><!-- /.modal -->






























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
			<td id="open_booking_ref"> </td>
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
	  "pageLength": 4,
    });
  });
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
        $('#open_booking_ref').html($(this).data('open_booking_ref'));

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

  
  
  
  
  <script>
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>




<?php

	if(isset($_POST["add_new_sales"])){


	$no_items					=		clean_input($_POST["no_items"]);
	$table_sales				=		clean_input($_POST["table_sales"]);
 	$payment_method				=		clean_input($_POST["payment_method"]);
	$reciept_no					=		clean_input($_POST["reciept_no"]);
	$date_time					=		clean_input($_POST["date_time"]);
	$sales_staff				=		clean_input($_POST["sales_staff"]);
 	$booking_ref				=		clean_input($_POST["booking_ref"]);
	
 	$sub_total_amount			=		clean_input($_POST["sub_total_amount"]);

 	$discount_amount			=		clean_input($_POST["discount_amount"]);
 	$grand_total_amount			=		clean_input($_POST["grand_total_amount"]);
 	$discount_info				=		clean_input($_POST["discount_info"]);
	

 	$customer_name				=		clean_input($_POST["customer_name"]);
 	$customer_phonenumber		=		clean_input($_POST["customer_phonenumber"]);
 	$customer_address			=		clean_input($_POST["customer_address"]);


	if($sub_total_amount == 0)
	{
	header("location: ?notif_err=Invalid+Sales+Record!");
	}
	else
	{
  mysqli_query($con,"INSERT INTO sales_record SET		table_sales					=	'$table_sales',
  
														sub_total_amount			=	'$sub_total_amount',
														discount_amount				=	'$discount_amount',
														grand_total_amount			=	'$grand_total_amount',
														discount_info				=	'$discount_info',
														
														no_items					=	'$no_items',
														payment_method				=	'$payment_method',
														reciept_no					=	'$reciept_no',
														date_time					=	'$date_time',
														
														customer_name				=	'$customer_name',
														customer_phonenumber		=	'$customer_phonenumber',
														customer_address			=	'$customer_address',
														
														booking_ref					=	'$booking_ref',
														sales_staff					=	'$sales_staff'") or die(mysqli_error($con));


			header("location: ?notif=Sales+Record+Saved!");

	}


 }

 ?>




<?php
if(isset($_POST["delete"]))
{

  $sales_row_id								=			clean_input($_POST["sales_row_id"]);
  $pin										=			clean_input($_POST["pin"]);
  
  
  if($pin == $administrative_pin)
  {
	mysqli_query($con,"DELETE FROM sales_record WHERE id='$sales_row_id'") or die(mysqli_error($con));
	header("location: ?notif=Sales+Record+has+been+Deleted");
  }
  else
  {
   header("location: ?notif_err=Incorrect+Administrative+Pin");

  }


 

}

?>
