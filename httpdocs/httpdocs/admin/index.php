<?php
 /*******************************************************************************
  * Developed By Desss Inc
  * Developer: Sabari Vaassan
  * Date     : 02/21/2014 
  * Last Date: 02/22/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Login-Page";
/*********************Check Login User Details**********************************************/
if(isset($_REQUEST['login_button']))
 {
    $username                             =    $_REQUEST['username'];
	$password                             =    TRIM(md5($_REQUEST['password']));
	//For Selecting Query
	$login_tablename                      =    ADMIN;
	$login_fieldname_one                  =    'username';
	$login_fieldname_two                  =    'password';
    $login_select                         =    $Core_Mysql->select_two_where($login_tablename,$login_fieldname_one,$username,$login_fieldname_two,$password);
	$login_execute                        =    $Core_Mysql->db_query($login_select); 
	if(!$login_execute)
	{
		echo mysql_error(); 
	}
    $login_num_Records                    =    $Core_Mysql->get_num_record($login_execute);
	$login_results                        =    $Core_Mysql->db_fetch_array($login_execute);
	///End OF PRocess
	if($login_num_Records  > 0)
	 {
	 $_SESSION['username']                =    $login_results['username']; 
	 $_SESSION['user_permission']         =    $login_results['user_permission'];                 
	 $_SESSION['userid']                  =    $login_results['id'];  
	 header("Location:dashboard.php");  
	 exit;
	 }
	else
	 {
	 $message_Status                      =    'Invalid Credential Details!';
	 $login_error_notice                  =    error_notification_message($message_Status); 
	 } 
 }

///////////////////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en" class="login_page">
<?php require 'common/admin-top-header.php';?>
<body>
<div class="login_box">
  <form action="" method="post" id="login_form">
    <div class="top_b">Sign in to Desss Admin</div>
    <?php
			if(isset($login_error_notice))
			  {
			   echo $login_error_notice;
			  }
			?>
    <div class="cnt_b">
      <div class="form-group">
        <div class="input-group"> <span class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></span>
          <input class="form-control input-sm" type="text" id="username" name="username" placeholder="Username" />
        </div>
      </div>
      <div class="form-group">
        <div class="input-group"> <span class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></span>
          <input class="form-control input-sm" type="password" id="password" name="password" placeholder="Password"  />
        </div>
      </div>
      <div class="form-group">
        <label class="checkbox-inline">
        <input type="checkbox" />
        Remember me</label>
      </div>
    </div>
    <div class="btm_b clearfix">
      <button class="btn btn-default btn-sm pull-right" type="submit" name="login_button">Sign In</button>
      <!--<span class="link_reg"><a href="#reg_form">Not registered? Sign up here</a></span>-->
    </div>
  </form>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.actual.min.js"></script>
<script src="lib/validation/jquery.validate.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
            $(document).ready(function(){
                
				//* boxes animation
				form_wrapper = $('.login_box');
				function boxHeight() {
					form_wrapper.animate({ marginTop : ( - ( form_wrapper.height() / 2) - 24) },400);	
				};
				form_wrapper.css({ marginTop : ( - ( form_wrapper.height() / 2) - 24) });
                $('.linkform a,.link_reg a').on('click',function(e){
					var target	= $(this).attr('href'),
						target_height = $(target).actual('height');
					$(form_wrapper).css({
						'height'		: form_wrapper.height()
					});	
					$(form_wrapper.find('form:visible')).fadeOut(400,function(){
						form_wrapper.stop().animate({
                            height	 : target_height,
							marginTop: ( - (target_height/2) - 24)
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
							$(form_wrapper).css({
								'height'		: ''
							});	
                        });
					});
					e.preventDefault();
				});
				
				//* validation
				$('#login_form').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						username: { required: true, minlength: 3 },
						password: { required: true, minlength: 3 }
					},
					highlight: function(element) {
						$(element).closest('div').addClass("f_error");
						setTimeout(function() {
							boxHeight()
						}, 200)
					},
					unhighlight: function(element) {
						$(element).closest('div').removeClass("f_error");
						setTimeout(function() {
							boxHeight()
						}, 200)
					},
					errorPlacement: function(error, element) {
						$(element).closest('div').append(error);
					}
				});
            });
        </script>
</body>
</html>
