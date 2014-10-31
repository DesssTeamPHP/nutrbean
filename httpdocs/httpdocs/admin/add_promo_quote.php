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
$meta_title  =  "Promo Quote Customization";

	/*********************Product SELECT**********************************************/
if(isset($_REQUEST['id']))
{
      $Promo_tablename                   =    promo_quote;
	  $fieldname_one                     =    'promo_quote_id';
	  $fieldname_one_value               =    $_REQUEST['id'];
	  $Promo_select                      =    $Core_Mysql->select_one_where($Promo_tablename,$fieldname_one,$fieldname_one_value);
	  $Promo_execute                     =    $Core_Mysql->db_query($Promo_select);
	  $Promo_results                     =    $Core_Mysql->db_fetch_array($Promo_execute);
	  $Promo_num_Records                 =    $Core_Mysql->get_num_record($Promo_execute);
	  $id=$_REQUEST['id'];
	  //$master_categories_id = $Promo_results['master_categories_id'];
}
else
{
$Promo_results['promo_quote_name']="";
$Promo_results['promo_quote_id']="";
$Promo_results['promo_quote_desc']="";
$Promo_results['promo_quote_status']="";
$Promo_results['promo_quote_groups']="";
$Promo_results['promo_coupon_code']="";
$Promo_results['promo_quote_usescoupon']="";
$Promo_results['promo_quote_percustomer']="";
$Promo_results['promo_quote_from_date']="";
$Promo_results['promo_quote_to_date']="";
$Promo_results['promo_quote_priority']="";
$Promo_results['promo_quote_rssfeed']="";
$Promo_results['promo_quote_apply']="";
$Promo_results['promo_quote_discount_amount']="";
$Promo_results['promo_quote_maximum_amount']="";
$Promo_results['promo_quote_discount_qty']="";
$Promo_results['promo_quote_apply_shipping']="";
$Promo_results['promo_quote_free_shipping']="";
$Promo_results['promo_quote_processing']="";
$Promo_results['create_date']="";




//$master_categories_id ="";

$id="0";

}

/******************************============END==============************************/

if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$promo_quote_from_date = explode("/", $_REQUEST['promo_quote_from_date']);
$display = $promo_quote_from_date[2].'-'.$promo_quote_from_date[0].'-'.$promo_quote_from_date[1];

$promo_quote_to_date = explode("/", $_REQUEST['promo_quote_to_date']);
$display1 = $promo_quote_to_date[2].'-'.$promo_quote_to_date[0].'-'.$promo_quote_to_date[1];

$promo_quote_name                        = $_REQUEST['promo_quote_name'];
$promo_coupon_code 			             = $_REQUEST['promo_coupon_code'];
$promo_quote_desc                        = $_REQUEST['promo_quote_desc'];
$promo_quote_status	                     = $_REQUEST['promo_quote_status'];
$promo_quote_groups	                     = $_REQUEST['promo_quote_groups'];
$promo_quote_usescoupon					 = $_REQUEST['promo_quote_usescoupon'];
$promo_quote_percustomer				 = $_REQUEST['promo_quote_percustomer'];
//$promo_quote_from_date				 = $_REQUEST['promo_quote_from_date'];		
//$promo_quote_to_date			 	     = $_REQUEST['promo_quote_to_date'];
$promo_quote_priority			 	     = $_REQUEST['promo_quote_priority'];
$promo_quote_rssfeed					 = $_REQUEST['promo_quote_rssfeed'];
$promo_quote_apply						 = $_REQUEST['promo_quote_apply'];
$promo_quote_discount_amount			 = $_REQUEST['promo_quote_discount_amount'];
$promo_quote_maximum_amount				 = $_REQUEST['promo_quote_maximum_amount'];
$promo_quote_discount_qty				 = $_REQUEST['promo_quote_discount_qty'];
$promo_quote_apply_shipping              = $_REQUEST['promo_quote_apply_shipping'];
$promo_quote_free_shipping               = $_REQUEST['promo_quote_free_shipping'];
$promo_quote_processing                  = $_REQUEST['promo_quote_processing'];
$create_date                             = $_REQUEST['create_date'];



