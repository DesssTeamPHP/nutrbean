
<div class="sidebar">
  <div class="sidebar_inner_scroll">
    <div class="sidebar_inner">
      <h3>Categories</h3>
      <h3><a  href="categories.php" style="float:left; margin-top:2px;" class="btn btn-default button-next">Add New Root Category<i class="glyphicon glyphicon-chevron-right"></i></a></h3>
      <div style="clear:both;"></div>
      <div id="container">
        <ul  class="topnav">
          <?php 
			

function recursive_menu($id)
	{
	
	
	if(isset($_REQUEST['cat_id']))
	$getva1=$_REQUEST['cat_id'];
	else
	$getva1=0;
	
	

		
	   $qry = "select * from categories where parent_id	=".$id; 
		$qry_result = mysql_query($qry);
		  if(mysql_num_rows($qry_result)  >0)
		{ 
		while($row = mysql_fetch_assoc($qry_result))
		{
		if($getva1==$row['categories_id'])
	$statue='class="tpactive"';
	else
	$statue='class=""';
	
	
		 $qry2= "select * from categories where parent_id	=".$row['categories_id'];
		$qry_result2 = mysql_query($qry2);
		  if(mysql_num_rows($qry_result2)  == '0')
		  {
		 echo '<li  '.$statue.' ><a href="categories.php?cat_id='.$row['categories_id'].'" >'.$row['categories_name'].'</a></li>';
		}
		else
		{
echo '<li '.$statue.'  ><p class="novalid"></p><a href="categories.php?cat_id='.$row['categories_id'].'"  >'.$row['categories_name'].'</a><ul>';		 
recursive_menu($row['categories_id']);
	echo '</ul></li>';  
		}
		}
		}
	
		
		
	}
		if(isset($_REQUEST['cat_id']))
	$getva1=$_REQUEST['cat_id'];
	else
	$getva1=0;
	 $qry = "select * from categories where parent_id = 0"; 
		$qry_result = mysql_query($qry);
		  if(mysql_num_rows($qry_result)  >0)
		{ 
		while($row = mysql_fetch_assoc($qry_result))
		{
			if($getva1==$row['categories_id'])
	$statue='class="tpactive"';
	else
	$statue='class=""';
		 $qry2= "select * from categories where parent_id	=".$row['categories_id'];
		$qry_result2 = mysql_query($qry2);
		  if(mysql_num_rows($qry_result2)  == '0')
		  {
		  echo '<li  '.$statue.' ><a href="categories.php?cat_id='.$row['categories_id'].'" >'.$row['categories_name'].'</a></li>';
		}
		else
		{
echo '<li '.$statue.' ><p class="novalid"></p><a href="categories.php?cat_id='.$row['categories_id'].'"   >'.$row['categories_name'].'</a><ul  >';	

	
	 recursive_menu($row['categories_id']);
	echo '</ul></li>';  
		}
		}	
		
		}
		
?>
        </ul>
      </div>
    </div>
  </div>
</div>
