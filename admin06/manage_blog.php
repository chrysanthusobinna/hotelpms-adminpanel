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
	
	var element_child_menu = document.getElementById("manage_blog");
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
            <h1>Manage Website Blog Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Website Blog Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


 
<?php $query_blog=mysqli_query($con,"SELECT * FROM blog ORDER BY id DESC") or die(mysqli_error($con)); ?>



      <div class="row">
        <div class="col-12">

          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-rss-square"></i>  &nbsp; All Blog Post  ( <b><?php echo  mysqli_num_rows($query_blog); ?> </b> ) </h3>
                <div class="card-tools">

                  <div class="input-group input-group-sm" >

                    <div class="input-group-append">
                      <button  data-toggle='modal' data-target='#modal-new'  type="button"  class="btn btn-default"><i class="fas fa-plus"></i>
					  ADD NEW POST</button>
                    </div>
                  </div>

				</div>
              </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Topic</th>
                      <th>Post</th>
                      <th>#</th>
                    </tr>
                  </thead>

                  <tbody>



<?php


while($query_blog_x=mysqli_fetch_array($query_blog))
{
	$blog_post_id				=			 $query_blog_x['id'];
	$blog_title					=			 $query_blog_x['blog_title'];
	$blog_content				=			 $query_blog_x['blog_content'];
	$blog_photo					=			 $query_blog_x['blog_photo'];
	$date_posted				=			 $query_blog_x['date_posted'];

	$date_posted				=			date_create($date_posted);
	$date_posted				=			date_format($date_posted,"h:i A - jS M Y");

	$blog_content_x				= 			substr($blog_content, 0, 30)."...";
	
	

?>
					  <tr>
                      <td><?php echo $blog_title; ?></td>
                      <td><?php echo $blog_content_x; ?></td>
					  <td>

                      <button
					  data-blog_post_id='<?php echo $blog_post_id; ?>'
					  data-blog_title='<?php echo $blog_title; ?>'
					  data-blog_content='<?php echo $blog_content; ?>'
					  data-blog_photo='<?php echo $blog_photo; ?>'
					  
					  data-toggle='modal' data-target='#modal-edit' type="button"  class="open-EditDialog btn-sm btn btn-success"><i class="fas fa-edit"></i></button>

                      <button
					  data-blog_post_id='<?php echo $blog_post_id; ?>'
					  data-blog_title='<?php echo $blog_title; ?>'
					  
					  data-toggle='modal' data-target='#modal-delete'  type="button"  class="open-DeleteDialog btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>



					  </td>
                      </tr>
<?php } ?>


<?php if((mysqli_num_rows($query_blog))==0){ ?>

					  <tr>
                      <td>No Record(s)</td>
                      <td></td>
                      <td></td>
                      </tr>

<?php } ?>
                  </tbody>


                <tfoot>
                <tr>
                      <th>Topic</th>
                      <th>Post</th>
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
        <div class="modal-dialog modal-xl">
		<form action='#' method='POST' enctype='multipart/form-data'>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Add New Blog Post</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			
 
 
            <div class="row">
            <div class="col-md-6">
            <div class="card card-secondary" style="height:400px;">
            <div class="card-header"> <h3 class="card-title">Blog Post</h3> </div> <!-- /.card-header -->

            <div class="card-body" >

                 <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Blog Topic</b></td>
                      <td><input required  type="text"   name="blog_title"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Blog Content</b></td>
                      <td><textarea col='50' required   name="blog_content"   class="form-control"></textarea> </td>
                    </tr>					
					</table>

            </div> <!-- /.card-body -->
            </div> <!-- /.card -->

            </div>


            <div class="col-md-6">

            <div class="card card-secondary" style="height:400px;">
            <div class="card-header"> <h3 class="card-title">Blog Photo</h3> </div> <!-- /.card-header -->
            <div class="card-body">
			
			                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Upload</b></td>
                      <td><input required  type="file"  name="blog_photo"   class="form-control"> </td>
                    </tr>

                    <tr>
                      <td><b>Photo</b></td>
                      <td> 		<div > <img style="height:200px;" src="../blog_photo/_blog_pos_photo.png" class="img-thumbnail" alt="Cinque Terre">  </div>
				</td>
                    </tr>
   			
					</table>
					
 
            </div> <!-- /.card -->


 
            </div> <!-- /.col-md-9 -->

            </div><!-- /.row -->
 





            </div>
			
			
			
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
        <div class="modal-dialog modal-xl">
		<form action='#' method='POST' enctype='multipart/form-data'>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"  >Edit Blog Post</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


				<input type="hidden" name="blog_post_id" id="blog_post_id"/>
 
            <div class="row">
            <div class="col-md-6">
            <div class="card card-secondary" style="height:400px;">
            <div class="card-header"> <h3 class="card-title">Blog Post</h3> </div> <!-- /.card-header -->

            <div class="card-body" >

                 <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Blog Topic</b></td>
                      <td><input required  type="text" id="blog_title"  name="blog_title"   class="form-control"> </td>
                    </tr>
                    <tr>
                      <td><b>Blog Content</b></td>
                      <td><textarea col='50' required id="blog_content"  name="blog_content"   class="form-control"></textarea> </td>
                    </tr>					
					</table>

            </div> <!-- /.card-body -->
            </div> <!-- /.card -->

            </div>


            <div class="col-md-6">

            <div class="card card-secondary" style="height:400px;">
            <div class="card-header"> <h3 class="card-title">Blog Photo</h3> </div> <!-- /.card-header -->
            <div class="card-body">
			
			                <table class="table table-bordered">
                  <tbody>

                    <tr>
                      <td><b>Change Photo</b></td>
                      <td><input  type="file"  name="blog_photo"   class="form-control"> </td>
                    </tr>

                    <tr>
                      <td><b>Photo</b></td>
                      <td>
					  <div id="blog_img" >  </div>
				</td>
                    </tr>
   			
					</table>
					
 
            </div> <!-- /.card -->


 
            </div> <!-- /.col-md-9 -->

            </div><!-- /.row -->
 





            </div>

			

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
              <h4 class="modal-title"  >Delete Blog Post</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

			<p>Are you Sure you want to the Blog Post with Title  "<b id="blog_title_3"></b>" ?</p>

            </div>
            <div class="modal-footer justify-content-between">
					<form action="" method="POST">
					<input type="hidden" name="blog_post_id_3" id="blog_post_id_3"/>
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
	   
     $('#blog_post_id').val($(this).data('blog_post_id'));
	 

	  $("#blog_title").val($(this).data('blog_title'));
      $('#blog_content').val($(this).data('blog_content'));
		 

      $('#blog_img').html("<img style='height:200px;' src='../blog_photo/"+$(this).data('blog_photo')+"' class='img-thumbnail' alt='Cinque Terre'>");
  
   });
});