$Field_types           = array('promo_quote_name'                 => $promo_quote_name,
                               'promo_coupon_code'                => $promo_coupon_code,
							   'promo_quote_desc'                 => addslashes($promo_quote_desc),
							   'promo_quote_status'               => $promo_quote_status,
							   'promo_quote_groups'               => $promo_quote_groups,
                               'promo_quote_usescoupon'           => $promo_quote_usescoupon,
                               'promo_quote_percustomer'          => $promo_quote_percustomer,
							   'promo_quote_priority'             => $promo_quote_priority,
							    'promo_quote_rssfeed'             => $promo_quote_rssfeed,
							   'promo_quote_apply'                => $promo_quote_apply, 
                               'promo_quote_discount_amount'      => $promo_quote_discount_amount,
							   'promo_quote_maximum_amount'       => $promo_quote_maximum_amount,
							   'promo_quote_discount_qty'         => $promo_quote_discount_qty,
							   'promo_quote_apply_shipping'       => $promo_quote_apply_shipping,
							   'promo_quote_free_shipping'        => $promo_quote_free_shipping,
							   'promo_quote_processing'           => $promo_quote_processing,
							   'promo_quote_from_date'            => $display,
							   'promo_quote_to_date'              => $display1,
							   'create_date'		              => date("Y-m-d H:i:s") 
                              );
						   
					//print_r($Field_types); die;	   
 $Message_admin      =  $Core_Mysql->insert_common_query($Promo_tablename,$Field_types);

        if($Message_admin != 0)
           {
			    
				
			$data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:promo_quote.php?".$send_val);	
				
				
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 

$promo_quote_from_date = explode("/", $_REQUEST['promo_quote_from_date']);
$display = $promo_quote_from_date[2].'-'.$promo_quote_from_date[0].'-'.$promo_quote_from_date[1];

$promo_quote_to_date = explode("/", $_REQUEST['promo_quote_to_date']);
$display1 = $promo_quote_to_date[2].'-'.$promo_quote_to_date[0].'-'.$promo_quote_to_date[1];



$id                                      = $_REQUEST['id'];
$promo_quote_name                        = $_REQUEST['promo_quote_name'];
$promo_coupon_code 			             = $_REQUEST['promo_coupon_code'];
$promo_quote_desc                        = $_REQUEST['promo_quote_desc'];
$promo_quote_status	                     = $_REQUEST['promo_quote_status'];
$promo_quote_groups	                     = $_REQUEST['promo_quote_groups'];
$promo_quote_usescoupon					 = $_REQUEST['promo_quote_usescoupon'];
$promo_quote_percustomer				 = $_REQUEST['promo_quote_percustomer'];
//$promo_quote_from_date				 = $_REQUEST['promo_quote_from_date'];		
//$promo_quote_to_date			 	     = $_REQUEST['promo_quote_to_date'];
$promo_quote_priority			 	     = $_REQUEST['promo_quote_priority'];
$promo_quote_rssfeed					 = $_REQUEST['promo_quote_rssfeed'];
$promo_quote_apply						 = $_REQUEST['promo_quote_apply'];
$promo_quote_discount_amount			 = $_REQUEST['promo_quote_discount_amount'];
$promo_quote_maximum_amount				 = $_REQUEST['promo_quote_maximum_amount'];
$promo_quote_discount_qty				 = $_REQUEST['promo_quote_discount_qty'];
$promo_quote_apply_shipping              = $_REQUEST['promo_quote_apply_shipping'];
$promo_quote_free_shipping               = $_REQUEST['promo_quote_free_shipping'];
$promo_quote_processing                  = $_REQUEST['promo_quote_processing'];
$create_date                             = $_REQUEST['create_date'];


/***************************************//////*******************************************************/
$Promo_tablename             =    promo_quote;//table_name
$FieldName                   =  'promo_quote_id';
/*****************************************///////**************************************************//


$Field_types           = array('promo_quote_name'                 => $promo_quote_name,
                               'promo_coupon_code'                => $promo_coupon_code,
							   'promo_quote_desc'                 => addslashes($promo_quote_desc),
							   'promo_quote_status'               => $promo_quote_status,
							   'promo_quote_groups'               => $promo_quote_groups,
                               'promo_quote_usescoupon'           => $promo_quote_usescoupon,
                               'promo_quote_percustomer'          => $promo_quote_percustomer,
							   'promo_quote_priority'             => $promo_quote_priority,
							    'promo_quote_rssfeed'             => $promo_quote_rssfeed,
							   'promo_quote_apply'                => $promo_quote_apply, 
                               'promo_quote_discount_amount'      => $promo_quote_discount_amount,
							   'promo_quote_maximum_amount'       => $promo_quote_maximum_amount,
							   'promo_quote_discount_qty'         => $promo_quote_discount_qty,
							   'promo_quote_apply_shipping'       => $promo_quote_apply_shipping,
							   'promo_quote_free_shipping'        => $promo_quote_free_shipping,
							   'promo_quote_processing'           => $promo_quote_processing,
							   'promo_quote_from_date'            => $display,
							   'promo_quote_to_date'              => $display1,
							   'create_date'		              => date("Y-m-d H:i:s") 
                              );
						
					//print_r($Field_types);	die;
						
						
						
 $Message_admin      =  $Core_Mysql->update_common_query($Promo_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 {
	echo mysql_error(); exit;
 }
        if($Message_admin != 0)
           {
			   
			  $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:promo_quote.php?".$send_val);  
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: product.php");
	}

	
?>
 <link rel="stylesheet" type="text/css" href="css/default.css"/>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>

<div  id="maincontainer" class="clearfixs">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row" >
        <form  class="frm_product_add_valid"  method="post" enctype="multipart/form-data" />
        <input type="hidden" name="id" value="<?php echo $id;?>" >
        <h3 class="heading">Promo Quote
          <div class="move_upper" style="float:right; margin-top:-8px;">
            <?php if(isset($_REQUEST['id']) != '')
			       {?>
            <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button>
            <?php  }
			     else
			      {?>
            <button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>
            <?php }
			   ?>
            <input type="button" class="btn btn-primary" name="Close" value="Cancel"  onClick="rewrite_goBack('promo_quote.php');">
          </div>
        </h3>
        <div class="col-sm-12 col-md-12">
          <div class="tab-content">
            <div class="tab-pane active" id="tab_br1">
              <div  class="formSep">
                <div  class="form-group">
                  <label>Promo Name:<span class="f_req">*</span></label>
                  <input name="promo_quote_name"  id="promo_quote_name"class="form-control" type="text" value="<?php echo $Promo_results['promo_quote_name'];?>" maxlength="100" tabindex="1">
                </div>
            
                <div  class="form-group">
                  <label >Promo Description:</label>
                  <textarea name="promo_quote_desc" id="wysiwg_full"  class="wysiwg_full" cols="30" rows="10" tabindex="3"><?php echo $Promo_results['promo_quote_desc'];?></textarea>
                </div>
                
                <div  class="form-group">
                  <label>Promo Status:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="promo_quote_status" id="promo_quote_status" tabindex="2"  class="form-control">
                    <option value="Active" <?php if($Promo_results["promo_quote_status"]=="Active")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Active</option>
                    <option value="Inactive" <?php if($Promo_results["promo_quote_status"]=="Inactive")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Inactive</option>
                  </select>
                </div>
                
                <div  class="form-group">
                  <label>Customer Groups:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="promo_quote_groups" id="promo_quote_groups" onchange="return sub_type(this.value);" class="form-control" tabindex="6" >
                    <option value="">----Select---</option>
                    <option value="NOT LOGGED IN" <?php if($Promo_results["promo_quote_groups"]=="NOT LOGGED IN")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >NOT LOGGED IN</option>
                    <option value="General" <?php if($Promo_results["promo_quote_groups"]=="General")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >General</option>
                    <option value="Wholesale" <?php if($Promo_results["promo_quote_groups"]=="Wholesale")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Wholesale</option>
                    <option value="Retailer" <?php if($Promo_results["promo_quote_groups"]=="Retailer")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Retailer</option>
                  </select>
                </div>
                
                
                <div class="form-group">
                  <label>Coupon Code:<span class="f_req">*</span></label>
                  <input name="promo_coupon_code"  id="promo_coupon_code" class="form-control" tabindex="4" type="text" maxlength="50" value="<?php echo $Promo_results['promo_coupon_code'];?>">
                  <br />
                  <div id="disp"></div>
                </div>
                <div  class="form-group">
                  <label>Uses per Coupon: </label>
                  <input name="promo_quote_usescoupon" id="promo_quote_usescoupon" class="form-control" style="text-transform:lowercase;" tabindex="5"  type="text" maxlength="500" value="<?php echo $Promo_results['promo_quote_usescoupon'];?>">
                  <br />
                  <div id="disp_url"></div>
                </div>
                
                <div class="form-group">
                  <label>Uses per Customer:<span class="f_req">*</span></label>
                  <input name="promo_quote_percustomer"  id="promo_quote_percustomer" class="form-control" tabindex="4" type="text" maxlength="50" value="<?php echo $Promo_results['promo_quote_percustomer'];?>">
                  <br />
                  <div id="disp"></div>
                </div>
                
                <div>
			<div class="input-group date" id="dp1" data-date-format="mm/dd/yyyy" style="width:17%">
            <label>From Date :<span class="f_req"></span></label>
				<input type="text"  class="form-control" name="promo_quote_from_date" id="promo_quote_from_date" value="<?php echo date("m/d/Y",strtotime($Promo_results['promo_quote_from_date']));?>">
				<span class="input-group-addon" style="font-size: 14px;font-weight: normal;line-height: 1; padding: 22px 7px 1px; border:none; background:none;text-align: center;"><i class="splashy-calendar_day"></i></span>
			</div>
			
		</div>
                
                <div>
			<div class="input-group date" id="dp2" data-date-format="mm/dd/yyyy" style="width:17%">
            <label>To Date :<span class="f_req"></span></label>
				<input type="text"  class="form-control" name="promo_quote_to_date" id="promo_quote_to_date" value="<?php echo date("m/d/Y",strtotime($Promo_results['promo_quote_to_date']));?>">
				<span class="input-group-addon" style="font-size: 14px;font-weight: normal;line-height: 1; padding: 22px 7px 1px; border:none; background:none;text-align: center;"><i class="splashy-calendar_day"></i></span>
			</div>
			
		</div>
                
               <!-- <div  class="form-group">
                  <label>Priority: </label>
                  <input name="promo_quote_priority" id="promo_quote_priority" class="form-control" tabindex="9"  type="text" maxlength="20" value="<?php echo $Promo_results['promo_quote_priority'];?>">
                  <br />
                  <div id="disp_url"></div>
                </div>-->
               <div  class="form-group">
                  <label>Public In RSS Feed:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="promo_quote_rssfeed" id="promo_quote_rssfeed" tabindex="2"  class="form-control">
                    <option value="Yes" <?php if($Promo_results["promo_quote_rssfeed"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                    <option value="No" <?php if($Promo_results["promo_quote_rssfeed"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="tab-pane" id="tab_br3">
              <h4 >New Rule</h4>
              <div  class="form-group">
                  <label>Apply:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="promo_quote_apply" id="promo_quote_apply" tabindex="2"  class="form-control">
                    <option value="Percent of product price discount" <?php if($Promo_results["promo_quote_apply"]=="Percent of product price discount")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Percent of product price discount</option>
                    <option value="Fixed amount discount" <?php if($Promo_results["promo_quote_apply"]=="Fixed amount discount")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Fixed amount discount</option>
          
                  </select>
                </div>
              
              <div  class="form-group">
                <label>Discount Amount:<span class="f_req">*</span></label>
                <input name="promo_quote_discount_amount"  id="promo_quote_discount_amount" class="form-control " type="text" value="<?php echo $Promo_results['promo_quote_discount_amount'];?>" tabindex="14" maxlength="50">
              </div>
              <div  class="form-group">
                <label>Maximum Qty Discount is Applied To:</label>
                <input name="promo_quote_maximum_amount"  id="promo_quote_maximum_amount" class="form-control " type="text" value="<?php echo $Promo_results['promo_quote_maximum_amount'];?>" tabindex="15" maxlength="50">
              </div>
              <!--<div  class="form-group">
                <label>Discount Qty Step (Buy X):</label>
                <input name="promo_quote_discount_qty"  id="promo_quote_discount_qty" class="form-control" type="text" value="<?php echo $Promo_results['promo_quote_discount_qty'];?>" tabindex="16" maxlength="50">
              </div>-->
           <!--<div  class="form-group">
                  <label>PApply to Shipping Amount:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="promo_quote_apply_shipping" id="promo_quote_apply_shipping" tabindex="2"  class="form-control">
                    <option value="No" <?php if($Promo_results["promo_quote_apply_shipping"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                    <option value="Yes" <?php if($Promo_results["promo_quote_apply_shipping"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                  </select>
                </div>-->
                <!--<div  class="form-group">
                  <label>Free Shipping:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="promo_quote_free_shipping" id="promo_quote_free_shipping" tabindex="2"  class="form-control">
                    <option value="No" <?php if($Promo_results["promo_quote_free_shipping"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                    <option value="For matching items only" <?php if($Promo_results["promo_quote_free_shipping"]=="For matching items only")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >For matching items only</option>
           <option value="For shipment with matching items" <?php if($Promo_results["promo_quote_free_shipping"]=="For shipment with matching items")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >For shipment with matching items</option>
                  </select>
                </div>-->
                <!--<div  class="form-group">
                  <label>Stop Further Rules Processing:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="promo_quote_processing" id="promo_quote_processing" tabindex="2"  class="form-control">
                    <option value="No" <?php if($Promo_results["promo_quote_processing"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                    <option value="Yes" <?php if($Promo_results["promo_quote_processing"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                  </select>
                </div>-->
            </div>
          
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
  <div class="sidebar" >
    <div class="sidebar_inner_scroll">
      <div class="sidebar_inner">
        <div id="side_accordion" class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading" id="toggle_tabs"> <a href="javascript:void(0)"  class="accordion-toggle "> &nbsp;Promo Quote Informations</a> </div>
            <div class="accordion-body " id="collapseOne">
              <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#tab_br1" data-toggle="tab">Rule Information</a></li>
                 <!-- <li><a href="#tab_br2" data-toggle="tab">Attributes</a></li>-->
                  <li><a href="#tab_br3" data-toggle="tab">Actions</a></li>
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="push"></div>
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
  <!--<script src="js/validation_editcontent.js"></script>-->
  <!-- editor -->
  <script src="lib/tiny_mce/jquery.tinymce.js"></script>
  <!-- file explorer functions -->
  <script src="js/gebo_explorer.js"></script>
  <script src="js/promo_validation.js"></script>
 
 
 
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
	<!--<script src="js/gebo_forms.js"></script>-->
 
 
 
 
 
  <script type="text/javascript" src="js/script.js"></script> 
  <script language="javascript" type="application/javascript">
   $(document).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script>
  <script src="lib/dynatree/dist/jquery.dynatree.min.js"></script>
  <script>
		
		$(document).ready(function() {
		//* basic
	
		//* server side proccessing with hiden row
	//	gebo_datatbles.dt_product();
        //* Table tools
		gebo_datatbles.dt_tools();	gebo_datatbles.tree_c();
	});
		gebo_datatbles = {
		dt_a: function() {
			$('#dt_a').dataTable({
                "sDom": "<'row'<'col-sm-6'<'dt_actions'>l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                }
            });
		},
        dt_b: function() {
			$('#dt_b').dataTable({
				"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "sScrollX": "100%",
                "sScrollXInner": '110%',
                "sPaginationType": "bootstrap",
                "bScrollCollapse": true 
            });
		},
		dt_c: function() {
                
            var aaData = [];
            for ( var i=1, len=1000 ; i<=len ; i++ ) {
                aaData.push( [ i, i, i, i, i ] );
            };
            
            $('#dt_c').dataTable({
				"sDom": "<'row'<'col-sm-6'><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'>S>",
                "sScrollY": "200px",
                "aaData": aaData,
                "bDeferRender": true
			});
            
            $('#fill_table').click(function(){
                var aaData = [];
                for ( var i=1, len=50000; i <= len; i++){
                    aaData.push( [ i, i, i, i, i ] );
                };
               
                $('#dt_c').dataTable({
                    "sDom": "<'row'<'col-sm-6'><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'>S>",
                    "sScrollY": "200px",
                    "aaData": aaData,
                    "bDestroy": true,
                    "bDeferRender": true
                });
                $(this).remove();
                $('#entries').html('50 000');
                $('.dataTables_scrollHeadInner').css({'height':'34px','top':'0'});
            });
            
		},
		dt_d: function() {
		
			function fnShowHide( iCol ) {
				/* Get the DataTables object again - this is not a recreation, just a get of the object */
				var oTable = $('#dt_d').dataTable();
				 
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			};
			
			var oTable = $('#dt_d').dataTable({
				"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
				"sPaginationType": "bootstrap"
			});
			
			$('#dt_d_nav').on('click','li input',function(){
				fnShowHide( $(this).val() );
			});
		},
		dt_product: function(){
			if($('#dt_product').length) {

				var oTable;
 
				/* Formating function for row details */
				function fnFormatDetails ( nTr )
				{
					var aData = oTable.fnGetData( nTr );
					var sOut = '<table cellpadding="5" cellspacing="0" border="0" class="table table-bordered" >';
					sOut += '<tr><td>Rendering engine:</td><td>'+aData[2]+' '+aData[5]+'</td></tr>';
					sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
					sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
					sOut += '</table>';
					 
					return sOut;
				}
				
				oTable = $('#dt_product').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
					"sAjaxSource": "promo_relate_ajax.php?id=<?php echo $id;?>",
					"aoColumns": [
						{ "sClass": "center", "bSortable": false },
						null,
						null,
						null,
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" }
					],
					"aaSorting": [[1, 'asc']]
				} );
				
                 
				$('#dt_product').on('click','tbody td img', function () {
					var nTr = $(this).parents('tr')[0];
					if ( oTable.fnIsOpen(nTr) )
					{
						/* This row is already open - close it */
						this.src = "img/details_open.png";
						oTable.fnClose( nTr );
					} else {
						/* Open this row */
						this.src = "img/details_close.png";
						oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
					}
				} );

			}
		},
        dt_tools: function() {
			if($('#dt_tools').length) {
                $('#dt_tools').dataTable({
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'col-sm-4'l><'col-sm-4 text-right'T><'col-sm-4'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    "oTableTools": {
                        "aButtons": [
                            "copy",
                            "print",
                            {
                                "sExtends":    "collection",
                                "sButtonText": 'Save <span class="caret" />',
                                "aButtons":    [ "csv", "xls", "pdf" ]
                            }
                        ],
                        "sSwfPath": "lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                    }
                });
            }
		}, tree_c: function() {
            $("#tree_c").dynatree({
                checkbox: true,
				
                selectMode: 1,
				
			<?php if($master_categories_id!="") { ?>	
				
			onPostInit: function(isReloading, isError) {
            var key = $("#master_categories_id").val();
            if( key ) {
                this.activateKey(key);
            }
        }, <?php } ?>
                onSelect: function(select, node) {
				//$(input[name="searchBar"]).val('hi');
				$("#master_categories_id").val(node.data.key);
                   // var s = node.tree.getSelectedNodes().join(" | ");
                   // $("#tree_c_echoSelection").children('pre').text(s);
                } 
            });

		}
	};
		</script>
  <style>
.f-nav {background:#FFFF33; height:45px !important; }
.y-nav { margin:5px 0px 3px 0px !important;}
</style>
  <script type="text/javascript" src="js/jquery.number.js"></script>
  <script type="text/javascript">
			
			$(function(){
				// Set up the number formatting.
				
			//	$('#number_container').slideDown('fast');
				
				/*$('#price').on('change',function(){
					console.log('Change event.');
					var val = $('#price').val();
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});*/
				
				//$('#price').change(function(){
				//	console.log('Second change event...');
				//});
				
				//$('#products_price').number( true, 2 );
				//$('#actual_price').number( true, 2 );
				//$('#oem_price').number( true, 2 );
				//$('#level3_price').number( true, 2 );
			
				
				
				// Get the value of the number for the demo.
				//$('#get_number').on('click',function(){
					
				//	var val = $('#price').val();
					
					//('#the_number').text( val !== '' ? val : '(empty)' );
				//});
			});
		</script>
  <script type="text/javascript">
  
  
  
  
  
      
        $("document").ready(function () {
		$('body').removeClass("sidebar_hidden");
            $(window).scroll(function () {
                if ($(this).scrollTop() > 60) {
                    $('.heading').addClass("navbar navbar-default navbar-fixed-top f-nav");
					  $('.move_upper').addClass("y-nav");
					
                } else {
                    $('.heading').removeClass("navbar navbar-default navbar-fixed-top f-nav");
					$('.move_upper').removeClass("y-nav");
					
                }
            });
        });
		
			$("#btnDeselectAll").click(function(){
			
			$("#tree_c").dynatree("getRoot").visit(function(node){
			  $('#master_categories_id').val("");
				node.select(false);
			});
			return false;
			
		});

		
    </script>
  <!--checksku  -->
  <script type="text/javascript">
$(document).ready(function(){
$("#promo_coupon_code").keyup(function() {
var promo_coupon_code = $('#promo_coupon_code').val();
if(promo_coupon_code=="")
{
$("#disp").html("");
}
else
{
$.ajax({
type: "POST",
url: "coupon_check.php",
data: "promo_coupon_code="+ promo_coupon_code ,
success: function(html){
$("#disp").html(html);
}
});
return false;
}
});
});
</script>
  <!--checkurl  -->
  <script type="text/javascript">
$(document).ready(function(){
$("#products_url").keyup(function() {
var products_url = $('#products_url').val();
if(products_url=="")
{
$("#disp_url").html("");
}
else
{
$.ajax({
type: "POST",
url: "check_url.php",
data: "cat_url="+ products_url ,
success: function(html){
$("#disp_url").html(html);
}
});
return false;
}
});
});
</script>
<script src="js/gebo_forms.js"></script>
</div>
</body></html>
