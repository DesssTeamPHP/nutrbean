<?php
include('admin/core/configuration.php');
$productid         =  $_REQUEST['productid'];
$product_price     =  $_REQUEST['productprice'];
$product_shipping  =  $_REQUEST['shippingprice'];
//$total_amount      =  $product_price + $product_shipping; 


             $promocode                               =        $_REQUEST['promocode'];
            

             $select_promo_quote                      =         "SELECT * FROM `promo_quote` where   promo_coupon_code='".$promocode."'";
			 $promo_quote_execute                     =         mysql_query($select_promo_quote);
			 if(!$promo_quote_execute)
			 mysql_error();
			 $promo_quote_results                     =         mysql_fetch_array($promo_quote_execute);
			 $promoquote_num_Records                  =         mysql_num_rows($promo_quote_execute);
             $promo_quote_discount_amount             =         $promo_quote_results['promo_quote_discount_amount']; 




$total_amount      =  $product_price + $product_shipping - $promo_quote_discount_amount; 

?>

<input type="hidden"  name="product_cost" id="product_cost" value="<?php echo $product_price; ?>" />
<input type="hidden" name="grant_total"  id="grant_total" value="<?php echo $total_amount; ?>" />
<input type="hidden" name="product_id" id="product_id" value="<?php echo $productid; ?>" />
<input type="hidden" name="promo_quote_discount_amount" id="promo_quote_discount_amount" value="<?php echo $promo_quote_results['promo_quote_discount_amount'];?>" />
          <li>
            <p>Product Cost:</p>
            <span>$<?php echo $product_price;?></span></li>
          <li>
            <p>Discount:</p>
            <span id="vall">$<?php echo $promo_quote_discount_amount;?></span></li>
          <li>
            <p>Shipping Cost:</p>
            <span>$<?php echo $product_shipping;?></span></li>
          <li>
            <p>Order Total:</p>
            <span>$<?php echo $total_amount;?></span></li>
       