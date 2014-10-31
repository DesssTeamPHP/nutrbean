<?php 

$order_send="";
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
          <td colspan="4" style="font-weight:bold" align="right">Total:</td>
          <td style="font-weight:bold; padding:0 0 0 26px;">$
            '.number_format($gtotal,2,'.','').'</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><br /></td>
  </tr>
  <tr height="200px">
    <td width="50%"><table width="70%" style="margin:0 0 35px 0;">
        ';
        
         $qrychk11="select * from order_tbl where order_id='$order_id'";
        $qrychkexe111=mysql_query($qrychk11);
        $nt111=mysql_fetch_assoc($qrychkexe111);			
        
        $order_send.='
        <tr>
          <td class="header" colspan="2" align="center">Billing Details</td>
        </tr>
        
        <tr>
          <td class="header">Shipping Amount</td>
          <td>$
            '.$nt111['shipping_amt'].'</td>
        </tr>
        <tr>
          <td class="header">Tax Amount</td>
          <td>$
            '.$nt111['tax_amt'].'</td>
        </tr><tr>
          <td class="header">Total Amount</td>
          <td>$'. number_format($nt111['billing_amt'],2,'.','').'</td>
        </tr>
        
      </table></td>
    <td><table width="70%" style="padding-top:25px">
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



$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$INCLUDE_DIR = "mailer/";
require($INCLUDE_DIR . "class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();                                   // send via SMTP
$mail->SetLanguage("en", 'mailer/language/');	
$mail->Host     = "smtp.1and1.com"; // SMTP servers
$mail->Port     = 587 ; // SMTP Port
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "jayaraj@desss.com";  // SMTP username
$mail->Password = "1234567"; // SMTP password
$mail->From     = "test@desss.com";
$mail->FromName = "Nutrabean";
$mail->AddAddress($emailid);     
$mail->AddBCC("jayaraj@desss.com");
//$mail->AddBCC("balajiseo@desss.com");
$mail->AddBCC("karunakaran@desss.com");
$subject = "Invoice For Order No. ".$order_id." From Nutrabean  | TEST MODE |" ;
$mail->IsHTML(true);                               // send as HTML
$mail->Subject  =  $subject;
$mail->Body     =  $order_send;		
if(!$mail->Send())
{
	echo "Mailer Error: " .$emailid. $mail->ErrorInfo;
	 exit;      
//header('Location:forgotpassword.php?msg1=0');exit;
 

}	
?>