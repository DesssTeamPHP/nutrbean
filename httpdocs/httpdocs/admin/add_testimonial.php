<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: karuna karan
  * Date     : 02/24/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Add Testimonial -Page";
error_reporting(0);

/*********************Testimonial SELECT**********************************************/

      $Testimonial_tablename            =    TESTIMONIAL;
	 
	  $fieldname_one                    =    'testimonial_id';
	  $fieldname_one_value              =    $_REQUEST['id'];
	  $testimonial_select               =    $Core_Mysql->select_one_where($Testimonial_tablename,$fieldname_one,$fieldname_one_value);
	  $testimonial_execute              =    $Core_Mysql->db_query($testimonial_select);
	  $testimonial_results              =    $Core_Mysql->db_fetch_array($testimonial_execute);
	  $testimonial_num_Records          =    $Core_Mysql->get_num_record($testimonial_execute);

/******************************============END==============************************/

$Testimonal_tablename      =    TESTIMONIAL;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 
$date = explode("/", $_REQUEST['date']);
$display = $date[2].'-'.$date[0].'-'.$date[1];

$testimonial_name             = $_REQUEST['testimonial_name'];
$testimonial_company          = $_REQUEST['testimonial_company'];
$testimonial_position         = $_REQUEST['testimonial_position'];
$testimonial_comment          = $_REQUEST['testimonial_comment'];
$testimonial_image            = $_REQUEST['testimonial_image'];


$fname                       = $_FILES['imgName1']['name'];
$tmpname                     = $_FILES['imgName1']['tmp_name'];
$path                        = "uplodeImage/testimonial/";
$file_name_img               = basename($fname);
$p_small                     = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);







$Field_types                  = array('testimonial_name'         => $testimonial_name,
                               'testimonial_company'             => $testimonial_company,
						       'testimonial_position'            => $testimonial_position,
							   'testimonial_image'               => $file_name_img,
						       'testimonial_comment'             => stripslashes($testimonial_comment),
						       'created_date'                    => date('Y-m-d H:i:s')
                              );
							  
					//print_r($Field_types);die;	  
						   
$Message_admin               =  $Core_Mysql->Insert_Common_query($Testimonal_tablename,$Field_types);
        if($Message_admin != 0)
           {
			   
			    $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:testimonials_list.php?".$send_val);
			   
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
$date = explode("/", $_REQUEST['date']);
 $display = $date[2].'-'.$date[1].'-'.$date[0];

$id                           = $_REQUEST['id'];
$testimonial_name             = $_REQUEST['testimonial_name'];
$testimonial_company          = $_REQUEST['testimonial_company'];
$testimonial_position         = $_REQUEST['testimonial_position'];
$testimonial_comment          = $_REQUEST['testimonial_comment'];
$testimonial_image            = $_REQUEST['testimonial_image'];
$imghidden                    = $_REQUEST['imghidden'];


$fname                       = $_FILES['imgName1']['name'];
$tmpname                     = $_FILES['imgName1']['tmp_name'];
$path                        = "uplodeImage/testimonial/";
$file_name_img               = basename($fname);
$p_small                     = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);
if($fname=='')
{
$file_name_img               = 	$imghidden;
}







/***************************************//////*******************************************************/
$Testimonal_tablename         =     TESTIMONIAL;//table_name
$FieldName                    =    'testimonial_id';
/*****************************************///////**************************************************//

$Field_types                  = array('testimonial_name'         => $testimonial_name,
                                      'testimonial_company'      => $testimonial_company,
						              'testimonial_position'     => $testimonial_position,
									   'testimonial_image'       => $file_name_img,
						              'testimonial_comment'      => stripslashes($testimonial_comment),
						              'created_date'             => date('Y-m-d H:i:s')
                                     );
						// print_r($Field_types);die;
 $Message_admin              =  $Core_Mysql->Update_Common_query($Testimonal_tablename,$FieldName,$Field_types,$id);

