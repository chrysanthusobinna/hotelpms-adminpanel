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

//PARENT FILE setup_hotel_rooms.php


		$room_class_id	=	$_GET["room_class_id"];



 $query_row_room_class=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM room_class WHERE id='$room_class_id'")) or die(mysqli_error($con));

  $class_id					=			 $query_row_room_class['id'];
  $class_name				=			 $query_row_room_class['class_name'];
  $class_description		=			 $query_row_room_class['class_description'];
  $weekday_price			=			 $query_row_room_class['weekday_price'];
  $weekend_price			=			 $query_row_room_class['weekend_price'];

?>

<table class="table table-bordered">
                    <tr>
                      <td><b>Class Description</b></td>
                      <td><textarea disabled name="class_description"     class="form-control"><?php echo $class_description; ?></textarea></td>
                    </tr>
                    <tr>
                      <td><b>Weekday Price (&#163;)</b></td>
                      <td><input disabled  type="number" min="10" name="weekday_price"  value="<?php echo $weekday_price; ?>"  class="form-control"></td>
                    </tr>
                    <tr>
                      <td><b>Weekend Price(&#163;)</b></td>
                      <td><input disabled  type="number" min="10" name="weekend_price"  value="<?php echo $weekend_price; ?>"  class="form-control"> </td>
                    </tr>
                  </tbody>
                </table>
