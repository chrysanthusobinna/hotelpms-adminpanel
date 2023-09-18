<?php

/*
PROJECT: HOTEL PROPERTY MANAGEMENT SYSTEM ADMIN

DEVELOPER: CHRYSANTHUS OBINNA CHIAGWAH

LINKEDIN: HTTPS://WWW.LINKEDIN.COM/IN/CHRYSANTHUS-OBINNA/

PERSONAL EMAIL: CHRYSANTHUSOBINNA@GMAIL.COM

PHONE NUMBER: +44 7765 093130
 
*/

 	//GET no_current_logged

	$current_time_x = time();

	$no_current_logged = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE checking_in_date < '$current_time_x' AND checkin_staff !='NULL' AND checkout_staff ='NULL'"));

 
 
 
	//GET no_today_check_in
	$q_no_today_check_in=mysqli_query($con,"SELECT * FROM bookings WHERE cancel_staff='NULL'");
	$no_today_check_in =0;
	$total_today_check_in =0;
	
		while($query_no_today_check_in	=	mysqli_fetch_array($q_no_today_check_in))
		{
			$var_checking_in_date		=			 clean_output($query_no_today_check_in['checking_in_date']);		
			$var_checkin_staff_x		=			 clean_output($query_no_today_check_in['checkin_staff']);		
			$var_checking_in_date_x		= 			 clean_output(date('jS M Y',(int)$var_checking_in_date));	
			$var_todays_date			=			 clean_output(date('jS M Y',time()));
  
					if($var_checking_in_date_x == $var_todays_date)
					{
					$total_today_check_in++;
					}

					if(($var_checking_in_date_x == $var_todays_date) && ($var_checkin_staff_x != "NULL"))
					{
					$no_today_check_in++;
					}

		}


 
 
	//GET no_today_check_out
	$q_no_today_check_out=mysqli_query($con,"SELECT * FROM bookings");
	$no_today_check_out =0;
	$total_today_check_out=0;
		while($query_no_today_check_out	=	mysqli_fetch_array($q_no_today_check_out))
		{
			$var_checking_out_date		=			 clean_output($query_no_today_check_out['checking_out_date']);		
			$var_checkout_staff_x		=			 clean_output($query_no_today_check_out['checkout_staff']);		
			$var_checking_out_date_x	= 			 clean_output(date('jS M Y',(int)$var_checking_out_date));	
			$var_todays_date			=			 clean_output(date('jS M Y',time()));
  
					if($var_checking_out_date_x == $var_todays_date)
					{
					$total_today_check_out++;
					}

					if(($var_checking_out_date_x == $var_todays_date) && ($var_checkout_staff_x != "NULL"))
					{
					$no_today_check_out++;
					}
					
		}
 
 
 
 
 
