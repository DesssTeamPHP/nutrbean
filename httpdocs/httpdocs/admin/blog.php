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
$meta_title  =  "Blog-Page";
/*********************Blog**********************************************/
	//For Selecting Query
	  $Blog_tablename         =    BLOG;
	  $FieldName              =    'blog_order';
	  $sororder               =    'asc';
	  $Field_types            = array('file_name',
	                                  'id',      
                                      'title',          
						              'blog_order'         
						              );
                            
	  $blog_select            =    $Core_Mysql->select_common_query($Blog_tablename,$FieldName,$Field_types,$sororder);
	  $blog_execute           =    $Core_Mysql->db_query($blog_select);
	  $blog_num_Records       =    $Core_Mysql->get_num_record($blog_execute);
	
////////////////////////////////////////=========END=============//////////////////

/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
		
		$unlink_del="select * from `blog_tbl` where id='".$_REQUEST['del_id']."'";
		$exe_link=mysql_query($unlink_del);
		$row_link = mysql_fetch_array($exe_link);
		$file_del= $row_link['file_name']; 
		$name = $_SERVER['DOCUMENT_ROOT']."/";
		
	  $Blog_tablename                  =    BLOG;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['del_id'];
	  $blog_delete                      =    $Core_Mysql->delete_common_query($Blog_tablename,$fieldname_one,$fieldname_one_value);
	  $blog_execute                     =    $Core_Mysql->db_query($blog_delete);
	  
	  
	   unlink($name.$file_del);  
	  
	   $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:blog.php?".$send_val);
	  
		
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
        <h3 class="heading">Blog Page</h3>
        <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(BLOG_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(BLOG_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(BLOG_DEL));			  
		  }
		  
		   if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='update')
		  print_r(error_notification_message(PUBLISH_ADD));			  
		  }
		  
		  
		  
		  
		  ?>
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
        <div style="text-align:right !important"><a href="publish_blog.php" ><i class="splashy-add"></i> Publish</a></div>
        <div style="text-align:right !important"><a href="add_blog.php" ><i class="splashy-add"></i> Add Blog</a></div>
        <?php } ?>
        <table class="table table-striped table-bordered dTableR" id="dt_a">
          <thead>
            <tr>
              <th>id</th>
              <th>Blog Title</th>
              <th>File Name </th>
              <!--<th>Blog Order</th>-->
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
                   while($blog_results   = $Core_Mysql->db_fetch_array($blog_execute))
                   {
					     
              ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $blog_results["title"];?></td>
              <td><?php echo $blog_results["file_name"];?></td>
              <!--   <td><?php echo $blog_results["blog_order"];?></td>-->
              <?php	 
		         if($Group_results_per['admin_edit']=='1')
		          {
		        ?>
              <td><a  href="add_blog.php?id=<?php echo $blog_results["id"];?>" ><i class="splashy-pencil"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;
                <?php } ?>
                <?php
            if($Group_results_per['admin_delete']=='1')
		      {
		    ?>
                <a href="blog.php?del_id=<?php echo $blog_results["id"];?>" id="smoke_confirm" onClick="return  myFunction();"><i class="splashy-remove"></i> </a></td>
              <?php } ?>
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
