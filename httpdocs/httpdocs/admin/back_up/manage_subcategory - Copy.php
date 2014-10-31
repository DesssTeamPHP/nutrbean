<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 12/5/2014 
  * Last Date: 12/5/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/

 include('core/configuration.php');
$category_tablename                      =    CATEGORIES;//table_name
if(isset($_REQUEST['SubCategory_Name']))
{
$SubCategory_Name	                     = $_REQUEST['SubCategory_Name'];
$SubCategory_Active                      = $_REQUEST['SubCategory_Active'];
$SubCategory_url                         = $_REQUEST['SubCategory_url'];
$subCategory_Description                 = $_REQUEST['subCategory_Description'];
$SubCategory_title                       = $_REQUEST['SubCategory_title'];
$SubCategory_Keywords                    = $_REQUEST['SubCategory_Keywords'];
$metaCategory_Description                = $_REQUEST['metaCategory_Description'];
$SubCategory_Navigation                  = $_REQUEST['SubCategory_Navigation'];
$subimgname                              = $_REQUEST['subimgname'];
$subimage                                = $_REQUEST['subimage'];
if($_REQUEST['Sub_id']=='')
{
$sub_id                                  = $_REQUEST['sub_id'];
}
else
{
	$sub_id                                  = $_REQUEST['Sub_id'];
}


$fname                               = $_FILES['subimgname']['name'];
$tmpname                             = $_FILES['subimgname']['tmp_name'];
$path                                = "uplodeImage/thumbImg/";
$file_name_img                       = basename($fname);
$p_small                             = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);


$fname1                               = $_FILES['subimage']['name'];
$tmpname1                             = $_FILES['subimage']['tmp_name'];
$path1                                = "uplodeImage/image/";
$file_name_img1                       = basename($fname1);
$p_small1                             = $path1.$fname1;
move_uploaded_file($tmpname1,$path1.$fname1);

if($fname1=='')
{
$file_name_img1              = 	$imghiddenicon;
}


$Field_types           = array('categories_name'           => $SubCategory_Name,
							   'categories_description'    => $subCategory_Description,
							   'meta_title'                => $SubCategory_title,
                               'meta_desc'                 => $metaCategory_Description,
						       'meta_key'                  => $SubCategory_Keywords,
							   'categories_image'          => $file_name_img1,
							   'category_image_thump'      => $file_name_img,
							    'url_name'                 => $SubCategory_url,
							   'navigation_status'         => $SubCategory_Navigation,
							   'categories_active'         => $SubCategory_Active,
							   'parent_id'                 => $sub_id,
							   'date_added'                => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($category_tablename,$Field_types);

        if($Message_admin != 0)
           {
			 
		       print_r(error_notification_message(CATEGORIES_SUCCESSADD));
           }
        else 
          {
 	       echo $Message_admin; 
          }
}
 if(isset($_REQUEST['Sub_id']))
	 {
       $categoryval_tablename_one                  =    CATEGORIES ;
	  $fieldname_one                               =    'categories_id';
	  $fieldname_one_value                         =    $_REQUEST['Sub_id'];
	  $categoryval_select_one                      =    $Core_Mysql->select_one_where($categoryval_tablename_one,$fieldname_one,$fieldname_one_value);
	  $categoryval_execute_one                     =    $Core_Mysql->db_query($categoryval_select_one);
	  $categoryval_results_one                     =    $Core_Mysql->db_fetch_array($categoryval_execute_one);
	  $categoryval_num_Records_one                 =    $Core_Mysql->get_num_record($categoryval_execute_one);
	  }
	  else
	  {
		 $categoryval_results_one ['categories_name']='';
		 $categoryval_results_one ['categories_active']='';
		 $categoryval_results_one ['category_image_thump']='';
		 $categoryval_results_one ['categories_image']='';
		 $categoryval_results_one ['url_name']='';
		 $categoryval_results_one ['meta_title']='';
		 $categoryval_results_one ['meta_key']='';
		 $categoryval_results_one ['meta_desc']='';
		 $categoryval_results_one ['navigation_status']='';
	  }