//getting stats for room current information

	$santhus_query_hotel_rooms=mysqli_query($con,"SELECT * FROM hotel_rooms ORDER BY room_number ASC") or die(mysqli_error($con));

		$no_total_room		=		mysqli_num_rows($santhus_query_hotel_rooms);
		$no_occupied_rooms	=		0;


	while($santhus_query_hotel_rooms_x=mysqli_fetch_array($santhus_query_hotel_rooms))
	{
	$santhus_room_number				=			 $santhus_query_hotel_rooms_x['room_number'];

	$santhus_current_time_xxx = time();

		$dquery					=	mysqli_query($con,"SELECT * FROM bookings WHERE checking_in_date < '$santhus_current_time_xxx' AND checking_out_date > '$santhus_current_time_xxx' AND room_number = '$santhus_room_number' AND cancel_staff = 'NULL' AND checkout_staff = 'NULL'");
		$santhus_query_room_book = mysqli_fetch_assoc($dquery);
		
		if(mysqli_num_rows($dquery) > 0 ){

 		$santhus_reference_no						=			$santhus_query_room_book['reference_no'];		
		
		if(!empty($santhus_reference_no))
		{
			//OCCUPIED
			$no_occupied_rooms++;

 			
		}
		else
		{
			//VACANT
 
		}
		}
		
	} 



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////OTHER STATS CALCS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		


 
	//GET amount_of_bookings_sold_today
	$q_amount_of_bookings_sold_today=mysqli_query($con,"SELECT * FROM bookings WHERE cancel_staff='NULL'");
 
	$amount_of_bookings_sold_today =0;
	
		while($query_amount_of_bookings_sold_today	=	mysqli_fetch_array($q_amount_of_bookings_sold_today))
		{
			$var_grand_total_amount_xx			=			 clean_output($query_amount_of_bookings_sold_today['grand_total_amount']);		
			$var_date_of_booking_xx		=			 clean_output($query_amount_of_bookings_sold_today['date_of_booking']);		
 			$var_date_of_booking_xx		= 			 clean_output(date('jS M Y',(int)$var_date_of_booking_xx));	
			$var_todays_date			=			 clean_output(date('jS M Y',time()));
  
					if($var_date_of_booking_xx == $var_todays_date)
					{
 					$amount_of_bookings_sold_today			+=			$var_grand_total_amount_xx;
					
					}

		}
		
		$amount_of_bookings_sold_today 		=	"&#163;".number_format($amount_of_bookings_sold_today); 

 


	//GET amount_of_bookings_sold_yesterday
	$q_amount_of_bookings_sold_yesterday=mysqli_query($con,"SELECT * FROM bookings WHERE cancel_staff='NULL'");
 
	$amount_of_bookings_sold_yesterday =0;
	
		while($query_amount_of_bookings_sold_yesterday	=	mysqli_fetch_array($q_amount_of_bookings_sold_yesterday))
		{
			$var_grand_total_amount_xxx			=			 clean_output($query_amount_of_bookings_sold_yesterday['grand_total_amount']);		
			$var_date_of_booking_xxx		=			 clean_output($query_amount_of_bookings_sold_yesterday['date_of_booking']);

			$time_yesterday_x				=			 (time() - 86400);	
			
 			$var_date_of_booking_xxx		= 			 clean_output(date('jS M Y',(int)$var_date_of_booking_xxx));	
			$var_todays_date				=			 clean_output(date('jS M Y',(int)$time_yesterday_x));
  
					if($var_date_of_booking_xxx == $var_todays_date)
					{
 					$amount_of_bookings_sold_yesterday			+=			$var_grand_total_amount_xxx;
					
					}

		}
		
		$amount_of_bookings_sold_yesterday 		=	"&#163;".number_format($amount_of_bookings_sold_yesterday); 

 




	//GET amount_of_bookings_sold_current_week

		$week_start	= date("Y-m-d", strtotime('monday this week'));   

		$week_end	=  date("Y-m-d", strtotime('sunday this week'));
	
		$week_start	=	strtotime($week_start);
	
		$week_end	=	strtotime($week_end);

	 
	$q_amount_of_bookings_sold_current_week=mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$week_start' AND  date_of_booking <= '$week_end'  AND cancel_staff='NULL'");
 
	$amount_of_bookings_sold_current_week =0;
	
		while($query_amount_of_bookings_sold_current_week	=	mysqli_fetch_array($q_amount_of_bookings_sold_current_week))
		{
			$var_grand_total_amount_xxxx			=			 clean_output($query_amount_of_bookings_sold_current_week['grand_total_amount']);		
			 
 
 					$amount_of_bookings_sold_current_week			+=			$var_grand_total_amount_xxxx;
					
			 

		}
		
		$amount_of_bookings_sold_current_week 		=	"&#163;".number_format($amount_of_bookings_sold_current_week); 
	

	//GET amount_of_bookings_sold_current_month

		$month_start	=   date("Y-m-d", strtotime('first day of this month'));   

		$month_end		=   date("Y-m-d", strtotime('last day of this month'));
 
		$month_start	=	strtotime($month_start); 
	
		$month_end		=	strtotime($month_end);
 	
		
			 
	$q_amount_of_bookings_sold_current_month=mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$month_start' AND  date_of_booking <= '$month_end'  AND cancel_staff='NULL'");
 
	$amount_of_bookings_sold_current_month =0;
	
		while($query_amount_of_bookings_sold_current_month	=	mysqli_fetch_array($q_amount_of_bookings_sold_current_month))
		{
			$var_grand_total_amount_xxxxx			=			 clean_output($query_amount_of_bookings_sold_current_month['grand_total_amount']);		
			 
 
 					$amount_of_bookings_sold_current_month			+=			$var_grand_total_amount_xxxxx;
					
			 

		}
		
		$amount_of_bookings_sold_current_month 		=	"&#163;".number_format($amount_of_bookings_sold_current_month); 		
		
		


	//GET amount_of_bookings_sold_current_year

		$year_start		=   date('Y-m-d', strtotime('first day of january this year'));

		$year_end		=   date('Y-m-d', strtotime('last day of december this year'));
 
		$year_start		=	strtotime($year_start); 
	
		$year_end		=	strtotime($year_end);		

 	$q_amount_of_bookings_sold_current_year=mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$year_start' AND  date_of_booking <= '$year_end'  AND cancel_staff='NULL'");
 
	$amount_of_bookings_sold_current_year =0;
	
		while($query_amount_of_bookings_sold_current_year	=	mysqli_fetch_array($q_amount_of_bookings_sold_current_year))
		{
			$var_grand_total_amount_xxxxxx			=			 clean_output($query_amount_of_bookings_sold_current_year['grand_total_amount']);		
			 
 
 					$amount_of_bookings_sold_current_year			+=			$var_grand_total_amount_xxxxxx;
					
			 

		}
		
		$amount_of_bookings_sold_current_year 		=	"&#163;".number_format($amount_of_bookings_sold_current_year); 		
		
		
	


