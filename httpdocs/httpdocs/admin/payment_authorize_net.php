<?php
/*******************************************************************************
  * Developed By Desss Inc
  * Developer: Jayaraj
  * Date     : 05/08/2014 
  * Last Date: 05/08/2014 
  * Copyright (c) 2014 Desss Inc. All rights reserved
  *
 ******************************************************************************/
include('core/configuration.php');
$meta_title  =  "Payment Gateway / Authorize.net / Administrator / Customization ";
$authorize_tablename             =    'authorize_net_status';//table_name


/*********************SELECT authorize_net_status**********************************************/


 
	$authorize_select				=	 $Core_Mysql->select_one_sort_desc($authorize_tablename,'id','DESC');
	$authorize_execute              =    $Core_Mysql->db_query($authorize_select);
	$authorize_num_Records          =    $Core_Mysql->get_num_record($authorize_execute);
	if($authorize_num_Records>0)
	{
	$authorize_results              =    $Core_Mysql->db_fetch_array($authorize_execute);
	$id 							= 	 $authorize_results['id'];
	$h1								=	 'Authorize.net';
	$enabled 						= 	 $authorize_results['enabled'];
	$title							= 	 $authorize_results['title'];
	$gateway_live					= 	 $authorize_results['gateway_live'];
	$apn_login_live					=    $authorize_results['apn_login_live'];
	$trans_key_live					= 	 $authorize_results['trans_key_live'];
	$mode_type						= 	 $authorize_results['mode_type'];
	$gateway_sandbox				= 	 $authorize_results['gateway_sandbox'];
	$apn_login_sandbox				= 	 $authorize_results['apn_login_sandbox'];
	$trans_key_sanbox				= 	 $authorize_results['trans_key_sanbox'];
	$debug_status					= 	 $authorize_results['debug_status'];	
	$cr_card_type					= 	 unserialize($authorize_results['cr_card_type']);
	$sort_order						= 	 $authorize_results['sort_order'];

}
else 
{ 
	
	$h1					= 'Authorize.net';
	$id								= "add";	
	$enabled 						= "";
	$title							= "";
	$gateway_live					= "";
	$apn_login_live					= "";
	$trans_key_live					= "";
	$mode_type						= "";
	$gateway_sandbox				= "";
	$apn_login_sandbox				= "";
	$trans_key_sanbox				= "";
	$cr_card_type					= array('no');
	$sort_order						= "";
	
}

	  
	  