if($Message_admin != 0)
           {
			 $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:testimonials_list.php?".$send_val);  
		   }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: testimonials_list.php");
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
		
		var testimonial_name=document.getElementById('testimonial_name');
		var testimonial_company=document.getElementById('testimonial_company');
		var testimonial_position=document.getElementById('testimonial_position');
		
		
		
		 if(testimonial_name.value=="")
		{
			alert("Please Enter Testimonial Name");
			testimonial_name.focus();
			return false;
		}
		else if(testimonial_name.value.length>100)
		{
			alert("Please Enter Testimonial Name");
			testimonial_name.focus();
			return false;
		}
			
		else if(testimonial_company.value=="")
		{
			alert("Please Enter Testimonial Company");
			testimonial_company.focus();
			return false;
		}
		else if(testimonial_company.value.length>100)
		{
			alert("Please Enter Testimonial Company");
			testimonial_company.focus();
			return false;
		}
		
		
		else if(testimonial_position.value=="")
		{
			alert("Please Enter  Testimonial Position");
			testimonial_position.focus();
			return false;
		}
		else if(testimonial_position.value.length>100)
		{
			alert("Please Enter Testimonial Position");
			testimonial_position.focus();
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
		<h3 class="heading">Add Testimonial</h3>
		<form class="form_validation_ttip" name="" method="post" enctype="multipart/form-data">
			<div class="formSep">
				<div class="form-group">
					<label>Name :<span class="f_req">*</span></label>
					<input name="testimonial_name"  id="testimonial_name"class="form-control" value="<?php echo $testimonial_results['testimonial_name'];?>" type="text">
					
				</div>
				<label>Company :<span class="f_req">*</span></label>
				<input name="testimonial_company" id="testimonial_company" class="form-control" value="<?php echo $testimonial_results['testimonial_company'];?>" type="text">
			</div>
            
			
                    <div class="formSep">
				<label>Position :<span class="f_req"></span></label>
				<input name="testimonial_position" id="testimonial_position" class="form-control"  maxlength="" value="<?php echo $testimonial_results['testimonial_position'];?>" type="text">
			</div>
            
            
            
            <div data-provides="fileupload" class="fileupload fileupload-new formSep">
          <label>Image: <span class="f_req">*</span></label>
          <div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
            <?php if($testimonial_results['testimonial_image']!='')
				{?>
            <img alt="" src="uplodeImage/testimonial/<?php echo $testimonial_results['testimonial_image'];?>" width="168px" height="110px">
            <?php }
				else 
				{?>
            <img alt="" src="http://www.placehold.it/168x110/EFEFEF/AAAAAA&text=no+image">
            <?php }?>
          </div>
          <div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
          <div> <span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
            <input type="file" name="imgName1" id="imgName1" value="<?php echo $testimonial_results['testimonial_image'];?>">
            <input type="hidden" name="imghidden" id="imghidden" value="<?php echo $testimonial_results['testimonial_image'];?>">
            </span> <a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a> </div>
        </div>
         
        <br>
            
						<div class="formSep">
				<label>Comment : <span class="f_req">*(Maximum Limit(1000))</span></label>
				<textarea name="testimonial_comment" id="testimonial_comment" maxlength="1000" cols="10" rows="3" class="form-control"><?php echo stripslashes($testimonial_results['testimonial_comment']);?></textarea>
                <input name="id"  id="id" class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
			</div>
			
            <div class="form-actions">
            <?php if($_REQUEST['id'] != '')
			       {?>
					  <button class="btn btn-primary" name="Update" type="submit" value="Update" onClick="return validsignup()">Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary" name="Save" type="submit" value="submit" onClick="return validsignup()">Save</button>  
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

	<!-- validation -->
    <script src="lib/validation/jquery.validate.min.js"></script>
	<!-- validation functions -->
    <script src="js/gebo_validation.js"></script>
    <script src="js/gebo_validation1.js"></script>
	<!-- timepicker -->
   
   
   <!-- globalize for jQuery UI-->
    <script src="lib/jquery-ui/external/globalize.js"></script>
    <!-- masked inputs -->
	<script src="js/forms/jquery.inputmask.min.js"></script>
	<!-- autosize textareas -->
	<script src="js/forms/jquery.autosize.min.js"></script>
	<!-- textarea limiter/counter -->
	<script src="js/forms/jquery.counter.min.js"></script>
	<!-- datepicker -->
	<script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
	<!-- timepicker -->
	<script src="lib/timepicker/js/bootstrap-timepicker.min.js"></script>
	<!-- tag handler -->
	<script src="lib/tag_handler/jquery.taghandler.min.js"></script>
	<!-- styled form elements -->
	<script src="lib/uniform/jquery.uniform.min.js"></script>
	<!-- animated progressbars -->
	<script src="js/forms/jquery.progressbar.anim.js"></script>
	<!-- multiselect -->
	<script src="lib/multi-select/js/jquery.multi-select.js"></script>
	<script src="lib/multi-select/js/jquery.quicksearch.js"></script>
	<!-- enhanced select (chosen) -->
	<script src="lib/chosen/chosen.jquery.min.js"></script>
	<!-- TinyMce WYSIWG editor -->
	<script src="lib/tiny_mce/jquery.tinymce.js"></script>
    <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
    <script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
    <script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
	<!-- colorpicker -->
	<script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
	<!-- password strength checker -->
	<script src="lib/complexify/jquery.complexify.min.js"></script>
	<!-- switch buttons -->
    <script src="lib/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
    <!-- form functions -->
	<script src="js/gebo_forms.js"></script>
   
   
		
	
    
</div>
					</body>
				</html>