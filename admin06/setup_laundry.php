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
            <h1>Laundry Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Laundry Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">










  
  <?php $query_laundry_delivery_packages_sql=mysqli_query($con,"SELECT * FROM laundry_delivery_packages ORDER BY id DESC") or die(mysqli_error($con)); ?>

  
           <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-cog"></i> &nbsp; Laundry Service Delivery  
				( <b><?php echo  mysqli_num_rows($query_laundry_delivery_packages_sql); ?> </b> ) </h3>

                <div class="card-tools">

                  <div class="input-group input-group-sm" >
                    <div class="input-group-append">
                      <button  data-toggle='modal' data-target='#modal-new_laundry_delivery_packages'  type="button"  class="btn btn-default">
					  <i class="fas fa-plus"></i>
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
                       <th>NAME </th>
                      <th>PERCENTAGE(%) </th>
                      <th style="width:10%;">#</th>
                    </tr>
                  </thead>

                  <tbody>



<?php


while($query_laundry_delivery_packages=mysqli_fetch_array($query_laundry_delivery_packages_sql))
{
  $laundry_delivery_packages_id			=			 clean_output($query_laundry_delivery_packages['id']);
  $laundry_package_name					=			 clean_output($query_laundry_delivery_packages['laundry_package_name']);
  $laundry_package_percentage			=			 clean_output($query_laundry_delivery_packages['laundry_package_percentage']); 



?>


					  <tr>
                      <td><?php echo $laundry_package_name; ?></td>
                       <td>+ % <?php echo $laundry_package_percentage; ?></td>
 					  <td>

                      <button
					  data-laundry_delivery_packages_id='<?php echo $laundry_delivery_packages_id; ?>'
					  data-laundry_package_name='<?php echo $laundry_package_name; ?>'
					  data-laundry_package_percentage='<?php echo $laundry_package_percentage; ?>'
					  data-toggle='modal' data-target='#modal-edit_laundry_delivery_packages' type="button"  class="btn-sm open-EditDialog_laundry_delivery_packages btn btn-success"><i class="fas fa-edit"></i></button>


                      <button 
					  data-laundry_delivery_packages_id_2='<?php echo $laundry_delivery_packages_id; ?>'
					  data-laundry_package_name_2='<?php echo $laundry_package_name; ?>'
					  data-laundry_package_percentage_2='<?php echo $laundry_package_percentage; ?>'
					  data-toggle='modal' data-target='#modal-delete_laundry_delivery_packages'  type="button"  class="btn-sm open-DeleteDialog_laundry_delivery_packages btn btn-danger"><i class="fas fa-trash"></i></button>
					  
					  
					  
					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($query_laundry_delivery_packages_sql))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
      
                      </tr>

<?php } ?>
                  </tbody>


                <tfoot>
                <tr>
                      <th>NAME </th>
                      <th>PERCENTAGE(%)</th>
                      <th style="width:10%;">#</th>
                </tr>
                </tfoot>

              </table>            </div>
            <!-- /.card-body --> 
          </div>
          <!-- /.card -->








      <div class="modal fade" id="modal-new_laundry_delivery_packages">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Laundry Service Delivery</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">




         <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Name</b></td>
                      <td><input required  type="text"  name="laundry_package_name" class="form-control"> </td>
                    </tr>
                      <tr>
                      <td><b>Percentage (%)</b></td>
                      <td><input required  type="number"   name="laundry_package_percentage"  class="form-control"> </td>
                    </tr>

					</tbody>
					</table>



            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="add_laundry_delivery_packages"  class="btn btn-primary">Submit</button>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
           </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  




      <div class="modal fade" id="modal-edit_laundry_delivery_packages">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Edit  Laundry Service Delivery</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


				<input type="hidden" name="laundry_delivery_packages_id" id="laundry_delivery_packages_id"/>

         <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Name</b></td>
                      <td><input required  type="text"  name="laundry_package_name" id="laundry_package_name"  class="form-control"> </td>
                    </tr>
                      <tr>
                      <td><b>Percentage (%)</b></td>
                      <td><input required  type="number"   name="laundry_package_percentage" id="laundry_package_percentage"  class="form-control"> </td>
                    </tr>

					</tbody>
					</table>
					

            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="edit_laundry_delivery_packages"  class="btn btn-primary">Submit</button>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
           </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
      <div class="modal fade" id="modal-delete_laundry_delivery_packages">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Delete Laundry Service Delivery</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to Delete Laundry Service Delivery "<b id="laundry_package_name_2"></b>" ?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="laundry_delivery_packages_id" id="laundry_delivery_packages_id_2"/>
                   <button type="submit" name="delete_laundry_delivery_packages"  class="btn btn-primary">YES</button>
				   </form>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">NO</button>
           </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



 



















































  
  <?php $query_laundry_discount_sql=mysqli_query($con,"SELECT * FROM laundry_discount ORDER BY id DESC") or die(mysqli_error($con)); ?>

  
           <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-cog"></i> &nbsp; All Laundry Discounts  ( <b><?php echo  mysqli_num_rows($query_laundry_discount_sql); ?> </b> ) </h3>
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


