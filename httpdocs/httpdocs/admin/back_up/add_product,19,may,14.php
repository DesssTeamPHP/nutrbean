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
$meta_title  =  "Product Customization";

	
	/*********************Product SELECT**********************************************/
if(isset($_REQUEST['id']))
{
      $Product_tablename                   =    PRODUCTS;
	  $fieldname_one                       =    'products_id';
	  $fieldname_one_value                 =    $_REQUEST['id'];
	  $Product_select                      =    $Core_Mysql->select_one_where($Product_tablename,$fieldname_one,$fieldname_one_value);
	  $Product_execute                     =    $Core_Mysql->db_query($Product_select);
	  $Product_results                     =    $Core_Mysql->db_fetch_array($Product_execute);
	  $Product_num_Records                 =    $Core_Mysql->get_num_record($Product_execute);
	  $id=$_REQUEST['id'];
	  $master_categories_id = $Product_results['master_categories_id'];
}
else
{
$Product_results['products_name']="";
$Product_results['categories_id']="";
$Product_results['products_description']="";
$Product_results['sku_no']="";
$Product_results['cat_url']="";
$Product_results['visibility']="";
$Product_results['products_image']="";
$Product_results['status']="";
$Product_results['s_w_no']="";
$Product_results['colors']="";
$Product_results['pageyield']="";
$Product_results['sugg_sell']="";
$Product_results['types']="";
$Product_results['products_price']="";
$Product_results['actual_price']="";
$Product_results['oem_price']="";
$Product_results['level3_price']="";
$Product_results['oem_part_no']="";
$Product_results['tax_class']="";
$Product_results['meta_title']="";
$Product_results['meta_description']="";
$Product_results['meta_keywords']="";
$Product_results['manage_stock']="";
$Product_results['quantity']="";
$Product_results['stock_availability']="";
$master_categories_id = $Product_results['master_categories_id'];

$id="0";

}

/******************************============END==============************************/

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

