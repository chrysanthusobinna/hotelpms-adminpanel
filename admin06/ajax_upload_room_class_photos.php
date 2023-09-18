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

//PARENT FILE setup_room_class.php
 


 
			$room_class_id				 =	clean_input($_POST["room_class_id"]);
			
			$query_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$room_class_id'")) or die(mysqli_error($con));
			$class_name				=			 $query_room_class['class_name'];
  
						
						
		  	$new_photo_src			 =	"room_photo".time().rand(1000,10000).".jpg";
			$folder					 =	"../dir_room_photos/";


			$img_allowed_types		 =	array('.jpg','.gif','.png','.bmp','.jpeg');
			$photo_src				 = 	$_FILES["file"]["name"];
			$img_ext				 =	substr($photo_src, strpos($photo_src, '.'), strlen($photo_src)-1);



				if(!in_array($img_ext, $img_allowed_types))
				{
				echo "0";
				}
				else
				{
					if(move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$photo_src))
					{
					rename($folder.$photo_src,$folder.$new_photo_src);

					mysqli_query($con,"INSERT INTO rooms_class_photos SET room_class_id	=  '$room_class_id', photo_src	=	'$new_photo_src'");
		
					
					$qry_rooms_class_photos=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM rooms_class_photos ORDER BY id DESC LIMIT 1"));
					$rooms_class_photos_id				=			 $qry_rooms_class_photos['id']; //getting last id
					
					echo 	"<div id='$rooms_class_photos_id' class='filtr-item col-sm-2' data-category='2, 4' data-sort='black sample'>
							<a href='../dir_room_photos/$new_photo_src' data-toggle='lightbox' data-title='$class_name'>
							<img src='../dir_room_photos/$new_photo_src' style='height:53px;' class='img-fluid mb-2' alt='$class_name'/>
							</a>
							<button onclick='delete_photo(this.name); return false;'  name='$rooms_class_photos_id' type='button' 
							class='btn btn-danger btn-sm btn-block'> Delete </button>
							</div>"; 	
																
					}
					else
					{
					echo "0";
					}
				


				}
 

?>