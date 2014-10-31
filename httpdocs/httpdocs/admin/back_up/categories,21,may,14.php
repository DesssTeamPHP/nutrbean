<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 08/5/2014 
  * Last Date: 08/5/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/


 include('core/configuration.php');
     error_reporting(0);
      if(isset($_REQUEST['cat_id']))
	 {
       $categoryval_tablename                 =    CATEGORIES ;
	  $fieldname_one                           =    'categories_id';
	  $fieldname_one_value                     =    $_REQUEST['cat_id'];
	  $categoryval_select                      =    $Core_Mysql->select_one_where($categoryval_tablename,$fieldname_one,$fieldname_one_value);
	  $categoryval_execute                     =    $Core_Mysql->db_query($categoryval_select);
	  $categoryval_results                     =    $Core_Mysql->db_fetch_array($categoryval_execute);
	  $categoryval_num_Records                 =    $Core_Mysql->get_num_record($categoryval_execute);
	   $h1= $categoryval_results ['categories_name'];
	   $id = $categoryval_results ['categories_id'];
	  }
	  else
	  {
		 $h1='Add New Root Category';
		 $categoryval_results ['categories_name']='';
		 $categoryval_results ['categories_active']='';
		 $categoryval_results['category_image_thump']='';
		 $categoryval_results['categories_image']='';
		 $categoryval_results ['meta_title']='';
		 $categoryval_results ['meta_key']='';
		 $categoryval_results ['meta_desc']='';
		 $categoryval_results ['categories_description']='';
		 $categoryval_results ['navigation_status']='';
		 $id = $categoryval_results ['categories_id'];
	  }




$category_tablename                     =    CATEGORIES;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$Categ_Name	                         = $_REQUEST['Categ_Name'];
$Category_Active                     = $_REQUEST['Category_Active'];
$categories_desc                     = $_REQUEST['categories_desc'];
$Category_title                      = $_REQUEST['Category_title'];
$Category_Keywords                   = $_REQUEST['Category_Keywords'];
$Category_Description                = $_REQUEST['Category_Description'];
$Category_Navigation                 = $_REQUEST['Category_Navigation'];
$parent_id                           = $_REQUEST['parent_id'];

$fname                               = $_FILES['imgname']['name'];
$tmpname                             = $_FILES['imgname']['tmp_name'];
$path                                = "uplodeImage/thumbImg/";
$file_name_img                       = basename($fname);
$p_small                             = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);


$fname1                               = $_FILES['image']['name'];
$tmpname1                             = $_FILES['image']['tmp_name'];
$path1                                = "uplodeImage/image/";
$file_name_img1                       = basename($fname1);
$p_small1                             = $path1.$fname1;
move_uploaded_file($tmpname1,$path1.$fname1);

if($fname1=='')
{
$file_name_img1              = 	$imghiddenicon;
}


$Field_types           = array('parent_id'                 => $parent_id,
                               'categories_name'           => $Categ_Name,
							   'categories_description'    => $categories_desc,
							   'meta_title'                => $Category_title,
                               'meta_desc'                 => $Category_Description,
						       'meta_key'                  => $Category_Keywords,
							   'categories_image'          => $file_name_img1,
							   'category_image_thump'      => $file_name_img,
							   'navigation_status'         => $Category_Navigation,
							   'categories_active'         => $Category_Active,
							   'date_added'                => date('Y-m-d H:i:s')
                              );
						   
				   
						   
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($category_tablename,$Field_types);

        if($Message_admin != 0)
           {
			 
		       header('Location:categories.php?cat_id='.$Message_admin.'&msg=successadd');
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}

if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id	                                 = $_REQUEST['id'];
//$categories_id	                     = $_REQUEST['categories_id'];
$Categ_Name	                         = $_REQUEST['Categ_Name'];
$Category_Active                     = $_REQUEST['Category_Active'];
$categories_desc 	                 = $_REQUEST['categories_desc'];
$Category_title                      = $_REQUEST['Category_title'];
$Category_Keywords                   = $_REQUEST['Category_Keywords'];
$Category_Description                = $_REQUEST['Category_Description'];
$Category_Navigation                 = $_REQUEST['Category_Navigation'];
$imghidden                           = $_REQUEST['imghidden'];
$imghiddenicon                       = $_REQUEST['imghiddenicon'];



