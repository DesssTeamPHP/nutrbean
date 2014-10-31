 <?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 02/24/2014 
  * Last Date: 02/24/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "User-List-Page";
error_reporting(0);
/*********************Social Media SELECT**********************************************/
if($_REQUEST['id']!='')
{
      $user_tablename                   =    ADMIN;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $user_select                      =    $Core_Mysql->select_one_where($user_tablename,$fieldname_one,$fieldname_one_value);
	  $user_execute                     =    $Core_Mysql->db_query($user_select);
	  $user_results                     =    $Core_Mysql->db_fetch_array($user_execute);
	  $user_num_Records                 =    $Core_Mysql->get_num_record($user_execute);
}
/******************************============END==============************************/

 $user_tablename      =    ADMIN;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 
$u_fname                       = trim($_REQUEST['u_fname']);
$u_password                    = trim(md5($_REQUEST['u_password']));
$Passed_Question               = $_REQUEST['Passed_Question'];
$Passed_Answer                 = $_REQUEST['Passed_Answer'];
$admin_group_id                = $_REQUEST['admin_group_id'];


$Field_types                   = array('username'               => $u_fname,
                                       'password'               => $u_password,
									   'admin_passquestion'     => $Passed_Question,
									   'admin_passanswer'       => $Passed_Answer,
									   'groupid'                => $admin_group_id
                                      );
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($user_tablename,$Field_types);

        if($Message_admin != 0)
           {
			  $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:user_list.php?".$send_val);  
			  
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                            = $_REQUEST['id'];
$u_fname                       = trim($_REQUEST['u_fname']);
$u_password                    = trim(md5($_REQUEST['u_password']));
$Passed_Question               = $_REQUEST['Passed_Question'];
$Passed_Answer                 = $_REQUEST['Passed_Answer'];
$admin_group_id                = $_REQUEST['admin_group_id'];

/***************************************//////*******************************************************/
$user_tablename      =  ADMIN;//table_name
$FieldName            =  'id';
/*****************************************///////**************************************************//

$Field_types                   = array('username'               => $u_fname,
                                       'password'               => $u_password,
									   'admin_passquestion'     => $Passed_Question,
									   'admin_passanswer'       => $Passed_Answer,
									    'groupid'               => $admin_group_id
                                      );
									  
									  
					//print_r($Field_types);		die;		  
 $Message_admin      =  $Core_Mysql->update_common_query($user_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			   
			 $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:user_list.php?".$send_val);   
			  
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:user_list.php");
	}
?>  
 <script>
function goBack()
  {
  window.history.back()
  }
</script> 
   <html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer" class="clearfixs">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 col-md-12">
      <h3 class="heading">User List</h3>
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label for="u_fname" class="control-label col-sm-2">User name</label>
						<div class="col-sm-8">
							<input id="u_fname" name="u_fname" class="input-xlarge form-control" value="<?php echo $user_results['username'];?> " type="text">
						</div>
					</div>
                    
					<div class="form-group">
						<label for="u_password"  class="control-label col-sm-2">Password</label>
						<div class="col-sm-8">
							<div class="sepH_b">
								<input id="u_password" name="u_password" class="input-xlarge form-control" value="<?php echo $user_results['password'];?>" type="password">
								<span class="help-block">Enter your password</span>
							</div>
                            
						</div>
					</div>
                    <div class="form-group">
						<label for="u_fname" class="control-label col-sm-2">Pass Question</label>
						<div class="col-sm-8">
							<input id="Passed_Question" name="Passed_Question" class="input-xlarge form-control" value="<?php echo $user_results['admin_passquestion'];?> " type="text">
						</div>
					</div>
                    <div class="form-group">
						<label for="u_fname" class="control-label col-sm-2">Pass Answer</label>
						<div class="col-sm-8">
                       
							<input id="Passed_Answer" name="Passed_Answer" class="input-xlarge form-control" value="<?php echo $user_results['admin_passanswer'];?> " type="text">
						</div>
					</div>
                    <div class="form-group">
						<label for="u_fname" class="control-label col-sm-2"> Admin Group Name:</label>
						<div class="col-sm-8">
                       <select name="admin_group_id" id="admin_group_id" class="form-control">
        <option value="0">--SELECT--</option>
        <?php
      $pagetablename          =    GROUP;
	  $FieldName              =    'admin_groupname';
	 
	  $Field_types            = array('admin_groupid',
	                                  'admin_groupname');     
						                   
	  $pagecat_select             =    $Core_Mysql->select_common_query($pagetablename,$FieldName,$Field_types);
	  $pagecat_execute            =    $Core_Mysql->db_query($pagecat_select);
		//$select_page_category	=	"SELECT title, id FROM page_category ORDER BY title  ASC";
		//$run_select_page_category	=	mysql_query($select_page_category);
		if(!$pagecat_execute)
		{
		echo mysql_error();
		exit;
		}
		else if(mysql_num_rows($pagecat_execute)==0)
		{
		echo   '<option value="0">Other</option>';
		}
		else
		{
		while($fetch_select_page_category=mysql_fetch_array($pagecat_execute))
			{
			  if(($fetch_select_page_category['admin_groupid'] ==  $user_results['groupid']))
					  {
					  $page_Cat_selected='selected="selected"';
					  }
					  else
					  {
   				       $page_Cat_selected="";
					  }
					  
				echo ' <option value="'.$fetch_select_page_category['admin_groupid'].'" '.$page_Cat_selected.' >'.$fetch_select_page_category['admin_groupname'].'</option>'; 
					  
			}
		
		}
			 ?>
      </select>
            
						</div>
					</div>
                    <!--<div class="form-group">
						<label for="u_fname" class="control-label col-sm-2">Confirm Password</label>
						<div class="col-sm-8">
							<input id="c_password" name="c_password" class="input-xlarge form-control" value="" type="password">
                            <span class="help-block">Repeat password</span>
						</div>
					</div>-->
				
                     <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							 <?php if($_REQUEST['id'] != '')
			       {?>
					  <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>  
			<?php }
				  
			   ?><button type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">Cancel</button>  
						</div>
					</div>
				</fieldset>
			</form>
    </div>
</div>                </div>
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
   

</div>
					</body>
				</html>
