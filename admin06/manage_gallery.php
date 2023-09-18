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
		if(($access_website_management_x == '1') || ($main_role_x == 'general_admin'))
		{
		allow_access();
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
	
	var element_ul = document.getElementById("manage_website");
	element_ul.classList.add("active");

	var element_menu = document.getElementById("manage_website_menu");
	element_menu.classList.add("menu-open");	
	
	var element_child_menu = document.getElementById("manage_gallery");
	element_child_menu.classList.add("active");	

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
            <h1>Manage Photo Gallery </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Photo Gallery </li>
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
                <h3 class="card-title"> <i class="fas fa-image"></i> &nbsp; All Gallery Photos  ( <b><?php echo  mysqli_num_rows($query_hotel_rooms); ?> </b> ) </h3>
                <div class="card-tools">

                  <div class="input-group input-group-sm" >

                    <div class="input-group-append">
                      <button  data-toggle='modal' data-target='#modal-new'  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
					  ADD NEW PHOTO</button>
                    </div>
                  </div>

				</div>
              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
			
			
			 <div class="filter-container p-0 row" >
 
 

		<?php
		$query=mysqli_query($con,"SELECT * FROM gallery ORDER BY id DESC");

		while($row=mysqli_fetch_array($query))
		{
		$gallery_id			  	=			 $row["id"];
		$img_src				=			 $row['img_src'];
		$photo_title			=			 $row['photo_title'];

		?>
 			 
			 <div class="card card-prirary" style="margin:10px;" >
              <div class="card-header"> <h3 class="card-title"><b><?php echo $photo_title; ?></b></h3> </div> <!-- /.card-header -->
              <div class="card-body" style="">
                       <a href="<?php echo "../dir_gallery_photos/".$img_src; ?>" data-toggle="lightbox" data-title="<?php echo $photo_title; ?>">
                        <img style="height:150px;" src="<?php echo "../dir_gallery_photos/".$img_src; ?>" class="img-fluid mb-2" alt="black sample"/>
                      </a>
               </div> <!-- /.card-body -->
              <div class="card-footer"> 


<div class="row">
<div class="col-sm-6">
<button 
data-gallery_id='<?php echo $gallery_id; ?>'
data-gallery_img_src='<?php echo $img_src; ?>'
data-photo_title='<?php echo $photo_title; ?>'

data-toggle='modal' data-target='#modal-edit' 
type="button" class="open-EditDialog  btn btn-info btn-sm btn-block"><i class="fas fa-edit"></i></button>
</div>

<div class="col-sm-6">
<button 
data-gallery_id='<?php echo $gallery_id; ?>'
data-photo_title='<?php echo $photo_title; ?>'
data-toggle='modal' data-target='#modal-delete' 
type="button" class="open-DeleteDialog  btn btn-danger btn-sm btn-block"><i class="fas fa-trash"></i></button>
</div>

</div>


              </div> <!-- /.card-footer-->
            </div>
			
		<?php } ?>
					
            </div>
			
			
			
			</div>
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
		<form action='#' method='POST' enctype='multipart/form-data'>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Gallery Photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Photo Title</b></td>
                      <td><input required  type="text"   name="photo_title"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Upload Photo</b></td>
                      <td><input required  type="file"   name="img_src"   class="form-control"> </td>
                    </tr>
					</table>
					<br/>



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
		<form action='#' method='POST' enctype='multipart/form-data'>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Edit Room Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


				<input type="hidden" name="gallery_id" id="gallery_id"/>

                
				 <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Photo Title</b></td>
                      <td><input required  type="text"   name="photo_title" id="photo_title"  class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Upload Photo</b></td>
                      <td>
					  <input  type="file"   name="img_src"   class="form-control"> 
					  <hr/>
					  <div id="gallery_img_src" >  </div>
					  
					  </td>
                    </tr>
					</table>
					<br/>





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
              <h4 class="modal-title"  >Delete Gallery Photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to Delete  "<b id="photo_title_2"></b>" ?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="gallery_id_2" id="gallery_id_2"/>
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

<!-- jQuery UI -->
<script src="../_source/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../_source/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>




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
      $('#gallery_id').val($(this).data('gallery_id'));
      $('#photo_title').val($(this).data('photo_title'));
	  
	  $('#gallery_img_src').html("<img style='height:200px;' src='../dir_gallery_photos/"+$(this).data('gallery_img_src')+"' class='img-thumbnail' alt='Santhus'>");


   });
});

