<?php 

/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 02/25/2014 
  * Last Date: 02/25/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');

$meta_title  =  "My Order - Administrator";
/*********************Blog**********************************************/
	//For Selecting Query
	  $Order_tablename         =    ORDERDETAILS;
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
	  $Order_num_Records       =    $Core_Mysql->get_num_record($Order_execute);
	
////////////////////////////////////////=========END=============//////////////////

/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
		
		
	  $Order_tablename                  =    ORDERDETAILS;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['del_id'];
	  $Order_delete                     =    $Core_Mysql->delete_common_query($Order_tablename,$fieldname_one,$fieldname_one_value);
	  $Order_execute                    =    $Core_Mysql->db_query($Order_delete);
	  
	  
	  
	  $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:order_details.php?".$send_val);
	  
	 
		
	}
///////////////////////////////////////========END========////////////////////////

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
          <h3 class="heading">Order</h3>
           <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(ORDERDETAILS_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(ORDERDETAILS_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(ORDERDETAILS_DEL));			  
		  }
		  
		  
		  
         
          /*********************GROUP SELECT**********************************************/

      $group_tablename_per                   =    GROUP;
	  $fieldname_one                         =    'admin_groupid';
	 $fieldname_one_value                    =    $user_results_head['groupid'];
	  $group_select_per                      =    $Core_Mysql->select_one_where($group_tablename_per,$fieldname_one,$fieldname_one_value);
	  $group_execute_per                     =    $Core_Mysql->db_query($group_select_per);
	  $Group_results_per                     =    $Core_Mysql->db_fetch_array($group_execute_per);
	  $groupnum_Records                      =    $Core_Mysql->get_num_record($group_execute_per);

/******************************============END==============************************/
         
      if($Group_results_per['admin_add']=='1')
		 {
		 ?>    
         
         
         
         
      <!--   <div style="text-align:right !important"><a href="add_order_details.php" ><i class="splashy-add"></i> Add order</a></div>-->
      <?php }
	  ?>
         <table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
            <tr>
					
					<th>id</th>
                      <th>Date</th>
                    <th>Order Id</th>
					<th>Name</th>
					<!--<th>Shipping Name</th>
                    <th>Order price</th> -->
                    <th>total Amount</th>
                   <!--  <th>Billing Amount</th>-->
					<!--<th>Date</th>-->
                     <th>Order Status</th>
                    <?php            
		 if($Group_results_per['admin_edit']=='1' || $Group_results_per['admin_delete']=='1')
		 {
		 ?>
                    <th style="width: 112px;">Action</th>
                   <?php } ?>
				</tr>
   
</thead>
<tbody>
   	<?php
                $i=1;
				
				
				
				$get_order_latest ="SELECT order_status,order_id,first_name,order_id,DATE(oredered_date) AS date, SUM(total_amount) AS billing_amount   FROM ".ORDERDETAILS." GROUP BY order_id  ORDER BY oredered_date DESC ";		
			$run_get_order =mysql_query($get_order_latest);
        		  while($Order_results = mysql_fetch_array($run_get_order ))
				
                  // while($Order_results   = $Core_Mysql->db_fetch_array($Order_execute))
                   {
					     
              ?>       
                <tr>
					<td><?php echo $i;?></td>
                    <td><?php echo  date('m/d/Y',strtotime($Order_results['date'])); ?></td>
                    <td><?php echo $Order_results["order_id"];?></td>
				<!--	<td><?php echo $Order_results["shipping_address"];?></td>-->
				<!--	<td><?php echo $Order_results["shipping_city"];?></td>-->
				    <td><?php echo $Order_results["first_name"];?></td>
                    <td><?php echo $Order_results["billing_amount"];?></td>
                  <!--  <td><?php echo $Order_results["billing_amount"];?></td>-->
                   <!-- <td><?php echo $Order_results["oredered_date"];?></td>-->
                    <td><?php echo $Order_results["order_status"];?></td>
                <?php	 
          
		         if($Group_results_per['admin_edit']=='1')
		          {
		        ?>
                    <td><a  href="add_order_details.php?id=<?php echo $Order_results["order_id"];?>" ><i class="splashy-pencil"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
			  <?php
             if($Group_results_per['admin_delete']=='1')
		      {
		    ?>
                    <a href="order_details.php?del_id=<?php echo $Order_results["id"];?>" id="smoke_confirm" onClick="return  myFunction();"><i class="splashy-remove"></i> </a></td><?php } ?>
        
				</tr>
	<?php $i++; }?>
</tbody>        </table>
    </div>
</div>
        </div>
      </div>
    </div>
  </div>
  <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
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
        <script>
function myFunction()
{

var conf = confirm("Are you sure you wish to delete?");
	if(!conf)
	{
		return false;
	}
 return true;  

}
</script>
</div>
</body>
</html>