//getting bar chat statics value

$year_now = date('Y',time());

$jan_start 	=   strtotime("$year_now-01-01");
$jan_end	=   strtotime(date('t M Y',strtotime("$year_now-01-01")));

$feb_start 	=  strtotime("$year_now-02-01");
$feb_end	=   strtotime(date('t M Y',strtotime("$year_now-02-01")));

$mar_start	=  strtotime("$year_now-03-01");
$mar_end	=   strtotime(date('t M Y',strtotime("$year_now-03-01")));

$apr_start	=  strtotime("$year_now-04-01");
$apr_end	=   strtotime(date('t M Y',strtotime("$year_now-04-01")));

$may_start	=  strtotime("$year_now-05-01");
$may_end	=   strtotime(date('t M Y',strtotime("$year_now-05-01")));

$jun_start	=  strtotime("$year_now-06-01");
$jun_end	=   strtotime(date('t M Y',strtotime("$year_now-06-01")));

$jul_start	=  strtotime("$year_now-07-01");
$jul_end	=  strtotime(date('t M Y',strtotime("$year_now-07-01")));

$aug_start	=  strtotime("$year_now-08-01");
$aug_end	=  strtotime(date('t M Y',strtotime("$year_now-08-01")));

$sep_start	=  strtotime("$year_now-09-01");
$sep_end	=  strtotime(date('t M Y',strtotime("$year_now-09-01")));

$oct_start	=  strtotime("$year_now-10-01");
$oct_end	=  strtotime(date('t M Y',strtotime("$year_now-10-01")));

$nov_start	=  strtotime("$year_now-11-01");
$nov_end	=  strtotime(date('t M Y',strtotime("$year_now-11-01")));

