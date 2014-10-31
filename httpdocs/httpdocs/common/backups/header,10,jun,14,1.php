<div class="wrapper bg-1 b_bottom">
  <div class="container">
    <div class="account_detial">
      <?php 
	
	if(isset($_SESSION['uid'])){ 
	if($_SESSION['uid']!='Guest')
				{
					 $query9 = "select * from user_details where e_mail='".$_SESSION['uid']."'";
					$exQuery9 = mysql_query($query9);
					$ntt9=mysql_fetch_array($exQuery9);
				
					if(mysql_num_rows($exQuery9)>0) {
					
					
					 ?>
      <p class="flright">&nbsp; |<a title="Sign Off" href="logout.php" >Log Out</a></p>
      <p class="flright"><a title="My Account" href="sign_up.php?uid=<?=$ntt9['id']?>" >Welcome
        <?=$ntt9['first_name']?>
        </a></p>
      <?php } else { ?>
      <p class="flright">&nbsp; |<a title="Sign Off" href="logout.php" >Log Out</a></p>
      <p class="flright"><a title="My Account" href="javascript:void(0)" >Welcome <?php echo $_SESSION['uid']?></a></p>
      <?php }	}
		else
		{
		?>
      <p class="flright">&nbsp; | <a title="Register Here" href="sign_up.php">Register Here</a></p>
      <p class="flright"> <a  title="Log in" href="login.php">Sign in</a> </p>
      <?php 
		}
		
		
		
		
				} else
				{
			?>
      <p class="flright">&nbsp; | <a title="Register Here" href="sign_up.php">Register Here</a></p>
      <p class="flright"> <a  title="Log in" href="login.php">Sign in</a> </p>
      <?php } ?>
    </div>
  </div>
  <div class="spacer"></div>
</div>
<!--<div class="wrapper bg-2">
  <div class="container">
    <p class="flright" >
      <?php     
	
	$cart_ses_id=$_SESSION['session_id'];
	 $qrychk_cart	=	"select product_id,quantity from cart where php_session_id='$cart_ses_id'";
            $qrychkexe_cart	=	mysql_query($qrychk_cart);
			$cnt_cart		=	mysql_num_rows($qrychkexe_cart);
			if($cnt_cart>0)
			{
		?>
      <a   title="My Cart ( <?php echo $cnt_cart;?> &nbsp; Item)" href="<?=$full_path;?>add_to_cart.php">My Cart ( <?php echo $cnt_cart;?> &nbsp; Item) </a>
      <?php }
			else
			{ ?>
      <a   title="Your Shopping Cart Is Empty" href="<?=$full_path;?>add_to_cart.php">My Cart </a>
      <?php	}?>
    </p>
    <a class="toggleMenu" href="#">Menu</a>
    <ul class="nav">
      <li  class="test"> <a href="index.php">Home</a> </li>
      <?php 
	  
	    $qry_products = "select products_url,products_name,products_id from products where status = 'Enabled' order by sort_order ASC limit 0,5 "; 
		$qry_products_result = mysql_query($qry_products);
		  if(mysql_num_rows($qry_products_result)  >0)
		{ 
		
		  while($rows_product=mysql_fetch_assoc($qry_products_result)){
		  
		 if(trim($rows_product['products_url'])!="" ) 
		 {
		  echo  '<li><a href="'.$rows_product['products_url'].'">'.$rows_product['products_name'].'</a> </li>';  
    }
	else
	{
	echo  '<li><a href="'.print_seo_link($rows_product['products_id'],$rows_product['products_name']).'"  >'.$rows_product['products_name'].'</a> </li>';
	
	}
      
  }
  }
	  ?>
    </ul>
  </div>
</div>-->
