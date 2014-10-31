<?php include('admin/core/configuration.php');


                                          $msg1                                 =     "";
                                          $username                             =     "";
                                          if(isset($_REQUEST['msg1']))
                                          {
	                                      if($_REQUEST['msg1']==1)
	                                      {
										  $msg1                                 =      "Password Sent To Your Mail-ID";	
										  }
	                                      elseif($_REQUEST['msg1']==0)
	                                      {
										  $msg1                                 =       "Password Not Send To Your Mail-ID";
										  }
                                          }
                                          else
                                          {	
                                          $msg1                                  =       "";	
                                          }
                                          if(isset($_REQUEST['Login'])=="Submit")
                                          {
	                                      $mail_idd                              =      $_REQUEST['mail_id'];
	                                      $select_forgotpassword                 =      "select * from user_details where e_mail='".$mail_idd."' and user_id!='2'";
	                                      $forget_execute                        =      mysql_query($select_forgotpassword);
	                                      $forget_num_Records                    =      mysql_num_rows($forget_execute);
	                                      if($forget_num_Records=="0")
	                                      {	
	                                      $msg1                                  =      "You are Not registered Yet";		
	                                      }
	                                      else
	                                      {
		                                  $forget_results                        =      mysql_fetch_assoc($forget_execute);
		                                  $e_mail                                =      $forget_results['e_mail'];
	                                  	  $password                              =      $forget_results['password'];
		                                  $name                                  =      'Nutrabean'; 
		                                  $subject                               =      'Nutrabean'; 
		                                  $send                                  =      "<table width='372' border='0' cellpadding='5' style='border:1px solid #024BB1'>
	                                      <tr><td colspan='3' align=center bgcolor='#024BB1'><strong>Password Recovery From Nutrabean.com</strong></td></tr>
		                                  <tr><td width='145' height='34' align=left> <strong>Your Password Is</strong> </td>
			                              <td width='5'><strong>:</strong></td>
			                              <td width='184'>".$password."</td></tr>";
                                          $headers                               =    'MIME-Version: 1.0' . "\r\n";
                                          $headers                              .=    'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                          $headers                              .=    'From:'. $name_field . "\r\n";
                                          $INCLUDE_DIR                           =    "mailer/";
                                          require($INCLUDE_DIR . "class.phpmailer.php");
			
                                        //$mail = new PHPMailer();
			                            $mail = new PHPMailer();
			                            $mail->IsSMTP(); 
			                            //$mail->IsSendmail();                                   // send via SMTP
			                            $mail->SetLanguage("en", 'mailer/language/phpMailer/');	
										$mail->Host     = "smtp.1and1.com"; // SMTP servers
										$mail->Port     = 587 ; // SMTP Port
										$mail->SMTPAuth = true;     // turn on SMTP authentication
										$mail->Username = "jayaraj@desss.com";  // SMTP username
										$mail->Password = "1234567"; // SMTP password
										$mail->From     = "test@desss.com";
										$mail->FromName = $first_name;
										$mail->AddAddress($e_mail);
										$mail->AddBCC("jayaraj@desss.com"); 
										$mail->IsHTML(true);                              
										$mail->Subject  =  "Nutrabean";
										$mail->Body     =  $send;
                                        if(!$mail->Send())
                                        {
	                                   echo "Mailer Error: " . $mail->ErrorInfo;
	       
                                       header('Location:forgotpassword.php?msg1=0');exit;
                                       }		
                                       else
                                       {
                                       header('Location:forgotpassword.php?msg1=1');
                                       exit;
                                       }
	                                   }
                                       }
                                       include('common/top_header.php');
?>
<script type="text/javascript">
function clr11()
{
	if(document.getElementById('mail_id').value=="E-Mail ID")
	{
		document.getElementById('mail_id').value="";
	}
}
function fill11()
{
	if(document.getElementById('mail_id').value=="")
	{
		document.getElementById('mail_id').value="E-Mail ID"
	}
}
function logincheck1()
{
	
	var mail_id=document.getElementById('mail_id');
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
	if(mail_id.value=="E-Mail ID")
	{
		alert("Enter E-Mail ID");
		mail_id.focus();
		return false;
	}
	else if(!mail_id.value.match(emailExp))
	{
		alert("Enter Correct E-Mail ID Format");
		mail_id.focus();
		return false;
	}	
	else
	{
		return true;
	}
}

</script>

<body>
<?php include('common/header.php');?>

<div class="spacer"></div>

<div class="wrapper">
  <div class="container">
   <article class="min_height1">
      <h2 class="h2">Forgot Password</h2>
      <span style="color:#FF0000;font-weight:bold;font-size:12px;text-align:center; margin:0 0 0 504px;"><?=$msg1?></span>
      <form action="" method="post" onSubmit="return logincheck1();">
      <ul class="sign_in">
          <li>
            <p>Forgot Password:</p>
          </li>
          <li>
            <input class="signin_text"  id="mail_id" name="mail_id" onFocus="clr11()" onBlur="fill1()" value="<?php 
                if($username=="")
                {	echo "E-Mail ID";	} 
                else                
				{	echo $username;	}?>" type="text">
          </li>
          <li></li>
          <li>
            <input class="signin_bt" name="Login" type="submit" value="Submit">
          </li>
          <li></li>
          <br class="spacer">
        </ul>
      </form>
    </article>
  </div>
</div>

<?php include('common/footer.php');?>