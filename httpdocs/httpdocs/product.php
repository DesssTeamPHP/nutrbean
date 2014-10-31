<div class="spacer"></div>
<div class="wrapper">
  <div class="container MT_10 MB_20 border1 ">
    <section class="wrapper_inner">
      <article class="product_img">
        <?php if($prod_qty['products_image']!='' & file_exists('admin/uplodeImage/thumbImg/'.$prod_qty['products_image']))
				{?>
        <img src="admin/uplodeImage/thumbImg/<?php echo $prod_qty['products_image']?>" alt="<?php echo $prod_qty['products_name'];?>" title="<?php echo $prod_qty['products_name'];?>" >
        <?php  }
      else
      {
     echo '<img src="images/logo1.png" alt="'.$prod_qty['products_name'].'" title="'.$prod_qty['products_name'].'" align="absmiddle">';
	  
	  }
      ?>
      </article>
      <article class="fleft">
        <article class="product_con">
          <h1><?php echo $prod_qty['products_name'];?></h1>
          <p><?php echo $prod_qty['products_description']?></p>
        </article>
        <article class="product_con"> <br class="spacer">
        </article>
        <br class="spacer">
      </article>
      <article class="flright ">
        <article class="one_time_order">
          <p class="one_time_order_p">Order Now</p>
          <!-- <br class="spacer" />
          <p class="one_time_order_p1">RECURRING</p>-->
          <br class="spacer">
          <article class="one_time_order_con">
            <form id="addcart" name="addcart" method="get" action="">
              <article class="one_time_order_option">
                <!-- <input class="one_time_order_checkbox " type="checkbox">-->
                 <p>Stock</p>
                <span style="width:65px;" > <?php if( $prod_qty['stock_availability'] == 'In Stock' && $prod_qty['quantity'] > 0 ) { echo 'In Stock'; } else { echo 'Out of Stock'; } ?> </span>
                 <p>Quantity</p>
                <?php if( $prod_qty['stock_availability'] == 'In Stock' && $prod_qty['quantity'] > 0 ) { ?>   <span ><?php echo $prod_qty['quantity'];?></span> <?php } else { ?>  <center>   <span >0</span></center> <?php } ?>
                <p>Unit Price</p>
                <span>$<?php echo $prod_qty['products_price'];?></span>
                <input type="hidden" id="pid" name="pid" value="<?=$prod_qty['products_id']?>" />
               <?php if( $prod_qty['stock_availability'] == 'In Stock' && $prod_qty['quantity'] > 0 ) { ?>  <input class="one_time_order_textbox number_only_valiq" type="text" name="qtyy" id="qtyy"    maxlength="3"> <?php } ?>
                <br class="spacer">
              </article>
              <!--<article class="one_time_order_option">
              <input class="one_time_order_checkbox " type="checkbox">
              <p>30 ct. bottle</p>
              <span>$<?php echo  $prod_qty['actual_price'];?></span>
              <input class="one_time_order_textbox" type="text" name="qtyy" id="qtyy" onKeyDown="mask(event,this)" onKeyUp="mask(event,this)" onClick="mask(event,this)" maxlength="3">
              <br class="spacer">
            </article>-->
             <?php if( $prod_qty['stock_availability'] == 'In Stock' && $prod_qty['quantity'] > 0 ) { ?>
              <input style="cursor:pointer;" name="addtocart1" type="submit" value="Add to cart" class="add_to_cart_bt" />
                <?php } else { ?>  <center>   <span style="width:65px; margin-top:15px;"><strong>Stock unavailable </strong></span></center> <?php } ?> 
              <!-- <p class="ship_free">Add $26.01 more to your cart to<br>
                qualify for FREE SHIPPING!</p>-->
            </form>
          </article>
        </article>
        <ul class="help_list">
          <!-- <li><a href="javascript:void(0);">Have a Question?</a></li>-->
          <!--  <li><a href="#">Add to Wish List</a></li>-->
          <!-- <li><a href="javascript:void(0)">Email to a Friend</a></li>-->
        </ul>
        <br class="spacer" />
      </article>
      <div class="spacer"></div>
     <!-- <article class="con_tab">
        <div id="container1">
          <?php
  $tab_name=unserialize($prod_qty['tab_name']);
				$tab_desc=unserialize($prod_qty['tab_desc']);
				$tab_content ="";
				$last_value=count($tab_name);
				 if(count($tab_name)>0 && $tab_name!="" ) { 
				 
				 echo  '<ul class="tabs1">';
				 
				 	foreach($tab_name as $a => $b){ 
					 $a+1;
					 if($a==0)
					 $cls_li='class="active1"';
					 else
					  $cls_li='';
					  
					  
					   if($a==($last_value-1))
					 $style_li=' style="margin-right:0px;"';
					 else
					  $style_li='';
					  
					  
					  
					if(trim($tab_name[$a])!="") { 
					 
					echo  '<li  '.$cls_li.$style_li.' rel="tab'.$a.'">'.$tab_name[$a].'</li>';
						$tab_content .=  '<div id="tab'.$a.'" class="tab_content01"> <div class="spacer"></div>
						<article class="disrciptioncon">'.$tab_desc[$a].'</article></div>';
					}
					}
					 echo  '</ul>';
				 
				 }
					
    
        
        echo '<div class="tab_container1">'.$tab_content.'<br class="spacer"></div>';
        
         ?>
          <!-- .tab_container1 -->
        <!--  </div>
      </article>-->
    </section>
    <div class="spacer"></div>
  </div>
</div>
</div>
<?php include('common/footer.php');?>