$category_tablename                     =    CATEGORIES;
$FieldName                               =  'categories_id';	



$fname                               = $_FILES['imgname']['name'];
$tmpname                             = $_FILES['imgname']['tmp_name'];
$path                                = "uplodeImage/thumbImg/";
$file_name_img                       = basename($fname);
$p_small                             = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);
if($fname=='')
{
$file_name_img              = 	$imghidden;
}



$fname1                               = $_FILES['image']['name'];
$tmpname1                             = $_FILES['image']['tmp_name'];
$path1                                = "uplodeImage/image/";
$file_name_img1                       = basename($fname1);
$p_small1                             = $path1.$fname1;
move_uploaded_file($tmpname1,$path1.$fname1);

if($fname1=='')
{
$file_name_img1              = 	$imghiddenicon;
}


$Field_types           = array('categories_name'           => $Categ_Name,
							   'categories_description'    => $categories_desc,
							   'meta_title'                => $Category_title,
                               'meta_desc'                 => $Category_Description,
						       'meta_key'                  => $Category_Keywords,
							   'categories_image'          => $file_name_img1,
							   'category_image_thump'      => $file_name_img,
							   'navigation_status'         => $Category_Navigation,
							   'categories_active'         => $Category_Active,
							   'date_added'                => date('Y-m-d H:i:s')
                              );
						 // print_r($Field_types); die;
   $Message_admin      =  $Core_Mysql->update_common_query($category_tablename,$FieldName,$Field_types,$id);

        if($Message_admin != 0)
           {
			 
		       header('Location:categories.php?cat_id='.$id);
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}

if(isset($_REQUEST['Delete']) !='' && $_REQUEST['Delete']=='Delete')
{ 
      $id	                              = $_REQUEST['id'];
	  
	  
	     $qry = "select * from categories where parent_id	=".$id; 
		$qry_result = mysql_query($qry);
		  if(mysql_num_rows($qry_result)  >0)
		{ 
	   header("Location:categories.php?msg=havechild&cat_id=".$id );exit;
	   }else
	   {
	  
      $category_tablename                 =    CATEGORIES;
	  $fieldname_one                      =    'categories_id';
	  $fieldname_one_value                =    $id;
	  $category_delete                    =    $Core_Mysql->delete_common_query($category_tablename,$fieldname_one,$fieldname_one_value);
	  $category_execute                   =    $Core_Mysql->db_query($category_delete);
 header("Location:categories.php?msg=successdele" );exit;

}

}





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php include('common/admin-top-header.php');?>
<style>
.topnav {
	width: 213px;
	padding: 40px 28px 25px 0;
	font-family: 'PT Sans', sans-serif;
}
ul.topnav {
	padding: 0;
	margin: 0;
	font-size: 1em;
	line-height: 0.5em;
	list-style: none;
}
ul.topnav li {
position:relative;
}
ul.topnav li a {
	line-height: 10px;
	font-size: 11px;
	/*padding: 10px 5px;*/
	padding:10px 5px 10px 30px;
	color: #000;
	display: block;
	text-decoration: none;
	font-weight: bolder;
}
ul.topnav li a:hover {
	background-color:#675C7C;
	color:white;
}
ul.topnav ul {
	margin: 0 0 0 20px;
	padding: 0;
	display: none;
}
ul.topnav ul li {
	margin: 0;
	padding: 0;
	clear: both;
	list-style:none
}
li .active {
	background-color:#33CC66;
	list-style:none;
}
ul.topnav ul li a {
	padding-left: 30px;
	font-size: 10px;
	font-weight: normal;
	outline:0;
}
ul.topnav ul li a:hover {
	background-color:#D3C99C;
	color:#000000;
}
ul.topnav ul ul li a {
	color:silver;
	padding-left: 40px;
	color:#000000;
}
ul.topnav ul ul li a:hover {
	background-color:#D3CEB8;
	color:#000000;
}
ul.topnav p span {
	float:left;
	margin:29px 4px 0px 7px;
	cursor:pointer;
}

