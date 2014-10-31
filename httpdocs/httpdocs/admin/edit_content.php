<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 03/4/2014 
  * Last Date: 03/4/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Edit-Content-Page";
error_reporting(0);
/*********************Blog SELECT**********************************************/

      $page_tablename                   =    MENUPAGETABLE;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $page_select                      =    $Core_Mysql->select_one_where($page_tablename,$fieldname_one,$fieldname_one_value);
	  $page_execute                     =    $Core_Mysql->db_query($page_select);
	  $Content_results                  =    $Core_Mysql->db_fetch_array($page_execute);
	  $pagenum_Records                  =    $Core_Mysql->get_num_record($page_execute);

/******************************============END==============************************/

 $page_tablename                     =    MENUPAGETABLE;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$page_category	                     = $_REQUEST['page_category'];
$Content_meta_title                  = $_REQUEST['Content_meta_title'];
$Content_description                 = $_REQUEST['Content_description'];
$description                         = $_REQUEST['description'];
$Content_keyword                     = $_REQUEST['Content_keyword'];
$Content_Misc                        = $_REQUEST['Content_Misc'];
$Content_h1                          = $_REQUEST['Content_h1'];
$Content_h2                          = $_REQUEST['Content_h2'];
$real_description                    = $_REQUEST['wysiwg_full'];
$Content_imagealt                    = $_REQUEST['Content_imagealt'];
$imghidden                           = $_REQUEST['imghidden'];
$imghiddenicon                       = $_REQUEST['imghiddenicon'];
$redirect 		                     = $_REQUEST['old_url'];
$checkval	                         = $_REQUEST["checkval"];

	if($_REQUEST['checkval']=='1')
				{
      $unlink_tablename                 =    MENUPAGETABLE;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $unlink_select                    =    $Core_Mysql->select_one_where($unlink_tablename,$fieldname_one,$fieldname_one_value);
	  $unlink_execute                   =    $Core_Mysql->db_query($unlink_select);
	  $unlink_results                   =    $Core_Mysql->db_fetch_array($unlink_execute);
	  $pagenum_Records                  =    $Core_Mysql->get_num_record($page_execute);	
      $file_del                         = $unlink_results['file_name']; 
	  $name                             = $_SERVER['DOCUMENT_ROOT']."/";
				                        unlink($name.$file_del);
	  $Content_Page                     = $_REQUEST['Content_Page'];
			  }
				else
				{
				$Content_Page                        = $_REQUEST['Content_Page'];
				}



$fname                               = $_FILES['imgname']['name'];
$tmpname                             = $_FILES['imgname']['tmp_name'];
$path                                = "uplodeImage/thumbImg/";
$file_name_img                       = basename($fname);
$p_small                             = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);


$fname1                               = $_FILES['iconimg']['name'];
$tmpname1                             = $_FILES['iconimg']['tmp_name'];
$path1                                = "uplodeImage/iconimg/";
$file_name_img1                       = basename($fname1);
$p_small1                             = $path1.$fname1;
move_uploaded_file($tmpname1,$path1.$fname1);

if($fname1=='')
{
$file_name_img1              = 	$imghiddenicon;
}


