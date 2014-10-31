<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Bakkiyaraj
  * Date     : 03/5/2014 
  * Last Date: 03/5/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
error_reporting(0);
$meta_title  =  "Analitic -Page";
/*********************ANALITIC **********************************************/
	//For Selecting Query
	  $analitics_tablename       =  ANALITIC;
	  $fieldname                 =       'id';
	  $sororder                  =       'desc';
	  $Field_types               = array('meta_misc',   
	                                     'g_analitic',
									     );
	  $analitics_select          =    $Core_Mysql->select_common_query($analitics_tablename,$fieldname,$Field_types,$sororder);
	  $analitics_execute          =    $Core_Mysql->db_query($analitics_select);
	  $analitics_results         =    $Core_Mysql->db_fetch_array($analitics_execute);
	  $analitics_num_Records     =    $Core_Mysql->get_num_record($analitics_execute);
	
////////////////////////////////////////=========END=============//////////////////
$analitics_tablename         =  ANALITIC;//table_name
if(isset($_REQUEST['Save'])!='' && $_REQUEST['Save']=='submit')
{ 
$meta                   = addslashes($_REQUEST['meta']);
$analytics              = addslashes($_REQUEST['analytics']);


  $Field_types                 = array('meta_misc'          => addslashes($meta),
                                       'g_analitic'         => addslashes($analytics)
                                       );
	//print_r($Field_types); die;					   
 $Message_admin      =  $Core_Mysql->Insert_Common_query($analitics_tablename,$Field_types);

        if($Message_admin != 0)
           {
			   
			 $data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:analitic_code.php?".$send_val);	  
			   
           }
        else 
          {
 	       echo $Message_admin; 
          }
		  
}

//******************************************END Function*****************************************************/
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location:dashboard.php");
	}
?>
<script>
function goBack()
  {
  window.history.back()
  }
</script>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>

<div  id="maincontainer" class="clearfix">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <h3 class="heading">Request Quote</h3>
          <?php 
		  if(isset($_REQUEST['msg']))
		  {
		  if($_REQUEST['msg']=='success')
		  print_r(error_notification_message(ANALITIC_ADD));			  
		  }
		  ?>          
		<form class="form_validation_ttip" name="" method="post">
			
						<div class="formSep">
				<label>Meta-Misc: <span class="f_req">*</span></label>
				<textarea name="meta" id="meta" value="" cols="30" rows="10" class="form-control"><?php echo $analitics_results['meta_misc'];?></textarea>
                
			</div>
            <div class="formSep">
				<label>Google Analytics:<span class="f_req">*</span></label>
				<textarea name="analytics" id="analytics" value="" cols="30" rows="10" class="form-control"><?php echo $analitics_results['g_analitic'];?></textarea>
                <input name="id"  id="id" class="form-control" type="hidden" value="<?php echo $_REQUEST['id'];?>">
			</div>
            
            <div class="form-actions">
           <?php if($_REQUEST['id'] != '')
			       {?>
					  <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button> 
			<?php  }
			     else
			      {?>
					<button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>  
			<?php }
				  
			   ?>
				<input type="submit" class="btn btn-primary" name="Close" value="Cancel"  onClick="goBack();">
			</div>
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
   
		
	
    
</div>
					</body>
				</html>