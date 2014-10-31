<?php
include('admin/core/configuration.php');

if(isset($_SESSION['first_name'],$_SESSION['last_name'],$_SESSION['email_field'],$_SESSION['phone_field']))
{
$first_name		        =	$_SESSION['first_name'];
$last_name		        =	$_SESSION['last_name'];
$emailid		        =	$_SESSION['email_field'];
$primaryphone	        =	$_SESSION['phone_field'];

}
else
{


$first_name		        =	"";
$last_name		        =	"";
$emailid		        =	"";
$primaryphone	        =	"";


}
$product_cost 			=	'$0.00';
$product_id 			=	"";
$product_cost 			=	'$0.00';
$discount				=	'$0.00';
$shipping_cost			=	'$0.00';
$order_total			=	'$0.00';
$billing_status        = 'yes';

/*************Assign Non Logged User as Guest*********************************************/
    if(!isset($_SESSION['uid']))
     {
     $_SESSION['uid'] = 'Guest';
	 $_SESSION['userid_guest'] ='new';
     }
///////////////////////////////////////////////////////////////////////////////////////////////


if(isset($_REQUEST['first_name']))
{
	
	
$first_name		        =	$_REQUEST['first_name'];
$last_name		        =	$_REQUEST['last_name'];
$emailid		        =	$_REQUEST['emailid'];
$primaryphone	        =	$_REQUEST['primaryphone'];
/*************Shipping Details*****************************/
$shipping_address		=	$_REQUEST['shipping_address'];
$shipping_city			=	$_REQUEST['shipping_city'];
$shipping_state			=	$_REQUEST['shipping_state'];
$shipping_zipcode		=	$_REQUEST['shipping_zipcode'];
$shipping_country		=	'United States';	
//////////////////////////////////////////////////////////////
/*************Billing Details*****************************/
$billing_status         =  $_REQUEST['billing_address'];
if($billing_status == 'yes')
{
$billing_address		=	$shipping_address;
$billing_city			=	$shipping_city;
$billing_state			=	$shipping_state	;
$billing_zipcode		=	$shipping_zipcode;
$billing_country		=	'United States';
}
else
{
$billing_address		=	$_REQUEST['bill_addr'];
$billing_city			=	$_REQUEST['billing_city'];
$billing_state			=	$_REQUEST['billing_state'];
$billing_zipcode		=	$_REQUEST['billing_zipcode'];
$billing_country		=	'United States';

}
//////////////////////////////////////////////////////////////

/*************Credit Card Details*****************************/
$cardType            =  $_REQUEST['cctype'];
$ccrdholdername      =  $first_name	;
$cc_number           =  $_REQUEST['ccnum'];
$cc_month            =  $_REQUEST['cc_month'];
$cc_year             =  $_REQUEST['cc_year'];
$expirydt            =  $cc_month."/".$cc_year;
$cvvNumber           =  $_REQUEST['cvnum'];
//////////////////////////////////////////////////////////////////
/*************Cart Details********************************/
$product_price       =  $_REQUEST['product_cost'];
$shipping_rate       =  $_REQUEST['shipping_method'];
$shipping_provider	 =  $_REQUEST['shipping_method'];
$grant_total         =  $_REQUEST['grant_total'];
////////////////////////////////////////////////////////////////







	 if($_SESSION['uid']=='Guest' )
	 {
	 
	
	if($_SESSION['userid_guest']=='new')
	{
	  $etguest_pass        = 'guest'.$first_name.$last_name.$emailid;
	
	  $qryinsertuser       = "INSERT INTO user_details values ('','','$first_name','$last_name','$address','$city','$state','$country','$primaryphone','$emailid','2','$etguest_pass','1',now(),now(),'$zipcode','1')";
	 
	$qryinsexe                = mysql_query($qryinsertuser);	
	if(!$qryinsexe)
	{
	echo mysql_error(); 
	  exit;
	}
	$user_session_id          = mysql_insert_id();
	
	$_SESSION['userid_guest'] = $user_session_id;
	
	}
	else 
	{
	$user_session_id   = $_SESSION['userid_guest'] ;
	
	}
	

	  }
	
	  else
	  {
	
		$userid              =  $_SESSION['uid'];
		$qry                  =  "SELECT * FROM user_details where e_mail='$userid'";
		$qryexe               =  mysql_query($qry);
		$nt                   =  mysql_fetch_assoc($qryexe);
		$user_session_id      =  $nt['id'];
		
		}
		
		if($_SESSION['userid_guest'])
		
		$php_session_id       =  $_SESSION['session_id'];
	    $sid_sc_price1        =  $_SESSION['session_id'];
		 

		
	    $session_bill_amount      =  $grant_total;		
		$deliverDate              =  date('Y-m-d');
		$odate                    =  date('Y-m-d');
		$paymentMethod            =  'creditcard';
		$deliverStatus            =  'deliverStatus';
		$paypalIpnId	          =  '11';
		$ipAddress                =  $_SERVER['REMOTE_ADDR'];
		$date                     =  date('d');		
		$month                    =  date('m');		
		$year                     =  date('y');		
		$hour                     =  date('his');		
		$auto_order_id            =  $hour.$date.$month.$year.$user_session_id;
		
		if($_SESSION['order_id']  ==  '')
		{
		$_SESSION['order_id'] = $auto_order_id;
		$order_id = $_SESSION['order_id'];
		}
		else
		{
		$order_id = $_SESSION['order_id'];
		}
		
   
		$hanlingFees            =  'Flatrate';
		//$giftCouponId = '22';
		//$giftCouponRedeemedAmount = 'amount';
		$docType                =  'ORD';
		$orderStatus            =  'Order Received';
		$tax_amount              = 0;
		
		
/*Updating / insering  order table 	*/	
		
		$qry1            =         "select * from order_tbl where customer_id='$user_session_id' and php_session_id ='$php_session_id'";
		$qryexe1         =         mysql_query($qry1);
		$qry1cnt         =         mysql_num_rows($qryexe1);
		if($qry1cnt==0)
		{
	 	$query           = 'INSERT INTO order_tbl 
											SET
												customer_id				    =	\''.addslashes($user_session_id).'\',
												php_session_id				=	\''.addslashes($php_session_id).'\',
												billing_amt					=	\''.addslashes($session_bill_amount).'\',
												shipping_amt				=	\''.addslashes($shipping_rate).'\',
												tax_amt 					=	\''.$tax_amount.'\',
												grand_pay 					=	\''.$session_bill_amount.'\',
												payment_method				=	\''.$paymentMethod.'\',
												billing_same				=	\''.$billing_status.'\',
												hanling_fees				=	\''.$hanlingFees.'\',												
												delivary_status				=	\''.$deliverStatus.'\',										
												ip_address					=	\''.$ipAddress.'\',
												order_id					=	\''.addslashes($order_id).'\',
												shipping_provider			=	\''.addslashes($shipping_provider).'\',
												order_created				=	\''.date("Y-m-d H:i:s").'\',
												order_status				=	\''.$orderStatus.'\'';


			$exQuery               =   mysql_query($query);	
			if(!$exQuery)
			{
			echo mysql_error();
			exit;
			}
			$last_order_id_inc     =   mysql_insert_id();		
		}
		else
		{
		$fetch_last_id             =   mysql_fetch_array($qryexe1);
		$last_order_id_inc         =   $fetch_last_id['id'];
		
		
		 	$queryup = 'UPDATE order_tbl SET
												customer_id				    =	\''.addslashes($user_session_id).'\',
												php_session_id				=	\''.addslashes($php_session_id).'\',
												billing_amt					=	\''.addslashes($session_bill_amount).'\',
												shipping_amt				=	\''.addslashes($ship_amount_cal).'\',
												tax_amt 					=	\''.$tax_amount.'\',
												grand_pay 					=	\''.$payment_amount.'\',
												payment_method				=	\''.$paymentMethod.'\',
												hanling_fees				=	\''.$hanlingFees.'\',												
												delivary_status				=	\''.$deliverStatus.'\',										
												ip_address					=	\''.$ipAddress.'\',
												order_id					=	\''.addslashes($order_id).'\',
												shipping_provider			=	\''.addslashes($shipping_provider).'\',
												order_created				=	\''.date("Y-m-d H:i:s").'\',
												order_status				=	\''.$orderStatus.'\'
												WHERE `customer_id`=\''.$user_session_id.'\' and `php_session_id`=\''.$php_session_id.'\'';


			$exQueryup = mysql_query($queryup);	
			if(!$exQueryup)
			{
			echo mysql_error();
			exit;
			}			
		}
		
		
/*Updating / insering  order table child billing addtess 	*/			
		
	 	$qry_billing        =        "select * from order_billing where customer_id='$user_session_id' and php_session_id ='$php_session_id'";
		$qryexe_billing     =        mysql_query($qry_billing);
		$qry1cnt_billing    =        mysql_num_rows($qryexe_billing);
		if($qry1cnt_billing==0)
		{
	  	$query_billing      = "insert into `order_billing` set
															`customer_id`           =   '".addslashes($user_session_id)."' ,
															`php_session_id`        =   '".addslashes($php_session_id)."' ,
															`order_id`              =   '".addslashes($order_id)."' ,														
															`parent_id`             =   '".$last_order_id_inc."',																															
															`first_name`            =   '".$first_name."',	 	
															`last_name`             =   '".$last_name."',	 
															`emailid`               =   '".$emailid."',	 
															`primaryphone`          =   '".$primaryphone."',	
															`billing_created`       =   '".date("Y-m-d H:i:s")."' ,	
															`address`                  =   '".$billing_address."',	 
															`city`                     =   '".$billing_city."',	
															`state`                    =   '".$billing_state."',																
															`zipcode`               =   '".$billing_zipcode."'";															
															$result2_billing        =   mysql_query($query_billing);
															
															if(!$result2_billing)
			{
			echo mysql_error();
			exit;
			}	
															
															$result2_billing = mysql_insert_id(); 
				
		
		}
		else
		{
		$fetch_last_id_billing     =    mysql_fetch_array($qryexe_billing);
		$last_billing_id_inc       =    $fetch_last_id_billing['id'];
		$query_billing             =    "UPDATE order_billing SET
												            `customer_id`              =   '".addslashes($user_session_id)."' ,
															`order_id`                 =   '".addslashes($order_id)."' ,	
															`php_session_id`           =   '".addslashes($php_session_id)."' ,
															`parent_id`                =   '".$last_order_id_inc."',																															
															`first_name`               =   '".$first_name."',	 	
															`last_name`                =   '".$last_name."',	 
															`emailid`                  =   '".$emailid."',	 
															`address`                  =   '".$billing_address."',	 
															`city`                     =   '".$billing_city."',	 
															`primaryphone`             =   '".$primaryphone."',	
															`state`                    =   '".$billing_state."',	
															`billing_created`          =   '".date("Y-m-d H:i:s")."' ,	
															`zipcode`                  =   '".$billing_zipcode."'
												WHERE `customer_id` ='".$user_session_id."' and `php_session_id`='".$php_session_id."'";										
												$result2_billing = mysql_query($query_billing);
												
															if(!$result2_billing)
			{
			echo mysql_error();
			exit;
			}	
															
		
		
		}
		
		
		
/*Updating / insering  order table child Shipping addtess 	*/			
		
	 	$qry_order_shipping        =      "select * from order_shipping where customer_id='$user_session_id' and php_session_id ='$php_session_id'";
		$qryexe_order_shipping     =       mysql_query($qry_order_shipping);
		$qry1cnt_order_shipping    =       mysql_num_rows($qryexe_order_shipping);
		if($qry1cnt_order_shipping==0)
		{
	 	$query_order_shipping      =      "insert into `order_shipping` set
															`customer_id`                  =      '".addslashes($user_session_id)."' ,
															`order_id`                     =      '".addslashes($order_id)."' ,
															`php_session_id`               =      '".addslashes($php_session_id)."' ,	
															`parent_id`                    =      '".$last_order_id_inc."',																															
															`shipping_firstname`           =      '".$shipping_firstname."',
															`shipping_lastname`            =      '".$shipping_lastname."',
															`shipping_telephone`           =      '".$shipping_telephone."', 
															`shipping_address`             =      '".addslashes($shipping_address)."',
															`shipping_city`                =      '".addslashes($shipping_city)."',
															`shipping_state`               =      '".addslashes($shipping_state)."',
															`shipping_country`             =      '".addslashes($shipping_country)."',
															`shipping_created`             =      '".date("Y-m-d H:i:s")."' ,	
															`shipping_zip`                 =      '".addslashes($shipping_zipcode)."'";															
															$result2_order_shipping = mysql_query($query_order_shipping);
															
															if(!$result2_order_shipping)
			{
			echo mysql_error();
			exit;
			}	
															
															$result2_order_shipping = mysql_insert_id(); 
				
		
		}
		else
		{
		$fetch_last_id_order_shipping      =     mysql_fetch_array($qryexe_order_shipping);
		$last_order_shipping_id_inc        =     $fetch_last_id_order_shipping['id'];
		$query_order_shipping              =     "UPDATE order_shipping SET
												            `order_id`               =   '".addslashes($order_id)."' ,
												            `customer_id`            =   '".addslashes($user_session_id)."' ,
											                `php_session_id`         =   '".addslashes($php_session_id)."' ,
															`parent_id`              =   '".$last_order_id_inc."',																															
															`shipping_firstname`     =   '".$shipping_firstname."',
															`shipping_lastname`      =   '".$shipping_lastname."',
															`shipping_telephone`     =   '".$shipping_telephone."', 
															`shipping_address`       =   '".addslashes($shipping_address)."',
															`shipping_city`          =   '".addslashes($shipping_city)."',
															`shipping_state`         =   '".addslashes($shipping_state)."',
															`shipping_country`       =   '".addslashes($shipping_country)."',
															`shipping_created`       =   '".date("Y-m-d H:i:s")."',	
															`shipping_zip`           =   '".addslashes($shipping_zipcode)."'													
												WHERE `customer_id`='".$user_session_id."' and `php_session_id`='".$php_session_id."'";												
												$result2_order_shipping = mysql_query($query_order_shipping);
												
												if(!$result2_order_shipping)
			{
			echo mysql_error();
			exit;
			}	
															
		
		
		}		
		
		
	
			$product_id        =    $_REQUEST['product_id'];
			$product_quantity  =    1;
			$product_price     =    $_REQUEST['product_cost'];
			$total_price       =    $_REQUEST['product_cost'];;
			
			$qry2="select * from order_details where customer_id='$user_session_id' and php_session_id ='$php_session_id' and product_id='$product_id'";
			$qryexe2=mysql_query($qry2);
			$nchk=mysql_fetch_assoc($qryexe2);
			$qry1cnt2=mysql_num_rows($qryexe2);			
			if($qry1cnt2==0)
			{
			echo	$query2 = "insert into `order_details` set
															`customer_id`           =  '".addslashes($user_session_id)."' ,
															`product_id`             =  '".$product_id."',	
															`order_id`               =  '".$order_id."',																 
															`parent_id`              =  '".$last_order_id_inc."',
															`php_session_id`         =  '".addslashes($php_session_id)."',
															`product_quantity`       =  '".addslashes($product_quantity)."',
															`product_price`          =  '".addslashes($product_price)."',
															`total_amount`           =  '".addslashes($total_price)."'";
				$result2 = mysql_query($query2);
				if(!$result2)
			{
			echo mysql_error();
			exit;
			}	
				$last_insert_id = mysql_insert_id(); 
				
				
			}
			else
			{ 
			echo 	$queryup2 = "UPDATE order_details SET
													        `customer_id`         =  '".addslashes($user_session_id)."',
															`order_id`             =  '".$order_id."',	
															`parent_id`            =  '".$last_order_id_inc."',
															`php_session_id`       =  '".addslashes($php_session_id)."',
															`product_quantity`     =  '".addslashes($product_quantity)."',
															`product_price`        =  '".addslashes($product_price)."',
															`total_amount`         =  '".addslashes($total_price)."'
															WHERE `customer_id`='".$user_session_id."' and `php_session_id`='".$php_session_id."' and product_id='$product_id'";
								
				$exQueryup2 = mysql_query($queryup2);
				if(!$exQueryup2)
			{
			echo mysql_error();
			exit;
			}	
					
				
			}
			
			

				
				
		
		//header("location:payments.php");exit;





	include("confirmpayment.php");
			}
	
	
	
	if(isset($_REQUEST['order_id']) )	
{		
$order_id=$_SESSION['order_id'];



$qrychk1="select * from order_billing where order_id='".$order_id."'";         
$qrychkexe1=mysql_query($qrychk1);
$nt11=mysql_fetch_assoc($qrychkexe1);           
$bill_addr=$nt11['address'];
$billing_city=$nt11['city'];
$billing_state=$nt11['state'];	
$billing_zipcode=$nt11['zipcode'];



$qrychk2="select * from order_shipping where order_id='".$order_id."'";         
$qrychkexe2=mysql_query($qrychk2);
$nt12=mysql_fetch_assoc($qrychkexe2);
$shipping_firstname		=	$nt12['shipping_firstname'];
$shipping_lastname		=	$nt12['shipping_lastname'];
$shipping_address		=	$nt12['shipping_address'];
$shipping_city			=	$nt12['shipping_city'];
$shipping_state			=	$nt12['shipping_state'];
$shipping_zipcode		=	$nt12['shipping_zip'];
$shipping_telephone		=	$nt12['shipping_telephone'];
$shipping_country		=	$nt12['shipping_country'];	


$qrychk_5="select * from order_details where order_id='".$order_id."'";         
$qrychkexe_5=mysql_query($qrychk_5);
$nt_fetch_5=mysql_fetch_assoc($qrychkexe_5);       
$product_cost 			=	$nt_fetch_5['product_price'];
$product_id 			=	$nt_fetch_5['product_id'];


$qrychk_6="select * from order_tbl where order_id='".$order_id."'";         
$qrychkexe_6=mysql_query($qrychk_6);
$nt_fetch_6=mysql_fetch_assoc($qrychkexe_6);       
$shipping_cost			=	'$'. number_format($nt_fetch_6['shipping_provider'],2,'.','');
$order_total			=	'$'. number_format($nt_fetch_6['billing_amt'],2,'.','');
$billing_status			=	$nt_fetch_6['billing_same'];
$customer_id			=	$nt_fetch_6['customer_id'];


 $qrychk_7="select * from user_details where id='".$customer_id."'";         
$qrychkexe_7=mysql_query($qrychk_7);
$nt_fetch_7=mysql_fetch_assoc($qrychkexe_7);       
$first_name		        =	$nt_fetch_7['first_name'];
$last_name		        =	$nt_fetch_7['last_name'];
$emailid		        =	$nt_fetch_7['e_mail'];
$primaryphone	        =	$nt_fetch_7['prim_tele_phone'];

}	
	
	
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<script type="text/javascript" src="js/script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function() {

	$(".tab_content01").hide();
	$(".tab_content01:first").show(); 

	$("ul.tabs1 li").click(function() {
		$("ul.tabs1 li").removeClass("active1");
		$(this).addClass("active1");
		$(".tab_content01").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
});

