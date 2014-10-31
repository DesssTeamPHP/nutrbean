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
$Product_results['products_url']="";
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
$Product_results['sort_order']="";
$Product_results['tab_name']="";
$Product_results['tab_desc']=""; 
$Product_results['title']="";
$Product_results['sort_order']="";



$master_categories_id ="";

$id="0";

}

/******************************============END==============************************/

if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 

$products_name               = $_REQUEST['products_name'];
$sku_no 				     = $_REQUEST['sku_no'];
/*if(trim($_REQUEST['products_url'])=="")
{
$products_url	                 =  print_seo_link_admin($_REQUEST['products_name']) ;

}
else
{*/
$products_url	                 = $_REQUEST['products_url'];
/*
}*/
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
$sort_order                  = $_REQUEST['sort_order'];
$availability_type           = $_REQUEST['availability_type'];

$tab_name                    = $_POST['tab_name'];
$tab_desc                    = $_POST['tab_desc'];



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
							   'products_url'         => addslashes($products_url),
							   'products_description' => $products_description,
							   'visibility'           => $visibility_type,
                               'products_image'       => $file_name_img,
                               'actual_price'         => $actual_price,
							   'status'               => $status_type,
							    'products_price'      => $products_price,
							   'sort_order'           => $sort_order, 
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
							   
							   'tab_name'             => serialize($tab_name),
							   'tab_desc'             => serialize($tab_desc),
							   
							   'types'                => $type,
							    'create_date'		  => date("Y-m-d H:i:s") 
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
/*if(trim($_REQUEST['products_url'])=="")
{
$products_url	                 =  print_seo_link_admin($_REQUEST['products_name']) ;

}
else
{*/
$products_url	                 = $_REQUEST['products_url'];

/*}*/
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
$sort_order                  = $_REQUEST['sort_order'];
$meta_title                  = $_REQUEST['meta_title'];
$meta_keywords               = $_REQUEST['meta_keywords'];
$meta_description            = $_REQUEST['meta_description'];
$imghidden                   = $_REQUEST['imghidden'];
$manage_type                 = $_REQUEST['manage_type'];
$quantity                    = $_REQUEST['quantity'];
$availability_type           = $_REQUEST['availability_type'];
$master_categories_id 		 = $_REQUEST['master_categories_id'];