.tpactive { background-color:#33CC66; }
.active_new { background-color:#33CC66; }
.novalid {
margin: 0px;
padding: 0px;
position: absolute;
top: -18px;
}
.novalid span{
margin:0px;
padding:0px;
font-weight:bold;
}
</style>
<script language="javascript">
function validsignup()
	{
	
     
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;
		//var letters = /^[A-Za-z ]{3,50}$/;
		
		var Categ_Name=document.getElementById('Categ_Name');
		var Category_title=document.getElementById('Category_title');
		
		
		
		if(Categ_Name.value=="")
		{
			alert("Please Enter Category Name");
			Categ_Name.focus();
			return false;
		}
		else if(Categ_Name.value.length>100)
		{
			alert("Please Enter Category Name");
			Categ_Name.focus();
			return false;
		}
		else if(Category_title.value=="")
		{
			alert("Please Enter Page Title");
			Category_title.focus();
			return false;
		}
		else if(Category_title.value.length>100)
		{
			alert("Please Enter Page Title");
			Category_title.focus();
			return false;
		}
		
		else
		{
			document.content_add.submit();
			return true;
		}
	}
	
 
	</script>
<div id="maincontainer" class="clearfix">
  <?php include('common/admin-header.php');?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="col-sm-12 col-md-12" id="frame_ajax">
        <div class="row">
          <form class="form_validation_content" method="post" enctype="multipart/form-data">
            <div class="class="col-sm-12 col-md-12"">
              <div class="mov_head">
                <h3 class="heading"><?php echo $h1;?>
                </h3>
                <div class="move_button" style="float:right; margin-top:-65px; margin-right:20px;"  >
                  <?php if(isset($_REQUEST['cat_id'])!= '')
			       {
                   
        
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
          <a  href="categories.php?parent_id=<?php echo $_REQUEST['cat_id']?>" style="float:left; margin-top:2px;" class="btn btn-default button-next">Add Sub Category<i class="glyphicon glyphicon-chevron-right"></i></a>&nbsp;
                  <?php } ?>
                  <button class="btn btn-primary"  name="Update" type="submit" value="Update" onclick="return validsignup()">Update</button>
                  <button class="btn btn-primary"  name="Delete" type="submit" value="Delete" onclick='return myFunction();'>Delete</button>
                  <?php  }
			     else
			      {?>
                  <button class="btn btn-primary"  name="Save" type="submit" value="submit" onclick="return validsignup()">Save</button>
                  <?php }
			   ?>
                  <input type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">
                </div>
              </div>
              <div id="showww">
                <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='successadd')
		  {
		  print_r(error_notification_message(CATEGORIES_SUCCESSADD));	
		  }
		  else if($_REQUEST['msg']=='successupd')
		  {
			print_r(error_notification_message(CATEGORIES_SUCCESSUPD));	  
		  }
		   else if($_REQUEST['msg']=='havechild')
		  {
			print_r(error_notification_message(CATEGORIES_HAVECHILD));	  
		  }
		  else
		  {
			print_r(error_notification_message(CATEGORIES_SUCCESSDEL));  
		  }
		  }
		  ?>
              </div>
              <div class="tabbable tabbable-bordered">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_br1" data-toggle="tab">General Information</a></li>
                  <li><a href="#tab_br2" data-toggle="tab"> Category Products</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_br1">
                    <!--  Category*************************************************************88-->
                    <div class="row" id="showval">
                      <div class="col-sm-12 col-md-12">
                        <div class="formSep">
                          <div class="form-group">
                            <label>Name<span class="f_req">*</span>:</label>
                            <input name="Categ_Name"  id="Categ_Name"class="form-control" type="text" value="<?php echo  $categoryval_results['categories_name'];?>">
                          </div>
                          <div class="form-group">
                            <label>Is Active <span class="f_req">*</span>:</label>
                            <select name="Category_Active" id="Category_Active" class="form-control" >
                              <option value="Yes" <?php  if($categoryval_results ['categories_active']=='Yes'){echo"selected='selected'";}?> >Yes</option>
                              <option value="No" <?php  if($categoryval_results ['categories_active']=='No'){echo"selected='selected'";}?> >No</option>
                            </select>
                          </div>
                        </div>
                        <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                          <label>Thumbnail Image</label>
                          <div  class="fileupload-new img-thumbnail sepH_a">
                            <?php if($categoryval_results['category_image_thump']!='' & file_exists('uplodeImage/thumbImg/'.$categoryval_results['category_image_thump']))
				{?>
                            <img alt="" src="uplodeImage/thumbImg/<?php echo $categoryval_results['category_image_thump'];?>" width="168px" height="110px">
                            <?php }
				else 
				{?>
                            <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image">
                            <?php }?>
                          </div>
                          <div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
                          <div> <span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                            <input type="file" name="imgname" id="imgname" value="<?php echo  $categoryval_results ['category_image_thump'];?>">
                            <input type="hidden" name="imghidden" id="imghidden" value="<?php echo  $categoryval_results ['category_image_thump'];?>">
                            </span> <a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a> </div>
                        </div>
                        <div class="formSep">
                          <label>Description:</label>
                          <textarea name="categories_desc" id="categories_desc" value="" cols="10" rows="3" class="form-control"><?php echo $categoryval_results['categories_description'];?></textarea>
                          <input name="id"  id="id" class="form-control" type="hidden" value="<?php echo $_REQUEST['cat_id'];?>">
                        </div>
                        <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                          <label>Image </label>
                          <div  class="fileupload-new img-thumbnail sepH_a">
                            <?php if($categoryval_results['categories_image']!='' & file_exists('uplodeImage/image/'.$categoryval_results['categories_image']))
				{?>
                            <img alt="" src="uplodeImage/image/<?php echo $categoryval_results['categories_image'];?>" width="168px" height="110px">
                            <?php }
				else 
				{?>
                            <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image">
                            <?php }?>
                          </div>
                          <div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
                          <div> <span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                            <input type="file" name="image" id="image" value="<?php echo  $categoryval_results ['categories_image'];?>">
                            <input type="hidden" name="imghiddenicon" id="imghiddenicon" value="<?php echo  $categoryval_results ['categories_image'];?>">
                            </span> <a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a> </div>
                        </div>
                        <div class="form-group">
                          <label>Page Title:</label>
                          <input name="Category_title"  id="Category_title"class="form-control" type="text" value="<?php echo  $categoryval_results['meta_title'];?>">
                        </div>
                        <div class="formSep">
                          <label >Meta Keywords :</label>
                          <textarea name="Category_Keywords" id="Category_Keywords" value="" cols="10" rows="3" class="form-control"><?php echo  $categoryval_results['meta_key'];?></textarea>
                        </div>
                        <div class="formSep">
                          <label >Meta Description :</label>
                          <textarea name="Category_Description" id="Category_Description" value="" cols="10" rows="3" class="form-control"><?php echo  $categoryval_results['meta_desc'];?></textarea>
                        </div>
                        <div class="form-group">
                          <label>Include in Navigation Menu <span class="f_req">*</span>:</label>
                          <select name="Category_Navigation" id="Category_Navigation" class="form-control" >
                            <option value="Yes" <?php  if($categoryval_results ['navigation_status']=='Yes'){echo"selected='selected'";}?>>Yes</option>
                            <option value="No" <?php  if($categoryval_results ['navigation_status']=='No'){echo"selected='selected'";}?>>No</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!--  Category**************************End***********************************88-->
                  </div>
                  <div class="tab-pane " id="tab_br2">
                    <!--  Category*************************************************************88-->
                    <div class="row" id="showval">
                      <div class="col-sm-12 col-md-12">
                      
                      <table id="dt_product" class="table table-striped table-bordered dTableR">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Product Name</th>
                    <th>Product Description </th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Visibility</th>
                    <th>Status</th>
                    <th>Stock Availability</th>
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
                    <!--  Category**************************End***********************************88-->
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar">
  <div class="sidebar_inner_scroll">
    <div class="sidebar_inner">
      <h3>Categories</h3>
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
      <h3><a  href="categories.php" style="float:left; margin-top:2px;" class="btn btn-default button-next">Add New Root Category<i class="glyphicon glyphicon-chevron-right"></i></a></h3>
      <?php } ?>
      <div style="clear:both;"></div>
      <div id="container">
        <ul  class="topnav">
          <?php 
			