while($query_laundry_discount=mysqli_fetch_array($query_laundry_discount_sql))
{
  $laundry_discount_id			=			 clean_output($query_laundry_discount['id']);
  $laundry_discount_name		=			 clean_output($query_laundry_discount['laundry_discount_name']);
  $laundry_discount_percentage	=			 clean_output($query_laundry_discount['laundry_discount_percentage']);
  $laundry_discount_status		=			 clean_output($query_laundry_discount['laundry_discount_status']);

  if($laundry_discount_status		==	"1")
  {
	$laundry_discount_status_txt	=	"ACTIVE";
  }
  elseif($laundry_discount_status	==	"0")
  {
	$laundry_discount_status_txt	=	"DISABLE";	  
  } 
  

?>
					  <tr>
                      <td><?php echo $laundry_discount_name; ?></td>
                       <td>- % <?php echo $laundry_discount_percentage; ?></td>
                      <td><?php echo $laundry_discount_status_txt; ?></td>
 					  <td>

                      <button
					  data-laundry_discount_id='<?php echo $laundry_discount_id; ?>'
					  data-laundry_discount_name='<?php echo $laundry_discount_name; ?>'
					  data-laundry_discount_percentage='<?php echo $laundry_discount_percentage; ?>'
					  data-laundry_discount_status='<?php echo $laundry_discount_status; ?>'
					  data-toggle='modal' data-target='#modal-edit' type="button"  class="btn-sm open-EditDialog btn btn-success"><i class="fas fa-edit"></i></button>

                      <button 
					  data-laundry_discount_id_2='<?php echo $laundry_discount_id; ?>'
					  data-laundry_discount_name_2='<?php echo $laundry_discount_name; ?>'
					  data-laundry_discount_percentage_2='<?php echo $laundry_discount_percentage; ?>'
					  data-toggle='modal' data-target='#modal-delete'  type="button"  class="btn-sm open-DeleteDialog btn btn-danger"><i class="fas fa-trash"></i></button>



					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($query_laundry_discount_sql))==0){ ?>

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












  
  
  
  
  
  
  
  
  
  
  
  

      <div class="modal fade" id="modal-new">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Laundry Discount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Discount Name</b></td>
                      <td><input required  type="text"  name="laundry_discount_name"   class="form-control"> </td>
                    </tr>
                      <tr>
                      <td><b>Percentage (%)</b></td>
                      <td><input required  type="number"   name="laundry_discount_percentage"   class="form-control"> </td>
                    </tr>
					<tr>
                      <td><b>STATUS</b></td>
                      <td>
						<select name="laundry_discount_status" required class="form-control" >
						<option value="1">ACTIVE</option>
						<option value="0">DISABLE</option>
						</select>
					  </td>
                    </tr>
					</tbody>
					</table>
					



            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="add_new_laundry_discount"  class="btn btn-primary">Submit</button>
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
              <h4 class="modal-title"  >Edit Laundry Discount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


				<input type="hidden" name="laundry_discount_id" id="laundry_discount_id"/>

				<table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Discount Name</b></td>
                      <td><input required  type="text"  name="laundry_discount_name" id="laundry_discount_name"  class="form-control"> </td>
                    </tr>
                      <tr>
                      <td><b>Percentage (%)</b></td>
                      <td><input required  type="number"   name="laundry_discount_percentage" id="laundry_discount_percentage"  class="form-control"> </td>
                    </tr>
					<tr>
                      <td><b>Status</b></td>
                      <td>
						<select name="laundry_discount_status" id="laundry_discount_status"  required class="form-control" >
						<option value="1">ACTIVE</option>
						<option value="0">DISABLE</option>
						</select>
					  </td>
                    </tr>
					</tbody>
					</table>
					


            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="edit_laundry_discount"  class="btn btn-primary">Submit</button>
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
              <h4 class="modal-title"  >Delete Laundry Discount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to Delete Laundry Discount  "<b id="laundry_discount_name_2"></b>" ?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="laundry_discount_id" id="laundry_discount_id_2"/>
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


  
  
































































 

<?php $query_laundry_setup=mysqli_query($con,"SELECT * FROM laundry_setup ORDER BY id DESC") or die(mysqli_error($con)); ?>


      <div class="row">
        <div class="col-12">

          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog"></i> &nbsp; All Laundry Items ( <b><?php echo  mysqli_num_rows($query_laundry_setup); ?> </b> )</h3>

                <div class="card-tools">
		 
                  <div class="input-group input-group-sm" >
                  
                    <div class="input-group-append">
                      <button  data-toggle='modal' data-target='#modal-new_laundry_item'  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
					  ADD NEW ITEM</button>
                    </div>
                  </div>
       
				</div>
              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>ITEM</th>
                      <th>WASH AMT.</th>
                      <th>IRON AMT.</th>
                      <th>STARCH AMT.</th>
                      <th>DRY CLEAN AMT.</th>
                      <th>STAIN REMOVE AMT.</th>
                      <th style="height:10%;">#</th>
                    </tr>
                </thead>

                  <tbody>



<?php


while($query_row_laundry_setup=mysqli_fetch_array($query_laundry_setup))
{
  $laundry_item_id		=			 clean_output($query_row_laundry_setup['id']);
  $laundry_item			=			 clean_output($query_row_laundry_setup['laundry_item']); 
  $wash_amount			=			 clean_output($query_row_laundry_setup['wash_amount']); 
  $iron_amount			=			 clean_output($query_row_laundry_setup['iron_amount']); 
  $starch_amount		=			 clean_output($query_row_laundry_setup['starch_amount']); 
  $dry_clean_amount		=			 clean_output($query_row_laundry_setup['dry_clean_amount']); 
  $stain_remove_amount	=			 clean_output($query_row_laundry_setup['stain_remove_amount']); 

?>
					  <tr>
                      <td><?php echo $laundry_item; ?></td>
                      <td>&#163;<?php echo number_format($wash_amount); ?></td>
                      <td>&#163;<?php echo number_format($iron_amount); ?></td>
                      <td>&#163;<?php echo number_format($starch_amount); ?></td>
                      <td>&#163;<?php echo number_format($dry_clean_amount); ?></td>
                      <td>&#163;<?php echo number_format($stain_remove_amount); ?></td>

					  <td>
					                   
                      <button  
					  data-laundry_item_id='<?php echo $laundry_item_id; ?>'
					  data-laundry_item='<?php echo $laundry_item; ?>'
					  data-wash_amount='<?php echo $wash_amount; ?>'
					  data-iron_amount='<?php echo $iron_amount; ?>'
					  data-starch_amount='<?php echo $starch_amount; ?>'
					  data-dry_clean_amount='<?php echo $dry_clean_amount; ?>'
					  data-stain_remove_amount='<?php echo $stain_remove_amount; ?>'
					  data-toggle='modal' data-target='#modal-edit_laundry_item' type="button"  class="btn-sm open-EditDialog_laundry_item btn btn-success"><i class="fas fa-edit"></i></button>
					  
                      <button 
					  data-laundry_item_id='<?php echo $laundry_item_id; ?>'
					  data-laundry_item='<?php echo $laundry_item; ?>'
					  data-toggle='modal' data-target='#modal-delete'  type="button"  class="btn-sm open-DeleteDialog_laundry_item btn btn-danger"><i class="fas fa-trash"></i></button>
                 
					
					 
					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($query_laundry_setup))==0){ ?>

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
                    <tr>
                      <th>ITEM</th>
                      <th>WASH AMT.</th>
                      <th>IRON AMT.</th>
                      <th>STARCH AMT.</th>
                      <th>DRY CLEAN AMT.</th>
                      <th>STAIN REMOVE AMT.</th>
                      <th>#</th>
                    </tr>
                </tfoot>

              </table>            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->


























      <div class="modal fade" id="modal-new_laundry_item">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Laundry Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


  
                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Laundry Item</b></td>
                      <td><input required  type="text"   name="laundry_item"   class="form-control"> </td>
                    </tr>

                    <tr>
                      <td><b>Wash Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="wash_amount"   class="form-control"> </td>
                    </tr>

                    <tr>
                      <td><b>Iron Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="iron_amount"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Starch Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="starch_amount"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Dry Clean Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="dry_clean_amount"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Stain Remove Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="stain_remove_amount"   class="form-control"> </td>
                    </tr>					
					</table>
					<br/>
					
	 

            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="add_new_laundry_item"  class="btn btn-primary">Submit</button>
                   <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
           </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->








      <div class="modal fade" id="modal-edit_laundry_item">
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Edit Laundry Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


				<input type="hidden" name="laundry_item_id" id="laundry_item_id"/>
                
      
                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Laundry Item</b></td>
                      <td><input required  type="text"   name="laundry_item" id="laundry_item"  class="form-control"> </td>
                    </tr>

                    <tr>
                      <td><b>Wash Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="wash_amount" id="wash_amount"  class="form-control"> </td>
                    </tr>

                    <tr>
                      <td><b>Iron Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="iron_amount" id="iron_amount"    class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Starch Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="starch_amount" id="starch_amount"    class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Dry Clean Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="dry_clean_amount" id="dry_clean_amount"    class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Stain Remove Amount (&#163;)</b></td>
                      <td><input required  type="number"   name="stain_remove_amount" id="stain_remove_amount"    class="form-control"> </td>
                    </tr>					
					</table>
					<br/>
             


            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="edit_laundry_item"  class="btn btn-primary">Submit</button>
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
              <h4 class="modal-title"  >Delete Laundry Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to Delete this Laundry Item "<b id="item_2"></b>" ?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="laundry_item_id" id="item_id_2"/>
                   <button type="submit" name="delete_laundry_item"  class="btn btn-primary">YES</button>
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
   $(".open-EditDialog_laundry_item").click(function(){
      $('#laundry_item_id').val($(this).data('laundry_item_id'));
      $('#laundry_item').val($(this).data('laundry_item'));
      $('#wash_amount').val($(this).data('wash_amount'));
      $('#iron_amount').val($(this).data('iron_amount'));
      $('#starch_amount').val($(this).data('starch_amount'));
      $('#dry_clean_amount').val($(this).data('dry_clean_amount'));
      $('#stain_remove_amount').val($(this).data('stain_remove_amount'));
	  

   });
});

