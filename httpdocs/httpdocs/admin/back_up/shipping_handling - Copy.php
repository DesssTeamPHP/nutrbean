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

      $Shipping_tablename                     =     shipping_methed_tbl;
	  $fieldname_one                          =    'shipping_id';
	  $fieldname_one_value                    =    $_REQUEST['id'];
	  $Shipping_select                        =    $Core_Mysql->select_one_where($Shipping_tablename,$fieldname_one,$fieldname_one_value);
	  $Shipping_execute                       =    $Core_Mysql->db_query($Shipping_select);
	  $Shipping_results                       =    $Core_Mysql->db_fetch_array($Shipping_execute);
	  $Shipping_num_Records                   =    $Core_Mysql->get_num_record($Shipping_execute);

/******************************============END==============************************/

$Shipping_tablename                     =    shipping_methed_tbl;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
//$customer_id                                = $_REQUEST['customer_id'];
$flate_shipp_enab 		                    = $_REQUEST['flate_shipp_enab'];
$flate_handling_name                        = $_REQUEST['flate_handling_name'];
$flate_handling_method	                    = $_REQUEST['flate_handling_method'];
$flate_handling_type 	                    = $_REQUEST['flate_handling_type']; 	
$flate_handling_charges 	                = $_REQUEST['flate_handling_charges'];
$flate_handling_cal 	                    = $_REQUEST['flate_handling_cal'];

$free_shipp_enab 		                    = $_REQUEST['free_shipp_enab'];
$free_shipp_title                           = $_REQUEST['free_shipp_title'];
$free_shipp_method	                        = $_REQUEST['free_shipp_method'];
$free_order_amt 	                        = $_REQUEST['free_order_amt']; 	
$free_sort_order 	                        = $_REQUEST['free_sort_order'];

$rate_enab 	                                = $_REQUEST['rate_enab'];
$rate_title 		                        = $_REQUEST['rate_title'];
$rate_method                                = $_REQUEST['rate_method'];
$rate_condi	                                = $_REQUEST['rate_condi'];
$rate_calc 	                                = $_REQUEST['rate_calc']; 	
$rate_calc_handl 	                        = $_REQUEST['rate_calc_handl'];
$rate_handl_free 	                        = $_REQUEST['rate_handl_free'];
$rate_sort_order 		                    = $_REQUEST['rate_sort_order'];

$ups_enab                                   = $_REQUEST['ups_enab'];
$ups_type	                                = $_REQUEST['ups_type'];
$ups_title 	                                = $_REQUEST['ups_title']; 	
$ups_url 	                                = $_REQUEST['ups_url'];
$ups_package 	                            = $_REQUEST['ups_package'];
$ups_container 	                            = $_REQUEST['ups_container'];
$ups_desti 		                            = $_REQUEST['ups_desti'];
$ups_weight 	                            = $_REQUEST['ups_weight'];
$ups_pick_metho 	                        = $_REQUEST['ups_pick_metho'];
$ups_max_weight 		                    = $_REQUEST['ups_max_weight'];
$ups_sort_order 		                    = $_REQUEST['ups_sort_order'];


