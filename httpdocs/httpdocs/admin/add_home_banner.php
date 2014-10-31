<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: karuna karan
  * Date     : 02/25/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Add Home Banner Media-Page";
error_reporting(0);
/*********************Social Media SELECT**********************************************/

      $banner_tablename                 =    HOMEBANNER;
	  $fieldname_one                    =    'image_id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $banner_select                    =    $Core_Mysql->select_one_where($banner_tablename,$fieldname_one,$fieldname_one_value);
	  $banner_execute                   =    $Core_Mysql->db_query($banner_select);
	  $banner_results                   =    $Core_Mysql->db_fetch_array($banner_execute);
	  $banner_num_Records               =    $Core_Mysql->get_num_record($banner_execute);

/******************************============END==============************************/
//******************************************Insert Function*****************************************************/
$banner_tablename      =    HOMEBANNER;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 
$alt_text              = $_REQUEST['alt_text'];
$image_type            = $_REQUEST['image_type'];
$image_name            = $_REQUEST['image_name'];
$h1_title              = $_REQUEST['h1_title'];
$h2_title              = $_REQUEST['h2_title'];
$image_order 	       = $_REQUEST['image_order'];

$fname                 = $_FILES['imgName']['name'];
$tmpname               = $_FILES['imgName']['tmp_name'];
$path                  = "uplodeImage/banner/";
$file_name_img         = basename($fname);
$p_small               = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);

$Field_types           = array('alt_text'         => $alt_text,
                               'image_type'       => $image_type,
						       'image_name'       => $file_name_img,
						       'h1_title'         => $h1_title,
						       'h2_title'         => $h2_title,
						       'image_order'      => $image_order,
						       'Posted_Date'      => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin        =  $Core_Mysql->insert_common_query($banner_tablename,$Field_types);

     if($Message_admin != 0)
         {
			 
	$data             =  array('msg' =>'success');
	$send_val		  =	http_build_query($data);
    header("Location:banner_images.php?".$send_val);	 
			 
           }
        else 
          {
 	       $Message_admin; 
          }
		  
}
/***************************************///END///*******************************************************/
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$id 	               = $_REQUEST['id'];
$alt_text              = $_REQUEST['alt_text'];
$image_type            = $_REQUEST['image_type'];
$image_name            = $_REQUEST['image_name'];
$h1_title              = $_REQUEST['h1_title'];
$h2_title              = $_REQUEST['h2_title'];
$image_order 	       = $_REQUEST['image_order'];
$imghidden             = $_REQUEST['imghidden'];   
   
   
   
   
$fname                 = $_FILES['imgName']['name'];
$tmpname               = $_FILES['imgName']['tmp_name'];
$path                  = "uplodeImage/banner/";
$file_name_img         = basename($fname);
$p_small               = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);
if($fname=='')
{
	
$file_name_img         =$imghidden ;
}

/***************************************//////*******************************************************/
$banner_tablename      =  HOMEBANNER;//table_name
$FieldName             =  'image_id';
/*****************************************///////**************************************************//

 $Field_types          = array('alt_text'         => $alt_text,
                                'image_type'       => $image_type,
						        'image_name'       => $file_name_img,
						        'h1_title'         => $h1_title,
						        'h2_title'         => $h2_title,
						        'image_order'      => $image_order,
						        'Posted_Date'      => date('Y-m-d H:i:s')
                               );
						   
$Message_admin         =  $Core_Mysql->update_common_query($banner_tablename,$FieldName,$Field_types,$id);

if($Message_admin != 0)
     {
		 
	 $data            = array('msg' =>'updated');
	 $send_val	  	  =	http_build_query($data);
     header("Location:banner_images.php?".$send_val);	 
		 
     }
    else 
     {
 	   $Message_admin; 
     }

}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:banner_images.php");
	}
?>
<script>
function goBack()
  {
  window.history.back()
  }
</script>
<script language="javascript" type="application/javascript">
function validsignup()
	{
	
     
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;
		//var letters = /^[A-Za-z ]{3,50}$/;
		
		var alt_text=document.getElementById('alt_text');
		var h1_title=document.getElementById('h1_title');
		var image_order=document.getElementById('image_order');
		
		if(alt_text.value=="")
		{
			alert("Please Enter Read More Url");
			alt_text.focus();
			return false;
		}
		else if(alt_text.value.length>100)
		{
			alert("Please Enter Read More Url");
			alt_text.focus();
			return false;
		}
		
		
		else if(h1_title.value=="")
		{
			alert("Please Enter Title");
			h1_title.focus();
			return false;
		}
		else if(h1_title.value.length>100)
		{
			alert("Please Enter Title");
			h1_title.focus();
			return false;
		}
		else if(image_order.value=="")
		{
			alert("Please Enter Image Order");
			image_order.focus();
			return false;
		}
		else if(image_order.value.length>100)
		{
			alert("Please Enter Image Order");
			image_order.focus();
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
        <h3 class="heading">Add Home Banner</h3>
        <form class="form_validation_ttip" method="post" enctype="multipart/form-data">
          <div class="formSep">
            <div class="form-group">
              <label>Read More Url  :<span class="f_req">*</span></label>
              <input name="alt_text"  id="alt_text"class="form-control" type="text" value="<?php echo $banner_results['alt_text'];?>">
            </div>
            <label>Title: <span class="f_req">*</span></label>
            <input name="h1_title" id="h1_title" class="form-control" type="text" value="<?php echo $banner_results['h1_title'];?>">
          </div>
          <div class="form-group">
            <label>Image Order:<span class="f_req">*</span></label>
            <input name="image_order"  id="image_order" class="form-control number_only_valiq" type="text" value="<?php echo $banner_results['image_order'];?>">
          </div>
          <div data-provides="fileupload" class="fileupload fileupload-new formSep">
            <label>Image <span class="f_req">*</span></label>
            <div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
              <?php if($banner_results['image_name']!='')
				{?>
              <img alt="" width="170" height="112" src="uplodeImage/banner/<?php echo $banner_results['image_name'];?>">
              <?php }
				else 
				{?>
              <img alt="" src="http://www.placehold.it/168x110/EFEFEF/AAAAAA&text=no+image">
              <?php }?>
            </div>
            <div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
            <div> <span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span> <span class="fileupload-exists">Change</span>
              <input type="file" name="imgName"  value="<?php echo $banner_results['image_name'];?>">
              <input type="hidden" name="imghidden" id="imghidden" value="<?php echo $banner_results['image_name'];?>">
              </span> <a data-dismiss="fileupload" class="btn btn-default fileupload-exists" href="#">Remove</a> </div>
          </div>
          <div class="formSep">
            <label>Description:</label>
            <textarea name="h2_title" id="h2_title" cols="10" rows="3" class="form-control"><?php echo $banner_results['h2_title'];?></textarea>
            <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
          </div>
          <div class="form-actions">
            <?php if($_REQUEST['id'] != '')
			       {?>
            <button class="btn btn-default"  name="Update" type="submit" value="Update" onClick="return validsignup()">Update</button>
            <?php  }
			     else
			      {?>
            <button class="btn btn-default"  name="Save" type="submit" value="submit" onClick="return validsignup()">Save</button>
            <?php }
				  
			   ?>
            <input type="submit" class="btn btn-default" name="Close" value="Cancel"  onClick="goBack();">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
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
<!-- <script src="js/gebo_validation.js"></script>
    <script src="js/gebo_validation2.js"></script>-->

</div>
<script language="javascript" type="application/javascript">
   $( document ).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script>
</body>
</html>