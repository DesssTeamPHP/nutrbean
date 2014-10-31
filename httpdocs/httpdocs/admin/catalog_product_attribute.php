<?php 

/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 02/25/2014 
  * Last Date: 02/25/2014
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');

$meta_title  =  "My Attribites - Administrator";
/*********************Blog**********************************************/
	//For Selecting Query
	  $Attribute_tablename           =     attribute_tbl;
	  $FieldName                     =    'attribute_id';
	  $sororder                      =    'asc';
	  $Field_types                   = array('attribute_id',
	                                      'attribute_code',      
                                          'attribute_scope',
										  'attribute_default_value', 
										  'attribute_unique_value',
										  'attribute_values_required',
										  'attribute_apply_to',
										  'attribute_admin',
										  'attribute_default_store',
										  'create_date'
										 );
                            
	  $Attribute_select            =    $Core_Mysql->select_common_query($Attribute_tablename,$FieldName,$Field_types,$sororder);
	  $Attribute_execute           =    $Core_Mysql->db_query($Attribute_select);
	  $Attribute_num_Records       =    $Core_Mysql->get_num_record($Attribute_execute);
	
////////////////////////////////////////=========END=============//////////////////

/*********************************************Delete******************************/

if(isset($_REQUEST['del_id']))
	{
		
		
		
	  $Attribute_tablename                  =     attribute_tbl;
	  $fieldname_one                        =    'attribute_id';
	  $fieldname_one_value                  =    $_REQUEST['del_id'];
	  $Attribute_delete                     =    $Core_Mysql->delete_common_query($Attribute_tablename,$fieldname_one,$fieldname_one_value);
	  $Attribute_execute                    =    $Core_Mysql->db_query($Attribute_delete);
	  
	  
	     $data = array('msg' =>'deleted');
			   $send_val		=	http_build_query($data);
               header("Location:catalog_product_attribute.php?".$send_val);
		
	}
///////////////////////////////////////========END========////////////////////////

?>

<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer" class="clearfix">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row">
        <div class="col-sm-12 col-md-12">
           <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(PROMO_ADD));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='updated')
		  print_r(error_notification_message(PROMO_UPDATE));			  
		  }
		  
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='deleted')
		  print_r(error_notification_message(PROMO_DEL));			  
		  }
		  
		  
		  ?>
           <?php
          /*********************GROUP SELECT**********************************************/

      $group_tablename_per                   =    GROUP;
	  $fieldname_one                         =    'admin_groupid';
	 $fieldname_one_value                    =    $user_results_head['groupid'];
	  $group_select_per                      =    $Core_Mysql->select_one_where($group_tablename_per,$fieldname_one,$fieldname_one_value);
	  $group_execute_per                     =    $Core_Mysql->db_query($group_select_per);
	  $Group_results_per                     =    $Core_Mysql->db_fetch_array($group_execute_per);
	  $groupnum_Records                      =    $Core_Mysql->get_num_record($group_execute_per);

