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
  <link rel="stylesheet" href="_source/vendor/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_source/fonts/font-awesome-4.7.0/_source/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_source/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_source/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_source/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_source/vendor/animsition/_source/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_source/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_source/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_source/css/util.css">
	<link rel="stylesheet" type="text/css" href="_source/css/main.css">
<!--===============================================================================================-->
<style>
.forgot_password{}

.forgot_password:hover {
   color: blue;
}

</style>

 <link rel="stylesheet" href="css-loader-master/dist/css-loader.css">


</head>
<body>



	<!-- Loader -->
  <div class="loader loader-default is-active" id="loader_santhus" style=""></div>

<div id="login_result"></div>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
				ADMIN PANEL LOGIN
				</span>
				<form action="" method="POST" id="login_form" class="login100-form validate-form p-b-33 p-t-5">
				
							<div class="wrap-input100 validate-input" data-validate = "Enter Address">
						<input class="input100" type="email" name="email_address" placeholder="Email name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
 
					</div>
						<br/>
						<center>
						<a href="forgot_password.php" class="forgot_password"><b>Forgot Password</b></a>
						</center>
				

							
				</form>
			</div>
		</div>
	</div>


<?php 

if(isset($_GET["msg"])){
		
 $current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 //removeQueryStringParameter
 		$var_remove="msg";

 
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
  <script src="_source/vendor/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="_source/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="_source/vendor/bootstrap/js/popper.js"></script>
  <script src="_source/vendor/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="_source/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="_source/vendor/daterangepicker/moment.min.js"></script>
	<script src="_source/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="_source/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<?php if(isset($_GET["msg"])){ ?>

   <script >
   $('#myModal').modal('show');
   
      </script >
	  
<?php } ?>





	<script type="text/javascript">
	//AJAX LOGIN
	$(document).ready(function()
	{


		$(document).on('submit', '#login_form', function()
		{

		//var fn = $("#fname").val();
		//var ln = $("#lname").val();

		//var data = 'fname='+fn+'&lname='+ln;

		var data = $(this).serialize();


		$.ajax({

		type : 'POST',
		url  : 'ajax_login.php',
		data : data,
		
  beforeSend: function(data)
			  		{
					$("#loader_santhus").show();
		           	},

		success :  function(data)
				   {
					
					$('#login_result').append(data);

					$("#loader_santhus").hide();
				   }
				   
		});
		return false;
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




 