</script>


  <script>
 $(function(){
   $(".open-DeleteDialog").click(function(){
      $('#gallery_id_2').val($(this).data('gallery_id'));
	  $("#photo_title_2").html($(this).data('photo_title'));

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

 
 				
						 
			$photo_title			 =	clean_input($_POST['photo_title']);
 

		  	$new_img_src			 =	"gallery_photo".time().rand(1000,10000).".jpg";
			$folder					 =	"../dir_gallery_photos/";


			$img_allowed_types		 =	array('.jpg','.gif','.png','.bmp','.jpeg');
			$img_src				 = 	$_FILES["img_src"]["name"];
			$img_ext				 =	substr($img_src, strpos($img_src, '.'), strlen($img_src)-1);



				if(!in_array($img_ext, $img_allowed_types))
				{
				header("location: ?notif_err=New Gallery Photo could not be Added due to bad Image Type!");
				}
				else
				{
					move_uploaded_file($_FILES["img_src"]["tmp_name"], $folder.$img_src);
					
					rename($folder.$img_src,$folder.$new_img_src);

						
 
					mysqli_query($con,"INSERT INTO gallery SET	photo_title		=	'$photo_title',
																img_src			=	'$new_img_src'")or die(mysqli_error($con));
															
					header("location: ?notif=New+Gallery+Photo+Added!");

 					 
				


				}
 

 

}

?>




<?php
if(isset($_POST["edit"]))
{


						 
			$gallery_id				 =	clean_input($_POST['gallery_id']);
			$photo_title			 =	clean_input($_POST['photo_title']);
 

		  	$new_img_src			 =	"gallery_photo".time().rand(1000,10000).".jpg";
			$folder					 =	"../dir_gallery_photos/";


			$img_allowed_types		 =	array('.jpg','.gif','.png','.bmp','.jpeg');
			$img_src				 = 	$_FILES["img_src"]["name"];
			$img_ext				 =	substr($img_src, strpos($img_src, '.'), strlen($img_src)-1);


				if($img_src=="")
				{
					  
					mysqli_query($con,"UPDATE  gallery SET photo_title = '$photo_title' WHERE id='$gallery_id'")or die(mysqli_error($con));
															
					header("location: ?notif=Gallery+Photo+Modified!");
				}
				else
				{

					if(!in_array($img_ext, $img_allowed_types))
					{
					header("location: ?notif_err=New Gallery Photo could not be Added due to bad Image Type!");
					}
					else
					{
					move_uploaded_file($_FILES["img_src"]["tmp_name"], $folder.$img_src);
	 
					//fetch photo url
					$q_old_gallery_photo=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM gallery WHERE id='$gallery_id'")) or die(mysqli_error($con));
					$old_gallery_photo				=			clean_output("../dir_gallery_photos/".$q_old_gallery_photo['img_src']);
  
			
					//delete file from dir
					unlink($old_gallery_photo);	
	 
					
					
					rename($folder.$img_src,$folder.$new_img_src);

						
 
					mysqli_query($con,"UPDATE gallery SET	photo_title		=	'$photo_title',
															img_src			=	'$new_img_src' WHERE id='$gallery_id'")or die(mysqli_error($con));
															
					header("location: ?notif=New+Gallery+Photo+Added!");
					
					
					}
				
				}
 

 
}

?>



<?php
if(isset($_POST["delete"]))
{

  $gallery_id						=			clean_input($_POST["gallery_id_2"]);


		//ftech photo url
 		$q_gallery=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM gallery WHERE id='$gallery_id'")) or die(mysqli_error($con));
		$img_src				=			 clean_output("../dir_gallery_photos/".$q_gallery['img_src']);
  

  
		//delete file from dir
		unlink($img_src);		
		
		
  mysqli_query($con,"DELETE FROM gallery WHERE id='$gallery_id'") or die(mysqli_error($con));


 header("location: ?notif=Gallery+Photo+has+been+Deleted");

}

?>



