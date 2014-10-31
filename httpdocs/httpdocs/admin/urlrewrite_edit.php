<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Jayaraj
  * Date     : 05/08/2014 
  * Last Date: 05/08/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "URL Rewrite / Rewrite Rules / Administrator / Customization ";
$UrlRewrite_tablename             =    URLREWRITE_TBL;//table_name
/*********************Blog SELECT**********************************************/



if(isset($_REQUEST['id']))

{

	  $id								=	$_REQUEST['id'];
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $id;
	  $UrlRewrite_select                =    $Core_Mysql->select_one_where($UrlRewrite_tablename,$fieldname_one,$fieldname_one_value);
	  $UrlRewrite_execute               =    $Core_Mysql->db_query($UrlRewrite_select);
	  $UrlRewrite_results               =    $Core_Mysql->db_fetch_array($UrlRewrite_execute);
	  $UrlRewrite_num_Records           =    $Core_Mysql->get_num_record($UrlRewrite_execute);
	  $h1								=	 'Edit URL Rewrite';
	  $request_path             	    = $UrlRewrite_results['request_path'];
	  $target_path 						= $UrlRewrite_results['target_path'];
	  $description						= $UrlRewrite_results['description'];

	  
}
else 
{ 		$h1								= 'Add New URL Rewrite';
	    $id								= "add";	
	    $request_path             	    = "";	
	    $target_path 					= "";	
	    $description					= "";	
}
	  
	  

/******************************============END==============************************/

 
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$request_path               = $_REQUEST['request_path'];
$target_path 				= $_REQUEST['target_path'];
$description				= $_REQUEST['description'];
$time_created			    = date("Y-m-d H:i:s");


$Field_types           = array('request_path'        => $request_path,
							   'target_path'         => $target_path,
                               'description'    	 => $description,
                               'time_created'        => $time_created
                           );
						   
$Message_admin      =  $Core_Mysql->insert_common_query($UrlRewrite_tablename,$Field_types);

 if($Message_admin != 0)
{
	
	 $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:urlrewrite.php?".$send_val);
	
}
else 
{
echo $Message_admin; 
}
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                         = $_REQUEST['id'];
$request_path               = $_REQUEST['request_path'];
$target_path 				= $_REQUEST['target_path'];
$description				= $_REQUEST['description'];
$time_created			    = date("Y-m-d H:i:s");
$FieldName					= 'id';

$Field_types           = array('request_path'        => $request_path,
							   'target_path'         => $target_path,
                               'description'    	 => $description,
                               'time_created'        => $time_created
                           );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($UrlRewrite_tablename,$FieldName,$Field_types,$id);
 


if($Message_admin != 0)
           {
			   
			   
			  $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:urlrewrite.php?".$send_val);   
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: urlrewrite.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer" class="clearfix">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h3 class="heading"><?php echo $h1;?></h3>
          <form class="frm_urlrewrite" method="post" name="urlrewrite" enctype="multipart/form-data">
            <div class="formSep">
              <div class="form-group">
                <label>Request Path:<span class="f_req">*</span></label>
                <input name="request_path"  id="request_path" class="form-control url" type="text" value="<?php echo $request_path;?>" tabindex="1">
              </div>
              <div class="form-group">
                <label>Target Path:<span class="f_req">*</span></label>
                <input name="target_path"  id="target_path" class="form-control url" type="text" value="<?php echo $target_path;?>" tabindex="2">
              </div>
            </div>
            <div class="formSep">
              <label >Description:</label>
<textarea tabindex="3" class="form-control" rows="4" cols="1" id="auto_expand" name="description" style="overflow: hidden; word-wrap: break-word; max-height: 94px; min-height: 94px; height: 94px;"><?php echo $description;?></textarea>
             
            </div>
            <div class="form-actions">
              <?php if($id != "add")
			       {?>
              <button tabindex="4" class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button>
              <?php  }
			     else
			      {?>
              <button  tabindex="4" class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>
              <?php }
?>     <button  tabindex="5" class="btn btn-primary"  name="Save" onClick="rewrite_goBack('urlrewrite.php');" type="button" value="submit">Close</button>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<?php require 'common/admin-sidebar.php';?><?php require 'common/admin-sidebar.php';?>
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
  <!-- multi-column layout -->
  <script src="js/jquery.imagesloaded.min.js"></script>
  <script src="js/jquery.wookmark.js"></script>  
	<!-- validation -->
    <script src="lib/validation/jquery.validate.min.js"></script>
	<!-- validation functions -->
    <script src="js/custom_validation.js"></script>  

</body></html>
