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
  
  
   <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../_source/plugins/ekko-lightbox/ekko-lightbox.css">
  
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
            <h1>Setup Room Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Setup Room Class</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


 

<?php $query_room_class=mysqli_query($con,"SELECT * FROM room_class ORDER BY id DESC") or die(mysqli_error($con)); ?>


      <div class="row">
        <div class="col-12">

          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog"></i> &nbsp; All Room Class  ( <b><?php echo  mysqli_num_rows($query_room_class); ?> </b> )</h3>

                <div class="card-tools">
		 
                  <div class="input-group input-group-sm" >
                  
                    <div class="input-group-append">
                      <button  data-toggle='modal' data-target='#modal-new'  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
					  ADD NEW CLASS</button>
                    </div>
                  </div>
       
				</div>
              </div>
              <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>CLASS NAME</th>
                      <th>DESCRIPTION</th>
                      <th>WEEKDAY PRICE </th>
                      <th>WEEKEND PRICE </th>
                      <th style="width:10%;">#</th>
                    </tr>
                </thead>

                  <tbody>



<?php


while($query_room_class_x=mysqli_fetch_array($query_room_class))
{
  $class_id					=			 clean_output($query_room_class_x['id']);
  $class_name				=			 clean_output($query_room_class_x['class_name']);
  $class_description		=			 clean_output($query_room_class_x['class_description']);
  $room_features_1			=			 clean_output($query_room_class_x['room_features_1']);
  $room_features_2			=			 clean_output($query_room_class_x['room_features_2']);
  $room_features_3			=			 clean_output($query_room_class_x['room_features_3']);
  $weekday_price			=			 clean_output($query_room_class_x['weekday_price']);
  $weekend_price			=			 clean_output($query_room_class_x['weekend_price']); 
  
  $class_description_x = substr($class_description, 0, 30)."...";

?>
					  <tr>
                      <td><?php echo $class_name; ?></td>
                      <td><?php echo $class_description_x; ?></td>
                      <td>&#163; <?php echo number_format($weekday_price,2); ?></td>
                      <td>&#163; <?php echo number_format($weekend_price,2); ?></td>
					  <td>
					                   
                      <button  
					  data-class_id='<?php echo $class_id; ?>'
					  data-class_name='<?php echo $class_name; ?>'
					  data-class_description='<?php echo $class_description; ?>'
					  data-room_features_1='<?php echo $room_features_1; ?>'
					  data-room_features_2='<?php echo $room_features_2; ?>'
					  data-room_features_3='<?php echo $room_features_3; ?>'
					  data-weekday_price='<?php echo $weekday_price; ?>'
					  data-weekend_price='<?php echo $weekend_price; ?>' 
					  
					  type="button"  class="btn-sm open-EditDialog btn btn-success"><i class="fas fa-edit"></i></button>
					  
                      <button 
					  data-class_id='<?php echo $class_id; ?>'
					  data-class_name='<?php echo $class_name; ?>'
					  data-toggle='modal' data-target='#modal-delete'  type="button"  class="btn-sm open-DeleteDialog btn btn-danger"><i class="fas fa-trash"></i></button>
                 
					
					 
					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($query_room_class))==0){ ?>

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
                      <th>CLASS NAME</th>
                      <th>DESCRIPTION</th>
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




















      <div class="modal fade reload_modal" id="modal-new">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Room Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<input type="hidden" value="" id="last_room_class_id"/>



				<div id="div_room_class_information" >
				<form action="" id="form_new_room_class" method="POST">

				<b>ROOM CLASS INFORMATION</b>
				<hr/>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><b>Class Name</b></td>
                      <td><input required  type="text" name="class_name"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Class Description</b></td>
                      <td><textarea required name="class_description"   class="form-control"></textarea></td>
                    </tr>
                    <tr>
                      <td><b>Features</b></td>
                      <td>
							<div class="input-group mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text">1</span>
							</div>
							<input required type="text" class="form-control" name="room_features_1" placeholder="Room Feature 1">
							</div>

							<div class="input-group mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text">2</span>
							</div>
							<input required type="text" class="form-control" name="room_features_2" placeholder="Room Feature 2">
							</div>

							<div class="input-group mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text">3</span>
							</div>
							<input required type="text" class="form-control" name="room_features_3" placeholder="Room Feature 3">
							</div>
							
					  </td>
                    </tr>					
                    <tr>
                      <td><b>Weekday Price (&#163;)</b></td>
                      <td><input required  type="number" min="10"name="weekday_price"  class="form-control"></td>
                    </tr>
                    <tr>
                      <td><b>Weekend Price(&#163;)</b></td>
                      <td><input required  type="number" min="10" name="weekend_price" class="form-control"> </td>
                    </tr>
                  </tbody>
                </table>
					<div class="card-footer ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
					</div> 
					</form>
				
				</div>
             

 
 
                <div id="div_upload_room_class_photos" style="display:none;">
				
				<div class='alert alert-success alert-dismissible'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Success!</strong> Room Information Saved
				</div>
		
				<form action="" id="form_upload_room_class_photos" method="POST">
				<b>UPLOAD ROOM CLASS PHOTOS</b>
				<hr/>				 
				<table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><b>Upload Photos</b></td>
                      <td><input  type='file' name='file' id='input_upload'  class="form-control"> </td>
                    </tr>
                </tbody>
				</table>
				<br/>
				<hr/>

 
                   <div class="filter-container p-0 row" id="preview">
 
					<!--
					HERE YOU CAN FETCH (WHILE PHP ) OF LIST OF EXISITNG ROOMS
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                      <a href="https://via.placeholder.com/1200/000000.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
                        <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>
					-->
			 
					
                  </div>
				<hr/>
					<div class="card-footer ">
                    <button type="button" onclick="window.location='?';" class="btn btn-primary">Save</button>
					</div> 
				</form>
              </div>

            </div>
 
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->








      <div class="modal fade reload_modal" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Edit Room Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



				<div id="edit_div_room_class_information" >
				<form action="" id="form_edit_room_class" method="POST">
				<input type="hidden" name="class_id" id="class_id"/>


				<b>ROOM CLASS INFORMATION</b>
				<hr/>


                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><b>Class Name</b></td>
                      <td><input required  type="text" name="class_name" id="class_name"  class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Class Description</b></td>
                      <td><textarea required name="class_description"  id="class_description"    class="form-control"></textarea></td>
                    </tr>
                    <tr>
                      <td><b>Features</b></td>
                      <td>
							<div class="input-group mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text">1</span>
							</div>
							<input required type="text" class="form-control" name="room_features_1" id="room_features_1" placeholder="Room Feature 1">
							</div>

							<div class="input-group mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text">2</span>
							</div>
							<input required type="text" class="form-control" name="room_features_2"  id="room_features_2" placeholder="Room Feature 2">
							</div>

							<div class="input-group mb-3">
							<div class="input-group-prepend">
							<span class="input-group-text">3</span>
							</div>
							<input required type="text" class="form-control" name="room_features_3"  id="room_features_3" placeholder="Room Feature 3">
							</div>
							
					  </td>
                    </tr>						
                    <tr>
                      <td><b>Weekday Price (&#163;)</b></td>
                      <td><input required  type="number" min="10"name="weekday_price"  id="weekday_price"   class="form-control"></td>
                    </tr>
                    <tr>
                      <td><b>Weekend Price(&#163;)</b></td>
                      <td><input required  type="number" min="10" name="weekend_price"   id="weekend_price"   class="form-control"> </td>
                    </tr>
                  </tbody>
                </table>
				
				
					<div class="card-footer ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button"   data-dismiss="modal" class="btn btn-danger float-right">Back</button>
					</div> 
					</form>
				
				</div>
             

 
 
                <div id="edit_div_upload_room_class_photos" style="display:none;">
				
				<div class='alert alert-success alert-dismissible'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Success!</strong> Room Information Saved
				</div>
				
				<form action="" id="form_edit_upload_room_class_photos" method="POST">
				<b>UPLOAD ROOM CLASS PHOTOS</b>
				<hr/>				 
				<table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><b>Upload Photos</b></td>
                      <td><input  type='file' name='file' id='input_upload_2'  class="form-control"> </td>
                    </tr>
                </tbody>
				</table>
				<br/>
				<hr/>

 
                   <div class="filter-container p-0 row" id="preview_2">
 
					<!--
					HERE YOU CAN FETCH (WHILE PHP ) OF LIST OF EXISITNG ROOMS
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                      <a href="https://via.placeholder.com/1200/000000.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
                        <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>
					-->
			 
					
                  </div>
				<hr/>
					<div class="card-footer ">
                    <button type="button" onclick="window.location='?';" class="btn btn-primary">Save</button>
					</div> 
				</form>
              </div>

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
              <h4 class="modal-title"  >Delete Room Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to Delete Room Class "<b id="class_name_2"></b>" ?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="class_id" id="class_id_2"/>
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


<!-- jQuery UI -->
<script src="../_source/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../_source/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>


<!-- DataTables -->
<script src="../_source/plugins/datatables/jquery.dataTables.js"></script>
<script src="../_source/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../_source/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_source/dist/js/demo.js"></script>
<!-- page script -->

	<script type="text/javascript">
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


	<script type="text/javascript">
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


	<script type="text/javascript">

  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>




	<script type="text/javascript">
	$(function(){
		$(".open-EditDialog").click(function(){
		$('#class_id').val($(this).data('class_id'));
		$('#class_name').val($(this).data('class_name'));
	  
		$('#class_description').val($(this).data('class_description'));
		$('#room_features_1').val($(this).data('room_features_1'));
		$('#room_features_2').val($(this).data('room_features_2'));
		$('#room_features_3').val($(this).data('room_features_3'));
	  
		$('#weekend_price').val($(this).data('weekend_price'));
		$('#weekday_price').val($(this).data('weekday_price'));
	  
	  
	  /////////AJAX FETCH ALL OLD PHOTOS/////////////
	  
	  
		var class_id = $(this).data('class_id');

		
		var data = 'class_id='+class_id;

		$.ajax({

		type : 'POST',
		url  : 'ajax_fetch_room_class_photos.php',
		data : data,

   beforeSend: function(data)
			  		{
					$("#loader_santhus").show();
		           	},

		success :  function(data)
				   {
					$("#loader_santhus").hide();
				    $('#preview_2').append(data);
					$('#modal-edit').modal('toggle');
 
					
				   }
		});
		return false;
		
	  /////////END AJAX FETCH ALL OLD PHOTOS/////////////
	

   });
});

</script>


	<script type="text/javascript">
	$(function(){
		$(".open-DeleteDialog").click(function(){
		$('#class_id_2').val($(this).data('class_id'));
		$("#class_name_2").html($(this).data('class_name'));

		});
	});

</script>



	<script type="text/javascript">
	//AJAX FOR CREATING NEW ROOM CLASS
	$(document).ready(function()
	{


		$(document).on('submit', '#form_new_room_class', function()
		{

		//var fn = $("#fname").val();
		//var ln = $("#lname").val();

		//var data = 'fname='+fn+'&lname='+ln;

		var data = $(this).serialize();


		$.ajax({

		type : 'POST',
		url  : 'ajax_new_room_class.php',
		data : data,
		
  beforeSend: function(data)
			  		{
					$("#loader_santhus").show();
		           	},

		success :  function(data)
				   {					   
					$("#div_room_class_information").hide();
					$("#div_upload_room_class_photos").show();
					
					$("#loader_santhus").hide();
					$('#last_room_class_id').val(data);
				   }
				   
		});
		return false;
	});
});
</script>





	<script type="text/javascript">
	//AJAX FOR UPLOADING ROOM CLASS PHOTOS FOR NEW ROOM CLASS
    $(document).ready(function(){
	  $('#input_upload').change(function(){

	    var fd = new FormData();
	    var files = $('#input_upload')[0].files[0];
	    fd.append('file',files);
		
 
		var room_class_id =  document.getElementById("last_room_class_id").value;
		fd.append('room_class_id',room_class_id);
 		
 
	    // AJAX request
	    $.ajax({
	      url: 'ajax_upload_room_class_photos.php',
	      type: 'post',
	      data: fd,
	      contentType: false,
	      processData: false,

  beforeSend: function(response)
			  		{
					$("#loader_santhus").show();
		           	},

		success :  function(response)
				   {					   
					$("#loader_santhus").hide();
					 if(response == 0){   alert('Error: Photo not uploaded');  }else{ $('#preview').prepend(response);  }
					 document.getElementById("input_upload").value = "";

				   }
				   
	    });
	 
	  });
});
</script>



	<script type="text/javascript">
	//AJAX FOR EDITING EXISITNG ROOM CLASS
	$(document).ready(function()
	{


		$(document).on('submit', '#form_edit_room_class', function()
		{

		//var fn = $("#fname").val();
		//var ln = $("#lname").val();

		//var data = 'fname='+fn+'&lname='+ln;

		var data = $(this).serialize();


		$.ajax({

		type : 'POST',
		url  : 'ajax_edit_room_class.php',
		data : data,
		
  beforeSend: function(data)
			  		{
					$("#loader_santhus").show();
		           	},

		success :  function(data)
				   {					   
					$("#edit_div_room_class_information").hide();
					$("#edit_div_upload_room_class_photos").show();
					
					$("#loader_santhus").hide();
					$('#last_room_class_id').val(data);
				   }
				   
		});
		return false;
	});
});
</script>





	<script type="text/javascript">
	//AJAX FOR UPLOADING ROOM CLASS PHOTOS FOR EXISITNG ROOM CLASS
    $(document).ready(function(){
	  $('#input_upload_2').change(function(){

	    var fd = new FormData();
	    var files = $('#input_upload_2')[0].files[0];
	    fd.append('file',files);
		
 
		var room_class_id =  document.getElementById("class_id").value;
		fd.append('room_class_id',room_class_id);
 		
 
	    // AJAX request
	    $.ajax({
	      url: 'ajax_upload_room_class_photos.php',
	      type: 'post',
	      data: fd,
	      contentType: false,
	      processData: false,

  beforeSend: function(response)
			  		{
					$("#loader_santhus").show();
		           	},

		success :  function(response)
				   {					   
					$("#loader_santhus").hide();
					 if(response == 0){   alert('Error: Photo not uploaded');  }else{ $('#preview_2').prepend(response);  }
					 document.getElementById("input_upload_2").value = "";

				   }
				   
	    });
	 
	  });
});
</script>



	<script type="text/javascript">

	// dynamic activity when u close modal
	$(document).on('hidden.bs.modal', '.reload_modal', function (event) {
	 location.reload();
	});


	</script>
  
  
  
	<script type="text/javascript">
  function delete_photo(rooms_class_photos_id) {
       var r = confirm("Delete This Photo?");
		if (r == true)
		{
		document.getElementById(rooms_class_photos_id).style.display = "none"; 
			  
		/////////AJAX DELETE ROOM CLASS PHOTO/////////////
	  

		
		var data = 'rooms_class_photos_id='+rooms_class_photos_id;

		$.ajax({

		type : 'POST',
		url  : 'ajax_delete_room_class_photos.php',
		data : data,

			beforeSend: function(data)
						{
						$("#loader_santhus").show();
						},

			success :  function(data)
						{
						$("#loader_santhus").hide();
				
						}
				});
				return false;
		
		/////////END AJAX DELETE ROOM CLASS PHOTO/////////////
		}
		else
		{
		//DO NOTHING
		}

   }
  </script>



 
  <script>
$(window).on('load', function(){

    $('#loader_santhus').hide();
  });
  
</script>

</body>
</html>

 

<?php
if(isset($_POST["edit"]))
{

  $class_id						=			clean_input($_POST["class_id"]);
  $class_name					=			clean_input($_POST['class_name']);
  $class_description			=			clean_input($_POST['class_description']);
  $room_features_1				=			clean_input($_POST['room_features_1']);
  $room_features_2				=			clean_input($_POST['room_features_2']);
  $room_features_3				=			clean_input($_POST['room_features_3']);
  $weekday_price				=			clean_input($_POST['weekday_price']);
  $weekend_price				=			clean_input($_POST['weekend_price']);
  



 mysqli_query($con,"UPDATE room_class SET 	class_name			= 			'$class_name',
											class_description	= 			'$class_description',
											room_features_1		=			'$room_features_1',
											room_features_2		=			'$room_features_2',
											room_features_3		=			'$room_features_3',											
											weekday_price		= 			'$weekday_price',
											weekend_price		= 			'$weekend_price'  WHERE id = '$class_id'");

 header("location: ?notif=Room+Class+Information+has+been+Modified");

}

?>



<?php
if(isset($_POST["delete"]))
{

  $class_id						=			clean_input($_POST["class_id"]);
 
		mysqli_query($con,"DELETE FROM room_class WHERE id='$class_id'") or die(mysqli_error($con));


 header("location: ?notif=Room+Class+has+been+Deleted");

}

?>


