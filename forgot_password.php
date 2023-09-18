<?php
include("set.php");
include("functions.php");

 /*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $head_title; ?> </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" href="vendor/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
.forgot_password{}

.forgot_password:hover {
   color: blue;
}

</style>

</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					VELITECHS HOTEL
				</span>
				<form action="" method="POST" class="login100-form validate-form p-b-33 p-t-5">
				<br/>
<center>				
<h3>RECOVER PASSWORD</h3>
</center>				

<hr/>
					<div class="wrap-input100 validate-input" data-validate = "Enter Address">
						<input class="input100" type="email" name="email_address" placeholder="Email name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

	 

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" name="login" class="login100-form-btn">
							RECOVER PASSWORD
						</button>
 
					</div>
						<br/>
						<center>
						<a href="admin06_login.php" class="forgot_password"><b>Login</b></a>
						</center>
 
							
				</form>
			</div>
		</div>
	</div>


<?php 

if(isset($_GET["msg"])){
		
 $current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 //removeQueryStringParameter
 
 
    $parsedUrl = parse_url($current_link);
    $query = array();

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $query);
        unset($query[$var_remove]);
    }

    $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
    $query = !empty($query) ? '?'. http_build_query($query) : '';

   $new_link = $parsedUrl['scheme']. '://'. $parsedUrl['host']. $path. $query;
  
   echo "<script>window.history.pushState('object or string', 'Title', '$new_link'); </script>";
  

	?>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">NOTICE!</h4>
        </div>
        <div class="modal-body">
          <p><?php echo $_GET["msg"]; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
<?php } ?>
  
  
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
  <script src="vendor/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<?php if(isset($_GET["msg"])){ ?>

   <script >
   $('#myModal').modal('show');
   
      </script >
	  
<?php } ?>

</body>
</html>


