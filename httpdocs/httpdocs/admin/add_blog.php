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
$meta_title  =  "Add Blog-Page";
error_reporting(0);
/*********************Blog SELECT**********************************************/

      $Blog_tablename                   =    BLOG;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $Blog_select                      =    $Core_Mysql->select_one_where($Blog_tablename,$fieldname_one,$fieldname_one_value);
	  $Blog_execute                     =    $Core_Mysql->db_query($Blog_select);
	  $Blog_results                     =    $Core_Mysql->db_fetch_array($Blog_execute);
	  $Blog_num_Records                 =    $Core_Mysql->get_num_record($Blog_execute);

/******************************============END==============************************/

 $Blog_tablename             =    BLOG;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$Blog_title                  = addslashes($_REQUEST['Blog_title']);
$File_name                   = addslashes($_REQUEST['File_name']);
$Blog_Order                  = $_REQUEST['Blog_Order'];
$Blog_meta_title             = addslashes($_REQUEST['Blog_meta_title']);
$Blog_description            = addslashes($_REQUEST['Blog_description']);
$Blog_keyword                = addslashes( $_REQUEST['Blog_keyword']);
$Blog_h1                     = addslashes($_REQUEST['Blog_h1']);
$Blog_h2                     = addslashes($_REQUEST['Blog_h2']);
$description                 = strip_tags($_REQUEST['description']);
$real_description            = addslashes($_REQUEST['wysiwg_full']);

$fname                       = $_FILES['imgname']['name'];
$tmpname                     = $_FILES['imgname']['tmp_name'];
$path                        = "../uplodeImage/thumbImg/";
$file_name_img               = basename($fname);
$p_small                     = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);


