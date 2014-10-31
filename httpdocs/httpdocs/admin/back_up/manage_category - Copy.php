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
      
      if(isset($_REQUEST['cat_id']))
	 {
       $categoryval_tablename                 =    CATEGORIES ;
	  $fieldname_one                           =    'categories_id';
	  $fieldname_one_value                     =    $_REQUEST['cat_id'];
	  $categoryval_select                      =    $Core_Mysql->select_one_where($categoryval_tablename,$fieldname_one,$fieldname_one_value);
	  $categoryval_execute                     =    $Core_Mysql->db_query($categoryval_select);
	  $categoryval_results                     =    $Core_Mysql->db_fetch_array($categoryval_execute);
	  $categoryval_num_Records                 =    $Core_Mysql->get_num_record($categoryval_execute);
	  }
	  else
	  {
		 $categoryval_results ['categories_name']='';
		 $categoryval_results ['categories_active']='';
		 $categoryval_results['category_image_thump']='';
		 $categoryval_results['categories_image']='';
		 $categoryval_results ['meta_title']='';
		 $categoryval_results ['meta_key']='';
		 $categoryval_results ['meta_desc']='';
		 $categoryval_results ['navigation_status']='';
	  }




$category_tablename                     =    CATEGORIES;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$Category_Name	                     = $_REQUEST['Category_Name'];
$Category_Active                     = $_REQUEST['Category_Active'];
$Category_Description                = $_REQUEST['Category_Description'];
$Category_title                      = $_REQUEST['Category_title'];
$Category_Keywords                   = $_REQUEST['Category_Keywords'];
$Category_Description                = $_REQUEST['Category_Description'];
$Category_Navigation                 = $_REQUEST['Category_Navigation'];


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


$Field_types           = array('categories_name'           => $Category_Name,
							   'categories_description'    => $Category_Description,
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
			 
		       header("Location:manage_category.php?msg=successadd" );
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}

if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id	                                 = $_REQUEST['id'];
$Category_Name	                     = $_REQUEST['Category_Name'];
$Category_Active                     = $_REQUEST['Category_Active'];
$Category_Description                = $_REQUEST['Category_Description'];
$Category_title                      = $_REQUEST['Category_title'];
$Category_Keywords                   = $_REQUEST['Category_Keywords'];
$Category_Description                = $_REQUEST['Category_Description'];
$Category_Navigation                 = $_REQUEST['Category_Navigation'];
$imghidden                           = $_REQUEST['imghidden'];
$imghiddenicon                       = $_REQUEST['imghiddenicon'];



$category_tablename                     =    CATEGORIES;

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