$master_categories_id =$_REQUEST['master_categories_id'];

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
							   'master_categories_id' =>$master_categories_id,
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
$master_categories_id 		 = $_REQUEST['master_categories_id'];
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
							   'master_categories_id' => $master_categories_id,
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
						
 $Message_admin      =  $Core_Mysql->update_common_query($Product_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 {
	echo mysql_error(); exit;
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
      <div class="row" >
        <form  class="frm_product_add_valid"  method="post" enctype="multipart/form-data" />
        <input type="hidden" name="id" value="<?php echo $id;?>" >
        <h3 class="heading">Product
          <div class="move_upper" style="float:right; margin-top:-8px;">
            <?php if(isset($_REQUEST['id']) != '')
			       {?>
            <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button>
            <?php  }
			     else
			      {?>
            <button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>
            <?php }
			   ?>
            <input type="button" class="btn btn-primary" name="Close" value="Cancel"  onClick="rewrite_goBack('product.php');">
          </div>
        </h3>
        <div class="col-sm-12 col-md-12">
          <div class="tab-content">
            <div class="tab-pane active" id="tab_br1">
              <div  class="formSep">
                <div  class="form-group">
                  <label>Product Name:<span class="f_req">*</span></label>
                  <input name="products_name"  id="products_name"class="form-control" type="text" value="<?php echo $Product_results['products_name'];?>" maxlength="100" tabindex="1">
                </div>
                <div  class="form-group" style="display:none;">
                  <label>Brand Name: </label>
                  <select name="brand_name" id="brand_name" class="form-control" tabindex="2">
                    <option value="Other">--Other--</option>
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
	//	echo   '<option value="Other">Other</option>';
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
                <div  class="form-group">
                  <label >Description:</label>
                  <textarea name="products_description" id="wysiwg_full"  class="wysiwg_full" cols="30" rows="10" tabindex="3"><?php echo $Product_results['products_description'];?></textarea>
                </div>
                <div class="form-group">
                  <label>SKU:</label>
                  <input name="sku_no"  id="sku_no" class="form-control" tabindex="4" type="text" maxlength="50" value="<?php echo $Product_results['sku_no'];?>">
                </div>
                <div  class="form-group">
                  <label>URL Key : </label>
                  <input name="cat_url" id="cat_url" class="form-control" tabindex="5"  type="text" maxlength="500" value="<?php echo $Product_results['cat_url'];?>">
                </div>
                <div  class="form-group" style="display:none;">
                  <label>Visibility:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="visibility_type" id="visibility_type" onChange="return sub_type(this.value);" class="form-control" tabindex="6" >
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
                <div data-provides="fileupload" class="fileupload fileupload-new formSep">
                  <label>Products Image: </label>
                  <div  class="fileupload-new img-thumbnail sepH_a">
                    <?php if($Product_results['products_image']!='' & file_exists('uplodeImage/thumbImg/'.$Product_results['products_image']))
				{?>
                    <img alt="" src="uplodeImage/thumbImg/<?php echo $Product_results['products_image'];?>" width="168px" height="110px">
                    <?php }
				else 
				{?>
                    <img src="img/noimg-placehold.jpg" class="thumbnail" alt="No Image" title="No Image">
                    <?php }?>
                  </div>
                  <div style="width: 178px; height: 120px" class="fileupload-preview fileupload-exists thumbnail"></div>
                  <div> <span class="btn btn-primary btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input tabindex="7"  type="file" name="pdt_img" id="pdt_img" value="<?php echo $Product_results['products_image'];?>">
                    <input type="hidden" name="imghidden" id="imghidden" value="<?php echo $Product_results['products_image'];?>">
                    </span> <a data-dismiss="fileupload" class="btn btn-primary fileupload-exists" href="#">Remove</a> </div>
                </div>
                <div  class="form-group">
                  <label>Status:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="status_type" id="status_type" tabindex="8"  class="form-control">
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
              </div>
            </div>
            <div class="tab-pane" id="tab_br2">
              <h4>Attribute</h4>
              <div class="form-group">
                <label>S.W.No:</label>
                <input name="s_w_no"  id="s_w_no" class="form-control" tabindex="9" maxlength="100" type="text" value="<?php echo $Product_results['s_w_no'];?>">
              </div>
              <div class="form-group">
                <label>Color:</label>
                <input name="colors"  id="colors" class="form-control" tabindex="10"  maxlength="100"  type="text" value="<?php echo $Product_results['colors'];?>">
              </div>
              <div class="form-group">
                <label>Page Yield:</label>
                <input name="pageyield"  id="pageyield" class="form-control" tabindex="11" maxlength="100"  type="text" value="<?php echo $Product_results['pageyield'];?>">
              </div>
              <div class="form-group">
                <label>Sugg Sell:</label>
                <input name="sugg_sell"  id="sugg_sell" class="form-control" type="text" value="<?php echo $Product_results['sugg_sell'];?>" tabindex="12" maxlength="100">
              </div>
              <div class="form-group">
                <label>Type:</label>
                <input name="type"  id="type" class="form-control" type="text" value="<?php echo $Product_results['types'];?>" tabindex="13" maxlength="100">
              </div>
            </div>
            <div class="tab-pane" id="tab_br3">
              <h4 >Pricing</h4>
              <div  class="form-group">
                <label>Product Price:<span class="f_req">*</span></label>
                <input name="products_price"  id="products_price" class="form-control  number_only_valiq" type="text" value="<?php echo $Product_results['products_price'];?>" tabindex="14" maxlength="50">
              </div>
              <div  class="form-group">
                <label>Actual Price:</label>
                <input name="actual_price"  id="actual_price" class="form-control number_only_valiq" type="text" value="<?php echo $Product_results['actual_price'];?>" tabindex="15" maxlength="50">
              </div>
              <div  class="form-group">
                <label>OEM Price:</label>
                <input name="oem_price"  id="oem_price" class="form-control number_only_valiq" type="text" value="<?php echo $Product_results['oem_price'];?>" tabindex="16" maxlength="50">
              </div>
              <div  class="form-group">
                <label>Level3 Cost:</label>
                <input name="level3_price"  id="level3_price" class="form-control number_only_valiq" type="text" value="<?php echo $Product_results['level3_price'];?>" tabindex="17" maxlength="50">
              </div>
              <div  class="form-group">
                <label>OEM Numbers:</label>
                <input name="oem_part_no"  id="oem_part_no" class="form-control" type="text" value="<?php echo $Product_results['oem_part_no'];?>" tabindex="18" maxlength="50">
              </div>
              <div class="form-group">
                <label>Tax Class:</label>
                <p><span class="label label-default"></span></p>
                <select name="tax_type" id="tax_type" onChange="return sub_type(this.value);" class="form-control" tabindex="19" maxlength="50">
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
            </div>
            <div class="tab-pane" id="tab_br4">
              <h4 >Meta Information</h4>
              <div class="formSep">
                <div class="form-group">
                  <label>Meta-Title:</label>
                  <input name="meta_title"  id="meta_title"class="form-control" type="text" value="<?php echo $Product_results['meta_title'];?>" tabindex="20" maxlength="500">
                </div>
                <div  class="form-group">
                  <label>Meta-Description:</label>
                  <input name="meta_description" id="meta_description" class="form-control" type="text" value="<?php echo $Product_results['meta_description'];?>" tabindex="21" maxlength="500">
                </div>
                <div  class="form-group">
                  <label>Meta-Keyword:</label>
                  <input name="meta_keywords"  id="meta_keywords"class="form-control" type="text" value="<?php echo $Product_results['meta_keywords'];?>" tabindex="22" maxlength="500">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab_br5">
              <h4 >Inventory</h4>
              <div class="form-group" style="display:none">
                <label>Manage Stock:</label>
                <select name="manage_type" id="manage_type"  class="form-control" tabindex="23" maxlength="50">
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
              <div  class="form-group">
                <label>Qty:</label>
                <input name="quantity"  id="quantity" class="form-control  number_only_valiq" type="text" tabindex="24" value="<?php echo $Product_results['quantity'];?>" maxlength="50">
              </div>
              <div  class="form-group">
                <label>Stock Availability:</label>
                <p><span class="label label-default"></span></p>
                <select name="availability_type" id="manage_type" onChange="return sub_type(this.value);" tabindex="25" class="form-control" maxlength="50">
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
            </div>
            <div class="tab-pane" id="tab_br6">
              <h4 >Categories</h4>
              <input type="hidden" name="master_categories_id" id="master_categories_id" value="<?php echo $master_categories_id;?>">
              <div id="tree_c">
                <ul >
                  <?php 
			

function recursive_menu($id,$master_categories_id)
	{
	
	

	$getva1=$master_categories_id;
	
	
	

		
	   $qry = "select * from categories where parent_id	=".$id; 
		$qry_result = mysql_query($qry);
		  if(mysql_num_rows($qry_result)  >0)
		{ 
		while($row = mysql_fetch_assoc($qry_result))
		{
		if($getva1==$row['categories_id'])
	$statue='class="active selected"';
	else
	$statue='class=""';
	
	
		 $qry2= "select * from categories where parent_id	=".$row['categories_id'];
		$qry_result2 = mysql_query($qry2);
		  if(mysql_num_rows($qry_result2)  == '0')
		  {
		 echo '<li  '.$statue.' id="'.$row['categories_id'].'"  ><a href="categories.php?cat_id='.$row['categories_id'].'" >'.$row['categories_name'].'</a></li>';
		}
		else
		{
echo '<li '.$statue.' id="'.$row['categories_id'].'"   ><p class="novalid"></p><a href="categories.php?cat_id='.$row['categories_id'].'"  >'.$row['categories_name'].'</a><ul>';		 
recursive_menu($row['categories_id'],$getva1);
	echo '</ul></li>';  
		}
		}
		}
	
		
		
	}
			
	$getva1=$master_categories_id;


	 $qry = "select * from categories where parent_id = 0"; 
		$qry_result = mysql_query($qry);
		  if(mysql_num_rows($qry_result)  >0)
		{ 
		while($row = mysql_fetch_assoc($qry_result))
		{
			if($getva1==$row['categories_id'])
	$statue='class="active selected"';
	else
	$statue='class=""';
		 $qry2= "select * from categories where parent_id	=".$row['categories_id'];
		$qry_result2 = mysql_query($qry2);
		  if(mysql_num_rows($qry_result2)  == '0')
		  {
		  echo '<li  '.$statue.' id="'.$row['categories_id'].'"  ><a href="categories.php?cat_id='.$row['categories_id'].'" >'.$row['categories_name'].'</a></li>';
		}
		else
		{
echo '<li '.$statue.' id="'.$row['categories_id'].'" ><p class="novalid"></p><a href="categories.php?cat_id='.$row['categories_id'].'"   >'.$row['categories_name'].'</a><ul  >';	

	
	 recursive_menu($row['categories_id'],$getva1);
	echo '</ul></li>';  
		}
		}	
		}
	
?>
                </ul>
              </div>
            </div>
            <div class="tab-pane" id="tab_br7">
              <h4 >Related Products</h4>
              <table id="dt_product" class="table table-striped table-bordered dTableR">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Product Name</th>
                    <th>Product Description </th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Visibility</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="dataTables_empty" colspan="6">Loading data from server</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="sidebar" style="display:block !important;">
    <div class="sidebar_inner_scroll">
      <div class="sidebar_inner">
        <div id="side_accordion" class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading" id="toggle_tabs"> <a href="javascript:void(0)"  class="accordion-toggle "> <i class="glyphicon glyphicon-folder-close"></i>Product Informations</a> </div>
            <div class="accordion-body " id="collapseOne">
              <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#tab_br1" data-toggle="tab">General</a></li>
                  <li><a href="#tab_br2" data-toggle="tab">Attributes</a></li>
                  <li><a href="#tab_br3" data-toggle="tab">Prices</a></li>
                  <li><a href="#tab_br4" data-toggle="tab">Meta Information</a></li>
                  <li><a href="#tab_br5" data-toggle="tab">Inventory</a></li>
                  <li><a href="#tab_br6" data-toggle="tab">Categories</a></li>
                  <!-- <li><a href="#tab_br7" data-toggle="tab">Related Products</a></li>-->
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="push"></div>
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
  <script src="js/selectNav.js"></script>
  <!-- common functions -->
  <script src="js/gebo_common.js"></script>
  <!-- validation -->
  <script src="lib/validation/jquery.validate.min.js"></script>
  <!-- validation functions -->
  <!--<script src="js/validation_editcontent.js"></script>-->
  <!-- editor -->
  <script src="lib/tiny_mce/jquery.tinymce.js"></script>
  <!-- file explorer functions -->
  <script src="js/gebo_explorer.js"></script>
  <script src="js/custom_validation.js"></script>
  <!-- datatable -->
  <!--  <script src="lib/datatables/jquery.dataTables.min.js"></script>
  <script src="lib/datatables/extras/Scroller/media/js/dataTables.scroller.min.js"></script>-->
  <!-- datatable table tools -->
  <!--<script src="lib/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
  <script src="lib/datatables/extras/TableTools/media/js/ZeroClipboard.js"></script>-->
  <!-- datatables bootstrap integration -->
  <!--<script src="lib/datatables/jquery.dataTables.bootstrap.min.js"></script>-->
  <!-- datatable functions -->
  <!--<script src="js/gebo_datatables.js"></script>-->
  <!-- <script src="lib/smoke/smoke.js"></script>-->
  <!-- dynatree -->
  <script language="javascript" type="application/javascript">
   $(document).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script>
  <script src="lib/dynatree/dist/jquery.dynatree.min.js"></script>
  <script>
		
		$(document).ready(function() {
		//* basic
	
		//* server side proccessing with hiden row
	//	gebo_datatbles.dt_product();
        //* Table tools
		gebo_datatbles.dt_tools();	gebo_datatbles.tree_c();
	});
		gebo_datatbles = {
		dt_a: function() {
			$('#dt_a').dataTable({
                "sDom": "<'row'<'col-sm-6'<'dt_actions'>l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                }
            });
		},
        dt_b: function() {
			$('#dt_b').dataTable({
				"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "sScrollX": "100%",
                "sScrollXInner": '110%',
                "sPaginationType": "bootstrap",
                "bScrollCollapse": true 
            });
		},
		dt_c: function() {
                
            var aaData = [];
            for ( var i=1, len=1000 ; i<=len ; i++ ) {
                aaData.push( [ i, i, i, i, i ] );
            };
            
            $('#dt_c').dataTable({
				"sDom": "<'row'<'col-sm-6'><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'>S>",
                "sScrollY": "200px",
                "aaData": aaData,
                "bDeferRender": true
			});
            
            $('#fill_table').click(function(){
                var aaData = [];
                for ( var i=1, len=50000; i <= len; i++){
                    aaData.push( [ i, i, i, i, i ] );
                };
               
                $('#dt_c').dataTable({
                    "sDom": "<'row'<'col-sm-6'><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'>S>",
                    "sScrollY": "200px",
                    "aaData": aaData,
                    "bDestroy": true,
                    "bDeferRender": true
                });
                $(this).remove();
                $('#entries').html('50 000');
                $('.dataTables_scrollHeadInner').css({'height':'34px','top':'0'});
            });
            
		},
		dt_d: function() {
		
			function fnShowHide( iCol ) {
				/* Get the DataTables object again - this is not a recreation, just a get of the object */
				var oTable = $('#dt_d').dataTable();
				 
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			};
			
			var oTable = $('#dt_d').dataTable({
				"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
				"sPaginationType": "bootstrap"
			});
			
			$('#dt_d_nav').on('click','li input',function(){
				fnShowHide( $(this).val() );
			});
		},
		dt_product: function(){
			if($('#dt_product').length) {

				var oTable;
 
				/* Formating function for row details */
				function fnFormatDetails ( nTr )
				{
					var aData = oTable.fnGetData( nTr );
					var sOut = '<table cellpadding="5" cellspacing="0" border="0" class="table table-bordered" >';
					sOut += '<tr><td>Rendering engine:</td><td>'+aData[2]+' '+aData[5]+'</td></tr>';
					sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
					sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
					sOut += '</table>';
					 
					return sOut;
				}
				
				oTable = $('#dt_product').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
					"sAjaxSource": "product_relate_ajax.php?id=<?php echo $id;?>",
					"aoColumns": [
						{ "sClass": "center", "bSortable": false },
						null,
						null,
						null,
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" }
					],
					"aaSorting": [[1, 'asc']]
				} );
				
                 
				$('#dt_product').on('click','tbody td img', function () {
					var nTr = $(this).parents('tr')[0];
					if ( oTable.fnIsOpen(nTr) )
					{
						/* This row is already open - close it */
						this.src = "img/details_open.png";
						oTable.fnClose( nTr );
					} else {
						/* Open this row */
						this.src = "img/details_close.png";
						oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
					}
				} );

			}
		},
        dt_tools: function() {
			if($('#dt_tools').length) {
                $('#dt_tools').dataTable({
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'col-sm-4'l><'col-sm-4 text-right'T><'col-sm-4'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    "oTableTools": {
                        "aButtons": [
                            "copy",
                            "print",
                            {
                                "sExtends":    "collection",
                                "sButtonText": 'Save <span class="caret" />',
                                "aButtons":    [ "csv", "xls", "pdf" ]
                            }
                        ],
                        "sSwfPath": "lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                    }
                });
            }
		}, tree_c: function() {
            $("#tree_c").dynatree({
                checkbox: true,
				  classNames: {checkbox: "dynatree-radio"},
                selectMode: 1,
                onSelect: function(select, node) {
				//$(input[name="searchBar"]).val('hi');
				$("#master_categories_id").val(node.data.key);
                   // var s = node.tree.getSelectedNodes().join(" | ");
                   // $("#tree_c_echoSelection").children('pre').text(s);
                }
            });

		}
	};
		</script>
  <style>
.f-nav {background:#FFFF33; height:45px !important; }
.y-nav { margin:5px 0px 3px 0px !important;}
</style>
  <script type="text/javascript">
      
        $("document").ready(function () {
		$('body').removeClass("sidebar_hidden");
            $(window).scroll(function () {
                if ($(this).scrollTop() > 60) {
                    $('.heading').addClass("navbar navbar-default navbar-fixed-top f-nav");
					  $('.move_upper').addClass("y-nav");
					
                } else {
                    $('.heading').removeClass("navbar navbar-default navbar-fixed-top f-nav");
					$('.move_upper').removeClass("y-nav");
					
                }
            });
        });
		
    </script>
</div>
</body></html>