</script>


  <script>
 $(function(){
   $(".open-DeleteDialog_laundry_item").click(function(){
      $('#item_id_2').val($(this).data('laundry_item_id'));
	  $("#item_2").html($(this).data('laundry_item'));

   });
});

</script>




 
   <script>
 $(function(){
   $(".open-EditDialog").click(function(){
	   
      $('#laundry_discount_id').val($(this).data('laundry_discount_id'));
      $('#laundry_discount_name').val($(this).data('laundry_discount_name'));

	  $("#laundry_discount_percentage").val($(this).data('laundry_discount_percentage'));
	  $("#laundry_discount_status").val($(this).data('laundry_discount_status'));

   });
});

</script>


  <script>
 $(function(){
   $(".open-DeleteDialog").click(function(){
      $('#laundry_discount_id_2').val($(this).data('laundry_discount_id_2'));
	  $("#laundry_discount_name_2").html($(this).data('laundry_discount_name_2'));

   });
});

</script>




 
   <script>
 $(function(){
   $(".open-EditDialog_laundry_delivery_packages").click(function(){
	   
      $('#laundry_delivery_packages_id').val($(this).data('laundry_delivery_packages_id'));
      $('#laundry_package_name').val($(this).data('laundry_package_name'));
	  $("#laundry_package_percentage").val($(this).data('laundry_package_percentage'));

   });
});

