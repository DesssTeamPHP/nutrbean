<?php 

$full_path ='http://desssecommerce.local-listing.us/';
$uri = $_SERVER['REQUEST_URI'];
$split_uri=explode('/',$uri);
$count=count($split_uri)-1;
$page_name=$split_uri[$count];
if($page_name == '')
{
$page_name = 'index.php';
}
$page_name_array=explode('?',$page_name);
$page_name =$page_name_array[0];		 
$query_page_fetch        = "select * from menu_page_tbl where file_name = '$page_name'";
$page_qty_fetch          = mysql_query($query_page_fetch);
$cnt_page           	 = mysql_num_rows($page_qty_fetch); 
if( $cnt_page>0)  {
$page_fetch=mysql_fetch_assoc($page_qty_fetch);

/*Meta title*/
if(trim($page_fetch['meta_title'])!="")
{ $meta_title = $page_fetch['meta_title']." - NutraBean&#8482;"; }
else 
{ $meta_title = $page_fetch['title']." - NutraBean&#8482;"; }

/*Meta Descriptions*/
if(trim($page_fetch['meta_content'])!="")
{ $meta_desc = $page_fetch['meta_content']; }
else 
{ $meta_desc = $page_fetch['title']; }

/*Meta Keyword*/
if(trim($page_fetch['meta_keyword'])!="")
{ $meta_key = $page_fetch['meta_keyword']; }
else 
{ $meta_key = $page_fetch['title']." - NutraBean&#8482"; }

if(trim($page_fetch['h1_title'])!="")
$h1 = $page_fetch['h1_title'];
else
$h1 = $page_fetch['title'];;
$content = $page_fetch['real_description'];

}
else
{

$h1		    = "";
$content    = "";
$meta_title ="NutraBean&#8482;";
$meta_desc = "NutraBean&#8482; - Descriptions ";
$meta_key = " NutraBean&#8482 - Keywords";
}
  if(isset($_SESSION['session_id']))
  {
  }
  else
  {	
  $_SESSION['session_id']=session_id().date("ymdhis");	
  }

if(isset($_REQUEST['pid']))
{


		$qtyval= $_REQUEST['qtyy'];
	$sid=$_SESSION['session_id']; 
		$pid= $_REQUEST['pid'];
		//$qtyval=$_REQUEST[$name];
		if($qtyval=="0")
		{	$qtyval="1";}
		elseif($qtyval=="")
		{	$qtyval="1";}
		elseif(!eregi('^[0-9]{1,3}$',$qtyval)) 
		{	$qtyval="1";	}
		//$qtyval;
		$query1 = "select * from `products` where products_id='$pid'";
		$exQuery1 = mysql_query($query1);
		while($nt=mysql_fetch_array($exQuery1))
		{	$price=$nt['products_price'];		}
		$qrychk="select * from cart where php_session_id='$sid' and product_id='$pid'";
		$qrychkexe=mysql_query($qrychk);
		$count=mysql_num_rows($qrychkexe);
		if($count==0)
		{	$qryinsertcart="insert into cart values ('','$pid','$qtyval','$sid',now(),'$price',now())";
		 	$qryexec=mysql_query($qryinsertcart);
		}
		 else
		{	while($nt1=mysql_fetch_array($qrychkexe))
			{	$qtytemp=$nt1['quantity'];
				$total=$qtytemp+$qtyval;
				$qryupdatecart="update cart set quantity='$total' where php_session_id='$sid' and product_id='$pid'";
				$qryexec1=mysql_query($qryupdatecart);
			}
		}
		header("location:".$full_path."add_to_cart.php");
	}

 $sid_sc_price=$_SESSION['session_id'];
            $qrychk1_sc_price="select * from cart where php_session_id='$sid_sc_price'";
            $qrychkexe1_sc_price=mysql_query($qrychk1_sc_price);
			
			$cnt_sc_price=mysql_num_rows($qrychkexe1_sc_price);
            $i=0;
			$cnt_total = 0 ;
			$gtotal="";
            while($nt11=mysql_fetch_array($qrychkexe1_sc_price))
            {
			 	$query22 = "select * from `products` where products_id='$nt11[product_id]'";
				$exQuery22 = mysql_query($query22);
				while($nt22=mysql_fetch_array($exQuery22))
				{
					$prod_name=$nt22['products_name'];
					$prod_model=$nt22['products_model'];	
					
				//	$tempweight=$nt11['quantity']*$nt22['products_weight']; 
				} 
				$cnt_total =$cnt_total + $nt11['quantity'];
				$total=$nt11['quantity']*$nt11['product_price'];
				//$weight=$weight+$tempweight;
				$gtotal=$gtotal+$total;?>
    <?php $i++; 
			
            }

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $meta_title ?></title>
<meta name="description" content="<?php echo $meta_desc?>"/>
<meta name="keywords" content="<?php echo $meta_key?>"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/general.css"/>
<link rel="stylesheet" type="text/css" href="css/custom_style.css"/></head>