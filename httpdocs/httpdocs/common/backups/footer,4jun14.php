<?php  
$footer_links1="";
$query = "select * from footer_menu";
$query_result = mysql_query($query);
$footerTitle=1;
$countRow= mysql_num_rows($query_result);
while($val = mysql_fetch_assoc($query_result))
	 {
		if($footerTitle==1)
		$footlinkcls="fleft;";
		else
		$footlinkcls="fleft;";
		$footer_links1.=' <div class="fleft"><h3>'.$val['footer_name'].'</h3><ul>';
		$query1= "select * from navi_each_page_tbl where footer_id=".$val['footer_id']." order by page_order asc";
		$query_result1 = mysql_query($query1);
	    $countRow1= mysql_num_rows($query_result1);
		while($val1 = mysql_fetch_assoc($query_result1))
			{
		    $query2= "select * from menu_page_tbl where id=".$val1['link_id'];
			$query_result2 = mysql_query($query2);
	        $countRow2= mysql_num_rows($query_result2);
	     	$val2 = mysql_fetch_assoc($query_result2);
			if($val2['title']!="")
            $footer_links1.='<li><a href="'.$val2['file_name'].'">'.$val2['title'].'</a></li>';
        }
		$footer_links1.='</li></ul>
        </div>';		
      	$footerTitle++;	
		}?>

<div class="wrapper foot_bg "><div class="container "><div><footer class=" PB_20 fleft"><?=$footer_links1;?><div class="fleft MT_20"><ul class="footer_icon" >
<?php    $select_clients3 = "SELECT * FROM social_media_tbl WHERE active = 1 ORDER BY image_order ASC";
$query_clients3 = mysql_query($select_clients3);
$page_count=1;
$page_countr=mysql_num_rows($query_clients3);
if($page_countr>0)
	{
	while ($item = mysql_fetch_array($query_clients3)) 
	{ 
	if($page_count ==1)
		 {
		$pagstyl='style="margin-right:0px;"';
		}
		else
		{
		$pagstyl='style="border-bottom:none;"';
		}
            echo ' <li><a href="'.$item['media_link'].'"><img src="admin/uplodeImage/soundMedia/'.$item['media_image'].'" width="32" height="32"  alt="'.$item['media_image'].'" title="'.$item['media_image'].'" />
             </a>
                
            </li>';
	 $page_count++;
 }} ?>
<div class="spacer"></div></ul><br /><p style="text-align:justify; padding:9px 0px 0px 0px;">&copy; Nutrabean-<?php echo auto_copyright();?>, All Rights Reserved.</p>
</div><div class="spacer"></div><div class="spacer"></div></footer></div></div><div class="spacer"></div></div>
</body><script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/validation.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/functions_ship.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.number_only_valiq').bind('keyup blur', function() {
    $(this).val($(this).val().replace(/[^0-9]/g, ''))
});

$(".tab_content01").hide();
	$(".tab_content01:first").show(); 
	$("ul.tabs1 li").click(function() {
		$("ul.tabs1 li").removeClass("active1");
		$(this).addClass("active1");
		$(".tab_content01").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
});

 function rewrite_goBack(get_val)
{

 window.location.assign(get_val);

}
</script></html>