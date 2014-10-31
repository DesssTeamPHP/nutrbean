<?php
//include('admin/core/configuration.php');
include('code.php');
$prod_id=get_seo_id(@$_GET['id']);
if($prod_id!="")
{
$fetch_product ='products_id = '.$prod_id;
}
else
{
$fetch_product ="products_url ='".$_GET['id']."'";
}
$query_product_fetch        = "select * from products where $fetch_product ";
$product_qty_fetch          = mysql_query($query_product_fetch);
$cnt1_product               = mysql_num_rows($product_qty_fetch); 
if( $cnt1_product>0)  {
$prod_qty             =  mysql_fetch_array($product_qty_fetch);  
/*Meta title*/

if(trim($prod_qty['meta_title'])!="")
{ $meta_title = $prod_qty['meta_title']." - NutraBean&#8482;"; }
else 
{ $meta_title = $prod_qty['products_name']." - NutraBean&#8482;"; }
/*Meta title*/

if(trim($prod_qty['meta_description'])!="")
{ $meta_desc = $prod_qty['meta_description']; }
else 
{ $meta_desc = $prod_qty['products_description']; }


if(trim($prod_qty['meta_keywords'])!="")
{ $meta_key = $prod_qty['meta_keywords']; }
else 
{ $meta_key = $prod_qty['products_name']." - NutraBean&#8482"; }
}

?>
<body>
<?php include('common/header.php');
if( $cnt1_product>0)  {
  include("product_details.php");
  }
?>

<div class="spacer"></div>
<div class="wrapper">
  <div class="container">
    <article  style="min-height:600px;"   class="min_height1">
    
   
   <?php  if($content['sub_title']!="") {?>
    
      <h2 class="h2"><?php echo stripslashes($content['sub_title'])?></h2>
      <?php echo $content['content'];?>
      <?php } else {   ?><h2 class="h2">404</h2>
      <p> Dear Customer the page you are looking may be removed, or its name changed, or is temporarily unavailable.</p> <?php } ?>
    </article>
  </div>
  <div class="spacer"></div>
<div class="footer">
	<ul >
	<li><a href="http://www.nutrabean.local-listing.us/terms-conditions.html">Terms & Conditions </a></li>
    <li><a href="http://www.nutrabean.local-listing.us/privacy-policy.html"> Privacy Policy </a></li>
    <li><a href="http://www.nutrabean.local-listing.us/contact.html"> Contact </a></li>
    <li style="border-right:none;"><a href="http://www.nutrabean.local-listing.us/returns.html"> Returns</a></li>
    </ul>
</div>
<div class="spacer"></div>
</div>

