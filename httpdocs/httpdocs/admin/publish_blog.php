<?php 

/*******************************************************************************
  * Developed By Desss Inc
  * Developer: karunakaran
  * Date     : 02/22/2014 
  * Last Date: 02/22/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
require("code.php");
/*********************Blog**********************************************/
	//For Selecting Query
	  $Blog_tablename         =    BLOG;
	  $fieldname_one_like     =    'file_name';
	  $fieldname_like         =    '%.html%';
	  
	  $blog_select            =    $Core_Mysql->select_two_like($Blog_tablename,$fieldname_one_like,$fieldname_like); 
	  $blog_execute           =    $Core_Mysql->db_query($blog_select);
	 
	
////////////////////////////////////////=========END=============//////////////////

$name = "../";
$blog_num_Records            =    $Core_Mysql->get_num_record($blog_execute);
$i=1;

while($blog_results          =    $Core_Mysql->db_fetch_array($blog_execute))
 {
	  $people                =    $blog_results['file_name'];
	  $page_id               =    $blog_results['id'];	 
//For Selecting Query	 
	  $Blog_tablename        =    BLOG;
	  $FieldName             =    'file_name';
	  $fieldname_one_value   =    $people;
	  
	  
                            
	  $Blog_select_que       =    $Core_Mysql->select_one_where($Blog_tablename,$FieldName,$fieldname_one_value);
	  $Blog_execute_pub      =    $Core_Mysql->db_query($Blog_select_que);
	
	 
	 $j                      =    $i;
	 $split_uri_folder       =    explode('/',$people);
	 $count_folder           =    count($split_uri_folder)-2;
	 $page_name_folder       =    $split_uri_folder[$count_folder];
	 $dirname                =    $page_name_folder;
     $filename               =    ($name. $dirname);
  
    if (file_exists($dirname)) {

	} else {
        mkdir($name . $dirname, 755);
      
    }	
	
	  while($blog_publish   =     $Core_Mysql->db_fetch_array($Blog_execute_pub))
    {
			  
		
		$content_html1      =   "";
		$meta_title         =   "";
		$meta_content       =   "";
		$meta_keyword       =   "";
		$eventimage_viwe    =   "";
		$about_info         =   "";
		$content            =   "";
		$id                 =   "";
		$img_alt            =   "";
		$sidebars           =   "";
		$num                =   "";
		$meta_title         =   $blog_publish['meta_title'];
		$file_name          =   $blog_publish['file_name'];
		$meta_content       =   $blog_publish['meta_content'];
		$meta_keyword       =   $blog_publish['meta_keyword'];
		$eventimage_viwe    =   $blog_publish['image'];
		$img_alt            =   $blog_publish['img_alt'];
		$content            =   $blog_publish['real_description'];
		$img_description    =   $blog_publish['img_description'];
		$id                 =   $blog_publish['id'];
		$header_title1      =   $blog_publish['h1_title'];
		$header_title2      =   $blog_publish['h2_title'];
		$is_restaurant      =   $blog_publish['is_restaurant'];
	 	
	
		
	if($eventimage_viwe!="")	
	
		{
		$eventimage='<div class="max_width"><a href="'.$fullPath.$people.'" > <img class="max_width" src="'.$fullPath.'uplodeImage/thumbImg/'.$eventimage_viwe.'" width="952" height="240"  alt="'.$img_alt.'"  title="'.$img_alt.'"  /></a></div>';
		
		
		}
	else
	{
	$eventimage='<div class="max_width"><a href="'.$fullPath.$people.'" ><img class="max_width" src="'.$fullPath.'uplodeImage/thumbImg/default.jpg" title="DESSS"  alt="DESSS" /></a></div>';
	
		}	
	
	

						  
 $is_menu  =  $blog_publish['is_menu'];

	
include('publish_html_main.php');
chmod("$people",0777);
$fh = fopen($name.$people,'w') or die("can't open file");
fwrite($fh,$content_html1);
fclose($fh);
		
		 
		
		}
		
	
	$i++;
}

$data = array('msg' =>'update');
			   $send_val		=	http_build_query($data);
               header("Location:blog.php?".$send_val);



?>