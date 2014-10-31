<?php
include('core/configuration.php');
if(isset($_POST['promo_coupon_code']))
{
$promo_coupon_code=mysql_real_escape_string($_POST['promo_coupon_code']);

      $Promo_tablename_chek                  =    promo_quote;
	  $fieldname_one                         =    'promo_coupon_code';
	  $fieldname_one_value                   =    $promo_coupon_code;
	  $Promo_select_chek                     =    $Core_Mysql->select_one_where($Promo_tablename_chek,$fieldname_one,$fieldname_one_value);
	  $Promo_execute_chek                    =    $Core_Mysql->db_query($Promo_select_chek);
	  $Promo_results_chek                    =    $Core_Mysql->db_fetch_array($Promo_execute_chek);
	  $Promo_num_Records_chek                =    $Core_Mysql->get_num_record($Promo_execute_chek);

/*$query=mysql_query("select * from products where sku_no='$sku_no'");
$row=mysql_num_rows($query);*/
if($Promo_num_Records_chek==0)
{
echo "<span style='color:green;'>Promo Coupon Code Available</span>";
}
else
{
echo "<span style='color:red;'>Promo Coupon Already exist</span>";
}
}
?>