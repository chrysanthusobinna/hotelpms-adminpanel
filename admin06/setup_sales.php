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
            <h1>Sales Setup</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Sales Setup</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">




 


  
  
  
  <?php $query_sales_discount_sql=mysqli_query($con,"SELECT * FROM sales_discount ORDER BY id DESC") or die(mysqli_error($con)); ?>

  
           <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-cog"></i> &nbsp; All Sales Discounts  ( <b><?php echo  mysqli_num_rows($query_sales_discount_sql); ?> </b> ) </h3>
                <div class="card-tools">

                  <div class="input-group input-group-sm" >

                    <div class="input-group-append">
                      <button  data-toggle='modal' data-target='#modal-new'  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
					  ADD NEW DISCOUNT</button>
                    </div>
                  </div>

				</div>
              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                       <th>DISCOUNT NAME </th>
                      <th>PERCENTAGE(%) </th>
                      <th>STATUS </th>
                      <th style="width:10%;">#</th>
                    </tr>
                  </thead>

                  <tbody>



<?php


while($query_sales_discount=mysqli_fetch_array($query_sales_discount_sql))
{
  $sales_discount_id			=			 clean_output($query_sales_discount['id']);
  $sales_discount_name		=			 clean_output($query_sales_discount['sales_discount_name']);
  $sales_discount_percentage	=			 clean_output($query_sales_discount['sales_discount_percentage']);
  $sales_discount_status		=			 clean_output($query_sales_discount['sales_discount_status']);

  if($sales_discount_status		==	"1")
  {
	$sales_discount_status_txt	=	"ACTIVE";
  }
  elseif($sales_discount_status	==	"0")
  {
	$sales_discount_status_txt	=	"DISABLE";	  
  } 
  

?>
					  <tr>
                      <td><?php echo $sales_discount_name; ?></td>
                       <td>- % <?php echo $sales_discount_percentage; ?></td>
                      <td><?php echo $sales_discount_status_txt; ?></td>
 					  <td>

                      <button
					  data-sales_discount_id='<?php echo $sales_discount_id; ?>'
					  data-sales_discount_name='<?php echo $sales_discount_name; ?>'
					  data-sales_discount_percentage='<?php echo $sales_discount_percentage; ?>'
					  data-sales_discount_status='<?php echo $sales_discount_status; ?>'
					  data-toggle='modal' data-target='#modal-edit' type="button"  class="btn-sm open-EditDialog btn btn-success"><i class="fas fa-edit"></i></button>

                      <button 
					  data-sales_discount_id_2='<?php echo $sales_discount_id; ?>'
					  data-sales_discount_name_2='<?php echo $sales_discount_name; ?>'
					  data-sales_discount_percentage_2='<?php echo $sales_discount_percentage; ?>'
					  data-toggle='modal' data-target='#modal-delete'  type="button"  class="btn-sm open-DeleteDialog btn btn-danger"><i class="fas fa-trash"></i></button>



					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($query_sales_discount_sql))==0){ ?>

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
                      <th>DISCOUNT NAME </th>
                      <th>PERCENTAGE(%)</th>
                      <th>STATUS </th>
                      <th style="width:10%;">#</th>
                </tr>
                </tfoot>

              </table>            </div>
            <!-- /.card-body --> 
          </div>
          <!-- /.card -->

  
  
   <hr/>
<center>
 <button type="button" onclick="javascript:history.go(-1);" class="btn btn-secondary">BACK</button>
</center>
<br/>
<br/>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

      <div class="modal fade" id="modal-new">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Sales Discount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Discount Name</b></td>
                      <td><input required  type="text"  name="sales_discount_name"   class="form-control"> </td>
                    </tr>
                      <tr>
                      <td><b>Percentage (%)</b></td>
                      <td><input required  type="number"   name="sales_discount_percentage"   class="form-control"> </td>
                    </tr>
					<tr>
                      <td><b>STATUS</b></td>
                      <td>
						<select name="sales_discount_status" required class="form-control" >
						<option value="1">ACTIVE</option>
						<option value="0">DISABLE</option>
						</select>
					  </td>
                    </tr>
					</tbody>
					</table>
					



            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="add_new_sales_discount"  class="btn btn-primary">Submit</button>
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
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Edit Sales Discount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


				<input type="hidden" name="sales_discount_id" id="sales_discount_id"/>

         <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Discount Name</b></td>
                      <td><input required  type="text"  name="sales_discount_name" id="sales_discount_name"  class="form-control"> </td>
                    </tr>
                      <tr>
                      <td><b>Percentage (%)</b></td>
                      <td><input required  type="number"   name="sales_discount_percentage" id="sales_discount_percentage"  class="form-control"> </td>
                    </tr>
					<tr>
                      <td><b>Status</b></td>
                      <td>
						<select name="sales_discount_status" id="sales_discount_status"  required class="form-control" >
						<option value="1">ACTIVE</option>
						<option value="0">DISABLE</option>
						</select>
					  </td>
                    </tr>
					</tbody>
					</table>
					


            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="edit_sales_discount"  class="btn btn-primary">Submit</button>
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
              <h4 class="modal-title"  >Delete Sales Discount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to Delete Sales Discount  "<b id="sales_discount_name_2"></b>" ?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="sales_discount_id" id="sales_discount_id_2"/>
                   <button type="submit" name="delete"  class="btn btn-primary">YES</button>
				   </form>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">NO</button>
           </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

 		  
         </div>
 

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
	   
      $('#sales_discount_id').val($(this).data('sales_discount_id'));
      $('#sales_discount_name').val($(this).data('sales_discount_name'));

	  $("#sales_discount_percentage").val($(this).data('sales_discount_percentage'));
	  $("#sales_discount_status").val($(this).data('sales_discount_status'));

   });
});

