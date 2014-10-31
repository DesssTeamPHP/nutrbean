<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 23/4/2014 
  * Last Date: 23/4/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Group-Page";
/*********************INDUSTRY**********************************************/
	//For Selecting Query
	  $group_tablename        =    GROUP;
	  $FieldName              =    'admin_groupid';
	  $sororder               =    'asc';
	  $Field_types            = array('admin_groupid',
	                                  'admin_groupname',      
                                      'admin_role',  
									  'admin_add', 
									  'admin_edit', 
									  'admin_delete',         
						              'admin_view');         
						              
                            
	  $group_select           =    $Core_Mysql->select_common_query($group_tablename,$FieldName,$Field_types,$sororder);
	  $group_execute          =    $Core_Mysql->db_query($group_select);
	  $group_num_Records      =    $Core_Mysql->get_num_record($group_execute);
	
////////////////////////////////////////=========END=============//////////////////

/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
	  $group_tablename                  =    GROUP;
	  $fieldname_one                    =    'admin_groupid';
	  $fieldname_one_value              =    $_REQUEST['del_id'];
	  $group_delete                     =    $Core_Mysql->delete_common_query($group_tablename,$fieldname_one,$fieldname_one_value);
	  $group_execute                    =    $Core_Mysql->db_query($group_delete);
	  
	  
	  
	  $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:admin_group_view.php?".$send_val);
	  
		
	}
///////////////////////////////////////========END========////////////////////////
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div id="maincontainer" class="clearfix">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h3 class="heading">Admin Group</h3>
          <!--class="btn btn-default" -->
          <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(ADMINGROUP_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(ADMINGROUP_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(ADMINGROUP_DEL));			  
		  }
		  
		  
		  ?>
        <div style="text-align:right !important"><a href="admin_group.php"><i class="splashy-add"></i> Add Group</a></div>
        <table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
            <tr>	<th>id</th>
					<th>Group Name</th>
					<th>Group Role  </th>
					<th>Add Permission</th>
                    <th>Edit Permission</th>
                    <th>Delete Permission</th>
                    <th>View Permission</th>
                    <th>Action</th>
				</tr>
</thead>
<tbody>
   	<?php
                $i=1;
                   while($group_results   = $Core_Mysql->db_fetch_array($group_execute))
                   {
              ?>       
                <tr>
					<td><?php echo $i;?></td>
					<td><?php echo $group_results["admin_groupname"];?></td>
					<td><?php echo $group_results["admin_role"];?></td>
					<td><?php if($group_results["admin_add"]=='1'){echo'Yes';}else{echo'No';}?></td>
                    <td><?php if($group_results["admin_edit"]=='1'){echo'Yes';}else{echo'No';}?></td>
                    <td><?php if($group_results["admin_delete"]=='1'){echo'Yes';}else{echo'No';}?></td>
                    <td><?php if($group_results["admin_view"]=='1'){echo'Yes';}else{echo'No';}?></td>
                    <td><a href="admin_group.php?id=<?php echo $group_results["admin_groupid"];?>" ><i class="splashy-pencil"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_group_view.php?del_id=<?php echo $group_results["admin_groupid"];?>"  id="smoke_confirm"  onclick='return myFunction();'> <i class="splashy-remove"></i> </a></td>
                    
				</tr>
	<?php $i++; }?>
</tbody>        </table>
    </div>
</div></div></div>
  <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a> 
   <?php require 'common/admin-sidebar.php';require 'common/admin-js-scrips.php';?>
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
