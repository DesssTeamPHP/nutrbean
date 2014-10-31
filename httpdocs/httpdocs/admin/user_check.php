<?php
include('core/configuration.php');
if(isset($_POST['sku_no']))
{
$sku_no=mysql_real_escape_string($_POST['sku_no']);

      $Product_tablename_chek                  =    PRODUCTS;
	  $fieldname_one                           =    'sku_no';
	  $fieldname_one_value                     =    $sku_no;
	  $Product_select_chek                     =    $Core_Mysql->select_one_where($Product_tablename_chek,$fieldname_one,$fieldname_one_value);
	  $Product_execute_chek                    =    $Core_Mysql->db_query($Product_select_chek);
	  $Product_results_chek                    =    $Core_Mysql->db_fetch_array($Product_execute_chek);
	  $Product_num_Records_chek                =    $Core_Mysql->get_num_record($Product_execute_chek);

/*$query=mysql_query("select * from products where sku_no='$sku_no'");
$row=mysql_num_rows($query);*/
if($Product_num_Records_chek==0)
{
echo "<span style='color:green;'>SKU Available</span>";
}
else
{
echo "<span style='color:red;'>SKU Already exist</span>";
}
}
?>