<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 03/7/2014 
  * Last Date: 03/7/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "User-Permission-Page";
error_reporting(0);
/*********************Cms Menu Tabke**********************************************/
	//For Selecting Query
	  $cmsmenu_tablename      =    CMSMENUTABLE;
	  $FieldName              =    'id';
	  $sororder               =    'asc';
	   $Field_types           = array('id',      
                               'menu_name'         
						                  );
                            
	  $cmsmenu_select          =    $Core_Mysql->select_common_query($cmsmenu_tablename,$FieldName,$Field_types,$sororder);
	  $cmsmenu_execute         =    $Core_Mysql->db_query($cmsmenu_select);
	  $cmsmenu_num_Records     =    $Core_Mysql->get_num_record($cmsmenu_execute);
	
////////////////////////////////////////=========END=============//////////////////

$usercms_tablename      =    USERCMSLINKTABLE;//table_name
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 

/*********************************************Delete******************************/

	  $usercms_tablename                 =    USERCMSLINKTABLE;
	  $fieldname_one                     =    'user_id';
	  $fieldname_one_value               =    $_REQUEST['id'];
	  $usercms_delete                    =    $Core_Mysql->delete_common_query($usercms_tablename,$fieldname_one,$fieldname_one_value);
	  $usercmsdele_execute               =    $Core_Mysql->db_query($usercms_delete);
	  
	  
///////////////////////////////////////========END========////////////////////////

foreach(array_filter($_POST['check']) as $key=>$value)
			{
				$checMenu	= $_POST['check'][$key];
				$order      = $_POST['menu_order'.$value];
				
$Field_types                = array('user_id'                 => $_REQUEST['id'],
                                     'menu_id'                => $checMenu,
						             'order_id'               => $order
                                    );
						   
 $Message_admin             =  $Core_Mysql->insert_common_query($usercms_tablename,$Field_types);

        if($Message_admin != 0)
           {
			    $successmsg =  'Permissions Successfully Updated';
                       $msg =   error_notification_message($successmsg);
		       header("Location:user_list.php?msg=".$msg );
           }
        else 
          {
 	       echo $Message_admin; 
          }
			}
}

if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: user_list.php");
	}


?>
  
    <script type="text/javascript">
<!--
/* http://www.alistapart.com/articles/zebratables/ */
function removeClassName (elem, className) {
	elem.className = elem.className.replace(className, "").trim();
}

function addCSSClass (elem, className) {
	removeClassName (elem, className);
	elem.className = (elem.className + " " + className).trim();
}

String.prototype.trim = function() {
	return this.replace( /^\s+|\s+$/, "" );
}

function stripedTable() {
	if (document.getElementById && document.getElementsByTagName) {  
		var allTables = document.getElementsByTagName('table');
		if (!allTables) { return; }

		for (var i = 0; i < allTables.length; i++) {
			if (allTables[i].className.match(/[\w\s ]*scrollTable[\w\s ]*/)) {
				var trs = allTables[i].getElementsByTagName("tr");
				for (var j = 0; j < trs.length; j++) {
					removeClassName(trs[j], 'alternateRow');
					addCSSClass(trs[j], 'normalRow');
				}
				for (var k = 0; k < trs.length; k += 2) {
					removeClassName(trs[k], 'normalRow');
					addCSSClass(trs[k], 'alternateRow');
				}
			}
		}
	}
}

window.onload = function() { stripedTable(); }
-->
</script>
  <link href="css/table_css.css" rel="stylesheet" type="text/css">
  
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>

<div  id="maincontainer" class="clearfix">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
    
    	
<div class="row sepH_c">				
			<div class="col-sm-12 col-md-12 tableContainer" id="tableContainer">
              <h3 class="heading">Site Details</h3> 
            <form class="form_validation_ttip" method="post" enctype="multipart/form-data">
				<table class="table " >
                    <thead class="fixedHeader">
                        <tr>
                            <th width="70%">Menus Name</th>
                            <th width="20%" align="center">Show All Menus <input type="checkbox" id="select-all" name="select-all"></th>
                            <th width="10%">Menu Order</th>
                        </tr>
                    </thead>
                    <tbody class="menu_order_scroll scrollContent"  ><?php 
                         while($cmsmenu_results   = $Core_Mysql->db_fetch_array($cmsmenu_execute))
                             {
 /*********************User Cms Menu Tabke Link**********************************************/
	//For Selecting Query
	   $cmsuserselect_tablename        =    USERCMSLINKTABLE;
	   $fieldname_one                  =    'user_id';
	   $fieldname_two                  =    'menu_id';
	   $fieldname_one_value            =     $_REQUEST['id'];
	   $fieldname_two_value            =     $cmsmenu_results["id"];
                            
	  $cmsuserselect_select            =    $Core_Mysql->select_two_where($cmsuserselect_tablename,$fieldname_one,$fieldname_one_value,$fieldname_two,$fieldname_two_value);
	  $cmsuserselect_execute           =    $Core_Mysql->db_query($cmsuserselect_select);
	  $cmsuserselect_num_Records       =    $Core_Mysql->get_num_record($cmsuserselect_execute);
	  $cmsuserselect_results           =    $Core_Mysql->db_fetch_array($cmsuserselect_execute);
	 
////////////////////////////////////////=========END=============//////////////////
								
					         ?>
                        <tr>
                            <td width="70%"><?php echo $cmsmenu_results["menu_name"];?></td>
                            <td width="20%"><input type="checkbox" name="check[]" id="check[]" <?php if($cmsmenu_results["id"]==$cmsuserselect_results["menu_id"]){ echo'checked="checked"';}?> value="<?php echo $cmsmenu_results["id"];?>"></td>
                            <td width="10%"><input type="text" class="menu_order"  name="menu_order<?php echo $cmsmenu_results["id"];?>" id="menu_order<?php echo $cmsmenu_results["id"];?>"  value="<?php echo $cmsuserselect_results["order_id"];?>"/> <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'];?>"/></td>
                      
                        </tr><?php  } ?>
                    <!--    <tr>
                            <td>New Page</td>
                            <td><input type="checkbox"></td>
                            <td><input type="text" value="0" /></td>
                        </tr>
                        <tr>
                            <td>New Page</td>
                            <td><input type="checkbox"></td>
                            <td><input type="text" value="0" /></td>
                        </tr>
                        <tr>
                            <td>New Page</td>
                            <td><input type="checkbox"></td>
                            <td><input type="text" value="0" /></td>
                        </tr>-->
                    </tbody>
                </table>	
                <div class="form-actions">
			    <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button> 
				<input type="submit" class="btn btn-primary" name="Close" value="Cancel" >
			</div>
		</form>
			</div>
		</div>

    </div>
    </div>
  
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
  
  
  
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
$("#select-all").on("click", function() {
  var all = $(this);
  $('input:checkbox').each(function() {
       $(this).prop("checked", all.prop("checked"));
  });
});
</script>	  
</div>

</body>
</html>
