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


		$class_id	=	clean_input($_POST["class_id"]);
 
		
		$query_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$class_id'")) or die(mysqli_error($con));
		$class_name				=			 $query_room_class['class_name'];
  
						
 		$query_rooms_class_photos=mysqli_query($con,"SELECT * FROM rooms_class_photos WHERE room_class_id='$class_id 'ORDER BY id DESC");
		while($query_row_rooms_class_photos=mysqli_fetch_array($query_rooms_class_photos))
		{
		$rooms_class_photos_id		=			 $query_row_rooms_class_photos['id']; 
		$photo_src					=			 $query_row_rooms_class_photos['photo_src']; 
		$room_class_id				=			 $query_row_rooms_class_photos['room_class_id']; 
						

		echo 	"<div id='$rooms_class_photos_id' class='filtr-item col-sm-2' data-category='2, 4' data-sort='black sample'>
				<a href='../dir_room_photos/$photo_src' data-toggle='lightbox' data-title='$class_name'>
				<img src='../dir_room_photos/$photo_src' style='height:53px;' class='img-fluid mb-2' alt='$class_name'/>
				</a>
				<button onclick='delete_photo(this.name); return false;'  name='$rooms_class_photos_id' type='button' 
				class='btn btn-danger btn-sm btn-block'> Delete </button>
				</div>"; 	
							
 		} 
 
 
 
 ?>
 