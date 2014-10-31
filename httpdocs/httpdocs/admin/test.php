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
$meta_title  =  "Add Shipping-Page";
error_reporting(0);
/*********************Blog SELECT**********************************************/

      $Shipping_tablename                     =    HANDLING_CHARGES;
	  $fieldname_one                          =    'handling_id';
	  $fieldname_one_value                    =    $_REQUEST['id'];
	  $Shipping_select                        =    $Core_Mysql->select_one_where($Shipping_tablename,$fieldname_one,$fieldname_one_value);
	  $Shipping_execute                       =    $Core_Mysql->db_query($Shipping_select);
	  $Shipping_results                       =    $Core_Mysql->db_fetch_array($Shipping_execute);
	  $Shipping_num_Records                   =    $Core_Mysql->get_num_record($Shipping_execute);

/******************************============END==============************************/

$Shipping_tablename                     =    HANDLING_CHARGES;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$value_from                                = $_REQUEST['value_from'];
$value_to 		                           = $_REQUEST['value_to'];
$handling_charges                          = $_REQUEST['handling_charges'];
$enabled	                               = $_REQUEST['enabled'];
$title 	                                   = $_REQUEST['title']; 	
$method_name 	                           = $_REQUEST['method_name'];
$type 	                                   = $_REQUEST['type'];


$Field_types           = array('value_from'                 => $value_from,
                               'value_to'                   => $value_to,
							   'handling_charges'           => $handling_charges,
							   'enabled'                    => $enabled,
							   'method_name'                => $method_name,
							   'type'                       => $type,
							   'title'                      => $title
                              );
						   
					//print_r($Field_types); die;	   
 $Message_admin      =  $Core_Mysql->insert_common_query($Shipping_tablename,$Field_types);

        if($Message_admin != 0)
           {
			  
			   $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:shipping_details.php?".$send_val);
			  
			  
			  
			    
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                                        = $_REQUEST['id'];
$value_from                                = $_REQUEST['value_from'];
$value_to 		                           = $_REQUEST['value_to'];
$handling_charges                          = $_REQUEST['handling_charges'];
$enabled	                               = $_REQUEST['enabled'];
$title 	                                   = $_REQUEST['title']; 	
$method_name 	                           = $_REQUEST['method_name'];
$type 	                                   = $_REQUEST['type'];


/***************************************//////*******************************************************/
$Shipping_tablename                     =    HANDLING_CHARGES;//table_name
$FieldName                              =  'handling_id';
/*****************************************///////**************************************************//


$Field_types           = array('value_from'                 => $value_from,
                               'value_to'                   => $value_to,
							   'handling_charges'           => $handling_charges,
							   'enabled'                    => $enabled,
							   'method_name'                => $method_name,
							   'type'                       => $type,
							   'title'                      => $title
                              );
						  //print_r($Field_types);die;
 $Message_admin      =  $Core_Mysql->update_common_query($Shipping_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 {
	echo mysql_error(); 
 }
        if($Message_admin != 0)
           {
			   
			 $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:shipping_details.php?".$send_val);
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: shipping_details.php");
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
		
		var title=document.getElementById('title');
		var method_name=document.getElementById('method_name');
		var type=document.getElementById('type');
		
		
		if(title.value=="")
		{
			alert("Please Enter Tax Title");
			title.focus();
			return false;
		}
		else if(title.value.length>100)
		{
			alert("Please Enter Title");
			title.focus();
			return false;
		}
		else if(method_name.value=="")
		{
			alert("Please Enter Method Name");
			method_name.focus();
			return false;
		}
		else if(method_name.value.length>100)
		{
			alert("Please Enter Method Name");
			method_name.focus();
			return false;
		}
		else if(type.value=="")
		{
			alert("Please Enter type");
			type.focus();
			return false;
		}
		else if(type.value.length>100)
		{
			alert("Please Enter type");
			type.focus();
			return false;
		}
		
		else
		{
			document.content_add.submit();
			return true;
		}
	}
	
 
	</script>
    <style>
	.panel1 {
    background-color: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
    width: 1523px;
	}
	
	</style>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
		
		<div id="maincontainer" class="clearfix">
			<?php require 'common/admin-header.php';?>
        

            <div id="contentwrapper">
                <div class="main_content">
                    					  
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="row">
            <div class="col-sm-6 col-md-6">
				<h3 class="heading">Default Accordion</h3>
				<div id="accordion1" class="panel-group accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="#collapseOne" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
								Shipping Handling Charges
							</a>
						</div>
						<div class="panel-collapse collapse" id="collapseOne">
							<div class="panel-body">
                            <form class="form_validation_blog" method="post" enctype="multipart/form-data">
								 <label>Value From :<span class="f_req">*</span></label>
            <input name="value_from"  id="value_from" class="form-control" type="text" value="<?php echo $Shipping_results['value_from'];?>">
            
             <label>Value To :<span class="f_req">*</span></label>
            <input name="value_to"  id="value_to" class="form-control" type="text" value="<?php echo $Shipping_results['value_to'];?>">
            
            <label>Price:<span class="f_req">*</span></label>
          <input name="handling_charges"  id="handling_charges" class="form-control" type="text"  value="<?php echo $Shipping_results['handling_charges'];?>">
          </br>
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
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="#collapseTwo" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
								Table Rate
							</a>
						</div>
						<div class="panel-collapse collapse" id="collapseTwo">
							<div class="panel-body">
								 <form class="form_validation_blog" method="post" enctype="multipart/form-data">
								 <label>Value From :<span class="f_req">*</span></label>
            <input name="value_from"  id="value_from" class="form-control" type="text" value="<?php echo $Shipping_results['value_from'];?>">
            
             <label>Value To :<span class="f_req">*</span></label>
            <input name="value_to"  id="value_to" class="form-control" type="text" value="<?php echo $Shipping_results['value_to'];?>">
            
            <label>Price:<span class="f_req">*</span></label>
          <input name="handling_charges"  id="handling_charges" class="form-control" type="text"  value="<?php echo $Shipping_results['handling_charges'];?>">
          </br>
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
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="#collapseThree" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
								Free Shipping
							</a>
						</div>
						<div class="panel-collapse collapse" id="collapseThree">
							<div class="panel-body">
								 <form class="form_validation_blog" method="post" enctype="multipart/form-data">
								 <label>Value From :<span class="f_req">*</span></label>
            <input name="value_from"  id="value_from" class="form-control" type="text" value="<?php echo $Shipping_results['value_from'];?>">
            
             <label>Value To :<span class="f_req">*</span></label>
            <input name="value_to"  id="value_to" class="form-control" type="text" value="<?php echo $Shipping_results['value_to'];?>">
            
            <label>Price:<span class="f_req">*</span></label>
          <input name="handling_charges"  id="handling_charges" class="form-control" type="text"  value="<?php echo $Shipping_results['handling_charges'];?>">
          </br>
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
            
            
            
			
		</div>
    </div>
</div>                </div>
            </div>
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar">
	
	
	
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

	

	  
</div>
					</body>
				</html>
