<?php
include('admin/core/configuration.php');
include('common/top_header.php');
?>
<style>
.btn{
	background: none repeat scroll 0 0 #1b5630;
    border: 1px solid #ffffff;
    border-radius: 5px;
    box-shadow: 0 2px 4px 0 #000000;
    color: #ffffff;
    cursor: pointer;
    display: inline-block;
	 margin: 0 117px 0 0;
    font-size: 15px;
    font-weight: bold;
    padding: 5px 9px;
    text-decoration: none;
}
</style>
<body>
<div class="container">
<?php include('common/header.php');

?>
<div class="spacer"></div>
<div >

    <noscript >
    This site has features that require javascript. <a href="http://www.activatejavascript.org" target="_blank" style="color:#FF0000">Please enable JavaScript </a>.
    </noscript>
    <h2 class="h2" style="margin:100px 0px 0px 0px "> Payment Status </h2>

      <article class="sub_product_full" style="margin-top:10px;min-height:416px;">
        <?php if(isset($_REQUEST['msg'],$_REQUEST['status']))
	  {
	  
	 echo "<p style='font-size:18px;font-weight:bold;margin: 0 0 20px 1px;'>Congratulations !!! Your Payment has been Approved.Your Confirmation # is ".$_REQUEST['status'].". <br><br>Thanks For Shopping With Nutrabean.</p> "; 
	  
	  
	  }
	  else
	  {
	  
	  echo "<p align='center' style='color:#FF0000;font-size:18px;font-weight:bold'>Sorry !!! Your Transaction has been Failed.</p>";	
	  
	  
	  
	  }
	  ?>
      <a  class="place_order btn" href="http://www.nutrabean.local-listing.us">Go to Home page</a>
      <a  class="place_order btn" href="http://www.nutrabean.local-listing.us/product_details.php">Continue to Product Page</a>
      </article>

    <br class="spacer">
  </div>
</div>
<br class="spacer">

</body>
</html>
