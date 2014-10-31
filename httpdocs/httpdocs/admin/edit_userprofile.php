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
$meta_title  =  "Edit User Profile - Administrator";
/*********************Social Media SELECT**********************************************/

      $user_tablename                   =    ADMIN;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $user_select                      =    $Core_Mysql->select_one_where($user_tablename,$fieldname_one,$fieldname_one_value);
	  $user_execute                     =    $Core_Mysql->db_query($user_select);
	  $user_results                     =    $Core_Mysql->db_fetch_array($user_execute);
	  $user_num_Records                 =    $Core_Mysql->get_num_record($user_execute);

/******************************============END==============************************/
 //******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                    = $_REQUEST['id'];
$u_email               = $_REQUEST['u_email'];
$f_gender              = $_REQUEST['f_gender'];

if($_FILES['u_image']['name']!="")
{

$fname                 = $_FILES['u_image']['name'];
$tmpname               = $_FILES['u_image']['tmp_name'];
$path                  = "img/profiles/";
$file_name_img         = date('his').'-'.basename($fname);
$p_small               = $path.$file_name_img;
@move_uploaded_file($tmpname,$path.$file_name_img);
@unlink($path.$_REQUEST['u_image1']);

}
else
{

$file_name_img         = $_REQUEST['u_image1'];
}

/***************************************//////*******************************************************/
$social_tablename      =  ADMIN;//table_name
$FieldName            =  'id';
/*****************************************///////**************************************************//

$Field_types           = array(
							   'email'               => $u_email,
						       'user_image'          => $file_name_img,
						       'gender'              => $f_gender
                              );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($social_tablename,$FieldName,$Field_types,$id);


        if($Message_admin != 0)
           {
			  
			  $data = array('msg' =>'success');
			  $send_val		=	http_build_query($data);
               header("Location:myprofile.php?".$send_val);
           }
        else 
          {
 	       $Message_admin; 
          }

}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:myprofile.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<?php require 'common/admin-header.php';?>

<div id="maincontainer" class="clearfix">
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h3 class="heading">User Profile </h3>
          <form class="form-horizontal" method="post"  enctype="multipart/form-data">
            <fieldset>
            <div class="form-group">
              <label for="u_email" class="control-label col-sm-2">Email</label>
              <div class="col-sm-8">
                <input id="u_email"  name="u_email"class="input-xlarge form-control" value="<?php echo $user_results['email'];?>" type="text">
                <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
              </div>
            </div>
            <div class="form-group">
              <label for="fileinput" class="control-label col-sm-2">User Image</label>
              <div class="col-sm-8">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 80px; height: 80px;">
                    <?php if (file_exists('img/profiles/'.$user_results['user_image'])) 
				{?>
                    <img class="thumbnail" alt="" src="img/profiles/<?php echo $user_results['user_image'];?>">
                    <?php }
				else 
				{?>
                    <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image" />
                    <?php }?>
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 80px; height: 80px;"></div>
                  <span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                  <input type="file"  name="u_image"/>
                  </span>
                  <input name="u_image1"  id="u_image1"class="form-control" type="hidden" value="<?php echo  $user_results['user_image'];?>">
                  <a href="javascript:void(0)" class="btn btn-link fileupload-exists" data-dismiss="fileupload">Remove</a> </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Gender</label>
              <div class="col-sm-8">
                <label class="radio-inline">
                <input value="male" id="s_male" name="f_gender"  type="radio" <?php if($user_results['gender']=='male'){echo'checked="checked"';}?>>
                Male </label>
                <label class="radio-inline">
                <input value="female" id="s_female" name="f_gender" type="radio" <?php if($user_results['gender']=='female'){echo'checked="checked"';}?>>
                Female </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-8 col-sm-offset-2">
                <?php if($_REQUEST['id'] != '')
			       {?>
                <button class="btn btn-default"  name="Update" type="submit" value="Update">Update</button>
                <?php  }
			     else
			      {?>
                <button class="btn btn-default"  name="Save" type="submit" value="submit">Save</button>
                <?php }
				  
			   ?>
                <button type="submit" class="btn btn-default" name="Close" value="Cancel"  onClick="goBack();">Cancel</button>
              </div>
            </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div><a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
  <?php require 'common/admin-sidebar.php';require 'common/admin-js-scrips.php';?>
</div>
</body></html>
