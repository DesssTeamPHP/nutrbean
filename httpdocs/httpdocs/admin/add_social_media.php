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
$meta_title  =  "Add Social Media-Page";
error_reporting(0);
/*********************Social Media SELECT**********************************************/

      $social_tablename                 =    SOCIALMEDIA;
	  $fieldname_one                    =    'social_id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $social_select                    =    $Core_Mysql->select_one_where($social_tablename,$fieldname_one,$fieldname_one_value);
	  $social_execute                   =    $Core_Mysql->db_query($social_select);
	  $socia_results                    =    $Core_Mysql->db_fetch_array($social_execute);
	  $socia_num_Records                =    $Core_Mysql->get_num_record($social_execute);

/******************************============END==============************************/

 $social_tablename      =    SOCIALMEDIA;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 
$site_name             = $_REQUEST['site_name'];
$image_name            = $_REQUEST['image_name'];
$link                  = $_REQUEST['linkval'];
$active                = $_REQUEST['active'];
$Image_Order           = $_REQUEST['Image_Order'];

$fname                       = $_FILES['imgName1']['name'];
$tmpname                     = $_FILES['imgName1']['tmp_name'];
$path                        = "uplodeImage/soundMedia/";
$file_name_img               = basename($fname);
$p_small                     = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);

$Field_types           = array('company_name'         => $site_name,
                               'media_name'           => $image_name,
						       'media_image'          => $file_name_img,
						       'media_link'           => $link,
						       'active'               => $active,
						       'image_order'          => $Image_Order,
						       'created_date'         => date('Y-m-d H:i:s')
                              );
						   
 $Message_admin      =  $Core_Mysql->insert_common_query($social_tablename,$Field_types);

        if($Message_admin != 0)
           {
			   
			    $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:social_media_list.php?".$send_val);

           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 

//var_dump($_FILES);

$id                    = $_REQUEST['id'];
$site_name             = $_REQUEST['site_name'];
$image_name            = $_REQUEST['image_name'];
$link                  = $_REQUEST['linkval'];
$active                = $_REQUEST['active'];
$Image_Order           = $_REQUEST['Image_Order'];
$imghidden             = $_REQUEST['imghidden'];

$fname                       = $_FILES['imgName1']['name'];
$tmpname                     = $_FILES['imgName1']['tmp_name'];
$path                        = "uplodeImage/soundMedia/";
$file_name_img               = basename($fname);
$p_small                     = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);
if($fname=='')
{
$file_name_img               = 	$imghidden;
}





/***************************************//////*******************************************************/
$social_tablename      =  SOCIALMEDIA;//table_name
$FieldName            =  'social_id';
/*****************************************///////**************************************************//

 $Field_types           = array('company_name'        => $site_name,
                               'media_name'           => $image_name,
						       'media_image'          => $file_name_img,
						       'media_link'           => $link,
						       'active'               => $active,
						       'image_order'          => $Image_Order,
						       'created_date'         => date('Y-m-d H:i:s')
                              );
			//print_r($Field_types);	die;	   
 $Message_admin      =  $Core_Mysql->update_common_query($social_tablename,$FieldName,$Field_types,$id);
        if($Message_admin != 0)
           {
			   
			   $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:social_media_list.php?".$send_val);

           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:social_media_list.php");
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
		
		var site_name=document.getElementById('site_name');
		var image_name=document.getElementById('image_name');
		var Image_Order=document.getElementById('Image_Order');
		
		
		if(site_name.value=="")
		{
			alert("Please Enter Site Title");
			site_name.focus();
			return false;
		}
		else if(site_name.value.length<3)
		{
			alert("Please Enter Site Title Minimum 3 characters");
			site_name.focus();
			return false;
		}	
		else if(!site_name.value.match(letters))
		{
			alert("Please Enter Valid Site Title");
			site_name.focus();
			return false;
		}	
		else if(image_name.value=="")
		{
			alert("Please Enter Image Name");
			image_name.focus();
			return false;
		}
		else if(image_name.value.length>100)
		{
			alert("Please Enter Image Name");
			image_name.focus();
			return false;
		}
		
		
		else if(Image_Order.value=="")
		{
			alert("Please Enter  Image Order");
			Image_Order.focus();
			return false;
		}
		else if(Image_Order.value.length>100)
		{
			alert("Please Enter Image Order");
			Image_Order.focus();
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
<div  id="maincontainer" class="clearfixs">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 col-md-12">
		<h3 class="heading">Social Media</h3>
		<form class="form_validation_ttip" method="post" enctype="multipart/form-data">
			<div class="formSep">
				<div class="form-group">
					<label>Site Name:<span class="f_req">*</span></label>
					<input name="site_name"  id="site_name"class="form-control" type="text" maxlength="50" value="<?php echo $socia_results['company_name'];?>">
				</div>
				<label>Image Name : <span class="f_req">*</span></label>
				<input name="image_name" id="image_name" class="form-control" type="text" maxlength="50" value="<?php echo $socia_results['media_name'];?>">
			</div>
            
            
            
             <div data-provides="fileupload" class="fileupload fileupload-new formSep">
          <label>Image: <span class="f_req">*</span></label>
          <div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
            <?php if($socia_results['media_image']!='')
				{?>
            <img alt="" src="uplodeImage/soundMedia/<?php echo $socia_results['media_image'];?>" width="168px" height="110px">
            <?php }
				else 
				{?>
            <img alt="" src="http://www.placehold.it/168x110/EFEFEF/AAAAAA&text=no+image">
            <?php }?>
          </div>
          <div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
          <div> <span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
            <input type="file" name="imgName1" id="imgName1" value="<?php echo $socia_results['media_image'];?>">
            <input type="hidden" name="imghidden" id="imghidden" value="<?php echo $socia_results['media_image'];?>">
            </span> <a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a> </div>
        </div>
            
            
            
            
            
						<div class="formSep">
				<label>Link <span class="f_req">*</span>(Ex:http://www.domainname.com)</label>
				<textarea name="linkval" id="linkval" cols="10" rows="3" class="form-control"><?php echo $socia_results['media_link'];?></textarea>
			</div>
			<div class="formSep"> 
				<label><span >Active/Inactive</span></label>
				<br>
				<label class="checkbox-inline">
					<input value="1" name="active" id="active" type="checkbox" <?php if($socia_results['active']=='1'){echo 'checked="checked"';}?>> 
				</label>
			</div>
            <div class="formSep">
				<div class="form-group">
					<label>Image Order : <span class="f_req"></span></label>
				<input name="Image_Order"  id="Image_Order"class="form-control number_only_valiq" maxlength="3" type="text" value="<?php echo $socia_results['image_order'];?>">
                <input name="id"  id="id"class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
				</div>
				
			</div>
			<div class="form-actions">
            <?php if($_REQUEST['id'] != '')
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

    <!-- datatable -->
	<script src="lib/datatables/jquery.dataTables.min.js"></script>
	<script src="lib/datatables/extras/Scroller/media/js/dataTables.scroller.min.js"></script>
	<!-- datatable table tools -->
    <script src="lib/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
    <script src="lib/datatables/extras/TableTools/media/js/ZeroClipboard.js"></script>
    <!-- datatables bootstrap integration -->
    <script src="lib/datatables/jquery.dataTables.bootstrap.min.js"></script>
    
	<!-- datatable functions -->
	<script src="js/gebo_datatables.js"></script>
    	<script src="lib/smoke/smoke.js"></script>
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