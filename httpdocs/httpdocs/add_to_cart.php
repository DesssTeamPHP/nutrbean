<?php
include('admin/core/configuration.php');
include_once ('function.php'); 

if(isset($_REQUEST['action']))
{

if($_REQUEST['action']=='del')
{



	$pid=$_REQUEST['pid'];
	$sid=$_SESSION['session_id']; 
	 $delquery="delete from cart where php_session_id='$sid' and  product_id='$pid'";
	$exedelquery=mysql_query($delquery); 
	if(isset($_SESSION['order_id']))
	{		
	 	$delquery1="delete from order_details where order_id='".$_SESSION['order_id']."'";
		$exedelquery1=mysql_query($delquery1);
	 	$delquery2="delete from order_details_billing where order_id='".$_SESSION['order_id']."'";
		$exedelquery2=mysql_query($delquery2);
	 	$delquery3="delete from order_details_footer where order_id='".$_SESSION['order_id']."'";
		$exedelquery3=mysql_query($delquery3);
	 	$delquery4="delete from order_details_header where order_id='".$_SESSION['order_id']."'";
		$exedelquery4=mysql_query($delquery4);		
	}
	
header('location:add_to_cart.php'); exit;
	
	
}
/*if($_REQUEST['action']=="updat")
{

$count=0;

	$name=$_REQUEST['qtyv'];
	$sid=$_SESSION['session_id']; 
	$pid= $_REQUEST['pid'];
	$qtyval=$_REQUEST[$name];
	
	if($qtyval=="0")
	{	$qtyval="1";}
	elseif($qtyval=="")
	{	$qtyval="1";}
	
	echo $query1 = "select * from `products` where products_id='$pid'";
	$exQuery1 = mysql_query($query1);
	while($nt=mysql_fetch_array($exQuery1))
	{	$price=$nt['products_price'];	}
echo 	$qrychk="select * from cart where php_session_id='$sid' and product_id='$pid'";
	$qrychkexe=mysql_query($qrychk);
	$count=mysql_num_rows($qrychkexe);
	if($count==0)
	{
echo 	 $qryinsertcart="insert into cart values ('','$pid','$qtyval','$sid',now(),'$price',now())";
	 $qryexec=mysql_query($qryinsertcart);
	}
	 else
	{
		while($nt1=mysql_fetch_array($qrychkexe))
		{
			$qtytemp=$nt1['quantity'];
			$total=$qtyval;
		echo 	$qryupdatecart="update cart set quantity='$total' where php_session_id='$sid' and product_id='$pid'";
			$qryexec1=mysql_query($qryupdatecart);
		}
	}

header('location:add_to_cart.php');
}*/

if($_REQUEST['action']=="updat")
{
	$name=$_REQUEST['qtyv'];
	$sid=$_SESSION['session_id']; 
	$pid= $_REQUEST['pid'];
	$qtyval=$_REQUEST[$name];
	
	if($qtyval=="0")
	{	$qtyval="1";}
	elseif($qtyval=="")
	{	$qtyval="1";}
	
	$query1 = "select * from `products` where products_id='$pid'";
	$exQuery1 = mysql_query($query1);	
	$nt=mysql_fetch_array($exQuery1);
	$price=$nt['products_price'];	
	
	$check_quantity = $nt['quantity'];

	if($check_quantity >= $qtyval) { 
	$qrychk="select * from cart where php_session_id='$sid' and product_id='$pid'";
	$qrychkexe=mysql_query($qrychk);
	$count=mysql_num_rows($qrychkexe);
	if($count==0)
	{
	 $qryinsertcart="insert into cart values ('','$pid','$qtyval','$sid',now(),'$price',now())";
	 $qryexec=mysql_query($qryinsertcart);
	}
	 else
	{
		while($nt1=mysql_fetch_array($qrychkexe))
		{
			$qtytemp=$nt1['quantity'];
			$total=$qtyval;
			$qryupdatecart="update cart set quantity='$total' where php_session_id='$sid' and product_id='$pid'";
			$qryexec1=mysql_query($qryupdatecart);
		}
	}
	header('location:add_to_cart.php'); exit;
	}
	else
	{
header('location:add_to_cart.php?q=error'); exit;	
	
	}

}




}

if(isset($_REQUEST['shopping'])=='Continue Shopping')
{	header('location:'.$full_path);	}

if(isset($_REQUEST['submit'])=='CheckOut')
{	

if(!isset($_SESSION['uid']))
{
header("location:".$full_path."login_checkout.php"); exit;	}
else
{	

header('location:user_shipping_details.php');  exit;
}
}