$Field_types           = array('meta_title'           => $Content_meta_title,
                               'meta_content'         => $Content_description,
							   'meta_keyword'         => $Content_keyword,
							   'meta_misc'            => $Content_Misc,
                               'h1_title'             => $Content_h1,
						       'h2_title'             => $Content_h2,
							   'page_category'        => $page_category,
						       'image'                => $file_name_img,
                               'file_name'            => $Content_Page,
							   'redirect_url'         => $redirect,
							   'checkval'             => $checkval,
							   'img_alt'              => $Content_imagealt,
							   'real_description'     => $real_description,	
							   'iconimg'              => $file_name_img1,
							   'description'          => $description,					      
							   'created_date'         => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($page_tablename,$Field_types);

        if($Message_admin != 0)
           {
			   
			    $data = array('msg' =>'added');
			   $send_val		=	http_build_query($data);
               header("Location:main_page.php?".$send_val);
			   
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                                  = $_REQUEST['id'];
$page_category	                     = $_REQUEST['page_category'];
$Content_meta_title                  = $_REQUEST['Content_meta_title'];
$Content_description                 = $_REQUEST['Content_description'];
$description                         = $_REQUEST['description'];
$Content_keyword                     = $_REQUEST['Content_keyword'];
$Content_Misc                        = $_REQUEST['Content_Misc'];
$Content_h1                          = $_REQUEST['Content_h1'];
$Content_h2                          = $_REQUEST['Content_h2'];
$real_description                    = $_REQUEST['wysiwg_full'];
$Content_imagealt                    = $_REQUEST['Content_imagealt'];
$imghidden                           = $_REQUEST['imghidden'];
$imghiddenicon                       = $_REQUEST['imghiddenicon'];
$redirect 		                     = $_REQUEST['old_url'];
$checkval	                         = $_REQUEST["checkval"];

	if($_REQUEST['checkval']=='1')
				{
      $unlink_tablename                 =    MENUPAGETABLE;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $unlink_select                    =    $Core_Mysql->select_one_where($unlink_tablename,$fieldname_one,$fieldname_one_value);
	  $unlink_execute                   =    $Core_Mysql->db_query($unlink_select);
	  $unlink_results                   =    $Core_Mysql->db_fetch_array($unlink_execute);
	  $pagenum_Records                  =    $Core_Mysql->get_num_record($page_execute);	
      $file_del                         = $unlink_results['file_name']; 
	  $name                             = $_SERVER['DOCUMENT_ROOT']."/";
				                        unlink($name.$file_del);
	  $Content_Page                     = $_REQUEST['Content_Page'];
			  }
				else
				{
				$Content_Page                        = $_REQUEST['Content_Page'];
				}




$fname                               = $_FILES['imgname']['name'];
$tmpname                             = $_FILES['imgname']['tmp_name'];
$path                                = "uplodeImage/thumbImg/";
$file_name_img                       = basename($fname);
$p_small                             = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);

if($fname=='')
{
$file_name_img               = 	$imghidden;
}


$fname1                               = $_FILES['iconimg']['name'];
$tmpname1                             = $_FILES['iconimg']['tmp_name'];
$path1                                = "uplodeImage/iconimg/";
$file_name_img1                       = basename($fname1);
$p_small1                             = $path1.$fname1;
move_uploaded_file($tmpname1,$path1.$fname1);

if($fname1=='')
{
$file_name_img1              = 	$imghiddenicon;
}

/***************************************//////*******************************************************/
$page_tablename       =  MENUPAGETABLE;//table_name
$FieldName            =  'id';
/*****************************************///////**************************************************//


$Field_types           = array('meta_title'           => $Content_meta_title,
                               'meta_content'         => $Content_description,
							   'meta_keyword'         => $Content_keyword,
							   'meta_misc'            => $Content_Misc,
                               'h1_title'             => $Content_h1,
						       'h2_title'             => $Content_h2,
							   'page_category'        => $page_category,
						       'image'                => $file_name_img,
                               'file_name'            => $Content_Page,
							   'redirect_url'         => $redirect,
							   'checkval'             => $checkval,
							   'img_alt'              => $Content_imagealt,
							   'real_description'     => $real_description,	
							   'iconimg'              => $file_name_img1,
							   'description'          => $description,					      
							   'created_date'         => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			   
			   $data = array('msg' =>'update');
			   $send_val		=	http_build_query($data);
               header("Location:main_page.php?".$send_val);
			  
           }
        else 
          {
 	       $Message_admin; 
          }




}
//******************************************Preview Function*****************************************************/