$Field_types           = array('flate_shipp_enab'                   => $flate_shipp_enab,
							   'flate_handling_name'                => $flate_handling_name,
							   'flate_handling_method'              => $flate_handling_method,
							   'flate_handling_type'                => $flate_handling_type,
							   'flate_handling_charges'             => $flate_handling_charges,
							   'flate_handling_cal'                 => $flate_handling_cal,
							   
							   'free_shipp_enab'                    => $free_shipp_enab,
                               'free_shipp_title'                   => $free_shipp_title,
							   'free_shipp_method'                  => $free_shipp_method,
							   'free_order_amt'                     => $free_order_amt,
							   'free_sort_order'                    => $free_sort_order,
							 
							   'rate_enab'                          => $rate_enab,
                               'rate_title'                         => $rate_title,
							   'rate_method'                        => $rate_method,
							   'rate_condi'                         => $rate_condi,
							   'rate_calc'                          => $rate_calc,
							   'rate_calc_handl'                    => $rate_calc_handl,
							   'rate_handl_free'                    => $rate_handl_free,
							   'rate_sort_order'                    => $rate_sort_order,
							   
							   'ups_enab'                           => $ups_enab,
                               'ups_type'                           => $ups_type,
							   'ups_title'                          => $ups_title,
							   'ups_url'                            => $ups_url,
							   'ups_package'                        => $ups_package,
							   'ups_container'                      => $ups_container,
							   'ups_desti'                          => $ups_desti,
							   'ups_weight'                         => $ups_weight,
							    'ups_pick_metho'                    => $ups_pick_metho,
							   'ups_max_weight'                     => $ups_max_weight,
							   'ups_sort_order'                     => $ups_sort_order
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
$id                                         = $_REQUEST['id'];
$customer_id                                = $_REQUEST['customer_id'];
$flate_shipp_enab 		                    = $_REQUEST['flate_shipp_enab'];
$flate_handling_name                        = $_REQUEST['flate_handling_name'];
$flate_handling_method	                    = $_REQUEST['flate_handling_method'];
$flate_handling_type 	                    = $_REQUEST['flate_handling_type']; 	
$flate_handling_charges 	                = $_REQUEST['flate_handling_charges'];
$flate_handling_cal 	                    = $_REQUEST['flate_handling_cal'];

$free_shipp_enab 		                    = $_REQUEST['free_shipp_enab'];
$free_shipp_title                           = $_REQUEST['free_shipp_title'];
$free_shipp_method	                        = $_REQUEST['free_shipp_method'];
$free_order_amt 	                        = $_REQUEST['free_order_amt']; 	
$free_sort_order 	                        = $_REQUEST['free_sort_order'];

$rate_enab 	                                = $_REQUEST['rate_enab'];
$rate_title 		                        = $_REQUEST['rate_title'];
$rate_method                                = $_REQUEST['rate_method'];
$rate_condi	                                = $_REQUEST['rate_condi'];
$rate_calc 	                                = $_REQUEST['rate_calc']; 	
$rate_calc_handl 	                        = $_REQUEST['rate_calc_handl'];
$rate_handl_free 	                        = $_REQUEST['rate_handl_free'];
$rate_sort_order 		                    = $_REQUEST['rate_sort_order'];

$ups_enab                                   = $_REQUEST['ups_enab'];
$ups_type	                                = $_REQUEST['ups_type'];
$ups_title 	                                = $_REQUEST['ups_title']; 	
$ups_url 	                                = $_REQUEST['ups_url'];
$ups_package 	                            = $_REQUEST['ups_package'];
$ups_container 	                            = $_REQUEST['ups_container'];
$ups_desti 		                            = $_REQUEST['ups_desti'];
$ups_weight 	                            = $_REQUEST['ups_weight'];
$ups_pick_metho 	                        = $_REQUEST['ups_pick_metho'];
$ups_max_weight 		                    = $_REQUEST['ups_max_weight'];
$ups_sort_order 		                    = $_REQUEST['ups_sort_order'];


/***************************************//////*******************************************************/
$Shipping_tablename                     =    shipping_methed_tbl;//table_name
$FieldName                              =  'shipping_id';
/*****************************************///////**************************************************//


$Field_types           = array('customer_id'                        => $customer_id,
                               'flate_shipp_enab'                   => $flate_shipp_enab,
							   'flate_handling_name'                => $flate_handling_name,
							   'flate_handling_method'              => $flate_handling_method,
							   'flate_handling_type'                => $flate_handling_type,
							   'flate_handling_charges'             => $flate_handling_charges,
							   'flate_handling_cal'                 => $flate_handling_cal,
							   
							   'free_shipp_enab'                    => $free_shipp_enab,
                               'free_shipp_title'                   => $free_shipp_title,
							   'free_shipp_method'                  => $free_shipp_method,
							   'free_order_amt'                     => $free_order_amt,
							   'free_sort_order'                    => $free_sort_order,
							 
							   'rate_enab'                          => $rate_enab,
                               'rate_title'                         => $rate_title,
							   'rate_method'                        => $rate_method,
							   'rate_condi'                         => $rate_condi,
							   'rate_calc'                          => $rate_calc,
							   'rate_calc_handl'                    => $rate_calc_handl,
							   'rate_handl_free'                    => $rate_handl_free,
							   'rate_sort_order'                    => $rate_sort_order,
							   
							   'ups_enab'                           => $ups_enab,
                               'ups_type'                           => $ups_type,
							   'ups_title'                          => $ups_title,
							   'ups_url'                            => $ups_url,
							   'ups_package'                        => $ups_package,
							   'ups_container'                      => $ups_container,
							   'ups_desti'                          => $ups_desti,
							   'ups_weight'                         => $ups_weight,
							    'ups_pick_metho'                    => $ups_pick_metho,
							   'ups_max_weight'                     => $ups_max_weight,
							   'ups_sort_order'                     => $ups_sort_order
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
.panel-default {
	width:206% !important;
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
        <form class="form_validation_blog" method="post" enctype="multipart/form-data">
          <div class="col-sm-6 col-md-6">
            <h3 style="width:206%" class="heading">Shipping Methods
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
          <input type="button" class="btn btn-primary" name="Close" value="Cancel"  onClick="rewrite_goBack('shipping_details.php');">
        </div>
            
            
            </h3>
            <div id="accordion1" class="panel-group accordion">
              <div class="panel panel-default">
                <div class="panel-heading"> <a href="#collapseOne" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed"> Flate rate </a> </div>
                <div class="panel-collapse collapse" id="collapseOne">
                  <div class="panel-body">
                    
                      <label>Enabled:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="flate_shipp_enab" id="flate_shipp_enab" tabindex="8"  class="form-control">
                        <option value="Yes" <?php if($Shipping_results["flate_shipp_enab"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                        <option value="No" <?php if($Shipping_results["flate_shipp_enab"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                      </select>
                      </br>
                      <label>Title :<span class="f_req">*</span></label>
                      <input name="flate_handling_name"  id="flate_handling_name" class="form-control" type="text" value="<?php echo $Shipping_results['flate_handling_name'];?>">
                      </br>
                      <label>Method Name:<span class="f_req">*</span></label>
                      <input name="flate_handling_method"  id="flate_handling_method" class="form-control" type="text" value="<?php echo $Shipping_results['flate_handling_method'];?>">
                      </br>
                      <label>Type:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="flate_handling_type" id="flate_handling_type" tabindex="8"  class="form-control">
                        <option value="None" <?php if($Shipping_results["flate_handling_type"]=="None")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >None</option>
                        <option value="Per Order" <?php if($Shipping_results["flate_handling_type"]=="Per Order")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Per Order</option>
                        <option value="Per Item" <?php if($Shipping_results["flate_handling_type"]=="Per Item")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Per Item</option>
                      </select>
                      </br>
                      <label>Price:<span class="f_req">*</span></label>
                      <input name="flate_handling_charges"  id="flate_handling_charges" class="form-control" type="text"  value="<?php echo $Shipping_results['flate_handling_charges'];?>">
                      </br>
                      <label>Calculate Handling Fee:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="flate_handling_cal" id="flate_handling_cal" tabindex="8"  class="form-control">
                        <option value="Fixed" <?php if($Shipping_results["flate_handling_cal"]=="Fixed")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Fixed</option>
                        <option value="Percent" <?php if($Shipping_results["flate_handling_cal"]=="Percent")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Percent</option>
                      </select>
                      </br>
                      
                    
                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading"> <a href="#collapseTwo" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed"> Free Shipping </a> </div>
                <div class="panel-collapse collapse" id="collapseTwo">
                  <div class="panel-body">
                   
                      <label>Enabled:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="free_shipp_enab" id="free_shipp_enab" tabindex="8"  class="form-control">
                        <option value="Yes" <?php if($Shipping_results["free_shipp_enab"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                        <option value="No" <?php if($Shipping_results["free_shipp_enab"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                      </select>
                      </br>
                      <label>Title:<span class="f_req">*</span></label>
                      <input name="free_shipp_title"  id="free_shipp_title" class="form-control" type="text" value="<?php echo $Shipping_results['free_shipp_title'];?>">
                      </br>
                      <label>Method Name:<span class="f_req">*</span></label>
                      <input name="free_shipp_method"  id="free_shipp_method" class="form-control" type="text" value="<?php echo $Shipping_results['free_shipp_method'];?>">
                      </br>
                      <label>Minimum Order Amount:<span class="f_req">*</span></label>
                      <input name="free_order_amt"  id="free_order_amt" class="form-control" type="text"  value="<?php echo $Shipping_results['free_order_amt'];?>">
                      </br>
                      <label>Sort Order:<span class="f_req">*</span></label>
                      <input name="free_sort_order"  id="free_sort_order" class="form-control" type="text"  value="<?php echo $Shipping_results['free_sort_order'];?>">
                      </br>
                      
                   
                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading"> <a href="#collapseThree" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle"> Table Rate </a> </div>
                <div class="panel-collapse collapse" id="collapseThree">
                  <div class="panel-body">
                   
                      <label>Enabled:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="rate_enab" id="rate_enab" tabindex="8"  class="form-control">
                        <option value="Yes" <?php if($Shipping_results["rate_enab"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                        <option value="No" <?php if($Shipping_results["rate_enab"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                      </select>
                      </br>
                      <label>Title:<span class="f_req">*</span></label>
                      <input name="rate_title"  id="rate_title" class="form-control" type="text" value="<?php echo $Shipping_results['rate_title'];?>">
                      </br>
                      <label>Method Name:<span class="f_req">*</span></label>
                      <input name="rate_method"  id="rate_method" class="form-control" type="text" value="<?php echo $Shipping_results['rate_method'];?>">
                      </br>
                      <label>Condition:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="rate_condi" id="rate_condi" tabindex="8"  class="form-control">
                        <option value="Weight vs. Destination" <?php if($Shipping_results["rate_condi"]=="Weight vs. Destination")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Weight vs. Destination</option>
                        <option value="Price vs. Destination" <?php if($Shipping_results["rate_condi"]=="Price vs. Destination")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Price vs. Destination</option>
                        <option value="# of Items vs. Destination" <?php if($Shipping_results["rate_condi"]=="# of Items vs. Destination")
		   {
		   echo 'selected="selected"';
		   }
		   ?> ># of Items vs. Destination</option>
                      </select>
                      </br>
                      <label>Include Virtual Products in Price Calculation:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="rate_calc" id="rate_calc" tabindex="8"  class="form-control">
                        <option value="Yes" <?php if($Shipping_results["rate_calc"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                        <option value="No" <?php if($Shipping_results["rate_calc"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                      </select>
                      </br>
                      <label>Calculate Handling Fee:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="rate_calc_handl" id="rate_calc_handl" tabindex="8"  class="form-control">
                        <option value="Fixed" <?php if($Shipping_results["rate_calc_handl"]=="Fixed")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Fixed</option>
                        <option value="Percent" <?php if($Shipping_results["rate_calc_handl"]=="Percent")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Percent</option>
                      </select>
                      </br>
                      <label>Handling Fee:<span class="f_req">*</span></label>
                      <input name="rate_handl_free"  id="rate_handl_free" class="form-control" type="text"  value="<?php echo $Shipping_results['rate_handl_free'];?>">
                      </br>
                      <label>Sort Order:<span class="f_req">*</span></label>
                      <input name="rate_sort_order"  id="rate_sort_order" class="form-control" type="text"  value="<?php echo $Shipping_results['rate_sort_order'];?>">
                      </br>
                      
                    
                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading"> <a href="#collapseFour" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle"> UPS </a> </div>
                <div class="panel-collapse collapse" id="collapseFour">
                  <div class="panel-body">
                   
                      <label>Enabled for Checkout:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="ups_enab" id="ups_enab" tabindex="8"  class="form-control">
                        <option value="Yes" <?php if($Shipping_results["ups_enab"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                        <option value="No" <?php if($Shipping_results["ups_enab"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                      </select>
                      </br>
                      <label>UPS Type:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="ups_type" id="ups_type" tabindex="8"  class="form-control">
                        <option value="United Parcel Service" <?php if($Shipping_results["ups_type"]=="United Parcel Service")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >United Parcel Service</option>
                        <option value="United Parcel Service XML" <?php if($Shipping_results["ups_type"]=="United Parcel Service XML")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >United Parcel Service XML</option>
                      </select>
                      </br>
                      <label>Title:<span class="f_req">*</span></label>
                      <input name="ups_title"  id="ups_title" class="form-control" type="text" value="<?php echo $Shipping_results['ups_title'];?>">
                      </br>
                      <label>Gateway URL:<span class="f_req">*</span></label>
                      <input name="ups_url"  id="ups_url" class="form-control" type="text" value="<?php echo $Shipping_results['ups_url'];?>">
                      </br>
                      <label>Packages Request Type:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="ups_package" id="ups_package" tabindex="8"  class="form-control">
                        <option value="Divide to equal weight (one request)" <?php if($Shipping_results["ups_package"]=="Divide to equal weight (one request)")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Divide to equal weight (one request)</option>
                        <option value="Use origin weight (few requests)" <?php if($Shipping_results["ups_package"]=="Use origin weight (few requests)")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Use origin weight (few requests)</option>
                      </select>
                      </br>
                      <label>Container:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="ups_container" id="ups_container" tabindex="8"  class="form-control">
                        <option value="Customer Packaging" <?php if($Shipping_results["ups_container"]=="Customer Packaging")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Customer Packaging</option>
                        <option value="UPS Letter Envelope" <?php if($Shipping_results["ups_container"]=="UPS Letter Envelope")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >UPS Letter Envelope</option>
                        <option value="Customer Supplied Package" <?php if($Shipping_results["ups_container"]=="Customer Supplied Package")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Customer Supplied Package</option>
                        <option value="UPS Tube" <?php if($Shipping_results["ups_container"]=="UPS Tube")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >UPS Tube</option>
                        <option value="PAK" <?php if($Shipping_results["ups_container"]=="PAK")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >PAK</option>
                        <option value="UPS Express Box" <?php if($Shipping_results["ups_container"]=="UPS Express Box")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >UPS Express Box</option>
                        <option value="UPS Worldwide 25 kilo" <?php if($Shipping_results["ups_container"]=="UPS Worldwide 25 kilo")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >UPS Worldwide 25 kilo</option>
                        <option value="UPS Worldwide 10 kilo" <?php if($Shipping_results["ups_container"]=="UPS Worldwide 10 kilo")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >UPS Worldwide 10 kilo</option>
                        <option value="Pallet" <?php if($Shipping_results["ups_container"]=="Pallet")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Pallet</option>
                        <option value="Small Express Box" <?php if($Shipping_results["ups_container"]=="Small Express Box")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Small Express Box</option>
                        <option value="Medium Express Box" <?php if($Shipping_results["ups_container"]=="Medium Express Box")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Medium Express Box</option>
                        <option value="Large Express Box" <?php if($Shipping_results["ups_container"]=="Large Express Box")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Large Express Box</option>
                      </select>
                      </br>
                      <label>Destination Type:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="ups_desti" id="ups_desti" tabindex="8"  class="form-control">
                        <option value="Residential" <?php if($Shipping_results["ups_desti"]=="Residential")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Residential</option>
                        <option value="Commercial" <?php if($Shipping_results["ups_desti"]=="Commercial")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Commercial</option>
                      </select>
                      </br>
                      <label>Weight Unit:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="ups_weight" id="ups_weight" tabindex="8"  class="form-control">
                        <option value="LBS" <?php if($Shipping_results["ups_weight"]=="LBS")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >LBS</option>
                        <option value="KGS" <?php if($Shipping_results["ups_weight"]=="KGS")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >KGS</option>
                      </select>
                      </br>
                      <label>Pickup Method:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="ups_pick_metho" id="ups_pick_metho" tabindex="8"  class="form-control">
                        <option value="Regular Daily Pickup" <?php if($Shipping_results["ups_pick_metho"]=="Regular Daily Pickup")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Regular Daily Pickup</option>
                        <option value="On Call Air" <?php if($Shipping_results["ups_pick_metho"]=="On Call Air")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >On Call Air</option>
                        <option value="One Time Pickup" <?php if($Shipping_results["ups_pick_metho"]=="One Time Pickup")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >One Time Pickup</option>
                        <option value="Letter Center" <?php if($Shipping_results["ups_pick_metho"]=="Letter Center")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Letter Center</option>
                        <option value="Customer Counter" <?php if($Shipping_results["ups_pick_metho"]=="Customer Counter")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Customer Counter</option>
                      </select>
                      </br>
                      <label>Maximum Package Weight (Please consult your shipping carrier for maximum supported shipping weight):<span class="f_req">*</span></label>
                      <input name="ups_max_weight"  id="ups_max_weight" class="form-control" type="text"  value="<?php echo $Shipping_results['ups_max_weight'];?>">
                      </br>
                      <label>Calculate Handling Fee:</label>
                      <p><span class="label label-default"></span></p>
                      <select name="ups_cal_free" id="ups_cal_free" tabindex="8"  class="form-control">
                        <option value="Fixed" <?php if($Shipping_results["ups_cal_free"]=="Fixed")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Fixed</option>
                        <option value="Percent" <?php if($Shipping_results["ups_cal_free"]=="Percent")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Percent</option>
                      </select>
                      </br>
                      <label>Sort Order:<span class="f_req">*</span></label>
                      <input name="ups_sort_order"  id="ups_sort_order" class="form-control" type="text"  value="<?php echo $Shipping_results['ups_sort_order'];?>">
                      </br>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar"> </div>
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