</script>
<script type="application/javascript">
function featured_value()
{
if(!document.getElementById('billing_address_no').checked)
{
document.getElementById('bill_div').style.display = 'none';
}
else
{
document.getElementById('bill_div').style.display = '';
}
}
</script>
<style>
body {
	color:#383838;
	font-family:Calibri;
}
.cont_left {
	float:left;
	margin:0px 0px 0px 10px;
	width:600px;
}
.pro_head h2 {
	background:#004B85;
	color:#fff;
	padding:5px;
	border-radius:5px;
	text-align:center;
}
.cont_left h2 span {
}
.sell_product {
	margin:0px;
	border:1px solid #CCC;
	border-radius:5px;
	padding:10px;
}
.sell_product ul {
	margin:0px;
	padding:0px;
}
.sell_product ul li {
	float:left;
	width:270px;
	padding:5px;
}
.sell_product ul li div img {
	margin:10px 0px 10px 30px;/*height:295px;*/
}
.sell_product ul li div h1 {
	text-align:center;
	color:#004B85;
	font-size:25px;
}
.sell_product ul li div h2 {
	text-align:center;
	color:#1A572E;
}
.sell_product ul li div h3 {
	font-size:24px;
	text-align:center;
	padding:0px;
}
hr {
	border-bottom:1px solid #e2e2e2;
}
p {
	text-align:justify;
}
.sell_product ul li div a {
	background: none repeat scroll 0 0 #1B5630;
	border: 1px solid #FFFFFF;
	border-radius: 5px;
	box-shadow: 0 2px 4px 0 #000000;
	color: #FFFFFF;
	display: inline-block;
	font-size: 18px;
	font-weight: bold;
	margin: 15px 0 0;
	padding: 5px 9px;
	text-decoration: none;
	float:right;
}
.cont_right {
	float:right;
	width:500px;
	margin-right:10px;
}
.MT_10 {
	margin-top:10px !important;
}
.order_list {
	border:1px solid #c6c6c6;
	border-radius:5px;
	padding:0px 10px 0px 10px
}
.order_list ul {
	margin:0px auto;
}
.order_list li {
	padding:10px 0px 10px 40px !important;
}
.order_list li label {
	font-size:16px;
	float:left;
	width:200px;
}
.order_list li input {
	border:1px solid #c6c6c6;
	border-radius:5px;
	height:20px;
	width:300px;
	padding:5px;
}
.order_list li select {
	border:1px solid #c6c6c6;
	border-radius:5px;
	height:30px;
	padding: 5px;
	width: 311px;
}
.order_list li span {
	float:left;
	margin:0px 10px 0px 70px;
}
.order_list li span input {
	float:left;
	padding:0px;
	height:auto;
	width:10px;
}
.payements_cards {
	margin:0px;
	padding:0px;
}
.payements_cards li {
	float:left;
	padding:0px;
	width:100px;
	margin:0px -22px 0px -10px;
}
.payements_cards li img {
	width:75px
}
.apply_button {
	background: none repeat scroll 0 0 #1B5630;
	border: 1px solid #FFFFFF;
	border-radius: 5px;
	box-shadow: 0 1px 3px 0 #000000;
	color: #FFFFFF;
	display: inline-block;
	float: right;
	font-size: 15px;
	font-weight: bold;
	margin: 0 92px 0 -31px;
	padding: 5px 4px;
	text-decoration: none;
	cursor:pointer;
}
.order_total {
	margin:0px;
	border:1px solid #c6c6c6;
	padding:0px
}
.order_total li {
	border-bottom:1px solid #c6c6c6;
	height:20px;
	font-size:16px;
	font-weight:bold;
}
.order_total li p {
	margin:0px;
	padding:0px;
	float:left;
	width:310px;
}
.order_total li span {
	margin:0px;
	float:left;
	padding:0px;
	width:100px;
}
.place_order {
	background: none repeat scroll 0 0 #1B5630;
	border: 1px solid #FFFFFF;
	border-radius: 5px;
	box-shadow: 0 2px 4px 0 #000000;
	color: #FFFFFF;
	cursor: pointer;
	display: inline-block;
	font-size: 15px;
	font-weight: bold;
	margin: 10px 0 0 150px;
	padding: 5px 9px;
	text-decoration: none;
}
</style>
</head>
<body>
<?php include('common/header.php');?>
<div class="spacer"></div>
<div class="wrapper">
  <div class="container MT_10 MB_20 border1 ">
    <div class="cont_left MB_20">
      <div class="pro_head">
        <h2><span>Step 2 : </span>Choose Your Product</h2>
      </div>
      <?php 
	$viewSelect = 'select * from    products limit 0,4';