$Field_types           = array('title'                => $Blog_title,
                               'file_name'            => $File_name,
							   'img_description'      => strip_tags($description),
							   'real_description'     => $real_description,
						       'blog_order'           => $Blog_Order,
							   'meta_title'           => $Blog_meta_title,
                               'meta_content'         => $Blog_description,
						       'meta_keyword'         => $Blog_keyword,
							   'h1_title'             => $Blog_h1,
                               'h2_title'             => $Blog_h2,
							   'is_menu'              => '45',
						       'image'                => $file_name_img,
						       'created_date'         => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($Blog_tablename,$Field_types);

        if($Message_admin != 0)
           {
			   
			   $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:blog.php?".$send_val);
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id                          = $_REQUEST['id'];
$Blog_title                  = addslashes($_REQUEST['Blog_title']);
$File_name                   = addslashes($_REQUEST['File_name']);
$Blog_Order                  = addslashes($_REQUEST['Blog_Order']);
$Blog_meta_title             = addslashes($_REQUEST['Blog_meta_title']);
$Blog_description            = addslashes($_REQUEST['Blog_description']);
$Blog_keyword                = addslashes($_REQUEST['Blog_keyword']);
$Blog_h1                     = addslashes($_REQUEST['Blog_h1']);
$Blog_h2                     = addslashes($_REQUEST['Blog_h2']);
$description                 = strip_tags($_REQUEST['description']);
$real_description            = addslashes($_REQUEST['wysiwg_full']);
$imghidden                   = $_REQUEST['imghidden'];

$fname                       = $_FILES['imgname']['name'];
$tmpname                     = $_FILES['imgname']['tmp_name'];
$path                        = "uplodeImage/thumbImg/";
$file_name_img               = basename($fname);
$p_small                     = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);
if($fname=='')
{
$file_name_img               = 	$imghidden;
}
/***************************************//////*******************************************************/
$Blog_tablename       =  BLOG;//table_name
$FieldName            =  'id';
/*****************************************///////**************************************************//


$Field_types           = array('title'                => addslashes($Blog_title),
                               'file_name'            => addslashes($File_name),
							   'img_description'      => strip_tags($description),
							   'real_description'     => $real_description,
						       'blog_order'           => $Blog_Order,
							   'meta_title'           => addslashes($Blog_meta_title),
                               'meta_content'         => addslashes($Blog_description),
						       'meta_keyword'         => addslashes($Blog_keyword),
							   'h1_title'             => addslashes($Blog_h1),
                               'h2_title'             => addslashes($Blog_h2),
							   'is_menu'              => '45',
						       'image'                => $file_name_img,
						       'created_date'         => date('Y-m-d H:i:s')
                              );
			   
 $Message_admin      =  $Core_Mysql->update_common_query($Blog_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 {
	echo mysql_error(); 
 }
        if($Message_admin != 0)
           {
			   $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:blog.php?".$send_val);
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: blog.php");
	}
?>
<script>
function goBack()
  {
  window.history.back()
  }
</script>
<script language="javascript">
function validsignup()
	{
	
     
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;
		//var letters = /^[A-Za-z ]{3,50}$/;
		
		var Blog_title=document.getElementById('Blog_title');
		var Blog_Order=document.getElementById('Blog_Order');
		
		
		if(Blog_title.value=="")
		{
			alert("Please Enter Blog Name");
			Blog_title.focus();
			return false;
		}
		else if(Blog_title.value.length>100)
		{
			alert("Please Enter Blog Name");
			Blog_title.focus();
			return false;
		}
		
		
		else if(Blog_Order.value=="")
		{
			alert("Please Enter Blog Order");
			Blog_Order.focus();
			return false;
		}
		else if(Blog_Order.value.length>100)
		{
			alert("Please Enter Blog Order");
			Blog_Order.focus();
			return false;
		}
		
		else
		{
			document.content_add.submit();
			return true;
		}
	}
	
 
	</script>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer"  class="clearfixs">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 col-md-12">
		<h3 class="heading">Blog</h3>
		<form class="form_validation_blog" method="post" enctype="multipart/form-data">
			<div class="formSep">
				<div class="form-group">
					<label>Blog Title:<span class="f_req">*</span></label>
					<input name="Blog_title"  id="Blog_title"class="form-control" type="text" value="<?php echo $Blog_results['title'];?>">
				</div>
				<label>File Name : <span class="f_req">*</span></label>
				<input name="File_name" id="File_name" class="form-control" type="text" value="<?php echo $Blog_results['file_name'];?>">
			</div>
            <div class="formSep">
				<div class="form-group">
					<label>Blog Order : <span class="f_req"></span></label>
				<input name="Blog_Order"  id="Blog_Order"class="form-control number_only_valiq" maxlength="3" type="text" value="<?php echo $Blog_results['blog_order'];?>">
                <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
				</div></div>
				<div class="formSep">
				<div class="form-group">
					<label>Meta-Title:<span class="f_req">*</span></label>
					<input name="Blog_meta_title"  id="Blog_meta_title"class="form-control" type="text" value="<?php echo $Blog_results['meta_title'];?>">
				</div>
				<label>Meta-Description: <span class="f_req">*</span></label>
				<input name="Blog_description" id="Blog_description" class="form-control" type="text" value="<?php echo $Blog_results['meta_content'];?>">
			</div>
            <div class="formSep">
				<div class="form-group">
					<label>Meta-Keyword:<span class="f_req">*</span></label>
					<input name="Blog_keyword"  id="Blog_keyword"class="form-control" type="text" value="<?php echo $Blog_results['meta_keyword'];?>">
				</div>
				<label>H1 : <span class="f_req">*</span></label>
				<input name="Blog_h1" id="Blog_h1" class="form-control" type="text" value="<?php echo $Blog_results['h1_title'];?>">
			</div>
				<div class="form-group">
					<label>H2:<span class="f_req">*</span></label>
					<input name="Blog_h2"  id="Blog_h2"class="form-control" type="text" value="<?php echo $Blog_results['h2_title'];?>">
				</div>
				
            <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                    <label>Image <span class="f_req">*</span></label>
				<div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a"><?php if($Blog_results['image']!='')
				{?>
                 <img alt="" src="uplodeImage/thumbImg/<?php echo $Blog_results['image'];?>" width="168px" height="110px">
	      <?php }
				else 
				{?>
                <img alt="" src="http://www.placehold.it/168x110/EFEFEF/AAAAAA&text=no+image">
          <?php }?>
                </div>
				<div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
				<div>
					<span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="imgname" id="imgname" value="<?php echo $Blog_results['image'];?>"><input type="hidden" name="imghidden" id="imghidden" value="<?php echo $Blog_results['image'];?>"></span>
					<a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a>
				</div>
			</div>
            <div class="formSep">
            <label >Short Description:</label>
          <textarea name="description" id="wysiwg_full1"  class="wysiwg_full" cols="30" rows="10"><?php echo $Blog_results['img_description'];?></textarea>
           </div>
			<div class="formSep">
            <label >Content :</label>
          <textarea name="wysiwg_full" id="wysiwg_full"  class="wysiwg_full" cols="30" rows="10"><?php echo $Blog_results['real_description'];?></textarea>
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
     <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a> 
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
    <script src="js/validation_blog.js"></script>
    <!-- editor -->
   <script src="lib/tiny_mce/jquery.tinymce.js"></script>
   <!-- file explorer functions -->
    <script src="js/gebo_explorer.js"></script>
    <script language="javascript" type="application/javascript">
   $( document ).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script>
</div>
					</body>
				</html>