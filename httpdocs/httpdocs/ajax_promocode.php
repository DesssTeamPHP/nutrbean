<?php include('admin/core/configuration.php');
if(isset($_POST['promocode']))
{
            $promocode                           =        $_REQUEST['promocode'];


             $select_promo                       =         "SELECT * FROM `promo_quote` where  now() between `promo_quote_from_date` and `promo_quote_to_date` and promo_coupon_code='".$promocode."'";
			 $promo_execute                      =         mysql_query($select_promo);
			 if(!$promo_execute)
			 mysql_error();
			 //exit;
			 $promo_results                      =         mysql_fetch_array($promo_execute);
			 $promo_num_Records                  =         mysql_num_rows($promo_execute);
			 
			  $promo_quote_usescoupon            =         $promo_results['promo_quote_usescoupon'];
			 
			
			 
				
			 $select_promo1                       =         "SELECT * FROM `promo_quote` where promo_coupon_code='".$promocode."'  limit 0,".$promo_quote_usescoupon;
			 $promo_execute1                      =         mysql_query($select_promo1);
			 if(!$promo_execute1)
			 mysql_error();
			 //exit;
			 $promo_results1                      =         mysql_fetch_array($promo_execute1);
			 $promo_num_Records1                  =         mysql_num_rows($promo_execute1);
			 
			  if($promo_num_Records1==1)
			 {
				echo "yes";
			 }
             else
			 {
				echo "<span class='alert alert-danger alert-dismissable'>Expired Coupon Code</span>";
			 }
			
			 


}
?>