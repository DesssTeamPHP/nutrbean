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
$meta_title  =  "Add Menu-Name";
/*********************Social Media SELECT**********************************************/

      $menu_tablename                 =    ADMINCMSMENU;
	  $fieldname_one                    =    'admin_menuid';
	  $fieldname_one_value              =   $_REQUEST['id'];
	  $menu_select                    =    $Core_Mysql->select_one_where($menu_tablename,$fieldname_one,$fieldname_one_value);
	  $menu_execute                   =    $Core_Mysql->db_query($menu_select);
	  $menu_results                    =    $Core_Mysql->db_fetch_array($menu_execute);
	  $menu_num_Records                =    $Core_Mysql->get_num_record($menu_execute);

/******************************============END==============************************/

 $menu_tablename      =    ADMINCMSMENU;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 
$admin_menuname           = $_REQUEST['admin_menuname'];
$admin_menuurl            = $_REQUEST['admin_menuurl'];
$created_date             = $_REQUEST['created_date'];




$Field_types           = array('admin_menuname'       => $admin_menuname,
                               'admin_menuurl'        => $admin_menuurl,
						       'created_date'         => date('Y-m-d H:i:s')
                              );
	//print_r($Field_types);die;					   
 $Message_admin      =  $Core_Mysql->insert_common_query($menu_tablename,$Field_types);

        if($Message_admin != 0)
           {
			   
			    $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:menu_name.php?".$send_val);
			   
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                       = $_REQUEST['id'];
$admin_menuid             = $_REQUEST['admin_menuid'];
$admin_menuname           = $_REQUEST['admin_menuname'];
$admin_menuurl            = $_REQUEST['admin_menuurl'];
$created_date             = $_REQUEST['created_date'];



/***************************************//////*******************************************************/
$menu_tablename      =  ADMINCMSMENU;//table_name
$FieldName            =  'admin_menuid';
/*****************************************///////**************************************************//

 $Field_types           = array('admin_menuname'       => $admin_menuname,
                               'admin_menuurl'        => $admin_menuurl,
						       'created_date'         => date('Y-m-d H:i:s')
                              );
						   
	//print_r($Field_types); die;					   
 $Message_admin      =  $Core_Mysql->update_common_query($menu_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			   
			    $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:menu_name.php?".$send_val);
			   
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:menu_name.php");
	}
?>

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
      <h3 class="heading">Menu Name</h3>
		<form class="form_validation_ttip" method="post" enctype="multipart/form-data">
			<div class="formSep">
				<div class="form-group">
					<label>Menu Name:<span class="f_req">*</span></label>
					<input name="admin_menuname"  id="admin_menuname" class="form-control" maxlength="50" type="text" value="<?php echo $menu_results['admin_menuname'];?>">
				</div>
				<label>Menu Url : <span class="f_req">*</span></label>
				<input name="admin_menuurl" id="admin_menuurl" class="form-control" maxlength="50" type="text" value="<?php echo $menu_results['admin_menuurl'];?>">
                <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo isset($_REQUEST['id']);?>">
			</div>
			 
			<div class="form-actions">
            <?php if(isset($_REQUEST['id']) != '')
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
   
</div>
					</body>
				</html>