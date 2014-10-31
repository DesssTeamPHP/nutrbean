<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 03/4/2014 
  * Last Date: 03/4/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Attribites Customization";

	/*********************Product SELECT**********************************************/
if(isset($_REQUEST['id']))
{
      $Attribute_tablename                   =    attribute_tbl;
	  $fieldname_one                         =    'attribute_id';
	  $fieldname_one_value                   =    $_REQUEST['id'];
	  $Attribute_select                      =    $Core_Mysql->select_one_where($Attribute_tablename,$fieldname_one,$fieldname_one_value);
	  $Attribute_execute                     =    $Core_Mysql->db_query($Attribute_select);
	  $Attribute_results                     =    $Core_Mysql->db_fetch_array($Attribute_execute);
	  $Attribute_num_Records                 =    $Core_Mysql->get_num_record($Attribute_execute);
	  $id=$_REQUEST['id'];
	  //$master_categories_id = $Promo_results['master_categories_id'];
}
else
{
$Attribute_results['attribute_code']             =     "";
$Attribute_results['attribute_id']               =     "";
$Attribute_results['attribute_scope']            =     "";
$Attribute_results['attribute_default_value']    =     "";
$Attribute_results['attribute_unique_value']     =     "";
$Attribute_results['attribute_values_required']  =     "";
$Attribute_results['attribute_apply_to']         =     "";
$Attribute_results['attribute_admin']            =     "";
$Attribute_results['attribute_default_store']    =     "";
$Attribute_results['create_date']                =     "";






//$master_categories_id ="";

$id="0";

}

/******************************============END==============************************/

if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 


$attribute_code                          = $_REQUEST['attribute_code'];
$attribute_scope 			             = $_REQUEST['attribute_scope'];
$attribute_default_value                 = $_REQUEST['attribute_default_value'];
$attribute_unique_value	                 = $_REQUEST['attribute_unique_value'];
$attribute_values_required	             = $_REQUEST['attribute_values_required'];
$attribute_apply_to					     = $_REQUEST['attribute_apply_to'];
$attribute_admin				         = $_REQUEST['attribute_admin'];
$attribute_default_store			 	 = $_REQUEST['attribute_default_store'];
$create_date                             = $_REQUEST['create_date'];



