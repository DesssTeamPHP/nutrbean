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
$meta_title  =  "Add Product-Page";
error_reporting(0);
/*********************Blog SELECT**********************************************/
 $Order_tablename                =    ORDERDETAILS;
	  $FieldName                 =    'id';
	  $sororder                  =    'asc';
	  $Field_types               = array( 'id',
	                                      'coustomer_id',
	                                      'product_id',      
                                          'php_session_id',
										  'shipping_address', 
										  'shipping_city',
										  'shipping_state',
										  'shipping_country',
										  'product_quantity',
										  'product_price',
										  'total_amount',
										  'billing_amount',
										  'deliver_date',
										  'oredered_date',
										  'payment_method',
										  'deliver_status',
										  'paypal_ipn_id',
										  'ip_address',
										  'order_id',
										  'shipping_provider',
										  'shipping_method',
										  'shipping_amount',
										  'shipping_zip',
										  'tax_amount',
										  'payment_amount',
										  'tax_id',
										  'auth_code',
										  'order_status',
										  'payment_status'
						                 );
                            
	  $Order_select            =    $Core_Mysql->select_common_query($Order_tablename,$FieldName,$Field_types,$sororder);
	  $Order_execute           =    $Core_Mysql->db_query($Order_select);
	  $Order_results         =    $Core_Mysql->db_fetch_array($Order_execute);
	  $Order_num_Records       =    $Core_Mysql->get_num_record($Order_execute);

/******************************============END==============************************/

 $Order_tablename             =    ORDERDETAILS;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$order_status               = $_REQUEST['order_status'];





$Field_types           = array('order_status'        => $order_status
                               
                              );
						   
					//print_r($Field_types); die;	   
 $Message_admin      =  $Core_Mysql->insert_common_query($Product_tablename,$Field_types);

        if($Message_admin != 0)
           {
			   
			   $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:order_details.php?".$send_val);
			 
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
$order_status                = $_REQUEST['order_status'];



/***************************************//////*******************************************************/
$Product_tablename             =    ORDERDETAILS;//table_name
$FieldName                     =  'id';
/*****************************************///////**************************************************//


$Field_types           = array('order_status'        => $order_status
                               
                              );
						  //print_r($Field_types);die;
 $Message_admin      =  $Core_Mysql->update_common_query($Product_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 {
	echo mysql_error(); 
 }
        if($Message_admin != 0)
           {
			   
			   $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:order_details.php?".$send_val); 
			   
			   
			 
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: order_details.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
    <?php require 'common/admin-top-header.php';?>
    
		
		
		<div id="maincontainer" class="clearfix">
			<?php require 'common/admin-header.php';?>
        

            <div id="contentwrapper">
                <div class="main_content">
         <div class="row">
    <div class="col-sm-8 col-md-8">
		<h1 class="invoice_heading">Order Details</h1>
	</div>
	
</div>

<div class="row">
	<div class="col-sm-4 col-md-4">
		<p class="sepH_a"><span class="sepV_b text-muted">Order Id.</span><strong><?php echo $Order_results["order_id"];?></strong></p>
		<p class="sepH_a"><span class="sepV_b text-muted">Name</span><strong><?=$name?></strong></p>
		<p><span class="sepV_b text-muted">Payment Due</span><strong>24/11/2012</strong></p>
	</div>
	
</div>
<form class="form_validation_blog" method="post" enctype="multipart/form-data">

<table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
            <tr>
					
					<th>id</th>
                    <th>Order Id</th>
					<th>Shipping Address</th>
					<th>Order price</th> 
                    <th>Total Amount</th>
                     <th>Billing Amount</th>
					
                   
				</tr>
   
</thead>
<tbody>
         
                <tr>
					<td><?php echo $i;?></td>
                    <td><?php echo $Order_results["order_id"];?></td>
					<td><?php echo $Order_results["shipping_address"];?></td>
				    <td><?php echo $Order_results["product_price"];?></td>
                    <td><?php echo $Order_results["total_amount"];?></td>
                    <td><?php echo $Order_results["billing_amount"];?></td>
				</tr>
    </tbody>       
 </table>
 <tr>
                
            <tr><td colspan="2">Order Status:
            
             <select name="order_status" id="order_status" onchange="return sub_type(this.value);"  tabindex="6" >
                   
                    <option value="Open" <?php if($Order_results["order_status"]=="Open")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Open</option>
                    <option value="Received" <?php if($Order_results["order_status"]=="Received")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Received</option>
                    <option value="Sent to Warehouse" <?php if($Order_results["order_status"]=="Sent to Warehouse")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Sent to Warehouse</option>
                    <option value="Packing in Process" <?php if($Order_results["order_status"]=="Packing in Process")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Packing in Process</option>
           <option value="Packaged Shipped to Carrier" <?php if($Order_results["order_status"]=="Packaged Shipped to Carrier")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Packaged Shipped to Carrier</option>
           <option value="Packing in Process" <?php if($Order_results["order_status"]=="Packing in Process")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Packing in Process</option>
           <option value="in Transit" <?php if($Order_results["order_status"]=="in Transit")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >in Transit</option>
             <option value="Delivered To Customer" <?php if($Order_results["order_status"]=="Delivered To Customer")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Delivered To Customer</option>
                  </select>
            
            
            
            
            
            
           </td>
            </tr>
            <div class="form-actions">
          <?php if(isset($_REQUEST['id']) != '')
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

	

	  
</div>
					</body>
				</html>
