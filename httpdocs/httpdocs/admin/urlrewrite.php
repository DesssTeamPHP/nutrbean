<?php 

/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Jayaraj
  * Date     : 05/08/2014 
  * Last Date: 05/08/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');

$meta_title  =  "URL Rewrite / Rewrite Rules / Administrator ";


/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
		
		
	  $tablename                 		  =    URLREWRITE_TBL;
	  $fieldname_one                      =    'id';
	  $fieldname_one_value                =    $_REQUEST['del_id'];
	  $Product_delete                     =    $Core_Mysql->delete_common_query($tablename,$fieldname_one,$fieldname_one_value);
	  $Product_execute                    =    $Core_Mysql->db_query($Product_delete);
	  
	  
	           $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:urlrewrite.php?".$send_val);
	  
		
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
    
     <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(URLREWRITE_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(URLREWRITE_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(URLREWRITE_DEL));			  
		  }
		  
		  
		  ?>
    
    
    
     
      <div style="text-align:right !important">
        <!--<a href="urlrewrite_edit.php" class="btn btn-gebo pull-right btn-default">Add URL Rewrite</a>-->
        <!-- <a href="urlrewrite_edit.php" ><i class="splashy-add"></i> &nbsp;Add URL Rewrite</a>-->
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-12">
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
          <h3 class="heading">URL Rewrite Management <a  href="urlrewrite_edit.php" style="float:right; margin-top:-8px;" class="btn btn-default button-next">Add New URL Rewrite<i class="glyphicon glyphicon-chevron-right"></i></a></h3>
          <?php } ?>
          <table id="dt_e" class="table table-striped table-bordered dTableR">
            <thead>
              <tr>
                <th>S.no</th>
                <th>Request Path</th>
                <th>Target Path</th>
                <?php            
		 if($Group_results_per['admin_edit']=='1' || $Group_results_per['admin_delete']=='1')
		 {
		 ?>
                <th>Action</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="dataTables_empty" colspan="6">Loading data from server</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php require 'common/admin-sidebar-jai.php';?>
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
<script src="js/rewrite_datatables.js"></script>
<style>
	/* 
* Global
*/

.f-nav {
	z-index: 9999 !important;
	position: fixed;
	top: 0;
/*	width: 100%;*/
/*box-shadow: 0 12px 10px -10px #000000;*/
}

/*
* Content
*/


	
	</style>
<script type="text/javascript">
      
        $("document").ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 500) {
                    $('.heading').addClass("navbar navbar-default navbar-fixed-top");
                } else {
                    $('.heading').removeClass("navbar navbar-default navbar-fixed-top");
                }
            });
        });
    </script>
    <script>
 function del_confirm()
{

var conf = confirm("Are you sure you wish to delete?");
	if(!conf)
	{
		return false;
	}
 return true;  

}
</script>
<!-- datatable functions -->
</div>
</body></html>
