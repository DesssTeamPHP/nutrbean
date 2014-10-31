<?php
include('core/configuration.php');

$product_id				 = mysql_real_escape_string($_REQUEST['product_id']);
$master_categories_id	 = mysql_real_escape_string($_REQUEST['catid']);

if($_REQUEST['optionval'] == 'enable')
{

     $Field_types           = array('master_categories_id'           => $master_categories_id);
	 
}	
else
{

     $Field_types           = array('master_categories_id'           => "");
	 
} print_r($Field_types );
				
   $Message_admin      =  $Core_Mysql->update_common_query('products','products_id',$Field_types,$product_id);
   
print_r( $Message_admin);

 
?>