$Field_types           = array('attribute_code'                    => $attribute_code,
                               'attribute_scope'                   => $attribute_scope,
							   'attribute_default_value'           => $attribute_default_value,
							   'attribute_unique_value'            => $attribute_unique_value,
							   'attribute_values_required'         => $attribute_values_required,
                               'attribute_apply_to'                => $attribute_apply_to,
                               'attribute_admin'                   => $attribute_admin,
							   'attribute_default_store'           => $attribute_default_store,
							   'create_date'		               => date("Y-m-d H:i:s") 
                              );
						   
					//print_r($Field_types); die;	   
 $Message_admin      =  $Core_Mysql->insert_common_query($Attribute_tablename,$Field_types);

        if($Message_admin != 0)
           {
			    
				
			$data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:catalog_product_attribute.php?".$send_val);	
				
				
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 




$id                                      = $_REQUEST['id'];
$attribute_code                          = $_REQUEST['attribute_code'];
$attribute_scope 			             = $_REQUEST['attribute_scope'];
$attribute_default_value                 = $_REQUEST['attribute_default_value'];
$attribute_unique_value	                 = $_REQUEST['attribute_unique_value'];
$attribute_values_required	             = $_REQUEST['attribute_values_required'];
$attribute_apply_to					     = $_REQUEST['attribute_apply_to'];
$attribute_admin				         = $_REQUEST['attribute_admin'];
$attribute_default_store			 	 = $_REQUEST['attribute_default_store'];
$create_date                             = $_REQUEST['create_date'];


/***************************************//////*******************************************************/
$Attribute_tablename             =    attribute_tbl;//table_name
$FieldName                       =  'attribute_id';
/*****************************************///////**************************************************//


$Field_types           = array('attribute_code'                    => $attribute_code,
                               'attribute_scope'                   => $attribute_scope,
							   'attribute_default_value'           => $attribute_default_value,
							   'attribute_unique_value'            => $attribute_unique_value,
							   'attribute_values_required'         => $attribute_values_required,
                               'attribute_apply_to'                => $attribute_apply_to,
                               'attribute_admin'                   => $attribute_admin,
							   'attribute_default_store'           => $attribute_default_store,
							   'create_date'		               => date("Y-m-d H:i:s") 
                              );
						
					//print_r($Field_types);	die;
						
						
						
 $Message_admin      =  $Core_Mysql->update_common_query($Attribute_tablename,$FieldName,$Field_types,$id);
 if(!$Message_admin)
 {
	echo mysql_error(); exit;
 }
        if($Message_admin != 0)
           {
			   
			  $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:catalog_product_attribute.php?".$send_val);  
           }
        else 
          {
 	       $Message_admin; 
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: catalog_product_attribute.php");
	}

	
?>
 <link rel="stylesheet" type="text/css" href="css/default.css"/>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>

<div  id="maincontainer" class="clearfixs">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row" >
        <form  class="frm_product_add_valid"  method="post" enctype="multipart/form-data" />
        <input type="hidden" name="id" value="<?php echo $id;?>" >
        <h3 class="heading">New Product Attribute
          <div class="move_upper" style="float:right; margin-top:-8px;">
            <?php if(isset($_REQUEST['id']) != '')
			       {?>
            <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button>
            <?php  }
			     else
			      {?>
            <button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>
            <?php }
			   ?>
            <input type="button" class="btn btn-primary" name="Close" value="Cancel"  onClick="rewrite_goBack('catalog_product_attribute.php');">
          </div>
        </h3>
        <div class="col-sm-12 col-md-12">
          <div class="tab-content">
            <div class="tab-pane active" id="tab_br1">
              <div>
                <div  class="form-group">
                  <label>Attribute Code:<span class="f_req">*</span></label>
                  <input name="attribute_code"  id="attribute_code"class="form-control" type="text" value="<?php echo $Attribute_results['attribute_code'];?>" maxlength="100" tabindex="1">
                </div>
            
                
                <div  class="form-group">
                  <label>Scope:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="attribute_scope" id="attribute_scope" tabindex="2"  class="form-control">
                    <option value="Store View" <?php if($Attribute_results["attribute_scope"]=="Store View")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Store View</option>
                    <option value="Website" <?php if($Attribute_results["attribute_scope"]=="Website")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Website</option>
           <option value="Global" <?php if($Attribute_results["attribute_scope"]=="Global")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Global</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Default Value:<span class="f_req">*</span></label>
                  <input name="attribute_default_value"  id="attribute_default_value" class="form-control" tabindex="4" type="text" maxlength="50" value="<?php echo $Attribute_results['attribute_default_value'];?>">
                  <br />
                  <div id="disp"></div>
                </div>
                <div  class="form-group">
                  <label>Unique Value:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="attribute_unique_value" id="attribute_unique_value" onchange="return sub_type(this.value);" class="form-control" tabindex="6" >
                    <option value="">----Select---</option>
                    <option value="Yes" <?php if($Attribute_results["attribute_unique_value"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                    <option value="No" <?php if($Attribute_results["attribute_unique_value"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                    
                  </select>
                </div>
                
               <div  class="form-group">
                  <label>Values Required:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="attribute_values_required" id="attribute_values_required" tabindex="2"  class="form-control">
                    <option value="Yes" <?php if($Attribute_results["attribute_values_required"]=="Yes")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Yes</option>
                    <option value="No" <?php if($Attribute_results["attribute_values_required"]=="No")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >No</option>
                  </select>
                </div> 
                
                <div  class="form-group">
                  <label>Apply To:</label>
                  <p><span class="label label-default"></span></p>
                  <select name="attribute_apply_to" id="attribute_apply_to" tabindex="2"  class="form-control">
                    <option value="Simple Product" <?php if($Attribute_results["attribute_apply_to"]=="Simple Product")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Simple Product</option>
                    <option value="Grouped Product" <?php if($Attribute_results["attribute_apply_to"]=="Grouped Product")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Grouped Product</option>
           <option value="Configurable Product" <?php if($Attribute_results["attribute_apply_to"]=="Configurable Product")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Configurable Product</option>
           <option value="Virtual Product" <?php if($Attribute_results["attribute_apply_to"]=="Virtual Product")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Virtual Product</option>
            <option value="Bundle Product" <?php if($Attribute_results["attribute_apply_to"]=="Bundle Product")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Bundle Product</option>
            <option value="Downloadable Product" <?php if($Attribute_results["attribute_apply_to"]=="Downloadable Product")
		   {
		   echo 'selected="selected"';
		   }
		   ?> >Downloadable Product</option>
                  </select>
                </div> 
              </div>
            </div>
            
            <div class="tab-pane" id="tab_br3">
              <h4 >Manage Titles</h4>
              <div  class="form-group">
                <label>Admin:<span class="f_req">*</span></label>
                <input name="attribute_admin"  id="attribute_admin" class="form-control " type="text" value="<?php echo $Attribute_results['attribute_admin'];?>" tabindex="14" maxlength="50">
              </div>
              <div  class="form-group">
                <label>Default Store View:</label>
                <input name="attribute_default_store"  id="attribute_default_store" class="form-control " type="text" value="<?php echo $Attribute_results['attribute_default_store'];?>" tabindex="15" maxlength="50">
              </div>
             
            </div>
          
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
  <div class="sidebar" >
    <div class="sidebar_inner_scroll">
      <div class="sidebar_inner">
        <div id="side_accordion" class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading" id="toggle_tabs"> <a href="javascript:void(0)"  class="accordion-toggle "> &nbsp;Attribute Information</a> </div>
            <div class="accordion-body " id="collapseOne">
              <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#tab_br1" data-toggle="tab">Properties</a></li>
                 <!-- <li><a href="#tab_br2" data-toggle="tab">Attributes</a></li>-->
                  <li><a href="#tab_br3" data-toggle="tab">Manage Label / Options</a></li>
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="push"></div>
      </div>
    </div>
  </div>
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
  <!-- validation -->
  <script src="lib/validation/jquery.validate.min.js"></script>
  <!-- validation functions -->
  <!--<script src="js/validation_editcontent.js"></script>-->
  <!-- editor -->
  <script src="lib/tiny_mce/jquery.tinymce.js"></script>
  <!-- file explorer functions -->
  <script src="js/gebo_explorer.js"></script>
  <script src="js/attribute_validation.js"></script>
 
 
 
 <!-- globalize for jQuery UI-->
    <script src="lib/jquery-ui/external/globalize.js"></script>
    <!-- masked inputs -->
	<script src="js/forms/jquery.inputmask.min.js"></script>
	<!-- autosize textareas -->
	<script src="js/forms/jquery.autosize.min.js"></script>
	<!-- textarea limiter/counter -->
	<script src="js/forms/jquery.counter.min.js"></script>
	<!-- datepicker -->
	<script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
	<!-- timepicker -->
	<script src="lib/timepicker/js/bootstrap-timepicker.min.js"></script>
	<!-- tag handler -->
	<script src="lib/tag_handler/jquery.taghandler.min.js"></script>
	<!-- styled form elements -->
	<script src="lib/uniform/jquery.uniform.min.js"></script>
	<!-- animated progressbars -->
	<script src="js/forms/jquery.progressbar.anim.js"></script>
	<!-- multiselect -->
	<script src="lib/multi-select/js/jquery.multi-select.js"></script>
	<script src="lib/multi-select/js/jquery.quicksearch.js"></script>
	<!-- enhanced select (chosen) -->
	<script src="lib/chosen/chosen.jquery.min.js"></script>
	<!-- TinyMce WYSIWG editor -->
	
    <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
    <script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
    <script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
	<!-- colorpicker -->
	<script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
	<!-- password strength checker -->
	<script src="lib/complexify/jquery.complexify.min.js"></script>
	<!-- switch buttons -->
    <script src="lib/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
    <!-- form functions -->
	<!--<script src="js/gebo_forms.js"></script>-->
 
 
 
 
 
  <script type="text/javascript" src="js/script.js"></script> 
  <script language="javascript" type="application/javascript">
   $(document).ready(function() {
	 $('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});
	 });	
   </script>
  <script src="lib/dynatree/dist/jquery.dynatree.min.js"></script>
  <script>
		
		$(document).ready(function() {
		//* basic
	
		//* server side proccessing with hiden row
	//	gebo_datatbles.dt_product();
        //* Table tools
		gebo_datatbles.dt_tools();	gebo_datatbles.tree_c();
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
					"sAjaxSource": "attribute_relate_ajax.php?id=<?php echo $id;?>",
					"aoColumns": [
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
		}, tree_c: function() {
            $("#tree_c").dynatree({
                checkbox: true,
				
                selectMode: 1,
				
			<?php if($master_categories_id!="") { ?>	
				
			onPostInit: function(isReloading, isError) {
            var key = $("#master_categories_id").val();
            if( key ) {
                this.activateKey(key);
            }
        }, <?php } ?>
                onSelect: function(select, node) {
				//$(input[name="searchBar"]).val('hi');
				$("#master_categories_id").val(node.data.key);
                   // var s = node.tree.getSelectedNodes().join(" | ");
                   // $("#tree_c_echoSelection").children('pre').text(s);
                } 
            });

		}
	};
		</script>
  <style>
.f-nav {background:#FFFF33; height:45px !important; }
.y-nav { margin:5px 0px 3px 0px !important;}
</style>
  <script type="text/javascript" src="js/jquery.number.js"></script>
  <script type="text/javascript">
			
			$(function(){
				// Set up the number formatting.
				
			//	$('#number_container').slideDown('fast');
				
				/*$('#price').on('change',function(){
					console.log('Change event.');
					var val = $('#price').val();
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});*/
				
				//$('#price').change(function(){
				//	console.log('Second change event...');
				//});
				
				//$('#products_price').number( true, 2 );
				//$('#actual_price').number( true, 2 );
				//$('#oem_price').number( true, 2 );
				//$('#level3_price').number( true, 2 );
			
				
				
				// Get the value of the number for the demo.
				//$('#get_number').on('click',function(){
					
				//	var val = $('#price').val();
					
					//('#the_number').text( val !== '' ? val : '(empty)' );
				//});
			});
		</script>
  <script type="text/javascript">
  
  
  
  
  
      
        $("document").ready(function () {
		$('body').removeClass("sidebar_hidden");
            $(window).scroll(function () {
                if ($(this).scrollTop() > 60) {
                    $('.heading').addClass("navbar navbar-default navbar-fixed-top f-nav");
					  $('.move_upper').addClass("y-nav");
					
                } else {
                    $('.heading').removeClass("navbar navbar-default navbar-fixed-top f-nav");
					$('.move_upper').removeClass("y-nav");
					
                }
            });
        });
		
			$("#btnDeselectAll").click(function(){
			
			$("#tree_c").dynatree("getRoot").visit(function(node){
			  $('#master_categories_id').val("");
				node.select(false);
			});
			return false;
			
		});

		
    </script>
  <!--checksku  -->
  <script type="text/javascript">
$(document).ready(function(){
$("#promo_coupon_code").keyup(function() {
var promo_coupon_code = $('#promo_coupon_code').val();
if(promo_coupon_code=="")
{
$("#disp").html("");
}
else
{
$.ajax({
type: "POST",
url: "coupon_check.php",
data: "promo_coupon_code="+ promo_coupon_code ,
success: function(html){
$("#disp").html(html);
}
});
return false;
}
});
});
</script>
  <!--checkurl  -->
  <script type="text/javascript">
$(document).ready(function(){
$("#products_url").keyup(function() {
var products_url = $('#products_url').val();
if(products_url=="")
{
$("#disp_url").html("");
}
else
{
$.ajax({
type: "POST",
url: "check_url.php",
data: "cat_url="+ products_url ,
success: function(html){
$("#disp_url").html(html);
}
});
return false;
}
});
});
</script>
<script src="js/gebo_forms.js"></script>
</div>
</body></html>
