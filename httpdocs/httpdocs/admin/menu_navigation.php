<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 22/03/2014 
  * Last Date: 22/03/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Menu Navigation";
/******************************************************************************/
if(!empty($_POST['publish'])) {
$d_array = $_POST['output_data'];
$result = json_decode($d_array);

$menu_one	=0;
$menu_two	=0;
$menu_three =0;
$menu_four	=0;
$menu_five	=0;

/*menu_one start*/

foreach($result as $var => $value) {

$update_id = $value->id;

$page_tablename       =  MENUPAGETABLE;//table_name
$FieldName            =  'id';
/*****************************************///////**************************************************//
$Field_types           = array('parent_id'           =>'0',
                               'is_show'             => '1',
							   'order_id'            => $menu_one
                              );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename,$FieldName,$Field_types,$update_id);
 if(!empty($value->children))
foreach ($value->children as $vchild)
{ 
	 $update_id = $vchild->id;
	 $parent_id = $value->id;
	 
	 $page_tablename_one       =  MENUPAGETABLE;//table_name
     $FieldName                =  'id';
/*****************************************///////**************************************************//
$Field_types_one           = array('parent_id'           => $parent_id,
                               'is_show'                 => '1',
							   'order_id'                => $menu_two
                                );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename_one,$FieldName,$Field_types_one,$update_id);
	 
   if(!empty($vchild->children))
	foreach ($vchild->children as $vchild1)
	{
	$update_id = $vchild1->id;
	 $parent_id = $vchild->id;
	 
	  $page_tablename_two        =  MENUPAGETABLE;//table_name
      $FieldName                 =  'id';
/*****************************************///////**************************************************//
$Field_types_two           = array('parent_id'           => $parent_id,
                               'is_show'                 => '1',
							   'order_id'                => $menu_three
                                );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename_two,$FieldName,$Field_types_two,$update_id);
	 
	 if(!empty($vchild1->children))
	foreach ($vchild1->children as $vchild2)
	{
	$update_id = $vchild2->id;
	 $parent_id = $vchild1->id;
	 
	 
	  $page_tablename_three       =  MENUPAGETABLE;//table_name
      $FieldName                  =  'id';
/*****************************************///////**************************************************//
$Field_types_three                = array('parent_id'           => $parent_id,
                                      'is_show'                 => '1',
							          'order_id'                => $menu_four
                                     );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename_three,$FieldName,$Field_types_three,$update_id);
	  
	  if(!empty($vchild2->children))
	foreach ($vchild2->children as $vchild3)
	{
	$update_id = $vchild3->id;
	 $parent_id = $vchild2->id;
	 
	  $page_tablename_four        =  MENUPAGETABLE;//table_name
      $FieldName                  =  'id';
/*****************************************///////**************************************************//
$Field_types_four                 = array('parent_id'           => $parent_id,
                                      'is_show'                 => '1',
							          'order_id'                => $menu_five
                                     );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename_four,$FieldName,$Field_types_four,$update_id);
	  
 $menu_five++;
	}
	$menu_four++;
	}
	
	$menu_three++;
	
	}
	
$menu_two++;	
}



$menu_one++;
/*menu_one Ends*/

}


$output_update = $_POST['output_update'];
$result = json_decode($output_update);
foreach($result as $var => $value) {
$update_id = $value->id;

$page_tablename       =  MENUPAGETABLE;//table_name
$FieldName            =  'id';
/*****************************************///////**************************************************//
$Field_types           = array('parent_id'           => '0',
                               'is_show'             => '0',
							   'order_id'            => '0'
                              );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename,$FieldName,$Field_types,$update_id);

