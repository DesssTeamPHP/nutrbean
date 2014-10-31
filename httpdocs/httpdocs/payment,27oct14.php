<?php
include('admin/core/configuration.php');
include('common/top_header.php');
?>
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

      <article class="sub_product_full" style="margin-top:10px;">
        <?php if(isset($_REQUEST['msg'],$_REQUEST['status']))
	  {
	  
	 echo "<p style='font-size:18px;font-weight:bold;margin: 0 0 358px 1px;'>Congratulations !!! Your Payment has been Approved.Your Confirmation # is ".$_REQUEST['status'].". <br><br>Thanks For Shopping With Nutrabean.</p> "; 
	  
	  
	  }
	  else
	  {
	  
	  echo "<p align='center' style='color:#FF0000;font-size:18px;font-weight:bold'>Sorry !!! Your Transaction has been Failed.</p>";	
	  
	  
	  
	  }
	  ?>
      </article>

    <br class="spacer">
  </div>
</div>
<br class="spacer">

</body>
</html>
