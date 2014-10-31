<?php
 /*******************************************************************************
  * Developed By Desss Inc
  * Developer: Karuna Karan
  * Date     : 02/22/2014 

  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Request Quote -Page";
/*********************Check Request Quote Details**********************************************/

	//For Selecting Query
	$Request_tablename       =    REQUESTQUOTE;
	$Request_date            =    'date_time';
	$sororder                  =    'DESC';
	$Fieldname               = array('quote_name',
	                                 'quote_lastname',
									 'quote_industry',
									 'quote_email',
									 'quote_address',
									 'quote_zipcode',
									 'quote_phone',
									 'date_time',
									 'quote_id',
									 'quote_qustcomments',
									 'file_name');
	$Request_select          =    $Core_Mysql->select_common_query($Request_tablename,$Request_date,$Fieldname,$sororder);
	$Request_execute         =    $Core_Mysql->db_query($Request_select);
	$Request_num_Records     =    $Core_Mysql->get_num_record($Request_execute);
	
	///End OF PRocess
/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
	  $Request_tablename            = REQUESTQUOTE;
	  $fieldname_one                = 'quote_id';
	  $fieldname_one_value          = $_REQUEST['del_id'];
	  $Request_delete               = $Core_Mysql->Delete_Common_query($Request_tablename,$fieldname_one,$fieldname_one_value);
	  $Request_execute              = $Core_Mysql->db_query($Request_delete);
	  
	  
	          $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:request_quote.php?".$send_val);
			   
	}
///////////////////////////////////////========END========////////////////////////	
	

///////////////////////////////////////////////////////////////////////////////////////////
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
          <h3 class="heading">Request Quote</h3>
          <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(REQUEST_DEL));			  
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
        ?>
          
                   
          <table class="table table-striped table-bordered" id="dt_tools">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Comments</th>
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
			 while($Request_results   = $Core_Mysql->db_fetch_array($Request_execute))
                  {
			?>
              <tr>
              <td><?php echo $i;?>
                <td><?php echo  date('m/d/Y H:i:s',strtotime($Request_results['date_time'])) ;?></td>
                <td><?php echo  $Request_results['quote_name'];?></td>
                <td><?php echo  $Request_results['quote_email'];?></td>
                <td><?php echo  $Request_results['quote_phone'];?></td>
                <td><?php echo  $Request_results['quote_qustcomments'];?></td>
                      <?php
             if($Group_results_per['admin_delete']=='1')
		      {
		    ?> 
                <td><a href="request_quote.php?del_id=<?php echo $Request_results["quote_id"];?>"  id="smoke_confirm"  onclick='return myFunction();'> <i class="splashy-group_grey_remove"></i> </a></td><?php } ?>
              </tr>
              <?php $i++; }?>
            
            </tbody>
          </table>
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
