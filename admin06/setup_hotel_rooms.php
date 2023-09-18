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
	

<script language="javascript">
function fetch_room_class_info(room_class_id) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

		document.getElementById("loader_santhus").style.display = "none"; 
		
        document.getElementById("show_room_class_info").innerHTML=xmlhttp.responseText;
        document.getElementById("show_room_class_info_2").innerHTML=xmlhttp.responseText;
     }
  }

  document.getElementById("loader_santhus").style.display = "block"; 

  xmlhttp.open("GET","ajax_fetch_room_class_info.php?room_class_id="+room_class_id,true);
  xmlhttp.send();
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
            <h1>Setup Hotel Rooms</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Setup Hotel Rooms</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


 
<?php $query_hotel_rooms=mysqli_query($con,"SELECT * FROM hotel_rooms ORDER BY room_number ASC") or die(mysqli_error($con)); ?>



      <div class="row">
        <div class="col-12">

          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-cog"></i> &nbsp; All Hotel Rooms  ( <b><?php echo  mysqli_num_rows($query_hotel_rooms); ?> </b> ) </h3>
                <div class="card-tools">

                  <div class="input-group input-group-sm" >

                    <div class="input-group-append">
                      <button  data-toggle='modal' data-target='#modal-new'  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
					  ADD NEW HOTEL ROOM</button>
                    </div>
                  </div>

				</div>
              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ROOM NUMBER</th>
                      <th>CLASS NAME</th>
                      <th>WEEKDAY PRICE </th>
                      <th>WEEKEND PRICE </th>
                      <th style="width:10%;">#</th>
                    </tr>
                  </thead>

                  <tbody>



<?php


while($query_hotel_rooms_x=mysqli_fetch_array($query_hotel_rooms))
{
  $hotel_room_id			=			 clean_output($query_hotel_rooms_x['id']);
  $room_number				=			 clean_output($query_hotel_rooms_x['room_number']);
  $room_class_id			=			 clean_output($query_hotel_rooms_x['room_class_id']);


 $query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$room_class_id'")) or die(mysqli_error($con));

  $class_id					=			 clean_output($query_row_room_class['id']);
  $class_name				=			 clean_output($query_row_room_class['class_name']);
  $class_description		=			 clean_output($query_row_room_class['class_description']);
  $weekday_price			=			 clean_output($query_row_room_class['weekday_price']);
  $weekend_price			=			 clean_output($query_row_room_class['weekend_price']);


?>
					  <tr>
                      <td><?php echo $room_number; ?></td>
                      <td><?php echo $class_name; ?></td>
                      <td>&#163; <?php echo number_format($weekday_price); ?></td>
                      <td>&#163; <?php echo number_format($weekend_price); ?></td>
					  <td>

                      <button
					  data-hotel_room_id='<?php echo $hotel_room_id; ?>'
					  data-room_number='<?php echo $room_number; ?>'
					  data-room_class_id='<?php echo $room_class_id; ?>'
					  data-toggle='modal' data-target='#modal-edit' type="button"  class="btn-sm open-EditDialog btn btn-success"><i class="fas fa-edit"></i></button>

                      <button
					  data-hotel_room_id='<?php echo $hotel_room_id; ?>'
					  data-room_number='<?php echo $room_number; ?>'
					  data-toggle='modal' data-target='#modal-delete'  type="button"  class="btn-sm open-DeleteDialog btn btn-danger"><i class="fas fa-trash"></i></button>



					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($query_hotel_rooms))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
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
                      <th>WEEKDAY PRICE </th>
                      <th>WEEKEND PRICE </th>
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
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Hotel Room</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Room Number</b></td>
                      <td><input required  type="number" min="1" name="room_number"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Select Room Class</b></td>
                      <td>
					  <select  required onchange="fetch_room_class_info(this.value);"  name="room_class_id"   class="form-control">
					  <option value=''>SELECT CLASS </option>
						<?php
						$query_room_class=mysqli_query($con,"SELECT * FROM room_class");
						while($row_query_room_class=mysqli_fetch_array($query_room_class))
						{
						$room_class_id			=		clean_output($row_query_room_class["id"]);
						$class_name				=	    clean_output($row_query_room_class['class_name']);
						echo "<option value='$room_class_id'>$class_name </option>";
						}
						?>

					  </select>
					  </td>
                    </tr>
					</table>
					<br/>

					<div id="show_room_class_info_2"></div>




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
        <div class="modal-dialog">
		<form action="" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Edit Room Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


				<input type="hidden" name="hotel_room_id" id="hotel_room_id"/>

                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Room Number</b></td>
                      <td><input required  type="number" min="1" name="room_number"  id="room_number" class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Select Room Class</b></td>
                      <td>
					  <select  required onchange="fetch_room_class_info(this.value);"  name="room_class_id"  id="room_class_id" class="form-control">
					  <option value=''>SELECT CLASS </option>
						<?php
						$query_room_class=mysqli_query($con,"SELECT * FROM room_class");
						while($row_query_room_class=mysqli_fetch_array($query_room_class))
						{
						$room_class_id			=		clean_output($row_query_room_class["id"]);
						$class_name				=	    clean_output($row_query_room_class['class_name']);
						echo "<option value='$room_class_id'>$class_name </option>";
						}
						?>

					  </select>
					  </td>
                    </tr>
					</table>
					<br/>

					<div id="show_room_class_info"></div>





            </div>
            <div class="modal-footer justify-content-between">
                   <button type="submit" name="edit"  class="btn btn-primary">Submit</button>
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
              <h4 class="modal-title"  >Delete Room Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to Delete Room  "<b id="room_number_2"></b>" ?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="hotel_room_id" id="hotel_room_id_2"/>
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
      $('#hotel_room_id').val($(this).data('hotel_room_id'));
      $('#room_number').val($(this).data('room_number'));

	  $("#room_class_id").val($(this).data('room_class_id'));

   });
});

