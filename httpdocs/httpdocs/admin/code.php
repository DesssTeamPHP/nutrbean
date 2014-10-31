<?php

include('core/configuration.php');
//$fullPath = 'http://www.desss.com/';
//$fullPath = 'http://192.168.1.211/karunakaran/desss_new/';











/*search Gen*/

			
			if($_REQUEST['search'])
			{
			
			
			$search=$_REQUEST['search']; 
			//to calculate the elapsed time
	$_SESSION['start_time'] = microtime(true);
	
	 function execute_time() 
	{
        return (microtime(true) - $_SESSION['start_time']);
    }
         
          
  
	
	
	
	
	

	
	
	//pagination search page
	
	
	$select = 'SELECT *';
$from   = ' FROM menu_page_tbl';
$where  = " WHERE  real_description LIKE '%$search%' OR	title LIKE '%$search%' OR file_name LIKE '%$search%' OR meta_content LIKE '%$search%' OR h1_title LIKE '%$search%'";





	
$searchtext = $_REQUEST['search'];
$page=$_REQUEST['page'];
	
	$pagelimit = "10";
// run query
   $strSQL = mysql_query($select . $from . $where) or die(mysql_error()); 



// count number of matches
   $totalrows = mysql_num_rows($strSQL);
   
 $res.= "About&nbsp;".$totalrows."&nbsp;results in &nbsp".round(execute_time(),4)."&nbsp;seconds</br>";
unset($_SESSION['start_time']);  
if ($totalrows > 0) {



// determine how many pages there will be by using ceil() and dividing total rows by pagelimit
   $pagenums = ceil ($totalrows/$pagelimit);

// if no value for page, page = 1
    if ($page==''){
        $page='1';
    }
// create a start value
   $start = ($page-1) * $pagelimit;

// blank matches found
$res.= "<b>" . $totalrows . " matches found</b><br>\n";

// Showing Results 1 to 10 (or if you're page limit were 15) 1 to 15, etc.
$starting_no = $start + 1;

if ($totalrows - $start < $pagelimit) {
   $end_count = $totalrows;
} elseif ($totalrows - $start >= $pagelimit) {
   $end_count = $start + $pagelimit;
}

      
$disp.= "Results $starting_no to $end_count shown.<br>\n";

// create dynamic next, previous, and page links

/* lets say you're set to show 10 results per page and your script comes out with 12 results.
this will allow your script to say next 2 if you're on the first page and previous 10 if you're on the second page. */

if ($totalrows - $end_count > $pagelimit) {
   $var2 = $pagelimit;
} elseif ($totalrows - $end_count <= $pagelimit) {
   $var2 = $totalrows - $end_count;
}

$space = "&nbsp;";


 $strquery =" SELECT * FROM menu_page_tbl WHERE  real_description LIKE '%$search%' OR	title LIKE '%$search%' OR file_name LIKE '%$search%' OR meta_content LIKE '%$search%' OR h1_title LIKE '%$search%' LIMIT ".$start." ,".$pagelimit;

//echo $strquery; // check the correct query is being written

$strSQL = mysql_query("$strquery") or die('Database error: '.mysql_error());



$pubname = ereg_replace('\\[(B|EB|I|EI|L|L=|L=[-_./a-z0-9!&%#?+,\'=:;@~]+|EL|E)?(]|$)', '', $pubname);

while ($publication = mysql_fetch_array($strSQL)) {

   $fld1.= "<li><h4>".$publication['title']."</h4></br>";
        $fld1.= strip_tags(substr($publication['real_description'],0,300));    
     $fld1.='...
	 
	<a class="read_more_bt fright" style="margin:7px 15px 10px 10px"  href="'.$publication['file_name'].'"></a></li>';
    
     
$fld1.="";
  
    
    
    
    
}
     


// previous link (if you're on any page besides the first, create previous link)
if ($page>1) {
        $fpage.= " <a href='" . $PHP_SELF . "?page=".($page-1)."&search=$searchtext'>Previous" . $space . $pagelimit . "</a>" . $space . $space . "";
    }

// dynamic page number links

    for ($i=1; $i<=$pagenums; $i++) {
        if ($i!=$page) {
            $dpage.= " <a href='" . $PHP_SELF . "?page=$i&search=$searchtext' >$i</a>";
        }
        else {
            $dpage.= " <b>[".$i."]</b>";
        }
    }


// next link 0  (if the page you are on is less than the total amount of page numbers, there are more pages left)

    if ($page<$pagenums) {
       $pless.= "" . $space . $space . $space . $space . " <a href='" . $PHP_SELF . "?page=".($page+1)."&search=$searchtext' class=main>Next " . $var2 . "</a> ";
    }


// LIMIT 0,10 will start at 0 and display 10 results
// LIMIT 10,5 will start at 10 and display 5 results

/* now you can do whatever you'd like with this query. it will only output ten results per page.
change the $pagelimit variable to whatever to output more than 10 result per page. */

}


	
	}
	
	/*pagination ends*/




$flash_clients="";	
 $select_clients3_flash = "SELECT * FROM homeclients where testi_subscription='Yes' order by testimonial_sortorder ASC ";
$query_clients3_flash = mysql_query($select_clients3_flash);


if(mysql_num_rows($query_clients3_flash)>0)
	{
$flash_clients.= '<div class="spacer"></div><div id="testi_container" class="MT10">
  <h2>What Our Clients Say</h2>
        <div id="banner-fade" style="top:-20px;">
       <ul class="bjqs" style="width:216px !important;">';
	while ($item_flash = mysql_fetch_array($query_clients3_flash)) 
	{ 
   $flash_clients.= '<li><strong style="color: #CCC; font-family: times new roman; font-size: 80px; margin: 20px 0px 0px; display: block; position: relative; float: left; width: 50px;"> &ldquo;</strong> 
         '.trim($item_flash['testimonial_content']).'
          <strong style="color: #CCC; font-family: times new roman; font-size: 80px; margin: 20px 0px 0px; display: block; position: relative; float: right; width: 50px;">&rdquo;</strong><br class="spacer"><div style="float:right">
                <p class="tes-author">
                 '.$item_flash['imagename'].'
                </p>
                <p class="tes-name">
                  '.$item_flash['companydes'].'
                </p>
              </div><br class="spacer"></li>';

			
 }
 
 
  $flash_clients.="</ul></div></div><div class='spacer'></div> ";
 }
	
?>


