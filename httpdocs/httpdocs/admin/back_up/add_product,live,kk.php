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
$meta_title  =  "Add Product-Page";
/*********************Blog SELECT**********************************************/

      $Product_tablename                   =    PRODUCTS;
	  $fieldname_one                       =    'products_id';
	  $fieldname_one_value                 =    $_REQUEST['id'];
	  $Product_select                      =    $Core_Mysql->select_one_where($Product_tablename,$fieldname_one,$fieldname_one_value);
	  $Product_execute                     =    $Core_Mysql->db_query($Product_select);
	  $Product_results                     =    $Core_Mysql->db_fetch_array($Product_execute);
	  $Product_num_Records                 =    $Core_Mysql->get_num_record($Product_execute);

/******************************============END==============************************/

 $Product_tablename             =    PRODUCTS;//table_name
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 

$products_name               = $_REQUEST['products_name'];
$sku_no 				     = $_REQUEST['sku_no'];
$cat_url	                 = $_REQUEST['cat_url'];
$products_description        = $_REQUEST['products_description'];
$products_price	             = $_REQUEST['products_price'];
$visibility_type	         = $_REQUEST['visibility_type'];
$oem_price					 = $_REQUEST['oem_price'];
$oem_part_no				 = $_REQUEST['oem_part_no'];
$level3_price				 = $_REQUEST['level3_price'];		
$actual_price			 	 = $_REQUEST['actual_price'];
$status_type			 	 = $_REQUEST['status_type'];
$s_w_no						 = $_REQUEST['s_w_no'];
$colors						 = $_REQUEST['colors'];
$pageyield					 = $_REQUEST['pageyield'];
$sugg_sell					 = $_REQUEST['sugg_sell'];
$type						 = $_REQUEST['type'];
$tax_type                    = $_REQUEST['tax_type'];
$meta_title                  = $_REQUEST['meta_title'];
$meta_keywords               = $_REQUEST['meta_keywords'];
$meta_description            = $_REQUEST['meta_description'];
$manage_type                 = $_REQUEST['manage_type'];
$quantity                    = $_REQUEST['quantity'];
$availability_type           = $_REQUEST['availability_type'];





$fname                       = $_FILES['pdt_img']['name'];
$tmpname                     = $_FILES['pdt_img']['tmp_name'];
$path                        = "uplodeImage/thumbImg/";
$file_name_img               = basename($fname);
$p_small                     = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);