/******************************============END==============************************/

 
if(isset($_REQUEST['Save']) !='' && $_REQUEST['Save']=='submit')
{ 
	$enabled 						= 	 $_REQUEST['enabled'];
	$title							= 	 $_REQUEST['title'];
	$gateway_live					= 	 $_REQUEST['gateway_live'];
	$apn_login_live					=    $_REQUEST['apn_login_live'];
	$trans_key_live					= 	 $_REQUEST['trans_key_live'];
	$mode_type						= 	 $_REQUEST['mode_type'];
	$gateway_sandbox				= 	 $_REQUEST['gateway_sandbox'];
	$apn_login_sandbox				= 	 $_REQUEST['apn_login_sandbox'];
	$trans_key_sanbox				= 	 $_REQUEST['trans_key_sanbox'];
	$cr_card_type					= 	 serialize($_REQUEST['cr_card_type']);	
	$sort_order						= 	 $_REQUEST['sort_order'];		
	$time_created			   		= 	 date("Y-m-d H:i:s");


$Field_types           = array('title'				 		 => $title ,
								'gateway_live'  	 		 => $gateway_live ,
								'apn_login_live'	 		 => $apn_login_live ,
								'trans_key_live'	 		 => $trans_key_live ,
								'mode_type'			 		 => $mode_type ,
								'gateway_sandbox'	 		 => $gateway_sandbox ,
								'apn_login_sandbox'	 		 => $apn_login_sandbox ,
								'trans_key_sanbox'	 		 => $trans_key_sanbox ,
								'cr_card_type' 		 		 => $cr_card_type ,
								'sort_order'				 => $sort_order ,
								'time_created' 				 => $time_created
                           );
						   
$Message_admin      =  $Core_Mysql->insert_common_query($authorize_tablename,$Field_types);

 if($Message_admin != 0)
{
$data = array('msg' =>'success');
			   $send_val		=	http_build_query($data);
               header("Location:payment_authorize_net.php?".$send_val);;
	
}
else 
{
echo $Message_admin;  exit;
}
		  
}
//******************************************Update Function*****************************************************/
if(isset($_REQUEST['Update'])!='' && $_REQUEST['Update']=='Update')
{ 
	$id                      	    =    $_REQUEST['id'];
	$enabled 						= 	 $_REQUEST['enabled'];
	$title							= 	 $_REQUEST['title'];
	$gateway_live					= 	 $_REQUEST['gateway_live'];
	$apn_login_live					=    $_REQUEST['apn_login_live'];
	$trans_key_live					= 	 $_REQUEST['trans_key_live'];
	$mode_type						= 	 $_REQUEST['mode_type'];
	$gateway_sandbox				= 	 $_REQUEST['gateway_sandbox'];
	$apn_login_sandbox				= 	 $_REQUEST['apn_login_sandbox'];
	$trans_key_sanbox				= 	 $_REQUEST['trans_key_sanbox'];
	$cr_card_type					= 	 serialize($_REQUEST['cr_card_type']);
	$sort_order						= 	 $_REQUEST['sort_order'];	
	$time_created			 	    =	 date("Y-m-d H:i:s");
	$FieldName						=   'id';

$Field_types           = array('title'				 		 => $title ,
								'gateway_live'  	 		 => $gateway_live ,
								'apn_login_live'	 		 => $apn_login_live ,
								'trans_key_live'	 		 => $trans_key_live ,
								'mode_type'			 		 => $mode_type ,
								'gateway_sandbox'	 		 => $gateway_sandbox ,
								'apn_login_sandbox'	 		 => $apn_login_sandbox ,
								'trans_key_sanbox'	 		 => $trans_key_sanbox ,
								'cr_card_type' 		 		 => $cr_card_type ,
								'sort_order'				 => $sort_order 
                           );
						   
 $Message_admin      =  $Core_Mysql->update_common_query($authorize_tablename,$FieldName,$Field_types,$id);
 


if($Message_admin != 0)
           {
			   
			   
			  $data = array('msg' =>'updated');
			   $send_val		=	http_build_query($data);
               header("Location:payment_authorize_net.php?".$send_val); exit;  
           }
        else 
          {
 	       $Message_admin; exit;
          }




}
if(isset($_REQUEST['Close']) && $_REQUEST['Close'] == 'Cancel')
	{
		header("location: payment_authorize_net.php");exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'common/admin-top-header.php';?>
<div  id="maincontainer" class="clearfix">
  <?php require 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <form class="frm_authorize_net" method="post" name="authorize_net" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <h3 class="heading"><?php echo $h1;?>
              <div class="move_upper" style="float:right; margin-top:-8px;">
                <?php if($id != "add")
			       {?>
                <button class="btn btn-primary"  name="Update" type="submit" value="Update">Update</button>
                <?php  }
			     else
			      {?>
                <button class="btn btn-primary"  name="Save" type="submit" value="submit">Save</button>
                <?php }
			   ?>
                <input type="button" class="btn btn-primary" name="Close" value="Cancel"  onClick="rewrite_goBack('product.php');">
              </div>
            </h3>
            <input name="id"  id="id" class="form-control " type="hidden" value="<?php echo $id;?>" tabindex="2">
            <div class="formSep">
              <div class="form-group">
                <label>Enabled:<span class="f_req">*</span></label>
                <select  name="enabled" id="enabled" tabindex="1">
                  <option <?php if($enabled=='Yes') echo 'selected';?>  value="Yes" >Yes</option>
                  <option <?php if($enabled=='No') echo 'selected';?> value="No" >No</option>
                </select>
              </div>
              <div class="form-group">
                <label>Title:<span class="f_req">*</span></label>
                <input name="title"  id="title" class="form-control " type="text" value="<?php echo $title;?>" tabindex="2">
              </div>
            </div>
            <div class="formSep">
              <label > Production / Test Mode :</label>
              <select  name="mode_type" id="mode_type" tabindex="3">
                <option value="0" >Select</option>
                <option <?php if($mode_type=='Production Mode') echo 'selected';?> value="Production Mode" >Production Mode</option>
                <option <?php if($mode_type=='Test Mode') echo 'selected';?>  value="Test Mode" >Test Mode</option>
              </select>
            </div>
            <div class="formSep production_mode">
              <label >Gateway URL ( Production ):</label>
              <textarea tabindex="4" class="form-control" rows="4" cols="1" id="auto_expand" name="gateway_live" style="overflow: hidden; word-wrap: break-word; max-height: 94px; min-height: 94px; height: 94px;"><?php echo $gateway_live;?></textarea>
            </div>
            <div class="formSep production_mode">
              <label >API Login ID ( Production ):</label>
              <textarea tabindex="5" class="form-control" rows="4" cols="1" id="auto_expand" name="apn_login_live" style="overflow: hidden; word-wrap: break-word; max-height: 94px; min-height: 94px; height: 94px;"><?php echo $apn_login_live;?></textarea>
            </div>
            <div class="formSep production_mode">
              <label >Transaction Key ( Production ):</label>
              <textarea tabindex="6" class="form-control" rows="4" cols="1" id="auto_expand" name="trans_key_live" style="overflow: hidden; word-wrap: break-word; max-height: 94px; min-height: 94px; height: 94px;"><?php echo $trans_key_live;?></textarea>
            </div>
            <div class="formSep test_mode">
              <label >Gateway URL ( Test Mode ):</label>
              <textarea tabindex="7" class="form-control" rows="4" cols="1" id="auto_expand" name="gateway_sandbox" style="overflow: hidden; word-wrap: break-word; max-height: 94px; min-height: 94px; height: 94px;"><?php echo $gateway_sandbox;?></textarea>
            </div>
            <div class="formSep test_mode">
              <label >API Login ID ( Test Mode ):</label>
              <textarea tabindex="8" class="form-control" rows="4" cols="1" id="auto_expand" name="apn_login_sandbox" style="overflow: hidden; word-wrap: break-word; max-height: 94px; min-height: 94px; height: 94px;"><?php echo $apn_login_sandbox;?></textarea>
            </div>
            <div class="formSep test_mode">
              <label >Transaction Key ( Test Mode ):</label>
              <textarea tabindex="9" class="form-control" rows="4" cols="1" id="auto_expand" name="trans_key_sanbox" style="overflow: hidden; word-wrap: break-word; max-height: 94px; min-height: 94px; height: 94px;"><?php echo $trans_key_sanbox;?></textarea>
            </div>
            <div class="formSep">
              <label >Credit Card Types:</label>
              <select id="cr_card_type" name="cr_card_type[]" multiple="" data-placeholder="Card Select..." class="chzn_b form-control" tabindex="16">
                <option <?php if (in_array("American Express", $cr_card_type)) echo "selected";	?>  value="American Express" >American Express</option>
                <option <?php if (in_array("Discover", $cr_card_type)) echo "selected";	?> value="Discover" >Discover</option>
                <option <?php if (in_array("MasterCard", $cr_card_type)) echo "selected";	?> value="MasterCard" >MasterCard</option>
                <option <?php if (in_array("Visa", $cr_card_type)) echo "selected";	?> value="Visa" >Visa</option>
              </select>
              <div style="clear:both;"></div>
            </div>
          </div>
        </div>
      </form>
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
<!-- multi-column layout -->
<script src="js/jquery.imagesloaded.min.js"></script>
<script src="js/jquery.wookmark.js"></script>
<!-- validation -->
<script src="lib/validation/jquery.validate.min.js"></script>
<!-- validation functions -->
<script src="js/custom_validation.js"></script>
<style>
.f-nav {background:#FFFF33; height:45px !important; }
.y-nav { margin:5px 0px 3px 0px !important;}


	
</style>
<script src="lib/multi-select/js/jquery.multi-select.js"></script>
<script>
$(function() {


		
            $(window).scroll(function () {
                if ($(this).scrollTop() > 60) {
                    $('.heading').addClass("navbar navbar-default navbar-fixed-top f-nav");
					  $('.move_upper').addClass("y-nav");
					
                } else {
                    $('.heading').removeClass("navbar navbar-default navbar-fixed-top f-nav");
					$('.move_upper').removeClass("y-nav");
					
                }
            });
     

$(window).load(function (){
   if($('#mode_type').val() == 'Production Mode') {
            $('.production_mode').show(); 
			 $('.test_mode').hide();
			  }
			else  if($('#mode_type').val() == 'Test Mode') {
			  $('.test_mode').show(); 
			   $('.production_mode').hide();
			   }
        else {
            $('.test_mode').hide(); 
			  $('.production_mode').hide();
        } 
});

   
	
    $('#mode_type').change(function(){
	
        if($('#mode_type').val() == 'Production Mode') {
            $('.production_mode').show(); 
			 $('.test_mode').hide();
			  }
			else  if($('#mode_type').val() == 'Test Mode') {
			  $('.test_mode').show(); 
			   $('.production_mode').hide();
			   }
        else {
            $('.test_mode').hide(); 
			  $('.production_mode').hide();
        } 
    });
});


</script>
</body>
</html>
