<link rel="stylesheet" href="../css/jquery.treeview.css" />
<div class="sidebar">
  <div> <a href="manage_category.php">
    <button type="button"  class="btn btn-default">Add Category</button>
    </a><br />
    <?php  if(isset($_REQUEST['cat_id']))
 {?>
    <button name="subcategory" id="subcategory" class="btn btn-default">Add Subcategory</button>
    <?php } ?>
  </div>
              
  <ul id="browser" class="filetree">
    <?php
	  $category_tablenameval                =    CATEGORIES;
	  $Field_types           = array(
							   'categories_name',
							   'parent_id',
						       'categories_id'     
							    );

	   $fieldname_one                       =    'parent_id';
	  $fieldname_one_value                  =    0;
	  $category_select                      =    $Core_Mysql->select_one_where($category_tablenameval,$fieldname_one,$fieldname_one_value);
	  $category_execute                     =    $Core_Mysql->db_query($category_select);  
	  $category_num_Records                 =    $Core_Mysql->get_num_record($category_execute); 
	  
	  while($category_results     =    $Core_Mysql->db_fetch_array($category_execute))
	  {
		  
	  ?>
    <li><a href="manage_category.php?cat_id=<?php echo $category_results['categories_id'];?>"> <span class="folder"><?php echo $category_results['categories_name'];?></span></a>
      <ul>
        <?php              
	  $category_tablenameval                =    CATEGORIES;
	  $Field_types           = array(
							   'categories_name',
							   'parent_id',
						       'categories_id'     
							    );

	   $fieldname_one                           =    'parent_id';
	  $fieldname_one_value                      =   $category_results['categories_id'];
	  $category_select_one                      =    $Core_Mysql->select_one_where($category_tablenameval,$fieldname_one,$fieldname_one_value);
	  $category_execute_one                     =    $Core_Mysql->db_query($category_select_one);  
	  $category_num_Records_one                 =    $Core_Mysql->get_num_record($category_execute_one); 
	  
	  while($category_results_one               =    $Core_Mysql->db_fetch_array($category_execute_one))
	  {
	  ?>
        <li id="showvalsub<?php echo $category_results_one['categories_id'];?>" value="<?php echo $category_results_one['categories_id'];?>" onclick="return val<?php echo $category_results_one['categories_id'];?>();" class="showvalsub"> <span class="folder"><?php echo $category_results_one['categories_name'];?></span>
          <script>
 function val<?php echo $category_results_one['categories_id'];?>()
 {
	 var showvalsub 					    = document.getElementById('showvalsub<?php echo $category_results_one['categories_id'];?>').value;
	validate_val(showvalsub)
	return false;
 }
 function validate_val(showvalsub)
     {
$.ajax({
type: "POST",
url: "manage_subcategory.php",
data: "&Sub_id="+showvalsub,

success: function(html){
//Calling the ajax process php url
$("#hidevalone").html(html);
//Calling the responce IDs
// window.location.href='http://192.168.1.233:230/balu/getcomputerjobs.com/jobseeker_myaccount_edit.php'; 
}
}); }



</script>
          <ul id="folder21">
            <?php              
	  $category_tablenameval_two                =    CATEGORIES;
	  $Field_types           = array(
							   'categories_name',
							   'parent_id',
						       'categories_id'     
							    );

	  $fieldname_two                           =    'parent_id';
	  $fieldname_one_value                      =    $category_results_one['categories_id'];
	  $category_select_two                      =    $Core_Mysql->select_one_where($category_tablenameval_two,$fieldname_one,$fieldname_one_value);
	  $category_execute_two                     =    $Core_Mysql->db_query($category_select_two);  
	  $category_num_Records_two                 =    $Core_Mysql->get_num_record($category_execute_two); 
	  
	  while($category_results_two               =    $Core_Mysql->db_fetch_array($category_execute_two))
	  {?>
            <li  id="showvalsub" ><span class="file"><?php echo $category_results_two['categories_name'];?></span></li>
            <?php }?>
          </ul>
        </li>
        <?php }?>
      </ul>
    </li>
    <?php } ?>
  </ul>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script src="../js/jquery.treeview.js"></script>
<script>
 $(document).ready(function(){
	// second example
	$("#browser").treeview({collapsed: true});
	
});


$(document).ready(function(){
  $("#subcategory").click(function(){
 $( "#hideval" ).removeAttr("style");
    $("#showval").hide();
	 $("#hidevalone").hide();
  });
});

$(document).ready(function(){
  $(".showvalsub").click(function(){
    $("#showval").hide();
   $( "#hideval" ).hide();
	 $("#hidevalone").show();
  });
});

</script>