// var_dump($value);
if(!empty($value->children))
foreach ($value->children as $vchild)
{
	 $update_id = $vchild->id;
	 $parent_id = $value->id;
	 
	   $page_tablename_two        =  MENUPAGETABLE;//table_name
      $FieldName                 =  'id';
/*****************************************///////**************************************************//
$Field_types_two           = array('parent_id'           => '0',
                               'is_show'                 => '0',
							   'order_id'                => '0'
                                );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename_two,$FieldName,$Field_types_two,$update_id);
	 
   if(!empty($vchild->children))
	foreach ($vchild->children as $vchild1)
	{
	$update_id = $vchild1->id;
	 $parent_id = $vchild->id;
	 
	   $page_tablename_two        =  MENUPAGETABLE;//table_name
      $FieldName                  =  'id';
/*****************************************///////**************************************************//
$Field_types_two           = array('parent_id'           => '0',
                               'is_show'                 => '0',
							   'order_id'                => '0'
                                );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename_two,$FieldName,$Field_types_two,$update_id);
 	 
	 if(!empty($vchild1->children))
	foreach ($vchild1->children as $vchild2)
	{
	$update_id = $vchild2->id;
	 $parent_id = $vchild1->id;
	 
	  $page_tablename_three       =  MENUPAGETABLE;//table_name
      $FieldName                  =  'id';
/*****************************************///////**************************************************//
$Field_types_three                = array('parent_id'               => '0',
                                          'is_show'                 => '0',
							              'order_id'                => '0'
                                          );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename_three,$FieldName,$Field_types_three,$update_id);

	  if(!empty($vchild2->children))
	foreach ($vchild2->children as $vchild3)
	{
	$update_id = $vchild3->id;
	 $parent_id = $vchild2->id;
	   $page_tablename_four        =  MENUPAGETABLE;//table_name
      $FieldName                  =  'id';
/*****************************************///////**************************************************//
$Field_types_four                 = array('parent_id'           => '0',
                                      'is_show'                 => '0',
							          'order_id'                => '0'
                                     );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($page_tablename_four,$FieldName,$Field_types_four,$update_id);
	}
	}
	}
}}


}
 
?>
<style type="text/css">
.cf:after {
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}
* html .cf {
	zoom: 1;
}
*:first-child+html .cf {
	zoom: 1;
}
html {
	margin: 0;
	padding: 0;
}
body {
	font-size: 100%;
	margin: 0;
	padding: 1.75em;
	font-family: 'Helvetica Neue', Arial, sans-serif;
}
h1 {
	font-size: 1.75em;
	margin: 0 0 0.6em 0;
}
a {
	color: #2996cc;
}
a:hover {
	text-decoration: none;
}
p {
	line-height: 1.5em;
}
.small {
	color: #666;
	font-size: 0.875em;
}
.large {
	font-size: 1.25em;
}
/**
 * Nestable
 */