</script>


  <script>
 $(function(){
   $(".open-DeleteDialog").click(function(){
	   
      $('#blog_post_id_3').val($(this).data('blog_post_id'));
	  $("#blog_title_3").html($(this).data('blog_title'));
	  


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

						
						 
			$blog_title				 =	clean_input($_POST['blog_title']);
			$blog_content			 =	clean_input($_POST['blog_content']);

			$date_posted			 =	time();
			$date_posted 			 =	date('h:i A - jS M Y',(int)$date_posted);



		  	$new_blog_photo			 =	"blog_photo".time().rand(1000,10000).".jpg";
			$folder					 =	"../blog_photo/";


			$img_allowed_types		 =	array('.jpg','.gif','.png','.bmp','.jpeg');
			$blog_photo				 = 	$_FILES["blog_photo"]["name"];
			$img_ext				 =	substr($blog_photo, strpos($blog_photo, '.'), strlen($blog_photo)-1);



				if(!in_array($img_ext, $img_allowed_types))
				{
				header("location: ?notif_err=New Blog Photo could not be Added due to bad Image Type!");
				}
				else
				{
					move_uploaded_file($_FILES["blog_photo"]["tmp_name"], $folder.$blog_photo);
					
					rename($folder.$blog_photo,$folder.$new_blog_photo);

						
 
					mysqli_query($con,"INSERT INTO blog SET	blog_title		=	'$blog_title',
															blog_photo		=	'$new_blog_photo',
															blog_content	=	'$blog_content',
															date_posted		=	'$date_posted'")or die(mysqli_error($con));
															
					header("location: ?notif=New+Blog+Post+Added!");

 					 
				


				}
 

}

?>




<?php
if(isset($_POST["edit"]))
{
	
 			
						 
			$blog_post_id			 =	clean_input($_POST['blog_post_id']);
			$blog_title				 =	clean_input($_POST['blog_title']);
			$blog_content			 =	clean_input($_POST['blog_content']);

 
		  	$new_blog_photo			 =	"blog_photo".time().rand(1000,10000).".jpg";
			$folder					 =	"../blog_photo/";


			$img_allowed_types		 =	array('.jpg','.gif','.png','.bmp','.jpeg');
			$blog_photo				 = 	$_FILES["blog_photo"]["name"];
			$img_ext				 =	substr($blog_photo, strpos($blog_photo, '.'), strlen($blog_photo)-1);
			
			
				if($blog_photo=="")
				{
  
					mysqli_query($con,"UPDATE  blog SET		blog_title		=	'$blog_title',
															blog_content	=	'$blog_content' WHERE id='$blog_post_id'")or die(mysqli_error($con));
															
					header("location: ?notif=Blog+Post+Modified!");
				}
				else
				{
		 
				
					if(!in_array($img_ext, $img_allowed_types))
					{
					header("location: ?notif_err=New Blog Photo could not be Added due to Bad Image Type!");
					}
					else
					{
						if(move_uploaded_file($_FILES["blog_photo"]["tmp_name"], $folder.$blog_photo))
						{
							
							//fetch photo url
							$q_old_blog=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM blog WHERE id='$blog_post_id'")) or die(mysqli_error($con));
							$old_blog_photo				=			 clean_output("../blog_photo/".$q_old_blog['blog_photo']);
  

							//delete file from dir
							unlink($old_blog_photo);		
		
						rename($folder.$blog_photo,$folder.$new_blog_photo);

						
 
						mysqli_query($con,"UPDATE blog SET		blog_title		=	'$blog_title',
																blog_photo		=	'$new_blog_photo',
																blog_content	=	'$blog_content' WHERE id='$blog_post_id'")or die(mysqli_error($con));
															
						header("location: ?notif=New+Blog+Post+Modified!");

 																
						} 


					}
				}
 
 
}

?>



<?php
if(isset($_POST["delete"]))
{

  $blog_post_id						=			clean_input($_POST["blog_post_id_3"]);
  

 
		//fetch photo url
 		$q_blog=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM blog WHERE id='$blog_post_id'")) or die(mysqli_error($con));
		$blog_photo				=			 clean_output("../blog_photo/".$q_blog['blog_photo']);
  

  
		//delete file from dir
		unlink($blog_photo);		
		

		mysqli_query($con,"DELETE FROM blog WHERE id='$blog_post_id'") or die(mysqli_error($con));


		header("location: ?notif=Blog+Post+has+been+Deleted");

}

?>



