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
$meta_title  =  "Add Tax-Page";
error_reporting(0);
/*********************Blog SELECT**********************************************/

      $Tax_tablename                     =    TAX;
	  $fieldname_one                     =    'id';
	  $fieldname_one_value               =    $_REQUEST['id'];
	  $Tax_select                        =    $Core_Mysql->select_one_where($Tax_tablename,$fieldname_one,$fieldname_one_value);
	  $Tax_execute                       =    $Core_Mysql->db_query($Tax_select);
	  $Tax_results                       =    $Core_Mysql->db_fetch_array($Tax_execute);
	  $Tax_num_Records                   =    $Core_Mysql->get_num_record($Tax_execute);

/******************************============END==============************************/

$Tax_tablename                     =    TAX;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$tax_name                                = $_REQUEST['tax_name'];
$product_tax_id 		                 = $_REQUEST['product_tax_id'];
$tax_rate                                = $_REQUEST['tax_rate'];
$priority	                             = $_REQUEST['priority'];
$sort_order                              = $_REQUEST['sort_order'];




$Field_types           = array('name'                 => $tax_name,
                               'product_tax_id'       => $product_tax_id,
							   'tax_rate'             => $tax_rate,
							   'priority'             => $priority,
							   'sort_order'           => $sort_order
                              );
						   
					//print_r($Field_types); die;	   
 $Message_admin      =  $Core_Mysql->insert_common_query($Tax_tablename,$Field_types);

        if($Message_admin != 0)
           {
			  
			   $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:tax.php?".$send_val);
			  
			  
			  
			    
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
$tax_name                    = $_REQUEST['tax_name'];
$product_tax_id 		     = $_REQUEST['product_tax_id'];
$tax_rate                    = $_REQUEST['tax_rate'];
$priority	                 = $_REQUEST['priority'];
$sort_order                  = $_REQUEST['sort_order'];


/***************************************//////*******************************************************/
$Tax_tablename                     =    TAX;//table_name
$FieldName                         =  'id';
/*****************************************///////**************************************************//


$Field_types           = array('name'                 => $tax_name,
                               'product_tax_id'       => $product_tax_id,
							   'tax_rate'             => $tax_rate,
							   'priority'             => $priority,
							   'sort_order'           => $sort_order
                              );
						  //print_r($Field_types);die;
 $Message_admin      =  $Core_Mysql->update_common_query($Tax_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 {
	echo mysql_error(); 
 }
        if($Message_admin != 0)
           {
			   
			 $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:tax.php?".$send_val);
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: tax.php");
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
		
		var tax_name=document.getElementById('tax_name');
		var product_tax_id=document.getElementById('product_tax_id');
		var tax_rate=document.getElementById('tax_rate');
		var priority=document.getElementById('priority');
		var sort_order=document.getElementById('sort_order');
		
		if(tax_name.value=="")
		{
			alert("Please Enter Tax Name");
			tax_name.focus();
			return false;
		}
		else if(tax_name.value.length>100)
		{
			alert("Please Enter Tax Name");
			tax_name.focus();
			return false;
		}
		else if(product_tax_id.value=="")
		{
			alert("Please Enter Product Tax");
			product_tax_id.focus();
			return false;
		}
		else if(product_tax_id.value.length>100)
		{
			alert("Please Enter Product Tax");
			image_name.focus();
			return false;
		}
		else if(tax_rate.value=="")
		{
			alert("Please Enter Tax Rate");
			tax_rate.focus();
			return false;
		}
		else if(tax_rate.value.length>100)
		{
			alert("Please Enter Tax Rate");
			tax_rate.focus();
			return false;
		}
		else if(priority.value=="")
		{
			alert("Please Enter Priority");
			priority.focus();
			return false;
		}
		else if(priority.value.length>100)
		{
			alert("Please Enter Priority");
			priority.focus();
			return false;
		}
		else if(sort_order.value=="")
		{
			alert("Please Enter Sort Order");
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
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer"  class="clearfixs">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 col-md-12">
      <h3 class="heading">Tax</h3>
      <form class="form_validation_blog" method="post" enctype="multipart/form-data">
        <div class="formSep">
          <div class="form-group">
            <label>Name:<span class="f_req">*</span></label>
            <input name="tax_name"  id="tax_name" class="form-control" type="text" value="<?php echo $Tax_results['name'];?>">
          </div>
          
        </div>
       <div class="formSep">
          <label>Product Tax Class</label>
         
          <select name="product_tax_id" id="product_tax_id" class="form-control" multiple="multiple">
           
            <?php
      $pagetablename          =    PRODUCTS;
	  $FieldName              =    'products_id';
	  $sororder               =    'desc';
	  $Field_types            =    array('products_id',
	                                     'tax_class'
										 );     
						                   
	 $pagecat_select          =    $Core_Mysql->select_common_query($pagetablename,$FieldName,$Field_types,$sororder);
	 $pagecat_execute         =    $Core_Mysql->db_query($pagecat_select);
	  if(!$pagecat_execute)
		{
		echo mysql_error();
		exit;
		}
		else if(mysql_num_rows($pagecat_execute)==0)
		{
		echo   '<option value="0">Other</option>';
		}
		else
		{
		while($fetch_select_page_category=mysql_fetch_array($pagecat_execute))
			{
			  if(($fetch_select_page_category['products_id'] ==  $Tax_results['product_tax_id']))
					  {
					  $page_Cat_selected='selected="selected"';
					  }
					  else
					  {
   				       $page_Cat_selected="";
					  }
					  
				echo ' <option value="'.$fetch_select_page_category['products_id'].'" '.$page_Cat_selected.' >'.$fetch_select_page_category['tax_class'].'</option>'; 
					  
			}
		
		}
			 ?>
          </select>
        </div>
        
      
        <div class="formSep">
          <div class="form-group">
            <label>Tax Rate:<span class="f_req">*</span></label>
            <input name="tax_rate"  id="tax_rate" class="form-control number_only_valiq" type="text" value="<?php echo $Tax_results['tax_rate'];?>">
          </div>
         
        
     
        <label>Priority: <span class="f_req">*</span></label>
        <input name="priority" id="priority" class="form-control number_only_valiq" type="text" value="<?php echo $Tax_results['priority'];?>">
        </div>
        
       
        
        <div class="form-group">
          <label>Sort Order:<span class="f_req">*</span></label>
          <input name="sort_order"  id="sort_order" class="form-control number_only_valiq" type="text" value="<?php echo $Tax_results['sort_order'];?>">
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
  </div>
</div>
</div>
</div>
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
    <script src="js/validation_blog.js"></script>
    <!-- editor -->
   <script src="lib/tiny_mce/jquery.tinymce.js"></script>
   <!-- file explorer functions -->
    <script src="js/gebo_explorer.js"></script>
    
    
    
    
    
    
<script type="text/javascript" src="lib/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#products_description"
});
</script>
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