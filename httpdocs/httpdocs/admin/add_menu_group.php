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
$meta_title  =  "Add Menu Group ";
/*********************Social Media SELECT**********************************************/

      $group_tablename                  =    MENUGROUP;
	  $fieldname_one                    =    'admin_menu_groupid';
	  $fieldname_one_value              =    isset($_REQUEST['id']);
	  $group_select                     =    $Core_Mysql->select_one_where($group_tablename,$fieldname_one,$fieldname_one_value);
	  $group_execute                    =    $Core_Mysql->db_query($group_select);
	  $group_results                    =    $Core_Mysql->db_fetch_array($group_execute);
	  $group_num_Records                =    $Core_Mysql->get_num_record($group_execute);

/******************************============END==============************************/

 $group_tablename      =    MENUGROUP;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 
$admin_menu_groupid        = $_REQUEST['admin_menu_groupid'];
$admin_menugroup           = $_REQUEST['admin_menugroup'];
$admin_menus               = $_REQUEST['admin_menus'];
$admin_group_id            = $_REQUEST['admin_group_id'];
$created_date              = $_REQUEST['created_date'];




$Field_types           = array('admin_menu_groupid'       => $admin_menu_groupid,
                               'admin_menugroup'          => $admin_menugroup,
                               'admin_menus'              => $admin_menus,
							   'admin_group_id'           => $admin_group_id,
						       'created_date'             => date('Y-m-d H:i:s')
                              );
	//print_r($Field_types);die;					   
 $Message_admin      =  $Core_Mysql->insert_common_query($group_tablename,$Field_types);

        if($Message_admin != 0)
           {
			   
			   $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:menu_group.php?".$send_val); 
			   
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                       = $_REQUEST['id'];
$admin_menugroup           = $_REQUEST['admin_menugroup'];
$admin_menus               = $_REQUEST['admin_menus'];
$admin_group_id            = $_REQUEST['admin_group_id'];
$created_date              = $_REQUEST['created_date'];



/***************************************//////*******************************************************/
$group_tablename      =  MENUGROUP;//table_name
$FieldName            =  'admin_menu_groupid';
/*****************************************///////**************************************************//

 $Field_types           = array('admin_menugroup'       => $admin_menugroup,
                               'admin_menus'           => $admin_menus,
							   'admin_group_id'        => $admin_group_id,
						       'created_date'          => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($group_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			   
			   $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:menu_group.php?".$send_val); 
			
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:menu_group.php");
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
		
		var admin_menugroup=document.getElementById('admin_menugroup');
		var admin_menus=document.getElementById('admin_menus');
		
		
		if(admin_menugroup.value=="")
		{
			alert("Please Enter Menu Group");
			admin_menugroup.focus();
			return false;
		}
		else if(admin_menugroup.value.length<3)
		{
			alert("Please Enter Menu Group Minimum 3 characters");
			admin_menugroup.focus();
			return false;
		}	
		else if(!admin_menugroup.value.match(letters))
		{
			alert("Please Enter Valid Menu Group");
			admin_menugroup.focus();
			return false;
		}	
		else if(admin_menus.value=="")
		{
			alert("Please Enter Admin Menus");
			admin_menus.focus();
			return false;
		}
		else if(admin_menus.value.length>100)
		{
			alert("Please Enter Admin Menus");
			admin_menus.focus();
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
          <h3 class="heading">Menu Group</h3>
          <form class="form_validation_ttip" method="post" enctype="multipart/form-data">
            <div class="formSep">
              <label>Group Name:</label>
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
			  if(($fetch_select_page_category['admin_groupid'] ==  $group_results['admin_group_id']))
					  {
					  $page_Cat_selected='selected="selected"';
					  }
					  else
					  {
   				       $page_Cat_selected="";
					  }
					  
				echo '<option value="'.$fetch_select_page_category['admin_groupid'].'" '.$page_Cat_selected.' >'.$fetch_select_page_category['admin_groupname'].'</option>'; 
					  
			}
		
		}
			 ?>
              </select>
              <div class="form-group">
                <label> Group Menu:<span class="f_req">*</span></label>
                <input name="admin_menugroup"  id="admin_menugroup" class="form-control" maxlength="50" type="text" value="<?php echo $group_results['admin_menugroup'];?>">
              </div>
              <label>Menu Group : <span class="f_req">*</span></label>
              <input name="admin_menus" id="admin_menus" class="form-control" type="text" maxlength="50" value="<?php echo $group_results['admin_menus'];?>">
              <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
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
      </div>
    </div>
  </div>
  <?php require 'common/admin-sidebar.php';require 'common/admin-js-scrips.php';?>
</div>
</body>
</html>