$Field_types           = array('categories_name'           => $Category_Name,
							   'categories_description'    => $Category_Description,
							   'meta_title'                => $Category_title,
                               'meta_desc'                 => $Category_Description,
						       'meta_key'                  => $Category_Keywords,
							   'categories_image'          => $file_name_img1,
							   'category_image_thump'      => $file_name_img,
							   'navigation_status'         => $Category_Navigation,
							   'categories_active'         => $Category_Active,
							   'date_added'                => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($category_tablename,$Field_types,$id);

        if($Message_admin != 0)
           {
			 
		       header("Location:manage_category.php?msg=successupd" );
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}

if(isset($_REQUEST['Delete']) !='' && $_REQUEST['Delete']=='Delete')
{ 
      $id	                              = $_REQUEST['id'];
      $category_tablename                 =    CATEGORIES;
	  $fieldname_one                      =    'categories_id';
	  $fieldname_one_value                =    $id;
	  $category_delete                    =    $Core_Mysql->delete_common_query($category_tablename,$fieldname_one,$fieldname_one_value);
	  $category_execute                   =    $Core_Mysql->db_query($category_delete);
 header("Location:manage_category.php?msg=successdele" );

}







?>

<!DOCTYPE html>
<html lang="en">

       <?php include('common/admin-top-header.php');?>
<div id="maincontainer" class="clearfix">
  <?php include('common/admin-header.php');?>
     
            <div id="contentwrapper">
                <div class="main_content">
                <div class="row">
    <div class="col-sm-12 col-md-12">
		
		<div class="row">
            
			<div class="class="col-sm-12 col-md-12"">
				<h3 class="heading">Default Category</h3>
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
		  else
		  {
			print_r(error_notification_message(CATEGORIES_SUCCESSDEL));  
		  }
		  }
		  ?></div>
				<div class="tabbable tabbable-bordered">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_br1" data-toggle="tab">General Information</a></li>
						<!--<li><a href="#tab_br2" data-toggle="tab"> Display Settings</a></li>
						<li><a href="#tab_br3" data-toggle="tab">Custom Design</a></li>-->
                        <li><a href="#tab_br2" data-toggle="tab"> Category Products</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_br1">
     <!--  Category*************************************************************88-->
						<div class="row" id="showval">
    <div class="col-sm-12 col-md-12">
		<h3 class="heading">General Information</h3>
        <form class="form_validation_content" method="post" enctype="multipart/form-data">
                     <div class="formSep">
                     
				<div class="form-group">
					<label>Name<span class="f_req">*</span>:</label>
					<input name="Category_Name"  id="Category_Name"class="form-control" type="text" value="<?php echo  $categoryval_results ['categories_name'];?>">
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
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
                  <?php if (file_exists('uplodeImage/thumbImg/'.$categoryval_results['category_image_thump'])) 
				{?>
                    <img class="thumbnail" style="width: 178px; height: 120px" alt="" src="uplodeImage/thumbImg/<?php echo $categoryval_results['category_image_thump'];?>">
                    <?php }
				else 
				{?>
                    <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image" />
                    <?php }?>
                </div>
                
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
				<div>
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="imgname" id="imgname" value="<?php echo  $categoryval_results ['category_image_thump'];?>"><input type="hidden" name="imghidden" id="imghidden" value="<?php echo  $categoryval_results ['category_image_thump'];?>"></span>
					<a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a>
				</div>
			</div>
            <div class="formSep">
				<label>Description:</label>
				<textarea name="Category_Description" id="Category_Description" value="" cols="10" rows="3" class="form-control"></textarea>
                <input name="id"  id="id" class="form-control" type="hidden" value="<?php echo $_REQUEST['cat_id'];?>">
			</div>
            <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                    <label>Image </label>
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
                
                  <?php if (file_exists('uplodeImage/image/'.$categoryval_results['categories_image'])) 
				{?>
                    <img class="thumbnail" style="width: 178px; height: 120px" alt="" src="uplodeImage/image/<?php echo $categoryval_results['categories_image'];?>">
                    <?php }
				else 
				{?>
                    <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image" />
                    <?php }?>
                </div>
                
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
				<div>
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image" id="image" value="<?php echo  $categoryval_results ['categories_image'];?>"><input type="hidden" name="imghiddenicon" id="imghiddenicon" value="<?php echo  $categoryval_results ['categories_image'];?>"></span>
					<a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a>
				</div>
			</div>
            <div class="form-group">
					<label>Page Title:</label>
					<input name="Category_title"  id="Category_title"class="form-control" type="text" value="<?php echo  $categoryval_results ['meta_title'];?>">
				</div>
          <div class="formSep">
           <label >Meta Keywords :</label>
         <textarea name="Category_Keywords" id="Category_Keywords" value="" cols="10" rows="3" class="form-control"><?php echo  $categoryval_results ['meta_key'];?></textarea>
           </div>
           <div class="formSep">
           <label >Meta Description :</label>
         <textarea name="Category_Description" id="Category_Description" value="" cols="10" rows="3" class="form-control"><?php echo  $categoryval_results ['meta_desc'];?></textarea>
           </div>
           <div class="form-group">
					<label>Include in Navigation Menu <span class="f_req">*</span>:</label>
					<select name="Category_Navigation" id="Category_Navigation" class="form-control" >
                    <option value="Yes" <?php  if($categoryval_results ['navigation_status']=='Yes'){echo"selected='selected'";}?>>Yes</option>
                    <option value="No" <?php  if($categoryval_results ['navigation_status']=='No'){echo"selected='selected'";}?>>No</option>
                    </select>
				</div>
			<div class="form-actions">
              <?php if(isset($_REQUEST['cat_id'])!= '')
			       {?>
					  <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button> 
                      <button class="btn btn-primary"  name="Delete" type="submit" value="Delete" onclick='return myFunction();'>Delete</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>  
			<?php }
			   ?>
				<input type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">
			</div>
		</form>
    </div>
    </div>	
    <!--  Category**************************End***********************************88-->
    

    <script type="text/javascript">

	