.dd {
	 display: block;
    font-size: 13px;
    height: 700px;
    line-height: 20px;
    list-style: none outside none;
    margin: 0;
    max-width: 600px;
    overflow: scroll;
    padding: 0;
    position: relative;
}
.dd-list {
	display: block;
	position: relative;
	margin: 0;
	padding: 0;
	list-style: none;
}
.dd-list .dd-list {
	padding-left: 30px;
}
.dd-collapsed .dd-list {
	display: none;
}
.dd-item, .dd-empty, .dd-placeholder {
	display: block;
	position: relative;
	margin: 0;
	padding: 0;
	min-height: 20px;
	font-size: 13px;
	line-height: 20px;
}
.dd-handle {
	display: block;
	height: 30px;
	margin: 5px 0;
	padding: 5px 10px;
	color: #333;
	text-decoration: none;
	font-weight: bold;
	border: 1px solid #ccc;
	background: #fafafa;
	background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
	background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
	background:         linear-gradient(top, #fafafa 0%, #eee 100%);
	-webkit-border-radius: 3px;
	border-radius: 3px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}
.dd-handle:hover {
	color: #2ea8e5;
	background: #fff;
}
.dd-item > button {
	display: block;
	position: relative;
	cursor: pointer;
	float: left;
	width: 25px;
	height: 20px;
	margin: 5px 0;
	padding: 0;
	text-indent: 100%;
	white-space: nowrap;
	overflow: hidden;
	border: 0;
	background: transparent;
	font-size: 12px;
	line-height: 1;
	text-align: center;
	font-weight: bold;
}
.dd-item > button:before {
	content: '+';
	display: block;
	position: absolute;
	width: 100%;
	text-align: center;
	text-indent: 0;
}
.dd-item > button[data-action="collapse"]:before {
	content: '-';
}
.dd-placeholder, .dd-empty {
	margin: 5px 0;
	padding: 0;
	min-height: 30px;
	background: #f2fbff;
	border: 1px dashed #b6bcbf;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}
.dd-empty {
	border: 1px dashed #bbb;
	min-height: 100px;
	background-color: #e5e5e5;
	background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
	background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
	background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff), linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
	background-size: 60px 60px;
	background-position: 0 0, 30px 30px;
}
.dd-dragel {
	position: absolute;
	pointer-events: none;
	z-index: 9999;
}
.dd-dragel > .dd-item .dd-handle {
	margin-top: 0;
}
.dd-dragel .dd-handle {
	-webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
	box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1);
}
/**
 * Nestable Extras
 */

.nestable-lists {
	display: block;
	clear: both;
	padding: 30px 0;
	width: 100%;
	border: 0;
	border-top: 2px solid #ddd;
	border-bottom: 2px solid #ddd;
}
#nestable-menu {
	padding: 0;
	margin: 20px 0;
}
#nestable-output, #nestable2-output {
	width: 100%;
	height: 7em;
	font-size: 0.75em;
	line-height: 1.333333em;
	font-family: Consolas, monospace;
	padding: 5px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}
#nestable2 .dd-handle {
	color: #fff;
	border: 1px solid #999;
	background: #bbb;
	background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
	background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
	background:         linear-gradient(top, #bbb 0%, #999 100%);
}
#nestable2 .dd-handle:hover {
	background: #bbb;
}
#nestable2 .dd-item > button:before {
	color: #fff;
}
 @media only screen and (min-width: 700px) {
 .dd {
float: left;
width: 48%;
}
 .dd + .dd {
margin-left: 2%;
}
}
.dd-hover > .dd-handle {
	background: #2ea8e5 !important;
}
/**
 * Nestable Draggable Handles
 */

.dd3-content {
	display: block;
	height: 30px;
	margin: 5px 0;
	padding: 5px 10px 5px 40px;
	color: #333;
	text-decoration: none;
	font-weight: bold;
	border: 1px solid #ccc;
	background: #fafafa;
	background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
	background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
	background:         linear-gradient(top, #fafafa 0%, #eee 100%);
	-webkit-border-radius: 3px;
	border-radius: 3px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}
.dd3-content:hover {
	color: #2ea8e5;
	background: #fff;
}
.dd-dragel > .dd3-item > .dd3-content {
	margin: 0;
}
.dd3-item > button {
	margin-left: 30px;
}
.dd3-handle {
	position: absolute;
	margin: 0;
	left: 0;
	top: 0;
	cursor: pointer;
	width: 30px;
	text-indent: 100%;
	white-space: nowrap;
	overflow: hidden;
	border: 1px solid #aaa;
	background: #ddd;
	background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
	background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
	background:         linear-gradient(top, #ddd 0%, #bbb 100%);
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
}
.dd3-handle:before {
	
	display: block;
	position: absolute;
	left: 0;
	top: 3px;
	width: 100%;
	text-align: center;
	text-indent: 0;
	color: #fff;
	font-size: 20px;
	font-weight: normal;
}
.dd3-handle:hover {
	background: #ddd;
}
</style>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>

<div  id="maincontainer" class="clearfix">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h3 class="heading">Menu Navigation</h3>
          <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(MYPROFILE_SUCCESS));			  
		  }
		  ?>
        
       
        <menu id="nestable-menu">