$exViewQuery = mysql_query($viewSelect);
if(!$exViewQuery)
echo mysql_error();

$page_count=1;

$page_countr=mysql_num_rows($exViewQuery);
if(mysql_num_rows($exViewQuery)>0)
	{

	while ($row = mysql_fetch_array($exViewQuery)) 
	{ 
	if($page_count ==1)
		 {
		$pagstyl='';
		}
		else
		{
		$pagstyl='';
		}
	$product_value[]=$row['products_id'];
	?>
      <div class="sell_product MT_10">
        <ul>
          <li>
            <div>
              <?php
			if($row['products_image']!='' & file_exists('admin/uplodeImage/thumbImg/'.$row['products_image']))
				{
			
			
			 echo '<img src="admin/uplodeImage/thumbImg/'.$row['products_image'].'"   alt="'.$row['products_image'].'" title="'.$row['products_image'].'" /> ';
			   }
      else
      {
     echo '<img src="images/logo1.png" alt="'.$row['products_name'].'" title="'.$row['products_name'].'" align="absmiddle">';
	  
	  }
     ?>
            </div>
          </li>
          <li>
            <div>
              <h1><?php echo $row['products_name']; ?></h1>
              <h2> GET 30 DAYS TRIAL</h2>
              <hr />
              <h3>$<?php echo $row['products_price']; ?></h3>
              <hr />
              <p><?php echo substr(stripslashes($row['products_description']),0,1000); ?></p>
              <a id="product_stat_<?php echo $row['products_id']; ?>" style="cursor:pointer"  onclick="product_select('<?php echo$row['products_id']; ?>','<?php echo $row['products_price']; ?>','<?php echo $product_value;?>')"> <?php if($product_id==$row['products_id']) echo 'Selected'; else  echo 'Select the Product';?></a> </div>
          </li>
          <div class="spacer"></div>
        </ul>
        <hr />
        <div>
          <p><?php echo substr(stripslashes($row['products_description']),0,1000); ?></p>
        </div>
      </div>
      <?php
	$page_count++;
			
 }} ?>
    </div>
    <div class="cont_right">
      <div class="pro_head">
        <h2><span>Step 3 : </span>Choose Your Product</h2>
      </div>
                <?php if(isset($_REQUEST['failed']))
	{

	echo '<div class="alert alert-danger alert-dismissable">
               
                <strong>Sorry!</strong> Transaction Failed . Please Enter Valid Card Details
            </div>';
		
			
			}?>
      <form name="frm_user_checkout" class="frm_user_checkout" id="frm_user_checkout" method="post" onSubmit="return validsign();">
        <div class="order_list">

          <ul >
            <li>
              <label>First Name : </label>
              <input type="text" id="first_name" name="first_name" value="<?php echo $first_name;?>" tabindex="1" maxlength="50">
            </li>
            <li>
              <label>Last Name : </label>
              <input type="text"  name="last_name" id="last_name" value="<?php echo $last_name;?>" tabindex="2" maxlength="50">
            </li>
            <li>
              <label>Email Id : </label>
              <input type="text"  name="emailid" id="emailid" value="<?php echo $emailid;?>" tabindex="3" maxlength="50">
            </li>
            <li>
              <label>Phone : </label>
              <input type="text"  name="primaryphone" id="primaryphone"  value="<?php echo $primaryphone;?>" maxlength="12"  onkeydown="mask(event,this)" onKeyUp="mask(event,this)" onClick="mask(event,this)" tabindex="4">
            </li>
            <div class="spacer"></div>
          </ul>
          <h3>Shipping Address :</h3>
          <hr />
          <ul >
            <li>
              <label>Street : </label>
              <input type="text"  name="shipping_address"  id="shipping_address" value="<?php echo $shipping_address;?>" tabindex="5">
            </li>
            <li>
              <label>City : </label>
              <input type="text"   name="shipping_city" id="shipping_city"  value="<?php echo $shipping_city;?>" onKeyDown="mask8(event,this)" onKeyUp="mask7(event,this)" onClick="mask7(event,this)" maxlength="50" tabindex="6">
            </li>
            <li>
              <label>State : </label>
              <select  id="shipping_state" name="shipping_state"   title="State / Province"  tabindex="7">
                <option  value="0">---SELECT---</option>
                <?php
                        $querystates="SELECT * FROM state_tbl";
                        $querystate=mysql_query($querystates);
                        while($ns=mysql_fetch_array($querystate))
                        {
                            if($ns['state_id']==$shipping_state)
                            {	$txt="Selected";	}
                            else
                            {	$txt="";	}
                            echo "<option value=$ns[state_id] $txt readonly>$ns[state_name]</option>";
                        }
                        ?>
                <!-- <option  value="Other" <?php  if($shipping_state=='Other') echo 'Selected'?>   >Other</option>-->
              </select>
            </li>
            <li>
              <label>Zip Code : </label>
              <input type="text"   name="shipping_zipcode" id="shipping_zipcode" value="<?php echo $shipping_zipcode;?>" onKeyDown="mask4(event,this)" onKeyUp="mask4(event,this)" onClick="mask4(event,this)" maxlength="5" tabindex="8">
            </li>
            <div class="spacer"></div>
          </ul>
          <h3>Billing Address :</h3>
          <hr />
          <ul>
            <li>
              <p>Is your billing address the same as your shipping address?</p>
              <span>Yes
              <input type="radio" name="billing_address"   id="billing_address_yes" value="yes" <?php if($billing_status=='yes') echo 'checked="checked"';?>  tabindex="9" onchange="featured_value();">
              </span> <span>No
              <input type="radio" id="billing_address_no"  name="billing_address" value="no" <?php if($billing_status=='no') echo 'checked="checked"';?>   tabindex="10"  onchange="featured_value();" >
              </span> </li>
            <div id="bill_div" <?php  if($billing_status=='no') echo 'style="display:block"'; else echo 'style="display:none"'; ?>>
              <li>
                <label>Street : </label>
                <input type="text"  name="bill_addr"  id="bill_addr"  value="<?php echo $bill_addr;?>"  tabindex="11">
              </li>
              <li>
                <label>City : </label>
                <input type="text"   name="billing_city" id="billing_city" value="<?php echo $billing_city;?>"  onKeyDown="mask8(event,this)" onKeyUp="mask7(event,this)" onClick="mask7(event,this)" maxlength="50" tabindex="12">
              </li>
              <li>
                <label>State : </label>
                <select  id="billing_state" name="billing_state"   title="State / Province"  tabindex="13">
                  <option  value="0">---SELECT---</option>
                  <?php
                        $querystates="SELECT * FROM state_tbl";
                        $querystate=mysql_query($querystates);
                        while($ns=mysql_fetch_array($querystate))
                        {
                            if($ns['state_id']==$billing_state)
                            {	$txt="Selected";	}
                            else
                            {	$txt="";	}
                            echo "<option value=$ns[state_id] $txt readonly>$ns[state_name]</option>";
                        }
                        ?>
                  <!-- <option  value="Other" <?php  if($shipping_state=='Other') echo 'Selected'?>   >Other</option>-->
                </select>
              </li>
              <li>
                <label>Zip Code : </label>
                <input type="text"   name="billing_zipcode" id="billing_zipcode" value="<?php echo $billing_zipcode;?>"  onKeyDown="mask4(event,this)" onKeyUp="mask4(event,this)" onClick="mask4(event,this)" maxlength="5" tabindex="14">
              </li>
              <div class="spacer"></div>
            </div>
          </ul>
          <div class="spacer"></div>
          <h3>Payment Information :</h3>
          <hr />
          <ul class="payements_cards">
            <li><img src="images/visa.png" alt="" title="" /></li>
            <li><img src="images/master_card.png" title="" alt="" /></li>
            <li><img src="images/american.png" title="" alt="" /></li>
            <li><img src="images/discover.png" alt="" title="" /></li>
            <div class="spacer"></div>
          </ul>
          <ul>
            <li>
              <label>Card Number :</label>
              <input type="text" name="ccnum" id="ccnum" value="<?php echo $ccnum;?>" onKeyDown="mask5(event,this)" onKeyUp="mask5(event,this)" onClick="mask5(event,this)" maxlength="16"/>
            </li>
            <li>
              <label>Expire Date:</label>
              <br class="spacer" />
              <select style="width:165px !important;" id="cc_month" name="cc_month" >
                <option  <?php if($cc_month=='0') echo 'selected';?>  value="0">Select</option>
                <option <?php if($cc_month=='1') echo 'selected';?>  value="01">January</option>
                <option <?php if($cc_month=='2') echo 'selected';?>  value="02">Febraury</option>
                <option <?php if($cc_month=='3') echo 'selected';?>  value="03">March</option>
                <option <?php if($cc_month=='4') echo 'selected';?>  value="04">April</option>
                <option <?php if($cc_month=='5') echo 'selected';?>  value="05">May</option>
                <option <?php if($cc_month=='6') echo 'selected';?>  value="06">June</option>
                <option <?php if($cc_month=='7') echo 'selected';?>  value="07">July</option>
                <option <?php if($cc_month=='8') echo 'selected';?>  value="08">August</option>
                <option  <?php if($cc_month=='9') echo 'selected';?> value="09">September</option>
                <option  <?php if($cc_month=='10') echo 'selected';?> value="10">October</option>
                <option  <?php if($cc_month=='11') echo 'selected';?> value="11">November</option>
                <option  <?php if($cc_month=='12') echo 'selected';?>  value="12">December</option>
              </select>
              <select style="width:140px !important;"  name="cc_year" id="cc_year" >
                <option value="0">Select</option>
                <?php
  // Prints something like: Monday
