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
$meta_title  =  "Menu Groups - Administrator";
error_reporting(0);
/*********************Social Media**********************************************/
	//For Selecting Query
	  $group_tablename         =    MENUGROUP;
	  $FieldName               =    'admin_menu_groupid';
	  $fieldname_one_value     =    $_REQUEST['id'];
	  $Field_types             =    array('admin_menugroup',      
                                   'admin_menus',          
						           'admin_menu_groupid',
								   'admin_group_id',         
						           'created_date');
         // print_r($Field_types);die;                  
	  $group_select          =    $Core_Mysql->select_common_query($group_tablename,$FieldName,$Field_types,$fieldname_one_value);
	  $group_execute         =    $Core_Mysql->db_query($group_select);
	  $group_num_Records     =    $Core_Mysql->get_num_record($group_execute);
	
////////////////////////////////////////=========END=============//////////////////
/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
	  $group_tablename                 =    MENUGROUP;
	  $fieldname_one                   =    'admin_menu_groupid';
	  $fieldname_one_value             =    $_REQUEST['del_id'];
	  $group_delete                    =    $Core_Mysql->delete_common_query($group_tablename,$fieldname_one,$fieldname_one_value);
	  $group_execute                   =    $Core_Mysql->db_query($group_delete);
	  
	           $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:menu_group.php?".$send_val);
			   

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
          <h3 class="heading">Menu Name</h3>
          <!--class="btn btn-default" -->
          <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(MENUGROUP_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(MENUGROUP_UPDATE));			  
		  }
		  
		   
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(MENUGROUP_DEL));			  
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
          <div style="text-align:right !important"><a href="add_menu_group.php"><i class="splashy-add"></i> Add Menu Group</a></div>
          <?php } ?>
          <table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
              <tr>
                <th>id</th>
                <th>Group Menu Name </th>
                <th>Group Menu </th>
                <th>Group User </th>
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
                   while($group_results   = $Core_Mysql->db_fetch_array($group_execute))
                   {
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><a href="admin_menu_link.php?id=<?php echo $group_results["admin_group_id"];?>" > <?php echo $group_results["admin_menugroup"];?></a> </td>
                <td><?php echo $group_results["admin_menus"];?></td>
                <td><?php $sel_tbl_linkt="SELECT admin_groupname FROM group_table where  admin_groupid='".$group_results["admin_group_id"]."'";
				  
				  $query1_tbl  = mysql_query($sel_tbl_linkt);
				    $tbl_link_Fetch = mysql_fetch_array($query1_tbl);
					echo ucfirst($tbl_link_Fetch["admin_groupname"]);?></td>
                     <?php	 
          
		         if($Group_results_per['admin_edit']=='1')
		          {
		        ?>
                <td><a href="add_menu_group.php?id=<?php echo $group_results["admin_menu_groupid"];?>" ><i class="splashy-pencil"></i> </a> &nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
                      <?php
             if($Group_results_per['admin_delete']=='1')
		      {
		    ?>
                <a href="menu_group.php?del_id=<?php echo $group_results["admin_menu_groupid"];?>"  id="smoke_confirm"  onclick='return myFunction();'> <i class="splashy-remove"></i> </a></td><?php } ?>
              </tr>
              <?php $i++; }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
  <?php require 'common/admin-sidebar.php';require 'common/admin-js-scrips.php';?>
</div>
</body></html>