function valid_subcategory()
	{
	var SubCategory_Name 					    = document.getElementById('SubCategory_Name').value;
	var SubCategory_Active				        = document.getElementById('SubCategory_Active').value;
	var SubCategory_url 					    = document.getElementById('SubCategory_url').value;
    var subCategory_Description 			    = document.getElementById('subCategory_Description').value;
	var subimgname				                = document.getElementById('subimgname').value;
	var subimage 		                        = document.getElementById('subimage').value;
	var SubCategory_title				        = document.getElementById('SubCategory_title').value;
	var SubCategory_Keywords 		            = document.getElementById('SubCategory_Keywords').value;
	var metaCategory_Description				= document.getElementById('metaCategory_Description').value;
	var SubCategory_Navigation				    = document.getElementById('SubCategory_Navigation').value;
	var sub_id					                = document.getElementById('sub_id').value;

	validate_updateval(SubCategory_Name,SubCategory_Active,SubCategory_url,subCategory_Description,subimgname,subimage,SubCategory_title,SubCategory_Keywords,metaCategory_Description,SubCategory_Navigation,sub_id)
	return false;
	}
	
	function validate_updateval(SubCategory_Name,SubCategory_Active,SubCategory_url,subCategory_Description,subimgname,subimage,SubCategory_title,SubCategory_Keywords,metaCategory_Description,SubCategory_Navigation,sub_id)
     {
$.ajax({
type: "POST",
url: "http://192.168.1.233:230/ecom/manage_subcategory.php",
data: "&SubCategory_Name="+SubCategory_Name+"&SubCategory_Active="+SubCategory_Active+"&SubCategory_url="+SubCategory_url+"&subCategory_Description="+subCategory_Description+"&subimgname="+subimgname+"&subimage="+subimage+"&SubCategory_title="+SubCategory_title+"&SubCategory_Keywords="+SubCategory_Keywords+"&metaCategory_Description="+metaCategory_Description+"&SubCategory_Navigation="+SubCategory_Navigation+"&sub_id="+sub_id,

success: function(html){
//Calling the ajax process php url
<!--$("#showww").html(html);-->
//Calling the responce IDs
// window.location.href='http://192.168.1.233:230/balu/getcomputerjobs.com/jobseeker_myaccount_edit.php'; 
}
}); }
 </script>
    <!--  Sub Category*************************************************************88-->
    
                      <div class="row" id="hideval"  style="display:none" >
    <div class="col-sm-12 col-md-12">
		<h3 class="heading">General Information</h3>
        <form class="form_validation_content" method="post"   id="reg_form"enctype="multipart/form-data">
                     <div class="formSep">
                     
				<div class="form-group">
					<label>Name<span class="f_req">*</span>:</label>
					<input name="SubCategory_Name"  id="SubCategory_Name"class="form-control" type="text" value="">
				</div>
                <div class="form-group">
					<label>Is Active <span class="f_req">*</span>:</label>
					<select name="SubCategory_Active" id="SubCategory_Active" class="form-control" >
                    <option value="Yes" >Yes</option>
                    <option value="No"  >No</option>
                    </select>
				</div>
                <div class="form-group">
					<label>Url Key<span class="f_req">*</span>:</label>
					<input name="SubCategory_url"  id="SubCategory_url"class="form-control" type="text" value="">
				</div>
			</div>
                
            <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                    <label>Thumbnail Image</label>
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
               
                    <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image" />
                   
                </div>
                
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
				<div>
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="subimgname" id="subimgname" value=""><input type="hidden" name="subimghidden" id="subimghidden" value=""></span>
					<a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a>
				</div>
			</div>
            <div class="formSep">
				<label>Description:</label>
				<textarea name="subCategory_Description" id="subCategory_Description" value="" cols="10" rows="3" class="form-control"></textarea>
                <input name="id"  id="id" class="form-control" type="hidden" value="<?php echo $_REQUEST['cat_id'];?>">
                <input name="sub_id"  id="sub_id" class="form-control" type="hidden" value="<?php echo $_REQUEST['cat_id'];?>">
                 <input name="Sub_id"  id="Sub_id" class="form-control" type="hidden" value="<?php echo $_REQUEST['Sub_id'];?>">
			</div>
            <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                    <label>Image </label>
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
               
                    <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image" />
                   
                </div>
                
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
				<div>
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="subimage" id="subimage" value=""></span>
					<a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a>
				</div>
			</div>
            <div class="form-group">
					<label>Page Title:</label>
					<input name="SubCategory_title"  id="SubCategory_title"class="form-control" type="text" value="">
				</div>
          <div class="formSep">
           <label >Meta Keywords :</label>
         <textarea name="SubCategory_Keywords" id="SubCategory_Keywords" value="" cols="10" rows="3" class="form-control"></textarea>
           </div>
           <div class="formSep">
           <label >Meta Description :</label>
         <textarea name="metaCategory_Description" id="metaCategory_Description" value="" cols="10" rows="3" class="form-control"></textarea>
           </div>
           <div class="form-group">
					<label>Include in Navigation Menu <span class="f_req">*</span>:</label>
					<select name="SubCategory_Navigation" id="SubCategory_Navigation" class="form-control" >
                    <option value="Yes" >Yes</option>
                    <option value="No" >No</option>
                    </select>
				</div>
			<div class="form-actions">
            
					<button class="btn btn-primary"  name="SubSave" id="subcat"  value="SubSave" onClick="return valid_subcategory();"  >Save</button>  
						<input type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">
			</div>
		</form>
    </div>
    </div><div id="hidevalone"  ></div>
    <!--  Sub Category**************************End***********************************88-->
						</div>
						<div class="tab-pane" id="tab_br2">
								<div class="row">
    <div class="col-sm-12 col-md-12">
        <h3 class="heading">Category Product</h3> <!--class="btn btn-default" -->
        <table class="table table-striped table-bordered dTableR" id="dt_a">
            <thead>
            <tr>
					<th>id</th>
					<th>Name</th>
					<th>SKU </th>
					<th>Price</th>
				</tr>
</thead>
<tbody>
                <tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
	
</tbody>        </table>
    </div>
</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
</div>
  </div>          
          <?php
		   include('common/admin-sidebar1.php');
		  include('common/admin-js-scrips.php');?>
          
      <script type="text/javascript">
  /*  $(document).ready(function(){
    $("#subcat").click(function(){
     var form_data = $('#reg_form').serialize();
	 alert(form_data);
    $.ajax({
        type:"POST",
        url:"http://192.168.1.233:230/ecom/manage_subcategory.php",
        data:form_data,
        success: function(data)
        {
            $("#info").html(data);
        }

    });
    }); 

    });*/
    </script>       
</div>


</body>
</html>