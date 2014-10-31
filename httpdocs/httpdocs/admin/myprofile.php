<?php 

/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 02/25/2014 
  * Last Date: 02/25/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');

$meta_title  =  "My Profile - Administrator";
/*********************SELECT**********************************************/

      $user_tablename                         =    ADMIN;
	  $fieldname_one                          =    'id';
	  $fieldname_one_value                    =    $_SESSION['userid'];
	  $user_select_mypro                      =    $Core_Mysql->select_one_where($user_tablename,$fieldname_one,$fieldname_one_value);
	  $user_execute_mypro                     =    $Core_Mysql->db_query($user_select_mypro);
	  $user_results_mypro                     =    $Core_Mysql->db_fetch_array($user_execute_mypro);
	  $user_num_Records                       =    $Core_Mysql->get_num_record($user_execute_mypro);

/******************************============END==============************************/

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
          <h3 class="heading">User Profile</h3>
          <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(MYPROFILE_SUCCESS));			  
		  }
		  ?>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="vcard">
                <?php if (file_exists('img/profiles/'.$user_results_mypro['user_image'])) 
									{?>
                <img  src="img/profiles/<?php echo $user_results_mypro['user_image'];?>" alt="" class="thumbnail" width="120px" height="120px">
                <?php 
									}
									else 
									{?>
                <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image">
                <?php } ?>
                <ul>
                  <li class="v-heading"> User info </li>
                  <li> <span class="item-key">Username</span>
                    <div class="vcard-item"><?php echo $user_results_mypro['username'];?></div>
                  </li>
                  <li> <span class="item-key">Email</span>
                    <div class="vcard-item"><?php echo $user_results_mypro['email'];?></div>
                  </li>
                  <li> <span class="item-key">Gender</span>
                    <div class="vcard-item"><?php echo $user_results_mypro['gender'];?></div>
                  </li>
                </ul>
                <div  style="text-align:left"><a href="edit_userprofile.php?id=<?php echo $user_results_mypro['id'];?>" ><i class="splashy-pencil"></i>Edit Myprofile</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
  <?php require 'common/admin-sidebar.php';require 'common/admin-js-scrips.php';?>
</div>
</body>
</html>
