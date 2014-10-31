<?php
include('admin/core/configuration.php');
$full_path =base_url();

/*************Get The Data From Previous Page*********************************************/
if(isset($_SESSION['first_name'],$_SESSION['last_name'],$_SESSION['email_field'],$_SESSION['phone_field']))
{
$first_name		        =	$_SESSION['first_name'];
$last_name		        =	$_SESSION['last_name'];
$emailid		        =	$_SESSION['email_field'];
$primaryphone	        =	$_SESSION['phone_field'];

}
else if(isset($_SESSION['userid_guest'])) { 
$GetUser	 = "select * from user_details where id='".$_SESSION['userid_guest']."'";
$exe_GetUser = mysql_query($GetUser);
if(mysql_num_rows($exe_GetUser)>0) {
$Fetch_login_user=mysql_fetch_array($exe_GetUser);
$first_name		        =	$Fetch_login_user['first_name'];
$last_name		        =	$Fetch_login_user['last_name'];
$emailid		        =	$Fetch_login_user['e_mail'];
$primaryphone	        =	$Fetch_login_user['prim_tele_phone'];		
}
else
{
$first_name		        =	"";
$last_name		        =	"";
$emailid		        =	"";
$primaryphone	        =	"";
}					
					
}
else
{
$first_name		        =	"";
$last_name		        =	"";
$emailid		        =	"";
$primaryphone	        =	"";
}

/*************Declaring The Variable*********************************************/
$shipping_address 		=	"";
$shipping_city 			=	"";
$shipping_state 		=	"";
$shipping_zipcode 		=	"";

$ccnum					=	"";
$cc_month				=	"";
$cc_year				=	"";
$cvnum					=	"";

$bill_addr				=	"";
$billing_city			=	"";
$billing_state			=	"";
$billing_zipcode		=	"";



$product_cost 			=	'$0.00';
$product_id 			=	"";