</script>


  <script>
 $(function(){
   $(".open-DeleteDialog_laundry_delivery_packages").click(function(){
      $('#laundry_delivery_packages_id_2').val($(this).data('laundry_delivery_packages_id_2'));
	  $("#laundry_package_name_2").html($(this).data('laundry_package_name_2'));

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

if(isset($_POST["add_new_laundry_item"]))
{


  $laundry_item						=			clean_input($_POST['laundry_item']);
  $wash_amount						=			clean_input($_POST['wash_amount']);
  $iron_amount						=			clean_input($_POST['iron_amount']);
  $starch_amount					=			clean_input($_POST['starch_amount']);
  $dry_clean_amount					=			clean_input($_POST['dry_clean_amount']);
  $stain_remove_amount				=			clean_input($_POST['stain_remove_amount']);
  
  

  mysqli_query($con,"INSERT INTO laundry_setup SET	laundry_item			=		'$laundry_item',
												wash_amount				=		'$wash_amount',
												iron_amount				=		'$iron_amount',
												starch_amount			=		'$starch_amount',
												dry_clean_amount		=		'$dry_clean_amount',
												stain_remove_amount		=		'$stain_remove_amount'");



	header("location: ?notif=New+Laundry+Item+Added!");

}

?>




<?php
if(isset($_POST["edit_laundry_item"]))
{

  $laundry_item_id					=			clean_input($_POST["laundry_item_id"]);
  $laundry_item						=			clean_input($_POST['laundry_item']);
  $wash_amount						=			clean_input($_POST['wash_amount']);
  $iron_amount						=			clean_input($_POST['iron_amount']);
  $starch_amount					=			clean_input($_POST['starch_amount']);
  $dry_clean_amount					=			clean_input($_POST['dry_clean_amount']);
  $stain_remove_amount				=			clean_input($_POST['stain_remove_amount']);
  

 mysqli_query($con,"UPDATE laundry_setup SET	laundry_item			=		'$laundry_item',
												wash_amount				=		'$wash_amount',
												iron_amount				=		'$iron_amount',
												starch_amount			=		'$starch_amount',
												dry_clean_amount		=		'$dry_clean_amount',
												stain_remove_amount		=		'$stain_remove_amount'	WHERE id = '$laundry_item_id'");
 
 
 
 

 header("location: ?notif=Laundry+Item+has+been+Modified");

}

?>



<?php
if(isset($_POST["delete_laundry_item"]))
{

  $laundry_item_id						=			clean_input($_POST["laundry_item_id"]);
 
  mysqli_query($con,"DELETE FROM laundry_setup WHERE id='$laundry_item_id'") or die(mysqli_error($con));


 header("location: ?notif=Menu+laundry_item+has+been+Deleted");

}

?>






































<?php

if(isset($_POST["add_new_laundry_discount"]))
{


  $laundry_discount_name					=			clean_input(ucwords($_POST['laundry_discount_name']));
  $laundry_discount_percentage				=			clean_input($_POST['laundry_discount_percentage']);
  $laundry_discount_status					=			clean_input($_POST['laundry_discount_status']);
 


  $check_discount_name	=	mysqli_query($con,"SELECT * FROM laundry_discount WHERE laundry_discount_name='$laundry_discount_name'");

 if(mysqli_num_rows($check_discount_name)>0){  	header("location: ?notif_err=Dicount+Name+Exist!");  exit(); }



  mysqli_query($con,"INSERT INTO laundry_discount SET		laundry_discount_name				=			'$laundry_discount_name',
															laundry_discount_percentage			=			'$laundry_discount_percentage',
															laundry_discount_status				=			'$laundry_discount_status'");



	header("location: ?notif=New+Laundry+Dicount+Added!");

}

?>




<?php

if(isset($_POST["edit_laundry_discount"]))
{


  $laundry_discount_id						=			clean_input(ucwords($_POST['laundry_discount_id']));
  $laundry_discount_name					=			clean_input(ucwords($_POST['laundry_discount_name']));
  $laundry_discount_percentage				=			clean_input($_POST['laundry_discount_percentage']);
  $laundry_discount_status					=			clean_input($_POST['laundry_discount_status']);
 
  
  $check_discount_name	=	mysqli_query($con,"SELECT * FROM laundry_discount WHERE laundry_discount_name='$laundry_discount_name'");

 if(mysqli_num_rows($check_discount_name)>1){  		header("location: ?notif_err=Dicount+Name+Exist!");  exit(); }



  mysqli_query($con,"UPDATE laundry_discount SET laundry_discount_name			=			'$laundry_discount_name',
												 laundry_discount_percentage	=			'$laundry_discount_percentage',
												laundry_discount_status			=			'$laundry_discount_status' WHERE id='$laundry_discount_id'");



	header("location: ?notif=Laundry+Dicount+Updated!");

}

?>


 





<?php
if(isset($_POST["delete"]))
{

  $laundry_discount_id						=			clean_input($_POST["laundry_discount_id"]);

  mysqli_query($con,"DELETE FROM laundry_discount WHERE id='$laundry_discount_id'") or die(mysqli_error($con));


 header("location: ?notif=Laundry+Discount+has+been+Deleted");

}

?>





































<?php

if(isset($_POST["add_laundry_delivery_packages"]))
{


  $laundry_package_name						=			clean_input(ucwords($_POST['laundry_package_name']));
  $laundry_package_percentage				=			clean_input($_POST['laundry_package_percentage']);
 


  $check_discount_name	=	mysqli_query($con,"SELECT * FROM laundry_delivery_packages WHERE laundry_package_name='$laundry_package_name'");

 if(mysqli_num_rows($check_discount_name)>0){  	header("location: ?notif_err=Dicount+Name+Exist!");  exit(); }



  mysqli_query($con,"INSERT INTO laundry_delivery_packages SET		laundry_package_name				=			'$laundry_package_name',
															laundry_package_percentage			=			'$laundry_package_percentage'");



	header("location: ?notif=New+Laundry+Dicount+Added!");

}

?>




<?php

if(isset($_POST["edit_laundry_delivery_packages"]))
{


  $laundry_delivery_packages_id				=			clean_input(ucwords($_POST['laundry_delivery_packages_id']));
  $laundry_package_name						=			clean_input(ucwords($_POST['laundry_package_name']));
  $laundry_package_percentage				=			clean_input($_POST['laundry_package_percentage']);
 
  
  $check_discount_name	=	mysqli_query($con,"SELECT * FROM laundry_delivery_packages WHERE laundry_package_name='$laundry_package_name'");

 if(mysqli_num_rows($check_discount_name)>1){  		header("location: ?notif_err=Dicount+Name+Exist!");  exit(); }



  mysqli_query($con,"UPDATE laundry_delivery_packages SET laundry_package_name		=			'$laundry_package_name',
											laundry_package_percentage	=			'$laundry_package_percentage' WHERE id='$laundry_delivery_packages_id'");



	header("location: ?notif=Laundry+Dicount+Updated!");

}

?>


 





<?php
if(isset($_POST["delete_laundry_delivery_packages"]))
{

  $laundry_delivery_packages_id						=			clean_input($_POST["laundry_delivery_packages_id"]);

  mysqli_query($con,"DELETE FROM laundry_delivery_packages WHERE id='$laundry_delivery_packages_id'") or die(mysqli_error($con));


 header("location: ?notif=Laundry+Discount+has+been+Deleted");

}

?>