if(isset($_REQUEST['Preview'])!='' && $_REQUEST['Preview']=='Preview')
{
		     $id                                  = $_REQUEST['id'];
$page_category	                     = $_REQUEST['page_category'];
$Content_meta_title                  = $_REQUEST['Content_meta_title'];
$Content_description                 = $_REQUEST['Content_description'];
$description                         = $_REQUEST['description'];
$Content_keyword                     = $_REQUEST['Content_keyword'];
$Content_Misc                        = $_REQUEST['Content_Misc'];
$Content_h1                          = $_REQUEST['Content_h1'];
$Content_h2                          = $_REQUEST['Content_h2'];
$real_description                    = $_REQUEST['wysiwg_full'];
$Content_imagealt                    = $_REQUEST['Content_imagealt'];
$imghidden                           = $_REQUEST['imghidden'];
$imghiddenicon                       = $_REQUEST['imghiddenicon'];
$redirect 		                     = $_REQUEST['old_url'];
$checkval	                         = $_REQUEST["checkval"];

	if($_REQUEST['checkval']=='1')
				{
      $unlink_tablename                 =    MENUPAGETABLE;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $unlink_select                    =    $Core_Mysql->select_one_where($unlink_tablename,$fieldname_one,$fieldname_one_value);
	  $unlink_execute                   =    $Core_Mysql->db_query($unlink_select);
	  $unlink_results                   =    $Core_Mysql->db_fetch_array($unlink_execute);
	  $pagenum_Records                  =    $Core_Mysql->get_num_record($page_execute);	
      $file_del                         = $unlink_results['file_name']; 
	  $name                             = $_SERVER['DOCUMENT_ROOT']."/";
				                        unlink($name.$file_del);
	  $Content_Page                     = $_REQUEST['Content_Page'];
			  }
				else
				{
				$Content_Page                        = $_REQUEST['Content_Page'];
				}




$fname                               = $_FILES['imgname']['name'];
$tmpname                             = $_FILES['imgname']['tmp_name'];
$path                                = "../uplodeImage/thumbImg/";
$file_name_img                       = basename($fname);
$p_small                             = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);

if($fname=='')
{
$file_name_img               = 	$imghidden;
}


$fname1                               = $_FILES['iconimg']['name'];
$tmpname1                             = $_FILES['iconimg']['tmp_name'];
$path1                                = "../uplodeImage/iconimg/";
$file_name_img1                       = basename($fname1);
$p_small1                             = $path1.$fname1;
move_uploaded_file($tmpname1,$path1.$fname1);

if($fname1=='')
{
$file_name_img1              = 	$imghiddenicon;
}
				
$page_tablename       =  MENUPAGETABLE;//table_name
$FieldName            =  'id';			
				
			
$Field_types           = array('meta_title'           => $Content_meta_title,
                               'meta_content'         => $Content_description,
							   'meta_keyword'         => $Content_keyword,
							   'meta_misc'            => $Content_Misc,
                               'h1_title'             => $Content_h1,
						       'h2_title'             => $Content_h2,
							   'page_category'        => $page_category,
						       'image'                => $file_name_img,
                               'file_name'            => $Content_Page,
							   'redirect_url'         => $redirect,
							   'checkval'             => $checkval,
							   'img_alt'              => $Content_imagealt,
							   'real_description'     => $real_description,	
							   'iconimg'              => $file_name_img1,
							   'description'          => $description,					      
							   'created_date'         => date('Y-m-d H:i:s')
                              );
				//print_r($Field_types);die;	   
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 echo  mysql_error();
 //exit;
 
        if($Message_admin != 0)
           {
			   
               
              ?> 
               
              <script type="text/javascript" language="Javascript">window.open('preview.php?page_id=<?=$id?>');</script> 
              <?php
           }
        else 
          {
 	       $Message_admin; 
          }			
			
			
			
				
		
}


//******************************************End Preview Function*****************************************************/
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:main_page.php");
	}
?>
<script>
function goBack()
  {
  window.history.back()
  }
