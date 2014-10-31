<?php include('admin/core/configuration.php');

$msg1="";
$fname="";
$lname="";
$mailid="";
$password1="";
$cpassword="";
$phonenum="";
$uaddress1="";
$ucity="";
$uzip="";
$disclaimer="";
if(isset($_REQUEST['uid']))
{
    $cust="select * from user_details where id = ".$_GET["uid"]."";
	$cust1 = mysql_query($cust); 
	$cust2= mysql_fetch_assoc($cust1);	
	
	$fname    		= $cust2['first_name'];
	$lname			= $cust2['last_name'];
	$uaddress1		= $cust2['address'];
	$ucity 			= $cust2['city'];
	$ustate			= $cust2['state'];
	$ucountry 		= $cust2['country'];
	$phonenum		= $cust2['prim_tele_phone'];
	$mailid 		= $cust2['e_mail'];
	//$cmailid		= $cust2[e_mail];
	$user_id 		= $cust2['user_id'];
	$password1 		= $cust2['password'];
	$cpassword 		= $cust2['password'];
	$active			= $cust2['active'];
	$created_date	= $cust2['created_date'];
	$uzip			= $cust2['zip'];
	$type			= $cust2['type'];
	$disclaimer		= 'checked="checked"';
}

if(isset($_REQUEST['submit']))
{
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$mailid=$_REQUEST['mailid'];
	//$cmailid=$_REQUEST['cmailid'];
	$password1=$_REQUEST['password'];
	$cpassword=$_REQUEST['cpassword'];
	$phonenum=$_REQUEST['phonenum'];
	$uaddress1=$_REQUEST['uaddress1'];
	//$uaddress2=$_REQUEST['uaddress2'];
	$ucity=$_REQUEST['ucity'];
	$ustate=$_REQUEST['ustate'];
	$uzip=$_REQUEST['uzip'];
	$ucountry=$_REQUEST['ucountry'];
	$disclaimer=$_REQUEST['disclaimer'];	
		
			
		$uaddress=$uaddress1;
		$selectuser="SELECT * FROM user_details where e_mail='".$mailid."'";
		$selectuserexe=mysql_query($selectuser);
		$cnt=mysql_num_rows($selectuserexe);
		
		if($cnt==0)
		{
			 $qryinsertuser="INSERT INTO user_details values ('','','$fname','$lname','$uaddress','$ucity','$ustate','$ucountry','$phonenum','$mailid','$password1','1',now(),now(),'$uzip','1')";
			
			$qryinsexe=mysql_query($qryinsertuser);	
			$_SESSION['uid']=$mailid;
			 $send='<table border="0" style="line-height:24px;padding-left:15px" bgcolor="#E8E7E0"><tr>
	  <th align="center" colspan="2" style="font-size:26px" >Registration Details For Nutrabean</td></tr>';
	  $send.='<tr><td><span style="color:#0066cc; font-size:18px" >Hi</span></td></tr><br />';
      $send.='<tr><td><span style="color:#0066cc; font-size:18px" >First Name:</span><b>'.$fname.'</b></td></tr><br />';
	
      $send.=' <tr><td width="502" align="left" style="padding-top:10px; color:#0066cc; font-size:18px" colspan="2">Thank you for registering with Nutrabean.com<br /><br /></td></tr><tr style="color:#0066cc;"><td>&nbsp;</td></tr></table>';
/*                    $headers = "MIME-Version: 1.0\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\n";
					$headers .= "X-Priority: 3\n";
					$headers .= "X-MSmail-Priority: Normal\n";
					$headers .= "X-mailer: php\n";
					$headers .= "From: Onestar"."\n";
					$headers .= "Bcc: chandrasekar@desss.com\r\n";
					$headers .= "Bcc: fulkraj@aol.com\r\n";
					$headers .= "Bcc: signup@onestarnetwork.com\r\n";
					$headers .= "Bcc: sabari@desss.com\r\n";*/
					//$headers .= "Return-Receipt-To: sales@rapidtorc.com\n"; 
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:'. $name_field . "\r\n";
$INCLUDE_DIR = "mailer/";
require($INCLUDE_DIR . "class.phpmailer.php");
			
			 
			$mail = new PHPMailer();
			$mail->IsSMTP(); 
			//$mail->IsSendmail();                                   // send via SMTP
			
			$mail->Host     = "smtp.1and1.com"; // SMTP servers
			$mail->Port     = 587 ; // SMTP Port
			$mail->SMTPAuth = true;     // turn on SMTP authentication
			$mail->Username = "jayaraj@desss.com";  // SMTP username
			$mail->Password = "1234567"; // SMTP password
			$mail->From     = "jayaraj@desss.com";
			$mail->FromName = $first_name;
			$mail->AddAddress($mailid);
			$mail->AddBCC("jayaraj@desss.com"); 
			$mail->IsHTML(true);                              
			$mail->Subject  =  "Nutrabean";
			$mail->Body     =  $send;
		
			if(!$mail->Send())
         {
		  	header("location:signup.php");
		}
		
			header('location:index.php');
		}
		else
		{	$msg1="Already Exists Member";	}
	
}
	
