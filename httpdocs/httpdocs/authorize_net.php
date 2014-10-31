<?Php
//Payment Details

$DEBUGGING					= 1;				# Display additional information to track down problems
$TESTING					= 1;				# Set the testing flag so that transactions are not live
$ERROR_RETRIES				= 2;				# Number of transactions to post if soft errors occur


/*$auth_net_login_id			= "68Xpyv68V2Lj";
$auth_net_tran_key			= "23sEPm4R6C97q3a9";
$auth_net_url				= "https://test.authorize.net/gateway/transact.dll";*/

$auth_net_login_id			= "7xJmM838W6LK";
$auth_net_tran_key			= "5e88DA9pw3WAG66L";
$auth_net_url				= "https://test.authorize.net/gateway/transact.dll";

#  Uncomment the line ABOVE for test accounts or BELOW for live merchant accounts

/*$auth_net_login_id			= "8SBp39v627";
$auth_net_tran_key			= "4kb4DrDr54227FBg";
$auth_net_url				= "https://secure.authorize.net/gateway/transact.dll";*/

$authnet_values				= array
(
	"x_login"				=> $auth_net_login_id,
	"x_version"				=> "3.1",
	"x_delim_char"			=> "|",
	"x_delim_data"			=> "TRUE",
	"x_url"					=> "FALSE",
	"x_type"				=> "AUTH_CAPTURE",
	"x_method"				=> "CC",
 	"x_tran_key"			=> $auth_net_tran_key,
 	"x_relay_response"		=> "FALSE",
	"x_card_num"			=> $cc_number,
	"x_exp_date"			=> $expirydt,
	"x_amount"				=> $amount,
	  "x_address"        => $address, 
	"x_first_name"			=> $fname,
	"x_last_name"			=> $lname,
	"x_city"				=> $city,
	"x_state"				=> $state,
	"x_zip"					=> $zip,
	"x_country"				=> $country,
	"x_email"				=> $email,
	"x_ship_to_first_name"    => $fname_shipping, 
            "x_ship_to_last_name"    => $lname_shipping, 
            "x_ship_to_address"        => $address_shipping, 
            "x_ship_to_city"        => $city_shipping, 
            "x_ship_to_state"        => $state_shipping, 
            "x_ship_to_zip"            => $zip_shipping, 
            "x_ship_to_country"        => $country_shipping
	);

$fields = "";


foreach( $authnet_values as $key => $value ) $fields .= "$key=" . urlencode($value)."&";

###  Uncomment the line ABOVE for test accounts or BELOW for live merchant accounts

$ch = curl_init("https://test.authorize.net/gateway/transact.dll");
//$ch = curl_init("https://secure.authorize.net/gateway/transact.dll"); 
curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); // use HTTP POST to send form data
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###
$resp = curl_exec($ch); //execute post and get results
curl_close ($ch);

 $text = $resp;

$tok = strtok($text,"|");
while(!($tok === FALSE))
{
   $tok = strtok("|");
}

$howMany = substr_count($resp, "|");
$text = $resp;
$h = substr_count($text, "|");
$h++;
for($j=1; $j <= $h; $j++)
{
	$p = strpos($text, "|");
	if ($p === false)
	{ 
		if($j>=69)
		{
		} 
		else
		{
		}
	}
	else
	{
		$p++;
		//  We found the x_delim_char and accounted for it . . . now do something with it
		//  get one portion of the response at a time
		$pstr = substr($text, 0, $p);
		//  this prepares the text and returns one value of the submitted
		//  and processed name/value pairs at a time
		//  for AIM-specific interpretations of the responses
		//  please consult the AIM Guide and look up
		//  the section called Gateway Response API
		$pstr_trimmed = substr($pstr, 0, -1); // removes "|" at the end
		if($pstr_trimmed=="")
		{
			$pstr_trimmed="NO VALUE RETURNED";
		}
		switch($j)
		{
			case 1:
			//echo "Response Code: ";
			$fval="";
			if($pstr_trimmed=="1")
			{
				$fval="Approved";
				$rcode="Approved";
				$rdesc="This transaction has been approved.";
			}
			elseif($pstr_trimmed=="2")
			{
				$fval="Declined";
				$rcode="Declined";
				$rdesc="This transaction has been declined.";
			}
			elseif($pstr_trimmed=="3")
			{
				$fval="Error";
				$rcode="Error";
				$rdesc="There has been an error processing this transaction.";
			}
			elseif($pstr_trimmed=="4")
			{
				$fval="Held for Review";
				$rcode="Held for Review";
				$rdesc="This transaction is being held for review.";
			}
			case 3:
				$reasoncode=$pstr_trimmed;
			case 4:
				$reasontxt=$pstr_trimmed;
			case 5:
				$appcode=$pstr_trimmed;
	        case 7:
				$tranid=$pstr_trimmed;
				//echo $tranid;
			case 8:
				$invno1=$pstr_trimmed;
				$invno2=explode("-",$invno1);
				$invno=$invno2[1];
			 case 39:
				$fval="";
				if($pstr_trimmed=="M")
				{
					$fval="M = Match";
				}
				elseif($pstr_trimmed=="N")
				{
					$fval="N = No Match";
				}
				elseif($pstr_trimmed=="P")
				{
					$fval="P = Not Processed";
				}
				elseif($pstr_trimmed=="S")
				{
					$fval="S = Should have been present";
				}
				elseif($pstr_trimmed=="U")
				{
					$fval="U = Issuer unable to process request";
				}
				else
				{
					$fval="NO VALUE RETURNED";
				}
				break;
			}
			$text = substr($text, $p);
	}
}


?>