$discount				=	'$0.00';
$shipping_cost			=	'$0.00';
$order_total			=	'$0.00';
$billing_status       	= 'yes';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<style>
body {
	color:#383838;
	font-family:Calibri;
}
.cont_left {
	float:left;
	margin:10px 0px 0px 10px;
	width:550px;
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
	float: left;
    padding: 15px 5px;
    width: 254px;
}
.sell_product ul li div p{
	margin:0px 0px 10px 0px;
}
.sell_product ul li div img {
	margin:10px 0px 10px 20px;/*height:295px;*/
}
.sell_product ul li div h1 {
	text-align:center;
	color:#004B85;
	font-size:25px;
	margin:0px 0px 10px 0px;
}
.sell_product ul li div h2 {
	text-align:center;
	color:#1A572E;
	margin:0px 0px 10px 0px;
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
	background: none repeat scroll 0 0 #004B85;
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
	margin-top:10px;
}
.MT_10 {
	margin-top:10px !important;
}
.order_list {
	border:1px solid #c6c6c6;
	border-radius:5px;
	padding:0px 10px 0px 10px;
	margin:10px 0px 0px 0px;
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
	margin: 0 132px 0 -31px;
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
.alert-danger {
	color: #b94a48;
	background-color: #f2dede;
	border-color: #eed3d7;
}
.alert {
	padding: 8px 14px;
	margin-bottom:5px;
}
.text_1{
	margin:10px 0px 10px 0px
}
.text_1 p{
	margin:0px 0px 10px 0px;
}
</style>
</head>
<body>
<?php include('common/header.php');
if(isset($_REQUEST['first_name']))
{
	
/*************Assign Non Logged User as Guest*********************************************/

    if(!isset($_SESSION['uid']))
     {
     $_SESSION['uid'] = 'Guest';
	 $_SESSION['userid_guest'] ='new';
     }
///////////////////////////////////////////////////////////////////////////////////////////////


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
//$cardType            =  $_REQUEST['cctype'];
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




/*************Check Whether User as Guest*********************************************/


if($_SESSION['uid']=='Guest' )
	{
	if($_SESSION['userid_guest']=='new')
		{
		$etguest_pass        = 'guest'.$first_name.$last_name.$emailid;
        $qryinsertuser       = "INSERT INTO user_details values
						('','','$first_name','$last_name','$address','$city','$state','$country','$primaryphone','$emailid','2','$etguest_pass','1',now(),now(),'$zipcode','1')";	 
		
		$qryinsexe           = mysql_query($qryinsertuser);	
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
		$userid               =  $_SESSION['uid'];
		$Query_usr_order      =  "SELECT * FROM user_details 
								  WHERE e_mail='$userid'";
		$Run_Query_usr        =  mysql_query($Query_usr_order);
		$Get_user_details_order=  mysql_fetch_assoc($Run_Query_usr);
		$user_session_id      =  $Get_user_details_order['id'];
		}
		
		  if(isset($_SESSION['session_id']))
  {
  }
  else
  {	
  $_SESSION['session_id']=session_id().date("ymdhis");	
  }
  
		$php_session_id       =  $_SESSION['session_id'];
	   
		
	    $session_bill_amount      =  $grant_total;		
		$deliverDate              =  date('Y-m-d');
		$odate                    =  date('Y-m-d');
		$paymentMethod            =  'authorised.net';
		$deliverStatus            =  'Pending';
		$ipAddress                =  $_SERVER['REMOTE_ADDR'];
		$date                     =  date('d');		
		$month                    =  date('m');		
		$year                     =  date('y');		
		$hour                     =  date('his');		
		
		
		/*************Generate Order Id*********************************************/
		$auto_order_id            =  $year.$date.$month.generateRandomString(3).$user_session_id;
		
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
		$tax_amount             = 	0;
		
		
/*Updating / insering  order table 	*/	
		
		 $Qry_Get_order          =   "SELECT * FROM order_tbl WHERE customer_id='$user_session_id' AND php_session_id ='$php_session_id'";
		$Run_Qry_Get_order      =    mysql_query($Qry_Get_order);
		if(!$Run_Qry_Get_order)
		echo mysql_error();
		$Count_Qry_Get_order    =    mysql_num_rows($Run_Qry_Get_order);
		if($Count_Qry_Get_order>0)
		{
		$fetch_last_id          =   mysql_fetch_array($Run_Qry_Get_order);
		$last_order_id_inc      =   $fetch_last_id['id'];
		
		 $Qry_update_order		= 'UPDATE order_tbl SET
												customer_id				    =	\''.addslashes($user_session_id).'\',
												php_session_id				=	\''.addslashes($php_session_id).'\',
												billing_amt					=	\''.addslashes($session_bill_amount).'\',
												shipping_amt				=	\''.addslashes($shipping_rate).'\',
												tax_amt 					=	\''.$tax_amount.'\',
												billing_same				=	\''.$billing_status.'\',
												grand_pay 					=	\''.$session_bill_amount.'\',
												payment_method				=	\''.$paymentMethod.'\',
												hanling_fees				=	\''.$hanlingFees.'\',												
												delivary_status				=	\''.$deliverStatus.'\',										
												ip_address					=	\''.$ipAddress.'\',
												order_id					=	\''.addslashes($order_id).'\',
												shipping_provider			=	\''.addslashes($shipping_provider).'\',
												order_created				=	\''.date("Y-m-d H:i:s").'\',
												order_status				=	\''.$orderStatus.'\'
									WHERE `customer_id`=\''.$user_session_id.'\' AND `php_session_id`=\''.$php_session_id.'\''; 


			$Run_Qry_update_order = mysql_query($Qry_update_order);	
			if(!$Run_Qry_update_order)
			{
			echo mysql_error();
			exit;
			}			
		}
		else
		
		{
	  	$Qry_ins_new_order      = 'INSERT INTO order_tbl 
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


		$Run_Qry_ins_new_order   =   mysql_query($Qry_ins_new_order);	
			if(!$Run_Qry_ins_new_order)
			{
			echo mysql_error();
			exit;
			}
			$last_order_id_inc     =   mysql_insert_id();		
		}
		
/*Updating / insering  order table child billing addtess 	*/			
		
	  	$qry_billing      	     = "SELECT * FROM order_billing WHERE customer_id='$user_session_id' and php_session_id ='$php_session_id'";
		$qryexe_billing   		 =  mysql_query($qry_billing);
			if(!$qryexe_billing)
		echo mysql_error();
		$qrycnt_billing     	 =  mysql_num_rows($qryexe_billing);
		if($qrycnt_billing>0)
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
		 $result_billing 			= mysql_query($query_billing);
			if(!$result_billing)
			{
			echo mysql_error();
			exit;
			}	
															
		
		
		}
		else
		{
 	  	$query_billing     		 = "INSERT INTO `order_billing` SET
															`customer_id`           =   '".addslashes($user_session_id)."' ,
															`php_session_id`        =   '".addslashes($php_session_id)."' ,
															`order_id`              =   '".addslashes($order_id)."' ,														
															`parent_id`             =   '".$last_order_id_inc."',																															
															`first_name`            =   '".$first_name."',	 	
															`last_name`             =   '".$last_name."',	 
															`emailid`               =   '".$emailid."',	 
															`primaryphone`          =   '".$primaryphone."',	
															`billing_created`       =   '".date("Y-m-d H:i:s")."' ,	
															`address`               =   '".$billing_address."',	 
															`city`                  =   '".$billing_city."',	
															`state`                 =   '".$billing_state."',																
															`zipcode`               =   '".$billing_zipcode."'";															
		 $result_billing        =   mysql_query($query_billing);
		 if(!$result_billing)
			{
			echo mysql_error();
			exit;
			}	
															
		 $last_billing_id_inc = mysql_insert_id(); 
				
		
		}
		
		
		
/*Updating / insering  order table child Shipping addtess 	*/			
		
	  	$qry_order_shipping        =      "SELECT * FROM order_shipping WHERE customer_id='$user_session_id' and php_session_id ='$php_session_id'";
		$qryexe_order_shipping     =       mysql_query($qry_order_shipping);
		if(!$qryexe_order_shipping)
		echo mysql_error();
		$qrycnt_order_shipping     =       mysql_num_rows($qryexe_order_shipping);
		
		if($qrycnt_order_shipping>0)
		{
		$fetch_last_id_order_shipping      =     mysql_fetch_array($qryexe_order_shipping);
		$last_order_shipping_id_inc        =     $fetch_last_id_order_shipping['id'];
	 	$query_order_shipping              =     "UPDATE order_shipping SET
												            `order_id`               =   '".addslashes($order_id)."' ,
												            `customer_id`            =   '".addslashes($user_session_id)."' ,
											                `php_session_id`         =   '".addslashes($php_session_id)."' ,
															`parent_id`              =   '".$last_order_id_inc."',																															
															`shipping_firstname`     =   '".addslashes($first_name)."',
															`shipping_lastname`      =   '".addslashes($last_name)."',
															
															`shipping_address`       =   '".addslashes($shipping_address)."',
															`shipping_city`          =   '".addslashes($shipping_city)."',
															`shipping_state`         =   '".addslashes($shipping_state)."',
															`shipping_country`       =   '".addslashes($shipping_country)."',
															`shipping_created`       =   '".date("Y-m-d H:i:s")."',	
															`shipping_zip`           =   '".addslashes($shipping_zipcode)."'													
												  WHERE `customer_id`='".$user_session_id."' and `php_session_id`='".$php_session_id."'";												
		$result_order_shipping = mysql_query($query_order_shipping);
		if(!$result_order_shipping)
			{
			echo mysql_error();
			exit;
			}	
															
		
		
		}	
		else
		
			{
	  	$query_order_shipping      =      "INSERT INTO `order_shipping` SET
															`customer_id`                  =      '".addslashes($user_session_id)."' ,
															`order_id`                     =      '".addslashes($order_id)."' ,
															`php_session_id`               =      '".addslashes($php_session_id)."' ,	
															`parent_id`                    =      '".$last_order_id_inc."',																															
															`shipping_firstname`           =      '".addslashes($first_name)."',
															`shipping_lastname`            =      '".addslashes($last_name)."',
															
															`shipping_address`             =      '".addslashes($shipping_address)."',
															`shipping_city`                =      '".addslashes($shipping_city)."',
															`shipping_state`               =      '".addslashes($shipping_state)."',
															`shipping_country`             =      '".addslashes($shipping_country)."',
															`shipping_created`             =      '".date("Y-m-d H:i:s")."' ,	
															`shipping_zip`                 =      '".addslashes($shipping_zipcode)."'";															
		$result_order_shipping = mysql_query($query_order_shipping);
									
			if(!$result_order_shipping)
			{
			echo mysql_error();
			exit;
			}	
															
			$last_order_shipping_id_inc = mysql_insert_id(); 
				
		
		}
		
	
			$product_id        =    $_REQUEST['product_id'];
			$product_quantity  =    1;
			$product_price     =    $_REQUEST['product_cost'];
			$total_price       =    $_REQUEST['product_cost'];;
			
		 	$Get_order_details 			 =	"SELECT * FROM order_details WHERE customer_id='$user_session_id' and php_session_id ='$php_session_id' ";
			$Run_Get_order_details 		 =	 mysql_query($Get_order_details);
				if(!$Run_Get_order_details)
		echo mysql_error();
			$Fetch_Run_Get_order_details =	 mysql_fetch_assoc($Run_Get_order_details);
			$Count_Get_order_details	 =   mysql_num_rows($Run_Get_order_details);			
			if($Count_Get_order_details>0)
			
			
				{ 
			 	$Up_order_detail = "UPDATE order_details SET
													        `customer_id`         =  '".addslashes($user_session_id)."',
															`order_id`             =  '".$order_id."',	
															`parent_id`            =  '".$last_order_id_inc."',
															`php_session_id`       =  '".addslashes($php_session_id)."',
															`product_quantity`     =  '".addslashes($product_quantity)."',
															`product_price`        =  '".addslashes($product_price)."',
															`total_amount`         =  '".addslashes($total_price)."'
									WHERE `customer_id`='".$user_session_id."' and `php_session_id`='".$php_session_id."' ";
								
			  $Run_Up_order_detail = mysql_query($Up_order_detail);
			if(!$Run_Up_order_detail)
			{
			echo mysql_error();
			exit;
			}	
			
			}

	else
			{
		 	$Ins_order_detail = "INSERT INTO `order_details` SET
															`customer_id`           =  '".addslashes($user_session_id)."' ,
															`product_id`             =  '".$product_id."',	
															`order_id`               =  '".$order_id."',																 
															`parent_id`              =  '".$last_order_id_inc."',
															`php_session_id`         =  '".addslashes($php_session_id)."',
															`product_quantity`       =  '".addslashes($product_quantity)."',
															`product_price`          =  '".addslashes($product_price)."',
															`total_amount`           =  '".addslashes($total_price)."'";
			$Run_Ins_order_detail		 = mysql_query($Ins_order_detail);
			if(!$Run_Ins_order_detail)
				{
				echo mysql_error();
				exit;
				}	
			$last_insert_id = mysql_insert_id(); 
			}  
			echo "s"; 
	include("confirmpayment.php");exit;
	}
	
	if(isset($_REQUEST['order_id']) )	
{		
$order_id				=	$_REQUEST['order_id'];
 $Order_get_details		=	"SELECT order_billing_var.address,order_billing_var.city,order_billing_var.state,order_billing_var.zipcode,
									order_shipping_var.shipping_firstname,order_shipping_var.shipping_lastname,order_shipping_var.shipping_address,
									order_shipping_var.shipping_city,order_shipping_var.shipping_state,order_shipping_var.shipping_zip,
									order_shipping_var.shipping_country,
									order_details_var.product_price,order_details_var.product_id,
									order_tbl_var.shipping_provider,order_tbl_var.billing_amt,order_tbl_var.billing_same,order_tbl_var.customer_id
							
							 FROM  order_billing order_billing_var,
							 	   order_shipping order_shipping_var,
								   order_details order_details_var,
								   order_tbl order_tbl_var
							 where order_tbl_var.order_id='".$order_id."' AND order_shipping_var.order_id='".$order_id."' AND order_details_var.order_id='".$order_id."' AND order_billing_var.order_id='".$order_id."' Group by order_tbl_var.order_id ";         
$Run_Order_get_details	=	 mysql_query($Order_get_details);
if(!$Run_Order_get_details)
echo mysql_error();

$Fetch_order_details	=	mysql_fetch_array($Run_Order_get_details);           
$bill_addr				=   $Fetch_order_details['address'];
$billing_city			=	$Fetch_order_details['city'];
$billing_state			=	$Fetch_order_details['state'];	
$billing_zipcode		=	$Fetch_order_details['zipcode'];

$shipping_firstname		=	$Fetch_order_details['shipping_firstname'];
$shipping_lastname		=	$Fetch_order_details['shipping_lastname'];
$shipping_address		=	$Fetch_order_details['shipping_address'];
$shipping_city			=	$Fetch_order_details['shipping_city'];
$shipping_state			=	$Fetch_order_details['shipping_state'];
$shipping_zipcode		=	$Fetch_order_details['shipping_zip'];

$shipping_country		=	$Fetch_order_details['shipping_country'];	

 $product_cost 			=	'$'. $Fetch_order_details['product_price'];

$product_id 			=	$Fetch_order_details['product_id'];

     
$shipping_cost			=	'$'. $Fetch_order_details['shipping_provider'];
$order_total			=	'$'. $Fetch_order_details['billing_amt'];
$billing_status			=	$Fetch_order_details['billing_same'];
$customer_id			=	$Fetch_order_details['customer_id'];


$Get_usr_details		= "SELECT first_name,last_name,e_mail,prim_tele_phone from user_details where id='".$customer_id."'";         
$Run_usr_details		=  mysql_query($Get_usr_details);
$Fetch_Get_usr_details  =  mysql_fetch_assoc($Run_usr_details);       
$first_name		        =  $Fetch_Get_usr_details['first_name'];
$last_name		        =  $Fetch_Get_usr_details['last_name'];
$emailid		        =  $Fetch_Get_usr_details['e_mail'];
$primaryphone	        =  $Fetch_Get_usr_details['prim_tele_phone'];

}	

	
?>
<div class="spacer"></div>
<div class="wrapper">
  <div class="container MT_10 MB_20 border1 ">
    <div class="cont_left MB_20">
      <div class="pro_head">
        <h2><span>Step 2 : </span>Choose Your Product</h2>
      </div>
      <?php 
	$Get_product		 = 'SELECT * FROM products limit 0,4';
	$Run_Get_product 	 = mysql_query($Get_product);
	if(!$Run_Get_product)
	echo mysql_error();
	$priduct_values_inc	 =	1;
	$page_count			 =	mysql_num_rows($Run_Get_product);
	if($page_count>0)
	{
		while ($Fetch_product = mysql_fetch_array($Run_Get_product)) 
			{ 
			$product_value[]=$Fetch_product['products_id'];
	?>
      <div class="sell_product MT_10">
        <ul>
          <li>
            <div>
              <?php
			if($Fetch_product['products_image']!='' & file_exists('admin/uplodeImage/thumbImg/'.$Fetch_product['products_image']))
				{
				echo '<img src="admin/uplodeImage/thumbImg/'.$Fetch_product['products_image'].'"   alt="'.$Fetch_product['products_image'].'" title="'.$Fetch_product['products_image'].'" /> ';
			   }
    	   else
     			{
   			  echo '<img src="images/logo1.png" alt="'.$Fetch_product['products_name'].'" title="'.$Fetch_product['products_name'].'" align="absmiddle">';
	  		 }
     ?>
            </div>
          </li>
          <li>
            <div>
              <h1><?php echo $Fetch_product['products_name']; ?></h1>
              <h4 style="color:#01cf8f;"><?php echo $Fetch_product['products_url']; ?></h4>
              <br class="spacer" />
             
              <h4 style="font-size:20px;">$<?php echo $Fetch_product['products_price']; ?></h4>
              <h3 style="color:#1f497d;"><small style="color:#000000">ONLY </small>$<?php echo $Fetch_product['actual_price']; ?> TODAY!</h3>
              <br class="spacer" />
              <div><?php echo substr(stripslashes($Fetch_product['products_description']),0,1000); ?></div>
              
              <?php
			  if(trim($Fetch_product['actual_price'])=="")
			  {
				$val_value = $Fetch_product['products_price'];
			  }
			  else
			  {
				$val_value=  $Fetch_product['actual_price'];
			  }
			  ?>
              
             <!-- <img src="images/right_icon.png" />--><a id="product_stat_<?php echo $Fetch_product['products_id']; ?>" style="cursor:pointer"  onclick="product_select('<?php echo$Fetch_product['products_id']; ?>','<?php echo $val_value; ?>','<?php echo $product_value;?>')">
              <?php if($product_id==$Fetch_product['products_id']) echo 'Item has Been Added'; else  echo 'Item has Been Add';?>
              </a>
              
              
               </div>
          </li>
          <div class="spacer"></div>
        </ul>
        <hr />
        <div class="text_1">
          <p><?php echo substr(stripslashes($Fetch_product['products_description']),0,1000); ?></p>
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
      <?php echo $errmsg; ?>
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
              <br class="spacer" />
              <span>Yes
              <input type="radio" name="billing_address"   id="billing_address_yes" value="yes" <?php if($billing_status=='yes') echo 'checked="checked"';?>  tabindex="9" onchange="featured_value();">
              </span> <span>No
              <input type="radio" id="billing_address_no"  name="billing_address" value="no" <?php if($billing_status=='no') echo 'checked="checked"';?>   tabindex="10"  onchange="featured_value();" >
              </span> </li>
              <br class="spacer" />
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
            <div style="color:#F00"; id="disp"></div>
              <label>Promo Code:</label>
              <br class="spacer" />
              <input style="width:190px" type="text"  name="promocode" id="promocode"/>
             <!-- <input type="hidden" name="promo_quote_discount_amount" id="promo_quote_discount_amount" value="<?php echo $promo_quote_discount_amount; ?>" />-->
             <a href="javascript:void(0)" type="submit" id="promoapply" class="apply_button" name="submit"> Apply Now</a>
             <div id="disp"></div>
            </li>
          </ul>
          <h3>Shipping Method</h3>
          <hr />
          <ul>
          <br class="spacer" />
            <li>
              <select data-previous="&lt;?=$shippingId?&gt;"  class="form-text-input valid" required="" id="shipping_method" name="shipping_method">
                <option value="4">Standard Ground - $4.00</option>
              </select>
            </li>
            <br class="spacer" />
          </ul>
          <hr />
          <a  class="place_order" href="http://www.nutrabean.local-listing.us/product_details.php">Clear Shopping Cart</a>
           <br class="spacer" />
          <br class="spacer" />
          <ul class="order_total MB_10" id="total_div">
            <input type="hidden" name="product_id" id="product_id"  value="<?php echo $product_id;?>"/>
            
            <li>
              <p>Product Cost:</p>
              <span><?php echo $product_cost;?></span></li>
            <li>
              <p>Discount:</p>
              <span id="vall">$0.00</span>
              
              </li>
            <li>
              <p>Shipping Cost:</p>
              <span><?php echo $shipping_cost;?></span></li>
            <li>
              <p>Order Total:</p>
              <span><?php echo $order_total;?></span></li>
          </ul>
          <br class="spacer" />
          <hr />
          <br class="spacer" />
          <div class="MB_10" >
            <p style="margin:0px auto; text-align:center;">
              <input type="checkbox" name="terms_and_condition"  id="terms_and_condition" />
              I have read and agreed with the <a style="text-decoration:underline"  href="terms-conditions.html">Terms & Conditions</a></p>
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
<script type="text/javascript" src="js/script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<!--For Choosing Billing Information-->
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
<script type="application/javascript">
function product_select(productid,productprice,product_value,promocode)
{
var arrayFromPHP = <?php echo json_encode($product_value); ?>;
$.each(arrayFromPHP, function (i, elem) {
       var divid = '#product_stat_'+elem;
	if(elem == productid)
	{
	
	$(divid).html('Item has Been Added');
	}
	else
	{
	$(divid).html('Item has Been Add ');
	}
});
var shippingprice = document.getElementById('shipping_method').value;
var promocode = document.getElementById('promocode').value;
$.ajax({
  type: "POST",
  url: "ajax_product.php",
  data: { productid: productid, productprice: productprice,shippingprice:shippingprice,promocode:promocode }
})
  .done(function( msg ) {

   $('#total_div').html(msg);
  });
}

</script>




<script type="text/javascript">
$(document).ready(function(){
$("#promoapply").click(function() {
	//alert("a");
var promocode = $('#promocode').val();
var promo_quote_discount_amount = $('#promo_quote_discount_amount').val();
var promo_quote_usescoupon = $('#promo_quote_usescoupon').val();
if(promocode=="")
{
$("#disp").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax_promocode.php",
data: "promocode="+ promocode ,
success: function(html){
	//alert(html);
	if(html.trim()=='yes')
	{
	$("#disp").html("Congratulations you have redeemed the Discount Coupon");	
	
	//var promo_quote_discount_amount 	 = document.getElementById('promo_quote_discount_amount').value;
$.ajax({
  type: "POST",
  url: "ajax_discount.php",
 data: "promocode="+ promocode ,
 success: function(html){
 $("#vall").html(html);
 var productid = document.getElementById('product_id').value;
 var productprice = document.getElementById('product_cost').value;
  product_select(productid,productprice,productid,promocode)
 }	
 })
	}
	else
	{
	$("#disp").html("Invalid Coupon Code");		
		
	}
//$("#disp").html(html);
}
});
return false;
}
});
});
</script>



<br class="spacer">
</body>
</html>
