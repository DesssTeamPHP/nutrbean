<?php include('admin/core/configuration.php');

                        $message                                 =    "";
                        $username                                =    "";
                        $password                                =    "";
                        $keepme                                  =    "";

	
                        if(isset($_REQUEST['Login'])=='Login')
                        {
	                    $username                                =    $_REQUEST['user_name'];
	                    $password                                =    $_REQUEST['password'];
	
	                    $message                                 =    "";
	                    $select_login                            =    "Select * from user_details where e_mail='".$username."' and  password='".$password."' and user_id!='2' ";
	                    $login_execute                           =    mysql_query($select_login);
	                    $login_num_Records                       =    mysql_num_rows($login_execute);
	                    $login_results                           =    mysql_fetch_array($login_execute);
		
	                    $keepme                                  =    $_REQUEST['keepme'];
	                    if($login_num_Records == 1)
		                {
	                    $today                                   =   date("Y-m-d");
                   	    $ip                                      =   $_SESSION['session_id'];
	                    $_SESSION['uid']                         =   $username;
	                    $_SESSION['userid_guest']                =   $login_results['id'];
	                    $sid                                     =   $_SESSION['session_id'];
	                    if($keepme == 'on')
	                    {
	                    setcookie("usernamee",$username, time()+3600);
	                    setcookie("passwordd",$password, time()+3600);
	                    }
	                    header('location:product_details.php');exit;
		                }
		                else
		                {	          
		                $message = "Invalid Login Credentials";	}
	                    }
                        include('common/top_header.php');
?>

<body>
<?php include('common/header.php');?>
<div class="wrapper">
  <div class="container">
    <article class="min_height1">
      <h2 class="h2"  >Login</h2>
      <span style="color:#FF0000;font-weight:bold;font-size:12px;text-align:center; margin:0 0 0 504px;"><?= $message?></span>
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
        <li>
          <!--<input class="fleft check_box" type="checkbox" name="keepme" id="keepme" value="on">
          <p  class="fleft">Remember Me</p>-->
          <br class="spacer">
        </li>
        <li><a style="text-align:right;" href="sign_up.php">Not registered?</a></li>
        <li><a href="forgotpassword.php">Forget password?</a></li>
        <br class="spacer">
      </ul>
      </form>
    </article>
  </div>
</div>

<?php include('common/footer.php');?>