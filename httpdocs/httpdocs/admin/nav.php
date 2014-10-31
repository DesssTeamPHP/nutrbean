<?php  include('core/configuration.php');?><style type="text/css">

div#tree {
	position: absolute;
	height: 95%;
	width: 95%;
	padding: 5px;
	margin-right: 16px;
}
ul.fancytree-container {
	height: 100%;
	width: 100%;
	background-color: transparent;
}
span.fancytree-title {
	color: white;
	text-decoration: none;
}
span.fancytree-focused span.fancytree-title {
	outline-color: white;
}
span.fancytree-node:hover span.fancytree-title,
span.fancytree-active span.fancytree-title,
span.fancytree-active.fancytree-focused span.fancytree-title,
.fancytree-treefocus span.fancytree-title:hover,
.fancytree-treefocus span.fancytree-active span.fancytree-title {
	color: #39414A;
}
span.external span.fancytree-title:after {
	content: "";
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAMAAAC67D+PAAAAFVBMVEVmmcwzmcyZzP8AZswAZv////////9E6giVAAAAB3RSTlP///////8AGksDRgAAADhJREFUGFcly0ESAEAEA0Ei6/9P3sEcVB8kmrwFyni0bOeyyDpy9JTLEaOhQq7Ongf5FeMhHS/4AVnsAZubxDVmAAAAAElFTkSuQmCC") 100% 50% no-repeat;
	padding-right: 13px;
}
/* Remove system outline for focused container */
.ui-fancytree.fancytree-container:focus {
	outline: none;
}
.ui-fancytree.fancytree-container {
	border: none;
}
</style>

<script type="text/javascript">
	$(function(){
		// --- Initialize sample trees
		$("#tree").fancytree({
			autoActivate: false, // we use scheduleAction()
			autoCollapse: true,
//			autoFocus: true,
			autoScroll: true,
			clickFolderMode: 3, // expand with single click
			minExpandLevel: 2,
			tabbable: false, // we don't want the focus frame
			// scrollParent: null, // use $container
			focus: function(event, data) {
				var node = data.node;
				// Auto-activate focused node after 1 second
				if(node.data.href){
					node.scheduleAction("activate", 1000);
				}
			},
			blur: function(event, data) {
				data.node.scheduleAction("cancel");
			},
			activate: function(event, data){
				var node = data.node,
					orgEvent = data.originalEvent;

				if(node.data.href){
					window.open(node.data.href, (orgEvent.ctrlKey || orgEvent.metaKey) ? "_blank" : node.data.target);
				}
			},
			click: function(event, data){ // allow re-loads
				var node = data.node,
					orgEvent = data.originalEvent;

				if(node.isActive() && node.data.href){
					// data.tree.reactivate();
					window.open(node.data.href, (orgEvent.ctrlKey || orgEvent.metaKey) ? "_blank" : node.data.target);
				}
			}
		});
	});
</script>


  <script src="sidmenu/jquery.js" type="text/javascript"></script>
  <script src="sidmenu/jquery-ui.custom.js" type="text/javascript"></script>
  <link href="sidmenu/skin-win8/ui.fancytree.css" rel="stylesheet" type="text/css">
  <script src="sidmenu/jquery.fancytree.js" type="text/javascript"></script>
<noframes>
	<body>
		<p>This page requires frames.</p>
	</body>
</noframes>
<div class="sidebar">
    <div class="sidebar_inner_scroll">
      <div class="sidebar_inner">
        <h3>Categories</h3>
        <div id="tree">
          <ul >
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
	$statue='class=""';
	else
	$statue='class=""';
	
	
		 $qry2= "select * from categories where parent_id	=".$row['categories_id'];
		$qry_result2 = mysql_query($qry2);
		  if(mysql_num_rows($qry_result2)  == '0')
		  {
		 echo '<li id="tree-'.$row['categories_id'].'" ><a target="content"  onclick="go_cat_val(\''.$row['categories_id'].'\');"  href="categories.php?cat_id='.$row['categories_id'].'"  >'.$row['categories_name'].'</a></li>';
		}
		else
		{
echo '<li '.$statue.' id="tree-'.$row['categories_id'].'" class="folder"><a target="content"  onclick="go_cat_val(\''.$row['categories_id'].'\');"  href="categories.php?cat_id='.$row['categories_id'].'"   >'.$row['categories_name'].'</a><ul class="sub" >';		 
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
	$statue='class=""';
	else
	$statue='class=""';
		 $qry2= "select * from categories where parent_id	=".$row['categories_id'];
		$qry_result2 = mysql_query($qry2);
		  if(mysql_num_rows($qry_result2)  == '0')
		  {
		  echo '<li id="tree-'.$row['categories_id'].'" ><a target="content"  onclick="go_cat_val(\''.$row['categories_id'].'\');"  href="categories.php?cat_id='.$row['categories_id'].'"  >'.$row['categories_name'].'</a></li>';
		}
		else
		{
echo '<li '.$statue.' id="tree-'.$row['categories_id'].'" class="folder"><a target="content" onclick="go_cat_val(\''.$row['categories_id'].'\');"   href="categories.php?cat_id='.$row['categories_id'].'"  >'.$row['categories_name'].'</a><ul class="sub"  >';	

	
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