</script>


  <script>
 $(function(){
   $(".open-DeleteDialog").click(function(){
      $('#sales_discount_id_2').val($(this).data('sales_discount_id_2'));
	  $("#sales_discount_name_2").html($(this).data('sales_discount_name_2'));

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

if(isset($_POST["add_new_sales_discount"]))
{


  $sales_discount_name					=			clean_input(ucwords($_POST['sales_discount_name']));
  $sales_discount_percentage				=			clean_input($_POST['sales_discount_percentage']);
  $sales_discount_status					=			clean_input($_POST['sales_discount_status']);
 


  $check_discount_name	=	mysqli_query($con,"SELECT * FROM sales_discount WHERE sales_discount_name='$sales_discount_name'");

 if(mysqli_num_rows($check_discount_name)>0){  	header("location: ?notif_err=Dicount+Name+Exist!");  exit(); }



  mysqli_query($con,"INSERT INTO sales_discount SET		sales_discount_name				=			'$sales_discount_name',
															sales_discount_percentage			=			'$sales_discount_percentage',
															sales_discount_status				=			'$sales_discount_status'");



	header("location: ?notif=New+Sales+Dicount+Added!");

}

?>




<?php

if(isset($_POST["edit_sales_discount"]))
{


  $sales_discount_id						=			clean_input(ucwords($_POST['sales_discount_id']));
  $sales_discount_name					=			clean_input(ucwords($_POST['sales_discount_name']));
  $sales_discount_percentage				=			clean_input($_POST['sales_discount_percentage']);
  $sales_discount_status					=			clean_input($_POST['sales_discount_status']);
 
  
  $check_discount_name	=	mysqli_query($con,"SELECT * FROM sales_discount WHERE sales_discount_name='$sales_discount_name'");

 if(mysqli_num_rows($check_discount_name)>1){  		header("location: ?notif_err=Dicount+Name+Exist!");  exit(); }



  mysqli_query($con,"UPDATE sales_discount SET sales_discount_name			=			'$sales_discount_name',
												 sales_discount_percentage	=			'$sales_discount_percentage',
												sales_discount_status			=			'$sales_discount_status' WHERE id='$sales_discount_id'");



	header("location: ?notif=Sales+Dicount+Updated!");

}

?>


 





<?php
if(isset($_POST["delete"]))
{

  $sales_discount_id						=			clean_input($_POST["sales_discount_id"]);

  mysqli_query($con,"DELETE FROM sales_discount WHERE id='$sales_discount_id'") or die(mysqli_error($con));


 header("location: ?notif=Sales+Discount+has+been+Deleted");

}

?>


