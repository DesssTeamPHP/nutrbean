<?php 
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 02/25/2014 
  * Last Date: 02/25/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
/*********************SELECT**********************************************/

      $user_tablename                   =    ADMIN;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_SESSION['userid'];
	  $user_select                      =    $Core_Mysql->select_one_where($user_tablename,$fieldname_one,$fieldname_one_value);
	  $user_execute                     =    $Core_Mysql->db_query($user_select);
	  $user_results_head                =    $Core_Mysql->db_fetch_array($user_execute);
	  $user_num_Records                 =    $Core_Mysql->get_num_record($user_execute);
	  if(!$_SESSION['userid'])
	  {
	header('location:index.php')	;  
	  }

/******************************============END==============************************/

?>
<header><nav class="navbar navbar-default navbar-fixed-top" role="navigation"> <div class="navbar-inner"> <div class="container"> 
<a class="brand pull-left" href="dashboard.php">DESSS <span class="sml_t">Easy Commerce V.1</span></a>
<?php
    
/*********************GROUP SELECT**********************************************/

      $group_tablenameval                   =    MENUGROUP;
	  $fieldname_one                        =    'admin_group_id';
	  $fieldname_one_value                  =    $user_results_head['groupid'];
	  $group_selectval                      =    $Core_Mysql->select_one_where($group_tablenameval,$fieldname_one,$fieldname_one_value);
	  $group_executeval                     =    $Core_Mysql->db_query($group_selectval);
	  $Group_resultsval                     =    $Core_Mysql->db_fetch_array($group_executeval);
	  $groupnum_Records                     =    $Core_Mysql->get_num_record($group_executeval);

/******************************============END==============************************/
/*********************MENUGROUPCHILD SELECT**********************************************/
 
      $menu_tablenameval                    =    MENUGROUPCHILD;
	  $fieldname_one                        =    'admin_menugroupid';
	  $fieldname_one_value                  =    $Group_resultsval['admin_group_id'];
	  $menu_selectval                       =    $Core_Mysql->select_one_where($menu_tablenameval,$fieldname_one,$fieldname_one_value);
	  $menu_executeval                      =    $Core_Mysql->db_query($menu_selectval);
	  $menu_resultsval                      =     $Core_Mysql->db_fetch_array($menu_executeval);
	  $menunum_Records                      =    $Core_Mysql->get_num_record($menu_executeval);



