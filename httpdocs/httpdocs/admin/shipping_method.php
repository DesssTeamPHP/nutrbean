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
error_reporting(0);
$meta_title  =  "My Shipping Handling- Administrator";
/*********************Blog**********************************************/
	//For Selecting Query
	  $Shipping_tablename        =    shipping_methed_tbl;
	  $FieldName                 =    'shipping_id';
	  $sororder                  =    'asc';
	  $Field_types               = array( 'shipping_id',
	                                      'customer_id',
										  'flate_shipp_enab',
										  'flate_handling_name',
										  'flate_handling_method',
										  'flate_handling_type',
										  'flate_handling_charges',
	                                      'flate_handling_cal',
										  'free_shipp_enab',
	                                      'free_shipp_title',
										  'free_shipp_method',
										  'free_order_amt',
										  'free_sort_order',
										  'rate_enab',
										  'rate_title',
	                                      'rate_method', 
										  'rate_condi',
	                                      'rate_calc',
										  'rate_calc_handl',
										  'rate_handl_free',
										  'rate_sort_order',
										  'ups_enab',
										  'ups_type',
	                                      'ups_title',
										  'ups_url',
	                                      'ups_package',
										  'ups_container',
										  'ups_desti',
										  'ups_weight',
										  'ups_pick_metho',
										  'ups_max_weight',
	                                      'ups_sort_order'     
						                 );
	  $Shipping_select            =    $Core_Mysql->select_common_query($Shipping_tablename,$FieldName,$Field_types,$sororder);
	  $Shipping_execute           =    $Core_Mysql->db_query($Shipping_select);
	  $Shipping_num_Records       =    $Core_Mysql->get_num_record($Shipping_execute);
	
////////////////////////////////////////=========END=============//////////////////

/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
		
		
	  $Shipping_tablename                  =    shipping_methed_tbl;
	  $fieldname_one                       =    'shipping_id';
	  $fieldname_one_value                 =    $_REQUEST['del_id'];
	  $Shipping_delete                     =    $Core_Mysql->delete_common_query($Shipping_tablename,$fieldname_one,$fieldname_one_value);
	  $Shipping_execute                    =    $Core_Mysql->db_query($Shipping_delete);
	  
	  
	  
	   $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:shipping_method.php?".$send_val);
			   
			   
	 
		
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
          <h3 class="heading">Shipping and Handling Charges</h3>
          <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(SHIPPINGDETAIL_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(SHIPPINGDETAIL_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(SHIPPINGDETAIL_DEL));			  
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
         
         
     <div style="text-align:right !important"><a href="add_shipping_handling.php" ><i class="splashy-add"></i> Add Shipping</a></div>
      <?php } ?>
         <table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
            <tr>
					
					<th>id</th>
                   <th>Flate Name</th>
                   <th>Calculate Handling Fee</th>
                    <th>Shipping and Handling Amount</th>
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
                   while($Shipping_results   = $Core_Mysql->db_fetch_array($Shipping_execute))
                   {
					     
              ?>       
                <tr>
					<td><?php echo $i;?></td>
                    <td><?php echo $Shipping_results["flate_handling_name"];?></td>
                     <td><?php echo $Shipping_results["flate_handling_cal"];?></td>
                    <td><?php echo $Shipping_results["flate_handling_charges"];?></td>
               <?php	 
          
		         if($Group_results_per['admin_edit']=='1')
		          {
		        ?>
                    <td><a  href="add_shipping_handling.php?id=<?php echo $Shipping_results["shipping_id"];?>" ><i class="splashy-pencil"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
			  <?php
             if($Group_results_per['admin_delete']=='1')
		      {
		    ?>
                    <a href="shipping_method.php?del_id=<?php echo $Shipping_results["shipping_id"];?>" id="smoke_confirm" onClick="return  myFunction();"><i class="splashy-remove"></i> </a></td><?php } ?>
        
				</tr>
	<?php $i++; }?>
</tbody>        </table>
    </div>
</div>
        </div>
      </div>
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