$Field_types           = array('products_type'        => 1,
							   'language_id'          => 1,
                               'products_status'      => 1,
                               'products_name'        => $products_name,
                               'sku_no'               => $sku_no,
							   'cat_url'              => $cat_url,
							   'products_description' => $products_description,
							   'visibility'           => $visibility_type,
                               'products_image'       => $file_name_img,
                               'actual_price'         => $actual_price,
							   'status'               => $status_type,
							   'products_price'       => $products_price,
                               'oem_price'            => $oem_price,
							   'oem_part_no'          => $oem_part_no,
							   'level3_price'         => $level3_price,
							   's_w_no'               => $s_w_no,
							   'colors'               => $colors,
							   'tax_class'            => $tax_type,
							   'pageyield'            => $pageyield,
							   'sugg_sell'            => $sugg_sell,
							   'meta_title'           => $meta_title,
							   'meta_keywords'        => $meta_keywords,
							   'meta_description'     => $meta_description,
							   'manage_stock'         => $manage_type,
							   'quantity'             => $quantity,
							   'stock_availability'   => $availability_type,
							   'types'                => $type
                              );
						   
					//print_r($Field_types); die;	   
 $Message_admin      =  $Core_Mysql->insert_common_query($Product_tablename,$Field_types);

        if($Message_admin != 0)
           {
			    
				
			$data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:product.php?".$send_val);	
				
				
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
$products_name               = $_REQUEST['products_name'];
$sku_no 				     = $_REQUEST['sku_no'];
$cat_url	                 = $_REQUEST['cat_url'];
$products_description        = $_REQUEST['products_description'];
$products_price	             = $_REQUEST['products_price'];
$visibility_type	         = $_REQUEST['visibility_type'];
$oem_price					 = $_REQUEST['oem_price'];
$oem_part_no				 = $_REQUEST['oem_part_no'];
$level3_price				 = $_REQUEST['level3_price'];		
$actual_price			 	 = $_REQUEST['actual_price'];
$status_type			 	 = $_REQUEST['status_type'];
$s_w_no						 = $_REQUEST['s_w_no'];
$colors						 = $_REQUEST['colors'];
$pageyield					 = $_REQUEST['pageyield'];
$sugg_sell					 = $_REQUEST['sugg_sell'];
$type						 = $_REQUEST['type'];
$tax_type                    = $_REQUEST['tax_type'];
$meta_title                  = $_REQUEST['meta_title'];
$meta_keywords               = $_REQUEST['meta_keywords'];
$meta_description            = $_REQUEST['meta_description'];
$imghidden                   = $_REQUEST['imghidden'];
$manage_type                 = $_REQUEST['manage_type'];
$quantity                    = $_REQUEST['quantity'];
$availability_type           = $_REQUEST['availability_type'];




$fname                       = $_FILES['pdt_img']['name'];
$tmpname                     = $_FILES['pdt_img']['tmp_name'];
$path                        = "uplodeImage/thumbImg/";
$file_name_img               = basename($fname);
$p_small                     = $path.$fname;
move_uploaded_file($tmpname,$path.$fname);
if($fname=='')
{
$file_name_img               = 	$imghidden;
}
/***************************************//////*******************************************************/
$Product_tablename             =    PRODUCTS;//table_name
$FieldName                     =  'products_id';
/*****************************************///////**************************************************//


$Field_types           = array('products_type'        => 1,
							   'language_id'          => 1,
                               'products_status'      => 1,
                               'products_name'        => $products_name,
                               'sku_no'               => $sku_no,
							   'cat_url'              => $cat_url,
							   'products_description' => $products_description,
							   'visibility'           => $visibility_type,
                               'products_image'       => $file_name_img,
                               'actual_price'         => $actual_price,
							   'status'               => $status_type,
							   'products_price'       => $products_price,
                               'oem_price'            => $oem_price,
							   'oem_part_no'          => $oem_part_no,
							   'level3_price'         => $level3_price,
							   's_w_no'               => $s_w_no,
							   'colors'               => $colors,
							   'tax_class'            => $tax_type,
							   'pageyield'            => $pageyield,
							   'sugg_sell'            => $sugg_sell,
							   'meta_title'           => $meta_title,
							   'meta_keywords'        => $meta_keywords,
							   'meta_description'     => $meta_description,
							   'manage_stock'         => $manage_type,
							   'quantity'             => $quantity,
							   'stock_availability'   => $availability_type,
							   'types'                => $type
                              );
						 // print_r($Field_types);die;
 $Message_admin      =  $Core_Mysql->update_common_query($Product_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 {
	echo mysql_error(); 
 }
        if($Message_admin != 0)
           {
			   
			  $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:product.php?".$send_val);  
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: product.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer" class="clearfixs">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 col-md-12">
      <h3 class="heading">Product</h3>
      <form class="form_validation_blog" method="post" enctype="multipart/form-data">
        <div class="formSep">
          <div class="form-group">
            <label>Name:<span class="f_req">*</span></label>
            <input name="products_name"  id="products_name"class="form-control" type="text" value="<?php echo $Product_results['products_name'];?>">
          
          
          <label>Meta-Title:<span class="f_req">*</span></label>
					<input name="meta_title"  id="meta_title"class="form-control" type="text" value="<?php echo $Product_results['meta_title'];?>">
				</div>
				<label>Meta-Description:</label>
				<input name="meta_description" id="meta_description" class="form-control" type="text" value="<?php echo $Product_results['meta_description'];?>">
			</div>
            <div class="formSep">
				<div class="form-group">
					<label>Meta-Keyword:</label>
					<input name="meta_keywords"  id="meta_keywords"class="form-control" type="text" value="<?php echo $Product_results['meta_keywords'];?>">
				</div>
          
          </div>
          
          <label>Brand Name: <span class="f_req">*</span></label>
          <select name="brand_name" id="brand_name" class="form-control">
            <option value="0">--SELECT--</option>
            <?php
      $pagetablename          =    BRANDS;
	  $FieldName              =    'categories_id';
	  $Field_types            =    array('categories_id',
	                                     'categories_name'
										 );     
						                   
	 $pagecat_select          =    $Core_Mysql->select_common_query($pagetablename,$FieldName,$Field_types);
	 $pagecat_execute         =    $Core_Mysql->db_query($pagecat_select);
	  if(!$pagecat_execute)
		{
		echo mysql_error();
		exit;
		}
		else if(mysql_num_rows($pagecat_execute)==0)
		{
		echo   '<option value="0">Other</option>';
		}
		else
		{
		while($fetch_select_page_category=mysql_fetch_array($pagecat_execute))
			{
			  if(($fetch_select_page_category['products_id'] ==  $Product_results['categories_id']))
					  {
					  $page_Cat_selected='selected="selected"';
					  }
					  else
					  {
   				       $page_Cat_selected="";
					  }
					  
				echo ' <option value="'.$fetch_select_page_category['categories_id'].'" '.$page_Cat_selected.' >'.$fetch_select_page_category['categories_name'].'</option>'; 
					  
			}
		
		}
			 ?>
          </select>
        </div>
        <div class="formSep">
          <label >Description:</label>
          <textarea name="products_description" id="wysiwg_full"  class="wysiwg_full" cols="30" rows="10"><?php echo $Product_results['products_description'];?></textarea>
        </div>
        
        <div class="form-group">
          <label>Manage Stock:</label>
          <p><span class="label label-default"></span></p>
          <select name="manage_type" id="manage_type" onchange="return sub_type(this.value);" class="form-control">
            <option value="">----Select---</option>
            <option value="Yes" <?php if($Product_results["manage_stock"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
            <option value="No" <?php if($Product_results["manage_stock"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
            
          </select>
        </div>
       
        <div class="form-group">
          <label>Qty:<span class="f_req">*</span></label>
          <input name="quantity"  id="quantity" class="form-control  number_only_valiq" type="text" value="<?php echo $Product_results['quantity'];?>">
        </div>
        
        <div class="form-group">
          <label>Stock Availability:</label>
          <p><span class="label label-default"></span></p>
          <select name="availability_type" id="manage_type" onchange="return sub_type(this.value);" class="form-control">
            <option value="">----Select---</option>
            <option value="In Stock" <?php if($Product_results["stock_availability"]=="In Stock")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >In Stock</option>
            <option value="Out of Stock" <?php if($Product_results["stock_availability"]=="Out of Stock")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Out of Stock</option>
            
          </select>
        </div>
        
        
        
        
      
        <div class="formSep">
          <div class="form-group">
            <label>SKU:<span class="f_req">*</span></label>
            <input name="sku_no"  id="sku_no" class="form-control" type="text" value="<?php echo $Product_results['sku_no'];?>">
          </div>
         
        
     
        <label>URL Key : <span class="f_req">*</span></label>
        <input name="cat_url" id="cat_url" class="form-control" type="text" value="<?php echo $Product_results['cat_url'];?>">
        </div>
        <div class="form-group">
          <label>Visibility:</label>
          <p><span class="label label-default"></span></p>
          <select name="visibility_type" id="visibility_type" onchange="return sub_type(this.value);" class="form-control">
            <option value="">----Select---</option>
            <option value="Not Visible Individually" <?php if($Product_results["visibility"]=="Not Visible Individually")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Not Visible Individually</option>
            <option value="Catalog" <?php if($Product_results["visibility"]=="Catalog")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Catalog</option>
            <option value="Search" <?php if($Product_results["visibility"]=="Search")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Search</option>
            <option value="Catalog, Search" <?php if($Product_results["visibility"]=="Catalog, Search")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Catalog, Search</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Tax Class:</label>
          <p><span class="label label-default"></span></p>
          <select name="tax_type" id="tax_type" onchange="return sub_type(this.value);" class="form-control">
            <option value="">----Select---</option>
            <option value="None" <?php if($Product_results["tax_class"]=="None")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >None</option>
            <option value="Taxable Goods" <?php if($Product_results["tax_class"]=="Taxable Goods")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Taxable Goods</option>
            <option value="Shipping" <?php if($Product_results["tax_class"]=="Shipping")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Shipping</option>
            
          </select>
        </div>
        
        
        <div data-provides="fileupload" class="fileupload fileupload-new formSep">
          <label>Products Image: <span class="f_req">*</span></label>
          <div style="width: 178px; height: 120px" class="fileupload-new img-thumbnail sepH_a">
            <?php if($Product_results['products_image']!='')
				{?>
            <img alt="" src="uplodeImage/thumbImg/<?php echo $Product_results['products_image'];?>" width="168px" height="110px">
            <?php }
				else 
				{?>
            <img alt="" src="http://www.placehold.it/168x110/EFEFEF/AAAAAA&text=no+image">
            <?php }?>
          </div>
          <div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
          <div> <span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
            <input type="file" name="pdt_img" id="pdt_img" value="<?php echo $Product_results['products_image'];?>">
            <input type="hidden" name="imghidden" id="imghidden" value="<?php echo $Product_results['products_image'];?>">
            </span> <a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a> </div>
        </div>
        
        
        
        
        
        
        
        
        <div class="form-group">
          <label>Product Price:<span class="f_req">*</span></label>
          <input name="products_price"  id="products_price" class="form-control  number_only_valiq" type="text" value="<?php echo $Product_results['products_price'];?>">
        </div>
        <div class="form-group">
          <label>Status:</label>
          <p><span class="label label-default"></span></p>
          <select name="status_type" id="status_type" onchange="return sub_type(this.value);" class="form-control">
            <option value="">----Select---</option>
            <option value="Enabled" <?php if($Product_results["status"]=="Enabled")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Enabled</option>
            <option value="Disabled" <?php if($Product_results["status"]=="Disabled")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Disabled</option>
            
          </select>
        </div>
        <div class="form-group">
          <label>Actual Price:<span class="f_req">*</span></label>
          <input name="actual_price"  id="actual_price" class="form-control number_only_valiq" type="text" value="<?php echo $Product_results['actual_price'];?>">
        </div>
        <div class="form-group">
          <label>OEM Price:<span class="f_req">*</span></label>
          <input name="oem_price"  id="oem_price" class="form-control number_only_valiq" type="text" value="<?php echo $Product_results['oem_price'];?>">
        </div>
        <div class="form-group">
          <label>Level3 Cost:<span class="f_req">*</span></label>
          <input name="level3_price"  id="level3_price" class="form-control number_only_valiq" type="text" value="<?php echo $Product_results['level3_price'];?>">
        </div>
        <div class="form-group">
          <label>OEM Numbers:<span class="f_req">*</span></label>
          <input name="oem_part_no"  id="oem_part_no" class="form-control" type="text" value="<?php echo $Product_results['oem_part_no'];?>">
        </div>
        <!--<div class="form-group">
            <label>Bat Type Page Yields:<span class="f_req">*</span></label>
            <input name="bat_type"  id="bat_type" class="form-control" type="text" value="<?php echo $Product_results['bat_type'];?>">
          </div>-->
        
        <div class="form-group">
          <label>S.W.No:<span class="f_req">*</span></label>
          <input name="s_w_no"  id="s_w_no" class="form-control" type="text" value="<?php echo $Product_results['s_w_no'];?>">
        </div>
        <div class="form-group">
          <label>Color:<span class="f_req">*</span></label>
          <input name="colors"  id="colors" class="form-control" type="text" value="<?php echo $Product_results['colors'];?>">
        </div>
        <div class="form-group">
          <label>Page Yield:<span class="f_req">*</span></label>
          <input name="pageyield"  id="pageyield" class="form-control" type="text" value="<?php echo $Product_results['pageyield'];?>">
        </div>
        <div class="form-group">
          <label>Sugg Sell:<span class="f_req">*</span></label>
          <input name="sugg_sell"  id="sugg_sell" class="form-control" type="text" value="<?php echo $Product_results['sugg_sell'];?>">
        </div>
        <div class="form-group">
          <label>Type:<span class="f_req">*</span></label>
          <input name="type"  id="type" class="form-control" type="text" value="<?php echo $Product_results['types'];?>">
        </div>
        <div class="form-actions">
          <?php if(isset($_REQUEST['id']) != '')
			       {?>
          <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button>
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
    <script src="js/validation_editcontent.js"></script>
    <!-- editor -->
   <script src="lib/tiny_mce/jquery.tinymce.js"></script>
   <!-- file explorer functions -->
    <script src="js/gebo_explorer.js"></script>
    
    
    
    
    
    

 <script language="javascript" type="application/javascript">
   $(document).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script> 
 </div> 
</body>
</html>