/******************************============END==============************************/
if($menunum_Records!='0')
{
$menus="";
?>
<ul class="nav navbar-nav" id="mobile-nav">
<?php
$query = "select b.admin_menuname as admin_menuname,b.admin_menuurl as admin_menuurl,b.admin_menuid as admin_menuid from menu_group_child a,admin_cms_menu b where a.admin_menugroupid=".$menu_resultsval['admin_menugroupid']." and a.admin_menuid=b.admin_menuid and a.parent_id ='0'";
	$exQuery = mysql_query($query);
    $menu1count = mysql_num_rows($exQuery);
	$count=1;

	while($row = mysql_fetch_array($exQuery))
	{
	 
	$numberRow = "select b.admin_menuname as admin_menuname,b.admin_menuurl as admin_menuurl,b.admin_menuid as admin_menuid from menu_group_child a,admin_cms_menu b where a.admin_menugroupid=".$menu_resultsval['admin_menugroupid']." and   a.admin_menuid=b.admin_menuid and a.parent_id = ".$row['admin_menuid']; 
		$numberRow1= mysql_query($numberRow);
		$numberRow2 = mysql_num_rows($numberRow1);
		
		if($numberRow2 == '0')
		{   
			
			$menus.='<li ><a href="'.$row['admin_menuurl'].'" >'.$row['admin_menuname'].'</a></li>';
		}
		else
		{
			$menus.='<li class="dropdown"><a  href="'.$row['admin_menuurl'].'" >'.$row['admin_menuname'].'<b class="caret"></b></a><ul class="dropdown-menu">';
			
			$subMenu = "select b.admin_menuname as admin_menuname,b.admin_menuurl as admin_menuurl,b.admin_menuid as admin_menuid from menu_group_child a,admin_cms_menu b where a.admin_menugroupid=".$menu_resultsval['admin_menugroupid']." and a.admin_menuid=b.admin_menuid and  a.parent_id =".$row['admin_menuid'];
			$subMenu1 = mysql_query($subMenu);
			
			$numbersub2 = mysql_num_rows($subMenu1);
			
					 $nubsubcount=1;
			
			while($row1 = mysql_fetch_array($subMenu1))
			{
	
							
				$numberRow3 = "select b.admin_menuname as admin_menuname,b.admin_menuurl as admin_menuurl,b.admin_menuid as admin_menuid from menu_group_child a,admin_cms_menu b where a.admin_menugroupid=".$menu_resultsval['admin_menugroupid']." and a.admin_menuid=b.admin_menuid and  a.parent_id =".$row1['admin_menuid'];
				$numberRow4= mysql_query($numberRow3);
				$numberRow5 = mysql_num_rows($numberRow4);
				if($numberRow5 == '0')
				{
					$menus.='<li><a href="'.$row1['admin_menuurl'].'">'.$row1['admin_menuname'].'</a></li>';
					
				}
				else
				{   
			
					$menus.='<li><a  href="'.$row1['admin_menuurl'].'">'.$row1['admin_menuname'].'<b class="caret-right"></b></a><ul class="dropdown-menu">';
					$inserSubMenu ="select b.admin_menuname as admin_menuname,b.admin_menuurl as admin_menuurl,b.admin_menuid as admin_menuid from menu_group_child a,admin_cms_menu b where a.admin_menugroupid=".$menu_resultsval['admin_menugroupid']." and a.admin_menuid=b.admin_menuid and  a.parent_id =".$row1['admin_menuid'];
					$inserSubMenu1 = mysql_query($inserSubMenu);
					$numbersub22 = mysql_num_rows($inserSubMenu1);
					
					while($row2 = mysql_fetch_array($inserSubMenu1))
					{
			
					
						$menus.='<li><a  href="'.$row2['admin_menuurl'].'">'.$row2['admin_menuname'].'</a>';
						
				
				}
				
				
				$menus.='</ul></li>';	
					}
				
				}
				$menus.='</ul></li>';	
		$nubsubcount++;
		}	
	
	$count++;
		
		}
		
		 $menus .= '</ul>';
		 
		 echo $menus;
}
 ?>
<ul class="nav navbar-nav user_menu pull-right">
  <li class="hidden-phone hidden-tablet">
    <div class="nb_boxes clearfix"> <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a> </div>
  </li>
  <li class="divider-vertical hidden-sm hidden-xs"></li>
  <li class="dropdown"> <a href="javascrip:void(0)" class="dropdown-toggle" data-toggle="dropdown">
   <?php if (file_exists('img/profiles/'.$user_results_head['user_image'])) 
									{?>
    <img src="img/profiles/<?php echo $user_results_head['user_image'];?>" alt="" class="user_avatar">
    <?php 
									}
									else 
									{?>
    <img src="img/user_avatar.png" alt="" class="user_avatar">
    <?php } ?>
    <?php echo $user_results_head['username'];?><b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="myprofile.php">My Profile</a></li>
        <li><a href="change_password.php">Change Password</a></li>
      <li class="divider"></li>
      <li><a href="index.php">Log Out</a></li>
    </ul>
  </li>
</ul>
</div>
</div>
</nav>
<div class="modal fade" id="myMail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">New Messages</h3>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
        <table class="table table-condensed table-striped" data-provides="rowlink">
          <thead>
            <tr>
              <th>Sender</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Size</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Declan Pamphlett</td>
              <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
              <td>23/05/2012</td>
              <td>25KB</td>
            </tr>
            <tr>
              <td>Erin Church</td>
              <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
              <td>24/05/2012</td>
              <td>15KB</td>
            </tr>
            <tr>
              <td>Koby Auld</td>
              <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
              <td>25/05/2012</td>
              <td>28KB</td>
            </tr>
            <tr>
              <td>Anthony Pound</td>
              <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
              <td>25/05/2012</td>
              <td>33KB</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">Go to mailbox</button>
      </div>
    </div>
  </div>
</div>
</header>
