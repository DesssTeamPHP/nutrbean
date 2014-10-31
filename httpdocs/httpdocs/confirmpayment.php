<?php  
$order_id              =    $_SESSION['order_id'];
 $qrychk1               =   "select * from order_tbl where order_id='".$order_id."'";         
$qrychkexe1            =    mysql_query($qrychk1);
if(!$qrychkexe1)
echo mysql_error();
$nt11                  =    mysql_fetch_assoc($qrychkexe1);
$shipping_amount_pay   =    $nt11['shipping_amt'];
$tax_amount_pay        =    $nt11['tax_amt'];
$customer_id           =    $nt11['customer_id'];


$amount                    =  $grant_total;
$check_quantity            =  1;
$fname_shipping            =  $first_name;  
$lname_shipping            =  $last_name; 
$address_shipping          =  $shipping_address;
$city_shipping             =  $shipping_city;
$statecode_shipping        =  $shipping_state;
$countrycode_shipping      =  'US';
$zip_shipping              =  $shipping_country;
$querystatesel_nt_shipping = "SELECT * FROM state_tbl where state_id='$statecode_shipping'";
$querystateexe_nt_shipping = mysql_query($querystatesel_nt_shipping);
if(!$querystateexe_nt_shipping)
echo mysql_error();
$ntstate_nt_shipping       = mysql_fetch_assoc($querystateexe_nt_shipping);
$state_shipping           = $ntstate_nt_shipping['state_name'];	



 $querycounsel_nt_shipping="SELECT * FROM countries where countries_iso_code_2='$countrycode'";
$querycounexe_nt_shipping=mysql_query($querycounsel_nt_shipping);
if(!$querycounexe_nt_shipping)
echo mysql_error();
$ntcoun_country=mysql_fetch_assoc($querycounexe_nt_shipping);
 $country_shipping=$ntcoun_country['countries_name'];	





/*$amount=$nt11['payment_amount'];*/
  $querysel="SELECT * FROM order_billing where order_id='".$order_id."'";
$queryexe=mysql_query($querysel);
if(!$queryexe)
echo mysql_error();
$nt=mysql_fetch_assoc($queryexe);
 $fname =$nt['first_name'];  
 $lname =$nt['last_name']; 
$city=$nt['city'];
$statecode=$nt['state'];
$emailid=$nt['emailid'];
$querystatesel="SELECT * FROM state_tbl where state_id='$statecode'";
$querystateexe=mysql_query($querystatesel);
if(!$querystateexe)
echo mysql_error();
$ntstate=mysql_fetch_assoc($querystateexe);
$state=$ntstate['state_name'];	
$zip=$nt['zip'];
$countrycode=$nt['country'];

$querycounsel="SELECT * FROM countries where countries_iso_code_2='$countrycode'";
$querycounexe=mysql_query($querycounsel);
if(!$querystateexe)
echo mysql_error();
$ntcoun=mysql_fetch_assoc($querycounexe);
$country=$ntcoun['countries_name'];	
$address=$nt['address'];
$email=$emailid;
$primaryphone=$nt['primaryphone']; 
require("authorize_net.php");

if($rcode=="Approved")
{	 


 



						
	 $qrychk11="update order_tbl set billing_amt='$amount',grand_pay='$gtotal_all',delivary_status ='Open',transaction_id='$tranid',auth_code='$appcode' where order_id='$order_id'";
     $qrychkexe111=mysql_query($qrychk11);
unset($_SESSION['order_id']);
	unset($_SESSION['session_id']);	
	unset($_SESSION['first_name']);
	unset($_SESSION['last_name']);
	unset($_SESSION['email_field']);
	unset($_SESSION['phone_field']);
	require("order_send_mail.php");
	header('location:payment.php?msg=0&status='.$order_id);	exit; 
}
elseif($rcode=="Declined" || $rcode=="Error")
{	


$msg1 ="Trancation Failed Please Check Your Card Details";

					
header('location:product_details.php?order_id='.$_SESSION['order_id'].'&failed='.$rcode);	exit; 
					
					
}
else
{
$msg1 ="Trancation Failed Please Check Your Card Details";
	header('location:product_details.php?order_id='.$_SESSION['order_id'].'&failed='.$rcode);	exit; 
}