/******************************============END==============************************/
if($Group_results_per['admin_add']=='1')
		 {
		 ?>
          <!-- <div style="text-align:right !important"><a href="add_product.php" ><i class="splashy-add"></i> Add Product</a></div>-->
          <h3 class="heading ">Attribites <a  href="add_catalog_product_attribute.php" style="float:right; margin-top:-8px;" class="btn btn-default button-next">Add Attributes<i class="glyphicon glyphicon-chevron-right"></i></a></h3>
          <?php } ?>
          <table id="dt_product" class="table table-striped table-bordered dTableR">
            <thead>
              <tr>
               <th >date </th>
                <th>S.No.</th>
                <th>Attribute Code</th>
                <th>Attribute Label</th>
                <th>Required</th>
                <th>System</th>
                <th>Scope</th>
                <th>Status</th>
                          <?php            
		 if($Group_results_per['admin_edit']=='1' || $Group_results_per['admin_delete']=='1')
		 {
		 ?>
                <th>Action</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="dataTables_empty" colspan="6">Loading data from server</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php // require 'common/admin-sidebar.php';?>
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
<!--<script src="js/gebo_datatables.js"></script>-->
<script src="lib/smoke/smoke.js"></script>
<script>
		
		$(document).ready(function() {
		//* basic
		gebo_datatbles.dt_a();
		// horizontal scroll
		gebo_datatbles.dt_b();
		//* large table
		gebo_datatbles.dt_c();
		//* hideable columns
		gebo_datatbles.dt_d();
		//* server side proccessing with hiden row
		gebo_datatbles.dt_product();
        //* Table tools
		gebo_datatbles.dt_tools();
	});
		gebo_datatbles = {
		dt_a: function() {
			$('#dt_a').dataTable({
                "sDom": "<'row'<'col-sm-6'<'dt_actions'>l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                }
            });
		},
        dt_b: function() {
			$('#dt_b').dataTable({
				"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "sScrollX": "100%",
                "sScrollXInner": '110%',
                "sPaginationType": "bootstrap",
                "bScrollCollapse": true 
            });
		},
		dt_c: function() {
                
            var aaData = [];
            for ( var i=1, len=1000 ; i<=len ; i++ ) {
                aaData.push( [ i, i, i, i, i ] );
            };
            
            $('#dt_c').dataTable({
				"sDom": "<'row'<'col-sm-6'><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'>S>",
                "sScrollY": "200px",
                "aaData": aaData,
                "bDeferRender": true
			});
            
            $('#fill_table').click(function(){
                var aaData = [];
                for ( var i=1, len=50000; i <= len; i++){
                    aaData.push( [ i, i, i, i, i ] );
                };
               
                $('#dt_c').dataTable({
                    "sDom": "<'row'<'col-sm-6'><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'>S>",
                    "sScrollY": "200px",
                    "aaData": aaData,
                    "bDestroy": true,
                    "bDeferRender": true
                });
                $(this).remove();
                $('#entries').html('50 000');
                $('.dataTables_scrollHeadInner').css({'height':'34px','top':'0'});
            });
            
		},
		dt_d: function() {
		
			function fnShowHide( iCol ) {
				/* Get the DataTables object again - this is not a recreation, just a get of the object */
				var oTable = $('#dt_d').dataTable();
				 
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			};
			
			var oTable = $('#dt_d').dataTable({
				"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
				"sPaginationType": "bootstrap"
			});
			
			$('#dt_d_nav').on('click','li input',function(){
				fnShowHide( $(this).val() );
			});
		},
		dt_product: function(){
			if($('#dt_product').length) {

				var oTable;
 
				/* Formating function for row details */
				function fnFormatDetails ( nTr )
				{
					var aData = oTable.fnGetData( nTr );
					var sOut = '<table cellpadding="5" cellspacing="0" border="0" class="table table-bordered" >';
					sOut += '<tr><td>Rendering engine:</td><td>'+aData[2]+' '+aData[5]+'</td></tr>';
					sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
					sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
					sOut += '</table>';
					 
					return sOut;
				}
				
				oTable = $('#dt_product').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
					"sAjaxSource": "attribute_ajax.php",
					"aoColumns": [
					{ "sClass": "center dispnon", "bSortable": [ "desc"] },
						{ "sClass": "center", "bSortable": false },
						null,
						null,
						null,
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" }
					],
					"aaSorting": [[1, 'asc']]
				} );
				
                 
				$('#dt_product').on('click','tbody td img', function () {
					var nTr = $(this).parents('tr')[0];
					if ( oTable.fnIsOpen(nTr) )
					{
						/* This row is already open - close it */
						this.src = "img/details_open.png";
						oTable.fnClose( nTr );
					} else {
						/* Open this row */
						this.src = "img/details_close.png";
						oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
					}
				} );

			}
		},
        dt_tools: function() {
			if($('#dt_tools').length) {
                $('#dt_tools').dataTable({
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'col-sm-4'l><'col-sm-4 text-right'T><'col-sm-4'f>r>t<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    "oTableTools": {
                        "aButtons": [
                            "copy",
                            "print",
                            {
                                "sExtends":    "collection",
                                "sButtonText": 'Save <span class="caret" />',
                                "aButtons":    [ "csv", "xls", "pdf" ]
                            }
                        ],
                        "sSwfPath": "lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
                    }
                });
            }
		}
	};
		</script>
<style>
.f-nav {background:#FFFF33; height:45px !important; }
.y-nav { margin:5px 0px 3px 0px !important;}
.dispnon { display:none;!important; } 
</style>
<script type="text/javascript">
      
        $("document").ready(function () {
	
		
		
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.heading').addClass("navbar navbar-default navbar-fixed-top f-nav");
					  $('.button-next').addClass("y-nav");
					
                } else {
                    $('.heading').removeClass("navbar navbar-default navbar-fixed-top f-nav");
					$('.button-next').removeClass("y-nav");
					
                }
            });
        });
		
    </script>
<script type="text/javascript">
 function del_confirm()
{

var conf = confirm("Are you sure you wish to delete?");
	if(!conf)
	{
		return false;
	}
 return true;  

} 


 </script>
</body></html>
