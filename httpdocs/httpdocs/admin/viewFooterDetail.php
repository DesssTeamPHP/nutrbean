<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 10/4/2014 
  * Last Date: 10/4/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Footer-Page";
error_reporting(0);
/*********************Footer**********************************************/
	//For Selecting Query
	  $Footertablename        =    FOOTERMENU;
	  $FieldName              =    'footer_id';
	  $sororder               =    'asc';
	  $Field_types            = array('footer_id',
	                                  'footer_name',      
                                      'pagr_url',          
						              'link_page');         
						              
                            
	  $Footer_select           =    $Core_Mysql->select_common_query($Footertablename,$FieldName,$Field_types,$sororder);
	  $Footer_execute          =    $Core_Mysql->db_query($Footer_select);
	  $Footer_num_Records      =    $Core_Mysql->get_num_record($Footer_execute);
	
////////////////////////////////////////=========END=============//////////////////

/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
	  $Footertablename                  =    FOOTERMENU;
	  $fieldname_one                    =    'footer_id';
	  $fieldname_one_value              =    $_REQUEST['del_id'];
	  $Footer_delete                    =    $Core_Mysql->delete_common_query($Footertablename,$fieldname_one,$fieldname_one_value);
	  $Footer_execute                   =    $Core_Mysql->db_query($Footer_delete);
	  
	  
	   $data            =   array('msg' =>'deleted');
	   $send_val		=	http_build_query($data);
       header("Location:viewFooterDetail.php?".$send_val);
	  
		
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
       
        <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(VIEWDETAIL_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(VIEWDETAIL_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(VIEWDETAIL_DEL));			  
		  }
		  
		  
		  ?>
        <h3 class="heading">Footer Menu</h3> <!--class="btn btn-default" -->
         
          <?php
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
        <div style="text-align:right !important"><a href="addFooterName.php"><i class="splashy-add"></i> Add Footer Link</a></div>
        <?php } ?>
        <table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
            <tr>	<th>id</th>
					<th>Footer Name</th>
					<th>Page URL </th>
					<th>Footer Order</th>
                     <?php            
		 if($Group_results_per['admin_edit']=='1' || $Group_results_per['admin_delete']=='1')
		 {
		 ?>
                    <th>Action</th>
                    <?php } ?>
				</tr>
</thead>
<tbody>
   	<?php
                $i=1;
                   while($Footer_results   = $Core_Mysql->db_fetch_array($Footer_execute))
                   {
              ?>       
                <tr>
					<td><?php echo $i;?></td>
					<td><a href="footer_link.php?id=<?php echo $Footer_results["footer_id"];?>" ><?php echo $Footer_results["footer_name"];?></a></td>
					<td><?php echo $Footer_results["pagr_url"]; ?></td>
					<td><?php echo $Footer_results["link_page"]; ?></td>
                     <?php	 
		         if($Group_results_per['admin_edit']=='1')
		          {
		        ?>
                    <td><a href="addFooterName.php?id=<?php echo $Footer_results["footer_id"];?>" ><i class="splashy-pencil"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
                     <?php
            if($Group_results_per['admin_delete']=='1')
		      {
		    ?> 
                    <a href="viewFooterDetail.php?del_id=<?php echo $Footer_results["footer_id"];?>"  id="smoke_confirm"  onclick='return myFunction();'> <i class="splashy-remove"></i> </a></td>
                    <?php } ?>
				</tr>
	<?php $i++; }?>
</tbody>        </table>
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
	<!-- notifications functions -->
    
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
