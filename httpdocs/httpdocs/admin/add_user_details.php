<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 02/24/2014 
  * Last Date: 02/24/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Add User Details-Page";
error_reporting(0);
/*********************Social Media SELECT**********************************************/

      $Signup_tablename                 =    SIGNUP_TBL;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $Signup_select                    =    $Core_Mysql->select_one_where($Signup_tablename,$fieldname_one,$fieldname_one_value);
	  $Signup_execute                   =    $Core_Mysql->db_query($Signup_select);
	  $Signup_results                   =    $Core_Mysql->db_fetch_array($Signup_execute);
	  $Signup_num_Records               =    $Core_Mysql->get_num_record($Signup_execute);

/******************************============END==============************************/

 $Signup_tablename      =    SIGNUP_TBL;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 
$user_id               = $_REQUEST['user_id'];
$first_name             = $_REQUEST['first_name'];
$last_name              = $_REQUEST['last_name'];
$address                = $_REQUEST['address'];
$city                   = $_REQUEST['city'];
$state                  = $_REQUEST['state'];
$country                = $_REQUEST['country'];
$prim_tele_phone 	    = $_REQUEST['prim_tele_phone'];
$e_mail                 = $_REQUEST['e_mail'];
$password               = $_REQUEST['password'];
$zip                    = $_REQUEST['zip'];



