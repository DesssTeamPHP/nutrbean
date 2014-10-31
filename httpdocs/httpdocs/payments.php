<?php include('admin/core/configuration.php');
 $sid=$_SESSION['session_id']; 

 $msg1 ="";
$first_name ="";
	$last_name ="";
	$name="";
	$name1="";
	$emailid="";
	$primaryphone="";
	$address1="";	
	$address2="";	
	$countrycode="";	
	$country="";		
	$state="";	
	$city="";
	$zipcode="";
	
	

	
if(!isset($_SESSION['uid']))
{
header("location:".$full_path."login.php");	}
	


	
if(isset($_REQUEST['cctype']))
{


$cardType            =  $_REQUEST['cctype'];
$ccrdholdername=$_REQUEST['chname'];
$cc_number           =  $_REQUEST['ccnum'];
$cc_month=$_REQUEST['cc_month'];
$cc_year=$_REQUEST['cc_year'];
$expirydt=$cc_month."/".$cc_year;
$cvvNumber=$_REQUEST['cvnum'];

		include("confirmpayment.php");





	
			}
			
			

$order_id=$_SESSION['order_id'];
			
?>

<?php 
include('common/top_header.php');
?>
<body>
<?php include('common/header.php');?>
<div class="spacer"></div>
<div class="wrapper">
  <div class="container MT_10 MB_20 border1 ">
    <form name="frm_user_payment" class="frm_user_payment" id="frm_user_payment" method="post" onSubmit="return valid_payment();">
      <div class="wrapper_inner">
        <?php if(isset($_REQUEST['failed']))
	{

	echo '<div class="alert alert-danger alert-dismissable">
               
                <strong>Sorry!</strong> Transaction Failed . Please Enter Valid Card Details
            </div>';
		
			
			}?>
        <h2 class="h2">Place Order</h2>
        <?php  
	
	
	   $qrychk11="select * from order_tbl where order_id='$order_id'";
        $qrychkexe111=mysql_query($qrychk11);
        $nt111=mysql_fetch_assoc($qrychkexe111);	
	 $order_send ="";
	   $order_send.='
