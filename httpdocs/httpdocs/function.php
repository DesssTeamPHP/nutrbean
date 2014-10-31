<?php

function pagination($query,$per_page,$page,$cid,$scid,$url = '?')
{
	$url.="cid=".$scid."&";
	$url.="scid=".$scid."&";        
	$query = "SELECT COUNT(*) as `num` FROM {$query}";
	$row = mysql_fetch_array(mysql_query($query));
	$total = $row['num'];
	$adjacents = "2"; 		
	$page = ($page == 0 ? 1 : $page);  
	$start = ($page - 1) * $per_page;								
	
	$prev = $page - 1;							
	$next = $page + 1;
	$lastpage = ceil($total/$per_page);
	$lpm1 = $lastpage - 1;
	
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<ul class='pagination'>";
				$pagination .= "<li class='details'>Page $page of $lastpage</li>";
		if ($lastpage < 7 + ($adjacents * 2))
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li><a class='current'>$counter</a></li>";
				else
					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))
		{
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='current'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
				$pagination.= "<li class='dot'>...</li>";
				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
			}
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
				$pagination.= "<li class='dot'>...</li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='current'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
				$pagination.= "<li class='dot'>..</li>";
				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
			}
			else
			{
				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
				$pagination.= "<li class='dot'>..</li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a class='current'>$counter</a></li>";
					else
						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
				}
			}
		}
		
		if ($page < $counter - 1){ 
			$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
			$pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
		}else{
			$pagination.= "<li><a class='current'>Next</a></li>";
			$pagination.= "<li><a class='current'>Last</a></li>";
		}
		$pagination.= "</ul>\n";		
	}
	return $pagination;
} 








if (!function_exists('format_phone_us')) {
	function format_phone_us($phone = '', $convert = true, $trim = true)
	{
		// If we have not entered a phone number just return empty
		if (empty($phone)) {
			return false;
		}

		// Strip out any extra characters that we do not need only keep letters and numbers
		$phone = preg_replace("/[^0-9A-Za-z]/", "", $phone);
		// Keep original phone in case of problems later on but without special characters
		$OriginalPhone = $phone;

		// If we have a number longer than 11 digits cut the string down to only 11
		// This is also only ran if we want to limit only to 11 characters
		if ($trim == true && strlen($phone)>11) {
			$phone = substr($phone, 0, 11);
		}

		// Do we want to convert phone numbers with letters to their number equivalent?
		// Samples are: 1-800-TERMINIX, 1-800-FLOWERS, 1-800-Petmeds
		if ($convert == true && !is_numeric($phone)) {
			$replace = array('2'=>array('a','b','c'),
							 '3'=>array('d','e','f'),
							 '4'=>array('g','h','i'),
							 '5'=>array('j','k','l'),
							 '6'=>array('m','n','o'),
							 '7'=>array('p','q','r','s'),
							 '8'=>array('t','u','v'),
							 '9'=>array('w','x','y','z'));

			// Replace each letter with a number
			// Notice this is case insensitive with the str_ireplace instead of str_replace 
			foreach($replace as $digit=>$letters) {
				$phone = str_ireplace($letters, $digit, $phone);
			}
		}

		$length = strlen($phone);
		// Perform phone number formatting here
		switch ($length) {
			case 7:
				// Format: xxx-xxxx
				return preg_replace("/([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "$1-$2", $phone);
			case 10:
				// Format: (xxx) xxx-xxxx
				return preg_replace("/([0-9a-zA-Z]{3})([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "($1) $2-$3", $phone);
			case 11:
				// Format: x(xxx) xxx-xxxx
				return preg_replace("/([0-9a-zA-Z]{1})([0-9a-zA-Z]{3})([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "$1($2) $3-$4", $phone);
			default:
				// Return original phone if not 7, 10 or 11 digits long
				return $OriginalPhone;
		}
	}
}


?>