function recursive_menu($id)
	{
	
	
	if(isset($_REQUEST['cat_id']))
	$getva1=$_REQUEST['cat_id'];
	else
	$getva1=0;
	
	

		
	   $qry = "select * from categories where parent_id	=".$id; 
		$qry_result = mysql_query($qry);
		  if(mysql_num_rows($qry_result)  >0)
		{ 
		while($row = mysql_fetch_assoc($qry_result))
		{
		if($getva1==$row['categories_id'])
	$statue='class="active_new active"';
	else
	$statue='class=""';
	
	
		 $qry2= "select * from categories where parent_id	=".$row['categories_id'];
		$qry_result2 = mysql_query($qry2);
		  if(mysql_num_rows($qry_result2)  == '0')
		  {
		 echo '<li  '.$statue.' ><a href="categories.php?cat_id='.$row['categories_id'].'" >'.$row['categories_name'].'</a></li>';
		}
		else
		{
echo '<li '.$statue.'  ><p class="novalid"></p><a href="categories.php?cat_id='.$row['categories_id'].'"  >'.$row['categories_name'].'</a><ul>';		 
recursive_menu($row['categories_id']);
	echo '</ul></li>';  
		}
		}
		}
	
		
		
	}
		if(isset($_REQUEST['cat_id']))
	$getva1=$_REQUEST['cat_id'];
	else
	$getva1=0;
	 $qry = "select * from categories where parent_id = 0"; 
		$qry_result = mysql_query($qry);
		  if(mysql_num_rows($qry_result)  >0)
		{ 
		while($row = mysql_fetch_assoc($qry_result))
		{
			if($getva1==$row['categories_id'])
	$statue='class="active_new active"';
	else
	$statue='class=""';
		 $qry2= "select * from categories where parent_id	=".$row['categories_id'];
		$qry_result2 = mysql_query($qry2);
		  if(mysql_num_rows($qry_result2)  == '0')
		  {
		  echo '<li  '.$statue.' ><a href="categories.php?cat_id='.$row['categories_id'].'" >'.$row['categories_name'].'</a></li>';
		}
		else
		{
echo '<li '.$statue.' ><p class="novalid"></p><a href="categories.php?cat_id='.$row['categories_id'].'"   >'.$row['categories_name'].'</a><ul  >';	

	
	 recursive_menu($row['categories_id']);
	echo '</ul></li>';  
		}
		}	
		
		}
		