include('common/top_header.php');
?>

<body>
<?php include('common/header.php');

?>
<div class="spacer"></div>
<div class="wrapper">
  <div class="container MT_20">
    <article  class="min_height" >
    <?php if(isset($_REQUEST['q']))
	{
	if($_REQUEST['q']=='error')
	{
	echo '<div class="alert alert-danger alert-dismissable">
               
                <strong>Sorry!</strong> Request product quantity unavailable right now.
            </div>';
			}
			
			}?>
    <h2 class="h2">Shopping Cart</h2>
    
    <?php 
	
	
	$sid=$_SESSION['session_id'];
             $qrychk1="select * from cart where php_session_id='$sid'";
            $qrychkexe1=mysql_query($qrychk1);
			$cnt=mysql_num_rows($qrychkexe1);
      if($cnt>0) {?>
    <article >
      <ul class="cart_head MT_10">
        <li class="li_width_1">Product Name</li>
        <li class="li_width_2">Unit Price</li>
        <li class="li_width_3">Qty</li>
        <li class="li_width_4">Sub Total</li>
        <li class="li_width_5"> Action </li>
      </ul>
      <?php  $i=1;
			$gtotal=0;
			$total=0;
			while($nt11=mysql_fetch_array($qrychkexe1))
            {
			
			  $class='style="background:#efe7e5 !important;"';
	   if(($i%2)==0)
	      $class='style="background:#e2e2e2;"';
			
			
			 	 $query22 = "select * from `products` where products_id='$nt11[product_id]'";
				$exQuery22 = mysql_query($query22);
				while($nt22=mysql_fetch_array($exQuery22))
				{
					$prod_name=$nt22['products_name'];
					$prod_model=$nt22['products_model'];	
				//	$tempweight=$nt11['quantity']*$nt22['products_weight']; 
				
				} 
				$total=$nt11['quantity']*$nt11['product_price'];
				//$weight=$weight+$tempweight;
				$gtotal=$gtotal+$total;?>
      <form action="add_to_cart.php?&pid=<?=$nt11['product_id']?>&qtyv=qty<?=$i;?>&action=updat" method="post">
      
        <ul class="cart_sub">
          <li class="li_width_1" <?php echo $class;?>>
            <?=ucfirst($prod_name)?>
          </li>
          <li class="li_width_2" <?php echo $class;?>> $
            <?=$nt11['product_price'];?>
          </li>
          <li class="li_width_3" <?php echo $class;?>>
            <input name="qty<?=$i?>"  type="text" class="cart_input number_only_valiq" value="<?=$nt11['quantity']?>" maxlength="3"/>
          </li>
          <li class="li_width_4" <?php echo $class;?>>$
            <?=number_format($total,2,'.','')?>
          </li>
          <li class="li_width_5" <?php echo $class;?>>
            <input type="submit" title="Update" value="Update" style="cursor:pointer;" class="cart_buttom" >
            <br />
            <a  href="add_to_cart.php?pid=<?=$nt11['product_id']?>&action=del" class="cart_buttom" title="Remove From Cart" style="text-decoration:none; cursor:pointer;">Remove</a>
        </ul>
      </form>
      <?php $i++;
			
            } 
			
			
			echo ' <div class="spacer"></div>
      </article>';
			
			}    
        
      ?>
      <?php if($cnt>0) {	?>
      <article class="border1 MT_10">
        <ul class="grand_total ">
          <li class="fleft" style="width:65%;">&nbsp;</li>
          <li ><strong style="font-size:large;">Sub Total : $
            <?=number_format($gtotal,2,'.','')?></strong>
          </li>
          <li>&nbsp;</li>
        </ul>
        <div class="spacer"></div>
      </article>
      <?php } ?>
      <article> 
      
       <?php  if($cnt==0) {	?>
       <br>
     <strong> THE SHOPPING CART IS CURRENTLY EMPTY</strong> <br>
    <?php    
       }
      ?>
      
      <a class="cart_buttom fleft" title="Continue Shopping"  href="<?=$full_path?>">Continue Shopping</a>
       <?php  if($cnt>0) {	?>
      <form action="" method="post" style="float:right;">
        <input type="hidden" value="<?=$gtotal?>" name="gtotal" id="gtotal" />
      <input type="hidden" value="<?=$weight?>" name="weight" id="weight" />
      <input type="submit" name="submit" value="CheckOut" class="cart_buttom flright" title="CheckOut" style="cursor:pointer;">
      </form>
      <?php } ?>
        </article>
    </article>
    <div class="spacer"></div>
  </div>
</div>

<?php include('common/footer.php');?>
