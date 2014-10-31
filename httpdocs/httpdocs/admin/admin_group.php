<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 04/4/2014 
  * Last Date: 04/4/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Group-Page";
error_reporting(0);
/*********************INDUSTRY SELECT**********************************************/

      $group_tablename                   =    GROUP;
	  $fieldname_one                     =    'admin_groupid';
	  $fieldname_one_value               =    $_REQUEST['id'];
	  $group_select                      =    $Core_Mysql->select_one_where($group_tablename,$fieldname_one,$fieldname_one_value);
	  $group_execute                     =    $Core_Mysql->db_query($group_select);
	  $Group_results                     =    $Core_Mysql->db_fetch_array($group_execute);
	  $groupnum_Records                  =    $Core_Mysql->get_num_record($group_execute);

/******************************============END==============************************/
  
 $group_tablename                       =    GROUP;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 

$Group_name                         = $_REQUEST['Group_name'];
$Group_role                         = $_REQUEST['Group_role'];
if($_REQUEST['Add_permission']=='on')
{
$Add_permission                     = '1';
}
else
{
$Add_permission                     = '0';	
}

if($_REQUEST['Edit_permission']=='on')
{
$Edit_permission                     = '1';
}
else
{
$Edit_permission                     = '0';	
}

if($_REQUEST['Delete_permission']=='on')
{
$Delete_permission                     = '1';
}
else
{
$Delete_permission                     = '0';	
}

if($_REQUEST['View_permission']=='on')
{
$View_permission                     = '1';
}
else
{
$View_permission                     = '0';	
}


$Field_types           = array('admin_groupname'          => $Group_name,
                               'admin_role'               => $Group_role,
							   'admin_add'                => $Add_permission,
							   'admin_edit'               => $Edit_permission,
                               'admin_delete'             => $Delete_permission,
						       'admin_view'               => $View_permission,
							   'created_date'             => date('Y-m-d H:i:s')
                              );
						   print_r($Field_types);
  $Message_admin      =  $Core_Mysql->insert_common_query($group_tablename,$Field_types);
 
 if(!$Message_admin)
 {
	 echo mysql_error();
 }

        if($Message_admin != 0)
           {
			   
			  $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:admin_group_view.php?".$send_val);  
			   
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                                   = $_REQUEST['id'];
$Group_name                         = $_REQUEST['Group_name'];
$Group_role                         = $_REQUEST['Group_role'];
if($_REQUEST['Add_permission']=='on')
{
$Add_permission                     = '1';
}
else
{
$Add_permission                     = '0';	
}

if($_REQUEST['Edit_permission']=='on')
{
$Edit_permission                     = '1';
}
else
{
$Edit_permission                     = '0';	
}

if($_REQUEST['Delete_permission']=='on')
{
$Delete_permission                     = '1';
}
else
{
$Delete_permission                     = '0';	
}

if($_REQUEST['View_permission']=='on')
{
$View_permission                     = '1';
}
else
{
$View_permission                     = '0';	
}
/***************************************//////*******************************************************/
 $group_tablename                       =    GROUP;//table_name
$FieldName                          =  'admin_groupid';
/*****************************************///////**************************************************//


$Field_types           = array('admin_groupname'          => $Group_name,
                               'admin_role'               => $Group_role,
							   'admin_add'                => $Add_permission,
							   'admin_edit'               => $Edit_permission,
                               'admin_delete'             => $Delete_permission,
						       'admin_view'               => $View_permission,
							   'created_date'             => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($group_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			   
			  $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:admin_group_view.php?".$send_val);   
			  
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:admin_group_view.php");
	}
?>
<script language="javascript">
function validsignup()
	{
	
     
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;
		//var letters = /^[A-Za-z ]{3,50}$/;
		
		var Group_name=document.getElementById('Group_name');
		var Group_role=document.getElementById('Group_role');
		
		
		if(Group_name.value=="")
		{
			alert("Please Enter Group Name");
			Group_name.focus();
			return false;
		}
		else if(Group_name.value.length<3)
		{
			alert("Please Enter Group Name Minimum 3 characters");
			Group_name.focus();
			return false;
		}	
		else if(!Group_name.value.match(letters))
		{
			alert("Please Enter Valid Group Name");
			Group_name.focus();
			return false;
		}	
		else if(Group_role.value=="")
		{
			alert("Please Enter Group Role");
			Group_role.focus();
			return false;
		}
		else if(Group_role.value.length>100)
		{
			alert("Please Enter Group Role");
			Group_role.focus();
			return false;
		}
		
		else
		{
			document.content_add.submit();
			return true;
		}
	}
	
 
	</script>
<script>
function goBack()
  {
  window.history.back()
  }
</script>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div id="maincontainer" class="clearfix">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row">
        <div class="col-sm-12 col-md-12">
        <?php if(isset($_REQUEST['id'])!='')
		{?>
		<h3 class="heading">Edit Group</h3>
  <?php }
		else
		{?>
		<h3 class="heading">Add Group</h3>
  <?php }?>     	
		<form class="form_validation_content" method="post" enctype="multipart/form-data">
        <div class="form-group">
					<label>Admin Group Name:<span class="f_req">*</span></label>
					<input name="Group_name"  id="Group_name"class="form-control" maxlength="50" type="text" value="<?php echo $Group_results['admin_groupname'];?>">
				</div>
				<div class="form-group">
					<label>Admin Role:<span class="f_req">*</span></label>
					<input name="Group_role"  id="Group_role" class="form-control" maxlength="50" type="text" value="<?php echo $Group_results['admin_role'];?>">
				</div>
				<div class="formSep">
				<div class="form-group">
					<label>Add Permission:</label>&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="Add_permission"  id="Add_permission" type="checkbox"        <?php if($Group_results['admin_add']=='1'){echo 'checked="checked"';}?>  >&nbsp;&nbsp;&nbsp;&nbsp;
                     <label>Edit Permission:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="Edit_permission"  id="Edit_permission" type="checkbox"      <?php if($Group_results['admin_edit']=='1'){echo 'checked="checked"';}?> >&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Delete Permission:</label>&nbsp;&nbsp;&nbsp;
                    <input name="Delete_permission"  id="Delete_permission" type="checkbox"  <?php if($Group_results['admin_delete']=='1'){echo 'checked="checked"';}?> >&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>View Permission:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="View_permission"  id="View_permission" type="checkbox"      <?php if($Group_results['admin_view']=='1'){echo 'checked="checked"';}?> >
				</div>
			</div>
			<div class="form-actions">
            <?php if(isset($_REQUEST['id']) != '')
			       {?>
					  <button class="btn btn-primary"  name="Update" type="submit" value="Update" onClick="return validsignup()">Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary"  name="Save" type="submit" value="submit" onClick="return validsignup()">Save</button>  
			<?php }
			   ?>
				<input type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">
			</div>
		</form>
    </div>
    </div></div></div>
     <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a> 
    <?php require 'common/admin-sidebar.php';require 'common/admin-js-scrips.php';?>
   
</div>
					</body>
				</html>