?>
<div id="ajaxdiv"  >
<div class="row"   >
    <div class="col-sm-12 col-md-12">
		<h3 class="heading">General Information</h3>
        <form class="form_validation_content" method="post"   id="reg_form"enctype="multipart/form-data">
                     <div class="formSep">
                     
				<div class="form-group">
					<label>Name<span class="f_req">*</span>:</label>
					<input name="SubCategory_Name"  id="SubCategory_Name"class="form-control" type="text" value="<?php echo  $categoryval_results_one ['categories_name'];?>">
				</div>
                <div class="form-group">
					<label>Is Active <span class="f_req">*</span>:</label>
					<select name="SubCategory_Active" id="SubCategory_Active" class="form-control" >
                    <option value="Yes" <?php  if($categoryval_results_one ['categories_active']=='Yes'){echo"selected='selected'";}?> >Yes</option>
                    <option value="No" <?php  if($categoryval_results_one ['categories_active']=='No'){echo"selected='selected'";}?> >No</option>
                    </select>
				</div>
                <div class="form-group">
					<label>Url Key<span class="f_req">*</span>:</label>
					<input name="SubCategory_url"  id="SubCategory_url"class="form-control" type="text" value="<?php echo  $categoryval_results_one ['url_name'];?>">
				</div>
			</div>
                
            <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                    <label>Thumbnail Image</label>
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
                  <?php if (file_exists('uplodeImage/thumbImg/'.$categoryval_results_one['category_image_thump'])) 
				{?>
                    <img class="thumbnail" style="width: 178px; height: 120px" alt="" src="uplodeImage/thumbImg/<?php echo $categoryval_results_one['category_image_thump'];?>">
                    <?php }
				else 
				{?>
                    <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image" />
                    <?php }?>
                </div>
                
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
				<div>
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="subimgname" id="subimgname" value="<?php echo  $categoryval_results_one ['category_image_thump'];?>"><input type="hidden" name="subimghidden" id="subimghidden" value="<?php echo  $categoryval_results_one ['category_image_thump'];?>"></span>
					<a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a>
				</div>
			</div>
            <div class="formSep">
				<label>Description:</label>
				<textarea name="subCategory_Description" id="subCategory_Description" value="" cols="10" rows="3" class="form-control"></textarea>
                <input name="id"  id="id" class="form-control" type="hidden" value="<?php echo $_REQUEST['cat_id'];?>">
                <input name="sub_id"  id="sub_id" class="form-control" type="hidden" value="<?php echo $_REQUEST['cat_id'];?>">
			</div>
            <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                    <label>Image </label>
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
                
                  <?php if (file_exists('uplodeImage/image/'.$categoryval_results_one['categories_image'])) 
				{?>
                    <img class="thumbnail" style="width: 178px; height: 120px" alt="" src="uplodeImage/image/<?php echo $categoryval_results_one['categories_image'];?>">
                    <?php }
				else 
				{?>
                    <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image" />
                    <?php }?>
                </div>
                
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
				<div>
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="subimage" id="subimage" value="<?php echo  $categoryval_results_one ['categories_image'];?>"><input type="hidden" name="imghiddenicon" id="imghiddenicon" value="<?php echo  $categoryval_results_one ['categories_image'];?>"></span>
					<a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a>
				</div>
			</div>
            <div class="form-group">
					<label>Page Title:</label>
					<input name="SubCategory_title"  id="SubCategory_title"class="form-control" type="text" value="<?php echo  $categoryval_results_one ['meta_title'];?>">
				</div>
          <div class="formSep">
           <label >Meta Keywords :</label>
         <textarea name="SubCategory_Keywords" id="SubCategory_Keywords" value="" cols="10" rows="3" class="form-control"><?php echo  $categoryval_results_one ['meta_key'];?></textarea>
           </div>
           <div class="formSep">
           <label >Meta Description :</label>
         <textarea name="metaCategory_Description" id="metaCategory_Description" value="" cols="10" rows="3" class="form-control"><?php echo  $categoryval_results_one ['meta_desc'];?></textarea>
           </div>
           <div class="form-group">
					<label>Include in Navigation Menu <span class="f_req">*</span>:</label>
					<select name="SubCategory_Navigation" id="SubCategory_Navigation" class="form-control" >
                    <option value="Yes" <?php  if($categoryval_results_one['navigation_status']=='Yes'){echo"selected='selected'";}?>>Yes</option>
                    <option value="No" <?php  if($categoryval_results_one['navigation_status']=='No'){echo"selected='selected'";}?>>No</option>
                    </select>
				</div>
			<div class="form-actions">
            
					<button class="btn btn-primary"  name="SubSave" id="subcat"  value="SubSave" onClick="return valid_subcategory();"  >Save</button>  
						<input type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">
			</div>
		</form>
    </div>
    </div>