<button type="button"  class="btn btn-primary"  data-action="expand-all">Expand All</button>
<button type="button"   class="btn btn-primary" data-action="collapse-all">Collapse All</button>
</menu>
<div class="cf nestable-lists">
<div class="dd" id="nestable2">
   <h2>Pages</h2>
    <ol class="dd-list" >
      <li class="dd-item" data-id="0"> </li>
      <?php 
	   $query_new= mysql_query("SELECT * FROM  menu_page_tbl WHERE   is_show='0' ");
	   while($row_new = mysql_fetch_array($query_new)) {  ?>
       <li class="dd-item" data-id="<?php echo $row_new['id']; ?>">
        <div class="dd-handle"> &nbsp; <?php echo $row_new['title']; ?></div>
      </li>
      <?php } ?>
    </ol>
  </div>

  <div class="dd" id="nestable">
  <h2>Menus</h2>
    <ol class="dd-list">
      <li class="dd-item" data-id="0"> </li>
      <?php
	  $query_sele_one ="SELECT * FROM  menu_page_tbl WHERE parent_id = '0' and is_show='1' order by order_id asc";
	   $query = mysql_query($query_sele_one);
	while($row = mysql_fetch_array($query)) {  ?>
      <li class="dd-item dd3-item" data-id="<?php echo $row['id']; ?>">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd-handle dd3-content"> &nbsp; <?php echo $row['title']; ?></div>
        <ol class="dd-list">
          <?php 
							$id = $row['id']; 
						 $query_sele_two ="SELECT * FROM menu_page_tbl WHERE parent_id = '$id'  AND is_show='1' order by  order_id asc ";
						 $query1 = mysql_query($query_sele_two); 
						while($row1 = mysql_fetch_array($query1)) {  ?>
          <li class="dd-item dd3-item" data-id="<?php echo $row1['id']; ?>">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd-handle dd3-content"> &nbsp; <?php echo $row1['title']; ?></div> 
            <ol class="dd-list">
              <?php 
							$id2 = $row1['id']; 
						$query_sele_three ="SELECT * FROM menu_page_tbl WHERE parent_id = '$id2'  AND is_show='1' order by  order_id asc ";
						$query2 = mysql_query($query_sele_three);
						while($row2 = mysql_fetch_array($query2)) {  ?>
              <li class="dd-item dd3-item" data-id="<?php echo $row2['id']; ?>">
                <div class="dd-handle dd3-handle"></div>
                <div class="dd-handle dd3-content"> &nbsp; <?php echo $row2['title']; ?></div>
                <ol class="dd-list">
                  <?php 
							$id3 = $row2['id']; 
						$query_sele_four="SELECT * FROM menu_page_tbl WHERE parent_id = '$id3'  AND is_show='1' order by order_id asc";
						$query3 = mysql_query($query_sele_four);
						while($row3 = mysql_fetch_array($query3)) {  ?>
                  <li class="dd-item dd3-item" data-id="<?php echo $row3['id']; ?>">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd-handle dd3-content"> &nbsp; <?php echo $row3['title']; ?></div>
                    <ol class="dd-list">
                      <?php 
							$id4 = $row3['id']; 
							$query_sele_five="SELECT * FROM menu_page_tbl WHERE parent_id = '$id4'  AND is_show='1' order by order_id asc";
						$query4 = mysql_query($query_sele_five);
						while($row4 = mysql_fetch_array($query4)) {  ?>
                      <li class="dd-item dd3-item" data-id="<?php echo $row4['id']; ?>">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd-handle dd3-content"> &nbsp; <?php echo $row4['title']; ?></div>
                      </li>
                      <?php } ?>
                    </ol>
                  </li>
                  <?php } ?>
                </ol>
              </li>
              <?php } ?>
            </ol>
          </li>
          <?php } ?>
        </ol>
      </li>
      <?php } ?>
    </ol>
  </div>
  
  
  
  
  
  
  