$tab_name                   = $_POST['tab_name'];
$tab_desc                    = $_POST['tab_desc'];


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
							   'products_url'         => addslashes($products_url),
							   'products_description' => addslashes($products_description),
							    'sort_order'          => $sort_order,
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
							   'tab_name'             => serialize($tab_name),
							   'tab_desc'             => serialize($tab_desc),
							   'types'                => $type
                              );
						
					//print_r($Field_types);	die;
						
						
						
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
<style>
.form-control1 {
	background-color: #FFFFFF;
	border: 1px solid #CCCCCC;
	border-radius: 4px;
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
	color: #555555;
	display: block;
	font-size: 14px;
	height: 194px;
	line-height: 1.42857;
	padding: 6px 12px;
	transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
	vertical-align: middle;
	width: 518px;
}
.form-control2 {
	background-color: #FFFFFF;
	border: 1px solid #CCCCCC;
	border-radius: 4px;
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
	color: #555555;
	display: block;
	font-size: 14px;
	height: 34px;
	line-height: 1.42857;
	padding: 6px 12px;
	transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
	vertical-align: middle;
	width: 306px;
}
</style>
<link rel="stylesheet" type="text/css" href="css/default.css"/>
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
              <div  class="form-group">
                <label >Description:</label>
                <textarea name="products_description" id="wysiwg_full"  class="wysiwg_full" cols="30" rows="10" tabindex="3"><?php echo $Product_results['products_description'];?></textarea>
              </div>
              <div class="form-group">
                <label>SKU:<span class="f_req">*</span></label>
                <input name="sku_no"  id="sku_no" class="form-control" tabindex="4" type="text" maxlength="50" value="<?php echo $Product_results['sku_no'];?>">
                <br />
                <div id="disp"></div>
              </div>
              <div  class="form-group">
                <label>URL Key : </label>
                <input name="products_url" id="products_url" class="form-control" style="text-transform:lowercase;" tabindex="5"  type="text" maxlength="500" value="<?php echo $Product_results['products_url'];?>">
                <br />
                <div id="disp_url"></div>
              </div>
              <div  class="form-group" style="display:none;">
                <label>Visibility:</label>
                <p><span class="label label-default"></span></p>
                <select name="visibility_type" id="visibility_type" onchange="return sub_type(this.value);" class="form-control" tabindex="6" >
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
              <div  class="form-group">
                <label>Sort Order: </label>
                <input name="sort_order" id="sort_order" class="form-control number_only_valiq" tabindex="9"  type="text" maxlength="20" value="<?php echo $Product_results['sort_order'];?>">
                <br />
                <div id="disp_url"></div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab_br2">
            <h4>Attribute</h4>
            <div class="form-group">
              <label>S.W.No:</label>
              <input name="s_w_no"  id="s_w_no" class="form-control" tabindex="9" maxlength="100" type="text" value="<?php echo $Product_results['s_w_no'];?>">
            </div>
            <!--<div class="form-group">
                <label>Color:</label>
                <input name="colors"  id="colors" class="form-control" tabindex="10"  maxlength="100"  type="text" value="<?php echo $Product_results['colors'];?>">
              </div>-->
            <!--<div class="form-group">
              <label>Page Yield:</label>
              <input name="pageyield"  id="pageyield" class="form-control" tabindex="11" maxlength="100"  type="text" value="<?php echo $Product_results['pageyield'];?>">
            </div>-->
            <!--<div class="form-group">
              <label>Sugg Sell:</label>
              <input name="sugg_sell"  id="sugg_sell" class="form-control" type="text" value="<?php echo $Product_results['sugg_sell'];?>" tabindex="12" maxlength="100">
            </div>-->
            <!--<div class="form-group">
              <label>Type:</label>
              <input name="type"  id="type" class="form-control" type="text" value="<?php echo $Product_results['types'];?>" tabindex="13" maxlength="100">
            </div>-->
          </div>
          <div class="tab-pane" id="tab_br3">
            <h4 >Pricing</h4>
            <div  class="form-group">
              <label>Product Price:<span class="f_req">*</span></label>
              <input name="products_price"  id="products_price" class="form-control " type="text" value="<?php echo $Product_results['products_price'];?>" tabindex="14" maxlength="50">
            </div>
            <div  class="form-group">
              <label>Actual Price:</label>
              <input name="actual_price"  id="actual_price" class="form-control " type="text" value="<?php echo $Product_results['actual_price'];?>" tabindex="15" maxlength="50">
            </div>
            <!--<div  class="form-group">
                <label>OEM Price:</label>
                <input name="oem_price"  id="oem_price" class="form-control number_only_valiq" type="text" value="<?php echo $Product_results['oem_price'];?>" tabindex="16" maxlength="50">
              </div>-->
            <div  class="form-group">
              <label>Level3 Cost:</label>
              <input name="level3_price"  id="level3_price" class="form-control " type="text" value="<?php echo $Product_results['level3_price'];?>" tabindex="17" maxlength="50">
            </div>
            <!--<div  class="form-group">
                <label>OEM Numbers:</label>
                <input name="oem_part_no"  id="oem_part_no" class="form-control" type="text" value="<?php echo $Product_results['oem_part_no'];?>" tabindex="18" maxlength="50">
              </div>-->
            <div class="form-group">
              <label>Tax Class:</label>
              <p><span class="label label-default"></span></p>
              <select name="tax_type" id="tax_type"  class="form-control" tabindex="19" maxlength="50"  >
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
              <select name="availability_type" id="manage_type" onchange="return sub_type(this.value);" tabindex="25" class="form-control" maxlength="50">
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
            <input type="hidden" name="master_categories_id" id="master_categories_id" value="<?php echo $master_categories_id;?>"/>
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
            <h4 >Tabs</h4>
            <script type="text/javascript" src="js/script.js"></script>
            <form action="" class="register" method="POST">   <textarea readonly="readonly" name="norows" id="norows"  style="width: 36px; height: 36px; display:none;"  cols="0" rows="0"></textarea><textarea  style="width: 36px; height: 36px;display:none;" readonly="readonly" name="nocols"  id="nocols" cols="0" rows="0"></textarea>
              <fieldset class="row2">
              <p>
                <input type="button" value="Add Tab" onclick="addRow()" />
                <input type="button" value="Remove Tab" onclick="deleteSelectedRows()"  />
              </p>
              <?php  
			  
			   
		   	$tab_name=unserialize($Product_results['tab_name']);
				$tab_desc=unserialize($Product_results['tab_desc']);
	
		    if(count($tab_name)>0 && $tab_name!="" ) { ?>
              <table>
                
              </table>
              <table id="dataTable_new" class="form" border="1">
                <tbody>
                <tr>
                  <td>Selection</td>
                  <td> Tab Name</td>
                  <td>Tab Descriptions</td>
                </tr>
                  <?php 
					foreach($tab_name as $a => $b){ ?>
                  <tr>
                
                    <td ><?php  $a+1; ?>
                    <input type="checkbox" id="newCheckbox"></td>
                    <td  ><input type="text" class="form-control2"  name="tab_name[]" value="<?php echo $tab_name[$a]; ?>">
                    </td>
                    <td  >
                    
                    <textarea name="tab_desc[]"   class="form-control1" cols="30" rows="10" tabindex="3"><?php echo $tab_desc[$a]; ?></textarea>
                    
                   
                    </td>
                  
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php } else {?>
              <table id="dataTable_new" class="form" border="1" style="display:block;">
                <tbody>
                  <tr>
                 
                    <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
                    <td ><input name="tab_name[]"   class="form-control2"  required="required" type="text" value="">
                    </td>
                    <td  ><textarea name="tab_desc[]"  required="required"  cols="10" rows="3" class="form-control1"></textarea>
                    </td>
                   
                  </tr>
                </tbody>
              </table>
              <?php } ?>
              <div class="clear"></div>
              </fieldset>
              <div class="clear"></div>
            </form>
          </div>
         <div class="tab-pane" id="tab_br8">
          <div class="form_con1" id="p_exp">
        
         </div>  
     
         <div class="form_bt" style="text-align:right">
          <button class="btn btn-primary"  id="addExp" name="add" type="submit" value="submit">Add</button>
         </div>
         <div  id="textid"  style="display:none">
        <table id="dataTable_new" class="form" border="1" >
                <tbody>
                <tr>
                  <td>Title *</td>
                  <td> Price</td>
                  <td>Price Type</td>
                  <td>SKU</td>
                  <td>Sort Order</td>
                  <td>Children</td>
                </tr>
                 <table  class="form" border="1" id="value" >
                 </table>
                    <div class="form_bt" style="text-align:right" >
          <button class="btn btn-primary"  id="addval" name="add" type="submit" value="submit"  >Add</button>
         </div>
                </tbody>
              </table>
         </div>  
  </div>
</div>
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar" >
  <div class="sidebar_inner_scroll">
    <div class="sidebar_inner">
      <div id="side_accordion" class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading" id="toggle_tabs"> <a href="javascript:void(0)"  class="accordion-toggle "> &nbsp;Product Informations</a> </div>
          <div class="accordion-body " id="collapseOne">
            <div class="panel-body">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#tab_br1" data-toggle="tab">General</a></li>
                <li><a href="#tab_br2" data-toggle="tab">Attributes</a></li>
                <li><a href="#tab_br3" data-toggle="tab">Prices</a></li>
                <li><a href="#tab_br4" data-toggle="tab">Meta Information</a></li>
                <li><a href="#tab_br5" data-toggle="tab">Inventory</a></li>
                <li><a href="#tab_br7" data-toggle="tab">Tabs</a></li>
                <li><a href="#tab_br6" data-toggle="tab">Categories</a></li>
                <li><a href="#tab_br8" data-toggle="tab">Custom Option</a></li>
                <!-- <li><a href="#tab_br7" data-toggle="tab">Related Products</a></li>-->
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="push"></div>
    </div>
  </div>
</div><script language=javascript> setInterval("updateCount()", 10);

function updateCount() {

 

 var rows = document.getElementById('dataTable_new').rows.length;

 var cols = $('#dataTable_new').find('tr')[0].cells.length;
 
 $('#nocols').html( cols );
 $('#norows').html( rows );

 
 
 }	</script>
<script>


// Add row to the HTML table
function addRow() {    
 var table = document.getElementById('dataTable_new'); //html table
 var rowCount = table.rows.length; //no. of rows in table
 var columnCount =  table.rows[0].cells.length; //no. of columns in table          
 var row = table.insertRow(rowCount); //insert a row            
 
 var cell1 = row.insertCell(0); //create a new cell           
 var element1 = document.createElement("input"); //create a new element           
 element1.type = "checkbox"; //set the element type 
 element1.setAttribute('id', 'newCheckbox'); //set the id attribute         
 cell1.appendChild(element1); //append element to cell
             
var rowpluse=document.getElementById('norows').value;			 
			 
			 
var cell2 = row.insertCell(1);          
cell2.innerHTML = '<input type="text" name="tab_name[]" id="tab_name[]"  class="form-control2" style="background-color:#FFFFFF;" value="" />'; //append data to cell
 
 
var cell3 = row.insertCell(2);
      
cell3.innerHTML = '<textarea style="width: 518px; height: 194px;"style="background-color:#FFFFFF" id="tab_desc[]" class="form-control" name="tab_desc[]"></textarea> '; //append data to cell
 
 



 //Add the cells for more than 3 columns
 if(columnCount >= 3){
  for (var i=4; i<=columnCount; i++) {
   var newCel = row.insertCell(i-1); //create a new cell           
   var element = document.createElement("div"); //create a div element
   var txt = document.createTextNode("cell "+i); //create a text element
   element.appendChild(txt); //append text to div      
   newCel.innerHTML = '<textarea style="width: 200px; height: 40px;"style="background-color:#FFFFFF" id="tab_desc[]" class="form-control"  name="tab_desc[]"></textarea> '; //appent div to cell
  }
 }
} 

// delete the selected rows from table
function deleteSelectedRows() {    
 var table = document.getElementById('dataTable_new'); //html table
        var rowCount = table.rows.length; //no. of rows in table          
 for(var i=0; i< rowCount; i++) { //loops for all row in table               
  var row = table.rows[i]; //return a particular row              
  var chkbox = row.cells[0].childNodes[0]; //get check box onject               
  if(null != chkbox && true == chkbox.checked) { //wheather check box is selected                   
   table.deleteRow(i); //delete the selected row                    
   rowCount--; //decrease rowcount by 1                   
   i--;               
  }             
 }
}

  

</script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>  
<script type="text/javascript" src="js/jquery.1.4.3.js"></script> 


<script>
var $j = jQuery.noConflict();
$j(function() {
	
        var scntDiv = $('#value');
       var i = $('#value').size()+ 1;
        $j('#addval').live('click', function() {
                $('<table  class="form" border="1" id="value" ><tr><td><input type="text" class="form-control2"  name="Title[]" id="Title[]" value=""></td><td><input type="text" class="form-control2"  name="Price[]" id="name="Price[]"" value=""></td><td><select name="product_price_type[]" id="product_price_type[]"><option value="fixed">Fixed</option><option value="percent">Percent</option></select></td><td> <input type="text" class="form-control2"  name="sku[]" id="sku[]" value=""></td><td><input type="text" class="form-control2"  name="Children[]" id="Children[]" value=""><input type="hidden" class="form-control2"  name="hiddenval[]" id="hiddenval" value=""></td><td> <div class="form_bt"><button class="btn btn-primary"  id="expremoveval" name="add" type="submit" value="submit">Delete</button></div></td></tr>').appendTo(scntDiv);
                i++;
                return false;
        });
                
         $j('#expremoveval').live('click', function() { 
                if( i >1) {
						 $(this).parents('tr').remove();
                        i--;
                }
				
                return false;
        });
});         
                  
  </script>    
  
  <script>
var $j = jQuery.noConflict();
$j(function() {
	
        var scntDiv = $('#p_exp');
		
       var i = $('#p_exp #rmvcan1').size()+ 1;
	   
        $j('#addExp').live('click', function() {
		
                $('<table id="dataTable_new" class="form" border="1"><tbody><tr><td><input type="hidden"  name="idval" id="idval"  value="'+ i +'" ">Title</td><td><input type="text"  name="email_id" id="email_id"  value=""></td> <td>Input Type</td><td ><select class="dropbox1" name="category" id="categoryval" ><option value="0">--SELECT--</option><optgroup label="Select"><option value="drop_down'+ i +'" onclick="functionval(this.event)">Drop-down</option><option value="radio'+ i +'" onclick="functionval(this.event)">Radio Buttons</option><option value="checkbox'+ i +'" onclick="functionval(this.event)">Checkbox</option><option value="multiple'+ i +'" onclick="functionval(this.event)">Multiple Select</option></optgroup></select></td><td>Required</td><td><select class="dropbox1" name="Required" id="Required"><option value="0">--SELECT--</option><option value="">Yes</option><option value="">No</option></select></td><td>Sort Order</td> <td> <input type="text" name="sort_order" id="sort_order"></td><td> <div class="form_bt"><button class="btn btn-primary"  id="expremove" name="add" type="submit" value="submit" >Delete</button></div></td></tr></tbody></table>').appendTo(scntDiv);      
                i++;
                return false;
				
        });
                
         $j('#expremove').live('click', function() { 
                if( i >1) {
						 $(this).parents('table').remove();
                        i--;
                }
				
                return false;
        });
});         
                  
  </script> 
      
  <script>
var $j = jQuery.noConflict();
$j(document).ready(function(){
  $j("#categoryval").change(function(){
	alert('s');
	//$j("#textid").css("display","block");
  });
});


function functionval(vall)
{
	
	alert(document.getElementById('categoryval').value);
	
	document.getElementById('textid').style.display='block';
	
}
</script>  


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
				
			<?php if($master_categories_id!="") { ?>	
				
			onPostInit: function(isReloading, isError) {
            var key = $("#master_categories_id").val();
            if( key ) {
                this.activateKey(key);
            }
        }, <?php } ?>
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
<script type="text/javascript" src="js/jquery.number.js"></script>
<script type="text/javascript">
			
			$(function(){
				// Set up the number formatting.
				
			//	$('#number_container').slideDown('fast');
				
				/*$('#price').on('change',function(){
					console.log('Change event.');
					var val = $('#price').val();
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});*/
				
				//$('#price').change(function(){
				//	console.log('Second change event...');
				//});
				
				//$('#products_price').number( true, 2 );
				//$('#actual_price').number( true, 2 );
				//$('#oem_price').number( true, 2 );
				//$('#level3_price').number( true, 2 );
			
				
				
				// Get the value of the number for the demo.
				//$('#get_number').on('click',function(){
					
				//	var val = $('#price').val();
					
					//('#the_number').text( val !== '' ? val : '(empty)' );
				//});
			});
		</script>
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
<!--checksku  -->
<script type="text/javascript">
$(document).ready(function(){
$("#sku_no").keyup(function() {
var sku_no = $('#sku_no').val();
if(sku_no=="")
{
$("#disp").html("");
}
else
{
$.ajax({
type: "POST",
url: "user_check.php",
data: "sku_no="+ sku_no ,
success: function(html){
$("#disp").html(html);
}
});
return false;
}
});
});
</script>
<!--checkurl  -->
<script type="text/javascript">
$(document).ready(function(){
$("#products_url").keyup(function() {
var products_url = $('#products_url').val();
if(products_url=="")
{
$("#disp_url").html("");
}
else
{
$.ajax({
type: "POST",
url: "check_url.php",
data: "cat_url="+ products_url ,
success: function(html){
$("#disp_url").html(html);
}
});
return false;
}
});
});
</script>
</div>
</body>
</html>