<?php require 'core/configuration.php';?>
<!DOCTYPE html>
<html lang="en">
<?php include 'common/admin-top-header.php';?>
<div id="maincontainer" class="clearfix">
<?php include 'common/admin-header.php';?>
  <div id="contentwrapper">
    <div class="main_content">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <form class="form_validation_blog" method="post" enctype="multipart/form-data">
            <div class="row" id="row_pageinfo">
              <div class="col-sm-12 col-md-12">
                <h3 class="heading">Page Information</h3>
                <div class="formSep">
                  <div class="form-group">
                    <label>Page Name:<span class="f_req">*</span></label>
                    <input name="page_name"  id="page_name" class="form-control" type="text" value="">
                  </div>
                  <label>URL Key: <span class="f_req">*</span></label>
                  <input name="url_key"  id="url_key" class="form-control" type="text" value="">
                </div>
                <div class="formSep">
                  <label >Status:</label>
                  <input name="status"  id="status" class="form-control" type="text" value="">
                </div>
              </div>
            </div>
            <div class="row" id="row_content" style="display:none">
              <div class="col-sm-12 col-md-12">
                <h3 class="heading">Content</h3>
                <div class="formSep">
                  <div class="form-group">
                    <label>Page Name:<span class="f_req">*</span></label>
                    <input name="page_name"  id="page_name" class="form-control" type="text" value="">
                  </div>
                  <label>URL Key: <span class="f_req">*</span></label>
                  <input name="url_key"  id="url_key" class="form-control" type="text" value="">
                </div>
                <div class="formSep">
                  <label >Status:</label>
                  <input name="status"  id="status" class="form-control" type="text" value="">
                </div>
              </div>
            </div>
            <div class="row" id="row_metainfo" style="display:none">
              <div class="col-sm-12 col-md-12">
                <h3 class="heading">Meta Data</h3>
                <div class="formSep">
                  <div class="form-group">
                    <label>Page Name:<span class="f_req">*</span></label>
                    <input name="page_name"  id="page_name" class="form-control" type="text" value="">
                  </div>
                  <label>URL Key: <span class="f_req">*</span></label>
                  <input name="url_key"  id="url_key" class="form-control" type="text" value="">
                </div>
                <div class="formSep">
                  <label >Status:</label>
                  <input name="status"  id="status" class="form-control" type="text" value="">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>-->
  <div class="sidebar">
    <div class="sidebar_inner_scroll">
      <div class="sidebar_inner">
        <div id="side_accordion" class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading"> <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle"> <i class="glyphicon glyphicon-cog"></i> Configuration </a> </div>
            <div class="accordion-body collapse in" id="collapseFour">
              <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                  <li class="nav-header">Page Information</li>
                  <li class="active"><a href="javascript:void(0)" onClick="cms_sidebar('page_information');">Page Information</a></li>
                  <li><a href="javascript:void(0)" onClick="cms_sidebar('content');">Content</a></li>
                  <li><a href="javascript:void(0)" onClick="cms_sidebar('metadata');">Meta Data</a></li>
                  <li class="divider"></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="push"></div>
      </div>
      <div class="sidebar_info">
        <ul class="list-unstyled">
          <li> <span class="act act-warning">65</span> <strong>New comments</strong> </li>
          <li> <span class="act act-success">10</span> <strong>New articles</strong> </li>
          <li> <span class="act act-danger">85</span> <strong>New registrations</strong> </li>
        </ul>
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
  <script type="application/javascript">
	function cms_sidebar(value_cms)
   {
     if(value_cms == 'page_information')
     {
      $("#row_pageinfo").css("display", "block");
      $("#row_content").css("display", "none");
      $("#row_metainfo").css("display", "none");
	 }
	 else if(value_cms == 'content')
	 {
	  $("#row_pageinfo").css("display", "none");
      $("#row_content").css("display", "block");
      $("#row_metainfo").css("display", "none");
	 }
	 else if(value_cms == 'metadata')
	 {
	  $("#row_pageinfo").css("display", "none");
      $("#row_content").css("display", "none");
      $("#row_metainfo").css("display", "block");
	 
	 } 
   }
	
	</script>
</div>
</body></html>
