<?
/*****************************************************************************
 *                                                                           *
 * Desss Inc                                                         *
 * Copyright (c) 2014 Desss Inc. All rights reserved.         *
 *                                                                           *
 ****************************************************************************/
//	database functions :: MySQL
class Mysql_Class 
{
/************************MYSQL PRIMARY FUNCTION**************************************************/
  function db_connect($host,$user,$pass) //create connection
   {
	return mysql_connect($host,$user,$pass);
   }

  function db_select_db($name) //select database
  {
	return mysql_select_db($name);
  }

 function db_query($exe_query) //database query
  {
	return mysql_query($exe_query);
  }

 function db_fetch_array($fetch_resulst) //row fetching
  {
	return mysql_fetch_array($fetch_resulst);
  }
		
  function get_num_record($num_results)// FUNCTION TO FIND THE NUMBER OF RECORDS
  {
	   $num_result = mysql_num_rows($num_results);
		
	   return $num_result;
  }
 function db_fetch_assoc($q) //row fetching
 {
	return mysql_fetch_assoc($q);
 }

 function db_bof($q,$numrow) //row fetching
 {
  $bof=mysql_data_seek($q, $numrow);
	return $bof;
 }
 function db_set_identity($table) //actual for MSSQL only
 {
	return 1;
 }

function db_insert_id($gen_name = "") //id of last inserted record
				//$gen_name is used for InterBase
 {
	return mysql_insert_id();
 }

function db_error() //database error message
 {
	return mysql_error();
	//echo "couldn't connect to database";
 }
 //////////////////////////////////////////////////END OF MYSQL PRIMARY FUNCTION/////////////////////////////////////////////////////////////
 /**************************Select Query For Two Where Conditions***************************************************************************/
 public function select_two_where($tablename,$fieldname_one,$fieldname_one_value,$fieldname_two,$fieldname_two_value)
 {
  $select_two_where = "SELECT * FROM ".$tablename." WHERE ".$fieldname_one." ='".$fieldname_one_value."' AND ".$fieldname_two." = '".$fieldname_two_value."'";
  return  $select_two_where;
 
 }
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////
 /**************************Select Query For like Where Conditions***************************************************************************/
 public function select_two_like($tablename,$fieldname_one_like,$fieldname_like)
 {
  $select_two_where = "SELECT * FROM ".$tablename." WHERE ".$fieldname_one_like." LIKE '".$fieldname_like."'";
  return  $select_two_where;
 
 }
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////

/**************************Select Query For One Where Conditions***************************************************************************/
 public function select_one_where($tablename,$fieldname_one,$fieldname_one_value)
 {
  $select_one_where = "SELECT * FROM ".$tablename." WHERE ".$fieldname_one." ='".$fieldname_one_value."'";
  return  $select_one_where;
 
 }
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////


 /**************************Select Query For all Records***************************************************************************/
 public function select_all($tablename)
 {
  $select_all = 'SELECT * FROM '.$tablename.''; 
  return  $select_all;
 
 }
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////


 /**************************Select Query For sort order Records***************************************************************************/
 public function select_one_sort_desc($tablename,$key_values,$sort_type)
 {
  $select_all = 'SELECT * FROM '.$tablename.' order by '.$key_values.' '.$sort_type; 
  return  $select_all;
 
 }
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////


 /**************************Select Query For all Records With Sort Order***************************************************************************/
 public function select_common_query($tablename,$sort_order,$fieldnames,$sort_desc)
 {
 $select_all_request ="";
    $select_all_request .= 'SELECT ';
    $i                   = 1;
	$count               = count($fieldnames);
     foreach($fieldnames as $value)
	  {
	     $select_all_request .=$value;
	     if($count != $i )
		 {
		   $select_all_request .=',';
		 }   
	   $i++;
	  }
	 
        $select_all_request .=' FROM '.$tablename.' order by '.$sort_order.' '.$sort_desc; 
		//print_r($select_all_request);die;
  return  $select_all_request;
 
 }
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////

 



 /**************************Insert Query ***************************************************************************/
  public function insert_common_query($Tablename,$FieldTypes)
			 {
              
			 echo  $insert_admin = "INSERT ".$Tablename." SET ";
			  $count_admin  = count($FieldTypes);
			  $i = 1;
			        foreach($FieldTypes as $key=>$value) {

			          $insert_admin .= "`".$key."`   = '".$value."'";
					  
					  if($count_admin != $i)
					  {
					   $insert_admin .=",";
					  }
			                                        
			      // do stuff
				  $i++;
                          }
	
	         	$execute_query_admin = mysql_query($insert_admin);	
				
				if($execute_query_admin)
				{
				$success_insert_admin = mysql_insert_id();
				}
				else
				{
				$success_insert_admin = mysql_error();
				}	  
               return $success_insert_admin;
               }
			   
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////   
/**************************CommUpdate Query ***************************************************************************/
  public function update_common_query($Tablename,$FieldName,$FieldTypes,$pid)
			 {
              
			  
			  
			  
			 $update_admin = "UPDATE ".$Tablename." SET ";
			  $count_admin  = count($FieldTypes);
			  $i = 1;
			        foreach($FieldTypes as $key=>$value) {

			          $update_admin .= "`".$key."`   = '".$value."'";
					  
					  if($count_admin != $i)
					  {
					   $update_admin .=",";
					  }
			                                        
			      // do stuff
				  $i++;
                          }
	            $update_admin .=" where ".$FieldName."=".$pid; 
					 $execute_query_admin = mysql_query($update_admin);
               return $execute_query_admin;
               }
			   
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////   


/**************************Delete Query***************************************************************************/
 public function delete_common_query($tablename,$fieldname_one,$fieldname_one_value)
 {
   $delect_one_where = "DELETE FROM ".$tablename." WHERE ".$fieldname_one." ='".$fieldname_one_value."'";
  return  $delect_one_where;
 
 }
/////////////////////////////////////////////END OF QUERY/////////////////////////////////////////////////////////////////////////////

}


?>
