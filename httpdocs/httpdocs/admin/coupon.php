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
$meta_title  =  "My Tax - Administrator";
/*********************Blog**********************************************/
	//For Selecting Query
	  $Tax_tablename             =    TAX;
	  $FieldName                 =    'id';
	  $sororder                  =    'asc';
	  $Field_types               = array( 'id',
	                                      'products_id',
										  'name',
	                                      'customer_tax_class',      
                                          'product_tax_id',
										  'tax_rate', 
										  'priority',
										  'subtotal_only',
										  'sort_order'
						                 );
	  $Tax_select            =    $Core_Mysql->select_common_query($Tax_tablename,$FieldName,$Field_types,$sororder);
	  $Tax_execute           =    $Core_Mysql->db_query($Tax_select);
	  $Tax_num_Records       =    $Core_Mysql->get_num_record($Tax_execute);
	
////////////////////////////////////////=========END=============//////////////////

/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
		
		
	  $Tax_tablename                  =    TAX;
	  $fieldname_one                  =    'id';
	  $fieldname_one_value            =    $_REQUEST['del_id'];
	  $Tax_delete                     =    $Core_Mysql->delete_common_query($Tax_tablename,$fieldname_one,$fieldname_one_value);
	  $Tax_execute                    =    $Core_Mysql->db_query($Tax_delete);
	  
	  
	  
	   $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:tax.php?".$send_val);
			   
			   
	 
		
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
          <h3 class="heading">Tax</h3>
          <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(TAX_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(TAX_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(TAX_DEL));			  
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
         
         
     <div style="text-align:right !important"><a href="add_tax.php" ><i class="splashy-add"></i> Add Tax</a></div>
      <?php } ?>
         <table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
            <tr>
					
					<th>id</th>
                    <th>Name</th>
					<th>Product Tax Class</th>
                    <th>Tax Rate</th> 
                    <th>Priority</th>
                    <th>Sort Order</th>
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
                   while($Tax_results   = $Core_Mysql->db_fetch_array($Tax_execute))
                   {
					     
              ?>       
                <tr>
					<td><?php echo $i;?></td>
                    <td><?php echo $Tax_results["name"];?></td>
                   <td><?php echo $Tax_results["product_tax_id"];?></td>
                   <!--<td>
					
                     <?php
      $pagetablename          =    PRODUCTS;
	  $fieldname_one          =    'products_id';
	  $fieldname_one_value    =    $_REQUEST['id'];
	   
						                   
	 echo  $pagecat_select          =    $Core_Mysql->select_one_where($pagetablename,$fieldname_one,$fieldname_one_value);
	 $pagecat_execute         =    $Core_Mysql->db_query($pagecat_select);
	  if(!$pagecat_execute)
		{
		echo mysql_error();
		exit;
		}
		else if(mysql_num_rows($pagecat_execute)==0)
		{
		echo   '';
		}
		else
		{
		while($fetch_select_page_category=mysql_fetch_array($pagecat_execute))
			{
			  if(($fetch_select_page_category['products_id'] ==  $Tax_results['product_tax_id']))
					  {
					  $page_Cat_selected='';
					  }
					  else
					  {
   				       $page_Cat_selected="";
					  }
					  
				echo ''.$fetch_select_page_category['tax_class'].''; 
					  
			}
		
		}
			 ?></td>-->
				    <td><?php echo $Tax_results["tax_rate"];?></td>
                    <td><?php echo $Tax_results["priority"];?></td>
                    <td><?php echo $Tax_results["sort_order"];?></td>
               <?php	 
          
		         if($Group_results_per['admin_edit']=='1')
		          {
		        ?>
                    <td><a  href="add_tax.php?id=<?php echo $Tax_results["id"];?>" ><i class="splashy-pencil"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
			  <?php
             if($Group_results_per['admin_delete']=='1')
		      {
		    ?>
                    <a href="tax.php?del_id=<?php echo $Tax_results["id"];?>" id="smoke_confirm" onClick="return  myFunction();"><i class="splashy-remove"></i> </a></td><?php } ?>
        
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
