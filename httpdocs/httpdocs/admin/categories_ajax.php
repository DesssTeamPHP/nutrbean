<?php  include('core/configuration.php');



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
<html lang="en">
<?php include('common/admin-top-header.php');?>
<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen">
<div class="col-sm-12 col-md-12" id="frame_ajax">
  <div class="row">
    <div class="class="col-sm-12 col-md-12"">
      <div class="mov_head">
        <h3 class="heading"><?php echo $categoryval_results ['categories_name'];?> </h3>
        <div class="move_button" style="float:right; margin-top:-65px; margin-right:20px;"  >
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
                    <div> <span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                      <input type="file" name="imgname" id="imgname" value="<?php echo  $categoryval_results ['category_image_thump'];?>">
                      <input type="hidden" name="imghidden" id="imghidden" value="<?php echo  $categoryval_results ['category_image_thump'];?>">
                      </span> <a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a> </div>
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
                    <div> <span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                      <input type="file" name="image" id="image" value="<?php echo  $categoryval_results ['categories_image'];?>">
                      <input type="hidden" name="imghiddenicon" id="imghiddenicon" value="<?php echo  $categoryval_results ['categories_image'];?>">
                      </span> <a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a> </div>
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
                </form>
              </div>
            </div>
            <!--  Category**************************End***********************************88-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <script src="js/jquery.min.js"></script>
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
  <style>
.f-nav {background:#FFFF33; height:45px !important;  }
.y-nav { margin:5px 0px 3px 0px !important; margin-top:-45px !important; margin-right:20px !important;}
</style><script type="text/javascript">
  
  
  
	function go_cat_val (val) { 
	
	window.location.href = 'categories_ajax.php?cat_id='+val;
	
		/*$( "#frame_ajax" ).html("");
		$( "#frame_ajax" ).load( "categories_ajax.php?cat_id="+val, function() {
 // alert( "Load was performed." );
});*/
		
	}	
  
        $("document").ready(function () {

		
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