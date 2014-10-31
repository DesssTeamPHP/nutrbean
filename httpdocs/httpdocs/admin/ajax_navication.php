<?php 

include('core/configuration.php');
$menuval=$_REQUEST['menuval'];

?>

<div  id="nestable2">
  <h2>All Menus Name</h2>
  <?php if($_REQUEST['menuval']!='0')
{
$menuval=$_REQUEST['menuval'];?>
  <ol class="dd-list" >
    <li class="dd-item"> </li>
    <?php
  $query_new= mysql_query("select * from menu_page_tbl where page_category=".$menuval."  order by id asc ");
	   while($row_new = mysql_fetch_array($query_new)) {  ?>
    <li class="dd-item" data-id="<?php echo $row_new['id']; ?>">
      <div class="dd-handle"> &nbsp; <?php echo $row_new['title']; ?></div>
    </li>
    <?php } ?>
  </ol>
  <?php } ?>
</div>
