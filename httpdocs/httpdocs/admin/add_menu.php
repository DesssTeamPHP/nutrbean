<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 03/4/2014 
  * Last Date: 03/4/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Menu";
error_reporting(0);
/*********************Blog SELECT**********************************************/

      $Menu_tablename                   =    MENUPAGETABLE;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $Menu_select                      =    $Core_Mysql->select_one_where($Menu_tablename,$fieldname_one,$fieldname_one_value);
	  $Menu_execute                     =    $Core_Mysql->db_query($Menu_select);
	  $Menu_results                     =    $Core_Mysql->db_fetch_array($Menu_execute);
	  $page_num_Records                 =    $Core_Mysql->get_num_record($Menu_execute);

/******************************============END==============************************/

 $Menu_tablename             =    MENUPAGETABLE;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$Menu_title                   = $_REQUEST['Menu_title'];
$File_name                   = $_REQUEST['File_name'];
$Menu_Order                  = $_REQUEST['Menu_Order'];

$Field_types           = array('title'                => $Menu_title,
                               'file_name'            => $File_name,
							   'is_menu'              =>1,
						       'order_id'             => $Menu_Order,
							   'is_show'              =>0
                              );
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($Menu_tablename,$Field_types);

        if($Message_admin != 0)
           {
			    
			 $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:main_page.php?".$send_val);	
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                          = $_REQUEST['id'];
$Menu_title                  = $_REQUEST['Menu_title'];
$File_name                   = $_REQUEST['File_name'];
$Menu_Order                  = $_REQUEST['Menu_Order'];

/***************************************//////*******************************************************/
$Menu_tablename              =    MENUPAGETABLE;//table_name
$FieldName                   =  'id';
/*****************************************///////**************************************************//


$Field_types           = array('title'                => $Menu_title,
                               'file_name'            => $File_name,
							   'is_menu'              =>1,
						       'order_id'             => $Menu_Order,
							   'is_show'              =>0
                              );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($Menu_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			$data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:main_page.php?".$send_val);   
			  
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:main_page.php");
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
		
		var Menu_title=document.getElementById('Menu_title');
		var File_name=document.getElementById('File_name');
		var Menu_Order=document.getElementById('Menu_Order');
		
		
		if(Menu_title.value=="")
		{
			alert("Please Enter Menu Title");
			Menu_title.focus();
			return false;
		}
		else if(Menu_title.value.length<3)
		{
			alert("Please Enter Menu Title Minimum 3 characters");
			Menu_title.focus();
			return false;
		}	
		else if(!Menu_title.value.match(letters))
		{
			alert("Please Enter Valid Menu Title");
			Menu_title.focus();
			return false;
		}	
		else if(File_name.value=="")
		{
			alert("Please Enter File Name");
			File_name.focus();
			return false;
		}
		else if(File_name.value.length>100)
		{
			alert("Please Enter File Name");
			File_name.focus();
			return false;
		}
		
		
		else if(Menu_Order.value=="")
		{
			alert("Please Enter  Menu Order");
			Menu_Order.focus();
			return false;
		}
		else if(Menu_Order.value.length>100)
		{
			alert("Please Enter Menu Order");
			Menu_Order.focus();
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

<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer" class="clearfixs">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 col-md-12">
      <h3 class="heading">Add Page</h3>
		<form class="form_validation_page" method="post" enctype="multipart/form-data">
			<div class="formSep">
				<div class="form-group">
					<label>Main Menu Name:<span class="f_req">*</span></label>
					<input name="Menu_title"  id="Menu_title"class="form-control" maxlength="50" type="text" value="<?php echo $Menu_results['title'];?>">
				</div>
				<label>Page Name : <span class="f_req">*</span></label>
				<input name="File_name" id="File_name" class="form-control" maxlength="50" type="text" value="<?php echo $Menu_results['file_name'];?>">
			</div>
            <div class="formSep">
				<div class="form-group">
					<label>Menu Order: </label>
				<input name="Menu_Order"  id="Menu_Order" class="form-control number_only_valiq" maxlength="3" type="text" value="<?php echo $Menu_results['order_id'];?>">
                <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
				</div></div>
			<div class="form-actions">
            <?php if($_REQUEST['id'] != '')
			       {?>
					  <button class="btn btn-primary"  name="Update" type="submit" value="Update" >Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>  
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
    <script src="js/validation_addpage.js"></script>
    <!-- editor -->
   <script src="lib/tiny_mce/jquery.tinymce.js"></script>
   <!-- file explorer functions -->
    <script src="js/gebo_explorer.js"></script>
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