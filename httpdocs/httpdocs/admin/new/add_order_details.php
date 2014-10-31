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
$meta_title  =  "Order detail";

/*********************Blog SELECT**********************************************/
      $Order_tablename           =    ORDERDETAILS;
	  $FieldName                 =    'order_id';
	  $sororder                  =    'asc';
	  $Field_types               = array( 'id',
	                                      'coustomer_id',
										  'first_name',
										  'last_name',
										  'shipping_firstname',
										  'shipping_lastname',
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
$order_stat               = $_REQUEST['order_stat'];


$Field_types           = array('order_status'        => $order_stat
                               
                              );
						   
					//print_r($Field_types); die;	   
 $Message_admin      =  $Core_Mysql->insert_common_query('order_tbl',$Field_types);

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
$order_stat                  = $_REQUEST['order_stat'];



/***************************************//////*******************************************************/
$Product_tablename             =    'order_tbl';//table_name
$FieldName                     =  'id';
/*****************************************///////**************************************************//


$Field_types           = array('order_status'        => $order_stat
                               
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


 <?php $get_order_data_final ="SELECT * FROM order_tbl where  order_id = '".$_REQUEST['id']."' ";		
 	$run_get_order_final =mysql_query($get_order_data_final);
		
		$Order_results =mysql_fetch_array($run_get_order_final);
		
		 $get_user= "SELECT first_name,last_name FROM user_details WHERE id=".$Order_results['customer_id'];	
		  $get_result =mysql_query( $get_user);	
		  $user_name_order = mysql_fetch_array( $get_result);
		
		
		?>

<div class="row">
	<div class="col-sm-4 col-md-4">
		<p class="sepH_a"><span class="sepV_b text-muted">Order Id.</span><strong><?php echo $Order_results["order_id"];?></strong></p>
		<p class="sepH_a"><span class="sepV_b text-muted">Name</span><strong><?php echo $user_name_order["first_name"].'&nbsp;'.$user_name_order["last_name"]  ;?></strong></p>
		<p><span class="sepV_b text-muted">Payment On</span><strong><?php echo $Order_results["order_created"];?></strong></p>
        <p><span class="sepV_b text-muted">Transaction ID : </span><strong><?php echo $Order_results["transaction_id"];?></strong></p>
        <p><span class="sepV_b text-muted">Authorization Code :&nbsp; </span><strong><?php echo $Order_results["auth_code"];?></strong></p>
	</div>
	
</div>

<?php  $order_id = $_REQUEST['id'];
$order_send.='
<style>
.header {
	background: #2089B4;
	border-bottom: 1px solid #FFFFFF;
	border-left: 1px solid #FFFFFF;
	border-right: 1px solid #FFFFFF;
	border-top:1px solid #FFFFFF;
	color: #FFFFFF;
	font-weight: normal;
}
</style>
<table style="margin-top:5px;" align="center" cellpadding="2" cellspacing="2" width="100%" border="0">

  <tr>
    <td colspan="2"><table width="100%" border="0">
        <tr>
          <td class="header" align="center">Sl. No.</td>
          <td class="header" align="center">Product Name</td>
       
          <td class="header" align="center">Price</td>
          <td class="header" align="center">Quantity</td>
          <td class="header" align="center">Total Amount</td>
        </tr>'; 
        
        
         $qrychk1="select * from order_details where order_id='$order_id'";
        $qrychkexe1=mysql_query($qrychk1);
        $cnt=mysql_num_rows($qrychkexe1);
        $i=1;
        while($nt11=mysql_fetch_array($qrychkexe1))
        {
        $query11 = "select * from `products_description` where products_id='$nt11[product_id]'";
        $exQuery11 = mysql_query($query11);
        while($nt12=mysql_fetch_array($exQuery11))
        {	$prod_name=$nt12['products_name'];	
		} 
         $query22 = "select * from `products` where products_id='$nt11[product_id]'";
        $exQuery22 = mysql_query($query22);
        while($nt22=mysql_fetch_array($exQuery22))
        {	$prod_model=$nt22['products_model'];	
        $tempweight=$nt22['products_weight'];
        $products_price=$nt11['product_price'];
		$prod_name=$nt22['products_name'];	
        } 
        
        $total=$nt11['product_quantity']*$nt11['product_price'];
        $weight=$weight+$tempweight;
        $gtotal=$gtotal+$total;
        $order_send.='
        <tr>
          <td width="5%" style="padding:0 0 0 26px;">'.$i.'</td>
          <td width="30%" style="padding:0 0 0 10px;">'.$prod_name.'</td>
        
          <td width="10%" style="padding:0 0 0 26px;">$
            '.$products_price.'</td>
          <td width="10%" style="padding:0 0 0 50px;">'.$nt11['product_quantity'].'</td>
          <td width="10%" style="padding:0 0 0 26px;">$
            '.number_format($total,2,'.','').'</td>
          ';
          $i++;
          
          } 
          $order_send.='
        <tr>
          <td><br /></td>
        </tr>
        <tr>
          <td colspan="4" style="font-weight:bold" align="right">Grand Total:</td>
          <td style="font-weight:bold; padding:0 0 0 26px;">$
            '.number_format($gtotal,2,'.','').'</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><br /></td>
  </tr>
  <tr height="200px">
    <td width="50%"><table width="70%" style="margin:0 0 35px 0;">
        ';
        
         $qrychk11="select * from order_tbl where order_id='$order_id'";
        $qrychkexe111=mysql_query($qrychk11);
        $nt111=mysql_fetch_assoc($qrychkexe111);			
        
        $order_send.='
        <tr>
          <td class="header" colspan="2" align="center">Billing Details</td>
        </tr>
        
        <tr>
          <td class="header">Shipping Amount</td>
          <td>$
            '.$nt111['shipping_amt'].'</td>
        </tr>
        <tr>
          <td class="header">Tax Amount</td>
          <td>$
            '.$nt111['tax_amt'].'</td>
        </tr><tr>
          <td class="header">Total Amount</td>
          <td>$'.$nt111['billing_amt'].'</td>
        </tr>
        
      </table></td>
    <td><table width="70%" style="padding-top:25px">
        ';
        
         $qrychk11="select * from order_shipping where order_id='$order_id'";
        $qrychkexe111=mysql_query($qrychk11);
        $nt111=mysql_fetch_assoc($qrychkexe111);
        $qrychk12="select * from us_states where state_id='$nt111[shipping_state]'";
        $qrychkexe112=mysql_query($qrychk12);
        $nt112=mysql_fetch_assoc($qrychkexe112);
        $state=$nt112['state_name'];			
        
        $order_send.='
        <tr>
          <td class="header" colspan="2" align="center">Shipping Address</td>
        </tr>
        <tr>
          <td class="header" width="30%">Name</td>
          <td>'.$nt111["shipping_firstname"].'&nbsp;'.$nt111["shipping_lastname"].'</td>
        </tr>
        <tr>
          <td class="header">Address</td>
          <td>'.$nt111['shipping_address'].'</td>
        </tr>
        <tr>
          <td class="header">City</td>
          <td>'.$nt111['shipping_city'].'</td>
        </tr>
        <tr>
          <td class="header">State</td>
          <td>'.$state.'</td>
        </tr>
        <tr>
          <td class="header">Country</td>
          <td>'.$nt111['shipping_country'].'</td>
        </tr>
        <tr>
          <td class="header">Zip Code</td>
          <td>'.$nt111['shipping_zip'].'</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

';

echo $order_send; ?>
<form class="form_validation_blog" method="post" enctype="multipart/form-data">
<input  type="hidden" name="id" value="<?php echo $Order_results["id"];?>" id="id" >
<!--<table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
            <tr>
					
				
                    <th>Order Id</th>
					<th>Shipping Address</th>
					<th>Order price</th> 
                    <th>Total Amount</th>
                     <th>Billing Amount</th>
					
                   
				</tr>
   
</thead>
<tbody>
         
                <tr>
					
                    <td><?php echo $Order_results["order_id"];?></td>
					<td><?php echo $Order_results["shipping_address"];?></td>
				    <td><?php echo $Order_results["product_price"];?></td>
                    <td><?php echo $Order_results["total_amount"];?></td>
                    <td><?php echo $Order_results["billing_amount"];?></td>
				</tr>
    </tbody>       
 </table>-->
 
 
<table class="table table-striped table-bordered dTableR" id="dt_a">
 
 
 
                
            <tr><td colspan="2">Order Status:
            
             <select name="order_stat" id="order_stat" onChange="return sub_type(this.value);"  tabindex="6" >
                   
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
            </table>
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
