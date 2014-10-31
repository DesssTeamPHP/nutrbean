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
	  }
	  else
	  {
		 $categoryval_results ['categories_name']='Add New Root Category';
		 $categoryval_results ['categories_active']='';
		 $categoryval_results['category_image_thump']='';
		 $categoryval_results['categories_image']='';
		 $categoryval_results ['meta_title']='';
		 $categoryval_results ['meta_key']='';
		 $categoryval_results ['meta_desc']='';
		 $categoryval_results ['categories_description']='';
		 $categoryval_results ['navigation_status']='';
	  }




$category_tablename                     =    CATEGORIES;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
$Category_Name	                     = $_REQUEST['Category_Name'];
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
                               'categories_name'           => $Category_Name,
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
						   
			print_r($Field_types);			   
						   
						   
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
$Category_Name	                     = $_REQUEST['Category_Name'];
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


$Field_types           = array('categories_name'           => $Category_Name,
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
      $category_tablename                 =    CATEGORIES;
	  $fieldname_one                      =    'categories_id';
	  $fieldname_one_value                =    $id;
	  $category_delete                    =    $Core_Mysql->delete_common_query($category_tablename,$fieldname_one,$fieldname_one_value);
	  $category_execute                   =    $Core_Mysql->db_query($category_delete);
 header("Location:categories.php?msg=successdele" );

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
}
ul.topnav li a {
	line-height: 10px;
	font-size: 11px;
	padding: 10px 5px;
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
	margin: 0;
	padding: 0;
	display: none;
}
ul.topnav ul li {
	margin: 0;
	padding: 0;
	clear: both;
}
li .active {
	background-color:#006600;
}
ul.topnav ul li a {
	padding-left: 20px;
	font-size: 10px;
	font-weight: normal;
	outline:0;
}
ul.topnav ul li a:hover {
	background-color:#D3C99C;
	color:#675C7C;
}
ul.topnav ul ul li a {
	color:silver;
	padding-left: 40px;
}
ul.topnav ul ul li a:hover {
	background-color:#D3CEB8;
	color:#675C7C;
}
ul.topnav p span {
	float:left;
	margin:29px 4px 0px 7px;
	cursor:pointer;
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
		
		var Category_Name=document.getElementById('Category_Name');
		var Category_title=document.getElementById('Category_title');
		
		
		
		if(Category_Name.value=="")
		{
			alert("Please Enter Category Name");
			Category_Name.focus();
			return false;
		}
		else if(Category_Name.value.length>100)
		{
			alert("Please Enter Category Name");
			Category_Name.focus();
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
              <h3 class="heading">
			  <?php 
			  if($categories_name !='')
			  {
				  echo $categoryval_results ['categories_name'];
			  }
			  else
			  {
				echo $categoryval_results ['categories_name'];  
			  }
			  ?>
			  
			  
              
              
               </h3>
              
              
              <div class="move_button" style="float:right; margin-top:-65px; margin-right:20px;"  >
              
              
              
                <?php if(isset($_REQUEST['cat_id'])!= '')
			       {?>
                <a  href="categories.php?parent_id=<?php echo $_REQUEST['cat_id']?>" style="float:left; margin-top:2px;" class="btn btn-default button-next">Add Sub Category<i class="glyphicon glyphicon-chevron-right"></i></a>
                  
                 
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
                          <input name="Category_Name"  id="Category_Name"class="form-control" type="text" value="<?php echo  $categoryval_results['categories_name'];?>">
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
                
                
                
                <div class="tab-pane active" id="tab_br2"> 
                  <!--  Category*************************************************************88-->
                  <div class="row" id="showval">
                    <div class="col-sm-12 col-md-12">
                      
                      
                      
                      
                      
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
<div class="sidebar">
  <div class="sidebar_inner_scroll">
    <div class="sidebar_inner">
      <h3>Categories</h3>
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
	$statue='class="active"';
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
	$statue='class="active"';
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
<!-- <script src="js/selectNav.js"></script>--> 
<!-- common functions --> 
<!-- <script src="js/gebo_common.js"></script>--> 
<!-- multi-column layout --> 
<script src="js/jquery.imagesloaded.min.js"></script> 
<script src="js/jquery.wookmark.js"></script> 
<!-- responsive table --> 
<script src="js/jquery.mediaTable.min.js"></script> 
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
</body>
</html>