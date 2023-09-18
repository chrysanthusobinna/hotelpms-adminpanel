<?php

/*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/


  if(isset($_GET["notif"]) || isset($_GET["notif_err"])){


 if(isset($_GET["notif"])){
		
		$notif	=	$_GET["notif"];
	 
	 	echo"
		<div class='alert alert-success alert-dismissible'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<i class='far fa-check-circle'></i> $notif 
		</div>";
		
		$var_remove="notif";
		
	}
	else
	{
		
		$notif_err	=	$_GET["notif_err"];
	 
	 	echo"
		<div class='alert alert-danger alert-dismissible'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<i class='fas fa-exclamation-circle'></i> $notif_err 
		</div>";		
		
		$var_remove="notif_err";

	}
		
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
  }

?>