</script>


  <script>
 $(function(){
   $(".open-DeleteDialog").click(function(){
      $('#hotel_room_id_2').val($(this).data('hotel_room_id'));
	  $("#room_number_2").html($(this).data('room_number'));

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


  $room_number					=			clean_input($_POST['room_number']);
  $room_class_id				=			clean_input($_POST['room_class_id']);
  $current_state				=			"in_service";



$check_room_number	=	mysqli_query($con,"SELECT * FROM hotel_rooms WHERE room_number='$room_number'");

 if(mysqli_num_rows($check_room_number)>0){  	header("location: ?notif_err=Room+Number+Exist!");  exit(); }



  mysqli_query($con,"INSERT INTO hotel_rooms SET			room_number					=			'$room_number',
															room_class_id				=			'$room_class_id',
															current_state				=			'$current_state'");



	header("location: ?notif=New+Hotel+Room+Added!");

}

?>




<?php
if(isset($_POST["edit"]))
{

  $hotel_room_id				=			clean_input($_POST["hotel_room_id"]);
  $room_number					=			clean_input($_POST['room_number']);
  $room_class_id				=			clean_input($_POST['room_class_id']);

$check_room_number	=	mysqli_query($con,"SELECT * FROM hotel_rooms WHERE room_number='$room_number'");


 $query_row_hotel_rooms=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM hotel_rooms WHERE id='$hotel_room_id'")) or die(mysqli_error($con));
 $room_number_x					=			 clean_output($query_row_hotel_rooms['room_number']);


 if((mysqli_num_rows($check_room_number)>0) &&($room_number_x !=$room_number)){  header("location: ?notif_err=Room+Number+Exist!");  exit();  }


 mysqli_query($con,"UPDATE hotel_rooms SET 	room_number			= 	'$room_number',
										room_class_id		= 	'$room_class_id'  WHERE id = '$hotel_room_id'");

 header("location: ?notif=Hotel+Room+Information+has+been+Modified");

}

?>



<?php
if(isset($_POST["delete"]))
{

  $hotel_room_id						=			clean_input($_POST["hotel_room_id"]);

  mysqli_query($con,"DELETE FROM hotel_rooms WHERE id='$hotel_room_id'") or die(mysqli_error($con));


 header("location: ?notif=Hotel+Room+has+been+Deleted");

}

?>