$Field_types           = array('user_id'           => $user_id,
                              'first_name'         => $first_name,
                               'last_name'          => $last_name,
						       'address'            => $address,
						       'city'               => $city,
						       'state'              => $state,
						       'country'            => $country,
						       'prim_tele_phone'    => $prim_tele_phone,
							   'e_mail'             => $e_mail,
							   'password'           => $password,
							   'zip'                => $zip
                              );
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($Signup_tablename,$Field_types);

        if($Message_admin != 0)
           {
			   
			    $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:user_details.php?".$send_val);

           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 

//var_dump($_FILES);

$id                    = $_REQUEST['id'];
$user_id               = $_REQUEST['user_id'];
$first_name             = $_REQUEST['first_name'];
$last_name              = $_REQUEST['last_name'];
$address                = $_REQUEST['address'];
$city                   = $_REQUEST['city'];
$state                  = $_REQUEST['state'];
$country                = $_REQUEST['country'];
$prim_tele_phone 	    = $_REQUEST['prim_tele_phone'];
$e_mail                 = $_REQUEST['e_mail'];
$password               = $_REQUEST['password'];
$zip                    = $_REQUEST['zip'];





/***************************************//////*******************************************************/
$Signup_tablename      =  SIGNUP_TBL;//table_name
$FieldName            =  'id';
/*****************************************///////**************************************************//

 $Field_types           = array('user_id'           => $user_id,
                               'first_name'         => $first_name,
                               'last_name'          => $last_name,
						       'address'            => $address,
						       'city'               => $city,
						       'state'              => $state,
						       'country'            => $country,
						       'prim_tele_phone'    => $prim_tele_phone,
							   'e_mail'             => $e_mail,
							   'password'           => $password,
							   'zip'                => $zip
                              );
			//print_r($Field_types);	die;	   
 $Message_admin      =  $Core_Mysql->update_common_query($Signup_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			   
			   $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:user_details.php?".$send_val);

           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:user_details.php");
	}
?>
<script language="javascript">
function validsignup()
	{
	
     
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;
		//var letters = /^[A-Za-z ]{3,50}$/;
		
		var site_name=document.getElementById('site_name');
		var image_name=document.getElementById('image_name');
		var Image_Order=document.getElementById('Image_Order');
		
		
		if(site_name.value=="")
		{
			alert("Please Enter Site Title");
			site_name.focus();
			return false;
		}
		else if(site_name.value.length<3)
		{
			alert("Please Enter Site Title Minimum 3 characters");
			site_name.focus();
			return false;
		}	
		else if(!site_name.value.match(letters))
		{
			alert("Please Enter Valid Site Title");
			site_name.focus();
			return false;
		}	
		else if(image_name.value=="")
		{
			alert("Please Enter Image Name");
			image_name.focus();
			return false;
		}
		else if(image_name.value.length>100)
		{
			alert("Please Enter Image Name");
			image_name.focus();
			return false;
		}
		
		
		else if(Image_Order.value=="")
		{
			alert("Please Enter  Image Order");
			Image_Order.focus();
			return false;
		}
		else if(Image_Order.value.length>100)
		{
			alert("Please Enter Image Order");
			Image_Order.focus();
			return false;
		}
		
		else
		{
			document.content_add.submit();
			return true;
		}
	}
	
 
	</script>
<script>
function goBack()
  {
  window.history.back()
  }
</script>

<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer" class="clearfixs">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 col-md-12">
		<h3 class="heading">User Details</h3>
		<form class="form_validation_ttip" method="post" enctype="multipart/form-data">
			<div class="formSep">
				<div class="form-group">
					<label>First Name:<span class="f_req">*</span></label>
					<input name="first_name"  id="first_name"class="form-control" type="text" maxlength="50" value="<?php echo $Signup_results['first_name'];?>">
				</div>
				<label>Last Name:<span class="f_req">*</span></label>
					<input name="last_name"  id="last_name"class="form-control" type="text" maxlength="50" value="<?php echo $Signup_results['last_name'];?>">
			</div>
            <div class="formSep">
				<div class="form-group">
					<label>address : <span class="f_req"></span></label>
				<input name="address"  id="address" class="form-control" type="text" value="<?php echo $Signup_results['address'];?>">
               
				</div>
				
			</div>
            
            
           
            <div class="formSep">
				<div class="form-group">
					<label>city : <span class="f_req"></span></label>
				<input name="city"  id="city" class="form-control"  type="text" value="<?php echo $Signup_results['city'];?>">
               
				</div>
				
			</div>
            <div  class="form-group">
                  <label>State:</label>
                  <p><span class="label label-default"></span></p>
                  
                  
                 <select class="form-control"  id="state" name="state">
              <option value="0">---SELECT---</option>
              <?php
                  $querystates="SELECT * FROM state_tbl";
                    $querystate=mysql_query($querystates);
                    while($ns=mysql_fetch_array($querystate))
                    {
                        if($ns['state_id']== $Signup_results['state'])
                        {	$txt='selected="selected"';	}
                        else
                        {	$txt="";	}
                        echo "<option value='".$ns['state_id']."' ".$txt.">$ns[state_name]</option>";
                    }
                    ?>
            </select> 
                  
                </div>
            <div  class="form-group">
                  <label>Country:</label>
                  <p><span class="label label-default"></span></p>
                  
                  
                 <select class="form-control" tabindex="6"  id="country" name="country">
              <option value="0">---SELECT---</option>
              <?php
                    $querycoun="SELECT * FROM countries";
                    $querycoune=mysql_query($querycoun);
                    while($nc=mysql_fetch_array($querycoune))
                    {
                        if($nc['countries_iso_code_2']== $Signup_results['country'])
                        {	$txt='selected="selected"';	}
                        elseif($nc['countries_iso_code_2']== $Signup_results['country'])
                        {	$txt='selected="selected"';	}
						else
						{	$txt=""; }
                        echo "<option value='".$nc['countries_iso_code_2']."' ".$txt." >$nc[countries_name]</option>";
                    }
                    ?>
            </select> 
                </div>
            
            <div class="formSep">
				<div class="form-group">
					<label>Phone : <span class="f_req"></span></label>
				<input name="prim_tele_phone"  id="prim_tele_phone"class="form-control"  type="text" value="<?php echo $Signup_results['prim_tele_phone'];?>">
               
				</div>
            </div>
            
             <div class="formSep">
				<div class="form-group">
					<label>E Mail : <span class="f_req"></span></label>
				<input name="e_mail"  id="e_mail"class="form-control"  type="text" value="<?php echo $Signup_results['e_mail'];?>">
               
				</div>
            </div>
            
            
             <div class="formSep">
				<div class="form-group">
					<label>Password : <span class="f_req"></span></label>
				<input name="password"  id="password" class="form-control"  type="text" value="<?php echo $Signup_results['password'];?>">
               
				</div>
            </div>
            
             <div class="formSep">
				<div class="form-group">
					<label>Zip Code: <span class="f_req"></span></label>
				<input name="zip"  id="zip" class="form-control" type="text" value="<?php echo $Signup_results['zip'];?>">
               <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
				</div>
            </div>
			<div class="form-actions">
            <?php if($_REQUEST['id'] != '')
			       {?>
					  <button class="btn btn-primary"  name="Update" type="submit" value="Update" onClick="return validsignup()">Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary"  name="Save" type="submit" value="submit" onClick="return validsignup()">Save</button>  
			<?php }
				  
			   ?>
				<input type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">
			</div>
		</form>
    </div>
    </div></div></div>
    <?php require 'common/admin-sidebar.php';?>
 <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate.min.js"></script>
    <script src="lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
    <!-- touch events for jquery ui-->
	<script src="js/forms/jquery.ui.touch-punch.min.js"></script>
        <!-- easing plugin -->
	<script src="js/jquery.easing.1.3.min.js"></script>
    <!-- smart resize event -->
	<script src="js/jquery.debouncedresize.min.js"></script>
    <!-- js cookie plugin -->
	<script src="js/jquery_cookie_min.js"></script>
    <!-- main bootstrap js -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- bootstrap plugins -->
	<script src="js/bootstrap.plugins.min.js"></script>
	<!-- typeahead -->
	<script src="lib/typeahead/typeahead.min.js"></script>
    <!-- code prettifier -->
	<script src="lib/google-code-prettify/prettify.min.js"></script>
    <!-- sticky messages -->
	<script src="lib/sticky/sticky.min.js"></script>
    <!-- tooltips -->
	<script src="lib/qtip2/jquery.qtip.min.js"></script>
    <!-- lightbox -->
	<script src="lib/colorbox/jquery.colorbox.min.js"></script>
    <!-- jBreadcrumbs -->
	<script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
	<!-- hidden elements width/height -->
	<script src="js/jquery.actual.min.js"></script>
	<!-- custom scrollbar -->
	<script src="lib/slimScroll/jquery.slimscroll.js"></script>
	<!-- fix for ios orientation change -->
	<script src="js/ios-orientationchange-fix.js"></script>
	<!-- to top -->
	<script src="lib/UItoTop/jquery.ui.totop.min.js"></script>
	<!-- mobile nav -->
	<script src="js/selectNav.js"></script>

	<!-- common functions -->
	<script src="js/gebo_common.js"></script>

    <!-- datatable -->
	<script src="lib/datatables/jquery.dataTables.min.js"></script>
	<script src="lib/datatables/extras/Scroller/media/js/dataTables.scroller.min.js"></script>
	<!-- datatable table tools -->
    <script src="lib/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
    <script src="lib/datatables/extras/TableTools/media/js/ZeroClipboard.js"></script>
    <!-- datatables bootstrap integration -->
    <script src="lib/datatables/jquery.dataTables.bootstrap.min.js"></script>
    
	<!-- datatable functions -->
	<script src="js/gebo_datatables.js"></script>
    	<script src="lib/smoke/smoke.js"></script>
    <script language="javascript" type="application/javascript">
   $( document ).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script>
</div>
					</body>
				</html>