$today = (int)date("Y");                          
for($i=$today;$i<=$today+25;$i++)
{

if($cc_year==$i)
$val_sel='selected';
else
$val_sel='';


    echo "<option ".$val_sel." value=\"".$i."\">".$i."</option>"."\n";
  //echo "test".$i;
}
?>
              </select>
            </li>
            <li>
              <label>CVC</label>
              <br class="spacer" />
              <input style="width:75px" type="text" name="cvnum" id="cvnum" onKeyDown="mask5(event,this)" value="<?php echo $cvnum;?>" onKeyUp="mask5(event,this)" onClick="mask5(event,this)" maxlength="4"/>
            </li>
          </ul>
          <h3>Promo Code</h3>
          <hr />
          <ul>
            <li>
              <label>Promo Code:</label>
              <input style="width:190px" type="text" />
              <button class="apply_button"> Apply Now</button>
            </li>
          </ul>
          <h3>Shipping Method</h3>
          <hr />
          <ul>
            <li>
              <select data-previous="&lt;?=$shippingId?&gt;"  class="form-text-input valid" required="" id="shipping_method" name="shipping_method">
                <option value="4">Standard Ground - $9.95</option>
              </select>
            </li>
          </ul>
          <hr />
          <ul class="order_total MB_10" id="total_div">
            <input type="hidden" name="product_id" id="product_id"  value="<?php echo $product_id;?>"/>
            <li>
              <p>Product Cost:</p>
              <span><?php echo $product_cost;?></span></li>
            <li>
              <p>Discount:</p>
              <span><?php echo $discount;?></span></li>
            <li>
              <p>Shipping Cost:</p>
              <span><?php echo $shipping_cost;?></span></li>
            <li>
              <p>Order Total:</p>
              <span><?php echo $order_total;?></span></li>
          </ul>
          <hr />
          <div class="MB_10" >
            <p style="margin:0px auto; text-align:center;">
              <input type="checkbox" name="terms_and_condition"  id="terms_and_condition" />
              I have read and agreed with the <a style="text-decoration:underline" href="#">Terms & Conditions</a></p>
            <a href="javascript: void(0)" class="place_order" onClick="return validsign();">Place My Order</a>
            <div class="spacer"></div>
          </div>
          <div class="spacer"></div>
        </div>
      </form>
    </div>
    <div class="spacer"></div>
  </div>
  <div class="spacer"></div>
</div>
</div>
<script type="text/javascript" src="js/functions.js"></script>
<script type="application/javascript">
function product_select(productid,productprice,product_value)
{
var arrayFromPHP = <?php echo json_encode($product_value); ?>;
$.each(arrayFromPHP, function (i, elem) {
       var divid = '#product_stat_'+elem;
	if(elem == productid)
	{
	
	$(divid).html('Selected');
	}
	else
	{
	$(divid).html('Select the Product ');
	}
});
var shippingprice = document.getElementById('shipping_method').value;
$.ajax({
  type: "POST",
  url: "ajax_product.php",
  data: { productid: productid, productprice: productprice,shippingprice:shippingprice }
})
  .done(function( msg ) {

   $('#total_div').html(msg);
  });
}

</script>
</body>
</html>
