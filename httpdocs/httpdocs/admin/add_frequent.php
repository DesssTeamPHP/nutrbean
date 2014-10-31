<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: karuna karan
  * Date     : 02/24/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Add Frequent -Page";
error_reporting(0);

/*********************Testimonial SELECT**********************************************/

      $Frequent_tablename            =    FREQUENT_TBL;
	  $fieldname_one                 =    'frequent_id';
	  $fieldname_one_value           =    $_REQUEST['id'];
	  $Frequent_select               =    $Core_Mysql->select_one_where($Frequent_tablename,$fieldname_one,$fieldname_one_value);
	  $Frequent_execute              =    $Core_Mysql->db_query($Frequent_select);
	  $Frequent_results              =    $Core_Mysql->db_fetch_array($Frequent_execute);
	  $Frequent_num_Records          =    $Core_Mysql->get_num_record($Frequent_execute);

/******************************============END==============************************/

$Frequent_tablename      =    FREQUENT_TBL;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 


$frequent_name             = $_REQUEST['frequent_name'];
$frequent_desc             = $_REQUEST['frequent_desc'];
$sort_order                = $_REQUEST['sort_order'];

$Field_types                  = array('frequent_name'         => stripslashes($frequent_name),
                                      'frequent_desc'         => stripslashes($frequent_desc),
						              'sort_order'            => $sort_order
                                     );
							  
						//print_r($Field_types);die;	  
						   
$Message_admin               =  $Core_Mysql->Insert_Common_query($Frequent_tablename,$Field_types);
        if($Message_admin != 0)
           {
			   
			    $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:frequent_list.php?".$send_val);
			   
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 


$id                        = $_REQUEST['id'];
$frequent_name             = $_REQUEST['frequent_name'];
$frequent_desc             = $_REQUEST['frequent_desc'];
$sort_order                = $_REQUEST['sort_order'];






/***************************************//////*******************************************************/
$Frequent_tablename         =     FREQUENT_TBL;//table_name
$FieldName                  =    'frequent_id';
/*****************************************///////**************************************************//

$Field_types                = array('frequent_name'         => stripslashes($frequent_name),
                                      'frequent_desc'       => stripslashes($frequent_desc),
						              'sort_order'          => $sort_order
                                     );
						   
  $Message_admin              =  $Core_Mysql->Update_Common_query($Frequent_tablename,$FieldName,$Field_types,$id);

if($Message_admin != 0)
           {
			 $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:frequent_list.php?".$send_val);  
		   }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: frequent_list.php");
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
		
		var frequent_name=document.getElementById('frequent_name');
		
		var sort_order=document.getElementById('sort_order');
		
		
		
		 if(frequent_name.value=="")
		{
			alert("Please Enter Frequent Question");
			frequent_name.focus();
			return false;
		}
		else if(frequent_name.value.length>100)
		{
			alert("Please Enter Frequent Question");
			frequent_name.focus();
			return false;
		}
			
		
		
		else if(sort_order.value=="")
		{
			alert("Please Enter  Sort Order");
			sort_order.focus();
			return false;
		}
		else if(sort_order.value.length>100)
		{
			alert("Please Enter Sort Order");
			sort_order.focus();
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
		<h3 class="heading">Add Frequent</h3>
		<form class="form_validation_ttip" name="" method="post" enctype="multipart/form-data">
			<div class="formSep">
				<div class="form-group">
					<label>Frequent Question :<span class="f_req">*</span></label>
					<input name="frequent_name"  id="frequent_name"class="form-control" value="<?php echo $Frequent_results['frequent_name'];?>" type="text">
					
				</div>
				<label>Frequent Answer:<span class="f_req">*</span></label>
				<textarea name="frequent_desc" id="frequent_desc" value="" cols="10" rows="3" class="form-control"><?php echo $Frequent_results['frequent_desc'];?></textarea>
               
			</div>
            
			
                    <div class="formSep">
				<label>Sort Order :<span class="f_req"></span></label>
				<input name="sort_order" id="sort_order" class="form-control number_only_valiq" value="<?php echo $Frequent_results['sort_order'];?>" type="text">
                
			</div>
            
			
            <div class="form-actions">
            <?php if($_REQUEST['id'] != '')
			       {?>
					  <button class="btn btn-primary" name="Update" type="submit" value="Update" onClick="return validsignup()">Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary" name="Save" type="submit" value="submit" onClick="return validsignup()">Save</button>  
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

	<!-- validation -->
    <script src="lib/validation/jquery.validate.min.js"></script>
	<!-- validation functions -->
    <script src="js/gebo_validation.js"></script>
    <script src="js/gebo_validation1.js"></script>
	<!-- timepicker -->
   
   
   <!-- globalize for jQuery UI-->
    <script src="lib/jquery-ui/external/globalize.js"></script>
    <!-- masked inputs -->
	<script src="js/forms/jquery.inputmask.min.js"></script>
	<!-- autosize textareas -->
	<script src="js/forms/jquery.autosize.min.js"></script>
	<!-- textarea limiter/counter -->
	<script src="js/forms/jquery.counter.min.js"></script>
	<!-- datepicker -->
	<script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
	<!-- timepicker -->
	<script src="lib/timepicker/js/bootstrap-timepicker.min.js"></script>
	<!-- tag handler -->
	<script src="lib/tag_handler/jquery.taghandler.min.js"></script>
	<!-- styled form elements -->
	<script src="lib/uniform/jquery.uniform.min.js"></script>
	<!-- animated progressbars -->
	<script src="js/forms/jquery.progressbar.anim.js"></script>
	<!-- multiselect -->
	<script src="lib/multi-select/js/jquery.multi-select.js"></script>
	<script src="lib/multi-select/js/jquery.quicksearch.js"></script>
	<!-- enhanced select (chosen) -->
	<script src="lib/chosen/chosen.jquery.min.js"></script>
	<!-- TinyMce WYSIWG editor -->
	<script src="lib/tiny_mce/jquery.tinymce.js"></script>
    <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
    <script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
    <script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
	<!-- colorpicker -->
	<script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
	<!-- password strength checker -->
	<script src="lib/complexify/jquery.complexify.min.js"></script>
	<!-- switch buttons -->
    <script src="lib/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
    <!-- form functions -->
	<script src="js/gebo_forms.js"></script>
   
   
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