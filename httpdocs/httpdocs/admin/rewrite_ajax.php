<?php
include('core/configuration.php');

/*********************SELECT**********************************************/

      $user_tablename                   =    ADMIN;
	  $fieldname_one                    =    'id';
	  $fieldname_one_value              =    $_SESSION['userid'];
	  $user_select                      =    $Core_Mysql->select_one_where($user_tablename,$fieldname_one,$fieldname_one_value);
	  $user_execute                     =    $Core_Mysql->db_query($user_select);
	  $user_results_head                =    $Core_Mysql->db_fetch_array($user_execute);
	  $user_num_Records                 =    $Core_Mysql->get_num_record($user_execute);
	  if(!$_SESSION['userid'])
	  {
	header('location:index.php')	;  
	  }

/******************************============END==============************************/	 



	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array( 'id','request_path', 'target_path' );
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "id";
	
	/* DB table to use */
	$sTable = "urlrewrite_tbl";
	
	
	

	
	/* Database connection information */
	$gaSql['user']       = DB_USER;
	$gaSql['password']   = DB_PASS;
	$gaSql['db']         = DB_NAME;
	$gaSql['server']     = DB_HOST;
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */
	 
	 /*********************GROUP SELECT**********************************************/

      $group_tablename_per                   =    GROUP;
	  $fieldname_one                         =    'admin_groupid';
	 $fieldname_one_value                    =    $user_results_head['groupid'];
	  $group_select_per                      =    $Core_Mysql->select_one_where($group_tablename_per,$fieldname_one,$fieldname_one_value);
	  $group_execute_per                     =    $Core_Mysql->db_query($group_select_per);
	  $Group_results_per                     =    $Core_Mysql->db_fetch_array($group_execute_per);
	  $groupnum_Records                      =    $Core_Mysql->get_num_record($group_execute_per);

/******************************============END==============************************/ 
	 
	 
	 
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	$sOrder = "";
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] )-1 ]."
				 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/*
	* Filtering
	* NOTE this does not match the built-in DataTables filtering which does it
	* word by word on any field. It's possible to do here, but concerned about efficiency
	* on very large tables, and MySQL's regex functionality is very limited
	*/
   $sWhere = "";
   if ( $_GET['sSearch'] != "" )
   {
	   $sWhere = "(";
	   $aWords = preg_split('/\s+/', $_GET['sSearch']);
	   for ( $j=0 ; $j<count($aWords) ; $j++ )
	   {
		   if ( $aWords[$j] != "" )
		   {
			   $sWhere .= "(";
			   for ( $i=0 ; $i<count($aColumns) ; $i++ )
			   {
				   $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $aWords[$j] )."%' OR ";
			   }
			   $sWhere = substr_replace( $sWhere, "", -3 );
			   $sWhere .= ") AND ";
		   }
	   }
		
	   $sWhere = substr_replace( $sWhere, "", -5 );
	   $sWhere .= ")";
   }
	
   /* Individual column filtering */
   $sColumnWhere = "";
   for ( $i=0 ; $i<count($aColumns) ; $i++ )
   {  
	   if ( $_GET['sSearch_'.$i] != "" )
	   {
		   $aWords = preg_split('/\s+/', $_GET['sSearch_'.$i]);
		   $sColumnWhere .= "(";
		   for ( $j=0 ; $j<count($aWords) ; $j++ )
		   {
			   if ( $aWords[$j] != "" )
			   {
				   $sColumnWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $aWords[$j] )."%' OR ";
			   }
		   }
		   $sColumnWhere = substr_replace( $sColumnWhere, "", -3 );
		   $sColumnWhere .= ") AND ";
	   }
   }
	
   if ( $sColumnWhere != "" ) {
	   $sColumnWhere = substr_replace( $sColumnWhere, "", -5 );
	   if ( $sWhere == "" ) {
		   $sWhere = $sColumnWhere;
	   } else {
		   $sWhere .= " AND ".$sColumnWhere;
	   }
   }
	
   if ( $sWhere != "" )
   {
	   $sWhere = "WHERE ".$sWhere;
   }
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	$sno=$_GET['iDisplayStart'];
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$row = array();


		/* Add the  details image at the start of the display array */
		$row[] = $sno+1  ;
		//$row[] = '<img src="img/details_open.png">';
		
		

		for ( $i=1 ; $i<count($aColumns) ; $i++ )
		{
			if ( $aColumns[$i] == "version" )
			{
				/* Special output formatting for 'version' column */
				$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
		}
		$row['extra'] = 'hrmll';
		
		
		         if($Group_results_per['admin_edit']=='1')
		          {
		
		
		$row[] = '<a id="smoke_confirm" href="urlrewrite_edit.php?id='.$aRow['id'].'"> <i class="splashy-calendar_week_edit"></i></a> 
		 <a onclick="return del_confirm();" id="smoke_confirm" href="urlrewrite.php?del_id='.$aRow['id'].'"> <i class="splashy-remove"></i> </a>';}else{
		
		 if($Group_results_per['admin_delete']=='1')
		          {
		
		$row[] = '<a id="smoke_confirm" href="urlrewrite_edit.php?id='.$aRow['id'].'"> <i class="splashy-calendar_week_edit"></i></a> 
		 <a onclick="return del_confirm();" id="smoke_confirm" href="urlrewrite.php?del_id='.$aRow['id'].'"> <i class="splashy-remove"></i> </a>';}}
		
		
		$output['aaData'][] = $row;
		
		$sno++;
		
	}
	
//	print_r( $output );
	
	echo json_encode( $output );
?>