$dec_start	=  strtotime("$year_now-12-01");
$dec_end	=  strtotime(date('t M Y',strtotime("$year_now-12-01")));

 
$stat_jan = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$jan_start' AND  date_of_booking <= '$jan_end'"));
$stat_feb = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$feb_start' AND  date_of_booking <= '$feb_end'"));
$stat_mar = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$mar_start' AND  date_of_booking <= '$mar_end'"));
$stat_apr = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$apr_start' AND  date_of_booking <= '$apr_end'"));
$stat_may = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$may_start' AND  date_of_booking <= '$may_end'"));
$stat_jun = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$jun_start' AND  date_of_booking <= '$jun_end'"));
$stat_jul = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$jul_start' AND  date_of_booking <= '$jul_end'"));
$stat_aug = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$aug_start' AND  date_of_booking <= '$aug_end'"));
$stat_sep = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$sep_start' AND  date_of_booking <= '$sep_end'"));
$stat_oct = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$oct_start' AND  date_of_booking <= '$oct_end'"));
$stat_nov = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$nov_start' AND  date_of_booking <= '$nov_end'"));
$stat_dec = mysqli_num_rows(mysqli_query($con,"SELECT * FROM bookings WHERE date_of_booking >= '$dec_start' AND  date_of_booking <= '$dec_end'"));

	

//getting donot chat statics value

$sum_months_vals=$stat_jan + $stat_feb + $stat_mar + $stat_apr + $stat_may + $stat_jun + $stat_jul + $stat_aug + $stat_sep + $stat_oct + $stat_nov + $stat_dec;


	if($stat_jan > 0){$donot_jan	=	($stat_jan/$sum_months_vals) * 100;} else {$donot_jan = 1;}
	if($stat_feb > 0){$donot_feb	=	($stat_feb/$sum_months_vals) * 100;} else {$donot_feb = 1;}
	if($stat_mar > 0){$donot_mar	=	($stat_mar/$sum_months_vals) * 100;} else {$donot_mar = 1;}
	if($stat_apr > 0){$donot_apr	=	($stat_apr/$sum_months_vals) * 100;} else {$donot_apr = 1;}
	if($stat_may > 0){$donot_may	=	($stat_may/$sum_months_vals) * 100;} else {$donot_may = 1;}	
	if($stat_jun > 0){$donot_jun	=	($stat_jun/$sum_months_vals) * 100;} else {$donot_jun = 1;}
	if($stat_jul > 0){$donot_jul	=	($stat_jul/$sum_months_vals) * 100;} else {$donot_jul = 1;}
	if($stat_aug > 0){$donot_aug	=	($stat_aug/$sum_months_vals) * 100;} else {$donot_aug = 1;}
	if($stat_sep > 0){$donot_sep	=	($stat_sep/$sum_months_vals) * 100;} else {$donot_sep = 1;}
	if($stat_oct > 0){$donot_oct	=	($stat_oct/$sum_months_vals) * 100;} else {$donot_oct = 1;}
	if($stat_nov > 0){$donot_nov	=	($stat_nov/$sum_months_vals) * 100;} else {$donot_nov = 1;}
	if($stat_dec > 0){$donot_dec	=	($stat_dec/$sum_months_vals) * 100;} else {$donot_dec = 1;}
 	 


 


?>













       <!-- Small boxes (Stat box) -->
        <div class="row" id="small_boxes">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $no_current_logged;   ?></h3>

                <p>Current Logged</p>
              </div>
              <div class="icon">
                <i class="icon ion-ios-home"></i>
              </div>
              <a href="manage_bookings.php?sort=current_bookings" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> 
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $no_today_check_in; ?> / <?php echo $total_today_check_in; ?></h3>

                <p>Today's Check In</p>
              </div>
              <div class="icon">
                <i class="icon ion-arrow-return-left"></i>
              </div>
			 <a href="manage_bookings.php?sort=today_checkin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $no_today_check_out; ?> / <?php echo $total_today_check_out; ?></h3>

                <p>Today's Check-Out</p>
              </div>
              <div class="icon">
                <i class="icon ion-arrow-return-right"></i>
              </div>
			<a href="manage_bookings.php?sort=today_checkout" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $no_occupied_rooms; ?>/<?php echo $no_total_room; ?></h3>

                <p>Current Rooms information</p>
              </div>
              <div class="icon">
                <i class="icon ion-ios-home"></i>
              </div>
			<a href="manage_bookings_sort_rooms_status.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
		