<style>
.header {
	background: #2089B4;
	border-bottom: 1px solid #FFFFFF;
	border-left: 1px solid #FFFFFF;
	border-right: 1px solid #FFFFFF;
	border-top:1px solid #FFFFFF;
	color: #FFFFFF;
	font-weight: normal;
}
</style>
<table style="margin-top:5px;" align="center" cellpadding="2" cellspacing="2" width="100%" border="0">

  <tr>
    <td colspan="2"><table width="100%" border="0">
        <tr>
          <td class="header" align="center">Sl. No.</td>
          <td class="header" align="center">Product Name</td>
       
          <td class="header" align="center">Price</td>
          <td class="header" align="center">Quantity</td>
          <td class="header" align="center">Total Amount</td>
        </tr>'; 
        
        
         $qrychk1="select * from order_details where order_id='$order_id'";
        $qrychkexe1=mysql_query($qrychk1);
        $cnt=mysql_num_rows($qrychkexe1);
        $i=1;
		$gtotal =0;
        while($nt11=mysql_fetch_array($qrychkexe1))
        {
        $query11 = "select * from `products_description` where products_id='$nt11[product_id]'";
        $exQuery11 = mysql_query($query11);
        while($nt12=mysql_fetch_array($exQuery11))
        {	$prod_name=$nt12['products_name'];	
		} 
         $query22 = "select * from `products` where products_id='$nt11[product_id]'";
        $exQuery22 = mysql_query($query22);
        while($nt22=mysql_fetch_array($exQuery22))
        {	$prod_model=$nt22['products_model'];	
        $tempweight=$nt22['products_weight'];
        $products_price=$nt11['product_price'];
		$prod_name=$nt22['products_name'];	
        } 
        
        $total=$nt11['product_quantity']*$nt11['product_price'];
        $weight=$weight+$tempweight;
        $gtotal=$gtotal+$total;
        $order_send.='
        <tr>
          <td width="5%" style="padding:0 0 0 26px;">'.$i.'</td>
          <td width="30%" style="padding:0 0 0 10px;">'.$prod_name.'</td>
        
          <td width="10%" style="padding:0 0 0 26px;">$
            '.$products_price.'</td>
          <td width="10%" style="padding:0 0 0 50px;">'.$nt11['product_quantity'].'</td>
          <td width="10%" style="padding:0 0 0 26px;">$
            '.number_format($total,2,'.','').'</td>
          ';
          $i++;
          
          } 
          $order_send.='
        <tr>
          <td><br /></td>
        </tr>
		<tr>
          <td colspan="4" style="font-weight:bold" align="right">Shipping and Handling:</td>
          <td style="font-weight:bold; padding:0 0 0 26px;">$
            '.number_format($nt111['shipping_amt'],2,'.','').'</td>
        </tr>
		<tr>
          <td colspan="4" style="font-weight:bold" align="right">Tax Amount:</td>
          <td style="font-weight:bold; padding:0 0 0 26px;">$
            '.number_format($nt111['tax_amt'],2,'.','').'</td>
        </tr>
        <tr>
          <td colspan="4" style="font-weight:bold" align="right">Grand Total:</td>
          <td style="font-weight:bold; padding:0 0 0 26px;">$
            '.number_format($gtotal+$nt111['shipping_amt']+$nt111['tax_amt'],2,'.','').'</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><br /></td>
  </tr>
  <tr height="200px">
    <td width="50%"><table width="70%" style="margin:0 0 35px 0;">
        ';
        
      		
        
       
        
         $qrychk11="select * from order_shipping where order_id='$order_id'";
        $qrychkexe111=mysql_query($qrychk11);
        $nt111=mysql_fetch_assoc($qrychkexe111);
        $qrychk12="select * from us_states where state_id='$nt111[shipping_state]'";
        $qrychkexe112=mysql_query($qrychk12);
        $nt112=mysql_fetch_assoc($qrychkexe112);
        $state=$nt112['state_name'];			
        
        $order_send.='
        <tr>
          <td class="header" colspan="2" align="center">Shipping Address</td>
        </tr>
        <tr>
          <td class="header" width="30%">Name</td>
          <td>'.$nt111["shipping_firstname"].'&nbsp;'.$nt111["shipping_lastname"].'</td>
        </tr>
        <tr>
          <td class="header">Address</td>
          <td>'.$nt111['shipping_address'].'</td>
        </tr>
        <tr>
          <td class="header">City</td>
          <td>'.$nt111['shipping_city'].'</td>
        </tr>
        <tr>
          <td class="header">State</td>
          <td>'.$state.'</td>
        </tr>
        <tr>
          <td class="header">Country</td>
          <td>'.$nt111['shipping_country'].'</td>
        </tr>
        <tr>
          <td class="header">Zip Code</td>
          <td>'.$nt111['shipping_zip'].'</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

'; 
?>

        <article class="con_left1"> <?php echo $order_send;?> </article>
        <article class="con_right1">
          <div class="billing">
            <div class="billing_head1">Payment Method</div>
            <div class="form_fields">
              <div class="input_field fleft">
                <label class="required" ><strong>Carholder's Name :</strong></label>
                <sup>*</sup>
                <div >
                  <input type="text"   title="Credit Card Number"  name="chname" id="chname" value="<?=$chname?>" onKeyDown="mask7(event,this)" onKeyUp="mask7(event,this)" onClick="mask7(event,this)" tabindex="18">
                </div>
              </div>
              <div class="input_field2 fleft">
                <label class="required" ><strong>Credit Card Type</strong></label>
                <sup>*</sup>
                <div >
                  <select tabindex="19" name="cctype" id="cctype" class="required-entry validate-cc-type-select" onclick="Clear_Alert('cctype_error','cctype')">
                    <option <?php if($cctype=='0') echo 'selected';?>   value="0">---SELECT---</option>
                    <option <?php if($cctype=='AmEx') echo 'selected';?> value="AmEx">American Express</option>
                    <option <?php if($cctype=='MasterCard') echo 'selected';?> value="MasterCard">MasterCard</option>
                    <option  <?php if($cctype=='Visa') echo 'selected';?>  value="Visa">Visa</option>
                  </select>
                </div>
              </div>
              <div class="input_field fleft">
                <label class="required" ><strong>Credit Card Number </strong></label>
                <sup>*</sup>
                <div >
                  <input type="text"   title="Credit Card Number" value="" name="ccnum" id="ccnum" onKeyDown="mask5(event,this)" onKeyUp="mask5(event,this)" onClick="mask5(event,this)" maxlength="16" tabindex="20">
                </div>
              </div>
              <div class="input_field fleft">
                <label class="required" ><strong>Security Code</strong></label>
                <sup>*</sup>
                <div >
                  <input type="text"   title="Credit Card Number" value="" name="cvnum" id="cvnum" onKeyDown="mask5(event,this)" onKeyUp="mask5(event,this)" onClick="mask5(event,this)" maxlength="4" tabindex="21">
                </div>
              </div>
              <div class="input_field3 fleft">
                <label class="required" ><strong>Expiration Date</strong></label>
                <sup>*</sup>
                <div >
                  <select tabindex="23" id="cc_month" name="cc_month" onclick="Clear_Alert1('cc_month_error')" style="width:145px" class="month validate-cc-exp required-entry">
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
                  <select name="cc_year" id="cc_year" onclick="Clear_Alert1('cc_month_error')" style="width:92px" class="year required-entry">
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
                </div>
              </div>
              <br class="spacer" />
              <div  style="float:left;">
                <!-- <a href=""> <input class="add_to_cart_bt1" type="submit" name="submit" value="submit">Next</a></div>-->
                <a href="user_shipping_details.php?order_id=<?php echo $_SESSION['order_id'];?>" class="add_to_cart_bt1" >Back</a></div>
            </div>
            <div class="flright">
              <!-- <a href=""> <input class="add_to_cart_bt1" type="submit" name="submit" value="submit">Next</a></div>-->
              <a href="javascript: void(0)" class="add_to_cart_bt1" onClick="return valid_payment();">Submit</a></div>
          </div>
        </article>
     
    </form>
  </div>
    <div class="spacer"></div>
  </div>