</div>
<form method="post">
  <textarea  id="nestable-output" style="display:none;" name="output_data"></textarea>
  <textarea  id="nestable2-output" style="display:none;" name="output_update"></textarea>
  <input type="submit"  class="btn btn-primary"  name="publish" id="publish" value="publish">
</form>
    </div>
</div></div></div>
 <?php require 'common/admin-sidebar.php';?>
 <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate.min.js"></script>
    <script src="lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
    <!-- touch events for jquery ui-->
	<script src="js/forms/jquery.ui.touch-punch.min.js"></script>
        <!-- easing plugin -->
	<script src="js/jquery.easing.1.3.min.js"></script>
    <!-- smart resize event -->
	<script src="js/jquery.debouncedresize.min.js"></script>
    <!-- js cookie plugin -->
	<script src="js/jquery_cookie_min.js"></script>
    <!-- main bootstrap js -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- bootstrap plugins -->
	<script src="js/bootstrap.plugins.min.js"></script>
	<!-- typeahead -->
	<script src="lib/typeahead/typeahead.min.js"></script>
    <!-- code prettifier -->
	<script src="lib/google-code-prettify/prettify.min.js"></script>
    <!-- sticky messages -->
	<script src="lib/sticky/sticky.min.js"></script>
    <!-- tooltips -->
	<script src="lib/qtip2/jquery.qtip.min.js"></script>
    <!-- lightbox -->
	<script src="lib/colorbox/jquery.colorbox.min.js"></script>
    <!-- jBreadcrumbs -->
	<script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
	<!-- hidden elements width/height -->
	<script src="js/jquery.actual.min.js"></script>
	<!-- custom scrollbar -->
	<script src="lib/slimScroll/jquery.slimscroll.js"></script>
	<!-- fix for ios orientation change -->
	<script src="js/ios-orientationchange-fix.js"></script>
	<!-- to top -->
	<script src="lib/UItoTop/jquery.ui.totop.min.js"></script>
	<!-- mobile nav -->
	<script src="js/selectNav.js"></script>

	<!-- common functions -->
	<script src="js/gebo_common.js"></script>

    <!-- datatable -->
	<script src="lib/datatables/jquery.dataTables.min.js"></script>
	<script src="lib/datatables/extras/Scroller/media/js/dataTables.scroller.min.js"></script>
	<!-- datatable table tools -->
    <script src="lib/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
    <script src="lib/datatables/extras/TableTools/media/js/ZeroClipboard.js"></script>
    <!-- datatables bootstrap integration -->
    <script src="lib/datatables/jquery.dataTables.bootstrap.min.js"></script>
    
	<!-- datatable functions -->
	<script src="js/gebo_datatables.js"></script>
    	<script src="lib/smoke/smoke.js"></script>
	<!-- notifications functions -->
    <script src="js/gebo_notifications.js"></script>
 <script>
function myFunction()
{

var conf = confirm("Are you sure you wish to delete?");
	if(!conf)
	{
		return false;
	}
 return true;  

}
</script>
	
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
<script src="js/jquery.nestable.js"></script>
<script>

$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);
    
    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    updateOutput($('#nestable2').data('output', $('#nestable2-output')));

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    $('#nestable3').nestable();

});
</script>
	 <script>
function validate_update()
	{   
	
	 var menuval = document.getElementById('menuval').value;
	  
	  
   validate_catupd(menuval)
	return false;
	}
function validate_catupd(menuval)
	{  
$.ajax({
type:"POST",
url:"ajax_menu.php",
data:"&menuval="+menuval,
success: function(html)
{
//window.location.href='maps.php';
$("#nestable2").html(html);
}

}); }
</script>  
</div>
					</body>
				</html>