</script>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer" class="clearfixs">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 col-md-12">
      <h3 class="heading">Edit Content</h3>
         <?php echo $_REQUEST['msg']; ?>
		<form class="form_validation_content" method="post" enctype="multipart/form-data">
		
				<div class="formSep">
				<div class="form-group">
      
					<label>Meta-Title:<span class="f_req">*</span></label>
					<input name="Content_meta_title"  id="Content_meta_title"class="form-control" type="text" value="<?php echo $Content_results['meta_title'];?>">
				</div>
				<label>Meta-Description:</label>
				<input name="Content_description" id="Content_description" class="form-control" type="text" value="<?php echo $Content_results['meta_content'];?>">
			</div>
            <div class="formSep">
				<div class="form-group">
					<label>Meta-Keyword:</label>
					<input name="Content_keyword"  id="Content_keyword"class="form-control" type="text" value="<?php echo $Content_results['meta_keyword'];?>">
				</div>
                <div class="formSep">
				<label>Meta-Misc:</label>
				<textarea name="Content_Misc" id="Content_Misc" value="" cols="10" rows="3" class="form-control"><?php echo $Content_results['meta_misc'];?></textarea>
                <input name="id"  id="id" class="form-control" type="hidden" value="<?php echo $Content_results['id'];?>">
			</div>
				<label>H1 : <span class="f_req">*</span></label>
				<input name="Content_h1" id="Content_h1" class="form-control" type="text" value="<?php echo $Content_results['h1_title'];?>">
			</div>
				<div class="form-group">
					<label>H2:</label>
					<input name="Content_h2"  id="Content_h2"class="form-control" type="text" value="<?php echo $Content_results['h2_title'];?>">
				</div>
                <div class="formSep">
				<div class="form-group">
                    
					<label>Current Url:<span class="f_req">*</span></label>
					<input name="Content_Page"  id="Content_Page"class="form-control" type="text" value="<?php echo $Content_results['file_name'];?>">
                   
				</div>
                </div>
                 <div class="formSep">
                 <div class="form-group" style="text-decoration:none; ">
                  
                   <!--<label>Navigation Link:</label>-->
         <!--<a href="navi_each_page.php?id=<?php echo $_REQUEST['id'];?>"><button type="button"  class="btn btn-info">Sidebar Link</button> </a>&nbsp;&nbsp;&nbsp;
         <a href="content_info.php?page_id=<?php echo $_REQUEST['id'];?> "> <button type="button"   class="btn btn-info" >Image Description</button></a>&nbsp;&nbsp;&nbsp;
         <a href="featured_description.php?page_id=<?php echo $_REQUEST['id'];?>"> <button type="button"  class="btn btn-info"  >Add Features</button></a>&nbsp;&nbsp;&nbsp;-->
        <!-- <a href="featured_description1.php" ><button type="button"   class="btn btn-info" >Add Features1</button></a>&nbsp;&nbsp;&nbsp;-->
         </div>
          <!--<div class="form-group" style="text-decoration:none; ">
                   <label>Banner Upload</label>
         <a href="sub_page_banner_add.php?edit_id=<?php echo $_REQUEST['id'];?>"><button type="button"  class="btn btn-info">Sub Page Banner</button> </a>&nbsp;&nbsp;&nbsp;
         </div>-->
         </div>
            <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                    <label>Banner Upload <span class="f_req">*</span></label>
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a"><?php if($Content_results['image']!='')
				{?>
                 <img alt="" src="uplodeImage/thumbImg/<?php echo $Content_results['image'];?>" width="168px" height="110px">
	      <?php }
				else 
				{?>
                <img alt="" src="http://www.placehold.it/168x110/EFEFEF/AAAAAA&text=no+image">
          <?php }?>
                </div>
                
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
				<div>
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="imgname" id="imgname" value="<?php echo $Content_results['image'];?>"><input type="hidden" name="imghidden" id="imghidden" value="<?php echo $Content_results['image'];?>"></span>
					<a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a>
				</div>
			</div>
            
            <div class="form-group">
					<label>Image Alt Tag:</label>
					<input name="Content_imagealt"  id="Content_imagealt"class="form-control" type="text" value="<?php echo $Content_results['img_alt'];?>">
				</div>
			<div class="formSep">
            <label >Content :<span class="f_req">*</span></label>
          <textarea name="wysiwg_full" id="wysiwg_full" cols="20" rows="10" class="wysiwg_full"><?php echo $Content_results['real_description'];?></textarea>
          </div>
          
			<div class="form-actions">
            <?php if($_REQUEST['id'] != '')
			       {?>
					  <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>  
			<?php }
			   ?>
                <!--<button  type="submit" class="btn btn-primary"  name="Preview"  value="Preview">Preview</button>-->
				<input type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">
			</div>
		</form>
    </div>
    </div></div></div>
 <?php require 'common/admin-sidebar.php';?>
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

	<!-- validation -->
    <script src="lib/validation/jquery.validate.min.js"></script>
	<!-- validation functions -->
    <script src="js/validation_editcontent.js"></script>
    <!-- editor -->
   <script src="lib/tiny_mce/jquery.tinymce.js"></script>
   <!-- file explorer functions -->
    <script src="js/gebo_explorer.js"></script>
</div>
					</body>
				</html>