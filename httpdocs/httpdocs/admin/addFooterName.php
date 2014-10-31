<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 10/4/2014 
  * Last Date: 10/4/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Footer-Page";
error_reporting(0);
/*********************Footer SELECT**********************************************/

      $Footer_tablename                   =    FOOTERMENU;
	  $fieldname_one                      =    'footer_id';
	  $fieldname_one_value                =    $_REQUEST['id'];
	  $Footer_select                      =    $Core_Mysql->select_one_where($Footer_tablename,$fieldname_one,$fieldname_one_value);
	  $Footer_execute                     =    $Core_Mysql->db_query($Footer_select);
	  $Footer_results                     =    $Core_Mysql->db_fetch_array($Footer_execute);
	  $Footernum_Records                  =    $Core_Mysql->get_num_record($Footer_execute);

/******************************============END==============************************/

$Footer_tablename                        =    FOOTERMENU;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$Footer_name                             = $_REQUEST['Footer_name'];
$Footer_url                              = $_REQUEST['Footer_url'];
$linkOrd                                 = $_REQUEST['linkOrd'];


$Field_types           = array('footer_name'             => $Footer_name,
                               'pagr_url'                => $Footer_url,
							   'link_page'               => $linkOrd,
							   'creat_date'              => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($Footer_tablename,$Field_types);

        if($Message_admin != 0)
           {
			    $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:viewFooterDetail.php?".$send_val);
			
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                                      = $_REQUEST['id'];
$Footer_name                             = $_REQUEST['Footer_name'];
$Footer_url                              = $_REQUEST['Footer_url'];
$linkOrd                                 = $_REQUEST['linkOrd'];
/***************************************//////*******************************************************/
$Footer_tablename                   =  FOOTERMENU;//table_name
$FieldName                          =  'footer_id';
/*****************************************///////**************************************************//


$Field_types           = array('footer_name'             => $Footer_name,
                               'pagr_url'                => $Footer_url,
							   'link_page'               => $linkOrd,
							   'creat_date'              => date('Y-m-d H:i:s')
                              );
						   
						   
 $Message_admin      =  $Core_Mysql->update_common_query($Footer_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			   
			    $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:viewFooterDetail.php?".$send_val);
			   
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:viewFooterDetail.php");
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
		var Footer_name=document.getElementById('Footer_name');
		var Footer_url=document.getElementById('Footer_url');
		var linkOrd=document.getElementById('linkOrd');
		
		
		
		if(Footer_name.value=="")
		{
			alert("Please Enter Footer Name");
			Footer_name.focus();
			return false;
		}
		else if(Footer_name.value.length<3)
		{
			alert("Please Enter Footer Name Minimum 3 characters");
			Footer_name.focus();
			return false;
		}	
		else if(!Footer_name.value.match(letters))
		{
			alert("Please Enter Valid Footer Name");
			Footer_name.focus();
			return false;
		}	
		else if(Footer_url.value=="")
		{
			alert("Please Enter Footer url");
			Footer_url.focus();
			return false;
		}
		else if(Footer_url.value.length>100)
		{
			alert("Please Enter Footer url");
			Footer_url.focus();
			return false;
		}
		
		
		else if(linkOrd.value=="")
		{
			alert("Please Enter  Footer Order");
			linkOrd.focus();
			return false;
		}
		else if(linkOrd.value.length>100)
		{
			alert("Please Enter Footer Order");
			linkOrd.focus();
			return false;
		}
		
	
		
		else
		{
			document.content_add.submit();
			return true;
		}
	}
	
function mask2(e,f)
        {
        var len = f.value.length;
        var key = whichKey(e);
//alert(key);
if(key>47 && key<58 || key>95 && key<106)
{
	
if( len==3 )f.value=f.value+''	
else if(len==7 )f.value=f.value+''
else f.value=f.value;                        
}
else
{ 
f.value = f.value.replace(/[^0-9-]/,'')
f.value = f.value.replace('--','-')
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
        <?php if($_REQUEST['id']!='')
		{?>
		<h3 class="heading">Edit Footer</h3>
  <?php }
		else
		{?>
		<h3 class="heading">Add Footer</h3>
  <?php }?>     	
       
		<form class="form_validation_content" method="post" enctype="multipart/form-data">
       
        <div class="form-group">
					<label>Footer Name:<span class="f_req">*</span></label>
					<input name="Footer_name"  id="Footer_name"class="form-control" maxlength="50" type="text" value="<?php echo $Footer_results['footer_name'];?>">
				</div>
				<div class="form-group">
					<label>Page URL:<span class="f_req">*</span></label>
					<input name="Footer_url"  id="Footer_url"class="form-control" maxlength="50" type="text" value="<?php echo $Footer_results['pagr_url'];?>">
				</div>
				<div class="formSep">
				<label>Link Order: <span class="f_req">*</span></label>
				<input name="linkOrd" id="linkOrd" class="form-control number_only_valiq" maxlength="3" type="text" value="<?php echo $Footer_results['link_page'];?>" onkeydown="return mask2(event,this)" onKeyUp="return mask2(event,this)">
			</div>
			<div class="form-actions">
            <?php if($_REQUEST['id'] != '')
			       {?>
					  <button class="btn btn-primary"  name="Update" type="submit" value="Update" onclick="return validsignup()">Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary"  name="Save" type="submit" value="submit" onclick="return validsignup()">Save</button>  
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
    <!-- multiselect -->
	<script src="lib/multi-select/js/jquery.multi-select.js"></script>
	<script src="lib/multi-select/js/jquery.quicksearch.js"></script>
	<!-- enhanced select (chosen) -->
	<script src="lib/chosen/chosen.jquery.min.js"></script>
	<!-- common functions -->
	<script src="js/gebo_common.js"></script>

	<!-- validation -->
    <script src="lib/validation/jquery.validate.min.js"></script>
	<!-- validation functions -->
    <script src="js/validation_editcontent.js"></script>
    <!-- editor -->
   <script src="lib/tiny_mce/jquery.tinymce.js"></script>
   <!-- file explorer functions -->
    <script src="js/gebo_explorer.js"></script>
   <script language="javascript" type="application/javascript">
   $(document).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script>
</div>
					</body>
				</html>