?>
        </ul>
      </div>
    </div>
  </div>
</div>

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
<!--<script src="js/gebo_datatables.js"></script>-->
  <script src="lib/smoke/smoke.js"></script>
  <script language="javascript" type="application/javascript">
   $(document).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script>
  <script>


  function goBack()
  {
  window.history.back()
  }
  
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
  <script type="text/javascript" src="js/scriptbreaker-multiple-accordion-1.js"></script>
  <script language="JavaScript">

$(document).ready(function() {
	$(".topnav").accordion({
		accordion:false,
		speed: 500,
		closedSign: '[+]',
		openedSign: '[-]'
	});
});

</script>
<?php
    if(isset($_REQUEST['cat_id']))
	 {
		 
		$select_pro ="select * from products where master_categories_id='".$_REQUEST['cat_id']."'";
		$product_ct        =  mysql_query($select_pro);
	    $productcnt        =  mysql_num_rows($product_ct);
		$query             =  mysql_fetch_array($product_ct);
		
		
		
		if($productcnt >0)
		    {
		
		
		$master_categories_id = $query['cat_id'];
		 
			}
		 ?>
<script>
		
		$(document).ready(function() {
		//* basic
	
		//* server side proccessing with hiden row
gebo_datatbles.dt_product();
        //* Table tools
		gebo_datatbles.dt_tools();	//gebo_datatbles.tree_c();
	});
		gebo_datatbles = {
		dt_a: function() {
			$('#dt_a').dataTable({
                "sDom": "<'row'<'col-sm-6'<'dt_actions'>l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                }
            });
		},
        dt_b: function() {
			$('#dt_b').dataTable({
				"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "sScrollX": "100%",
                "sScrollXInner": '110%',
                "sPaginationType": "bootstrap",
                "bScrollCollapse": true 
            });
		},
		dt_c: function() {
                
            var aaData = [];
            for ( var i=1, len=1000 ; i<=len ; i++ ) {
                aaData.push( [ i, i, i, i, i ] );
            };
            
            $('#dt_c').dataTable({
				"sDom": "<'row'<'col-sm-6'><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'>S>",
                "sScrollY": "200px",
                "aaData": aaData,
                "bDeferRender": true
			});
            
            $('#fill_table').click(function(){
                var aaData = [];
                for ( var i=1, len=50000; i <= len; i++){
                    aaData.push( [ i, i, i, i, i ] );
                };
               
                $('#dt_c').dataTable({
                    "sDom": "<'row'<'col-sm-6'><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'>S>",
                    "sScrollY": "200px",
                    "aaData": aaData,
                    "bDestroy": true,
                    "bDeferRender": true
                });
                $(this).remove();
                $('#entries').html('50 000');
                $('.dataTables_scrollHeadInner').css({'height':'34px','top':'0'});
            });
            
		},
		dt_d: function() {
		
			function fnShowHide( iCol ) {
				/* Get the DataTables object again - this is not a recreation, just a get of the object */
				var oTable = $('#dt_d').dataTable();
				 
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			};
			
			var oTable = $('#dt_d').dataTable({
				"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
				"sPaginationType": "bootstrap"
			});
			
			$('#dt_d_nav').on('click','li input',function(){
				fnShowHide( $(this).val() );
			});
		},
		dt_product: function(){
			if($('#dt_product').length) {

				var oTable;
 
				/* Formating function for row details */
				function fnFormatDetails ( nTr )
				{
					var aData = oTable.fnGetData( nTr );
					var sOut = '<table cellpadding="5" cellspacing="0" border="0" class="table table-bordered" >';
					sOut += '<tr><td>Rendering engine:</td><td>'+aData[2]+' '+aData[5]+'</td></tr>';
					sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
					sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
					sOut += '</table>';
					 
					return sOut;
				}
				
				oTable = $('#dt_product').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
					"sAjaxSource": "product_relate_ajax.php?id=<?php echo $id;?>",
					"aoColumns": [
						{ "sClass": "center", "bSortable": false },
						null,
						null,
						null,
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" }
					],
					"aaSorting": [[1, 'asc']]
				} );
				
                 
				$('#dt_product').on('click','tbody td img', function () {
					var nTr = $(this).parents('tr')[0];
					if ( oTable.fnIsOpen(nTr) )
					{
						/* This row is already open - close it */
						this.src = "img/details_open.png";
						oTable.fnClose( nTr );
					} else {
						/* Open this row */
						this.src = "img/details_close.png";
						oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
					}
				} );

			}
		},
        dt_tools: function() {
			if($('#dt_tools').length) {
                $('#dt_tools').dataTable({
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'col-sm-4'l><'col-sm-4 text-right'T><'col-sm-4'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    "oTableTools": {
                        "aButtons": [
                            "copy",
                            "print",
                            {
                                "sExtends":    "collection",
                                "sButtonText": 'Save <span class="caret" />',
                                "aButtons":    [ "csv", "xls", "pdf" ]
                            }
                        ],
                        "sSwfPath": "lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                    }
                });
            }
		}, tree_c: function() {
            $("#tree_c").dynatree({
                checkbox: true,
				  classNames: {checkbox: "dynatree-radio"},
                selectMode: 1,
                onSelect: function(select, node) {
				//$(input[name="searchBar"]).val('hi');
				$("#master_categories_id").val(node.data.key);
                   // var s = node.tree.getSelectedNodes().join(" | ");
                   // $("#tree_c_echoSelection").children('pre').text(s);
                }
            });

		}
	};
		</script>
        <?php } ?>

  <style>
.f-nav {background:#FFFF33; height:45px !important;  }
.y-nav { margin:5px 0px 3px 0px !important; margin-top:-45px !important; margin-right:20px !important;}
</style>
  <script type="text/javascript">

  
        $("document").ready(function () {
 $('body').removeClass("sidebar_hidden");
		
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('.mov_head').addClass("navbar navbar-default navbar-fixed-top f-nav");
					  $('.move_button').addClass("y-nav");
					
                } else {
                    $('.mov_head').removeClass("navbar navbar-default navbar-fixed-top f-nav");
					$('.move_button').removeClass("y-nav");
					
                }
            });
        });
		
    </script>
</div>
</body></html>