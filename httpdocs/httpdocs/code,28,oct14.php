<?php  include("admin/core/configuration.php");


$fullpath="http://www.nutrabean.local-listing.us/";
//fetching Content
function content()
{

$fullpath = "http://www.nutrabean.local-listing.us/";
	  $content = array();
	  $uri = $_SERVER['REQUEST_URI'];
		$split_uri=explode('/',$uri);
		$count=count($split_uri)-1;
		$page_name=$split_uri[$count];
		if($page_name == '')
		{
			$page_name = 'index.php';
		
		}

		$page_name_array=explode('?',$page_name);
		
		 if($page_name_array[0] != "") {
		 	
         $page_id_query="select * from menu_page_tbl where file_name='".$page_name_array[0]."'";	

			$page_id_query_exec=mysql_query($page_id_query);
			if(mysql_num_rows($page_id_query_exec) > 0) {
			
		
				$get_main_cat_array = mysql_fetch_array($page_id_query_exec);
				$imageId = $get_main_cat_array['id'];	
	//fetching records Sidebars for Each Page

		
		$content['file_name'] = $get_main_cat_array['file_name'];	
				
				//$content = $get_main_cat_array['description'];
				
				if($get_main_cat_array['h1_title']=="")
				{
				$content['sub_title'] = $get_main_cat_array['title'];
				
				}
				else
				{
				$content['sub_title'] = $get_main_cat_array['h1_title'];
				
				}
				
					
				$content['sub_content'] = $get_main_cat_array['h2_title'];	
				$content['meta_misc'] = $get_main_cat_array['meta_misc'];	
				$content['meta_content'] = $get_main_cat_array['meta_content'];
				$content['meta_title'] = $get_main_cat_array['meta_title'];		
				$content['meta_keyword'] = $get_main_cat_array['meta_keyword'];
				$content['title'] = $get_main_cat_array['title'];	
				$content['page_id'] = $get_main_cat_array['id'];	
				$content['img_description']= $get_main_cat_array['img_description'];		
					$content['description']= $get_main_cat_array['description'];	
				$content['content']= $get_main_cat_array['real_description'];	
				$content['downloads']= $get_main_cat_array['downloads'];	
				$content['page_type']= $get_main_cat_array['page_type'];	
				$content['image']= $get_main_cat_array['image'];	
				
				$content['iconimg']= $get_main_cat_array['iconimg'];	
				
					$content['banner_image']= $get_main_cat_array['banner_image']; 
				
					$content['img_alt']= $get_main_cat_array['img_alt']; 
					$content['read_more_title']= $get_main_cat_array['read_more_title']; 
					$content['logo_show']= $get_main_cat_array['logo_show']; 
					
					
					

			}  
			else { $page_id_query1='select * from menu_page_tbl where file_name="page.php"';	
			$page_id_query_exec1=mysql_query($page_id_query1); 
			if(mysql_num_rows($page_id_query_exec1)>0) {	
			
				$get_main_cat_array = mysql_fetch_array($page_id_query_exec1);
				
				
				
				$imageId = $get_main_cat_array['id'];	
				
				
				
				
					
		$query_side_bar = "select b.title as title,b.file_name as file_name from navi_each_page_tbl a,menu_page_tbl b where a.page_id=".$imageId." and a.link_id=b.id order by a.page_order asc";
	$content['sidebars_side_bar']="";
	$query_result_side_bar = mysql_query($query_side_bar);
	$sideEach_cont_side_bar=mysql_num_rows($query_result_side_bar);
	if($sideEach_cont_side_bar>0){
$content['sidebars_side_bar'].='<div class="row"> <h3>Related links</h3>
            <ul>';
		while($val_side_bar = mysql_fetch_assoc($query_result_side_bar))
		{	
					$content['sidebars_side_bar'].="<li><a href='".$val_side_bar['file_name']."'>".$val_side_bar['title']."</a></li>";

		}
		
		$content['sidebars_side_bar'].='</ul></div>';
		
	}
				

				
	$content['related_products'] ="";
		$content['img_description']= $get_main_cat_array['img_description'];
				$content['file_name'] = $get_main_cat_array['file_name'];	
				//$content = $get_main_cat_array['description'];
				$content['sub_title'] = $get_main_cat_array['h1_title'];	
				$content['sub_content'] = $get_main_cat_array['h2_title'];	
				$content['meta_misc'] = $get_main_cat_array['meta_misc'];	
				$content['meta_content'] = $get_main_cat_array['meta_content'];
				$content['meta_title'] = $get_main_cat_array['meta_title'];		
				$content['meta_keyword'] = $get_main_cat_array['meta_keyword'];
				$content['title'] = $get_main_cat_array['title'];	
				$content['content']= $get_main_cat_array['real_description'];	
				$content['description']= $get_main_cat_array['description'];	
				$content['img_alt']= $get_main_cat_array['img_alt']; 
					$content['downloads']= $get_main_cat_array['downloads'];	
				$content['page_type']= $get_main_cat_array['page_type'];	
$content['image']= $get_main_cat_array['image'];	
$content['iconimg']= $get_main_cat_array['iconimg'];	$content['read_more_title']= $get_main_cat_array['read_more_title']; 
					$content['logo_show']= $get_main_cat_array['logo_show']; 
			  } else { 
			  
			  $content['thumImage'] = '<img src="images/servece-banner.jpg" alt="LiveWire" title="LiveWire">';	
	$content['gallary'] = '';	
	$content['youtube'] = '<img src="images/servece-banner.jpg" alt="LiveWire" title="LiveWire">';		
	$content['Video'] = '<img src="images/servece-banner.jpg" alt="LiveWire" title="LiveWire"> ';	
	$content['icon'] = ' <img class="head_left_img" src="images/service-icon.png" alt="LiveWire" title="LiveWire">';	
	$content['sidebars_side_bar']="";
		
				$content['sub_title'] = "404 Page Not Found";	
				$content['sub_content'] = "";	
				$content['meta_misc'] = "";	
				$content['meta_content'] = "";
				$content['meta_title'] ="404 Page Not Found";		
				$content['meta_keyword'] = "";
				$content['title'] = "404 Page Not Found";	
				$content['content']= "Dear Customer the page you are looking may be removed, or its name changed, or is temporarily unavailable.";	
				$content['img_description']= "";
				$content['file_name']= $page_name_array[0];
					$content['description']= "";	
					$content['downloads']= "";	
				$content['page_type']="";	 $content['related_products']="";
				$content['image']= "";	
				$content['iconimg']= "";	
			$content['banner_image']= "";$content['img_alt']= ""; $content['read_more_title']= ""; 
					$content['logo_show']=""; 
			  } }
			
			
			
		 }
		 
		return $content;
}
$content = array();
$content = content();

//fetching records for Contact 
$query = "";
$query_result = "";
$resultset = "";
$query = "select * from contact_tbl order by id desc "; 
$query_result = mysql_query($query);
	if(mysql_num_rows($query_result)>0) {	
		$val = mysql_fetch_assoc($query_result);
		$contact_number 	= $val['contact_no'];
		$contact_mail		=$val['contact_mail'];
		$contact_address	=$val['contact_address'];
		$contact_time		=$val['contact_time'];
		$contact_fax		=$val['contact_fax'];

	 
}
else
{

$contact_number 	="";
		$contact_mail		="";
		$contact_address	="";
		$contact_time		="";
		$contact_fax		="";
		
}










//fetching records for Analitic Code
function analitic_code()
{
	$analitic = array();
	$query = "";
	$query_result = "";
	$resultset = "";
    $query = "select * from analitic_tbl";
	$query_result = mysql_query($query);
	$resultset = mysql_fetch_assoc($query_result);
	if(count($resultset)>0) {
		$analitic['meta_misc'] = $resultset['meta_misc'];
		$analitic['g_analitic'] = $resultset['g_analitic'];
	} 

	return $analitic;
}
$analitic = array();
$analitic = analitic_code();


		
		
		

		
		
	
			
?>