</div>

<script>
	function dispspan()
	{	
		var a=document.getElementById('same_as_billing').checked;
		var first_name=document.getElementById('first_name').value;
		var last_name=document.getElementById('last_name').value;
		var address=document.getElementById('address').value;
		var	city=document.getElementById('city').value;
		var primaryphone=document.getElementById('primaryphone').value;
		var country=document.getElementById('country').value;
		var state=document.getElementById('state').value;
		var zipcode=document.getElementById('zipcode').value;
		if(a == true)
		{
			document.getElementById('shipping_firstname').value = first_name;
			document.getElementById('shipping_lastname').value = last_name;
			document.getElementById('shipping_address').value = address;
			document.getElementById('shipping_city').value = city;
			document.getElementById('shipping_state').value = state;
			document.getElementById('shipping_zipcode').value = zipcode;
			document.getElementById('shipping_telephone').value = primaryphone;
			document.getElementById('shipping_country').value = country;
		}
		else
		{
			document.getElementById('shipping_firstname').value = "";
			document.getElementById('shipping_lastname').value = "";
			document.getElementById('shipping_address').value = "";
			document.getElementById('shipping_city').value = "";
			document.getElementById('shipping_state').value = "0";
			document.getElementById('shipping_zipcode').value = "";
			document.getElementById('shipping_telephone').value = "";
			document.getElementById('shipping_country').value = "0";
		}
	}


	function validshipping()
	{	
		var letters = /^[A-Za-z ]{3,50}$/;
		var numbers = /^[0-9]{5}$/;		
		var add=document.getElementById('saddress');
		var coun=document.getElementById('scountry');
		var stat=document.getElementById('sstate');
		var city=document.getElementById('scity');
		var zip=document.getElementById('szip');
		var shipping_method=document.getElementById('shipping_method');
		if(add.value=="")
		{
			alert("Please Enter Shipping Address");
			add.focus();
			return false;
		}		
		else if(coun.value=="0")
		{
			alert("Please Select Country");
			coun.focus();
			return false;
		}
		else if(stat.value=="0")
		{
			alert("Please Select State");
			stat.focus();
			return false;
		}
		else if(city.value=="")
		{
			alert("Please Enter City");
			city.focus();
			return false;
		}
		else if(!city.value.match(letters))
		{
			alert("Please Enter Valid City");
			city.focus();
			return false;
		}
		else if(zip.value=="")
		{
			alert("Please Enter Zip");
			zip.focus();
			return false;
		}		
		else if(shipping_method.value=="0")
		{
			alert("Please Select Shipping Method");
			shipping_method.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
</script>
<?php include('common/footer.php'); ?>
<script type="text/javascript" src="js/function_ship.js"></script>
<script type="text/javascript">
function submitform()
{
    if(document.frm_user_checkout.onsubmit &&
    !document.frm_user_checkout.onsubmit())
    {
        return;
    }
 document.frm_user_checkout.submit();
}
</script>
