<?php 

$order_send="";
$order_send.='
<style type="text/css">
body, td {
	color:#2f2f2f;
	font:11px/1.35em Verdana, Arial, Helvetica, sans-serif;
}
</style>
<body style="background:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin:0; padding:0;">
<div style="background:#F6F6F6; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin:0; padding:0;">
  <table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
      <td align="center" valign="top" style="padding:20px 0 20px 0"><table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="0" width="650" style="border:1px solid #E0E0E0;">
          <!-- [ header starts here] -->
          <tr>
            <td valign="top"><a href="http://nutrabean.local-listing.us"><img title="Nutrabean" alt="Nutrabean" src="http://nutrabean.local-listing.us/images/logo.png"  style="margin-bottom:10px;" border="0"/></a></td>
          </tr>
          <!-- [ middle starts here] -->';
		  $qrychk11="select * from order_shipping where order_id='$order_id'";
        $qrychkexe111=mysql_query($qrychk11);
        $nt111=mysql_fetch_assoc($qrychkexe111);
          $order_send.='<tr>
            <td valign="top"><h1 style="font-size:22px; font-weight:normal; line-height:22px; margin:0 0 11px 0;"">Hello, '.$nt111["shipping_firstname"].'&nbsp;'.$nt111["shipping_lastname"].'</h1>
              <p style="font-size:12px; line-height:16px; margin:0;"> Thank you for your order from Nutrabean.
              <p style="font-size:12px; line-height:16px; margin:0;">Your order confirmation is below. Thank you again for your business.</p>
          </tr>
          <tr>
            <td><h2 style="font-size:18px; font-weight:normal; margin:0;">Your Order No. '.$nt111["order_id"].' <small>From Nutrabean</small></h2></td>
          </tr>
          <tr>
            <td>
            <table cellspacing="0" cellpadding="0" border="0" width="650">
                <thead>
                  
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              <br/>
        
		
		 <table cellspacing="0" cellpadding="0" border="0" width="650">
                <thead>
                  <tr>
                    <th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px; padding:5px 9px 6px 9px; line-height:1em;">Shipping Address:</th>
                    
                    
                  </tr>
                </thead>
                <tbody>';
				 $qrychk11="select * from order_shipping where order_id='$order_id'";
        $qrychkexe111=mysql_query($qrychk11);
        $nt111=mysql_fetch_assoc($qrychkexe111);
        $qrychk12="select * from us_states where state_id='$nt111[shipping_state]'";
        $qrychkexe112=mysql_query($qrychk12);
        $nt112=mysql_fetch_assoc($qrychkexe112);
        $state=$nt112['state_name'];	
                   $order_send.='<tr>
                    <td valign="top" style="font-size:12px; padding:7px 9px 9px 9px; border-left:1px solid #EAEAEA; border-bottom:1px solid #EAEAEA; border-right:1px solid #EAEAEA;">'.$nt111["shipping_firstname"].'&nbsp;'.$nt111["shipping_lastname"].'<br/>
                     '.$nt111['shipping_address'].'<br />
                      '.$nt111['shipping_city'].'<br/>
                      '.$state.'<br/>
					  '.$nt111['shipping_country'].'<br/>
                      '.$nt111['shipping_zip'].'
                      &nbsp; </td>
                    <td>&nbsp;</td>
                   </tr>
                </tbody>
              </table>
              <br/>
              <table cellspacing="0" cellpadding="0" border="0" width="650" style="border:1px solid #EAEAEA;">
                <thead>
                  <tr>
                    <th align="left" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Product Name</th>
                    <th align="left" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Price</th>
                    <th align="center" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Quantity</th>
                    <th align="right" bgcolor="#EAEAEA" style="font-size:13px; padding:3px 9px">Sub Total</th>
                  </tr>
                </thead>
                <tbody bgcolor="#F6F6F6">';
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
				
				
				
				
				<br/>
                  <tr>
                    <td align="left" valign="top" style="font-size:11px; padding:3px 9px; border-bottom:1px dotted #CCCCCC;"><strong style="font-size:11px;">'.$prod_name.'</strong>
                      </td>
                    <td align="left" valign="top" style="font-size:11px; padding:3px 9px; border-bottom:1px dotted #CCCCCC;">$'.$products_price.'</td>
                    <td align="center" valign="top" style="font-size:11px; padding:3px 9px; border-bottom:1px dotted #CCCCCC;">'.$nt11['product_quantity'].'</td>
                    <td align="right" valign="top" style="font-size:11px; padding:3px 9px; border-bottom:1px dotted #CCCCCC;"><span class="price">$'.number_format($total,2,'.','').'</span><br/><br/><br/><br/></td>';
					 $i++;
          
          } 
                  $order_send.=' </tr>
                </tbody>
                <tbody>
				
				 <tr class="subtotal">
                    <td colspan="3" align="right" style="padding:3px 9px"> Subtotal </td>
                    <td align="right" style="padding:3px 9px"><span class="price">$'.number_format($gtotal,2,'.','').'</span><br/></td>
                  </tr><br/>';
				  $qrychk11="select * from order_tbl where order_id='$order_id'";
                  $qrychkexe111=mysql_query($qrychk11);
                  $nt111=mysql_fetch_assoc($qrychkexe111);
                     $order_send.='<tr class="shipping">
				   
                   <td colspan="3" align="right" style="padding:3px 9px"> Shipping Cost </td>
                    <td align="right" style="padding:3px 9px"><span class="price">$'.$nt111['shipping_amt'].'</span><br/></td>
                  </tr>
				  <br/>
				  <tr class="shipping">
                   <td colspan="3" align="right" style="padding:3px 9px">Tax Amount</td>
                     <td align="right" style="padding:3px 9px"><span class="price">$'.$nt111['tax_amt'].'</span><br/></td>
                  </tr>
				  <br/>
                  <tr class="grand_total">
                    <td colspan="3" align="right" style="padding:3px 9px"><strong>Total Amount</strong></td>
                    <td align="right" style="padding:3px 9px"><strong><span class="price"><br/>$'.number_format($nt111['billing_amt'],2,'.','').'</span><br/><br/></strong></td>
                  </tr>
                </tbody>
              </table>
              <p style="font-size:12px; margin:0 0 10px 0"></p></td>
          </tr>
          <tr>
            <td bgcolor="#EAEAEA" align="center" style="background:#EAEAEA; text-align:center;"><center>
                <p style="font-size:12px; margin:0;">Thank you, <strong>Nutrabean</strong></p>
              </center></td>
          </tr>
        </table></td>
    </tr>
  </table>
</div>
</body>';
		

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