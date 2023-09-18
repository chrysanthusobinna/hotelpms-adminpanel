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


//PARENT FILE paystack.php



		$reference								=		$_POST["reference"];

		
		//The parameter after verify/ is the transaction reference to be verified
		$url = 'https://api.paystack.co/transaction/verify/'.$reference;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		"Authorization: Bearer sk_test_abb5c19dbb38622a992ce543174e316ee725ed97",
		"Cache-Control: no-cache",
		));


		//send request
		$request = curl_exec($ch);
		//close connection
		curl_close($ch);
		//declare an array that will contain the result 
		$result = array();

		if ($request) {
		$result = json_decode($request, true);
		}
 
		
 		if(array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success'))
		{
		$pay_status					=		"SUCCESSFUL";
		$pay_channel				=		$result['data']["channel"];
  
		
		if($pay_channel				==		"card")
		{
		$pay_channel__txt			=		"Paid Through Card Channel";			
		}
		elseif($pay_channel			==		"bank")
		{
		$pay_channel__txt			=		"Paid Through Bank Channel";				
		}


		$query_bookings_row			=		mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM bookings WHERE reference_no='$reference'"));
		$pay_name					=		clean_output($query_bookings_row["guest_full_name"]);
		
		$pay_phonenumber			=		$result['data']["customer"]["phone"];
		$pay_email_address			=		$result['data']["customer"]["email"];
		$pay_amount					=		number_format($result['data']["amount"],2);
		$currency					=		$result['data']["currency"];
		
		$pay_date					=		date_create($result['data']["paid_at"]);
		$pay_date					=		date_format($pay_date,"h:iA - l,jS M Y");

		$pay_card_last4				=		$result['data']["authorization"]["last4"];
		$pay_card_expiring_date		=		$result['data']["authorization"]["exp_month"]." / ".$result['data']["authorization"]["exp_year"];
		$pay_card_type				=		$result['data']["authorization"]["card_type"];
		$pay_card_bank				=		$result['data']["authorization"]["bank"];
		$pay_country				=		$result['data']["authorization"]["country_code"];
		

							
?>

 
		<div class='alert alert-success alert-dismissible'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<i class='far fa-check-circle'></i> <?php echo $pay_status; ?> 
		</div>
  <center>
		<button type="button"  onclick="print();"  class="btn btn-default">PRINT </button>
 </center>
 <hr/>
 
 

<div class="row">
          <div class="col-md-6">
            <div class="card card-info card-outline">

              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>

					<tr style="width:25%;">
                      <td><b>REFRENCE NUMBER</b></td>
                      <td><input disabled type="text"  value="<?php echo $reference; ?>"   class="form-control">  </td>
                    </tr>	
					
					<tr>
                      <td><b>PAYMENT CHANNEL</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_channel__txt; ?>"   class="form-control">  </td>
                    </tr>						
					<tr>
                      <td><b>NAME</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_name; ?>"   class="form-control"> </td>
                    </tr>
					<tr>
                      <td><b>PHONE NUMBER</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_phonenumber; ?>"   class="form-control"> </td>
                    </tr>

					<tr>
                      <td><b>EMAIL ADDRESS</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_email_address; ?>"   class="form-control"> </td>
                    </tr>

					<tr>
                      <td><b>AMOUNT PAID</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_amount." [".$currency."]"; ?>"   class="form-control"> </td>
                    </tr>
					
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-info card-outline">
               <div class="card-body">
                <table class="table table-bordered">
                  <tbody>


					<tr style="width:25%;">
                      <td><b>TRANSACTION DATE</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_date; ?>"   class="form-control"> </td>
                    </tr>
					
					<?php if($pay_channel == "card"){ ?>

 					<tr>
                      <td><b>CARD LAST 4 DIGIT</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_card_last4; ?>"   class="form-control"> </td>
                    </tr>
					

 					<tr>
                      <td><b>CARD EXPIRING DATE</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_card_expiring_date; ?>"   class="form-control"> </td>
                    </tr> 


 					<tr>
                      <td><b>CARD TYPE</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_card_type; ?>"   class="form-control"> </td>
                    </tr> 
					
					<?php } ?>

 					<tr>
                      <td><b>BANK</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_card_bank; ?>"   class="form-control"> </td>
                    </tr> 

 					<tr>
                      <td><b>COUNTRY</b></td>
                      <td><input disabled type="text"  value="<?php echo $pay_country; ?>"   class="form-control"> </td>
                    </tr> 
					
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
        </div>

		
<?php
  
		}
		else
		{
		$pay_status 				= 		"NOT SUCCESSFUL";	
		$pay_channel__txt			=		"";

		$pay_name					=		"";
		
		$pay_phonenumber			=		"";
		$pay_email_address			=		"";
		$pay_amount					=		"";
		$currency					=		"";
		
		$pay_date					=		"";

		$pay_card_last4				=		"";
		$pay_card_expiring_date		=		"";
		$pay_card_type				=		"";
		$pay_card_bank				=		"";
		$pay_country				=		"";			


?>		

 
		<div class='alert alert-danger alert-dismissible'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<i class='fas fa-exclamation-circle'></i> <?php echo $pay_status; ?> 
		</div>


            <div class="card card-info card-outline">
               <div class="card-body">
                <table class="table table-bordered">
                  <tbody>


					<tr style="width:25%;">
                      <td><b>REFRENCE NUMBER</b></td>
                      <td><input disabled type="text"  value="<?php echo $reference; ?>"   class="form-control">  </td>
                    </tr>	
					
					</tbody>
					</table>
					</div>
					</div>
					
<?php } ?>