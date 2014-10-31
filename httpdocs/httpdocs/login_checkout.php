<?php include('admin/core/configuration.php');

$message="";
$username="";
$password="";
$keepme="";
 
 

 
if(isset($_REQUEST['Login'])=='Login')
{

if($_REQUEST['Login']=='Login')
{



	$username=$_REQUEST['user_name'];
	$password=$_REQUEST['password'];
	
		$message="";
		 $loginchk="Select * from user_details where e_mail='".$username."' and  password='".$password."'";
		 $loginchkexe  = mysql_query($loginchk);
		 $loginchkcnt  = mysql_num_rows($loginchkexe);
		
		$keepme            = $_REQUEST['keepme'];
		if($loginchkcnt == 1)
		{
			
			$ip              = $_SESSION['session_id'];
			$_SESSION['uid'] = $username;
			$sid            =  $_SESSION['session_id'];
			if($keepme == 'on')
			{
				setcookie("usernamee",$username, time()+3600);
				setcookie("passwordd",$password, time()+3600);
			}
			
				header('location:user_shipping_details.php');exit;
		}
		else
		{	$message = "Invalid Login Credentials";	}
		
	}	
if($_REQUEST['Login']=='Login as Guest')
{		
$_SESSION['uid'] = 'Guest';
$_REQUEST['user_name'] = 'Guest';
	header('location:user_shipping_details.php');exit;		
		
}	


}	
		

include('common/top_header.php');
?>
<body>
<?php include('common/header.php');?>
<div class="wrapper">
  <div class="container">
    <article class="min_height1">
      <h2 class="h2"  >Checkout Method</h2>
      <span style="color:#FF0000;font-weight:bold;font-size:12px;text-align:center; margin:0 0 0 504px;">
      <?= $message?>
      </span>
      <div  style="width:80%;">
      <div style="float:left;">
        <input class="signin_bt " name="Login" type="submit" onClick="rewrite_goBack('sign_up.php')" value="Register Here"><br>
        <form action="" method="post" >
         <input class="signin_bt " name="Login" type="submit" value="Login as Guest">
         </form>
      </div>
      <div style="float:right;">
        <form action="" method="post" onSubmit="return logincheck();">
          <ul class="sign_in">
            <li>
              <p>E-Mail ID :</p>
            </li>
            <li>
              <input class="signin_text " type="text" id="user_name" name="user_name" onFocus="clr()" onBlur="fill()" value="<?php 
	  	if($username=="")
		{	echo "E-Mail ID";	} 
		else
		{	echo $username;	}?>"/>
            </li>
            <li>
              <p>Password :</p>
            </li>
            <li>
              <input class="signin_text " type="password" id="password" name="password" onFocus="clr1()" onBlur="fill1()" value="<?php
	  	if($password=="")
		{	echo "Password";	} 
		else
		{	echo $password;	}?>"/>
            </li>
            <li></li>
            <li>
              <input class="signin_bt " name="Login" type="submit" value="Login">
            </li>
            <li></li>
            <li style="display:none;">
              <input class="fleft check_box" type="checkbox" name="keepme" id="keepme" value="on">
              <p  class="fleft">Remember Me</p>
              <br class="spacer">
            </li>
            <li style="display:none;"><a style="text-align:right;" href="sign_up.php">Not registered?</a></li>
            <li><a href="forgotpassword.php">Forget password?</a></li>
            <br class="spacer">
          </ul>
        </form>
      </div> </div><br class="spacer">
    </article>
  </div>
</div>
<?php include('common/footer.php');?>
