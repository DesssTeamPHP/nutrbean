<?php
include('core/configuration.php');
if(isset($_POST['cat_url']))
{
$cat_url=mysql_real_escape_string($_POST['cat_url']);

      $Product_tablename_chek_url                   =    PRODUCTS;
	  $fieldname_one                                =    'cat_url';
	  $fieldname_one_value                          =    $cat_url;
	  $Product_select_chek_url                      =    $Core_Mysql->select_one_where($Product_tablename_chek_url,$fieldname_one,$fieldname_one_value);
	  $Product_execute_chek_url                     =    $Core_Mysql->db_query($Product_select_chek_url);
	  $Product_results_chek_url                     =    $Core_Mysql->db_fetch_array($Product_execute_chek_url);
	  $Product_num_Records_chek_url                 =    $Core_Mysql->get_num_record($Product_execute_chek_url);

/*$query=mysql_query("select * from products where sku_no='$sku_no'");
$row=mysql_num_rows($query);*/
if($Product_num_Records_chek_url==0)
{
echo "<span style='color:green;'>URL Available</span>";
}
else
{
echo "<span style='color:red;'>URL Already exist</span>";
}
}
?>