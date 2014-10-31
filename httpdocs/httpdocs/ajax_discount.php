<?php
include('admin/core/configuration.php');
if(isset($_POST['promocode']))
{

             $promocode                               =        $_REQUEST['promocode'];
             $promo_quote_discount_amount             =        $_REQUEST['promo_quote_discount_amount'];

             $select_promo_quote                      =         "SELECT * FROM `promo_quote` where   promo_coupon_code='".$promocode."'";
			 $promo_quote_execute                     =         mysql_query($select_promo_quote);
			 if(!$promo_quote_execute)
			 mysql_error();
			//exit;
			 $promo_quote_results                     =         mysql_fetch_array($promo_quote_execute);
			 $promoquote_num_Records                  =         mysql_num_rows($promo_quote_execute);
		     $promo_quote_discount_amount             =         $promo_quote_results['promo_quote_discount_amount']; 
		     if($promoquote_num_Records!=1)
			 {
				echo '<span>$0.00</span>';
			 }
             else
			 {
		     echo '<span>$'.$promo_quote_discount_amount.'</span>';
			}
			
}

?>
           
       