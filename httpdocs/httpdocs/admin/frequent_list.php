<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 02/22/2014 
  * Last Date: 02/22/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Frequent-Page";
error_reporting(0);
/*********************Check Request Quote Details**********************************************/

	//For Selecting Query
	$Frequent_tablename        =    FREQUENT_TBL;
	$FieldName                 =    'frequent_id';
    $sororder                  =    'asc';
    $Field_types                   = array('frequent_id',
	                                       'frequent_name',
									       'frequent_desc',
									       'sort_order'
										   );
    $Frequent_select          =    $Core_Mysql->select_common_query($Frequent_tablename,$FieldName,$Field_types,$sororder);
	$Frequent_execute         =    $Core_Mysql->db_query($Frequent_select);
	$Frequent_num_Records     =    $Core_Mysql->get_num_record($Frequent_execute);
	
	////////////////////////////////////////=========END=============//////////////////

/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
	  $Frequent_tablename            = FREQUENT_TBL;
	  $fieldname_one                 = 'frequent_id';
	  $fieldname_one_value           = $_REQUEST['del_id'];
	  $Frequent_delete               = $Core_Mysql->Delete_Common_query($Frequent_tablename,$fieldname_one,$fieldname_one_value);
	  $Frequent_execute              = $Core_Mysql->db_query($Frequent_delete);
	  
	   $data            =   array('msg' =>'deleted');
	   $send_val		=	http_build_query($data);
       header("Location:frequent_list.php?".$send_val);
	  
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
        <h3 class="heading">Frequent</h3>
        <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(FREQUENT_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(FREQUENT_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(FREQUENT_DEL));			  
		  }
		  
		  
		  ?>
        <div style="text-align:right !important"><a href="add_frequent.php"><i class="splashy-add"></i> Add Frequent</a></div>
        <table class="table table-striped table-bordered dTableR" id="dt_a">
          <thead>
            <tr>
             <th style="width:60px">S.No</th>
                <th> Frequent Name </th>
                <th>Frequent Description</th>
                   <th >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $i=1;
                   while($Frequent_results   = $Core_Mysql->db_fetch_array($Frequent_execute))
                   {
					    
              ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo stripslashes($Frequent_results["frequent_name"]);?></td>
              <td><?php echo stripslashes($Frequent_results["frequent_desc"]);?></td>
             
             
              <td><a href=" add_frequent.php?id=<?php echo $Frequent_results["frequent_id"];?>" ><i class="splashy-pencil"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="frequent_list.php?del_id=<?php echo $Frequent_results["frequent_id"];?>"  id="smoke_confirm"  onclick='return myFunction();'> <i class="splashy-remove"></i> </a></td>
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