include('common/top_header.php');



?>
<body>
<?php include('common/header.php');?>
<div class="spacer"></div>
<div class="wrapper">
  <div class="container">
    <article>
      <h2 class="h2" >Sign Up</h2>
      <form action="" method="post" onSubmit="return validsignup();">
        <tr>
          <td style="color:#FF0000;font-weight:bold;" align="center"><?=$msg1?></td>
        </tr>
        <ul class="sign_in">
          <li>
            <p>First Name :</p>
          </li>
          <li>
            <input class="signin_text" value="<?=$fname?>"  name="fname" id="fname" onKeyDown="mask1(event,this)" onKeyUp="mask1(event,this)" onClick="mask1(event,this)" maxlength="50" type="text">
          </li>
          <li>
            <p>Last Name :</p>
          </li>
          <li>
            <input class="signin_text" value="<?=$lname?>" type="text"  name="lname" id="lname" onKeyDown="mask1(event,this)" onKeyUp="mask1(event,this)" onClick="mask1(event,this)" maxlength="50">
          </li>
          <li>
            <p>E-Mail ID :</p>
          </li>
          <li>
            <input class="signin_text " style ="font-style:italic;" type="text" value="<?=$mailid?>" name="mailid" id="mailid">
          </li>
          <li>
            <p>Password :</p>
          </li>
          <li>
            <input class="signin_text " type="password" value="<?=$password1?>" name="password" id="password1">
          </li>
          <li>
            <p>Confirm Password :</p>
          </li>
          <li>
            <input class="signin_text " type="password" value="<?=$cpassword?>" name="cpassword" id="cpassword">
          </li>
          <li>
            <p>Primary Telephone Number :</p>
          </li>
          <li>
            <input class="signin_text " type="text" value="<?=$phonenum?>"  name="phonenum" id="phonenum" maxlength="12"  onkeydown="mask(event,this)" onKeyUp="mask(event,this)" onClick="mask(event,this)">
          </li>
          <li>
            <p>Address1 :</p>
          </li>
          <li>
            <textarea class="signin_textarea" id="uaddress1" name="uaddress1" rows="" cols=""><?=$uaddress1?>
</textarea>
          </li>
          <li>
            <p>Country :</p>
          </li>
          <li>
            <select class="signin_drop" id="ucountry" name="ucountry" onChange="dispstate()">
              <option value="0">---SELECT---</option>
              <?php
                    $querycoun="SELECT * FROM countries";
                    $querycoune=mysql_query($querycoun);
                    while($nc=mysql_fetch_array($querycoune))
                    {
                        if($nc[countries_iso_code_2]==$ucountry)
                        {	$txt='selected="selected"';	}
                        elseif($nc[countries_iso_code_2]=="US")
                        {	$txt='selected="selected"';	}
						else
						{	$txt=""; }
                        echo "<option value='".$nc['countries_iso_code_2']."' ".$txt." >$nc[countries_name]</option>";
                    }
                    ?>
            </select>
          </li>
          <li>
            <p>State :</p>
          </li>
          <li>
            <select class="signin_drop" id="ustate" name="ustate">
              <option value="0">---SELECT---</option>
              <?php
                    $querystates="SELECT * FROM state_tbl";
                    $querystate=mysql_query($querystates);
                    while($ns=mysql_fetch_array($querystate))
                    {
                        if($ns[state_id]==$ustate)
                        {	$txt='selected="selected"';	}
                        else
                        {	$txt="";	}
                        echo "<option value='".$ns['state_id']."' ".$txt.">$ns[state_name]</option>";
                    }
                    ?>
            </select>
          </li>
          <li>
            <p>City :</p>
          </li>
          <li>
            <input class="signin_text " type="text" value="<?=$ucity?>" name="ucity" id="ucity" onKeyDown="mask1(event,this)" onKeyUp="mask1(event,this)" onClick="mask1(event,this)" maxlength="50">
          </li>
          <li>
            <p>Zip code :</p>
          </li>
          <li>
            <input class="signin_text " type="text" value="<?=$uzip?>"  name="uzip" id="uzip" maxlength="5" onKeyDown="mask2(event,this)" onKeyUp="mask2(event,this)" onClick="mask2(event,this)">
          </li>
          <li></li>
          <li>
            <input class="fleft check_box" type="checkbox" name="disclaimer" id="disclaimer" value="checked" <?=$disclaimer?>/>
            <p  class="fleft">Disclaimer : I Agree</p>
            <br class="spacer">
          </li>
          <li></li>
          <li>
            <input class="signin_bt " type="submit" name="submit" value="Sign Up">
            <input class="signin_bt " type="button" value="Cancel"onclick="location.href='<?php echo $full_path;?>';">
          </li>
          <br class="spacer">
        </ul>
      </form>
    </article>
  </div>
</div>
<?php include('common/footer.php');?>
