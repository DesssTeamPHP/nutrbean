<?php  
                    $footer_links                 =          "";
                    $select_footer                =          "select * from footer_menu";
                    $footer_execute               =          mysql_query($select_footer);
                    $footerTitle                  =          1;
                    $footer_num_Records           =          mysql_num_rows($footer_execute);
                    while($footer_results         =          mysql_fetch_assoc($footer_execute))
	                {
                    if($footerTitle==1)
		            $footlinkcls                  =           "fleft;";
		            else
		            $footlinkcls                  =          "fleft;";
	            	$footer_links                .='         <div class="fleft"><h3>'.$footer_results['footer_name'].'</h3><ul>';
		            $select_navi                  =          "select * from navi_each_page_tbl where footer_id=".$footer_results['footer_id']." order by page_order asc";
		            $navi_execute                 =          mysql_query($select_navi);
	                $navi_num_Records             =          mysql_num_rows($navi_execute);
		            while($navi_results           =          mysql_fetch_assoc($navi_execute))
			        {
		            $select_menu                  =          "select * from menu_page_tbl where id=".$navi_results['link_id'];
	                $menu_execute                 =          mysql_query($select_menu);
	                $menu_num_Records             =          mysql_num_rows($menu_execute);
	                $menu_results                 =          mysql_fetch_assoc($menu_execute);
		            if($menu_results['title']!="")
                    $footer_links                .='         <li><a href="'.$menu_results['file_name'].'">'.$menu_results['title'].'</a></li>';
                    }
		            $footer_links                .='         </li></ul>
                    </div>';		
      	            $footerTitle++;	
		            }
?>

<div class="wrapper foot_bg "><div class="container "><div><footer class=" PB_20 fleft"><?=$footer_links;?><div class="fleft MT_20"><ul class="footer_icon" >
<?php   
                   $select_social               =      "SELECT * FROM social_media_tbl WHERE active = 1 ORDER BY image_order ASC";
                   $social_execute              =      mysql_query($select_social);
                   $social_count                =      1;
                   $social_num_Records          =      mysql_num_rows($social_execute);
                   if($social_num_Records>0)
	               {
	               while ($social_results       =      mysql_fetch_array($social_execute)) 
	               { 
	               if($social_count ==1)
		           {
		           $social_style                =      'style="margin-right:0px;"';
		           }
		           else
		           {
		           $social_style                =      'style="border-bottom:none;"';
		           }
                   echo ' <li><a href="'.$social_results['media_link'].'" target="_blank"><img src="admin/uplodeImage/soundMedia/'.$social_results['media_image'].'" width="32" height="32"  alt="'.$social_results['media_image'].'" title="'.$social_results['media_image'].'"  />
                   </a>
                   </li>';
	               $social_count++;
                   }} 
?>
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